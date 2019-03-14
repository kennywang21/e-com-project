@extends('layouts.master')

@section('title')
  Home
@endsection

@section('styles')
  <script type="text/javascript">
  $( document ).ready( function() {
    var sliderNav = $('ul.triggers');
    var maskDiv = $('.mask');
    sliderNav.css('left', (maskDiv.width()/2 - sliderNav.width()/2) +'px');
  });
  </script>

  <style>
  .testi-ul {
    list-style: none;
    position: relative;
    top: 0;
    left: 0;
    padding: 0;
    margin: 0;
  }

  .testi-ul li {
    float:left;
  }

  .testimonials-box {
    width: 420px;
    height: 250px;
  }

  .testi-wrapper {
    width: 480px;
    height: 270px;
    overflow: hidden;
  }
  /* new-sale */
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
      width: inherit;
  }
  </style>
@endsection

@section('content')
    @include('includes._slider')
    @include('includes._after-slider')
    <div class="container">
        @include('includes._info-box')
        <div class="top-row">
            <div class=" mid-side">
                <div class="mid-list" style="text-align: center;">
                    <!-- New Products -->
                    <section class="new-products">
                        <div>
                          <h3>New Products</h3>
                          <span><a href="{{ route('shop', ['filter_id' => '0']) }}" class="view-more">View more>></a></span>
                        </div>
                        <div class="index-item-wrapper">
                          <?php $i=0; $looping_new=0; ?>
                          @foreach ($products as $product)
                              <?php if($looping_new == 4) break; ?>
                              <?php $array = json_decode($product_tags[$i], true) ?>
                              @foreach ($array as $arr)
                                  @if ($arr['tag'] == "New")
                                        <div class="index-item a-wrapper"><a href="{{ route('product.page.id', ['id' => $product->id]) }}"></a>
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
                                            <img class="index-item-pic" src="{{ asset('images/product/'. $product->file_path) }}" alt="{{ $product->file_path }}">
                                            <span class="item-name">{{ $product->name }}</span>
                                            <span class="item-price">Rp {{ $product->price }}</span>
                                            <div class="discount">
                                                <span class="item-price-discount"><del>Rp {{ $product->sale_price }}</del></span>
                                            </div>
                                            <div class="cart-like">
                                                <a class="add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="like-item"><i class="fa fa-heart"></i></a>
                                            </div>
                                        </div>
                                    <?php $looping_new++; ?><!-- ONLY INCREMENT BY 1 IF THERE IS NEW PRODUCT DETECTED -->
                                  @endif
                              @endforeach<!-- SHOW ONLY NEW PRODUCTS -->
                              <?php $i++ ?>
                          @endforeach
                      </div>
                  </section>
                  <!-- Popular Products -->
                  <section class="popular-products">
                      <div>
                        <h3>Popular Products</h3>
                        <span><a href="{{ route('shop', ['filter_id' => '1']) }}" class="view-more">View more>></a></span>
                      </div>
                      <div class="index-item-wrapper">
                        <?php $i=0; $looping_new=0; ?>
                        @foreach ($products as $product)
                            <?php if($looping_new == 4) break; ?>
                            <?php $array = json_decode($product_tags[$i], true) ?>
                            @foreach ($array as $arr)
                                @if ($arr['tag'] == "Popular")
                                      <div class="index-item a-wrapper"><a href="{{ route('product.page.id', ['id' => $product->id]) }}"></a>
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
                                          <img class="index-item-pic" src="{{ asset('images/product/'. $product->file_path) }}" alt="{{ $product->file_path }}">
                                          <span class="item-name">{{ $product->name }}</span>
                                          <span class="item-price">Rp {{ $product->price }}</span>
                                          <div class="discount">
                                              <span class="item-price-discount"><del>Rp {{ $product->sale_price }}</del></span>
                                          </div>
                                          <div class="cart-like">
                                              <a class="add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                              <a class="like-item"><i class="fa fa-heart"></i></a>
                                          </div>
                                      </div>
                                  <?php $looping_new++; ?><!-- ONLY INCREMENT BY 1 IF THERE IS NEW PRODUCT DETECTED -->
                                @endif
                            @endforeach<!-- SHOW ONLY NEW PRODUCTS -->
                            <?php $i++ ?>
                        @endforeach
                    </div>
                </section>
                <!-- Most Viewed Products -->
                <section class="most-viewed">
                    <div>
                      <h3>Most Viewed</h3>
                      <span><a href="{{ route('shop', ['filter_id' => '2']) }}" class="view-more">View more>></a></span>
                    </div>
                    <div class="index-item-wrapper">
                      <?php $i=0; $looping_new=0; ?>
                      @foreach ($products as $product)
                          <?php if($looping_new == 4) break; ?>
                          <?php $array = json_decode($product_tags[$i], true) ?>
                          @foreach ($array as $arr)
                              @if ($arr['tag'] == "Most Viewed")
                                    <div class="index-item a-wrapper"><a href="{{ route('product.page.id', ['id' => $product->id]) }}"></a>
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
                                        <img class="index-item-pic" src="{{ asset('images/product/'. $product->file_path) }}" alt="{{ $product->file_path }}">
                                        <span class="item-name">{{ $product->name }}</span>
                                        <span class="item-price">Rp {{ $product->price }}</span>
                                        <div class="discount">
                                            <span class="item-price-discount"><del>Rp {{ $product->sale_price }}</del></span>
                                        </div>
                                        <div class="cart-like">
                                            <a class="add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="like-item"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                <?php $looping_new++; ?><!-- ONLY INCREMENT BY 1 IF THERE IS NEW PRODUCT DETECTED -->
                              @endif
                          @endforeach<!-- SHOW ONLY MOST VIEWED PRODUCTS -->
                          <?php $i++ ?>
                      @endforeach
                  </div>
              </section>
                </div>
            </div>
        </div>
    </div>

    <div class="follow-us-on-instagram" style="position: relative;">
        <div class="darken-follow-us" style="background-color: rgba(0, 0, 0, 0.8);
                                             width: inherit;
                                             height: 100%;
                                             z-index: -1;
                                             position: absolute;
                                             right: auto;
                                             left: 0px;"></div>
        <h2 style="color: white;
                   padding-top: 50px;
                   padding-bottom: 30px;
                   font-weight: 800;">FOLLOW US ON INSTAGRAM</h2>
        <!-- LightWidget WIDGET -->
        <script src="//lightwidget.com/widgets/lightwidget.js"></script>
        <div class=""><iframe src="//lightwidget.com/widgets/7373ce71c2645fcf8720ccf8d31d88d8.html"
                  scrolling="no"
                  allowtransparency="true"
                  class="lightwidget-widget"
                  style="width: 100%; border: 0; overflow: hidden;"></iframe></div>
    </div>
