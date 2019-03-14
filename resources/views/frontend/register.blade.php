@extends('layouts.master')

@section('styles')
  <style media="screen">
    .label-form {
      text-align: left;
      padding-top: 15px;
    }

    .input-form {
      padding: 6px 12px 6px 15px;
      height: 50px;
    }

    .cus-form-group {
      display: table;
      width: 100%;
    }

    .register-field {
      min-height: 450px;
    }



  </style>
@endsection

@section('title')
  register
@endsection

@section('content')
  <div class="" style="height: 100px; width: 100%; text-align: center;"></div>
  <div class="container register-field">
      <div class="row" style="margin-bottom: 20px;">
          <div class="col-md-1"></div>
          <div class="col-md-10">
              @if(Session::has('success'))
                  <div class="alert alert-success"> {{ Session::get('success') }} </div>
              @endif

              @if(Session::has('fail'))
                  <div class="alert alert-warning"> {{ Session::get('fail') }} </div>
              @endif

              <div class="alert-warning">
                <!-- REMEMBER THIS IS A CONDITION FOR "EACH ERROR!!!" NOT THE CONDITION!!! SO USE "IF" FOR EACH ERROR!!! -->
                @if( $errors->has('name-register') )
                   {{ "Name field is required." }}
                @endif

                @if( $errors->has('email-register') )
                   <br />{{ "Email field is equired." }}
                @endif

                @if( $errors->has('password-register') )
                   <br />{{ "Password field is required." }}
                @endif

                @if( $errors->has('con-password-register') )
                   <br />{{ "Confirmation password field is required." }}
                @endif
              </div>
              {!! Form::open(['action' => 'UserController@postRegister']) !!}
                <div class="form-group cus-form-group">
                  {!! Form::label('name-register', 'Name *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::text('name-register', null, ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('email-register', 'E-Mail Address *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::email('email-register', null, ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('password-register', 'Password *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::password('password-register', ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('con-password-register', 'Confirm Password *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::password('con-password-register', ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3" style="padding-top: 7.5px;"><b>* wajib diisi</b></div>
                  <div class="col-md-9">
                    {!! Form::submit('Register', ['class' => 'btn btn-primary register-btn']) !!}
                  </div>
                </div>
              {!! Form::close() !!}
          </div>
          <div class="col-md-1"></div>
      </div>
  </div>
@endsection
