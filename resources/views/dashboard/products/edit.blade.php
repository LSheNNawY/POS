@extends('layouts.dashboard.app')

@section('content')
    <div class="content-header">
        <h1>
            @lang('site.update')
            <small>@lang('site.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index')  }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{ route('dashboard.products.index')  }}">@lang('site.products')</a></li>
            <li><a>@lang('site.update')</a></li>
        </ol>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.update')</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            {{-- category --}}
                            <div class="form-group">
                                <label for="category">@lang('site.category')</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ ($category->id == $product->category_id)? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- using laravel translatable to create inputs for site locale langs --}}
                            @foreach(config('translatable.locales') as $locale)
                                {{-- name --}}
                                <div class="form-group">
                                    <label for="{{ $locale }}_name">@lang('site.'. $locale .'.name')</label>
                                    <input type="text" class="form-control"
                                           value="{{ $product->translate($locale)->name }}" id="{{ $locale }}_name" name="{{ $locale }}[name]" required>
                                </div>

                                {{-- description --}}
                                <div class="form-group">
                                    <label for="{{ $locale }}_description">@lang('site.'. $locale .'.description')</label>
                                    <textarea name="{{ $locale }}[description]" id="{{ $locale }}_description" class="ckeditor form-control">
                                {{ $product->translate($locale)->description }}
                            </textarea>
                                </div>
                            @endforeach

                            {{-- purchase price --}}
                            <div class="form-group">
                                <label for="purchase_price">@lang('site.purchase_price')</label>
                                <input type="number" class="form-control" id="purchase_price" name="purchase_price" placeholder="@lang('site.purchase_price')" value="{{ $product->purchase_price }}" min="1" required>
                            </div>

                            {{-- sale price --}}
                            <div class="form-group">
                                <label for="sale_price">@lang('site.sale_price')</label>
                                <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="@lang('site.sale_price')" value="{{ $product->sale_price }}" min="1" required>
                            </div>

                            {{-- image --}}
                            <div class="form-group">
                                <label for="image">@lang('site.product_image')</label>
                                <input type="file" class="form-control" id="image" name="image" onchange="imageUploadPreview(this)">
                            </div>

                            <div class="form-group">
                                <img src="{{ $product->image_path }}" alt="@lang('site.product_image')" class="img-thumbnail img-preview" style="width: 100px">
                            </div>

                            {{-- stock--}}
                            <div class="form-group">
                                <label for="stock">@lang('site.stock')</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="@lang('site.stock')" value="{{ $product->stock }}" min="1" required>
                            </div>

                            {{-- user id --}}
                            <input type="hidden" name="id" value="{{ $product->id }}">
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
	<script src="{{ asset('AdminLTE/plugins/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('AdminLTE/dist/js/custom.js') }}"></script>

	<script>
        CKEDITOR.config.language = "{{ app()->getLocale() }}";
	</script>
@endpush