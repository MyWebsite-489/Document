@if (!empty($paginator))
    <div class="row">
        @if ($paginator->hasPages())
            <div class="col-sm-12 col-md-12">
                <div class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination justify-content-end">
                        <li
                            class="paginate_button page-item previous {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
                            <a href="{{ $paginator->previousPageUrl() }}" tabindex="0"
                                class="page-link">Previous</a>
                        </li>
                        @foreach ($elements as $element)
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <li
                                        class="paginate_button page-item {{ $page == $paginator->currentPage() ? ' active' : '' }}">
                                        <a href="{{ $url }}" tabindex="0"
                                            class="page-link">{{ $page }}</a>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                        <li class="paginate_button page-item next {{ $paginator->hasMorePages() ? '' : ' disabled' }}">
                            <a href="{{ $paginator->nextPageUrl() }}" tabindex="0" class="page-link">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endif
