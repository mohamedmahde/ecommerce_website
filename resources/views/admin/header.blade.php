<header class="header">   
    <nav class="navbar navbar-expand-lg">
   
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">    
          {{-- <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div> --}}
        
          <!-- Log out               -->
          <div class="list-inline-item logout">               
                {{-- <a id="logout" href="login.html" class="nav-link">Logout <i class="icon-logout"></i></a> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                   <input type="submit" value="logout">
                </form>
            </div>
        </div>
      </div>
    </nav>
  </header>