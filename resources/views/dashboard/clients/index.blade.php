@extends('layouts.dashboard.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('site.clients')
            <small>{{ $clients->total() }} &nbsp;&nbsp; @lang('site.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="#">@lang('site.clients')</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

						<form action="{{ route('dashboard.clients.index') }}" method="get" id="searchForm">
							<div class="row">
								<div class="col-md-4">
									{{-- search --}}
									<input type="text" name="search" class="form-control" value="{{ request()->search }}" placeholder="@lang('site.search')">
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-search"></i>
										@lang('site.search')
									</button>

									{{-- create client --}}
									@if(auth()->user()->hasPermission('create_clients'))
										<a href="{{ route('dashboard.clients.create') }}" class="btn btn-success">
											<i class="fa fa-plus-circle"></i>
											@lang('site.add')
										</a>
									@else
										<a href="#" class="btn btn-primary disabled"><i class="fa fa-plus-circle"></i>@lang('site.add')</a>
									@endif
								</div>
							</div>
						</form>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($clients) > 0)
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.address')</th>
                                <th></th>
                                <th>@lang('site.action')</th>
                            </tr>
                            @foreach($clients as $index=>$client)
                            <tr>

                                <td>{{ $index + 1  }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ implode($client->phone, ' - ') }}</td>
                                <td>{{ $client->address }}</td>
                                <td><a class="btn btn-primary" href="{{ route('dashboard.clients.order.create', $client->id) }}">@lang('site.make_order')</a></td>
                                <td>
                                    {{-- delete --}}
                                    @if(auth()->user()->hasPermission('delete_clients'))
                                    <div class="inline">
                                        <a  class="btn btn-sm btn-danger" title="@lang('site.delete')" onclick='confirmDelete("deleteForm", "@lang('site.delete_confirm_msg')", "@lang('site.delete')", "@lang('site.cancel')")'>
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form class="hidden" id="deleteForm" action="{{ route('dashboard.clients.destroy', $client->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                    @else
                                        <a  href="#" class="btn btn-sm btn-danger disabled" title="@lang('site.delete')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif

                                    {{-- update --}}
                                    @if(auth()->user()->hasPermission('update_clients'))
                                        <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-sm btn-warning" title="@lang('site.update')"><i class="fa fa-pencil"></i></a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning disabled" title="@lang('site.update')"><i class="fa fa-pencil"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        @else
                            <h4 class="text-center"><b>@lang('site.no_data')</b></h4>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $clients->appends(['search' => request()->search])->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('AdminLTE/dist/js/custom.js') }}"></script>
@endpush