@extends('user.layouts.app')

@section('title', 'Blog')

@section('content')

    <section class="blog-banner-area" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Our Blog</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach($posts as $post)
                            <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">
                                        @php 
                                            $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                                        @endphp
                                        <div class="post_tag">
                                            <a href="#">Food,</a>
                                            <a class="active" href="#">Technology,</a>
                                            <a href="#">Politics,</a>
                                            <a href="#">Lifestyle</a>
                                        </div>
                                        <ul class="blog_meta list">
                                            <li>
                                                <a href="#">
                                                    @foreach($author_info as $data)
                                                        @if($data->name)
                                                            Mark wiens
                                                        @else
                                                            Anonymous
                                                        @endif
                                                    @endforeach
                                                    <i class="lnr lnr-user"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">{{ $post->created_at->format('d M, Y. D') }}
                                                    <i class="lnr lnr-calendar-full"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">1.2M Views
                                                    <i class="lnr lnr-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">06 Comments
                                                    <i class="lnr lnr-bubble"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="{{ $post->photo }}" alt="{{ $post->title }}">
                                        <div class="blog_details">
                                            <a href="{{ route('blog.detail', $post->slug) }}">
                                                <h2>{{ $post->title }}</h2>
                                            </a>
                                            <p>
                                                { !! html_entity_decode($post->summary) !! }
                                            </p>
                                            <a class="button button-blog" href="{{ route('blog.detail',$post->slug) }}">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {{$posts->appends($_GET)->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
                @include('user.pages.blog.sidebar')
            </div>
        </div>
    </section>

    <section class="instagram_area">
        <div class="container box_1620">
        <div class="insta_btn">
            <a class="btn theme_btn" href="#">Follow us on instagram</a>
        </div>
        <div class="instagram_image row m0">
            <a href="#"><img src="{{ asset('frontend/img/instagram/ins-1.jpg') }}" alt=""></a>
            <a href="#"><img src="{{ asset('frontend/img/instagram/ins-2.jpg') }}" alt=""></a>
            <a href="#"><img src="{{ asset('frontend/img/instagram/ins-3.jpg') }}" alt=""></a>
            <a href="#"><img src="{{ asset('frontend/img/instagram/ins-4.jpg') }}" alt=""></a>
            <a href="#"><img src="{{ asset('frontend/img/instagram/ins-5.jpg') }}" alt=""></a>
            <a href="#"><img src="{{ asset('frontend/img/instagram/ins-6.jpg') }}" alt=""></a>
        </div>
        </div>
    </section>

@endsection