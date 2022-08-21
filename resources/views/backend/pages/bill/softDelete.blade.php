@extends('backend.layouts.main')
@section('title', 'Danh sách bill đã xóa')
@section('page-title', 'Danh sách bill đã xóa')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <ol class="breadcrumb text-muted fs-6 fw-bold">
                                    <li class="breadcrumb-item pe-3">
                                        <a href="{{ route('admin.bill.index') }}" class="pe-3">
                                            Danh sách bill
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item px-3 text-muted">Các bill đã xóa </li>
                                </ol>
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

                                </th>
                                <th>Mã hóa đơn
                                </th>
                                <th>Trạng thái</th>
                                <th>Người thuê</th>
                                <th>Ngày bắt đầu

                                </th>
                                <th>Ngày kết thúc

                                </th>

                                <th>Tổng tiền</th>
                                <th>

                                </th>
                            </tr>

                            @if (count($dataBill) > 0)
                                @foreach ($dataBill as $item)
                                    <tr>
                                        <td>{{ $item->id }}
                                        </td>
                                        <td><a href="">{{ $item->name }}</a>
                                        </td>
                                        <td>
                                            @if ($item->pay_status == 0)
                                                <button class="btn btn-danger">Chưa thanh toán</button>
                                            @else
                                                <button class="btn btn-success">Đã thanh toán</button>
                                            @endif
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
                                            {{ number_format($item->total_money) }} VNĐ
                                        </td>
                                        <td>
                                            <button data-toggle="tooltip" title="Khôi phục" class="pd-setting-ed">
                                                <a href="{{ route('admin.bill.soft.backup', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                        </td>
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

@endsection
@section('page-script')
    <script src="{{ asset('assets/js/typeroom/index.js') }}"></script>
    <script src="{{ asset('assets/js/room/fillter.js') }}"></script>
    <script></script>
@endsection
