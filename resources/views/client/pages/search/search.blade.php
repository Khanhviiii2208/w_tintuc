@extends('client.layouts.layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/bootstrap4/bootstrap.min.css') }}">
    <link
        href="{{ asset('client_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/category.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/styles/category_responsive.css') }}">
@endpush

@section('content')
    <div class="home">
        <div class="home_background parallax-window">
            <img src="{{asset('client_assets/images/category.jpg')}}" alt="">
        </div>
    </div>

    <!-- Page Content -->

    <div class="page_content">
        <div class="container">
            <div class="row row-lg-eq-height">
                <!-- Main Content -->

                <div class="col-lg-9">
                    <div class="main_content">
                        <div class="category">
                            <div class="section_panel d-flex flex-row align-items-center justify-content-start">
                                <div class="section_title">Tìm kiếm</div>
                                <div class="section_tags ml-auto">
                                    <ul>
                                        <li class="active"><a href="category.html">all</a></li>
                                        @foreach ($danhmuc as $item)
                                            <li><a
                                                    href="{{ route('cate_article', $item->slug) }}.html">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="section_panel_more">
                                    <ul>
                                        <li>Thêm
                                            <ul>
                                                @foreach ($rest_cate as $item)
                                                <li><a
                                                    href="{{ route('cate_article', $item->slug) }}.html">{{ $item->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="section_content">
                                <div class="clearfix">
                                    @if ($posts_search && count($posts_search) > 0)
                                    <h3>Tìm thấy [ {{count($posts_search)}} ] kết quả.</h3>
                                        @foreach ($posts_search as $item)
                                            <div class="card card_small_with_image grid-item m-2 kv-2">
                                                <a href="{{ route('article_detail', $item->slug) }}.html">
                                                    <img class="card-img-top" src="{{ $item->thumbnail ?? '' }}"
                                                        alt="" />
                                                </a>
                                                <div class="card-body">
                                                    <div class="card-title card-title-small">
                                                        <a href="{{ route('article_detail', $item->slug) }}.html"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ $item->name }}">{{ $item->name ?? '' }}</a>
                                                    </div>
                                                    <small class="post_meta ">
                                                        <a
                                                            href="#">{{ $item->user->name }}</a><span>{{ $item->created_at->format('M j, Y') ?? '' }}</span>
                                                        <p class="float-right text-muted"><i class="bi bi-eye-fill">
                                                                {{ $item->views }} </i></p>
                                                    </small>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3>Không có nội dung tìm kiếm nào trùng khớp với '{{$search}}'</h3>                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar_background"></div>

                        <!-- Top Stories -->

                        <div class="sidebar_section">
                            <div class="sidebar_title_container">
                                <div class="sidebar_title">
                                    HOT
                                </div>
                            </div>
                            <div class="sidebar_section_content">
                                <!-- Top Stories Slider -->
                                <div class="sidebar_slider_container">
                                    <div class="owl-carousel owl-theme sidebar_slider_top">
                                        <!-- Top Stories Slider Item -->
                                        <div class="owl-item">
                                            <!-- Sidebar Post -->
                                            @foreach ($tin_hot as $item)
                                            <div class="side_post">
                                                <a href="{{ route('article_detail', $item->slug) }}.html">
                                                    <div
                                                        class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                        <div class="side_post_image">
                                                            <div>
                                                                <img src="{{ $item->thumbnail ?? '' }}"
                                                                    alt="" />
                                                            </div>
                                                        </div>
                                                        <div class="side_post_content">
                                                            <div class="side_post_title">
                                                               {{ $item->name }}
                                                            </div>
                                                            <small class="post_meta">{{ $item->user->name }}<span>{{ $item->created_at->format('M j, Y') ?? ''}}</span></small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @endforeach
                                           
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Advertising -->

                        <div class="sidebar_section">
                            <div class="advertising">
                                <div class="advertising_background"
                                    style="
                                                background-image: url({{$tinrandom->first()->thumbnail}});
                                            ">
                                </div>
                                <div class="advertising_content d-flex flex-column align-items-start justify-content-end">
                                    <div class="advertising_perc">
                                        {{$tinrandom->first()->user->name}}
                                    </div>
                                    <div class="advertising_link">
                                        <a href="{{ route('article_detail', $tinrandom->first()->slug) }}.html"> {{$tinrandom->first()->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Newest Videos -->

                        <div class="sidebar_section newest_videos">
                            <div class="sidebar_title_container">
                                <div class="sidebar_title">
                                    Danh mục
                                </div>
                                <div class="sidebar_slider_nav">
                                    <div class="custom_nav_container sidebar_slider_nav_container">
                                        <div class="custom_prev custom_prev_vid">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px"
                                                height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12"
                                                xml:space="preserve">
                                                <polyline fill="#bebebe"
                                                    points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 " />
                                            </svg>
                                        </div>
                                        <ul id="custom_dots" class="custom_dots custom_dots_vid">
                                            <li class="custom_dot custom_dot_vid active">
                                                <span></span>
                                            </li>
                                            <li class="custom_dot custom_dot_vid">
                                                <span></span>
                                            </li>
                                            <li class="custom_dot custom_dot_vid">
                                                <span></span>
                                            </li>
                                        </ul>
                                        <div class="custom_next custom_next_vid">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px"
                                                height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12"
                                                xml:space="preserve">
                                                <polyline fill="#bebebe"
                                                    points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 " />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar_section_content">
                                <!-- Sidebar Slider -->
                                <div class="sidebar_slider_container">
                                    <div class="owl-carousel owl-theme sidebar_slider_vid">
                                        <!-- Newest Videos Slider Item -->
                                        @foreach ($categoriesPerPage as $categories)
                                            <div class="owl-item">
                                                @foreach ($categories as $category)
                                                    <div class="side_post">
                                                        <a href="{{ route('cate_article', $category->slug) }}.html">
                                                            <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                                <div class="side_post_content">
                                                                    <div class="side_post_title">
                                                                        {{ $category->name }}
                                                                        <small class="post_meta">{{$category->created_at}}</small>                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Advertising 2 -->

                        <div class="sidebar_section">
                            <div class="advertising_2">
                                <div class="advertising_background"
                                    style="
                                                background-image: url(client_assets/images/post_18.jpg);
                                            ">
                                </div>
                                <div
                                    class="advertising_2_content d-flex flex-column align-items-center justify-content-center">
                                    <div class="advertising_2_link">
                                        <a href="">Quay lại đầu trang
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Future Events -->

                        <div class="sidebar_section future_events">
                            <div class="sidebar_title_container">
                                <div class="sidebar_title">
                                    Tin cho bạn
                                </div>
                            </div>
                            <div class="sidebar_section_content">
                                <!-- Sidebar Slider -->
                                <div class="sidebar_slider_container">
                                    <div class="owl-carousel owl-theme sidebar_slider_events">
                                        <!-- Future Events Slider Item -->
                                        <div class="owl-item">
                                            <!-- Future Events Post -->
                                            @foreach ($tinchoban as $item )
                                            <div class="side_post">                                                
                                                <a href="{{ route('article_detail', $item->slug) }}.html">
                                                    <div
                                                        class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                        <div
                                                            class="event_date d-flex flex-column align-items-center justify-content-center">
                                                            <div class="event_day">
                                                                {{$item->created_at->format('d')}}
                                                            </div>
                                                            <div class="event_month">
                                                                {{$item->created_at->format('m')}}
                                                            </div>
                                                        </div>
                                                        <div class="side_post_content">
                                                            <div class="side_post_title">
                                                               {{$item->name}}
                                                            </div>
                                                            <small class="post_meta">{{ $item->user->name }}</small>
                                                        </div>
                                                    </div>
                                                </a>                                                
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="{{ asset('client_assets/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('client_assets/styles/bootstrap4/popper.js') }}"></script>
        <script src="{{ asset('client_assets/styles/bootstrap4/bootstrap.min.js') }}"></script>
        <script src="{{ asset('client_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
        <script src="{{ asset('client_assets/plugins/easing/easing.js') }}"></script>
        <script src="{{ asset('client_assets/plugins/masonry/masonry.js') }}"></script>
        <script src="{{ asset('client_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
        <script src="{{ asset('client_assets/js/category.js') }}"></script>
    @endpush
