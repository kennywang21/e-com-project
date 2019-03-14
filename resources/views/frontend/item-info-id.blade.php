@extends('layouts.master')

@section('styles')
  <style>
    .item-info-wrapper {
      margin-top: 25px;
    }

    .item-info-section {
      height: 350px;
      width: 100%;
    }

    .most-viewed {
      height: auto;
      width: 100%;
      margin-bottom: 10px;
      display: table;
    }

    .most-viewed-title {
      padding-left: 15px;
    }

    .item-most-viewed-wrapper {
      padding: 0px;
      margin-top: 10px;
      height: 180px;
      text-align: center;
      overflow: hidden;
      width: 930px;
    }

    .item-most-viewed {
      display: inline-block;
      margin: 0 7px;
      height: 180px;
      position: relative;
    }

    .item-most-viewed>a {
      position: absolute;
      height: inherit;
      width: inherit;
    }

    .item-info-pic {
      border-radius: 15px;
      border: 1px solid black;
      width: 201px;
      height: 201px;
    }

    .qty-input-form {
      width: 75px;
    }



    .size-btn {
      border-radius: 4px;
     background-color: #ffffff;
     padding: 5px 20px;
     color: red;
     margin-top: 5px;
     border: 1px solid red;
     display: inline-block;
     width: 56.203px;
    }

    .size-active,
    .size-btn:hover {
      background-color: red;
      color: #ffffff;
      border: none;
      padding: 6px 21px;
    }

    .tagging {
      border-radius: 2px;
      border: 1px solid #6A1B9A;
      background-color: #ffffff;
      padding: 2px 5px;
    }

    .tagging:hover {
      border: 1px solid #2ecc71;
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

    .a-wrapper>a {
        position: absolute;
        height: inherit;
        width: 100%;
    }

    .form-display {
      display: table;
    }
  </style>
@endsection

@section('title')
  Item
@endsection

@section('content')
    @include('includes._info-box')
    <div class="row" style="margin-left: 0px;
                            margin-right: 0px;"><!-- STYLE DON'T MOVE OUT -->
        <div class="col-md-2 left-side">

        </div>
        <div class="col-md-8 mid-side">
            <div class="item-info-wrapper">
                <div class="item-info-section" style="position: relative;
                                                      min-height: 350px;">

                  <div class="image-info" style="position: relative;
                                                 float: left;" >
                      <img class="item-info-pic" src="{{ URL::asset('images/product/'. $product->file_path) }}" alt="{{ $product->file_path }}">
                  </div>
                  <div class="" style="border-left: 1px solid #eeeeee;
                                       height: auto;
                                       float: left;
                                       margin-left: 20px;
                                       padding-left: 20px;">
                      <div class="" style="height: inherit;">
                        <h3 style="margin-top: 0px;">{{ $product->name }}</h3>
                        @if ($product->sale_price>1)
                            <h4>Harga: Rp <span>{{ $product->sale_price }}</span></h4>
                            <h4>Harga: Rp <span>{{ $product->price }}</span></h4>
                        @else
                            <h4>Harga: Rp <span>{{ $product->price }}</span></h4>
                        @endif
                        <div class="form-group">
                          {!! Form::open(['action' => 'CartController@edit', 'class' => 'form-display']) !!}
                          {!! Form::label('size', 'Size: ', ["class" => 'form-control-label']) !!}

                          <div class="" style="width: 321.625px;">
                            <?php $sizes = json_decode($product_sizes, true);
                                  $tags = json_decode($product_tags, true); ?>
                            @foreach ($sizes as $size)
                              <a class="size-btn" style="">
                                {{ $size['size'] }}
                              </a>
                            @endforeach

                            <span id="span"></span>
                          </div>
                        </div>
                        <div class="form-group">

                          {!! Form::label('qty', 'Qty: ', ["class" => 'form-control-label']) !!}
                          {!! Form::input('number', 'qty', 1, ["min" => 1, "class" => 'form-control qty-input-form']) !!}
                          {!! Form::hidden('size', null) !!}
                        </div>
                        <div class="form-group">
                          <a href="" style="color: red;"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>
                        </div>
                        <div class="form-group">
                          <h5>Tag:
                            <small>
                                @foreach ($tags as $tag)
                                    <a href="" class="tagging">{{ $tag['tag'] }}</a>
                                @endforeach
                            </small>
                          </h5>
                        </div>

                          <a class="" style="position: relative;
                                             display: table;
                                             color: #ffffff;">

                                {{ csrf_field() }}
                                <input type="submit" class="btn" style="padding: 5px 10px;
                                                                        padding-right: 30px;
                                                                        background-color: red;
                                                                        border-radius: 4px;
                                                                        display: table;" value="Add to Cart">
                                {!! Form::hidden('id', $product->id) !!}
                              {!! Form::close() !!}
                              <i class="fa fa-shopping-cart" style="position: absolute;
                                                                    top: 7px;
                                                                    right: 12px;
                                                                    font-size: 20px;"></i>
                          </a>
                      </div>
                  </div>
                </div>

                <div class="most-viewed">
                    <h4 class="most-viewed-title">Most Viewed</h4>
                    <hr style="margin-top: 0px;
                               margin-bottom: 0px;">
                    <div class="item-most-viewed-wrapper" style="">
                        <?php $i=0; $looping_new=0; ?>
                        @foreach ($all_products as $all_product)
                            <?php if($looping_new == 5) break; ?>
                            <?php $array = json_decode($all_product_tags[$i], true) ?>
                            @foreach ($array as $arr)
                                @if ($arr['tag'] == "Most Viewed")
                                      <div class="item-most-viewed a-wrapper"><a href="{{ route('product.page.id', ['id' => $all_product->id]) }}"></a>
                                          <div class="new-sale-wrapper" style="">
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
                                          <img class="most-viewed-pic" src="{{ asset('images/product/'. $all_product->file_path) }}" alt="{{ $all_product->file_path }}">
                                          <span class="item-most-viewed-name">{{ $all_product->name }}</span>
                                      </div>
                                  <?php $looping_new++; ?><!-- ONLY INCREMENT BY 1 IF THERE IS NEW PRODUCT DETECTED -->
                                @endif
                            @endforeach<!-- SHOW ONLY MOST VIEWED PRODUCTS -->
                            <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 right-side">

        </div>
    </div>
@endsection

@section('jquery')
  <script type="text/javascript">
    //SIZE CLICKED
    sizeBtn = $('.size-btn');

    sizeBtn.on('click', function() {
      $(this).siblings().removeClass('size-active');
      $(this).addClass('size-active');

      //trying to get the value of tag
      //$('#span').html($(this).text());
      //$('#span').html($('#size').val());

      $('#size').val(parseInt($(this).text()));
    });
    //END SIZE CLICKED
  </script>
@endsection
