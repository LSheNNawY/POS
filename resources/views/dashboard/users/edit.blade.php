@extends('layouts.dashboard.app')

@section('content')
<div class="content-header">
    <h1>
        @lang('site.update')
        <small>@lang('site.control_panel')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index')  }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
        <li><a href="{{ route('dashboard.users.index')  }}">@lang('site.users')</a></li>
        <li><a>@lang('site.update')</a></li>
    </ol>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('site.add')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('dashboard.users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="box-body">
                    {{-- first name --}}
                    <div class="form-group">
                      <label for="first_name">@lang('site.first_name')</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                    </div>
                    {{-- last name --}}
                    <div class="form-group">
                      <label for="last_name">@lang('site.last_name')</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                    </div>
                    {{-- email--}}
                    <div class="form-group">
                      <label for="email">@lang('site.email')</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    {{-- password --}}
                    <div class="form-group">
                      <label for="password">@lang('site.password')</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="@lang('site.password')">
                    </div>

                    {{-- user id --}}
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('site.update')</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection