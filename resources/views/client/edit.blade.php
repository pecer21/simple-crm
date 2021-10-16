@extends('adminlte::page')

@section('title', __('title.client.edit'))

@section('content_header')
    <h1>{{ __('title.client.edit') }}</h1>
@stop

@section('content')

    <form method="POST" action="{{ route('clients.update', $client) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>{{ __('form.client.name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', $client->name) }}" name="name">

            <!-- Error -->
            @if ($errors->has('name'))
                <span id="name-error" class="error invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label>{{ __('form.client.vat') }}</label>
            <input type="vat" class="form-control {{ $errors->has('vat') ? 'is-invalid' : '' }}" value="{{ old('vat', $client->vat) }}" name="vat">

            @if ($errors->has('vat'))
                <span id="vat-error" class="error invalid-feedback">
                    {{ $errors->first('vat') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label>{{ __('form.client.address') }}</label>
            <input type="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{ old('address', $client->address) }}" name="address">

            @if ($errors->has('address'))
                <span id="address-error" class="error invalid-feedback">
                    {{ $errors->first('address') }}
                </span>
            @endif
        </div>

        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>

@endsection
