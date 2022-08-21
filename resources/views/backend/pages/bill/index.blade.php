@extends('backend.layouts.main')
@section('title', 'Quản lý hóa đơn')
@section('page-title', 'Quản lý hóa đơn')
@section('page-css')
    <style>
        #formUpdateStatus {
            display: flex
        }

        .bill_sevices_table thead tr th {
            color: black
        }

        .bill_sevices_table tbody tr td {
            color: black
        }
    </style>
@endsection

@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4><a href="{{ route('admin.bill.index') }}">Danh sách hóa đơn </a> <button id="btDrop_"
                                data-toggle="tooltip" type="" title="Thùng rác" class="pd-setting-ed"><a
                                    href="{{ route('admin.bill.soft.delete', ['soft_delete' => 1]) }}">
                                    <i style="color: #ffff" class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                        </h4>

                        <div style="background: black;color:#ffff"
                            class="input-group mg-b-pro-edt col-12 col-lg-4 col-sx-12 col-md-12 col-sm-12 col-xxl-4 col-xl-4">

                            <div id="reportrange"
                                style="background:black; cursor: pointer; padding: 10px 10px; border: 1px solid #ccc; width: 100%">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>

                        </div>

                        <?php //Hiển thị thông báo thành công
                        ?>
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
                        <table>
                            <tr>
                                <th>ID

                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'id')
                                        <a href="{{ route('admin.bill.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'id')
                                        <a href="{{ route('admin.bill.index', ['sortBy' => 'desc', 'orderBy' => 'id']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a href="{{ route('admin.bill.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif

                                </th>
                                <th>Mã hóa đơn @if (request()->sortBy == 'desc' && request()->orderBy == 'name')
                                        <a href="{{ route('admin.bill.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.bill.index', ['sortBy' => 'desc', 'orderBy' => 'name']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a href="{{ route('admin.bill.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Trạng thái</th>
                                <th>Người thuê</th>
                                <th>Ngày bắt đầu
                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'start_time')
                                        <a
                                            href="{{ route('admin.bill.index', ['sortBy' => 'esc', 'orderBy' => 'start_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'start_time')
                                        <a
                                            href="{{ route('admin.bill.index', ['sortBy' => 'desc', 'orderBy' => 'start_time']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.bill.index', ['sortBy' => 'esc', 'orderBy' => 'start_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Ngày kết thúc
                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'end_time')
                                        <a
                                            href="{{ route('admin.bill.index', ['sortBy' => 'esc', 'orderBy' => 'end_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'end_time')
                                        <a
                                            href="{{ route('admin.bill.index', ['sortBy' => 'desc', 'orderBy' => 'end_time']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'end_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Phòng thuê</th>
                                <th>Dịch Vụ</th>
                                <th>Tổng tiền</th>
                                <th>

                                </th>
                            </tr>

                            @if (count($dataBill) > 0)
                                @foreach ($bills as $item)
                                    <tr>
                                        <td>{{ $item->id }}
                                        </td>
                                        <td><a
                                                href="{{ route('billFinal.email', ['ip' => $item->name]) }}">{{ $item->name }}</a>
                                        </td>
                                        <td>
                                            <form id="formUpdateStatus"
                                                action="{{ route('admin.bill.updatePay', $item->id) }}" method="post">
                                                @csrf
                                                <select style="width:70%" data-hide-search="false" name="pay_status"
                                                    value="{{ old('pay_status') }}"
                                                    class="form-control pro-edt-select form-control-primary select2">


                                                    <option {{ $item->pay_status == 0 ? 'selected' : '' }} value="0">
                                                        Chưa thanh toán
                                                    </option>
                                                    <option {{ $item->pay_status == 1 ? 'selected' : '' }} value="1">
                                                        Đã thanh toán
                                                    </option>
                                                </select>
                                                <button class="btn btn-primary" type="submit">ok</button>
                                            </form>
                                        </td>
                                        <td> {{ $item->uName }}- ID {{ $item->uId }}</td>

                                        <td> {{ date('d-m-Y H:i', strtotime($item->start_time)) }}
                                            <br>
                                            {{ \Carbon\Carbon::parse($item->start_time)->diffforHumans() }}

                                        </td>
                                        <td> {{ date('d-m-Y H:i', strtotime($item->end_time)) }}
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
                                                                            <td>Tổng :{{ number_format($tongRoom) }} Vnđ
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
                                                            <h5 class="modal-title" style="color: black">Các dịch vụ đã
                                                                dùng
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
                                                                                <td> {{ number_format($key->amount) }}</td>
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
                                                                            <td>Tổng :{{ number_format($tong) }} Vnđ </td>
                                                                        </tr>
                                                                    @else
                                                                        <p style="color: black;padding:10px"> Chưa có dịch
                                                                            vụ</p>
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
                                            {{ number_format($item->total_money) }} VNĐ
                                        </td>
                                        <td>



                                            {{-- <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                                <a href="{{ route('admin.bill.edit', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button> --}}
                                            <button id="btDrop_{{ $item->id }}"
                                                onclick="btDrop({{ $item->id }})" data-toggle="tooltip"
                                                type="" title="Trash" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                            <form id="fromDrop_{{ $item->id }}"
                                                action="{{ route('admin.bill.destroy', $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                            </form>
                    </div>
                </div>


            </div>
        </div>
        </td>
        </tr>
        @endforeach
    @else
        <h2>Không tìm hóa đơn</h2>
        @endif
        </table>
        <div class="custom-pagination text-center">
            {{ $dataBill->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('page-script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="{{ asset('assets/js/typeroom/index.js') }}"></script>
    <script src="{{ asset('assets/js/room/fillter.js') }}"></script>
    <script></script>
@endsection
