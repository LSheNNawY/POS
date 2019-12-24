@extends('layouts.dashboard.app')
@section('content')
 <section class="content-header">
      <h1>
        @lang('site.dashboard')
        <small>@lang('site.control_panel')</small>
      </h1>
 </section>

 <!-- Main content -->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!-- clients -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ count($clients->toArray()) }}</h3>

              <p>@lang('site.clients')</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('dashboard.clients.index') }}" class="small-box-footer">@lang('site.more_info') <i class="fa fa-arrow-circle-{{App::isLocale('ar')? 'left' : 'right'}}"></i></a>
          </div>
        </div>
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!-- categories -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ count($categories->toArray()) }}</h3>

              <p>@lang('site.categories')</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('dashboard.categories.index') }}" class="small-box-footer">@lang('site.more_info') <i class="fa fa-arrow-circle-{{App::isLocale('ar')? 'left' : 'right'}}"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!-- products -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ count($products->toArray()) }}</h3>

              <p>@lang('site.products')</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">@lang('site.more_info') <i class="fa fa-arrow-circle-{{App::isLocale('ar')? 'left' : 'right'}}"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!-- orders -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ count($orders->toArray()) }}</h3>

              <p>@lang('site.orders')</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('dashboard.orders.index') }}" class="small-box-footer">@lang('site.more_info') <i class="fa fa-arrow-circle-{{App::isLocale('ar')? 'left' : 'right'}}"></i></a>
          </div>
        </div>




     </div>
      <!-- /.row -->

    </section>

    <!-- /.content -->

@endsection
