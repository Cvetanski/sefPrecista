@extends('adminlte::page')
@section('title', 'Изменете ја категоријата')
@section('content_header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Изменете ја категоријата</h3>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}"
                           id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    @include('dashboard.categories.partials.form')
                </div>
            </div>
        </div>
    </div>
@stop

