@extends('adminlte::page')

@section("js")
    <script src="{{asset("js/app.js")}}"></script>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
@stop