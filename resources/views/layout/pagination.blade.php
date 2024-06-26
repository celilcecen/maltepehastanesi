@if ($paginator->hasPages())
<div class="pagenation-bar pt-4">
    <nav aria-label="...">
        <ul class="pagination bordered">
            @if (!$paginator->onFirstPage())
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="fa-solid chevron-icon-revers"></i></a></li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
            <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i class="fa-solid chevron-icon"></i></a></li>
            @endif
        </ul>
    </nav>
</div>
@endif