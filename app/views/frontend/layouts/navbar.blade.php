<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{{ route('home') }}">Skeleton Laravel</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ route('home') }}">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>