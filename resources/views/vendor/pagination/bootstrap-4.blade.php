@if ($paginator->hasPages())
    {{--<ul class="pagination" role="navigation">--}}
    <ul class="pagination pagination--transparent" role="navigation">
        {{-- Previous Page Link --}}
        {{--@if ($paginator->onFirstPage())--}}
            {{--<li class=" disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
                {{--<span class="" aria-hidden="true">&lsaquo;</span>--}}
            {{--</li>--}}
        {{--@else--}}
            {{--<li class="">--}}
                {{--<a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
            {{--</li>--}}
        {{--@endif--}}

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{--<li class=" disabled" aria-disabled="true"><span class="">{{ $element }}</span></li>--}}
                <li class=" disabled" aria-disabled="true">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{--<li class=" active" aria-current="page"><span class="">{{ $page }}</span></li>--}}
                        <li class=" active" aria-current="page"><a href="#">{{ $page }}</a></li>
                    @else
                        <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="">
{{--                <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
                <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next Page</a>
            </li>
        @else
            <li class=" disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                {{--<span class="" aria-hidden="true">&rsaquo;</span>--}}
                <a href="#">Next Page</a>
            </li>

        @endif
    </ul>
@endif
