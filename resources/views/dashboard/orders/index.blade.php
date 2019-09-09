@extends('layouts.dashboard.app')

@section('content')
	<section class="content-header">
		<h1>
			@lang('site.orders')
			<small> @lang('site.control_panel')</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
			<li><a>@lang('site.orders')</a></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">

						<form action="{{ route('dashboard.orders.index') }}" method="get" id="searchForm">
							<div class="row">
								<div class="col-md-8">
									{{-- search --}}
									<input type="text" name="search" class="form-control" value="{{ request()->search }}" placeholder="@lang('site.search')">
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-search"></i>
										@lang('site.search')
									</button>
								</div>
							</div>
						</form>

					</div>
					<div class="box-body">
						@if(count($orders) > 0)
								<table class="table table-bordered table-hover">
									<tbody>
										<tr>
											<th>#</th>
											<th>@lang('site.name')</th>
											<th>@lang('site.total_price')</th>
											<th>@lang('site.order_status')</th>
											<th>@lang('site.creation_date')</th>
											<th>@lang('site.action')</th>
											{{--<th>@lang('site.add')</th>--}}
										</tr>
										@foreach($orders as $index=>$order)
										<tr>
											<td>{{ $index + 1 }}</td>
											<td>{{ $order->client->name }}</td>
											<td>{{ number_format($order->total_price, 2) }}</td>
											<td {{--class="label label-{{ ($title == 0)? 'warning':'success' }}--}}">@lang('site.order_status')</td>
											<td>{{ date_format($order->created_at, 'Y-m-d')}}</td>
											<td>
												<a href="#" class="label label-primary margin-r-5">
													<i class="fa fa-bars"></i> @lang('site.show')
												</a>
												<a href="#" class="label label-warning margin-r-5">
													<i class="fa fa-pencil"></i> @lang('site.update')
												</a>
												<a href="#" class="label label-danger">
													<i class="fa fa-trash"></i> @lang('site.delete')
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
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
							{{ $orders->appends(['search' => request()->search])->links() }}
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-primary">

					<div class="box-header">
						<h3 class="box-title" style="margin-bottom: 10px">@lang('site.show')</h3>
					</div>

					<div class="box-body">
						<!-- add new order form -->
						<form action="" method="post">
							@csrf
							<div class="form-group">
								<table class="table table-hover">
									<tbody id="product_table" class="order-list"></tbody>
								</table>
								<h4>@lang('site.total') : <span id="total_price">0</span></h4>
								<br>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('scripts')
	<script src="{{ asset('AdminLTE/dist/js/custom.js') }}"></script>
	<script src="{{ asset('AdminLTE/dist/js/jquery.number.min.js') }}"></script>
	<script src="{{ asset('AdminLTE/dist/js/order.js') }}"></script>
@endpush