<header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>ADMIN</b></a>
      <!--logo end-->
      @if(isset($data['route']))

      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme03">{{$data['feedback']->count()}}</span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have {{$data['new_feedbacks']->count()}} new feedbacks</p>
              </li>

              @foreach($data['new_feedbacks'] as $index => $feedback)

              <li>
                <a href="#">
                  <span class="subject">
                    <span class="from">{{$feedback->created_at}}</span>
                    <span class="time"></span>
                  </span>
                  <span class="message" style="overflow-x: hidden; ">
                    {{$feedback->feedback_text}}
                  </span>
                </a>
              </li>

              @endforeach

              <li>
                <a href="{{ url('admin/manage/email/feedback') }}"">See all feedbacks</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->



           <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-heart-o"></i>
              <span class="badge bg-theme04">{{$data['subscribe']->count()}}</span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have {{$data['new_subscribes']->count()}} new subscribes</p>
              </li>
              @foreach($data['new_subscribes'] as $index => $subscribe)

              <li>
                <a href="#">
                  <span class="subject">
                    <span class="from">Hy {{\Auth::user()->username}}</span>
                    <span class="time"></span>
                  </span>
                  <span class="message" style="overflow-x: hidden; ">
                    {{$subscribe->email}} was subscribe us
                  </span>
                </a>
              </li>

              @endforeach
              <li>
                <a href="{{ url('admin/manage/email/subscriber') }}"">See all subscribes</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
      </div>

      @else

      @endif

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ url('logout') }}">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->