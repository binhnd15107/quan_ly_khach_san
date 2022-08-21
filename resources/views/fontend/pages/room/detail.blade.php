@extends('fontend.layouts.main')
@section('title', 'Trang phòng')
@section('page-title', 'Trang phòng')
@section('page-css')
    {{-- <style>
     #cGridd {
            display: grid;
               grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 30px
        }

        .row-fillter {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 30px;

        }

        .slider-labels {
            margin-top: 10px;
        }

        /* Functional styling;
                                                                                                                                                                                                                                                                                                                                                                         * These styles are required for noUiSlider to function.
                                                                                                                                                                                                                                                                                                                                                                         * You don't need to change these rules to apply your design.
                                                                                                                                                                                                                                                                                                                                                                         */
        .noUi-target,
        .noUi-target * {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -ms-touch-action: none;
            touch-action: none;
            -ms-user-select: none;
            -moz-user-select: none;
            user-select: none;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .noUi-target {
            position: relative;
            direction: ltr;
        }

        .noUi-base {
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 1;
            /* Fix 401 */
        }

        .noUi-origin {
            position: absolute;
            right: 0;
            top: 0;
            left: 0;
            bottom: 0;
        }

        .noUi-handle {
            position: relative;
            z-index: 1;
        }

        .noUi-stacking .noUi-handle {
            /* This class is applied to the lower origin when
                                                                                                                                                                                                                                                                                                                                                                           its values is > 50%. */
            z-index: 10;
        }

        .noUi-state-tap .noUi-origin {
            -webkit-transition: left 0.3s, top .3s;
            transition: left 0.3s, top .3s;
        }

        .noUi-state-drag * {
            cursor: inherit !important;
        }

        /* Painting and performance;
                                                                                                                                                                                                                                                                                                                                                                         * Browsers can paint handles in their own layer.
                                                                                                                                                                                                                                                                                                                                                                         */
        .noUi-base,
        .noUi-handle {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        /* Slider size and handle placement;
                                                                                                                                                                                                                                                                                                                                                                         */
        .noUi-horizontal {
            height: 4px;
        }

        .noUi-horizontal .noUi-handle {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            left: -7px;
            top: -7px;
            background-color: #345DBB;
        }

        /* Styling;
                                                                                                                                                                                                                                                                                                                                                                         */
        .noUi-background {
            background: #D6D7D9;
        }

        .noUi-connect {
            background: #345DBB;
            -webkit-transition: background 450ms;
            transition: background 450ms;
        }

        .noUi-origin {
            border-radius: 2px;
        }

        .noUi-target {
            border-radius: 2px;
        }

        .noUi-target.noUi-connect {}

        /* Handles and cursors;
                                                                                                                                                                                                                                                                                                                                                                         */
        .noUi-draggable {
            cursor: w-resize;
        }

        .noUi-vertical .noUi-draggable {
            cursor: n-resize;
        }

        .noUi-handle {
            cursor: default;
            -webkit-box-sizing: content-box !important;
            -moz-box-sizing: content-box !important;
            box-sizing: content-box !important;
        }

        .noUi-handle:active {
            border: 8px solid #345DBB;
            border: 8px solid rgba(53, 93, 187, 0.38);
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            left: -14px;
            top: -14px;
        }

        /* Disabled state;
                                                                                                                                                                                                                                                                                                                                                                         */
        [disabled].noUi-connect,
        [disabled] .noUi-connect {
            background: #B8B8B8;
        }

        [disabled].noUi-origin,
        [disabled] .noUi-handle {
            cursor: not-allowed;
        }

        /* This line can be removed it was just for display on CodePen: */
    </style> --}}
@section('content')
    <section class="page-content" id="course-page">
        <div class="container">
            <main class="course-detail">
                <h2>Chào {{ Auth::user()->name }}</h2>
                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#" class="thumbnail">
                            <img style="width:100%" src="{{ asset('assets/img/' . $findRoom->image) }}"
                                alt="Boats at Phi Phi, Thailand">
                        </a>
                    </div>
                    <div class="col-xs-6 ">
                        <div class="row">
                            @if ($findRoom->images != null)
                                @foreach (json_decode($findRoom->images, true) as $img)
                                    <div class="col-xs-6">
                                        <a href="#" class="thumbnail">
                                            <img style="width:100%" src="{{ asset('assets/img/' . $img) }}"
                                                alt="Rob Roy Glacier near Wanaka, New Zealand">
                                        </a>
                                    </div>
                                    {{-- <img style="width:30%" alt=""> --}}
                                @endforeach
                            @endif
                        </div>
                    </div>



                </div>
                <header>
                    <div class="course-box">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>Loại {{ $findRoom->typeRoomName }}</p>
                        <p>Số phòng: {{ $findRoom->name }}</p>
                    </div>
                    <div class="course-box">
                        <i class="fas fa-money-check-alt"></i>
                        <p>{{ number_format($findRoom->price) }} Vnđ / Ngày</p>
                        <p>(Giá cố định)</p>
                    </div>
                    <div class="course-box">
                        <i class="far fa-clock"></i>
                        <p>Đang trống</p>
                        <p>(&nbsp
                            {{ Carbon\Carbon::parse(request('start_time_room'))->format('d/m/Y') ?? Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') }}
                            =>
                            {{ Carbon\Carbon::parse(request('end_time_room'))->format('d/m/Y') ??Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y') }}&nbsp)
                        </p>
                    </div>

                    <div class="course-box">
                        <button id="order-room" data-id="{{ $findRoom->id }}">Đặt Ngay</button>
                    </div>
                </header>
                <article>
                    <section class="course-intro">
                        <h3>Giới thiệu</h3>
                        <br>
                        {!! $findRoom->describe !!}
                    </section>
                </article>
            </main>
            <aside>
                <div style="margin-left:20px;" class="box-form-search-room">
                    <div style="width:400px;height:50%" class="container">
                        <form action="{{ route('fontend.rooms') }}" method="GET">
                            <h3> Tìm phòng</h3>
                            <br>

                            <label for="accountId">Ngày nhận</label>
                            <input min="{{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString() }}" type="date"
                                name="start_time_room" class="form-control"
                                value="{{ request('start_time_room') ?? Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString() }}"
                                placeholder=".col-xs-5">
                            <br>
                            <label for="accountId">Ngày trả</label>
                            <input type="date" min="" name="end_time_room"
                                value="{{ request('end_time_room') ??Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addDay()->toDateString() }}"
                                class="form-control" placeholder=".col-xs-3">

                            <br>
                            <label for="accountId">Chọn mức giá</label>
                            <select data-hide-search="false" name="type_room_id" value=""
                                class="form-control pro-edt-select form-control-primary select2">
                                <option value="">Chọn mức giá phòng </option>
                                @foreach ($typeRooms as $item)
                                    <option {{ $findRoom->type_room_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">
                                        Loại {{ $item->name }} - {{ number_format($item->price) }} Vnđ /phòng
                                    </option>
                                @endforeach
                            </select>


                            <br>
                            <button class="btn btn-primary" type="submit">Tìm phòng</button>
                        </form>
                    </div>
                </div>
                {{-- <div class="reserve-course">
                    <h2>Reserve this course</h2>
                    <form>
                        <input type="text" placeholder="Your Name*" required>
                        <input type="email" name="userEmail" placeholder="Your Email Address..." required>
                        <input type="text" placeholder="Your Occupation*" required>
                        <input type="text" placeholder="Choose course*" required>
                        <textarea placeholder="Write your message"></textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div> --}}
                <!-- New Letter Ends -->

                <!-- Recent Post Close -->
            </aside>
        </div>
    </section>
    <section class="recent-course-single">
        <div class="container">
            <h2>Danh sách phòng trống cùng thời điểm</h2>
            {{-- <h3>(&nbsp
                {{ Carbon\Carbon::parse(request('start_time_room'))->format('d/m/Y') ?? Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') }}
                =>
                {{ Carbon\Carbon::parse(request('end_time_room'))->format('d/m/Y') ??Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y') }}&nbsp)
            </h3> --}}
            {{-- <div class="page-heading">
                <div class="container">
                    <h2>Danh sách phòng hôm nay</h2>
                </div>
            </div> --}}
            <!-- Popular courses End -->
            <div class="learn-courses">
                <div class="container">
                    <div class="courses">
                        <div class="owl-one owl-carousel">
                            @if (count($rooms) > 0)
                                @foreach ($rooms as $key => $item)
                                    <div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
                                        <div class="img-wrap" itemprop="image"><img style="height: 250px"
                                                src="{{ asset('assets/img/' . $item->image) }}" alt="courses picture">
                                        </div>
                                        <a data-id="{{ $item->id }}" style="transform: translateY(50px)"
                                            class="learn-desining-banner detail-room" itemprop="name">Đặt
                                            lịch ngay
                                            >>></a>
                                        <div class="box-body" itemprop="description">
                                            <p></p>
                                            <section itemprop="time">
                                                <p><span>Loại :</span>{{ $item->typeRoomName }}</p>
                                                <p><span>Phòng :</span> {{ $item->name }}</p>
                                                <p><span>Giá :</span> {{ number_format($item->price) }}Vnđ</p>
                                            </section>
                                        </div>
                                    </div>
                                @endforeach

                            @endif



                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Latest News CLosed -->
    <section class="query-section">
        <div class="container">
            <p>Any Queries? Ask us a question at<a href="tel:+9779813639131"><i class="fas fa-phone"></i> +977
                    9813639131</a></p>
        </div>
    </section>
@endsection
@section('page-js')
    {{-- <script src="{{ asset('assets/js/room/fillter.js') }}"></script> --}}
    @if (Session::has('cart'))
        <script>
            $('#dropdownMenu2').click()
        </script>
    @endif
@endsection
