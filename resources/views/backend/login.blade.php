@extends('layouts.master')

@section('styles')
    <style media="screen">
        .footer {
          position: absolute;
          bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        @include('includes._info-box')
        {!! Form::open(['route' => 'admin.login']) !!}
        <div class="form-group">
          {!! Form::label('username', 'Username', ['class' => 'form-control-label']) !!}
          {!! Form::text('username', Request::old('username'), ['class' => 'form-control '.($errors->has('username')? 'has-error': '')]) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password', 'Password', ['class' => 'form-control-label']) !!}
          {!! Form::text('password', null, ['class' => 'form-control '.($errors->has('password')? 'has-error': '')]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
