@extends('backend.layouts.main')
@section('title', 'Danh sách voucher đã xóa')
@section('page-title', 'Danh sách voucher đã xóa')
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
                                        <a href="{{ route('admin.voucher.index') }}" class="pe-3">
                                            Danh sách voucher
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item px-3 text-muted">Các voucher đã xóa </li>
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
                                <th>Tên voucher
                                </th>
                                <th>Quá trình</th>
                                <th>Ngày bắt đầu

                                </th>
                                <th>Ngày kết thúc

                                </th>
                                <th>% giảm giá
                                </th>
                                <th>Hạn chế</th>
                                <th>Mô tả</th>
                                <th>

                                </th>
                            </tr>

                            @if (count($dataVoucher) > 0)
                                @foreach ($dataVoucher as $item)
                                    <tr>
                                        <td>{{ $item->id }}
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if (\Carbon\Carbon::parse($item->start_time)->toDateTimeString() >
                                                \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString())
                                                <span class="btn btn-primary">Sắp diễn ra </span>
                                            @elseif (\Carbon\Carbon::parse($item->end_time)->toDateTimeString() >
                                                \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString())
                                                <span class="btn btn-success">Đang diễn ra </span>
                                            @else
                                                <span class="btn btn-danger">Đã hết hạn </span>
                                            @endif
                                        </td>
                                        <td> {{ date('d-m-Y H:i', strtotime($item->start_time)) }}
                                            <br>
                                            {{ \Carbon\Carbon::parse($item->start_time)->diffforHumans() }}

                                        </td>
                                        <td> {{ date('d-m-Y H:i', strtotime($item->end_time)) }}
                                            <br>
                                            {{ \Carbon\Carbon::parse($item->end_time)->diffforHumans() }}

                                        </td>
                                        <td>
                                            <button class="pd-setting">{{ number_format($item->discount_rate) }}
                                                %</button>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary " type="button"
                                                    id="triggerId_{{ $item->id }}" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Xem
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="triggerId_{{ $item->id }}">

                                                    @if ($item->limit != null)
                                                        @php
                                                            $objRoom = \App\Models\room::whereIn('id', json_decode($item->limit, true))->get();
                                                        @endphp
                                                        @foreach ($objRoom as $key)
                                                            <a style="padding:10px" class="dropdown-item disabled"
                                                                href="#">Phòng: {{ $key->name }}</a> <br>
                                                        @endforeach
                                                    @else
                                                        <p style="color: black;padding:10px"> Không hạn chế đối với phòng
                                                            nào</p>
                                                    @endif
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
                                                            <h5 class="modal-title" style="color: black">Giới thiệu về
                                                                Voucher {{ $item->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="color: black">
                                                            {!! $item->describe !!}
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



                                            <button data-toggle="tooltip" title="Khôi phục" class="pd-setting-ed">
                                                <a href="{{ route('admin.voucher.soft.backup', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>

                    </div>
                </div>


            </div>
        </div>
        </td>
        </tr>
        @endforeach
    @else
        <h2>Không tìm Voucher</h2>
        @endif
        </table>
        <div class="custom-pagination text-center">
            {{ $dataVoucher->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
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
