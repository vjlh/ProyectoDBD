<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ProyectoDBD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="https://bootswatch.com/4/sandstone/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Scripts -->
    </head>
    <body>
        @include('includes.navbar')
        @include('includes.carousel')
        <div class="flex-center position-ref">
            

            <div class="content">
                <div class="title m-b-md">
                    Aerolínea G8
                </div>

                <div class="links">
                    <a href="https://www.google.cl">Google</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
