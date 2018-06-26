    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">@lang('Home')
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">@lang('About')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">@lang('Services')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">@lang('Contact')</a>
            </li>
          </ul>
          <script type="text/javascript">
            function redirect() {
            s = document.getElementById('q').value
            window.location.href='/search/'+s
            return false
            }
        </script>

          <form class="form-inline my-2 my-lg-0" method="get"  onsubmit="return redirect()"> 
          <!-- <form class="form-inline my-2 my-lg-0" method="get" action="/search"> -->
          <input class="form-control mr-sm-2" name="query" id="q" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> 
        <a href="/locale/en">        
          <button class="btn btn-outline-warning my-2 ml-3 my-sm-0" {{App::getLocale()=='en'?'disabled':''}} >
          En
        </button>
        </a>

        <a  href="/locale/uz">
          <button class="btn btn-outline-info my-2 ml-1 my-sm-0" {{App::getLocale()=='uz'?'disabled':''}} >
          Uz
          </button>
        </a>

        </div>
      </div>
    </nav>