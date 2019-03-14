<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>-->
    <meta name="viewport" content="width=960px, initial-scale=1.0, user-scalable=yes"/>
    <!-- Add image before title tag -->
    <link rel="icon" type="image/gif/png" href="{{ URL::asset('images/title-img.png') }}">
    <!-- END Add image before title tag -->
    <title>MintandMauve - @yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
    crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <script
      src="http://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>

    <style>
      ul {list-style: none;}

      .nav .open > a, .nav .open > a:hover, .nav .open > a:focus, .nav .open > a:visited {
        background-color: transparent;
        text-decoration: none;
      }

      .main-navbar > li > a:hover, .main-navbar > li > a:focus {
        text-decoration: none;
        background-color: transparent;
      }

      a:hover, a:focus {
        color: #6A1B9A;
        text-decoration: none;
      }

      a:hover {
        text-decoration: none;
        color: #2ecc71;
      }

      .dropdown-menu {

      }

      .dropdown-menu>li>a {
        padding: 5px;
      }

      #visible-password,
      #visible-password:visited,
      #visible-password:focus {
        color: #6A1B9A;
      }
      #visible-password:hover {
        color: #2ecc71;
      }

      /*--- LOGIN ---*/
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
        border-radius: 0 0 4px 4px;
      }

      .drop::before,.drop::after {
        position: absolute;
        display: block;
        border-style: solid;
        content: '';
        right: 75px;
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
      /*--- END LOGIN ---*/

      /* CART-WINDOW */
      .cart-window {
        top: 109px;
      }

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
        text-align: left;
      }

      .cart-item-name {
        font-weight: bolder;
        font-size: 18px;
      }

      .cart-item-size, .cart-item-qty {
        font-weight: lighter;
      }

      .cart-item-price {
        font-weight: bold;
        font-size: 12pt;
        position: absolute;
        bottom: 0;
        width: 150px;
      }

      .left-cart-item>img {
        width: 80px;
        height: 80px;
      }

      .cart-item-list-wrapper {
        display: table;
        padding: 7px;
        position: relative;
        width: 100%;
        border-bottom :1px solid lightgray;
      }
      .cart-item-list-wrapper:last-child {
        border-bottom :none;
      }

      .cart-item-close-btn {
        position: absolute;
        right: 15px;
        font-size: 18px;
        font-weight: lighter;
        padding-top: 0px;
        top: 5px;
      }
      /* END CART-WINDOW */

      .btn-no-style {
        background-color: transparent;
        width: 100%;
      }
    </style>

    @yield('styles')
  </head>
  <body>
    <!-- appear when login clicked -->
    <div class="black-background" style="
                                         width: 100%;
                                         background-color: rgba(255, 255, 255, .7);
                                         position: absolute;
                                         z-index: 99;
                                         bottom: 0;
                                         visibility: hidden;"></div>
    <!---->
    <!-- LOGIN -->
    <div class="login-wrapper" style="visibility: hidden;">
      <div class="drop" style="border: 1px solid #d5d5d5;
                               padding: 30px!important;">
         {!! Form::open(['action' => 'Auth\LoginController@login']) !!}
           <div class="form-group">
               {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control '.($errors->has('title')? 'has-error': '')]) !!}
               <div class="alert-warning">
                 @if( $errors->has('email') )
                    {{ "Please check your email" }}
                 @endif
               </div>
           </div>
           <div class="form-group" style="position: relative;">
               {!! Form::password('password', ['id' => 'password', 'placeholder' => 'Password', 'class' => 'form-control input-password'.($errors->has('title')? 'has-error': '')]) !!}
               <div class="alert-warning">
                 @if( $errors->has('password') )
                    {{ "Please check your password" }}
                 @endif
               </div>

               <span><a href="#" style="position: absolute;
                                        top: 6px;
                                        right: 12px;
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
    <!-- END LOGIN -->

    @include('includes._header')
    @yield('content')
    @include('includes._footer')

  @yield('jquery')
  <script type="text/javascript">
    //-- LOGIN PASSWORD FIELD VISIBILITY --
    $( document ).ready(function() {
      $('#visible-password').on('click', openEye);

      //IF PAGE HAS ERROR(LOGIN ERRORS-> EMAIL, PASSWORD)
      @if ($errors->has('email') || $errors->has('password'))
        loginVisible();
      @endif

      
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
    //-- END LOGIN PASSWORD FIELD VISIBILITY --

    //-- LOGIN LINK ONCLICK --
    $('#login').on('click', loginVisible);

    function loginVisible() {
      $('#login').off();
      $('.login-wrapper').css({'visibility': 'visible'});
      $('.cart-window').css({'visibility': 'hidden'});
      $('.black-background').css({'visibility': 'visible',
                                  'height': 'calc(100% - 30px)',
                                  'background-color': 'rgba(0, 0, 0, .7)'});

      $('#login').on('click', loginHidden);
      $('#cart').on('click', cartWindowVisible);
    }

    function loginHidden() {
      $('#login').off();
      $('.login-wrapper').css('visibility', 'hidden');
      blackBackground();

      $('#login').on('click', loginVisible);
    }

    $('.black-background').on('click', function() {
      $('.login-wrapper').css({'visibility': 'hidden'});
      $('.cart-window').css({'visibility': 'hidden'});
      blackBackground();

      $('#login').on('click', loginVisible);
      $('#cart').on('click', cartWindowVisible);
    })

    function blackBackground() {
      $('.black-background').css({'visibility': 'hidden',
                                  'background-color': 'rgba(0, 0, 0, 0)'});
    }
    //-- END LOGIN LINK ONCLICK --

    //-- CART-WINDOW --
    $('#cart').on('click', cartWindowVisible);

    function cartWindowVisible() {
      $('#cart').off();
      $('.cart-window').css('visibility', 'visible');
      $('.black-background').css({'visibility': 'visible',
                                  'height': 'calc(100% - 113px)',
                                  'background-color': 'rgba(0, 0, 0, .7)'});

      $('#cart').on('click', cartWindowHidden);
    }

    function cartWindowHidden() {
      $('#cart').off();
      $('.cart-window').css('visibility', 'hidden');
      blackBackground();

      $('#cart').on('click', cartWindowVisible);
    }
    //-- END CART-WINDOW --

    //-- CUS-WINDOW --
    $('.dropdown').on('click', openCusWindow);

    function openCusWindow() {
      $('.dropdown').off();
      $('.dropdown').addClass('open');

      $('.dropdown').on('click', closeCusWindow);
    }

    function closeCusWindow() {
      $('.dropdown').off();
      $('.dropdown').removeClass('open');

      $('.dropdown').on('click', openCusWindow);
    }
    //-- END CUS-WINDOW --
  </script>
  </body>
</html>
