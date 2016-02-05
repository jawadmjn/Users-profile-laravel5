@if ( isset($reqPagination) )
<ul class="pagination">
@for ($i = 1; $i <= $reqPagination; $i++)
    <li class=<?php echo ( $i == $active ) ? 'active' : ''; ?>>
        <a href="?page={{$i}}">{{ $i }}</a>
    </li>
@endfor
</ul>
@endif