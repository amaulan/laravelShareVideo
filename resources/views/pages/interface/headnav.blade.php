<nav class="navbar navbar-inverse" style="border-radius:0px;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('home')}}">SobatDev</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav" style="border-radius:0px;">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Other <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('create_feedback')}}">Feedback</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Get <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="https://getcomposer.org/">Composer</a></li>
            <li><a href="https://codeigniter.com/">CodeIniter</a></li>
            <li><a href="http://getbootstrap.com/">Bootstrap</a></li>
          </ul>
        </li>
        <li><a href="https://laravel.com/docs/5.4/installation#installation">Install Laravel</a></li>
        <li><a href="{{url('subscribe')}}">Subscribe</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
      @if(Auth::check())
        <li><a href="{{url('userout')}}">Logout</a></li>
      @else
        <li><a href="{{url('userlog')}}">Login</a></li>
        <li><a href="{{url('daftar')}}">Daftar</a></li>
      @endif
      </ul>
    </div>
  </div>
</nav>