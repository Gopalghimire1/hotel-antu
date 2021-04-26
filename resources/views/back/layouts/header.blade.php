<header class="app-header app-header-dark">
    <!-- .top-bar -->
    <div class="top-bar">
      <!-- .top-bar-brand -->
      <div class="top-bar-brand">
        <a href="#">HOTEL MANAGEMENT</a>
      </div><!-- /.top-bar-brand -->
      <!-- .top-bar-list -->
      <div class="top-bar-list">
        <!-- .top-bar-item -->
        <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
          <!-- toggle menu -->
          <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
        </div><!-- /.top-bar-item -->
        <!-- .top-bar-item -->

        <!-- .top-bar-item -->
        <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
          <!-- .nav -->

          <!-- .btn-account -->
          <div class="dropdown d-flex">
            <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-summary pr-lg-4 d-none d-lg-block"><span class="account-name">{{ Auth::user()->username }}</span> <span class="account-description">Marketing Manager</span></span></button> <!-- .dropdown-menu -->
            <div class="dropdown-menu">
              <div class="dropdown-arrow ml-3"></div>
              <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6><a class="dropdown-item" href="#"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="{{ route('logout') }}"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
            </div><!-- /.dropdown-menu -->
          </div><!-- /.btn-account -->
        </div><!-- /.top-bar-item -->
      </div><!-- /.top-bar-list -->
    </div><!-- /.top-bar -->
  </header><!-- /.app-header -->
  <!-- .app-aside -->
  <aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
      <!-- .aside-header -->
      <header class="aside-header d-block d-md-none">
        <!-- .btn-account -->
        <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
        <!-- .dropdown-aside -->
        <div id="dropdown-aside" class="dropdown-aside collapse">
          <!-- dropdown-items -->
          <div class="pb-3">
            <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
          </div><!-- /dropdown-items -->
        </div><!-- /.dropdown-aside -->
      </header><!-- /.aside-header -->
      <!-- .aside-menu -->
      <div class="aside-menu overflow-hidden">
        <!-- .stacked-menu -->
        <nav id="stacked-menu" class="stacked-menu">
          <!-- .menu -->
          <ul class="menu">
            <!-- .menu-item -->
            <li class="menu-item has-active">
               <a href="{{ url('/admin')}}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
            </li><!-- /.menu-item -->

            <!-- .menu-item -->
           <li class="menu-item">
             <a href="{{ route('reservation.index') }}" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Reservation</span></a>
           </li><!-- /.menu-item -->

            <!-- .menu-item -->
            <li class="menu-item">
              <a href="{{ route('guest.list') }}" class="menu-link"><span class="menu-icon oi oi-person"></span> <span class="menu-text">Guests</span></a>
            </li><!-- /.menu-item -->

            <!-- .menu-item -->
            <li class="menu-item has-child">
              <a href="#" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Hotel Configuration</span></a> <!-- child menu -->
              <ul class="menu">
                <li class="menu-item">
                  <a href="{{ route('roomType.index') }}" class="menu-link">Room Type</a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('rooms.index') }}" class="menu-link">Rooms</a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('paid.index') }}" class="menu-link">Paid Service</a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('floors.index') }}" class="menu-link">Floors</a>
                </li>

                <li class="menu-item">
                   <a href="{{ route('amenities.index') }}" class="menu-link">Amenities</a>
                </li>

              </ul><!-- /child menu -->
            </li><!-- /.menu-item -->

            <li class="menu-item">
                <a href="{{ route('admin.gallery.home')}}" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Gallery</span></a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin.blog.home',0) }}" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Experiences</span></a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin.blog.home',1) }}" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Blogs</span></a>
            </li>

            <li class="menu-item">
                <a href="" class="menu-link"><span class="menu-icon oi oi-wrench"></span> <span class="menu-text">Users</span></a>
            </li>

            <!-- .menu-header -->
            <li class="menu-header">Interfaces </li><!-- /.menu-header -->
            <!-- .menu-item -->
            <li class="menu-item has-child">
              <a href="#" class="menu-link"><span class="menu-icon oi oi-pencil"></span> <span class="menu-text">More</span></a> <!-- child menu -->
              <ul class="menu">
                <li class="menu-item">
                  <a href="#" class="menu-link">Basic Elements</a>
                </li>
              </ul><!-- /child menu -->
            </li><!-- /.menu-item -->


          </ul><!-- /.menu -->
        </nav><!-- /.stacked-menu -->
      </div><!-- /.aside-menu -->
      <!-- Skin changer -->
      <footer class="aside-footer border-top p-3">
        <button class="btn btn-light btn-block text-primary" data-toggle="skin">Night mode <i class="fas fa-moon ml-1"></i></button>
      </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
  </aside><!-- /.app-aside -->
