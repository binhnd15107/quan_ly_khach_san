@extends('backend.layouts.main')
@section('title', 'Quản lý voucher')
@section('page-title', 'Quản lý voucher')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4><a href="{{ route('admin.voucher.index') }}">Danh sách voucher </a> <button id="btDrop_"
                                data-toggle="tooltip" type="" title="Thùng rác" class="pd-setting-ed"><a
                                    href="{{ route('admin.voucher.soft.delete', ['soft_delete' => 1]) }}">
                                    <i style="color: #ffff" class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </h4>
                        <div class="add-product">
                            <a href="{{ route('admin.voucher.add') }}">Thêm mới voucher</a>
                        </div>
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
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'id')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'desc', 'orderBy' => 'id']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif

                                </th>
                                <th>Tên voucher @if (request()->sortBy == 'desc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'desc', 'orderBy' => 'name']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Quá trình</th>
                                <th>Ngày bắt đầu
                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'start_time')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'start_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'start_time')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'desc', 'orderBy' => 'start_time']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'start_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Ngày kết thúc
                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'end_time')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'end_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'end_time')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'desc', 'orderBy' => 'end_time']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'end_time']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>% giảm giá @if (request()->sortBy == 'desc' && request()->orderBy == 'discount_rate')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'discount_rate']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'discount_rate')
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'desc', 'orderBy' => 'discount_rate']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.voucher.index', ['sortBy' => 'esc', 'orderBy' => 'discount_rate']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
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



                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                                <a href="{{ route('admin.voucher.edit', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                            <button id="btDrop_{{ $item->id }}"
                                                onclick="btDrop({{ $item->id }})" data-toggle="tooltip"
                                                type="" title="Trash" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                            <form id="fromDrop_{{ $item->id }}"
                                                action="{{ route('admin.voucher.destroy', $item->id) }}" method="POST">
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="{{ asset('assets/js/typeroom/index.js') }}"></script>
    <script src="{{ asset('assets/js/room/fillter.js') }}"></script>
    <script></script>
@endsection
