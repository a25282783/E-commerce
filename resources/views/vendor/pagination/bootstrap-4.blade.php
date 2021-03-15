@if ($paginator->hasPages())
<style>
.pagination ul li a  {
    display: block !important;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="pagination">
                <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            @else
                <li >
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class=" disabled" aria-disabled="true"><span >{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @if ($paginator->previousPageUrl())
                    <li>
                        <a href="{{ $element[$paginator->currentPage()-1] }}">
                            {{ $paginator->currentPage()-1 }}
                        </a>
                    </li>
                    @endif

                    <li>
                        <span href="{{ $element[$paginator->currentPage()] }}">
                            {{ $paginator->currentPage() }}
                        </span>
                    </li>

                    @if ($paginator->nextPageUrl())
                    <li>
                        <a href="{{ $element[$paginator->currentPage()+1] }}">
                            {{ $paginator->currentPage()+1 }}
                        </a>
                    </li>
                    @endif
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li >
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
</div>
</div>
@endif
