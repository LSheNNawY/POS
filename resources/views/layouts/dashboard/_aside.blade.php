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
		{{-- users --}}
		@if(auth()->user()->hasPermission('read_users'))
        <li class="{{ menu_active_link('users') }}">
          <a href="{{ route('dashboard.users.index') }}">
            <i class="fa fa-group"></i> <span>@lang('site.users')</span>
          </a>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
