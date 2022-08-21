@extends('fontend.layouts.main')
@section('title', 'Trang phòng của bạn')
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

            /* background: #4CAF50; */
            color: white;
            padding: 15px;
            width: 100%;
            height: 400px;
            overflow: scroll;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
@section('content')
    <div class="page-heading">

        <div class="container">
            <h2> Phòng đã đặt</h2>
        </div>
    </div>
    <section class="course-listing-page">
        <div class="container">
            <h3>Cảm ơn {{ Auth::user()->name }} đã sử dụng dịch vụ của chúng tôi</h3>
            <br>
            <br>
            <div class="row">
                @if (count($myRooms) > 0)
                    <div class="col-xs-12">
                        <div class="history">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelHistory">
                                Lịch sử đặt phòng
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modelHistory" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color: black">Lịch sử đặt phòng của bạn
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>

                                                        <th>Mã hóa đơn
                                                        </th>
                                                        <th>Ngày bắt đầu
                                                        </th>
                                                        <th>Ngày kết thúc
                                                        </th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($myRooms as $key => $item)
                                                        <tr>

                                                            <td><a
                                                                    href="{{ route('billFinal.email', ['ip' => $item->name]) }}">{{ $item->name }}</a>
                                                            </td>
                                                            <td> {{ date('d-m-Y', strtotime($item->start_time)) }}
                                                                <br>
                                                                {{ \Carbon\Carbon::parse($item->start_time)->diffforHumans() }}

                                                            </td>
                                                            <td> {{ date('d-m-Y', strtotime($item->end_time)) }}
                                                                <br>
                                                                {{ \Carbon\Carbon::parse($item->end_time)->diffforHumans() }}

                                                            </td>

                                                            <td>
                                                                {{ number_format($item->total_money) }} VNĐ
                                                            </td>
                                                            <td>
                                                                @if ($item->pay_status == 0)
                                                                    <button class="btn btn-danger">Chưa thanh toán</button>
                                                                @else
                                                                    <button class="btn btn-success">Đã thanh toán</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Mã hóa đơn
                                    </th>
                                    <th>Ngày bắt đầu
                                    </th>
                                    <th>Ngày kết thúc
                                    </th>
                                    <th>Phòng thuê</th>
                                    <th>Dịch vụ </th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myRooms as $key => $item)
                                    @if ($item->end_time >= \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'))
                                        <tr>
                                            <td><a
                                                    href="{{ route('billFinal.email', ['ip' => $item->name]) }}">{{ $item->name }}</a>
                                            </td>
                                            <td> {{ date('d-m-Y', strtotime($item->start_time)) }}
                                                <br>
                                                {{ \Carbon\Carbon::parse($item->start_time)->diffforHumans() }}

                                            </td>
                                            <td> {{ date('d-m-Y', strtotime($item->end_time)) }}
                                                <br>
                                                {{ \Carbon\Carbon::parse($item->end_time)->diffforHumans() }}

                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modelIdRoom_{{ $item->id }}">
                                                    Xem
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modelIdRoom_{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="color: black">Phòng đã thuê
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="color: black">
                                                                <table class="table bill_sevices_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tên phòng</th>
                                                                            <th>Loại phòng</th>

                                                                            <th>Số ngày thuê</th>
                                                                            <th>Giá/ngày</th>
                                                                            <th>Tổng</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if ($item->rooms != null)
                                                                            <?php $date = \Carbon\Carbon::parse($item->start_time)
                                                                                ->diff(\Carbon\Carbon::parse($item->end_time))
                                                                                ->format('%d');
                                                                            $total_voucher = 0; ?>
                                                                            @foreach ($item->rooms as $key)
                                                                                <tr>
                                                                                    <td scope="row">{{ $key->name }}
                                                                                    </td>
                                                                                    <td> {{ $key->type_rooms_name }}</td>
                                                                                    <td>{{ $date }}
                                                                                        Ngày
                                                                                    </td>
                                                                                    <td>{{ number_format($key->type_rooms_price) }}
                                                                                        Vnđ
                                                                                    </td>
                                                                                    <td> {{ number_format($key->type_rooms_price * $date) }}
                                                                                        Vnđ
                                                                                        <?php
                                                                                        $item->percent = $item->percent != null ? $item->percent : 0;
                                                                                        $total_voucher = (($key->type_rooms_price * $date) / 100) * $item->percent; ?> <br>
                                                                                        <span style="color: red">Giảm
                                                                                            {{ $item->percent }}
                                                                                            %</span><br>
                                                                                        <span style="color: red">-
                                                                                            {{ number_format($total_voucher) }}
                                                                                            Vnđ

                                                                                        </span>
                                                                                    </td>

                                                                                </tr>
                                                                                <?php $tongRoom = $key->type_rooms_price * $date - $total_voucher; ?>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Tổng :{{ number_format($tongRoom) }}
                                                                                    Vnđ
                                                                                </td>
                                                                            </tr>
                                                                        @else
                                                                            <p style="color: black;padding:10px"> Không tìm
                                                                                thấy
                                                                                phòng</p>
                                                                        @endif


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modelId_{{ $item->id }}">
                                                    Xem
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modelId_{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" style="color: black">Các dịch vụ
                                                                    đã
                                                                    thuê
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="color: black">
                                                                <table class="table bill_sevices_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tên dịch vụ</th>
                                                                            <th>Số lượng</th>
                                                                            <th>Giá</th>
                                                                            <th>Tổng Tiền</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if ($item->bill_sevices != null)
                                                                            <?php $tong = 0; ?>
                                                                            @foreach ($item->bill_sevices as $key)
                                                                                <tr>
                                                                                    <td scope="row">{{ $key->svName }}
                                                                                    </td>
                                                                                    <td> {{ number_format($key->amount) }}
                                                                                    </td>
                                                                                    <td> {{ number_format($key->svPrice) }}
                                                                                        Vnđ</td>
                                                                                    <td> {{ number_format($key->total_many) }}
                                                                                        Vnđ
                                                                                    </td>


                                                                                </tr>
                                                                                <?php $tong += $key->total_many; ?>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Tổng :{{ number_format($tong) }} Vnđ
                                                                                </td>
                                                                            </tr>
                                                                        @else
                                                                            <p style="color: black;padding:10px"> Chưa có
                                                                                dịch
                                                                                vụ</p>
                                                                        @endif


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                {{ number_format($item->total_money) }} VNĐ
                                            </td>
                                            <td>
                                                @if ($item->pay_status == 0)
                                                    <button class="btn btn-danger">Chưa thanh toán</button>
                                                @else
                                                    <button class="btn btn-success">Đã thanh toán</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>

                        </table>





                    </div>
                    <div class="col-xs-6">
                        <h3>Bảng dịch vụ</h3>
                        <br>
                        <div id="overflowTest">
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
                            <form action="{{ route('fontend.room.addService') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label style="color: black" for="first_name">Nhập mã hóa đơn</label>
                                    <input type="text" value="{{ old('bill_name') ?? '' }}"
                                        placeholder="nhập mã hóa đơn" class="form-control" id="first_name"
                                        name="bill_name" required>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Dịch vụ
                                            </th>
                                            <th>Giá
                                            </th>
                                            <th>Chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $key => $item)
                                            <tr>

                                                <td>{{ $item->name }}</td>
                                                <td>{{ number_format($item->price) }} Vnđ</td>
                                                <td><input type="checkbox" multiple name="service[]"
                                                        value="{{ $item->id }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Thêm </button>
                            </form>
                        </div>
                    </div>
                @else
                    <h2>Bạn chưa đặt phòng nào .</h2>
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
