@extends('fontend.layouts.main')
@section('title', 'Trang phòng')
@section('page-title', 'Trang phòng')
@section('page-css')
    <style>
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

        /* Styling;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   */
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
    </style>
@section('content')
    <div class="page-heading">

        <div class="container">
            <h2>Danh sách phòng trống </h2>
            <br>
            <h3>(&nbsp
                @if (request('start_time_room') != null)
                    {{ Carbon\Carbon::parse(request('start_time_room'))->format('d/m/Y') }}&nbsp
                @else
                    {{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') }}&nbsp
                @endif

                =>
                @if (request('end_time_room') != null)
                    {{ Carbon\Carbon::parse(request('end_time_room'))->format('d/m/Y') }}&nbsp)
                @else
                    {{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y') }}&nbsp)
                @endif
            </h3>
        </div>

    </div>
    <section class="course-listing-page">
        <div class="container">
            {{-- <div class="row-fillter">
                <div class="input-group mg-b-pro-edt ">
                    <input placeholder="Enter* tìm kiếm" value="{{ request('q') ?? '' }}" type="text" name="q"
                        class="form-control pro-edt-select form-control-primary select2">
                </div>
                <div class="input-group mg-b-pro-edt ">

                    <select data-hide-search="false" name="type_room_id" value=""
                        class="form-control pro-edt-select form-control-primary select2">
                        <option value="">Chọn loại phòng</option>
                        @foreach ($typeRooms as $item)
                            <option {{ request('type_room_id') == $item->id ? 'selected' : '' }}
                                value="{{ $item->id }}">
                                {{ $item->name }} - {{ number_format($item->price) }} Vnđ
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="fillterPrice">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="slider-range"></div>
                        </div>
                    </div>
                    <div class="row slider-labels">
                        <div class="col-xs-6 caption">
                            <strong>Min:</strong> <span id="slider-range-value1"></span>
                        </div>
                        <div class="col-xs-6 text-right caption">
                            <strong>Max:</strong> <span id="slider-range-value2"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form>
                                <input type="hidden" name="min-price" value="{{ request('min-price') ?? 500000 }}">
                                <input type="hidden" name="max-price" value="{{ request('max-price') ?? 1000000 }}">
                                <button id="formFillterPrice" type="button">ok</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br> --}}
            <div>
                <div class="grid" id="cGridd">
                    @if (count($rooms) > 0)
                        @foreach ($rooms as $key => $item)
                            <div style="" class="grid-item business" data-category="business">
                                <div class="img-wrap">
                                    <img style="height:300px;" src="{{ asset('assets/img/' . $item->image) }}"
                                        alt="courses picture">
                                </div>
                                <a style="transform: translateY(70px)" data-id="{{ $item->id }}"
                                    class="learn-desining-banner-course detail-room">Đặt
                                    lịch ngay>>></a>
                                <div class="box-body">
                                    <section>
                                        <p><span>Loại :</span>{{ $item->typeRoomName }}</p>
                                        <p><span>Phòng :</span> {{ $item->name }}</p>
                                        <p><span>Giá :</span> {{ number_format($item->price) }}Vnđ</p>
                                    </section>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2>Rất tiếc hiện tại đang không có phòng trống </h2>
                    @endif
                </div>
                <div class="custom-pagination text-center">
                    {{ $rooms->appends(request()->all())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
    <section class="page-heading">
        <div class="container">
            <h2>Bài viết</h2>
        </div>
    </section>
    <section class="latest-news">
        <div class="container" itemprop="event" itemscope itemtype=" http://schema.org/Event">
            <div class="owl-two owl-carousel">
                <div class="news-wrap" itemprop="event">
                    <div class="news-img-wrap" itemprop="image">
                        <img src="{{ asset('frontEnd/images/latest-new-img.jpg') }}" alt="Latest News Images">
                    </div>
                    <div class="news-detail" itemprop="description">
                        <a href="">
                            <h1>Orientation Programme for new Students.</h1>
                        </a>
                        <h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

                        <p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students..
                            Orientatin Programmes for new Students</p>
                    </div>
                </div>

                <div class="news-wrap" itemprop="event">
                    <div class="news-img-wrap" itemprop="image">
                        <img src="{{ asset('frontEnd/images/latest-new-img.jpg') }}" alt="Latest News Images">
                    </div>
                    <div class="news-detail" itemprop="description">
                        <a href="">
                            <h1>Orientation Programme for new Students.</h1>
                        </a>
                        <h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

                        <p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students..
                            Orientatin Programmes for new Students</p>
                    </div>
                </div>

                <div class="news-wrap" itemprop="event">
                    <div class="news-img-wrap" itemprop="image">
                        <img src="{{ asset('frontEnd/images/latest-new-img.jpg') }}" alt="Latest News Images">
                    </div>
                    <div class="news-detail" itemprop="description">
                        <a href="">
                            <h1>Orientation Programme for new Students.</h1>
                        </a>
                        <h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

                        <p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students..
                            Orientatin Programmes for new Students</p>
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

@endsection
