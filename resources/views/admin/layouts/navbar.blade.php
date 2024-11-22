<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block" style="padding: 2px 20px; border: 2px solid #007bff; background: #fff; border-radius: 50px;">
        <a href="{{ route('site.home') }}"  target="_blank" class="nav-link">Visit Store</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <form method="POST" action="{{route('admin.auth.logout')}}">
            @csrf
            <button type="submit" class="btn btn-info">Logout</button>
        </form>
      </li> --}}
    </ul>
  </nav>
