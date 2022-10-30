
@if ($paginator->hasPages())
    <ul class="clearfix">
        @if ($paginator->onFirstPage())

        <li>
            <a aria-disabled="true">
                <i class="mdi mdi-menu-left"></i>
            </a>
        </li>

        @else

        <li>
            <a href="{{ $paginator->previousPageUrl() }}">
                <i class="mdi mdi-menu-left"></i>
            </a>
        </li>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li><a aria-disabled="true">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a href="{{ $url }}" aria-current="page">{{ $page }}</a>
                        </li>

                    @else
                     <li>
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    <i class="mdi mdi-menu-right"></i>
                </a>
            </li>
        @else
            <li>
                <a aria-disabled="true">
                    <i class="mdi mdi-menu-right"></i>
                </a>
            </li>
        @endif

    </ul>
@endif

