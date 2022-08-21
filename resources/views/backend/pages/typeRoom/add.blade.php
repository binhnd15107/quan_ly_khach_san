@extends('backend.layouts.main')
@section('title', 'Thêm mới loại phòng')
@section('page-title', 'Thêm mới loại phòng')
@section('page-css')
    <style>
        .review-content-section p {
            color: black;
            font-weight: 400;
            font-size: 14px;
            line-height: 24px;
        }
    </style>
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

                                <a href="{{ route('admin.typeroom.index') }}" class="pe-3">
                                    Danh sách loại phòng
                                </a>

                            </li>
                            <li class="breadcrumb-item px-3 text-muted">Thêm mới loại phòng </li>
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
                                    <form action="{{ route('admin.typeroom.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-home"
                                                                aria-hidden="true"></i></span>
                                                        <input type="text" name="name" value="{{ old('name') }}"
                                                            class="form-control" placeholder="Tên loại phòng">

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
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd"
                                                                aria-hidden="true"></i></span>
                                                        <input name="price" value="{{ old('price') }}" min="1"
                                                            type="number" class="form-control" placeholder="Giá phòng">
                                                    </div>
                                                    @error('price')
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
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-home"
                                                                aria-hidden="true"></i></span>
                                                        <textarea class="form-control" id="ckeditor_v1" placeholder="Mô tả " name="describe"></textarea>
                                                    </div>
                                                    @error('describe')
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

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit"
                                                        class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-ctl-bt waves-effect waves-light">Discard
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
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('assets/js/checkditor/checkditor.js') }}"></script>

    <script></script>

@endsection