@endsection

@section('jquery')
  <!-- SLIDER -->
  <script type="text/javascript">
    var triggers = $('ul.triggers li');
    var images = $('ul.images li');
    var lastElem = triggers.length-1;
    var mask = $('.mask ul.images');
    var imgWidth = images.width();
    var target;

    triggers.first().addClass('selected');
    mask.css('width', imgWidth*(lastElem+1) +'px');

    function sliderResponse(target) {
    mask.stop(true, false).animate({'left':'-'+ imgWidth*target +'px'},300);
    triggers.removeClass('selected').eq(target).addClass('selected');
    }

    triggers.click(function() {
    if ( !$(this).hasClass('selected') ) {
        target = $(this).index();
        sliderResponse(target);
        resetTiming();
    }
    });

    $('.next').click(function() {
    target = $('ul.triggers li.selected').index();
    target === lastElem ? target = 0 : target = target+1;
    sliderResponse(target);
    resetTiming();
    });

    $('.prev').click(function() {
    target = $('ul.triggers li.selected').index();
    lastElem = triggers.length-1;
    target === 0 ? target = lastElem : target = target-1;
    sliderResponse(target);
    resetTiming();
    });

    function sliderTiming() {
    target = $('ul.triggers li.selected').index();
    target === lastElem ? target = 0 : target = target+1;
    sliderResponse(target);
    }
    var timingRun = setInterval(function() { sliderTiming(); },5000);

    function resetTiming() {
    clearInterval(timingRun);

    timingRun = setInterval(function() { sliderTiming(); },5000);
    }
  </script>
  <!-- END OF SLIDER -->

  <!-- TESTIMONIALS -->
  <script type="text/javascript">
    var triggers_t = $('ul.triggers-t li');
    var t_box = $('ul.testi-ul li');
    var lastElement = triggers_t.length-1;
    var ul_testi = $('ul.testi-ul');
    var t_boxWidth = t_box.width();
    var target2;

    triggers_t.first().addClass('selected');
    ul_testi.css('width', t_boxWidth*(lastElement+1) +'px');

    function sliderResponse2(target2) {
      ul_testi.stop(true,false).animate({'left':'-'+ t_boxWidth*target2 +'px'},300);
      triggers_t.removeClass('selected').eq(target2).addClass('selected');
    }

    function sliderTiming2() {
      target2 = $('ul.triggers-t li.selected').index();
      target2 === lastElement ? target2 = 0 : target2 = target2+1;
      sliderResponse2(target2);
    }

    //run the slider testimonials
    var timingRun2 = setInterval(function() { sliderTiming2(); },5000);
  </script>
  <!-- END OF TESTIMONIALS -->

  <script type="text/javascript">
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
