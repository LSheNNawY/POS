@extends('layouts.dashboard.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('site.users')
            <small>{{ $users->total() }} &nbsp;&nbsp; @lang('site.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="#">@lang('site.users')</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

						<form action="{{ route('dashboard.users.index') }}" method="get" id="searchForm">
							<div class="row">
								<div class="col-md-4">
									<input type="text" name="search" class="form-control" value="{{ request()->search }}" placeholder="@lang('site.search')">
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-search"></i>
										@lang('site.search')
									</button>

									{{-- create user --}}
									@if(auth()->user()->hasPermission('create_users'))
										<a href="{{ route('dashboard.users.create') }}" class="btn btn-success">
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
                        @if(count($users) > 0)
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>@lang('site.first_name')</th>
                                <th>@lang('site.last_name')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.user_image')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            @foreach($users as $index=>$user)
                            <tr>

                                <td>{{ $index + 1  }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td> 
                                    <img src="{{ $user->image_path }}" style="width: 70px" class="img-thumbnail" alt="@lang('site.user_image')">
                                </td>
                                <td>
                                    {{-- delete --}}
                                    @if(auth()->user()->hasPermission('delete_users'))
                                    <div class="inline">
                                        <a  class="btn btn-sm btn-danger" title="@lang('site.delete')" onclick='confirmDelete("deleteForm", "@lang('site.delete_confirm_msg')", "@lang('site.delete')", "@lang('site.cancel')")'>
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form class="hidden" id="deleteForm" action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
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
                                    @if(auth()->user()->hasPermission('update_users'))
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="@lang('site.update')"><i class="fa fa-pencil"></i></a>
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
                            {{ $users->appends(['search' => request()->search])->links() }}
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