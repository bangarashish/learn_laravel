 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ route('dashboard') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('users')}}">
      <span>Users</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('interpreter.index')}}">
      <span>Interpreters</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('users')}}">
      <span>Clients</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('users')}}">
      <span>Request</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->