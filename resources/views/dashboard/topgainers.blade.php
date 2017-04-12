@extends('layouts.master')
@section('title', 'Top Actively Traded Stocks ' . date('F d, Y'))
@section('headerTitle', 'Top Gainers ' . date('F d, Y'))

@section('content')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i> </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                <tr>
                    <th width="20%"> Code </th>
                    <th> Company </th>
                    <th class="numeric"> Price </th>
                    <th class="numeric"> Change </th>
                    <th class="numeric"> Open </th>
                    <th class="numeric"> High </th>
                    <th class="numeric"> Low </th>
                    <th class="numeric"> Volume </th>
                    <th class="numeric"> Change % </th>
                </tr>
                </thead>
                <tbody>
                @foreach($stocks['records'] as $stock)
                    <tr>
                        <td><a href="/q/{{ $stock['securitySymbol'] }}">  {{ $stock['securitySymbol'] }} </a> </td>
                        <td> {{ $stock['securityName'] }} </td>
                        <td class="numeric"> {{ $stock['lastTradePrice'] }} </td>
                        <td class="numeric"> {{ $stock['changeClose'] }} </td>
                        <td class="numeric"> {{ $stock['lastTradePrice'] - $stock['changeClose'] }} </td>
                        <td class="numeric"> {{ Helper::format_price( Cache::get('stock_' . $stock['securitySymbol']) ['headerSqLow']) }}</td>
                        <td class="numeric"> {{ Helper::format_price( Cache::get('stock_' . $stock['securitySymbol']) ['headerSqHigh'])  }}</td>
                        <td class="numeric"> {{ Helper::human_read_val($stock['totalVolume']) }}</td>
                        <td class="numeric"> {{ Helper::format_price($stock['percChangeClose']) }} %</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
@endsection