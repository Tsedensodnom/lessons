<!DOCTYPE html>
<html>
    <body>
        <div>
            <b>Print variable</b><br>
            {{ $title }}<br>
            $countRandom: {{ $countRandom }}<br>
            The current UNIX timestamp is {{ time() }}.<br>
            This is another random variable: {{ rand(1, 100) }}<br> <!-- dotor php function duudah bolomjtoi -->
        </div>
        <div>
            <b>IF statement</b><br>
            @if ($countRandom > 50)
            $countRandom > 50<br>
            @else
            $countRandom < 50<br>
            @endif
            
            {{ isset($name)?$name:'Default text 1' }}<br>
            {{ $name or 'Default text 2' }}<br>
        </div>
        
        <div>
            <b>LOOP</b><br>
            @for ($i = 0; $i < 10; $i++)
                Loop index: {{ $i }}<br>
                @for ($j = 0; $j < 5; $j++)
                --Loop index: {{ $i }}.{{ $j }}<br>
                @endfor
            @endfor
        </div>
    </body>
</html>