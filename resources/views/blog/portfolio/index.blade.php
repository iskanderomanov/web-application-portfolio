@extends('blog.layouts.blog_layout')

@section('title', 'Портфолио')
@section('content')
    <div class="main__content_title">
        <div class="h3">Last works</div>
    </div>
    <div class="content greed">
        @foreach($posts as $post)
            @if($post->published_status == true)
                <div class="portfolio_el">
                    <a href="{{ route('post', $post->slug) }}" class="short-portfolio">
                        <div class="short-portfolio__image scroll__image">
                            <img src="/image/@if(isset($post->image)){{$post->image}}@endif" alt="">
                        </div>
                        <div class="short-portfolio__info">
                            <h4 class="info-title">{{$post->title}}</h4>
                            <span class="info-caption">{{ $categories->find($post->category_id)->title }}</span>
                            <div class="info-description">
                                <p class="inf">{{ Str::limit($post->description, 50) }}</p>
                            </div>
                        </div>
                    </a>
                    </div>
                @endif
            @endforeach
        </div>
    <div class="navigation">
        {{ $posts->links('blog.portfolio.pagination') }}
    </div>
    @include('blog.feed_me')
@endsection
