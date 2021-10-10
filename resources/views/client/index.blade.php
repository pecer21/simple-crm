@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
    <h1>Client</h1>
@stop

@section('content')
    @foreach ($clients as $client)
        <p>{{ $client->name }} </p>
    @endforeach
@stop

