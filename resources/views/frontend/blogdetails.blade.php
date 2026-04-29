@extends('frontend.layouts.main')
@section('title', $blog->title ?? 'Blog Details')
@section('main-container')

<style>
    .detail-card {
        background: #fff;
        border: 1px solid #e8ebf3;
        border-radius: 16px;
        box-shadow: 0 16px 36px rgba(18, 34, 56, 0.06);
    }
</style>

<div class="page__banner" data-background="{{ asset('assets/img/banner/page-banner-5.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-title">
                    <h1>{{ $blog->title }}</h1>
                    <div class="page__banner-title-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                            <li><span>-</span>Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog__details section-padding" style="background:#f6f7fb;">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-8 col-lg-7">
                <div class="detail-card p-4 p-lg-5" style="background:#fff;border-radius:16px;">
                    <img class="img__full rounded mb-4" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    <div class="d-flex flex-wrap gap-3 mb-3 text-muted">
                        <span><i class="far fa-folder-open mr-2"></i>{{ $blog->category }}</span>
                        <span><i class="far fa-calendar-alt mr-2"></i>{{ optional($blog->published_at)->format('F d, Y') }}</span>
                        <span><i class="far fa-clock mr-2"></i>{{ $blog->read_time }}</span>
                    </div>
                    <h2 class="mb-3">{{ $blog->title }}</h2>
                    <p class="lead mb-4">{{ $blog->excerpt }}</p>
                    <p class="mb-0">{!! nl2br(e(strip_tags($blog->content))) !!}</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="detail-card p-4" style="background:#fff;border-radius:16px;">
                    <span class="subtitle__one">More Reading</span>
                    <h4 class="mb-4">Related stories</h4>
                    @foreach($relatedBlogs as $relatedBlog)
                        <div class="mb-4 pb-4 border-bottom">
                            <img class="img__full rounded mb-3" src="{{ asset($relatedBlog->image) }}" alt="{{ $relatedBlog->title }}">
                            <h6><a href="{{ route('blogs.show', $relatedBlog->slug) }}">{{ $relatedBlog->title }}</a></h6>
                            <p class="mb-2 text-muted">{{ $relatedBlog->excerpt }}</p>
                            <a href="{{ route('blogs.show', $relatedBlog->slug) }}" class="simple-btn">Read Story</a>
                        </div>
                    @endforeach
                    <a href="{{ route('blogs.index') }}" class="theme-btn w-100 text-center">Browse All Blogs<i class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
