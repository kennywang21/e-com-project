@extends('layouts.master')

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

  .login-wrapper {
    position: absolute;
    top: 30px;
    right: 50px;
    left: auto;
    z-index: 100;
  }

  .drop {
    overflow: hidden;
    border: 0;
    width: 386px;
    background-color: white;
    border-radius: 0 0 6px 6px;
  }

  .drop::before,.drop::after {
    position: absolute;
    display: block;
    border-style: solid;
    content: '';
    right: 70px;
    border-width: 10px;
  }

  .drop::before {
    top: -19px;
    border-color: transparent transparent #d5d5d5;
  }

  .drop::after {
    top: -18px;
    border-color: transparent transparent white;
  }

  .input-password {
    padding-right: 35px;
  }

  /* CART-WINDOW */
  .left-cart-item {
    display: table;
    float: left;
    height: 80px;
  }

  .right-cart-item {
    display: table;
    padding-left: 5px;
    height: 80px;
    position: relative;
  }

  .right-cart-item>span {
    display: block;
    line-height: normal;
  }

  .cart-item-name {
    font-weight: bold;
    font-size: 18px;
  }

  .cart-item-qty {
    font-weight: lighter;
  }

  .cart-item-price {
    font-weight: bold;
    font-size: 16px;
    position: absolute;
    bottom: 0;
  }

  .left-cart-item>img {
    width: 80px;
    height: 80px;
  }

  .cart-item-list-wrapper {
    display: table;
  }

  .cart-item-close-btn {
    position: absolute;
    right: 15px;
    font-size: 18px;
    font-weight: lighter;
  }
  /* END CART-WINDOW */

  /* 3 BARS TRANSITION TO X */
  #main-nav:hover {
      padding: 0;
  }

  #main-nav {
    margin: 0;
    z-index: 9999;
    font-family: helvetica, arial, sans-serif;
    width: 300px;
    text-align: left;
    font-size: 14px;
    line-height: 42px;
    display: inline-block;
    box-sizing: border-box;
    position: absolute;
    padding: 0;
  }

  #main-nav:hover ul {
      padding: 22px 0 20px;
      background: #144879;
  }

  #main-nav:hover ul .bb-menu-bar {
      background-color: #fff;
  }

  #main-nav ul {
      list-style: none;
      margin: 0;
      padding: 20px 0;
      background: transparent;
      transition: all 0.4s cubic-bezier(0, 1, 0.5, 1);
  }

  #main-nav ul li:nth-child(n+2) {
      max-height: 0;
      overflow-y: hidden;
      transition: all 0.4s cubic-bezier(0, 1, 0.5, 1);
  }

  #main-nav:hover ul li:nth-child(n+2) {
      max-height: 40px;
      transition: all 0.4s cubic-bezier(0, 1, 0.5, 1);
  }

  #main-nav:hover ul li {
      font-family: Helvetica,Arial,Sans-serif;
      font-size: 12px;
      margin: 0px;
      padding: 0px;
  }

  #main-nav:hover ul li.hamburger {
      /* left: 200px; */
      /* transition: all 0.7s ease-in-out; */
  }

  #main-nav ul li.hamburger {
      /* left: 0px; */
      padding: 0 40px;
      /* transition: all 0.5s ease-in-out; */
  }

  #main-nav ul li a {
      text-transform: uppercase;
      color: #fff;
      font-size: 14px;
      line-height: 40px;
      font-weight: bold;
      letter-spacing: .5px;
      display: block;
      padding: 0 40px;
      text-decoration: none;
  }

  #main-nav ul li a:hover {
      text-decoration: underline;
      outline: 0 !important;
  }

  #main-nav:hover ul li:not(.hamburger) a:hover {
      background: #fff;
      color: #144879;
  }

  #main-nav .bb-hamburger {
    display: inline-block;
  }

  .bb-menu {
    height: 12px;
    width: 25px;
    position: relative;
    transition: 0.3s;
    cursor: pointer;
  }

  .bb-menu-bar {
    height: 3px;
    width: 25px;
    display: block;
    position: relative;
    background-color: #144879;
    transition: 0.4s;
    position: absolute;
  }

  #main-nav .bb-hamburger .bb-menu:hover .bb-menu-bar:nth-of-type(1),
  #main-nav .bb-hamburger .bb-menu:hover .bb-menu-bar:nth-of-type(2),
  #main-nav .bb-hamburger .bb-menu:hover .bb-menu-bar:nth-of-type(3) {
      box-shadow: 1px 1px 1px rgba(0,0,0,.3);
  }
  /* 1st bar */
  .bb-hamburger .bb-menu-bar:nth-of-type(1) {
    top: 0px;
    transition: top 0.3s ease 0.3s, transform 0.3s ease-out 0.1s;
  }

  #main-nav:hover .bb-hamburger .bb-menu .bb-menu-bar:nth-of-type(1) {
    top: 7px;
    transform: rotate(45deg);
    transition: top 0.3s ease 0.1s, transform 0.3s ease-out 0.5s;
  }
  /* 2nd bar */
  .bb-hamburger .bb-menu-bar:nth-of-type(2) {
    top: 7px;
    transition: ease 0.3s 0.3s;
  }

  #main-nav:hover .bb-hamburger .bb-menu .bb-menu-bar:nth-of-type(2) {
    opacity: 0;
  }
  /* 3rd bar */
  .bb-hamburger .bb-menu-bar:nth-of-type(3) {
    top: 15px;
    transition: top 0.3s ease 0.3s, transform 0.3s ease-out 0.1s;
  }

  #main-nav:hover .bb-hamburger .bb-menu .bb-menu-bar:nth-of-type(3) {
    top: 7px;
    transform: rotate(-45deg);
    transition: top 0.3s ease 0.1s, transform 0.3s ease-out 0.5s;
  }
  /* 3 BARS TRANSITION TO X */


  </style>

