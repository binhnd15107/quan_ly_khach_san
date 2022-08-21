@if (isset($banners))
    <div class="owl-four owl-carousel" itemprop="image">

        @foreach ($banners as $banner)
            <img src="{{ asset('assets/img/' . $banner->image) }}" alt="Image of Bannner">
        @endforeach

    </div>
    <div class="box-form-search-room">
        <div class="container">
            <form action="{{ route('fontend.rooms') }}" method="GET">
                <h3> Đặt phòng khách sạn trực tuyến giá rẻ</h3>
                <br>
                <div class="row">
                    <div class="col-xs-4">
                        <label for="accountId">Ngày nhận</label>
                        <input min="{{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString() }}" type="date"
                            name="start_time_room" class="form-control"
                            value="{{ request('start_time_room') ?? Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString() }}"
                            placeholder=".col-xs-5">
                    </div>
                    <div class="col-xs-4">
                        <label for="accountId">Ngày trả</label>
                        <input type="date" min="" name="end_time_room"
                            value="{{ request('end_time_room') ??Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addDay()->toDateString() }}"
                            class="form-control" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-4">
                        <label for="accountId">Chọn mức giá</label>
                        <select data-hide-search="false" name="type_room_id" value=""
                            class="form-control pro-edt-select form-control-primary select2">
                            <option value="">Chọn mức giá phòng </option>
                            @foreach ($typeRooms as $item)
                                <option {{ request('type_room_id') == $item->id ? 'selected' : '' }}
                                    value="{{ $item->id }}">
                                    Loại {{ $item->name }} - {{ number_format($item->price) }} Vnđ /phòng
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <br>
                <button class="btn btn-primary" type="submit">Tìm phòng</button>
            </form>
        </div>
    </div>

    <div id="owl-four-nav" class="owl-nav"></div>
@endif
