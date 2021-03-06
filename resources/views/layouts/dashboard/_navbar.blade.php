{{--  header --}}
  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('dashboard.index')  }}" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>@lang('site.site_name')</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- languages: -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
            </a>
            <ul class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <b>{{ $properties['native'] }}</b>
                        </a>
                    </li>
                @endforeach
            </ul>
          </li>


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ auth()->user()->image_path }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ auth()->user()->full_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">

                <p>
                  {{ auth()->user()->full_name}}
                  <small>{{ Carbon\Carbon::parse(auth()->user()->created_at)->diffForHumans() }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div>
                  <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">@lang('site.sign_out')</a>
                  <form action="/logout" method="post" style="display: none;" id="logoutForm">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>