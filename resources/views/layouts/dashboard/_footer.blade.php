 </div>
    <!-- ./wrapper -->
    <div class="wrapper">
       <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.

              <!-- jQuery 3 -->
          <script src="{{asset('AdminLTE')}}/bower_components/jquery/dist/jquery.min.js"></script>
          <!-- jQuery UI 1.11.4 -->
          <script src="{{asset('AdminLTE')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
          <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
          <script>
            $.widget.bridge('uibutton', $.ui.button);
          </script>
          <!-- Bootstrap 3.3.7 -->
          <script src="{{asset('AdminLTE')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
          <!-- Morris.js charts -->
          {{--<script src="{{asset('AdminLTE')}}/bower_components/raphael/raphael.min.js"></script>--}}
          {{--<script src="{{asset('AdminLTE')}}/bower_components/morris.js/morris.min.js"></script>--}}

          <!-- AdminLTE App -->
          <script src="{{asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>

           <script src="{{ asset('AdminLTE/dist/js/custom.js') }}"></script>

           <script>
           @if(session()->has('alertMessage'))
               var n = new Noty({
                    text: "{{ session()->get('alertMessage') }}",
                    type: "{{ session()->get('alertType') }}",
                    killer: true,
                    timeout: 2000,
                    theme: 'metroui'
                });

                n.show();
           @endif
           </script>

           @yield('scripts')
      </footer>
    </div>

</body>
</html>