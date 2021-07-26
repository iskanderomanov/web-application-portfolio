@extends('blog.layouts.blog_layout')

@section('title', 'Связаться со мной')
@section('content')
    <div class="content">
        <div class="content_title">
            <h1>Связаться со мной(Временно не работает)</h1>
        </div>
        <div class="entry-content">
            <p class="contact-me__text">
                <span style="color:#999999" class="tadv-color">Напишите мне напрямую и оставьте свою настоящую почту что бы я мог самом скором времени вам ответить</span>
            </p>
            <div role="form" class="wpcf7" id="wpcf7-f249-p241-o1" lang="ru-RU" dir="ltr">
                <form action="{{ route('feedback.send') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="name" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Ваше имя">
                    <input type="email" name="email" value="" size="40" class="" aria-required="true" aria-invalid="false" placeholder="Ваша почта">
                    <textarea name="message" cols="40" rows="10" maxlength="3000" class="message-area" aria-required="true" placeholder="Ваше сообщение"></textarea>
                    <button type="submit" class="btn">Отправить</button>
                </form>
            </div>
        </div><!-- .entry-content -->


    </div>
@endsection
