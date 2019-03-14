@extends('layouts.master')

@section('title')
  Settings
@endsection

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

@section('content')
  <div class="container register-field">
      <div class="row" style="margin-bottom: 20px;">
          <div class="col-md-1"></div>
          <div class="col-md-10">
              <h3 style="text-align: center;">Pofile Anda</h3>
              <hr />
              {!! Form::open() !!}
                <div class="form-group cus-form-group">
                  {!! Form::label('name', 'Name *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::text('name', null, ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('email', 'E-Mail *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::email('email', 'hello@gmail.com', ['readonly'=>'true', 'class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  <div class="">
                    {!! Form::label('password', 'Password', ['class' => 'col-md-3 form-control-label label-form']) !!}
                    <div class="col-md-3">
                      {!! Form::password('password', ['class' => 'form-control input-form']) !!}
                    </div>
                  </div>
                  <div class="">
                    {!! Form::label('con-password', 'Konfirmasi Password', ['class' => 'col-md-3 form-control-label label-form']) !!}
                    <div class="col-md-3">
                      {!! Form::password('con-password', ['class' => 'form-control input-form']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('provinsi', 'Provinsi *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::text('provinsi', null, ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('kota', 'Kota *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::text('kota', null, ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('kecamatan', 'Kecamatan *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::text('kecamatan', null, ['class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  {!! Form::label('alamat', 'Alamat Lengkap *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                  <div class="col-md-9">
                    {!! Form::textarea('alamat', null, ['rows' => '5', 'class' => 'form-control input-form']) !!}
                  </div>
                </div>
                <div class="form-group cus-form-group">
                  <div class="">
                    {!! Form::label('telepon', 'Telepon *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                    <div class="col-md-3">
                      {!! Form::text('telepon', null, ['class' => 'form-control input-form']) !!}
                    </div>
                  </div>
                  <div class="">
                    {!! Form::label('kode_pos', 'Kode Pos *', ['class' => 'col-md-3 form-control-label label-form']) !!}
                    <div class="col-md-3">
                      {!! Form::text('kode_pos', null, ['class' => 'form-control input-form']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3" style="padding-top: 7.5px;"><b>* wajib diisi</b></div>
                  <div class="col-md-9">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary register-btn']) !!}
                  </div>
                </div>
              {!! Form::close() !!}
          </div>
          <div class="col-md-1"></div>
      </div>
  </div>
@endsection
