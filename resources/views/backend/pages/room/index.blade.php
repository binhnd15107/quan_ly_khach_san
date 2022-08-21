@extends('backend.layouts.main')
@section('title', 'Quản lý phòng')
@section('page-title', 'Quản lý phòng')
@section('content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4><a href="{{ route('admin.room.index') }}">Danh sách phòng </a> <button id="btDrop_"
                                data-toggle="tooltip" type="" title="Thùng rác" class="pd-setting-ed"><a
                                    href="{{ route('admin.room.soft.delete', ['soft_delete' => 1]) }}">
                                    <i style="color: #ffff" class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </h4>
                        <div class="add-product">
                            <a href="{{ route('admin.room.add') }}">Thêm mới phòng</a>
                        </div>
                        <div
                            class="input-group mg-b-pro-edt col-12 col-lg-4 col-sx-12 col-md-12 col-sm-12 col-xxl-4 col-xl-4">
                            <span class="input-group-addon"><i class="icon nalika-like" aria-hidden="true"></i></span>
                            <select data-hide-search="false" name="type_room_id" value=""
                                class="form-control pro-edt-select form-control-primary select2">
                                <option value="">Thuộc loại phòng</option>
                                @foreach ($typeRooms as $item)
                                    <option {{ request('type_room_id') == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
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
                            <tr>
                                <th>ID

                                    @if (request()->sortBy == 'desc' && request()->orderBy == 'id')
                                        <a href="{{ route('admin.room.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'id')
                                        <a href="{{ route('admin.room.index', ['sortBy' => 'desc', 'orderBy' => 'id']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a href="{{ route('admin.room.index', ['sortBy' => 'esc', 'orderBy' => 'id']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif

                                </th>
                                <th>Tên phòng @if (request()->sortBy == 'desc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.room.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @elseif(request()->sortBy == 'esc' && request()->orderBy == 'name')
                                        <a
                                            href="{{ route('admin.room.index', ['sortBy' => 'desc', 'orderBy' => 'name']) }}">
                                            <i class="fa fa-arrow-up"></i></a>
                                    @else
                                        <a
                                            href="{{ route('admin.room.index', ['sortBy' => 'esc', 'orderBy' => 'name']) }}">
                                            <i class="fa  fa-arrow-down"></i></a>
                                    @endif
                                </th>
                                <th>Ảnh phòng</th>
                                <th>Giá phòng</th>
                                <th>
                                    Thuộc loại phòng
                                </th>

                                <th>Mô tả</th>
                                <th>Lịch sử đặt phòng
                                </th>
                                <th>

                                </th>
                            </tr>
                            @if (count($dataRoom) > 0)
                                @foreach ($dataRoom as $item)
                                    <tr>
                                        <td>{{ $item->id }}
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{ asset('assets/img/' . $item->image) ?? $item->image }}"
                                                alt=""></td>
                                        <td><button class="pd-setting">{{ number_format($item->price) }} Vnđ</button></td>
                                        <td>
                                            {{ $item->typeRoomName }}</td>

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
                                                            <h5 class="modal-title" style="color: black">Giới thiệu về
                                                                phòng {{ $item->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="color: black">
                                                            <br>
                                                            @if ($item->images != null)
                                                                @foreach (json_decode($item->images, true) as $img)
                                                                    <img style="width:30%"
                                                                        src="{{ asset('assets/img/' . $img) }}"
                                                                        alt="">
                                                                @endforeach
                                                            @endif
                                                            <br>
                                                            <br>
                                                            <br>
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
                                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                                data-target="#history_bill_Id_{{ $item->id }}">
                                                Xem
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="history_bill_Id_{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: black">Giới thiệu về
                                                                phòng {{ $item->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="color: black">
                                                            <br>
                                                            @if ($item->images != null)
                                                                @foreach (json_decode($item->images, true) as $img)
                                                                    <img style="width:30%"
                                                                        src="{{ asset('assets/img/' . $img) }}"
                                                                        alt="">
                                                                @endforeach
                                                            @endif
                                                            <br>
                                                            <br>
                                                            <br>
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
                                                <a href="{{ route('admin.room.edit', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                            <button id="btDrop_{{ $item->id }}"
                                                onclick="btDrop({{ $item->id }})" data-toggle="tooltip"
                                                type="" title="Trash" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                                            <form id="fromDrop_{{ $item->id }}"
                                                action="{{ route('admin.room.destroy', $item->id) }}" method="POST">
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
        <h2>Không tìm thấy phòng</h2>
        @endif
        </table>
        <div class="custom-pagination text-center">
            {{ $dataRoom->appends(request()->all())->links('pagination::bootstrap-4') }}
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
