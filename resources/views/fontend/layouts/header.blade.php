<header class="site-header">
    <div style="background: black" class="top-header">
        <div class="container">
            <div class="top-header-left">
                <div class="top-header-block">
                    <a href="mailto:info@educationpro.com" itemprop="email"><i class="fas fa-envelope"></i>
                        info@educationpro.com</a>
                </div>
                <div class="top-header-block">
                    <a href="tel:+9779813639131" itemprop="telephone"><i class="fas fa-phone"></i> +977
                        9813639131</a>
                </div>
            </div>
            <div class="top-header-right">

                <div class="social-block">
                    <ul class="social-list">
                        <li><a href=""><i class="fab fa-viber"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href=""><i class="fab fa-facebook-messenger"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-skype"></i></a></li>
                    </ul>
                </div>
                <div class="login-block">
                    <div class="dropdown">
                        <button style="padding: 3px;" class="btn btn-default dropdown-toggle" type="button"
                            id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="image_top"><img style="max-width:20px; max-height: 20px;"
                                    src="{{ Auth::user()->image }}"></span>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </button>
                        <ul style="background: black;color: black" class="dropdown-menu"
                            aria-labelledby="dropdownMenu1">
                            @if (Auth::user()->hasAnyRole(['nhan vien', 'admin']))
                                <li><a href="{{ route('dashboard') }}">Trang Admin</a></li>
                            @endif
                            <li><a href="#">T??i kho???n</a></li>
                            <li><a href="{{ route('fontend.room.myRoom') }}">Ph??ng c???a b???n</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    {{-- <a href="">Login /</a>
                    <a href="">Register</a> --}}
                </div> <!-- Page Content -->

                <div style="margin-left:20px" id="wrapper">
                    <div class="dropdown">
                        <button style="padding: 3px;" class="btn btn-default dropdown-toggle" type="button"
                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="image_top"><img style="max-width:20px; max-height: 20px;"
                                    src="{{ Auth::user()->image }}">Ph??ng ch???</span>

                            <span class="caret"></span>
                        </button>
                        <div style="width:500px;padding:10px" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            @if (Session::has('cart'))
                                <?php $cart = Session('cart'); ?>
                                <h4>{{ Auth::user()->name }} ??i ? B???n ch??a thanh to??n ph??ng n??y.</h4>
                                <br>
                                <h4>Ng??y nh???n :
                                    {{ Carbon\Carbon::parse($cart['start_time'])->format('d/m/Y') }}
                                    Ng??y tr???
                                    :{{ Carbon\Carbon::parse($cart['end_time'])->format('d/m/Y') }}
                                    <br> Th???i gian ??? th???c :{{ $cart['quantity'] }} ng??y
                                </h4>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th>???nh</th>
                                            <th>Ph??ng</th>
                                            <th>S??? ng??y</th>
                                            <th>Gi??/ng??y</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $total = 0; ?>
                                        {{-- @foreach (Session('cart') as $item) --}}
                                        <tr>

                                            <td style="width:160px"> <img style="width:100%"
                                                    src="{{ asset('assets/img/' . $cart['image']) }}" alt="">
                                            </td>
                                            <td> Lo???i {{ $cart['typeRoomName'] }} <br>
                                                S??? ph??ng {{ $cart['name'] }}
                                            </td>
                                            <td>{{ number_format($cart['quantity']) }} ng??y</td>
                                            <td>{{ number_format($cart['price']) }} Vn??</td>

                                        </tr>
                                        {{-- @endforeach --}}

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>T???ng ti???n</th>
                                            <th></th>
                                            <th></th>
                                            <th>{{ number_format($cart['total']) }} Vn??</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a href="{{ route('fontend.bill.formbill') }}" class="btn btn-primary">Thanh
                                    to??n</a>
                                <a href="{{ route('fontend.cart.clear') }}" class="btn btn-danger">H???y</a>
                            @else
                                <h4>Xin ch??o {{ Auth::user()->name }}.</h4>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- Top header Close -->
        <div style="background: #ffff;" class="main-header">
            <div class="container">
                <div class="logo-wrap" itemprop="logo">
                    <img src="{{ asset('frontEnd/images/site-logo.jpg') }}" alt="Logo Image">
                    <!-- <h1>Education</h1> -->
                </div>
                <div class="nav-wrap">
                    <nav class="nav-desktop">
                        <ul class="menu-list">
                            <li><a href="{{ route('fontend.dashboard') }}">Trang ch???</a></li>
                            <li><a href="{{ route('fontend.rooms') }}">?????t ph??ng</a></li>
                            <li><a href="">B??i vi???t</a></li>
                            <li><a href="{{ route('fontend.contact.add') }}">Li??n h???</a></li>
                            <li><a href="">Gi???i thi???u</a></li>
                        </ul>
                    </nav>
                    <div id="bar">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div id="close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
