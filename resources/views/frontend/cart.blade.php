@extends('layouts.master')

@section('styles')
  <style media="screen">
      .no-no {
        padding: 10px;
        border: none;
      }
  </style>
@endsection

@section('title')
  Cart
@endsection

@section('content')
  @include('includes._info-box')

  {{-- ALTERNATIVE WAY TO MAKE A FLASH MESSAGE --}}
  @if (Session::has('success_message'))
      <section class="alert-success">
          {{ Session::get('success_message') }}
      </section>
  @endif

  <div class="container" style="min-height: 100vh;">
    <div class="row" style="margin-top: 20px;">
          <div class="col-sm-1"></div>
          <div class="col-sm-10" style="padding-left: 0;">
            <h3>Cart</h3>
          </div>
          <div class="col-sm-1"></div>
    </div>
    <div class="row" style="">
          <div class="col-sm-1"></div>
          <div class="col-sm-10" style="border: 1px solid black;">
            <div class="row" style="border: 1px solid black;">
              <div class="col-sm-6">
                  <h5>Item</h5>
              </div>
              <div class="col-sm-2">
                  <h5>Harga</h5>
              </div>
              <div class="col-sm-2">
                  <h5>Jumlah</h5>
              </div>
              <div class="col-sm-2">
                  <h5>Sub Total</h5>
              </div>
            </div><!-- end row -->
            <?php foreach($cartProducts as $row) :?>
                <div class="row item-cart" style="margin: 15px 0;">
                  <div class="col-sm-6">
                      <img src="{{ asset('/images/product/'. $row->options->file_path) }}" width='100' height='100' alt="{{ $row->options->file_path }}" style="float: left;
                      margin-right: 30px;">
                      <div class="" style="position: relative;">
                        <span>{{ $row->name }}</span><br>
                        <span>Size: {{ $row->options->size }}</span>
                        <a href="{{ route('cart.product.remove', ['rowId' => $row->rowId]) }}" style="position: absolute;right:0px;">
                          <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                        </a>
                      </div>
                  </div>
                  <div class="col-sm-2">
                      <span>Rp. {{ $row->price }}</span>
                  </div>
                  <div class="col-sm-2">
                    {!! Form::open(['action' => 'CartController@getProductUpdate']) !!}
                      {!! Form::number('qty', $row->qty, ['min' => 1, 'class' => 'form-control']) !!}
                      {!! Form::hidden('rowId', $row->rowId) !!}
                    {!! Form::close() !!}
                  </div>
                  <div class="col-sm-2">
                      <span>Rp. </span><span>{{ $row->price * $row->qty }}</span>
                  </div>
                </div><!-- end row -->
      	   	<?php endforeach;?>

            <div class="row" style="border: 1px solid black;">
              <div class="col-sm-6"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2">
                  <h5>Tax</h5>
              </div>
              <div class="col-sm-2">
                  <h5>Rp {{ Cart::tax() }}</h5>
              </div>
            </div><!-- end row -->
            <div class="row" style="border: 1px solid black;">
              <div class="col-sm-6"></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2">
                  <h5>Total</h5>
              </div>
              <div class="col-sm-2">
                  <h5>Rp {{ Cart::total() }}</h5>
              </div>
            </div><!-- end row -->





          </div>
          <div class="col-sm-1"></div>
      </div><!-- end row -->
      <div class="row" style="margin-top: 20px;">
        <div class="">
            <div class="col-sm-1"></div>
            <div class="col-sm-10" style="padding-left: 0; padding-right: 0;">
              <a class="" href='{{ route('shop', ['filter_id' => '0']) }}' style="float: left; padding: 10px; border: 1px solid black;">
                Lanjutkan Berbelanja
              </a>
              <a class="" style="float: right; border: 1px solid black;">
                {!! Form::open(['action' => 'CartController@postCart']) !!}
                    {!! Form::submit('Lanjutkan ke Pembayaran', ['class' => 'btn btn-no-style no-no']) !!}
                    @if (Auth::check())
                        {!! Form::hidden('user-email', Auth::user()->email) !!}
                    @endif
                {!! Form::close() !!}
              </a>
            </div>
            <div class="col-sm-1"></div>
        </div>
      </div><!-- end row -->
  </div>
@endsection

@section('jquery')

@endsection
