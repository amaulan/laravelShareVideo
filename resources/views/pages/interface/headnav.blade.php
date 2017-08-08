<nav class="navbar navbar-inverse">
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Install <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Install Laravel</a></li>
            <li><a href="#">Install CodeIniter</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Information <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Feedback</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </li>

      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      @if(Auth::check())
        <li><a href="#">Logout</a></li>
      @else
        <li><a href="#">Login</a></li>
        <li><a href="#">Signup</a></li>
      @endif
      </ul>
    </div>
  </div>
</nav>