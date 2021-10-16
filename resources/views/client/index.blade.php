@extends('adminlte::page')

@section('title', __('title.client.list'))

@section('content_header')
    <h1>{{ __('title.client.list') }}</h1>
@stop

@section('content')

    <div class="row pull-right">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right">
            @if (Request::has('deleted') && Request::get('deleted') == true)
                <a class="btn btn-secondary mr-2" href="{{ route('clients.index') }}">{{ __('button.show_all') }}</a>
            @else
                <a class="btn btn-secondary mr-2" href="{{ route('clients.index', ['deleted' => true]) }}">{{ __('button.show_deleted') }}</a>
            @endif
            <a class="btn btn-primary" href="{{ route('clients.create') }}">{{ __('button.create') }}</a>
        </div>
    </div>

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
