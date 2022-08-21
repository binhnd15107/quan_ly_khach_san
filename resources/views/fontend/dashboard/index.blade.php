@extends('fontend.layouts.main')
@section('title', 'Trang chủ')
@section('page-title', 'Trang chủ')
@section('content')
    <div class="page-heading">
        <div class="container">
            <h2>Danh sách phòng hôm nay</h2>
        </div>
    </div>
    <!-- Popular courses End -->
    <div class="learn-courses">
        <div class="container">
            <div class="courses">
                <div class="owl-one owl-carousel">
                    @if (count($rooms) > 0)
                        @foreach ($rooms as $key => $item)
                            <div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
                                <div class="img-wrap" itemprop="image"><img style="height: 250px"
                                        src="{{ asset('assets/img/' . $item->image) }}" alt="courses picture"></div>
                                <a data-id="{{ $item->id }}" style="transform: translateY(50px)"
                                    class="learn-desining-banner detail-room" itemprop="name">Đặt
                                    lịch ngay
                                    >>></a>
                                <div class="box-body" itemprop="description">
                                    <p></p>
                                    <section itemprop="time">
                                        <p><span>Loại :</span>{{ $item->typeRoomName }}</p>
                                        <p><span>Phòng :</span> {{ $item->name }}</p>
                                        <p><span>Giá :</span> {{ number_format($item->price) }}Vnđ</p>
                                    </section>
                                </div>
                            </div>
                        @endforeach

                    @endif



                </div>
            </div>
        </div>
    </div>
    <!-- Learn courses End -->
    <section style="background: black" class="whyUs-section">
        <div class="container">
            <div class="featured-points">
                <ul>
                    <li><i class="fas fa-book"></i> Giá rẻ nhất thị trường</li>
                    <li><i class="fas fa-money-check-alt"></i>Hiện đại , sang trọng , tiện nghi</li>
                    <li><i class="fas fa-chalkboard-teacher"></i> Phục vụ chu đáo</li>
                    <li> <i class="fas fa-book"></i> Voucher giảm giá cực sốc</li>
                </ul>
            </div>
            <div class="whyus-wrap">
                <h1>Tại sao nên chọn chúng tôi?</h1>
                <p itemprop="description">Khách sạn Hà Nội là khách sạn Quốc tế đầu tiên tại Hà Nội với 218 phòng nghỉ tiện
                    nghi, hiện đại và sang trọng. Đặc biệt, với vị trí trung tâm thuận lợi kề bên Hồ Giảng Võ yên bình,
                    khách sạn là điểm dừng chân lý tưởng của du khách trong và ngoài nước mỗi khi có chuyến công tác hay du
                    lịch cùng bạn bè và người thân. Hơn nữa, Khách sạn Hà Nội đã được nổi danh là địa chỉ đứng đầu của Hà
                    nội về ẩm thực Trung Hoa cùng các dịch vụ giải trí hoàn hảo và phong phú. Đến với Khách sạn Hà Nội,
                    chúng tôi hy vọng sẽ đem lại cho quý khách những trải nghiệm thú vị và hài lòng nhất.</p>

                <a href="{{ route('fontend.rooms') }}" class="read-more-btn">Đặt phòng ngay</a>
            </div>
        </div>
    </section>
    <!-- Closed WhyUs section -->
    <section class="page-heading">
        <div class="container">
            <h2>Ảnh phòng</h2>
        </div>
    </section>
    <section style="margin-left:70px" class="gallery-images-section" itemprop="image" itemscope
        itemtype=" http://schema.org/ImageGallery">
        @if (count($rooms) > 0)
            @foreach ($rooms as $key => $item)
                @if ($key <= 11)
                    <div class="gallery-img-wrap">
                        <a href="" data-lightbox="example-set"
                            data-title="Click the right half of the image to move forward.">
                            <img src="{{ asset('assets/img/' . $item->image) }}" alt="gallery-images">
                        </a>
                    </div>
                @endif
            @endforeach

        @endif
    </section>
    <!-- End of gallery Images -->
    <div style="margin:100px"></div>
    <!-- End of Events section -->
    <section class="what-other-say">

        <div class="container">
            {{-- <h4 class="article-subtitle">Get to Know</h4> --}}
            <h2 class="head">Khách hàng nói gì về chúng tôi</h2>
            <div class="three owl-carousel owl-theme">
                @if (count($feedbacks) > 0)
                    @foreach ($feedbacks as $item)
                        <div class="customer-item" itemscope itemtype="http://schema.org/Rating">
                            <div class="border">

                                <div class="customer">
                                    <figure>
                                        <img class="customer-img" src="{{ $item->uImage }}" alt="Person image">
                                        <figcaption>
                                            <span itemprop="author">{{ $item->uName }}</span>
                                            <div class="rateYo" itemprop="ratingValue"></div>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="customer-review">
                                    <p itemprop="description">
                                        {{ $item->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End of Others talk -->
    <section class="page-heading">
        <div class="container">
            <h2>Bài viết</h2>
        </div>
    </section>
    <section class="latest-news">
        <div class="container" itemprop="event" itemscope itemtype=" http://schema.org/Event">
            <div class="owl-two owl-carousel">
                <div class="news-wrap" itemprop="event">
                    <div class="news-img-wrap" itemprop="image">
                        <img src="{{ asset('frontEnd/images/latest-new-img.jpg') }}" alt="Latest News Images">
                    </div>
                    <div class="news-detail" itemprop="description">
                        <a href="">
                            <h1>Orientation Programme for new Students.</h1>
                        </a>
                        <h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

                        <p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students..
                            Orientatin Programmes for new Students</p>
                    </div>
                </div>

                <div class="news-wrap" itemprop="event">
                    <div class="news-img-wrap" itemprop="image">
                        <img src="{{ asset('frontEnd/images/latest-new-img.jpg') }}" alt="Latest News Images">
                    </div>
                    <div class="news-detail" itemprop="description">
                        <a href="">
                            <h1>Orientation Programme for new Students.</h1>
                        </a>
                        <h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

                        <p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students..
                            Orientatin Programmes for new Students</p>
                    </div>
                </div>

                <div class="news-wrap" itemprop="event">
                    <div class="news-img-wrap" itemprop="image">
                        <img src="{{ asset('frontEnd/images/latest-new-img.jpg') }}" alt="Latest News Images">
                    </div>
                    <div class="news-detail" itemprop="description">
                        <a href="">
                            <h1>Orientation Programme for new Students.</h1>
                        </a>
                        <h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

                        <p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students..
                            Orientatin Programmes for new Students</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest News CLosed -->
    <section class="query-section">
        <div class="container">
            <p>Any Queries? Ask us a question at<a href="tel:+9779813639131"><i class="fas fa-phone"></i> +977
                    9813639131</a></p>
        </div>
    </section>
@endsection
@section('page-js')

@endsection
