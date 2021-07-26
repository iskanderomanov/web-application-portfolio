
@if ($paginator->hasPages())
        @if ($paginator->onFirstPage())

        @else
            <div class="navigation__arrow navigation__arrow_left">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a>
            </div>
        @endif
        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <div class="navigation__pages">
                    @if ($page == $paginator->currentPage())
                        <span>{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                    </div>
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <div class="navigation__arrow navigation__arrow_right">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">→</a>
            </div>
        @else

        @endif
@endif


