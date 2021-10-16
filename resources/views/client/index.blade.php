@extends('adminlte::page')

@section('title', __('title.client.list'))

@section('content_header')
    <h1>{{ __('title.client.list') }}</h1>
@stop

@section('content')
    {{$dataTable->table()}}
@stop

@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @stack('scripts')
@stop
