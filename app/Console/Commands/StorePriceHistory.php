<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiRequestController;
use App\Http\Controllers\RawApiSourceData;
use App\Http\Controllers\StockJobsController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\PriceHistory;

class StorePriceHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stocks:prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save Stock Price History';

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
        $this->info('Save Price History');
        if( Cache::has('allstocks') )
        {
            $stocks = Cache::get('allstocks');
            foreach($stocks as $code => $stock)
            {
                if(!empty($stock['recentData']['records']))
                {
                    $this->info('Caching Stock Code:' . $code . ' - ' . $stock['securityName']);
                    foreach($stock['recentData']['records'] as $day_row)
                    {
                        $this->line( $day_row['tradingDate'] . '...ok');
                        try{
                            $priceHistory = new PriceHistory;
                            $priceHistory->stock_code = $code;
                            $priceHistory->sqLow = $day_row['sqLow'];
                            $priceHistory->sqOpen = $day_row['sqOpen'];
                            $priceHistory->sqHigh = $day_row['sqHigh'];
                            $priceHistory->percChangeClose = $day_row['percChangeClose'];
                            $priceHistory->sqClose = $day_row['sqClose'];
                            $priceHistory->changeClose = $day_row['changeClose'];
                            $priceHistory->totalValue = $day_row['totalValue'];
                            $priceHistory->secQid = $day_row['secQid'];
                            $priceHistory->lastTradePrice = $day_row['lastTradePrice'];
                            $priceHistory->avgPrice = floatval($day_row['avgPrice']);
                            $priceHistory->tradingDate = $day_row['tradingDate'];
                            $priceHistory->sqPrevious = $day_row['sqPrevious'];

                            $priceHistory->save();
                        } catch (\Exception $exception)
                        {
                            $this->line('...hoy error');
                        }

                        /*
                        $result = PriceHistory::firstOrCreate(
                            [
                            'stock_code' => $code ,
                            'sqLow' => $day_row['sqLow'] ,
                            'sqHigh' => $day_row['sqOpen'] ,
                            'sqHigh' => $day_row['sqHigh'] ,
                            'percChangeClose' => $day_row['percChangeClose'] ,
                            'sqClose' => $day_row['sqClose'] ,
                            'changeClose' => $day_row['changeClose'] ,
                            'totalValue' => $day_row['totalValue'] ,
                            'secQid' => $day_row['secQid'] ,
                            'lastTradePrice' => $day_row['lastTradePrice'] ,
                            'avgPrice' => $day_row['avgPrice'] ,
                            'tradingDate' => $day_row['tradingDate'] ,
                            'sqPrevious' => $day_row['sqPrevious']
                            ]
                        );
                        */
                    }
                }
            }
        }

        $this->info('All Set! Let\'s go!');

    }
}
