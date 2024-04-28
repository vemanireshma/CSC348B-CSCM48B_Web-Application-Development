<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark gradient-custom">
  <!-- Container wrapper -->
  <div class="container-fluid py-2">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#"></a>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars text-light"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav d-flex flex-row mt-3 mt-lg-0">
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="#!">
            Blogs
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link disabled" aria-disabled="true" href="#!">
            Topics
          </a>
        </li>
        <li class="nav-item dropdown text-center mx-2 mx-lg-1">

        </li>
      </ul>
      <form class="d-flex input-group w-auto ms-lg-3 my-3 my-lg-0">
        <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-white border text-white" type="button" data-mdb-ripple-color="dark">
          Search
        </button>
      </form>
      <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
         @if (Auth::check())
                         @if (Auth::user()->role_as == '0')
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="{{ url('user/dashboard') }}">Dashboard</a>
        </li>
         @else
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link"   href="{{ url('admin/dashboard') }}">Admin Dashboard</a>
        </li>

        @endif

         <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
        </li>
         @else
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="/login">Sign In
          </a>
        </li>
         <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="/register">Register Account
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
