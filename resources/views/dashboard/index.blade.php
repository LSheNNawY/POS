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
      <div class="row">
      	<section class="col-md-12  connectedSortable ui-sortable">
      		<div class="nav-tabs-custom" style="cursor: move;">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right ui-sortable-handle">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="623.906" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="51.546875" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.046875,261H598.906" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.546875" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.046875,202H598.906" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.546875" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.046875,143H598.906" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.546875" y="84.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.046875,84.00000000000003H598.906" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="51.546875" y="25.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M64.046875,25.00000000000003H598.906" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="500.7726732989064" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="262.9130867253949" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="#74a5c2" stroke="none" d="M64.046875,219.05493333333334C78.99433535844472,219.56626666666668,108.88925607533415,222.62345,123.83671643377886,221.10026666666667C138.78417679222358,219.57708333333335,168.679097509113,209.1355825136612,183.62655786755772,206.86946666666668C198.41154583080194,204.6279825136612,227.9815217572904,204.88215,242.76650972053463,203.06986666666666C257.55149768377885,201.25758333333332,287.1214736102673,194.9129178506375,301.90646157351154,192.3712C316.8539219319563,189.80155118397084,346.74884264884565,182.51721666666668,361.6963030072904,182.6244C376.64376336573514,182.73158333333333,406.5386840826245,204.18057122040074,421.48614444106926,193.22866666666667C436.27113240431345,182.39580455373408,465.84110833080194,101.94395359116024,480.62609629404614,95.48533333333336C495.2486118620899,89.09768692449357,524.4936429981774,135.1380230769231,539.1161585662211,141.8436C554.0636189246658,148.69818974358975,583.9585396415553,147.7554,598.906,149.726L598.906,261L64.046875,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#3c8dbc" d="M64.046875,219.05493333333334C78.99433535844472,219.56626666666668,108.88925607533415,222.62345,123.83671643377886,221.10026666666667C138.78417679222358,219.57708333333335,168.679097509113,209.1355825136612,183.62655786755772,206.86946666666668C198.41154583080194,204.6279825136612,227.9815217572904,204.88215,242.76650972053463,203.06986666666666C257.55149768377885,201.25758333333332,287.1214736102673,194.9129178506375,301.90646157351154,192.3712C316.8539219319563,189.80155118397084,346.74884264884565,182.51721666666668,361.6963030072904,182.6244C376.64376336573514,182.73158333333333,406.5386840826245,204.18057122040074,421.48614444106926,193.22866666666667C436.27113240431345,182.39580455373408,465.84110833080194,101.94395359116024,480.62609629404614,95.48533333333336C495.2486118620899,89.09768692449357,524.4936429981774,135.1380230769231,539.1161585662211,141.8436C554.0636189246658,148.69818974358975,583.9585396415553,147.7554,598.906,149.726" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="64.046875" cy="219.05493333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="123.83671643377886" cy="221.10026666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="183.62655786755772" cy="206.86946666666668" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="242.76650972053463" cy="203.06986666666666" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="301.90646157351154" cy="192.3712" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="361.6963030072904" cy="182.6244" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="421.48614444106926" cy="193.22866666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="480.62609629404614" cy="95.48533333333336" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="539.1161585662211" cy="141.8436" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="598.906" cy="149.726" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#eaf3f6" stroke="none" d="M64.046875,240.02746666666667C78.99433535844472,239.8072,108.88925607533415,241.35496666666666,123.83671643377886,239.1464C138.78417679222358,236.93783333333334,168.679097509113,223.33676429872497,183.62655786755772,222.35893333333334C198.41154583080194,221.39173096539162,227.9815217572904,233.23263333333333,242.76650972053463,231.36626666666666C257.55149768377885,229.4999,287.1214736102673,209.2890577413479,301.90646157351154,207.428C316.8539219319563,205.54649107468123,346.74884264884565,214.43916666666667,361.6963030072904,216.39600000000002C376.64376336573514,218.35283333333336,406.5386840826245,232.37947613843355,421.48614444106926,223.08266666666668C436.27113240431345,213.88690947176687,465.84110833080194,148.2268241252302,480.62609629404614,142.42573333333334C495.2486118620899,136.68839079189686,524.4936429981774,170.47037838827842,539.1161585662211,176.92893333333336C554.0636189246658,183.53101172161175,583.9585396415553,190.23343333333335,598.906,194.66826666666668L598.906,261L64.046875,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#a0d0e0" d="M64.046875,240.02746666666667C78.99433535844472,239.8072,108.88925607533415,241.35496666666666,123.83671643377886,239.1464C138.78417679222358,236.93783333333334,168.679097509113,223.33676429872497,183.62655786755772,222.35893333333334C198.41154583080194,221.39173096539162,227.9815217572904,233.23263333333333,242.76650972053463,231.36626666666666C257.55149768377885,229.4999,287.1214736102673,209.2890577413479,301.90646157351154,207.428C316.8539219319563,205.54649107468123,346.74884264884565,214.43916666666667,361.6963030072904,216.39600000000002C376.64376336573514,218.35283333333336,406.5386840826245,232.37947613843355,421.48614444106926,223.08266666666668C436.27113240431345,213.88690947176687,465.84110833080194,148.2268241252302,480.62609629404614,142.42573333333334C495.2486118620899,136.68839079189686,524.4936429981774,170.47037838827842,539.1161585662211,176.92893333333336C554.0636189246658,183.53101172161175,583.9585396415553,190.23343333333335,598.906,194.66826666666668" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="64.046875" cy="240.02746666666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="123.83671643377886" cy="239.1464" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="183.62655786755772" cy="222.35893333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="242.76650972053463" cy="231.36626666666666" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="301.90646157351154" cy="207.428" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="361.6963030072904" cy="216.39600000000002" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="421.48614444106926" cy="223.08266666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="480.62609629404614" cy="142.42573333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="539.1161585662211" cy="176.92893333333336" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="598.906" cy="194.66826666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 21.0234px; top: 154px; display: none;"><div class="morris-hover-row-label">2011 Q1</div><div class="morris-hover-point" style="color: #a0d0e0">
  Item 1:
  2,666
</div><div class="morris-hover-point" style="color: #3c8dbc">
  Item 2:
  2,666
</div></div></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><svg height="300" version="1.1" width="653.906" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3c8dbc" d="M326.953,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,415.18075519497705,180.44625304313007" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3c8dbc" stroke="#ffffff" d="M326.953,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,418.01664732624414,181.4248826052307L454.5681459070204,194.03833029452744A135,135,0,0,1,326.953,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f56954" d="M415.18075519497705,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,243.2378462783141,108.73398312817662" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#f56954" stroke="#ffffff" d="M418.01664732624414,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,240.54700205154563,107.40757544301087L201.38026941747114,88.10097469226493A140,140,0,0,1,459.29463279246556,195.6693795646951Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00a65a" d="M243.2378462783141,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,326.9236784690488,243.333328727518" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00a65a" stroke="#ffffff" d="M240.54700205154563,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,326.9227359912682,246.3333285794739L326.91058849987417,284.9999933380171A135,135,0,0,1,205.8650097954186,90.31165416754118Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="326.953" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1,0,0,1,0,0)"><tspan dy="140" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan></text><text x="326.953" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1,0,0,1,0,0)"><tspan dy="160" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text></svg></div>
            </div>
          </div>
      	</section>
      </div>
      

    </section>

    <!-- /.content -->

@endsection
