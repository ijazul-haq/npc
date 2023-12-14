<style>
    .active{
        border: 1px solid blue;
    }
</style>
@if (isset($paginator) && $paginator->lastPage() > 1)
<nav aria-label="Page navigation example">
  <ul class="pagination">
    @php
      $interval = isset($interval) ? abs(intval($interval)) : 3 ;
      $from = $paginator->currentPage() - $interval;
      if($from < 1){
        $from = 1;
      }
      
      $to = $paginator->currentPage() + $interval;
      if($to > $paginator->lastPage()){
        $to = $paginator->lastPage();
      }
    @endphp
    <!-- first/previous -->
    @if($paginator->currentPage() > 1)
    <li class="page-item">
      <a href="{{ $paginator->url(1) }}" aria-label="First" class="page-link">
      <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item">
      <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous" class="page-link">
      <span aria-hidden="true">&lsaquo;</span>
      </a>
    </li>
    @endif
    <!-- links -->
    @for($i = $from; $i <= $to; $i++)
    @php 
      $isCurrentPage = $paginator->currentPage() == $i;
    @endphp
    <li class="{{ $isCurrentPage ? 'active' : '' }}" class="page-item">
      <a href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}" class="page-link">
      {{ $i }}
      </a>
    </li>
    @endfor
    <!-- next/last -->
    @if($paginator->currentPage() < $paginator->lastPage())
    <li class="page-item">
      <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next" class="page-link">
      <span aria-hidden="true">&rsaquo;</span>
      </a>
    </li>
    <li class="page-item">
      <a href="{{ $paginator->url($paginator->lastpage()) }}" aria-label="Last" class="page-link">
      <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
    @endif
  </ul>
</nav>
@endif