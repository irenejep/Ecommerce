<ul class="list-group">
    @foreach($archives as $item)
        <li class="list-group-item">
        <a href="/products?month={{$item->month}}&year={{$item->year}}">
        {{$item->year}}
        {{$item->month}}
        ({{ $item->published }})
        </a>
        </li>
    @endforeach
    </ul>