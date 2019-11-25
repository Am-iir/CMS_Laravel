<div class="row text-center pt-5 border-top">
    <div class="col-md-12">
        <div class="custom-pagination">
            @if ($paginator->onFirstPage())
                <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"
                      aria-hidden="true">&lsaquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   aria-label="@lang('pagination.previous')">&lsaquo;</a>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="disabled" aria-disabled="true"><span>{{ $element }}</span></span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            @else
                <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span aria-hidden="true">&rsaquo;</span>
                            </span>
            @endif
        </div>
    </div>
</div>
