@extends('backend.layouts.main')
@section('title', 'Danh sách tài khoản đã xóa')
@section('page-title', 'Danh sách tài khoản đã xóa')
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
                                        <a href="{{ route('admin.user.index') }}" class="pe-3">
                                            Danh sách tài khoản
                                        </a>

                                    </li>
                                    <li class="breadcrumb-item px-3 text-muted">Các tài khoản đã xóa </li>
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
                                <th>Ảnh</th>
                                <th>Tên tài khoản
                                </th>
                                <th>email</th>
                                <th>Thuộc quyền
                                </th>
                                <th>

                                </th>
                            </tr>
                            @if (count($dataUser) > 0)
                                @foreach ($dataUser as $item)
                                    <tr>
                                        <td>{{ $item->id }}
                                        </td>
                                        <td><img src="{{ $item->image }}" alt=""></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if ($item->role_id == config('util.ROlE_ADMIN'))
                                                <button class="btn btn-primary">Admin</button>
                                            @elseif($item->role_id == config('util.ROlE_NV'))
                                                <button class="btn btn-info">Nhân viên</button>
                                            @else
                                                <button class="btn btn-success">Khách hàng</button>
                                            @endif
                                        </td>


                                        <td>
                                            <button data-toggle="tooltip" title="Khôi phục" class="pd-setting-ed">
                                                <a href="{{ route('admin.user.soft.backup', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h2>Không tìm user</h2>
                            @endif
                        </table>
                        <div class="custom-pagination text-center">
                            {{ $dataUser->appends(request()->all())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('assets/js/typeroom/index.js') }}"></script>
    <script></script>

@endsection
