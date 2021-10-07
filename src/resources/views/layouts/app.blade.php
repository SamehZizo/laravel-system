<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body class="system-font">
@include('layouts.nav.nav')
<main class="{{--py-4--}} pb-4 col-12">
    @yield('content')
</main>
<!--Notices-->
@include('notices.success')
@include('notices.danger')
<!--End Notices-->
<!--Modals-->
@include('form_builder.modals.form_builder_modal')
@include('form_builder.modals.delete')
@include('form_builder.modals.view')
<!--End Modals-->
<!--Foot-->
@include('layouts.foot')
<!--End Foot-->
</body>
</html>
