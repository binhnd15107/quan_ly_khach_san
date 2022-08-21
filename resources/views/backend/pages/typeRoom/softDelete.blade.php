@extends('backend.layouts.main')
@section('title', 'Danh sách loại phòng đã xóa')
@section('page-title', 'Danh sách loại phòng đã xóa')
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

                                        <a href="{{ route('admin.typeroom.index') }}" class="pe-3">
                                            Danh sách loại phòng
                                        </a>

                                    </li>
                                    <li class="breadcrumb-item px-3 text-muted">Các loại phòng đã xóa </li>
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
                                <th>#</th>
                                <th>Tên loại phòng</th>
                                <th>Giá phòng</th>
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
                                            <button data-toggle="tooltip" title="Khôi phục" class="pd-setting-ed">
                                                <a href="{{ route('admin.typeroom.soft.backup', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>

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
    <script></script>

@endsection
