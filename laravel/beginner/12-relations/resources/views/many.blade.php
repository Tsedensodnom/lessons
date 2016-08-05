<div>
    <ul>
        @foreach ($categories as $c)
            <li>
                <b>{{ $c->name }}</b>
                <ul>
                    @foreach ($c->products as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
    <hr>
    
    <ul>
        @foreach ($products as $item)
            <li>
                <b>{{ $item->name }}</b>
                <ul>
                    @foreach ($item->categories as $c)
                        <li>{{ $c->name }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>