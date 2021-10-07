@extends('layouts.app')
@section('content')
    <div class="p-4">
        <div class="row {{--justify-content-center--}}">
            <div class="col-md-4 col-xs-12 pr-1 pl-1">
                <div class="row">
                    <div class="col-12">
                        @include('home.components.small_card', ['data' => $clients_data['total_balance'], 'title' => 'TOTAL BALANCE', 'data_color' => 'text-primary'])
                    </div>
                    <div class="col-md-6 col-xs-12 my-2">
                        @include('home.components.small_card', ['data' => $clients_data['active_balance'], 'title' => 'ACTIVE BALANCE', 'data_color' => 'text-success'])
                    </div>
                    <div class="col-md-6 col-xs-12 my-2">
                        @include('home.components.small_card', ['data' => $clients_data['inactive_balance'], 'title' => 'INACTIVE BALANCE', 'data_color' => 'text-danger'])
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 pr-1 pl-1">
                <div class="row">
                    <div class="col-12">
                        @include('home.components.small_card', ['data' => $clients_data['clients_count'], 'title' => 'CLIENTS COUNT', 'data_color' => 'text-primary'])
                    </div>
                    <div class="col-md-6 col-xs-12 my-2">
                        @include('home.components.small_card', ['data' => $clients_data['active_clients_count'], 'title' => 'ACTIVE CLIENTS', 'data_color' => 'text-success'])
                    </div>
                    <div class="col-md-6 col-xs-12 my-2">
                        @include('home.components.small_card', ['data' => $clients_data['inactive_clients_count'], 'title' => 'INACTIVE CLIENTS', 'data_color' => 'text-danger'])
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 pr-1 pl-1">
                <div class="row">
                    <div class="col-12">
                        @include('home.components.small_card', ['data' => $clients_data['total_income'], 'title' => 'TOTAL INCOME', 'data_color' => 'text-primary'])
                    </div>
                    <div class="col-md-6 col-xs-12 my-2">
                        @include('home.components.small_card', ['data' => $clients_data['total_profit'], 'title' => 'TOTAL PROFIT', 'data_color' => 'text-success'])
                    </div>
                    <div class="col-md-6 col-xs-12 my-2">
                        @include('home.components.small_card', ['data' => $clients_data['total_commission'], 'title' => 'TOTAL COMMISSION', 'data_color' => 'text-success'])
                    </div>
                    <div class="col-md-12 col-xs-12 my-2">
                        @include('home.components.small_card', ['data' => $clients_data['total_settlement'], 'title' => 'TOTAL SETTLEMENT', 'data_color' => 'text-success'])
                    </div>
                </div>
            </div>
            {{--<div class="col-md-2 col-xs-6 pr-1 pl-1">
                @include('home.components.small_card', ['data' => $clients_data['total_deposited'], 'title' => 'TOTAL DEPOSITED', 'data_color' => 'text-primary'])
            </div>--}}
        </div>
    </div>
@endsection
