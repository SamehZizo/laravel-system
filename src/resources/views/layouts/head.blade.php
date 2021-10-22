<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', '') }}</title>
<link rel="shortcut icon" href="{{ asset('images/logos/logo.png') }}">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

{{--Datatable--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">-->
<!--<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

{{--Datepicker--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

<!-- Styles -->
<link href="{{ asset('laravel-system/assets/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('laravel-system/assets/css/datatable.css') }}" rel="stylesheet">
<link href="{{ asset('laravel-system/assets/css/form_builder.css') }}" rel="stylesheet">
<link href="{{ asset('laravel-system/assets/css/other.css') }}" rel="stylesheet">

<!--jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
