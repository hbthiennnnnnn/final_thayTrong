@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        <!-- Previous Button -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span> <!-- Mũi tên trái -->
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a> <!-- Mũi tên trái -->
            </li>
        @endif

        <!-- Pages -->
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span> <!-- Trang hiện tại -->
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a> <!-- Các trang số -->
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Button -->
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a> <!-- Mũi tên phải -->
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span> <!-- Mũi tên phải -->
            </li>
        @endif
    </ul>
@endif
