  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->last_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> @lang('site.online')</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">@lang('site.main_navigation')</li>
        {{-- categories --}}
        @if(auth()->user()->hasPermission('read_categories'))
          <li class="{{ menu_active_link('categories') }}">
            <a href="{{ route('dashboard.categories.index') }}">
              <i class="fa fa-object-group"></i> <span>@lang('site.categories')</span>
            </a>
          </li>
        @endif

        {{-- products --}}
        @if(auth()->user()->hasPermission('read_products'))
          <li class="{{ menu_active_link('products') }}">
            <a href="{{ route('dashboard.products.index') }}">
              <i class="fa fa-shopping-basket"></i> <span>@lang('site.products')</span>
            </a>
          </li>
        @endif

        {{-- clients--}}
        @if(auth()->user()->hasPermission('read_clients'))
          <li class="{{ menu_active_link('clients') }}">
            <a href="{{ route('dashboard.clients.index') }}">
              <i class="fa fa-group"></i> <span>@lang('site.clients')</span>
            </a>
          </li>
        @endif

          {{-- orders--}}
        @if(auth()->user()->hasPermission('read_orders'))
          <li class="{{ menu_active_link('orders') }}">
            <a href="{{ route('dashboard.orders.index') }}">
              <i class="fa fa-group"></i> <span>@lang('site.orders')</span>
            </a>
          </li>
        @endif

        {{-- admins --}}
		@if(auth()->user()->hasPermission('read_users'))
        <li class="{{ menu_active_link('users') }}">
          <a href="{{ route('dashboard.users.index') }}">
            <i class="fa fa-key"></i> <span>@lang('site.users')</span>
          </a>
        </li>
        @endif


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
