@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/modal.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('includes._info-box')
        
@endsection

@section('jquery')
    <script type="text/javascript">
        var token = "{{ Session::token() }}";
    </script>
    <script type="text/javascript" src="{{ '/js/modal.js' }}"></script>
    <script type="text/javascript" src="{{ '/js/contact_messages.js' }}"></script>

@endsection
