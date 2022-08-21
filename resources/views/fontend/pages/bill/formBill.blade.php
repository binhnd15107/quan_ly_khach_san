@extends('fontend.layouts.main')
@section('title', 'Trang phòng')
@section('page-title', 'Trang phòng')
@section('page-css')
    <style>
        .news-img-wrap {
            color: black;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border: 1px solid rgba(0, 0, 0, 0.2)
        }

        .owl-carousel .owl-stage-outer {
            height: 250px
        }

        #overflowTest {
            margin-left: 20px;
            background: #4CAF50;
            color: white;
            padding: 15px;
            width: 100%;
            height: 500px;
            overflow: scroll;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
@section('content')
    <div class="page-heading">

        <div class="container">
            <h2> Hóa đơn thanh toán</h2>
        </div>
    </div>
    <section class="course-listing-page">
        <div class="container">
            <h3>Cảm ơn {{ Auth::user()->name }} đã sử dụng dịch vụ của chúng tôi</h3>
            <br>
            <br>
            <div class="row">
                @if (Session::has('cart'))
                    <div class="col-xs-12">

                        <?php $cart = Session('cart');
                        $total_voucher = 0;
                        $total_bill = 0;
                        ?>
                        <h4>Ngày nhận :
                            {{ Carbon\Carbon::parse($cart['start_time'])->format('d/m/Y') }}
                            Ngày trả
                            :{{ Carbon\Carbon::parse($cart['end_time'])->format('d/m/Y') }}

                            <br> <br> Thời gian ở thực :{{ $cart['quantity'] }} ngày
                        </h4>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Ảnh</th>
                                    <th>Phòng</th>
                                    <th>Số ngày</th>
                                    <th>Giá/ngày</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach (Session('cart') as $key => $item) --}}
                                <tr>

                                    <td style="width:160px"> <img style="width:100%"
                                            src="{{ asset('assets/img/' . $cart['image']) }}" alt="">
                                    </td>
                                    <td> Loại {{ $cart['typeRoomName'] }} <br>
                                        Số phòng {{ $cart['name'] }}
                                    </td>
                                    <td>{{ number_format($cart['quantity']) }} ngày</td>
                                    <td>{{ number_format($cart['price']) }} Vnđ <br>
                                    </td>
                                    <td>{{ number_format($cart['total']) }} Vnđ <br>
                                        @if (isset($addVoucher))
                                            <?php
                                            $cart['voucher'] = $addVoucher->discount_rate;
                                            $total_voucher = ($cart['total'] / 100) * $addVoucher->discount_rate;
                                            $cart['total_voucher'] = $total_voucher;
                                            Session(['cart' => $cart]);
                                            ?>

                                            <span style="color: red">Giảm {{ $addVoucher->discount_rate }} %</span><br>
                                            <span style="color: red">-
                                                {{ number_format($total_voucher) }}
                                                Vnđ
                                            </span>
                                        @endif
                                    </td>



                                </tr>
                                {{-- @endforeach --}}

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                    <th></th>
                                    <td></td>
                                    <th>
                                        <?php $total_bill = $cart['total'] - $total_voucher; ?>
                                        {{ number_format($total_bill) }} Vnđ</th>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        <h3>Mã khuyến mại</h3>
                        <br>
                        <section style="width:70%" class="latest-news">
                            <div class="owl-two owl-carousel">
                                @if (count($voucher) > 0)
                                    @foreach ($voucher as $item)
                                        <div class="news-wrap" itemprop="event">

                                            <div class="news-img-wrap" itemprop="image">

                                                <h3>{{ $item->name }} - Giảm {{ $item->discount_rate }} %</h3>
                                                <br>
                                                <h4 itemprop="startDate">HSD
                                                    |{{ Carbon\Carbon::parse($item->start_time)->format('d/m/Y') }} đến
                                                    {{ Carbon\Carbon::parse($item->end_time)->format('d/m/Y') }} </h4>
                                                <br>
                                                <p>Lưu ý : Mỗi tài khoản chỉ được áp dụng 1 lần.
                                                    <br>
                                                </p>
                                                <br>
                                                @if ($item->limit != null && in_array($cart['id'], json_decode($item->limit)))
                                                    <a href="" class="btn btn-danger">Không áp dụng với phòng
                                                        này</a>
                                                @elseif(request('voucher') == $item->id)
                                                    <a class="btn btn-success">Đã sử dụng</a>
                                                    <a href="{{ route('fontend.bill.formbill') }}"
                                                        class="btn btn-danger">Hủy</a>
                                                @else
                                                    <a href="{{ route('fontend.bill.formbill', ['voucher' => $item->id]) }}"
                                                        class="btn btn-primary">Áp mã</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            <?php //Hiển thị thông báo lỗi
                            ?>
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ Session::get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                        </section>
                        <form action="{{ route('fontend.bill.addbill') }}" method="post">
                            @csrf
                            <input type="hidden" name="start_time" value="{{ $cart['start_time'] }}">
                            <input type="hidden" name="end_time" value="{{ $cart['end_time'] }}">
                            <input type="hidden" name="kh_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="total_money" value="{{ $total_bill }}">
                            <input type="number" hidden name="room_id" value="{{ $cart['id'] }}">
                            @if (isset($addVoucher))
                                <input type="hidden" name="id_voucher" value="{{ $addVoucher->id }}">
                            @endif
                            <button class="btn btn-primary">Thanh toán</button>
                        </form>



                    </div>
                    {{-- <div class="col-xs-4">
                        <h3 style="margin-left: 20px">Bảng dịch vụ</h3>
                        <br>
                        <div id="overflowTest">

                        </div>
                    </div> --}}
                @else
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                    <?php //Hiển thị thông báo lỗi
                    ?>
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                @endif
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
