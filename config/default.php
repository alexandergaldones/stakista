<?php

return [
    //APPLICATION NAME
    'appname'       =>      'Stakista',

    'stockinfos_api'      =>         [
        'top_actives'                       =>  'http://www.pse.com.ph/stockMarket/dailySummary.html?method=getTopSecurity&limit=20&ajax=true&_dc=1403669229237',
        'market_sectors'                    =>  'http://www.pse.com.ph/stockMarket/dailySummary.html?method=getMarketIndices&ajax=true&_dc=1403669245513',
        'market_index'                      =>  'http://www.pse.com.ph/stockMarket/home.html?method=fetchIndicesDetails&ajax=true&_dc=1403669245516',
        'FMETF'                             =>  'http://www.pse.com.ph/stockMarket/exchangeTradedFund.html?method=listETF&ajax=true',
        'stocks'                            =>  'http://www.pse.com.ph/stockMarket/companyInfoSecurityProfile.html?method=getListedRecords&common=yes&ajax=true',
        'stock'                             =>  'http://www.pse.com.ph/stockMarket/companyInfo.html?method=fetchHeaderData&ajax=true',
        'companyInfo'                       =>  'http://www.pse.com.ph/stockMarket/companyInfo.html?method=fetchHeaderData&ajax=true',
        'top_gainers'                       =>  'http://www.pse.com.ph/stockMarket/dailySummary.html?method=getAdvancedSecurity&limit=20&ajax=true&_dc=1472312259976',
        'top_losers'                        =>  'http://www.pse.com.ph/stockMarket/dailySummary.html?method=getDeclinesSecurity&limit=20&ajax=true&_dc=1472314960368',
        'past_month_data'                   =>  'http://www.pse.com.ph/stockMarket/companyInfoHistoricalData.html?method=getRecentSecurityQuoteData&ajax=true',
    ],

    'market_sector_names'                   =>  [
                                                'All Shares',
                                                'PSEi',
                                                'Financials',
                                                'Industrial',
                                                'Holding Firms',
                                                'Mining and Oil',
                                                'Property',
                                                'Services'
                                            ],
];