@extends('blog.layouts.blog_layout')

@section('title', 'Post')
@section('content')
            <div class="posts">
                <div class="content greed">
                    <div class="block-info">
                        <div class="left_block">
                            <div class="caption">
                                <h1>{{$post->title}}</h1>
                                <p>{{$post->description}}</p>
                            </div>
                            <ul class="info-list">
                                <div>
                                    <p>
                                        <span class="info-list__title">Тип работы:</span>
                                        <span class="info-list__value">{{ $categories->find($post->category_id)->title }}</span><br>
                                        <span class="info-list__title">Потрачено времени:</span>
                                        <span class="info-list__value">{{$post->hours_spent}}</span><br>
                                        <span class="info-list__title">Дата выхода:</span>
                                        <span class="info-list__value">{{date('d-m-Y', strtotime($post->published_at))}}</span>
                                    </p>
                                </div>
                            </ul>
                        </div>
                        <div class="right_block">
                            <div class="post_image">
                                <img src="{{ asset('blog/img/desktop.png') }}" alt="">
                                <div class="post__image scroll__image">
                                    <img src="/image/@if(isset($post->image)){{$post->image}}@endif" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('blog.feed_me')
@endsection
