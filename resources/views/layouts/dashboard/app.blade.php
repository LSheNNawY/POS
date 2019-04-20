{{-- header --}}
@include('layouts.dashboard._header')
  {{--navbar--}}
  @include('layouts.dashboard._navbar')
  {{--  aside--}}
  @include('layouts.dashboard._aside')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->
  {{-- footer --}}
  @include('layouts.dashboard._footer')

