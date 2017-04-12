<?php
/**
 * Created by PhpStorm.
 * User: xgaldones
 * Date: 12/14/16
 * Time: 12:53 AM
 */

namespace App\Http\Controllers;


class StockController extends BaseController
{
    public function showInfo($stockCode)
    {
        $stockJobs = new StockJobsController();
        $stockInfo = $stockJobs->getStock($stockCode);
        return view('stock.index')
            ->withStock($stockInfo);
    }
}