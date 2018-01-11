@extends('layouts.admin')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div id="app">
        <input-comp
                v-for="input in inputs"
                :tmp="input"
        ></input-comp>
    </div>
@stop
