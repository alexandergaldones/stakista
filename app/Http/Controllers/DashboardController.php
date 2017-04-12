<?php
/**
 * Created by PhpStorm.
 * User: xgaldones
 * Date: 11/15/16
 * Time: 11:29 PM
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Cache;

class DashboardController extends BaseController
{
    private $stockJobs;
    private $pageName;

    public function __construct()
    {
        $this->stockJobs = new StockJobsController();
    }

    public function topActives()
    {
        $stocks = $this->stockJobs->getTopActives();
        return view('dashboard.topactives')
            ->withStocks($stocks);
    }

    public function topGainers()
    {
        $stocks = $this->stockJobs->getTopGainers();
        return view('dashboard.topgainers')
            ->withStocks($stocks);
    }

    public function topLosers()
    {
        $stocks = $this->stockJobs->getTopLosers();
        return view('dashboard.topLosers')
            ->withStocks($stocks);
    }
}