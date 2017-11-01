<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        {{--<link rel="icon" href="favicon.ico">--}}
        <title>DMD</title>
        <link href="/css/app.css" rel="stylesheet">

        @yield ("styles")

    </head>

    <body>

        <div class="container">

            @include ("partials.nav")

            @yield ("content")

        </div>
        <script src="/js/app.js"></script>
        <script>
            $("nav a").on("click", function(){
                $(" nav").find(".active").removeClass("active");
                $(this).parent().addClass("active");
            });
        </script>
        @yield ("scripts")
    </body>
</html>
