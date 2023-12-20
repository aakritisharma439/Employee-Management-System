  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/default-image.png") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="active"><a href="/"><i class="fa fa-dashboard fa-lg"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ route('employees.list') }}"><i class="fa fa-users fa-lg"></i> <span> Employees List</span></a></li>
        <li><a href="{{ route('employees.create') }}"><i class="fa fa-user fa-lg"></i> <span> Add Employees </span></a></li>
        <li><a href="{{ route('departments.list') }}"><i class="fa fa-building fa-lg"></i><span> Department List </span></a></li>
        <li>
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out fa-lg"></i><span> Logout</span>
          </a>
          <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </section>
  </aside>