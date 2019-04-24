@extends('layouts.dashboard.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('site.users')
            <small>@lang('site.control_panel')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index')  }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="#">@lang('site.users')</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.users')</h3>
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
                                <th>@lang('site.action')</th>
                            </tr>
                            @foreach($users as $index=>$user)
                            <tr>


                                <td>{{ $index + 1  }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a  class="btn btn-sm btn-danger" title="@lang('site.delete')" onclick='confirmDelete("deleteForm", "@lang('site.delete')", "@lang('site.cancel')")'>
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="@lang('site.update')"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <div class="hidden">
                                <form id="deleteForm" action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                            </tbody>
                        </table>
                        @else
                            <h4 class="text-center"><b>@lang('site.no_data')</b></h4>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $users->links()  }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function confirmDelete(formID, confirm, cancel) {
            var n = new Noty({text: "@lang('site.delete_confirm_msg')",
              buttons: [
                Noty.button(confirm, 'btn btn-danger', function () {
                    $('#deleteForm').submit();
                },{id: 'button1', 'data-status': 'ok'}),

                Noty.button(cancel, 'btn btn-error', function () {
                    n.close();
                })
              ]
            });
            n.show();
        }
    </script>
@endsection