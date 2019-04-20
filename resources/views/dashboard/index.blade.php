@extends('layouts.dashboard.app')
@section('content')
 <section class="content-header">
      <h1>
        @lang('site.dashboard')
        <small>@lang('site.control_panel')</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">@lang('site.dashboard')</li>
      </ol>
 </section>

 <!-- Main content -->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          {{ LaravelLocalization::getCurrentLocale() }}

      </div>
      <!-- /.row -->
 </section>
    <!-- /.content -->

@endsection
