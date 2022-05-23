@extends('adminlte::page')
@section('css')
    {{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Креирај Категорија')
@section('content_header')
@stop
@section('content')
    @if(Session::has('error'))
        {{ Session::get('alert-class', 'alert-warning') }}                 {{ Session::get('error') }}
    @endif


    @if(Session::has('message'))
        {{ Session::get('alert-class', 'alert-info') }}                 {{ Session::get('message') }}
    @endif
    @include('dashboard.categories.partials.form')
@endsection 

