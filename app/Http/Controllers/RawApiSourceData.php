<?php
/**
 * Created by PhpStorm.
 * User: xgaldones
 * Date: 11/6/16
 * Time: 8:36 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cache;

class RawApiSourceData extends Controller
{
    public function getStocksBasicInfo()
    {
        if( Cache::has('stocksBasicInfo'))
        {
            return Cache::get('stocksBasicInfo');
        } else {
            $stocksByCode = [];
            $apiRequest = new ApiRequestController(config('default.stockinfos_api')['stocks']);
            $stocks = json_decode( $apiRequest->getApiRequest(), 1);
            foreach($stocks['records'] as $stock)
            {
                $stocksByCode[$stock['securitySymbol']] = $stock;
            }
            Cache::forever('stocksBasicInfo', $stocksByCode);
            return $stocksByCode;
        }
    }

    public function getCompanyInfos()
    {
        $stocks = $this->getStocksBasicInfo();
        foreach($stocks as $code => $stock)
        {
            if(Cache::has('companyInfo_' . $code))
            {
                $companyInfo = Cache::get('companyInfo_' . $code);
            } else {
                try {

                    $apiRequest = new ApiRequestController(
                        config('default.stockinfos_api')['companyInfo'],
                        'POST',
                        ['company' => $stock['companyId'], 'security' => $stock['securitySymbolId']]);
                    $companyInfo = json_decode($apiRequest->getApiRequest(), 1);

                    if (!empty($companyInfo['records'][0])) {
                        $stocks[$code] = array_merge_recursive($stock, $companyInfo['records'][0]);
                    }

                    Cache::forever('companyInfo_' . $code, $stocks[$code]);

                } catch(\Exception $e)
                {
                    //throw $e;
                }
            }


        }
        return $stocks;
    }

    public function getTopActives()
    {
        $apiRequest = new ApiRequestController(config('default.stockinfos_api')['top_actives'],'GET');
        $topActives = json_decode($apiRequest->getApiRequest(), 1);

        return $topActives;
    }

    public function getMarketSectors()
    {
        $apiRequest = new ApiRequestController(config('default.stockinfos_api')['market_sectors'],'GET');
        $topActives = json_decode($apiRequest->getApiRequest(), 1);

        return $topActives;
    }

    public function getTopGainers()
    {
        $apiRequest = new ApiRequestController(config('default.stockinfos_api')['top_gainers'],'GET');
        $data = json_decode($apiRequest->getApiRequest(), 1);

        return $data;
    }

    /**
     * @return mixed
     * get top losers
     */
    public function getTopLosers()
    {
        $apiRequest = new ApiRequestController(config('default.stockinfos_api')['top_losers'],'GET');
        $data = json_decode($apiRequest->getApiRequest(), 1);

        return $data;
    }

    /**
     * get stock past 30 days data
     */
    public function getStockLastMonthData($code)
    {
        $stocks = $this->getCompanyInfos();
        $stock = $stocks[$code];
        $apiRequest = new ApiRequestController(config('default.stockinfos_api')['past_month_data'] . '&security=' . $stock['securitySymbolId'],'GET');
        $data = json_decode($apiRequest->getApiRequest(), 1);

        return $data;
    }

}