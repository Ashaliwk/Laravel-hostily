@extends('frontend.layouts.main')
@section('title', 'Blog')
@section('main-container')

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-4.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>Our Blog</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>-</span>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog__area section-padding" style="background:#f6f7fb;">
    <div class="container">
        <div class="row mb-60">
            <div class="col-xl-7">
                <div class="blog__area-title">
                    <span class="subtitle__one">Hostily Journal</span>
                    <h2>Guides, stay ideas, and booking tips</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-xl-4 col-lg-6 mb-30">
                    <div class="blog__area-item h-100">
                        <div class="blog__area-item-image">
                            <a href="{{ route('blogs.show', $blog->slug) }}"><img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"></a>
                        </div>
                        <div class="blog__area-item-content">
                            <div class="blog__area-item-content-box">
                                <div class="blog__area-item-content-box-date">
                                    <h3>{{ optional($blog->published_at)->format('d') ?? '01' }}</h3>
                                    <span>{{ optional($blog->published_at)->format('M Y') ?? 'Hostily' }}</span>
                                </div>
                                <div class="blog__area-item-content-box-title">
                                    <h5><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h5>
                                    <p class="mt-10 mb-0">{{ $blog->excerpt }}</p>
                                </div>
                            </div>
                            <div class="blog__area-item-content-btn">
                                <a class="simple-btn-2" href="{{ route('blogs.show', $blog->slug) }}">Read More<i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