@endsection

@section('content')
  <div class="container" style="height: auto;">
    <div class="testi-wrapper">
      <ul class="testi-ul">
        <li>
          <div class="testimonials-box" style="text-align: center;
                                               padding-top: 15px;
                                               display: inline-block;
                                               position: relative;">
             <h4 style=" margin: 30px 0;">Nama1</h4>
             <p><i>This book changed how i approach every problem...</i></p>
             <a href="#" style="position: absolute;
                                bottom: 25px;
                                right: 35px;">
             View more>></a>
          </div>
        </li>
        <li>
          <div class="testimonials-box" style="text-align: center;
                                                     padding-top: 15px;
                                                     display: inline-block;
                                                     position: relative;">
             <h4 style=" margin: 30px 0;">Nama2</h4>
             <p><i>This book.</i></p>
             <a href="#" style="position: absolute;
                                bottom: 25px;
                                right: 35px;">
             View more>></a>
          </div>
        </li>
        <li>
          <div class="testimonials-box" style="text-align: center;
                                               padding-top: 15px;
                                               display: inline-block;
                                               position: relative;">
             <h4 style=" margin: 30px 0;">Nama3</h4>
             <p><i>This book3.</i></p>
             <a href="#" style="position: absolute;
                                bottom: 25px;
                                right: 35px;">
             View more>></a>
          </div>
        </li>
        <li>
          <div class="testimonials-box" style="text-align: center;
                                                     padding-top: 15px;
                                                     display: inline-block;
                                                     position: relative;">
             <h4 style=" margin: 30px 0;">Nama4</h4>
             <p><i>This book4.</i></p>
             <a href="#" style="position: absolute;
                                bottom: 25px;
                                right: 35px;">
             View more>></a>
          </div>
        </li>
      </ul>
      <ul class="triggers-t" style="visibility: hidden;">
        <li><i class="" aria-hidden="true"></i></li>
        <li><i class="" aria-hidden="true"></i></li>
        <li><i class="" aria-hidden="true"></i></li>
        <li><i class="" aria-hidden="true"></i></li>
      </ul>
    </div>
    <h3>triggers_t length: </h3><h4 id="triggers_tl"></h4>
    <h3>lastElement: </h3><h4 id="lastElement"></h4>
    <h3>t_box width: </h3><h4 id="t_boxWidth"></h4>


    <!-- LOGIN FORM -->
    <div class="login-wrapper" style="visibility: visible;">
      <div class="drop" style="border: 1px solid #d5d5d5;
                               padding: 30px!important;">
         {!! Form::open() !!}
           <div class="form-group">
               {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control '.($errors->has('title')? 'has-error': '')]) !!}
           </div>
           <div class="form-group">
               {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control input-password'.($errors->has('title')? 'has-error': '')]) !!}
               <span><a href="#" style="position: absolute;
                                        top: 87px;
                                        right: 42px;
                                        font-size: 16px;" id="visible-password">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                      </a></span>
           </div>

           <div class="form-group">
               <a href="#">Lupa Password?</a>
           </div>
           <div class="form-group" style="margin-bottom: 0px;">
               {!! Form::submit('Login', ['class' => 'form-control btn btn-primary']) !!}
           </div>
         {!! Form::close() !!}
      </div>
    </div>
    <!-- END LOGIN FORM -->


  </div>


  <!-- 3 BARS TRANSITION TO X -->
  <div class="" style="position: absolute;
                       left: 750px;
                       top: 300px;"><!-- this first div just positioning this whole 3 bars -->
    <div id="main-nav" class="menu-main-navigation-container">
      <ul id="menu-main-navigation" class="nav">
        <li class="hamburger">
          <section class="bb-hamburger">
            <div class="bb-menu" style="height: 12px;
                                        width: 25px;
                                        position: relative;
                                        transition: 0.3s;
                                        cursor: pointer;">
              <div class="bb-menu-bar"></div>
              <div class="bb-menu-bar"></div>
              <div class="bb-menu-bar"> </div>
            </div>
          </section>
        </li>
        <li id="menu-item-22527261" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22527261"><a href="/guyism/">Guyism</a></li>
        <li id="menu-item-22527262" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22527262"><a href="/life/">Life</a></li>
        <li id="menu-item-22527263" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22527263"><a href="/girls/">Girls</a></li>
      </ul>
    </div>
  </div>
  <!-- END 3 BARS TRANSITION TO X -->

@endsection

@section('jquery')
  <!-- TESTIMONIALS -->
  <script type="text/javascript">
    var triggers_t = $('ul.triggers-t li');
    var t_box = $('ul.testi-ul li');
    var lastElement = triggers_t.length-1;//remaining element after the first
    var ul_testi = $('ul.testi-ul');
    var t_boxWidth = t_box.width();
    var target2;

    triggers_t.first().addClass('selected');


    ul_testi.css('width', t_boxWidth*(lastElement+1) +'px');
    $('#triggers_tl').html(triggers_t.length);
    $('#lastElement').html(lastElement);
    $('#t_boxWidth').html(t_boxWidth);

    function sliderResponse2(target2) {

    ul_testi.stop(true, false).animate({'left':'-'+ t_boxWidth*target2 +'px'},300);

    triggers_t.removeClass('selected').eq(target2).addClass('selected');
    }

    function sliderTiming2() {
    target2 = $('ul.triggers-t li.selected').index();
    target2 === lastElement ? target2 = 0 : target2 = target2+1;
    sliderResponse2(target2);
    }


    var timingRun = setInterval(function() { sliderTiming2(); },2000);

    //--- Additional ---

    function resetTiming2() {
    clearInterval(timingRun);
    timingRun = setInterval(function() { sliderTiming2(); },2000);
    }

    //trigger button *3 dots slider*
    triggers_t.click(function() {
    if ( !$(this).hasClass('selected') ) {
        target2 = $(this).index();
        sliderResponse2(target2);
        resetTiming2();
    }
    });

    //next and prev
    $('.next').click(function() {
      target2 = $('ul.triggers-t li.selected').index();
      target2 === lastElement ? target2 = 0 : target2 = target2+1;
      sliderResponse2(target2);
      resetTiming2();
    });

    $('.prev').click(function() {
      target2 = $('ul.triggers-t li.selected').index();
      lastElement = triggers_t.length-1;
      target2 === 0 ? target2 = lastElement : target2 = target2-1;
      sliderResponse2(target2);
      resetTiming2();
    });
    //--- END Additional ---
  </script>
  <!-- END OF TESTIMONIALS -->
  <script type="text/javascript">
    $( document ).ready(function() {
      $('#visible-password').on('click', openEye);
    });

    function openEye() {
      $('#visible-password').off();

      $('#visible-password i').removeClass('fa fa-eye-slash');
      $('#visible-password i').addClass('fa fa-eye');

      $('.input-password').prop({type:"text"});

      $('#visible-password').on('click', closeEye);
    }

    function closeEye() {
      $('#visible-password').off();

      $('#visible-password i').removeClass('fa fa-eye');
      $('#visible-password i').addClass('fa fa-eye-slash');

      $('.input-password').prop({type:"password"});

      $('#visible-password').on('click', openEye);
    }
  </script>
@endsection
