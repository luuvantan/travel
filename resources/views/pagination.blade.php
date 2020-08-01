@if ($paginator->hasPages())
	<!-- Pagination -->
	<div class="pull-right pagination" style="float: right">
		<ul class="pagination">
			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
				<li class="disabled page-item">
					<a class="page-link font-weight-bold" href="#" aria-label="Previous">
						<i class="fa fa-angle-double-left font-weight-bold"></i>
					</a>
				</li>
				<li class="disabled page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<i class="fa fa-angle-left font-weight-bold"></i>
					</a>
				</li>
			@else
				<li class="page-item">
					<a class="page-link font-weight-bold" href="{{ $paginator->toArray()['first_page_url'] }}" aria-label="Previous">
						<i class="fa fa-angle-double-left font-weight-bold"></i>
					</a>
				</li>
				<li class=" disabledpage-item">
					<a class="page-link" href="{{ $paginator->previousPageUrl() }}">
						<span><i class="fa fa-angle-left font-weight-bold"></i></span>
					</a>
				</li>
			@endif

			{{-- Pagination Elements --}}
			@foreach ($elements as $element)
				{{-- Array Of Links --}}
				@if (is_array($element))
					@foreach ($element as $page => $url)
						@if ($page == $paginator->currentPage())
							@if ($paginator->currentPage() - 2 != 0 && $paginator->currentPage() != 1)
								<li class="page-item"><a class="page-link" href="{{ $paginator->toArray()['first_page_url'] }}">1</a></li>
								<li class="disabled page-item"><span><a class="page-link" href="#">...</a></span></li>
							@elseif ( $paginator->currentPage() != 1)
								<li class="page-item"><a class="page-link" href="{{ $paginator->toArray()['first_page_url'] }}">1</a></li>
							@endif
							<li class="active page-item"><span><a class="page-link" href="#">{{ $page }}</a></span></li>
						@elseif (($page == $paginator->currentPage() + 1) || $page == $paginator->lastPage())
							<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
						@elseif (($page == $paginator->lastPage() - 1) && ($paginator->currentPage() != $paginator->lastPage()))
							<li class="disabled page-item"><span><a class="page-link" href="#">...</a></span></li>
						@endif
					@endforeach
				@endif
			@endforeach

			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
				<li>
					<a class="page-link" href="{{ $paginator->nextPageUrl() }}">
						<span><i class="fa fa-angle-right font-weight-bold"></i></span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="{{ $paginator->toArray()['last_page_url'] }}" aria-label="Next">
						<i class="fa fa-angle-double-right font-weight-bold"></i>
					</a>
				</li>
			@else
				<li class="disabled page-item">
					<a class="page-link" href="#" aria-label="Next">
						<i class="fa fa-angle-right font-weight-bold"></i>
					</a>
				</li>
				<li class="disabled page-item">
					<a class="page-link" href="#" aria-label="Next">
						<i class="fa fa-angle-double-right font-weight-bold"></i>
					</a>
				</li>
			@endif
		</ul>
	</div>
	<!-- Pagination -->
@endif
