<div class="feed-me">
    <div class="contact-me">
        <div class="feed_info">
            <h2>Связаться со мной</h2>
            <div>
                <p>Свяжитесь со мной, мы обязательно найдем общий язык о цене и сроках. Обычно я отвечаю в течение нескольких часов, если не сплю)</p>
            </div>
        </div>
        <div class="social">
            <div class="social">
                @foreach($contacts as $contact)
                    @if($contact->title == 'icon')
                        <a href="{{ $contact->href }}" class="social-link social-telegram" target="_blank" rel="noopener noreferrer">
                            <i class="{{ $contact->icon_tag}}"></i>
                        </a>
                    @endif
                @endforeach
                <a class="btn" href="http://haku.gq/contact-me/">Написать мне напрямую</a>
            </div>
        </div>
    </div>
    <div class="for-information">
        <h2>Для информации</h2>
        <div>
            <p></p>
        </div>
        <ul class="info-list">
            <div>
                <p>
                    <span class="info-list__title">Время работы:</span>
                    <span class="info-list__value">6-8 часов в день</span><br>
                    <span class="info-list__title">Доступен:</span>
                    <span class="info-list__value">24/7</span>
                </p>
            </div>
        </ul>
        <div class="mt-15">
            <h5>Знания:</h5>
            <ul id="menu-for-information" class="tags-list">
                @foreach($contacts as $contact)
                    @if($contact->title == 'knowledge')
                        <li>
                            <a>{{ $contact->icon_tag}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
