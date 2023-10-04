<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} | @yield('tab_tittle') </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.css?v=1.1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css?v=1.1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dark.css?v=1.1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css?v=1.1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css?v=1.1.0') }}">

    <!-- Fullcalender CSS -->
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/core/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/daygrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/timegrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/list/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/Leaflet/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css') }}" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}" />
    <style>
        th.hide-search input {
            display: none;
        }
    </style>
  @livewireStyles
</head>