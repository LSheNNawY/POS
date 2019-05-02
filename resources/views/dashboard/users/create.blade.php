@extends('layouts.dashboard.app')

@section('content')
<div class="content-header">
    <h1>
        @lang('site.users')
        <small>@lang('site.control_panel')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index')  }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
        <li><a href="{{ route('dashboard.users.index')  }}">@lang('site.users')</a></li>
        <li><a>@lang('site.add')</a></li>
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
            <form role="form" action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    {{-- first name --}}
                    <div class="form-group">
                      <label for="first_name">@lang('site.first_name')</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="@lang('site.first_name')" value="{{ old('first_name') }}" required>
                    </div>
                    {{-- last name --}}
                    <div class="form-group">
                      <label for="last_name">@lang('site.last_name')</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="@lang('site.last_name')" value="{{ old('last_name') }}" required>
                    </div>
                    {{-- email--}}
                    <div class="form-group">
                      <label for="email">@lang('site.email')</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="@lang('site.email')" value="{{ old('email') }}" required>
                    </div>
                    {{-- password --}}
                    <div class="form-group">
                      <label for="password">@lang('site.password')</label>
                      <input type="password" class="form-control" id="password"  name="password" placeholder="@lang('site.password')" required>
                    </div>

                    {{-- image --}}
                    <div class="form-group">
                        <label for="image"> @lang('site.user_image') </label>
                        <input type="file" name="image" id="image" class="form-control" onchange="imageUploadPreview(this)">
                    </div>

                    <div class="form-group">
                      <img class="img-preview" class="img-thumbnail" style="width: 100px">
                    </div>

                    @php
                    $models = ['users', 'categories', 'dishes'];
                    $permissions = ['create', 'read', 'update', 'delete'];
                    @endphp

                    <div class="form-group">
                        <label> @lang('site.permissions') </label>
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                @foreach($models as $index=>$model)
                                <li class="{{ $index == 0? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.'.$model)</a></li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach($models as $index=>$model)
                                    <div class="tab-pane {{ $index == 0? 'active' : '' }}" id="{{ $model }}">
                                        @foreach($permissions as $index=>$permission)
                                            <label style="display: inline-block; margin:0 5px;"><input style="display: inline-block ;margin:0 2px" type="checkbox" name="permissions[]" value="{{ $permission.'_'.$model }}">@lang('site.'.$permission)</label>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div> <!-- end of .form-group -->
                </div><!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('site.add')</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('AdminLTE/dist/js/custom.js') }}"></script>
@endpush