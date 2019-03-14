@extends('layouts.master')

@section('title')
  Shop
@endsection

@section('styles')
  <style>
    .shop {
      display: table;
      min-height: 100vh;
    }
    .nav-search-facade .nav-icon {
    border-color: #555 rgba(0, 11, 11, 0);
    border-style: solid;
     border-width: 4px 4px 0; */
    /* font-size: 0; */
    /* height: 0; */
    /* line-height: 0; */
    /* position: absolute; */
    right: 8px;
    top: 14px;
    /* width: 0; */
  }

  .show-filter-by-section {
    display: table;
    width: inherit;
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    padding: 10px 0;
    margin-top: 50px;
  }

  #show-component {
    float: left;
  }

  .show-label {
    float: left;
    padding-right: 5px;
  }

  .show-alias {
    float: left;
    width: auto;
    position: relative;
    border: 1px solid black;
    border-radius: 5px;
    padding: 1px 10px;

  }

  .show-cbox {
      padding-right: 5px;
  }

  #filter-by-component {
    float: right;
  }

  .filter-by-alias {
    float: left;
    width: auto;
    position: relative;
    border: 1px solid black;
    border-radius: 5px;
    padding: 1px 10px;

  }

  .filter-by-cbox {
      padding-right: 5px;
  }

  .shop-item {
    margin-top: 25px;
  }

  .category {
    position: relative;
  }

  .category h4 {
    display: inline-block;
    padding-left: 10px;
  }

  .category span {
    position: absolute;
    display: inline-block;
    right: 0;
    top: 10px;
    //pointer-events: none;//we need to be able to minimize event
    padding-right: 10px;
  }

  .category span a {
    text-decoration: none;
  }

  .category-list {
    display: block;
    padding-left: 10px;
  }

  .category-list a {
    display: block;
    padding-top: 3px;
    padding-bottom: 3px;
  }

  .category-list a:nth-child(1) {
    padding-top: 6px;
  }

  .minimize-category {
    font-size: 24px;
  }

  .shop-item>a {
    position: absolute;
    height: inherit;
    width: inherit;
  }

  .shop-index-item {
    display: table;
    margin-left: 50px;
    height: 100%;
    float: left;
    width: 603px;
  }

  .item-name {
    text-align: center;
  }

  .new-sale-wrapper {
    position: absolute;
    top: 5px;
    left: 5px;
  }

  .new,
  .sale {
    background-color: lightgreen;
    color: white;
    font-size: 1em;
    font-weight: bold;
    border-radius: 2.5px;
    padding: 1.5px 6px;
    display: table;
    text-transform: uppercase;
    margin-bottom: 5px;
    position: relative;
  }

  .new {
    background-color: red;
    padding: 1.5px 8px;
  }
  </style>
@endsection

