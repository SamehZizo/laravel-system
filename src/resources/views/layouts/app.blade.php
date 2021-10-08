<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('laravel-system:layouts.head')
</head>
<body class="system-font">
@include('laravel-system:layouts.nav.nav')
<main class="{{--py-4--}} pb-4 col-12">
    @yield('content')
</main>
<!--Notices-->
@include('laravel-system:notices.success')
@include('laravel-system:notices.danger')
<!--End Notices-->
<!--Modals-->
@include('laravel-system:form_builder.modals.form_builder_modal')
@include('laravel-system:form_builder.modals.delete')
@include('laravel-system:form_builder.modals.view')
<!--End Modals-->
<!--Foot-->
@include('laravel-system:layouts.foot')
<!--End Foot-->
</body>
</html>
