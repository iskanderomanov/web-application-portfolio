@extends('blog.layouts.blog_layout')

@section('title', 'Обо мне')
@section('content')
    <div class="about-me">
        <div class="main grid">
            <div class="profile">
                <div class="media_image">
                    <img width="310" height="413" src="{{ asset('blog/img/person.jpg') }}" class="image" alt="" loading="lazy" style="max-width: 100%; height: auto;" sizes="(max-width: 310px) 100vw, 310px">
                </div>
                <ul class="info-list">
                    <div>
                        <p>
                            @foreach($contacts as $contact)
                                @if($contact->title == 'person')
                                    <span class="info-list__title">{{ $contact->href}}:</span>
                                    <span class="info-list__value">{{ $contact->icon_tag}}</span><br>
                                @endif
                            @endforeach
                        </p>
                    </div>
                </ul>
            </div>
            <div class="caption">
                <div class="caption_text">
                    <h1>О сайте</h1>
                    <div class="textwidget">
                        <p>Занимаюсь изучением веб-разработкой более двух лет, за это время изучил на достойном уровне создание адаптивной верстки используя HTML CSS JS JQuery, создание веб-приложений на PHP используя архитектурный паттерн MVC, используя ООП.<br><br> 
                        На данный момент изучаю фреймворк Laravel на основе которого создал свой сайт портфолио где весь front-end/back-end написал сам. Сам сайт https://isko.gq а исходники выложил на сайт github где вы можете на него посмотреть</p>
                    </div>
                </div>
            </div>
        </div>
        @include('blog.feed_me')
    </div>
@endsection

