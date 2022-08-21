@extends('backend.layouts.main')
@section('title', 'Thêm mới phòng')
@section('page-title', 'Thêm mới phòng')
@section('page-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <style>
        .review-content-section p {
            color: black;
            font-weight: 400;
            font-size: 14px;
            line-height: 24px;
        }

        input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        }
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endsection
@section('content')
    <div class="single-product-tab-area mg-b-30">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <ol class="breadcrumb text-muted fs-6 fw-bold">
                            <li class="breadcrumb-item pe-3">

                                <a href="{{ route('admin.room.index') }}" class="pe-3">
                                    Danh sách phòng
                                </a>

                            </li>
                            <li class="breadcrumb-item px-3 text-muted">Thêm mới phòng </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="icon nalika-edit"
                                            aria-hidden="true"></i>
                                        Thêm mới</a></li>
                            </ul>
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
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <form action="{{ route('admin.room.add') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-home"
                                                                aria-hidden="true"></i></span>
                                                        <input type="text" name="name" value="{{ old('name') }}"
                                                            class="form-control" placeholder="Tên phòng">
                                                    </div>
                                                    @error('name')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-like"
                                                                aria-hidden="true"></i></span>
                                                        <select data-hide-search="false" name="type_room_id"
                                                            value="{{ old('type_room_id') }}"
                                                            class="form-control pro-edt-select form-control-primary select2">
                                                            <option value="">Thuộc loại phòng</option>
                                                            @foreach ($typeRooms as $item)
                                                                <option
                                                                    {{ old('type_room_id') == $item->id ? 'selected' : '' }}
                                                                    value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    @error('type_room_id')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa fa-file-image-o"
                                                            aria-hidden="true"></i></span>
                                                    <input onchange="previewFile()" name="image"
                                                        value="{{ old('image') }}" type="file" class="form-control">
                                                    <br>
                                                    {{-- <img src="" height="200" alt="Image preview..."> --}}
                                                </div>
                                                <div>
                                                    <img src="https://vanhoadoanhnghiepvn.vn/wp-content/uploads/2020/08/112815953-stock-vector-no-image-available-icon-flat-vector.jpg"
                                                        id="show" style="width:50%" alt="Image preview...">
                                                </div>
                                                @error('image')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                    </div>
                                                @enderror
                                                <br>

                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa fa-file-image-o"
                                                            aria-hidden="true"></i> Ảnh chi tiết</span>
                                                    <input class="form-control" type="file" id="files"
                                                        name="images[]" multiple />
                                                    <br>
                                                </div>

                                                <br>
                                                @error('images')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                <br>
                                <div class="review-content-section">
                                    <div class="input-group mg-b-pro-edt">
                                        <span class="input-group-addon"><i class="icon nalika-edit"
                                                aria-hidden="true"></i></span>
                                        <textarea class="form-control" id="ckeditor_v1" placeholder="Mô tả " name="describe">{{ old('describe') }}</textarea>
                                    </div>
                                    @error('describe')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center custom-pro-edt-ds">
                                            <button type="submit"
                                                class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                            </button>
                                            <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script src="{{ asset('assets/js/checkditor/checkditor.js') }}"></script>
    <script src="{{ asset('assets/js/autoLoadImage/loadImgae.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script></script>

@endsection
