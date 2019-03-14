@extends('layouts.master')

@section('styles')

@endsection

@section('content')
    @include('includes._info-box')
    <div class="row top-row">
        <div class="col-md-2 left-side">

        </div>
        <div class="col-md-8 mid-side">
            <div class="mid-list item-info-page">
                <div class="item-info">
                  <img class="image-item-info" src="{{ route('item.id', [$item->id]) }}" alt="">
                  @if (Auth::check())
                    <div class="delete-item">
                        <a href="{{ route('admin.item.delete', ['id' => $item->id]) }}">x</a>
                    </div>
                  @endif
                  <div class="item-description-info">
                    <div>Description: </div>
                      <div class="description-info">
                        <p>{{ $item->description }}</p>
                      </div>
                  </div>
                  <div class="name-price">
                    <span class="item-name-info">{{ $item->name }}</span>
                    <span>Harga: Rp <span class="item-price">{{ $item->price }}</span>,-</span>
                    <button class="btn btn-primary btn-beli">Beli</button>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 right-side">

        </div>
    </div>
@endsection
