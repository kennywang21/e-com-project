@extends('layouts.master')

@section('styles')

@endsection

@section('content')
    <div class="container">
        @include('includes._info-box')
        @include('includes._admin-edit-post-form')
    </div>
@endsection

@section('jquery')
    <script type="text/javascript" src="{{ URL::asset('js/posts.js') }}"></script>
@endsection
