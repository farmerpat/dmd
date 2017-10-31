<!doctype html>
<html>
    <head>
        <title>DMD</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach ($spells as $spell)
                    <li>
                        <a href="/spell/{{ $spell->id }}">
                            {{ $spell->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </body>
</html>
