@extends('layouts.dashboard')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')

            <div class="col-md-12">

                @include('panels.welcome-panel')

            </div>


@endsection