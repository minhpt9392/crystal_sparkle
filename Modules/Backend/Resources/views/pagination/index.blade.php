<ul class="pagination pagination-sm">
    @if($total_page >= 3)
    <li value="1"><a href="#" class="{{$current_page != 1 ? "" : "btn disabled"}}">First</a></li>
    <li value="{{$current_page - 1 >= 1 ? $current_page - 1 : 1}}"><a href="#" class="{{$current_page != 1 ? "" : "btn disabled"}}">Previous</a></li>
    @elseif($total_page == 2)
        <li value="{{$current_page - 1 >= 1 ? $current_page - 1 : 1}}"><a href="#" class="{{$current_page != 1 ? "" : "btn disabled"}}">Previous</a></li>
    @endif
    @for($i = 1; $i <= $total_page; $i++)
        @if($total_page <= 10)
            <li class="{{$i == $current_page ? "active" : ""}}" value="{{$i}}"><a href="#">{{$i}}</a></li>
        @else
            @if($i <= 8 && $current_page < 5)
                <li class="{{$i == $current_page ? "active" : ""}}" value="{{$i}}"><a href="#">{{$i}}</a></li>
            @elseif($current_page >= 5 && $current_page < $total_page - 3 && $i >= $current_page - 4 && $i <= $current_page + 4)
                <li class="{{$i == $current_page ? "active" : ""}}" value="{{$i}}"><a href="#">{{$i}}</a></li>
            @elseif($current_page >= $total_page - 3 && $i >= $total_page - 8)
                <li class="{{$i == $current_page ? "active" : ""}}" value="{{$i}}"><a href="#">{{$i}}</a></li>
            @endif
        @endif
    @endfor
    @if($total_page >= 3)
    <li value="{{$current_page + 1 > $total_page ? $total_page : $current_page + 1}}"><a href="#"  class="{{$current_page != $total_page ? "" : "btn disabled"}}">Next</a></li>
    <li value="{{$total_page}}"><a href="#" class="{{$current_page != $total_page ? "" : "btn disabled"}}">Last</a></li>
    @elseif($total_page == 2)
            <li value="{{$current_page + 1 > $total_page ? $total_page : $current_page + 1}}"><a href="#" class="{{$current_page ==1 ? "" : "btn disabled"}}">Next</a></li>
    @endif
</ul>