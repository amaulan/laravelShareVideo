<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      
      <p class="centered"><a href="profile.html"><img src="{{ url('assets/img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
      <h5 class="centered">{{ @Auth::user()->username }}</h5>
      
      <li class="mt">
        <a href="{{  url('admin/manage/dashboard') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="{{ url('admin/manage/category') }}" >
          <i class="fa fa-desktop"></i>
          <span>Category</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="{{ url('admin/manage/level') }}" >
          <i class="fa fa-cogs"></i>
          <span>Level</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-book"></i>
          <span>Courses</span>
        </a>
        <ul class="sub">
          <li><a  href="{{ url('admin/manage/course/me') }}">My Course</a></li>
          <li><a  href="{{ url('admin/manage/course/all') }}">All Course</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class=" fa fa-bar-chart-o"></i>
          <span>Comment</span>
        </a>
        <ul class="sub">
          <li><a  href="morris.html">Morris</a></li>
          <li><a  href="chartjs.html">Chartjs</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-tasks"></i>
          <span>Email</span>
        </a>
        <ul class="sub">
          <li><a  href="{{ url('admin/manage/email/compose') }}">Compose</a></li>
          <li><a  href="{{ url('admin/manage/email/subcriber') }}">Subcriber List</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class="fa fa-th"></i>
          <span>Manage Users</span>
        </a>
        <ul class="sub">
          <li><a  href="{{ url('admin/manage/admin') }}">Admins</a></li>
          <li><a  href="{{ url('admin/manage/users') }}">Users</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" >
          <i class=" fa fa-bar-chart-o"></i>
          <span>About</span>
        </a>
        <ul class="sub">
          <li><a  href="morris.html">Morris</a></li>
          <li><a  href="chartjs.html">Chartjs</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->