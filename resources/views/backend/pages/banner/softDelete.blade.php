@extends('backend.layouts.main')
@section('title', 'Danh sách banner đã xóa')
@section('page-title', 'Danh sách banner đã xóa')
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
                                        <a href="{{ route('admin.banner.index') }}" class="pe-3">
                                            Danh sách banner
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item px-3 text-muted">Các banner đã xóa </li>
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
                            <thead>
                                <tr>
                                    <th>ID
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
                                @if (count($banner) > 0)
                                    @foreach ($banner as $item)
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
                                                <button data-toggle="tooltip" title="Khôi phục" class="pd-setting-ed">
                                                    <a href="{{ route('admin.banner.soft.backup', $item->id) }}"><i
                                                            class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i></a></button>


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
                        {{ $banner->appends(request()->all())->links('pagination::bootstrap-4') }}
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
