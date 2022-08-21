@extends('backend.layouts.main')
@section('title', 'Cập nhật voucher')
@section('page-title', 'Cập nhật voucher')
@section('page-css')
    <style>
        .review-content-section p {
            color: black;
            font-weight: 400;
            font-size: 14px;
            line-height: 24px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

                                <a href="{{ route('admin.voucher.index') }}" class="pe-3">
                                    Danh sách voucher
                                </a>

                            </li>
                            <li class="breadcrumb-item px-3 text-muted">Cập nhật voucher </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="icon nalika-edit"
                                            aria-hidden="true"></i>
                                        Cập nhật</a></li>
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
                                    <form action="{{ route('admin.voucher.edit', $data->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-home"
                                                                aria-hidden="true"></i></span>
                                                        <input type="text" name="name" value="{{ $data->name }}"
                                                            class="form-control" placeholder="Tên voucher">
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
                                                        <span class="input-group-addon"><i class="icon nalika-home"
                                                                aria-hidden="true"></i></span>
                                                        <input type="number" name="discount_rate"
                                                            value="{{ $data->discount_rate }}" class="form-control"
                                                            placeholder="Mức khuyến mại (Tính theo %)">
                                                    </div>
                                                    @error('discount_rate')
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
                                                                aria-hidden="true"></i> &nbsp Hạn chế</span>
                                                        <select data-hide-search="false" name="limit[]"
                                                            value="{{ serialize(old('limit')) }}" multiple
                                                            class="js-example-tokenizer form-control pro-edt-select form-control-primary select2">

                                                            @foreach ($dataRoom as $item)
                                                                <option
                                                                    @if ($data->limit != null) @foreach (json_decode($data->limit, true) as $value) @if ($value == $item->id)
                                                                {{ 'selected="selected"' }} @endif
                                                                    @endforeach
                                                            @endif
                                                            value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"> <i class="fa fa-calendar"></i>
                                                            &nbsp Bắt
                                                            đầu</span>
                                                        <input id="begin" max="" type="datetime-local"
                                                            value="{{ strftime('%Y-%m-%dT%H:%M:%S', strtotime($data->start_time)) }}"
                                                            name="start_time" class="form-control " placeholder="">

                                                    </div>
                                                    @error('start_time')
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
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i> &nbsp Kết thúc
                                                        </span>
                                                        <input id="end" min="" type="datetime-local"
                                                            name="end_time"
                                                            value="{{ strftime('%Y-%m-%dT%H:%M:%S', strtotime($data->end_time)) }}"
                                                            class="form-control  " placeholder="thời gian bắt đầu" />

                                                    </div>
                                                    @error('end_time')
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
                                                <textarea class="form-control" id="ckeditor_v1" placeholder="Mô tả " name="describe">{{ $data->describe }}</textarea>
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
                                        <br>
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
    {{-- <script src="{{ asset('assets/js/autoLoadImage/loadImgae.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/select2/select2.js') }}"></script>
    <script></script>

@endsection
