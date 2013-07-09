<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title>
            @section('title')
            :: Skeleton Laravel
            @show
        </title>
        <meta name="keywords" content="skeleton, laravel, skeleton larevel" />
        <meta name="author" content="FrancisCPD" />
        <meta name="description" content="Skeleton application developmento for laravel 4." />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{ basset_stylesheets('application') }}

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="container">
            @include('frontend.layouts.navbar')
            <div class="content">
                <div class="container">
                    <!-- Notifications -->
                    @include('notifications')

                    <!-- Content -->
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="container">
                <p class="muted credit">&copy; {{ date('Y') }} - Skeleton Laravel</p>
            </div>
        </footer>

        {{ basset_javascripts('application') }}
    </body>
</html>
