   <!-- Navigation -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('news.parent') }}">news</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.parent') }}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('thread.local') }}">local news</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('thread.international') }}">International news</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('thread.sport') }}">sport news</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.conatct') }}">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
