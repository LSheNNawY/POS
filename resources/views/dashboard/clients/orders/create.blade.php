@extends('layouts.dashboard.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('site.clients')
            <small> @lang('site.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="#">@lang('site.clients')</a></li>
            <li><a>@lang('site.make_order')</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title" style="margin-bottom: 10px">@lang('site.categories')</h3>
                    </div>
                    <div class="box-body">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($categories as $category)
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#{{str_replace(' ', '_', $category->name)}}" data-parent="#accordion" >
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{str_replace(' ', '_', $category->name) }}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        @if(count($category->products) > 0)
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>@lang('site.name')</th>
                                                    <th>@lang('site.stock')</th>
                                                    <th>@lang('site.sale_price')</th>
                                                    <th>@lang('site.add')</th>
                                                </tr>
                                                @foreach($category->products as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->stock }}</td>
                                                        <td>{{ $product->sale_price }}</td>
                                                        <td>
                                                            <a href="#"
                                                             class="btn btn-success add_product"
                                                             data-id="{{$product->id}}"
                                                             data-name="{{$product->name}}"
                                                             data-price="{{$product->sale_price}}">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        @else
                                        <h5>@lang('site.no_products')</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="box-title" style="margin-bottom: 10px">@lang('site.orders')</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody id="product_table"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('AdminLTE/dist/js/custom.js') }}"></script>
<script src="{{ asset('AdminLTE/dist/js/order.js') }}"></script>
@endpush