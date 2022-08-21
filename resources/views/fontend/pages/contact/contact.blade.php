@extends('fontend.layouts.main')
@section('title', 'Trang phòng của bạn')
@section('page-title', 'Trang phòng')
@section('page-css')
    <style>
        .news-img-wrap {
            color: black;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border: 1px solid rgba(0, 0, 0, 0.2)
        }

        .owl-carousel .owl-stage-outer {
            height: 250px
        }

        #overflowTest {

            /* background: #4CAF50; */
            color: white;
            padding: 15px;
            width: 100%;
            height: 400px;
            overflow: scroll;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
@section('content')
    {{-- <div class="page-heading">
    </div> --}}
    <section class="course-listing-page">
        <div class="container">
            <div class="map"><iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639810443356!2d105.74459841486907!3d21.038127785993247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sfr!2s!4v1660584054777!5m2!1sfr!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            <div class="contact">
                <div class="footer-first-section">
                    <div style="display:flex" class="container">
                        <div class="box-wrap">
                            <header>
                                <h1>Form phản hồi</h1>
                            </header>
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
                            <section class="quick-contact">
                                <form action="{{ route('fontend.contact.add') }}" method="post">
                                    @csrf
                                    <input style="color: #ffff" value="{{ old('email') }}" type="email" name="email"
                                        required placeholder="Your Email*">
                                    <textarea style="color: #ffff" name="content" required placeholder="Type your message*"></textarea>
                                    <button type="submit">Gửi tin</button>
                                </form>
                            </section>
                        </div>

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
    {{-- <script src="{{ asset('assets/js/room/fillter.js') }}"></script> --}}
@endsection
