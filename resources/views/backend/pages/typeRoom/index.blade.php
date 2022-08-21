@extends('backend.layouts.main')
@section('title', 'Quản lý loại phòng')
@section('page-title', 'Quản lý loại phòng')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4><a href="{{ route('admin.typeroom.index') }}">Danh sách loại phòng </a> <button id="btDrop_"
                                data-toggle="tooltip" type="" title="Thùng rác" class="pd-setting-ed"><a
                                    href="{{ route('admin.typeroom.soft.delete', ['soft_delete' => 1]) }}">
                                    <i style="color: #ffff" class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </h4>
                        <div class="add-product">
                            <a href="{{ route('admin.typeroom.create') }}">Thêm mới loại phòng</a>
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
                                <th>Mã

                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'id')
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'id')
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'desc', 'orderBy' => 'id']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif

                                </th>
                                <th>Tên loại phòng @if (request()->sortBy == 'desc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'desc', 'orderBy' => 'name']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Giá phòng

                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'price')
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'esc', 'orderBy' => 'price']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'price')
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'desc', 'orderBy' => 'price']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.typeroom.index', ['sortBy' => 'esc', 'orderBy' => 'price']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Mô tả</th>
                                <th>

                                </th>
                            </tr>
                            @if (count($dataTypeRoom) > 0)
                                @foreach ($dataTypeRoom as $item)
                                    <tr>
                                        <td>LP{{ $item->id }}
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <button class="pd-setting">{{ number_format($item->price) }} Vnd</button>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                                data-target="#modelId_{{ $item->id }}">
                                                Xem
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modelId_{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: black">Giới thiệu về loại
                                                                phòng {{ $item->name }}</h5>
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
                                                <a href="{{ route('admin.typeroom.edit', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                            <button id="btDrop_{{ $item->id }}" onclick="btDrop({{ $item->id }})"
                                                data-toggle="tooltip" type="" title="Trash" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                            <form id="fromDrop_{{ $item->id }}"
                                                action="{{ route('admin.typeroom.destroy', $item->id) }}" method="POST">
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
        <h2>Không tìm thấy loại phòng</h2>
        @endif
        </table>
        <div class="custom-pagination text-center">
            {{ $dataTypeRoom->appends(request()->all())->links('pagination::bootstrap-4') }}
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
