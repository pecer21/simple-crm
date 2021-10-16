@extends('adminlte::page')

@section('title', __('title.client.list'))

@section('content_header')
    <h1>{{ __('title.client.list') }}</h1>
@stop

@section('content')

    <div class="row pull-right">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right">
            @can('create', App\Models\User::class)
                <a class="btn btn-primary" href="{{ route('users.create') }}">{{ __('button.create') }}</a>
            @endcan
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
