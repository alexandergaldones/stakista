<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiRequestController;
use App\Http\Controllers\RawApiSourceData;
use App\Http\Controllers\StockJobsController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class StoreStockInfos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stocks:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache Stock Infos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Start cache Stocks Info');

        $rawApiRequest = new RawApiSourceData();
        $stocks = $rawApiRequest->getStocksBasicInfo();
        $newDatas = [];

        foreach($stocks as $code => $stock)
        {
            try {
                $this->info('Caching Stock Code:' . $code);
                $apiRequest = new ApiRequestController(
                    config('default.stockinfos_api')['companyInfo'],
                    'POST',
                    ['company' => $stock['companyId'], 'security' => $stock['securitySymbolId']]);
                $companyInfo = json_decode($apiRequest->getApiRequest(), 1);

                if (!empty($companyInfo['records'][0])) {
                    $newDatas[$code] = array_merge_recursive($stock, $companyInfo['records'][0]);
                }
                //$stocks[$code]['recentData'] = $rawApiRequest->getStockLastMonthData($code);
                $newDatas[$code]['recentData'] = $rawApiRequest->getStockLastMonthData($code);
                Cache::forever('stock_' . $code, $newDatas[$code]);
                $this->line('...ok');
            } catch(\Exception $e)
            {
                $this->line('error hoy! : ' . $e->getMessage());
            }
        }
        Cache::forever('allstocks', $newDatas);
        $this->info('All Set! Let\'s go!');

    }
}
