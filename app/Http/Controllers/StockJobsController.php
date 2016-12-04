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

class StockJobsController extends Controller
{
    private $rawApiSource;

    public function __construct()
    {
        $this->rawApiSource = new RawApiSourceData();
    }

    public function getStock($code)
    {
        $code = strtoupper($code);
        $stocks = $this->getAllStocks();
        //$stocks[$code]['recentData'] = $this->rawApiSource->getStockLastMonthData($code);
        //Cache::forever('stock_' . $code, $stocks[$code]);
        return !empty($stocks[$code]) ? $stocks[$code] : 'stock code doesnt exist';
    }

    /**
     *  grind stock infos
     */
    public function getAllStocks($date = '')
    {
        if( Cache::has('allstocks'))
        {
            return Cache::get('allstocks');
        } else {
            dd('dont recache na');
            $data = $this->rawApiSource->getCompanyInfos();
            Cache::forever('allstocks', $data);
            return $data;
        }
    }

    /**
     * @param string $date
     * @return mixed
     * Get Top actively traded stock
     */
    public function getTopActives($date = '')
    {
        if(Cache::has('top_actives_' . $date))
        {
            return Cache::get('top_actives_' . $date);
        } else {
            $data = $this->rawApiSource->getTopActives($date);
            Cache::forever('top_actives_' . $date,  $data);
            return $data;
        }
    }

    /**
     * @param string $date
     * @return array
     * get Market Sectors Performance
     */
    public function getMarketSectors($date = '')
    {
        if(Cache::has('market_sectors_' . $date))
        {
            return Cache::get('market_sectors_' .$date);
        } else {
            $response = $this->rawApiSource->getMarketSectors();
            $data = [];
            foreach($response['records'] as $sector)
            {
                $data[ $sector['indexName'] ] = $sector;
            }
            Cache::forever('market_sectors_' . $date,  $data);
            return $data;
        }
    }

    /**
     * @param string $date
     * @return array
     * get Top gainers by percentage
     */
    public function getTopGainers($date = '')
    {
        if(Cache::has('top_gainers_' . $date))
        {
            return Cache::get('top_gainers_' .$date);
        } else {
            $data = $this->rawApiSource->getTopGainers();
            Cache::forever('top_gainers_' . $date,  $data);
            return $data;
        }
    }

    /**
     * @param string $date
     * @return array
     * get Top losers by percentage
     */
    public function getTopLosers($date = '')
    {
        if(Cache::has('top_losers_' . $date))
        {
            return Cache::get('top_losers_' .$date);
        } else {
            $data = $this->rawApiSource->getTopLosers();
            Cache::forever('top_losers_' . $date,  $data);
            return $data;
        }
    }
}