@section('content')
    <div class="container shop" style="margin-bottom: 75px;">
        @include('includes._info-box')
        <section class="show-filter-by-section">
            <div class="" id="show-component">
                {!! Form::open() !!}
                    {!! Form::label('show', 'Show: ',['class' => 'form-control-label show-label']) !!}
                      <div class="show-alias">
                          <div data-value="" class="">
                              <span class="show-cbox">12 per page</span>
                              <i class="fa fa-chevron-down" aria-hidden="true"></i>
                          </div>
                          <div style="position: absolute; top:0; opacity: 0;">
                            {!! Form::select('show', [
                                "12" => "12 per page",
                              ], null, ['class' => '']) !!}
                          </div>
                      </div>
                {!! Form::close() !!}
            </div><!-- show-component -->
            <div class="" id="filter-by-component">
                {!! Form::open() !!}
                    {!! Form::label('filter', 'Filter by: ',['class' => 'form-control-label show-label']) !!}
                      <div class="filter-by-alias">
                          <div data-value="" class="">
                              <span class="filter-by-cbox">price(low to high)</span>
                              <i class="fa fa-chevron-down" aria-hidden="true"></i>
                          </div>
                          <div style="position: absolute; top:0; opacity: 0;">
                            {!! Form::select('filter', [
                                "0" => "New Products",
                                "1" => "Popular Products",
                                "2" => "Most Viewed",
                                "3" => "price(low to high)",
                                "4" => "price(high to low)",
                              ], 0, ['class' => '']) !!}
                          </div>
                      </div>
                {!! Form::close() !!}
            </div><!-- filter-by-component -->
        </section>
        <section class="" style="clear: both;
                                 height: 500px;
                                 padding: 15px 0;">

            <div class="shop-index-item" style="">
                <!-- SHOP/SALE item page "filter by" -->
                <div class="" style="border-bottom: 1px solid black">
                  <h4 class="filter-by-title">Price(low to high)</h4>
                </div>
                <div class="shop-wrapper">
                    <!-- "$product_tags" that pass to here is an "ARRAY" OF "JSON DATA" -->
                    <input type="hidden" name='tags_value' id='tags_value' value="{{ implode(",", $product_tags) }}"/>
                    <?php $i=0 ?>
                    @foreach ($products as $product)
                       <?php $array = json_decode($product_tags[$i], true) ?>
                      {{--@foreach ($array as $arr)
                          @if ($arr['tag'] == "New") --}}
                      <div class="index-item shop-item"><a href="{{ route('product.page.id', ['id' => $product->id]) }}"></a>
                          <div class="new-sale-wrapper" style="">

                         
                            <?php //$array = json_decode($product_tags[$i], true) ?>
                            <!-- foreach  -->
                            @foreach ($array as $arr)
                                @if ($arr['tag'] == "New")
                                    <div class="new" style="">
                                        <span>{{ $arr['tag'] }}</span>
                                    </div>
                                @elseif ($arr['tag'] == "Sale")
                                    <div class="sale" style="">
                                        <span>{{ $arr['tag'] }}</span>
                                    </div>
                                @endif
                            @endforeach

                          </div>
                          <img class="index-item-pic" src="{!! asset('/images/product/'.$product->file_path) !!}" alt="{{ $product->file_path }}">
                          <span class="item-name">{{ $product->name }}</span>
                          <span class="item-price">Rp {{ $product->price }}</span>
                          <div class="discount">
                              <span class="item-price-discount"><del>Rp {{ $product->price }}</del></span>
                          </div>
                          <div class="cart-like">
                              <a class="add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                              <a class="like-item"><i class="fa fa-heart"></i></a>
                          </div>
                      </div>
                    {{-- @endif
                  @endforeach --}}
                      <?php $i++ ?>
                    @endforeach
                </div>
                <div class="" style="display: table;
                                     width: inherit;
                                     text-align: right;">
                    @include('includes.pagination', ['paginator' => $products])
                </div>
            </div>

            <div class="right-side" style="display: table;
                                           //border: 1px solid black;
                                           height: 100%;
                                           float: right;
                                           width: 25%;
                                           margin-left: 20px;">
                <div class="category" style="border-bottom: 1px solid black;">
                    <h4>Category</h4>
                    <span style="">
                      <a href="#" style="cursor: pointer;" class="minimize-category">-</a>
                    </span>
                </div>
                <div class="category-list">
                    @foreach ($categories as $category)
                        <a href="">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </section>

    </div><!-- div.shop -->


@endsection

@section('jquery')
  <script type="text/javascript">
    var categorylist = $('.category-list');
    var minimizecategory = $('.minimize-category');
    var filterByCbox = $('.filter-by-cbox');
    var filterByTitle = $('.filter-by-title');

    $( document ).ready(function() {
      minimizecategory.on('click', minimize);
      $("#filter").on('change', function() {
        $('.filter-by-cbox').html($("#filter").find('option:selected').text());
      });
      $("#show").on('change', function() {
        $('.show-cbox').html($("#show").find('option:selected').text());
      });

      filterByCbox.html($("#filter").find('option:selected').text());
      filterByTitle.html($("#filter").find('option:selected').text());
    });

    //--- MINIMIZE-MAXIMIZE
    function minimize() {
      minimizecategory.off();//prevent from spamming click

      if(categorylist.css('visibility', 'visible')) {
          categorylist.css('visibility', 'hidden');
          minimizecategory.html('+');
      }

      $('.minimize-category').on('click', maximize);
    }

    function maximize() {
      minimizecategory.off();//prevent from spamming click

      if(categorylist.css('visibility', 'hidden')) {
         categorylist.css('visibility', 'visible');
         minimizecategory.html('-');
      }

      $('.minimize-category').on('click', minimize);
    }
    //--- END MINIMIZE-MAXIMIZE

    //-- ITEM HOVER --
    $('.index-item').hover(function(){
        $('.index-item:hover').css('z-index', 10);
    });

    $('.index-item').mouseleave(function(){
      setTimeout(function(){
        $('.index-item').css('z-index', 0);
        $('.index-item:hover').css('z-index', 9);
      }, 300);
    });
    //-- END ITEM HOVER --
  </script>
@endsection
