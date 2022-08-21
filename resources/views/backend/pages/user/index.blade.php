@extends('backend.layouts.main')
@section('title', 'Quản lý tài khoản')
@section('page-title', 'Quản lý tài khoản')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">

                        <h4><a href="{{ route('admin.user.index') }}">Danh sách tài khoản </a>
                            <button id="btDrop_" data-toggle="tooltip" type="" title="Thùng rác" class="pd-setting-ed">
                                <a href="{{ route('admin.user.soft.delete', ['soft_delete' => 1]) }}">
                                    <i style="color: #ffff" class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                        </h4>
                        <div
                            class="input-group mg-b-pro-edt col-12 col-lg-4 col-sx-12 col-md-12 col-sm-12 col-xxl-4 col-xl-4">
                            <span class="input-group-addon"><i class="icon nalika-like" aria-hidden="true"></i></span>
                            <select data-hide-search="false" name="roles_id" value=""
                                class="form-control pro-edt-select form-control-primary ">
                                <option value="">Thuộc quyền</option>
                                @foreach ($roles as $item)
                                    <option {{ request('roles_id') == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        {{-- <div class="add-product">
                            <a href="{{ route('admin.service.add') }}">Thêm mới dịch vụ</a>
                        </div> --}}

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
                                        <a href="{{ route('admin.user.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'id')
                                        <a href="{{ route('admin.user.index', ['sortBy' => 'desc', 'orderBy' => 'id']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a href="{{ route('admin.user.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif

                                </th>
                                <th>Ảnh</th>
                                <th>Tên tài khoản @if (request()->sortBy == 'desc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.user.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.user.index', ['sortBy' => 'desc', 'orderBy' => 'name']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.user.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>email</th>
                                <th>Thuộc quyền
                                </th>
                                <td>Cập nhật quyền</td>

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
                                            <form action="{{ route('admin.user.update.role', $item->id) }}" method="post">
                                                @csrf
                                                <div style="display: flex" class="row">
                                                    <div class="col-8">
                                                        <select style="width:150px" class="form-control " name="role_id"
                                                            id="">
                                                            <option
                                                                {{ $item->role_id == config('util.ROlE_ADMIN') ? 'selected' : '' }}
                                                                value="1">
                                                                Admin</option>
                                                            <option
                                                                {{ $item->role_id == config('util.ROlE_NV') ? 'selected' : '' }}
                                                                value="2">Nhân viên</option>
                                                            <option
                                                                {{ $item->role_id == config('util.ROlE_KH') ? 'selected' : '' }}
                                                                value="3">Khách hàng</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="submit"
                                                            class="btn btn-ctl-bt waves-effect waves-light m-r-10">ok</button>
                                                    </div>
                                                </div>



                                            </form>
                                        </td>

                                        <td>
                                            {{-- <button data-toggle="tooltip" title="Edit" class="pd-setting-ed">
                                                <a href="{{ route('admin.service.edit', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button> --}}
                                            <button id="btDrop_{{ $item->id }}" onclick="btDrop({{ $item->id }})"
                                                data-toggle="tooltip" type="" title="Trash" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                            <form id="fromDrop_{{ $item->id }}"
                                                action="{{ route('admin.user.destroy', $item->id) }}" method="POST">
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
    <script src="{{ asset('assets/js/room/fillter.js') }}"></script>
    <script></script>
@endsection
