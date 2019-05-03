@extends('layouts.dashboard.app')

@section('content')
<div class="content-header">
    <h1>
        @lang('site.update')
        <small>@lang('site.control_panel')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index')  }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
        <li><a href="{{ route('dashboard.categories.index')  }}">@lang('site.categories')</a></li>
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

            <!-- form start -->
            <form role="form" action="{{ route('dashboard.categories.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="box-body">
                    {{-- using laravel translatable to create inputs for site locale langs --}}
                    @foreach(config('translatable.locales') as $locale)
                      {{-- name --}}
                      <div class="form-group">
                        <label for="{{ $locale }}_name">@lang('site.'. $locale .'.name')</label>
                        <input type="text" class="form-control" 
                        value="{{ $category->translate($locale)->name }}" id="{{ $locale }}_name" name="{{ $locale }}[name]" required>
                      </div>
                    @endforeach

                    {{-- category id --}}
                    <input type="hidden" name="id" value="{{ $category->id }}">
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

@push('scripts')
<script src="{{ asset('AdminLTE/dist/js/custom.js') }}"></script>
@endpush