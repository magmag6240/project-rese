@if ($paginator->hasPages())
<div class="pagination">
    @if ($paginator->onFirstPage())
    <span class="page-link-prev">前へ</span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="page-link-prev">前へ</a>
    @endif

    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span class="current-paginate-page">{{ $page }}</span>
                @else
                    @if ($page == 1)
                    <a class="another-paginate-page" href="{{ $url }}">{{ $page }}</a>
                    <span class="another-paginate">...</span>
                    @endif
                    @if ($page == $paginator->lastPage())
                    <span class="another-paginate">...</span>
                    <a class="another-paginate-page" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="page-link-next">次へ</a>
    @else
    <span class="page-link-next">次へ</span>
    @endif
</div>
@endif