 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('public/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AppLight</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('public/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('admin/dashboard') }}" class="d-block"> {{ Auth::user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/home')}}" class="nav-link @if(Request::segment(2) == 'home') active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/about')}}" class="nav-link @if(Request::segment(2) == 'about') active @endif">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                About
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/watch_now')}}" class="nav-link @if(Request::segment(2) == 'watch_now') active @endif">
              <i class="nav-icon fa fa-video"></i>
              <p>
                Watch Now
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/features')}}" class="nav-link @if(Request::segment(2) == 'features') active @endif">
              <i class="nav-icon fa fa-key"></i>
              <p>
                Features
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/our_team')}}" class="nav-link @if(Request::segment(2) == 'our_team') active @endif">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Our Team
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/testimonial')}}" class="nav-link @if(Request::segment(2) == 'testimonial') active @endif">
              <i class="nav-icon fa fa-quote-left"></i>
              <p>
                Testimonial
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/faq')}}" class="nav-link @if(Request::segment(2) == 'faq') active @endif">
              <i class="nav-icon fa fa-question-circle"></i>
              <p>
                FAQ
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/contact')}}" class="nav-link @if(Request::segment(2) == 'contact') active @endif">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Contact
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/contact_us')}}" class="nav-link @if(Request::segment(2) == 'contact_us') active @endif">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Contact Us
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/download_our_app')}}" class="nav-link @if(Request::segment(2) == 'download_our_app') active @endif">
              <i class="nav-icon fa fa-download"></i>
              <p>
                Download Our App
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/logo')}}" class="nav-link @if(Request::segment(2) == 'logo') active @endif">
              <i class="nav-icon fa fa-image"></i>
              <p>
                Logo
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/seo')}}" class="nav-link @if(Request::segment(2) == 'seo') active @endif">
              <i class="nav-icon fa fa-book"></i>
              <p>
                SEO
              </p>
            </a>
          </li>

          


          <li class="nav-item">
            <a href="{{ url('admin/my_account')}}" class="nav-link @if(Request::segment(2) == 'my_account') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('logout')}}" class="nav-link @if(Request::segment(2) == 'logout') active @endif">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>


          

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>