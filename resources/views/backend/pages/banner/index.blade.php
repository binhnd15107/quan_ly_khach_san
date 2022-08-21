@extends('backend.layouts.main')
@section('title', 'Quản lý banner')
@section('page-title', 'Quản lý banner')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4><a href="{{ route('admin.banner.index') }}">Danh sách banner </a> <button id="btDrop_"
                                data-toggle="tooltip" type="" title="Thùng rác" class="pd-setting-ed"><a
                                    href="{{ route('admin.banner.soft.delete', ['soft_delete' => 1]) }}">
                                    <i style="color: #ffff" class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </h4>

                        <div class="add-product">
                            <a href="{{ route('admin.banner.add') }}">Thêm mới banner</a>
                        </div>

                        <div
                            class="input-group mg-b-pro-edt col-12 col-lg-4 col-sx-12 col-md-12 col-sm-12 col-xxl-4 col-xl-4">

                            <span class="input-group-addon"><i class="icon nalika-like" aria-hidden="true"></i></span>
                            <select data-hide-search="false" name="bannerable_id" value=""
                                class="form-control pro-edt-select form-control-primary select2">
                                <option value="">Thuộc thành phần</option>
                                <option {{ request('bannerable_id') == config('util.BANNER_DB') ? 'selected' : '' }}
                                    value="1">
                                    Trang chủ
                                </option>
                                <option {{ request('bannerable_id') == config('util.BANNER_ROOM') ? 'selected' : '' }}
                                    value="2">
                                    Trang phòng
                                </option>
                                <option {{ request('bannerable_id') == config('util.BANNER_POST') ? 'selected' : '' }}
                                    value="3">
                                    Trang bài viết
                                </option>
                            </select>

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
                            <thead>
                                <tr>
                                    <th>ID

                                        @if (request()->sortBy == 'desc' && request()->orderBy == 'id')
                                            <a
                                                href="{{ route('admin.banner.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                                <i class="fa  fa-arrow-down"></i></a>
                                        @elseif(request()->sortBy == 'esc' && request()->orderBy == 'id')
                                            <a
                                                href="{{ route('admin.banner.index', ['sortBy' => 'desc', 'orderBy' => 'id']) }}">
                                                <i class="fa fa-arrow-up"></i></a>
                                        @else
                                            <a
                                                href="{{ route('admin.banner.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                                <i class="fa  fa-arrow-down"></i></a>
                                        @endif

                                    </th>

                                    <th>Banner</th>
                                    <th>Thuộc thành phần</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhập</th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($dataBanner) > 0)
                                    @foreach ($dataBanner as $item)
                                        <tr>
                                            <td>{{ $item->id }}
                                            </td>
                                            <td><img style="width:300px;height:150px"
                                                    src="{{ asset('assets/img/' . $item->image) ?? $item->image }}"
                                                    alt=""></td>

                                            <td>
                                                @if ($item->bannerable_id == config('util.BANNER_DB'))
                                                    <button class="pd-setting">Trang chủ </button>
                                                @elseif($item->bannerable_id == config('util.BANNER_POST'))
                                                    <button class="pd-setting">Bài viết </button>
                                                @else
                                                    <button class="pd-setting">Loại phòng</button>
                                                @endif
                                            </td>
                                            <td> {{ date('d-m-Y H:i', strtotime($item->created_at)) }}
                                                <br>
                                                {{ \Carbon\Carbon::parse($item->created_at)->diffforHumans() }}

                                            </td>
                                            <td>
                                                {{ date('d-m-Y H:i', strtotime($item->updated_at)) }}
                                                <br>
                                                {{ \Carbon\Carbon::parse($item->updated_at)->diffforHumans() }}

                                            </td>
                                            <td>



                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                                    <a href="{{ route('admin.banner.edit', $item->id) }}"><i
                                                            class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i></a></button>
                                                <button id="btDrop_{{ $item->id }}"
                                                    onclick="btDrop({{ $item->id }})" data-toggle="tooltip"
                                                    type="" title="Trash" class="pd-setting-ed">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                                <form id="fromDrop_{{ $item->id }}"
                                                    action="{{ route('admin.banner.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h2>Không tìm thấy phòng</h2>
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <div class="custom-pagination text-center">
                        {{ $dataBanner->appends(request()->all())->links('pagination::bootstrap-4') }}
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
