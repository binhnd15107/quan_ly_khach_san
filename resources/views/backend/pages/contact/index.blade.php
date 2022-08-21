@extends('backend.layouts.main')
@section('title', 'Quản lý phản hồi')
@section('page-title', 'Quản lý phản hồi')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4><a href="{{ route('admin.contact.index') }}">Danh sách phản hồi </a> <button id="btDrop_"
                                data-toggle="tooltip" type="" title="Thùng rác" class="pd-setting-ed"><a
                                    href="{{ route('admin.contact.soft.delete', ['soft_delete' => 1]) }}">
                                    <i style="color: #ffff" class="fa fa-trash-o" aria-hidden="true"></i> </a></button>
                        </h4>
                        {{-- <div class="add-product">
                            <a href="{{ route('admin.typeroom.create') }}">Thêm mới loại phòng</a>
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
                                <th>Mã



                                </th>
                                <th>Khách hàng
                                </th>
                                <th>Nội dung</th>
                                <th>Thời gian
                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'created_at')
                                        <a
                                            href="{{ route('admin.contact.index', ['sortBy' => 'esc', 'orderBy' => 'created_at']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'created_at')
                                        <a
                                            href="{{ route('admin.contact.index', ['sortBy' => 'desc', 'orderBy' => 'created_at']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.contact.index', ['sortBy' => 'esc', 'orderBy' => 'created_at']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Trạng thái</th>
                                <th>

                                </th>
                            </tr>
                            @if (count($contacts) > 0)
                                @foreach ($contacts as $item)
                                    <tr>
                                        <td>{{ $item->id }}
                                        </td>
                                        <td>{{ $item->uName }} - {{ $item->uEmail }}
                                        </td>
                                        <td>
                                            {{ $item->content }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->created_at)->toDateTimeString() }}

                                        </td>
                                        <td>
                                            <form style="display: flex" id="formUpdateStatus"
                                                action="{{ route('admin.contact.edit', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <select style="width:70%" data-hide-search="false" name="publish_content"
                                                    value="{{ old('publish_content') }}"
                                                    class="form-control pro-edt-select form-control-primary select2">


                                                    <option {{ $item->publish_content == 1 ? 'selected' : '' }}
                                                        value="1">
                                                        public
                                                    </option>
                                                    <option {{ $item->publish_content == 0 ? 'selected' : '' }}
                                                        value="0">
                                                        private
                                                    </option>
                                                </select>
                                                <button class="btn btn-primary" type="submit">ok</button>
                                            </form>
                                        </td>
                                        <td>



                                            <button id="btDrop_{{ $item->id }}" onclick="btDrop({{ $item->id }})"
                                                data-toggle="tooltip" type="" title="Trash" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                            <form id="fromDrop_{{ $item->id }}"
                                                action="{{ route('admin.contact.destroy', $item->id) }}" method="POST">
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
        <h2>Không tìm phản hồi</h2>
        @endif
        </table>
        <div class="custom-pagination text-center">
            {{ $contacts->appends(request()->all())->links('pagination::bootstrap-4') }}
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

@endsection
