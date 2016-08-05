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
</div>