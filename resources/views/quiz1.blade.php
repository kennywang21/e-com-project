@extends('layouts.master')

@section('styles')
  <style media="screen">
    .quiz {
      min-height: 100vh;
    }
  </style>

@endsection

@section('content')
  <div class="container quiz">
    {!! Form::open(['route' => 'add.barang', 'method' => 'post']) !!}
      <div class="form-group">
          {!! Form::label('kode', 'Kode Barang', ['class' => 'form-control-label']) !!}
          {!! Form::text('kode', null, ['class' => 'form-control']) !!}
          {!! Form::text('id_b', null, ['id'=>'id_b', 'class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('nama', 'Nama Barang', ['class' => 'form-control-label']) !!}
          {!! Form::text('nama', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('jumlah', 'Jumlah Barang', ['class' => 'form-control-label']) !!}
          {!! Form::text('jumlah', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('harga', 'Harga Barang', ['class' => 'form-control-label']) !!}
          {!! Form::text('harga', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::submit('save',  ['class' => 'btn btn-primary']) !!}
          <span id="sp"></span>
          <a id="delete">Delete</a>

      </div>
    {!! Form::close() !!}

    <div>
      @foreach ($barangs as $barang)
        <ul class="barang">
          <li id="int">{{ $barang->id }}</li>
          <li id="k">{{ $barang->kode }}</li>
          <li id="n">{{ $barang->nama }}</li>
          <li id="j">{{ $barang->jumlah }}</li>
          <li id="h">{{ $barang->harga }}</li>
        </ul>
      @endforeach
    </div>
  </div>
@endsection

@section('jquery')
  <script type="text/javascript">

      $('.barang').on('click', function() {
        $(this).addClass('selected');
        $(this).siblings().removeClass('selected');
        $('#id_b').val($('ul.selected li#int').text())
        $('#kode').val($('ul.selected li#k').text());
        $('#nama').val($('ul.selected li#n').text());
        $('#jumlah').val($('ul.selected li#j').text());
        $('#harga').val($('ul.selected li#h').text());

        $('#sp').text($('#kode').val());
      });

      $('#delete').on('click', function() {
        window.location.href = "/quiz1/" + $('#id_b').val();
      });

  </script>
@endsection
