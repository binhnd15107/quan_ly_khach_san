@extends('backend.layouts.main')
@section('title', 'Danh sách dịch vụ đã xóa')
@section('page-title', 'Danh sách dịch vụ đã xóa')
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
                                        <a href="{{ route('admin.contact.index') }}" class="pe-3">
                                            Danh sách phản hồi
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item px-3 text-muted">Các phản hồi đã xóa </li>
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
                                <th>Mã



                                </th>
                                <th>Khách hàng
                                </th>
                                <th>Nội dung</th>
                                <th>Thời gian

                                </th>
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
                                            <button data-toggle="tooltip" title="Khôi phục" class="pd-setting-ed">
                                                <a href="{{ route('admin.contact.soft.backup', $item->id) }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>

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
    <script></script>

@endsection
