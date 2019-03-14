<header style="font-weight: lighter;">
<div>
  <nav class="header1" role="navigation">
    <div class="container-fluid">
    <div style="float: left;">
      <a class="" href="{{ route('index') }}" style="text-decoration: none;">
        <small style="font-size: 12px; color: red;">INGIN BERGABUNG MENJADI RESELLER?</small>
      </a>
    </div>

      <div class="nav navbar-nav navbar-right" style="padding-right: 15px;">
        <ul class="navbar-nav cus-nav">
            @if(!Auth::check())
              @if (auth()->guard('admins')->user())
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
              @else
                <li class="login"><a href="" onClick="return false;" id="login">LOGIN</a></li>
                <li><a href="{{ route('frontend.register') }}">REGISTER</a></li>
              @endif
            @else
                <li class="dropdown">
                    <a href="" onclick="return false" class="dropdown-toggle username-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                        {{ Auth::user()->name }}<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu" style="margin-top: 7px; box-shadow: none; padding: 0px; text-align: center;">
                        <li><a href="{{ route('daftar.pesanan') }}">Daftar Pesanan</a></li>
                        <li><a href="{{ route('settings') }}">Settings</a></li>
                        <li class="" style="">

                              {{Form::open(['route' => 'logout'])}}
                                {{Form::submit('Logout', ['class' => 'btn btn-no-style'])}}
                              {{Form::close()}}

                        </li>
                    </ul>
                </li>
            @endif

        </ul>
      </div>
    </div>
  </nav>
</header>

<header style="font-weight: lighter;">
  <nav class="" role="navigation">
    <div class="container-fluid row" style="margin-right: 0px;">
      <div class="navbar-header col-xs-3 brand" style="width: auto; text-align: center; padding-top: 10px;">
        <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ URL::asset('images/web-logo.png') }}" alt="mintandmauve-logo"/></a>
      </div>

      <div class="nav navbar-nav col-xs-7 main-header-center" style="padding-right: 0px;">
          <div style="margin: 0 auto;" class="text-center search-bar-form">
            {!! Form::open(['action' => 'ProductController@postSearch', 'class' => 'navbar-form']) !!}
              <img src="{{ URL::asset('images/search-black.png') }}" alt="search" class="search-black"/>

                  <input type="text" class="form-control search-bar" id="search" name='search' placeholder="Search" style="width: calc(65%);">
                  <input type="submit"
                         style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                         tabindex="-1" />
            </form>
          </div>
          <div class="main-menu" style="margin: 0 auto; display: table;">
            <ul class="nav navbar-nav main-navbar">
              <li class="{{ Request::is('/')? 'active':'' }}"><a href="{{ route('index') }}">Home</a></li>
              <li class="{{ Request::is('shop*')? 'active':'' }}"><a href="{{ route('shop', ['filter_id' => '0']) }}">Shop</a></li>
              <li class="{{ Request::is('sale*')? 'active':'' }}"><a href="{{ route('sale', ['filter_id' => '0']) }}">Sale</a></li>
            </ul>
          </div>
      </div>

        <div class="nav navbar-nav col-xs-1" style= "width: auto;">
            <div class="love-menu" style="margin:0;padding:0;padding: 26.5px 10px; padding-right: 12px;">
                <a href="" class="love"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="nav navbar-nav col-xs-1 shopping-bag" style= "width: 130px;">
            <div style="margin:0; padding:0; padding: 23.5px 0px; text-align: center;">
                <a href="" onclick="return false" id="cart">
                  <i class="fa fa-shopping-bag" aria-hidden="true" style="display: block;"></i>
                  @if (count($carts) == 0)
                      <span>{{ count($carts) }}</span>
                  @elseif (count($carts) == 1)
                      <span>{{ count($carts) }} product</span>
                  @elseif (count($carts) > 1)
                      <span>{{ count($carts) }} products</span>
                  @endif
                </a>
                <!-- CART WINDOW -->
                <div class="cart-window" style="visibility: hidden;
                                                width: 300px;
                                                position: absolute;
                                                right: 0;
                                                margin-top: 24px;
                                                z-index: 99;
                                                background-color: white;
                                                border-radius: 0 0 4px 4px">
                  <div class="" style="bottom: 50px;
                                       position: relative;
                                       border: 1px solid #d5d5d5;
                                       border-bottom: none;
                                       min-height: 50px;
                                       background-color: white;
                                       padding-bottom: .3px;
                                       position: relative;
                                       bottom: 50px;">
                     <div class="" style="border: 1px solid #d5d5d5;
                                          min-height: 90px;
                                          margin: 5px;
                                          padding-top: 7px;">
                        @if (count($carts) == 0)
                            <h3 style="text-align: center;"><b>Tidak ada Barang!</b></h3>
                        @endif

                        @foreach ($carts as $cart)
                            <div class="cart-item-list-wrapper">
                                <a class="cart-item-close-btn" href="{{ route('cart.product.remove', ['rowId' => $cart->rowId]) }}">x</a>
                                <div class="left-cart-item">
                                  <img src="{{ asset('/images/product/'. $cart->options->file_path) }}" style="">
                                </div>
                                <div class="right-cart-item">
                                  <span class="cart-item-name">{{ $cart->name }}</span>
                                  <span class="cart-item-size">Size: <span>{{ $cart->options->size }}</span></span>
                                  <span class="cart-item-qty">QTY: <span>{{ $cart->qty }}</span></span>
                                  <span class="cart-item-price">Rp <span>{{ $cart->price }}</span></span>
                                </div>
                            </div>
                        @endforeach
                     </div>
                  </div>
                  <a class="" style="position: absolute;
                                     padding: 10px;
                                     bottom: 0;
                                     right: 0px;
                                     border: none;
                                     width: 100%;
                                     height: 50px;
                                     background-color: red;
                                     color: white;
                                     font-size: 18px;
                                     font-weight: bold;
                                     text-align: center;
                                     border-radius: 0 0 4px 4px" href="{{ route('cart') }}">
                     Lihat Keranjang<i class="fa fa-shopping-bag" aria-hidden="true"></i>
                  </a>
                </div>
                <!-- END CART WINDOW -->
            </div>
        </div>
    </div>
  </nav>
</div>
</header>
