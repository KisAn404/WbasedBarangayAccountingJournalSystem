@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="pagination__previous pagination__previous--disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">@lang('pagination.previous')</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination__previous" rel="prev" aria-label="@lang('pagination.previous')">&larr; @lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination__next" rel="next" aria-label="@lang('pagination.next')">@lang('pagination.next') &rarr;</a>
        @else
            <span class="pagination__next pagination__next--disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">@lang('pagination.next')</span>
            </span>
        @endif
    </nav>
@endif
