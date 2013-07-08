<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <a class="brand" href="#">Skeleton Laravel</a>
        <ul class="nav">
            <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ route('home') }}">Home</a></li>
        </ul>
    </div>
</div>