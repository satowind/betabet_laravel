@extends('includes.admin')
@section('content')
				
		
		<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="{{$customers}}" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
					<h3>Users</h3>
					
				</div>
		
			</div>
		
		

			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="{{$admin}}" data-postfix="" data-duration="1500" data-delay="600">0</div>
		
					<h3>Administrators</h3>
					
				</div>
		
			</div>
			
			<div class="clear visible-xs"></div>
		
 
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-mail"></i></div>
					<div class="num" data-start="0" data-end="{{$funding}}" data-postfix="" data-duration="1500" data-delay="1200">0</div>
		
					<h3>Pending Fundings</h3>
					
				</div>
		
			</div>
			
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-rss"></i></div>
					<div class="num" data-start="0" data-end="{{$withdraw}}" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
					<h3>Pending Withdrawals</h3>
					
				</div>
		
			</div>

			<br />

			{{--<div class="col-sm-3 col-xs-6">--}}
		{{----}}
				{{--<div class="tile-stats tile-green">--}}
					{{--<div class="icon"><i class="entypo-chart-pie"></i></div>--}}
					{{--<div class="num" data-start="0" data-end="8" data-postfix="" data-duration="1500" data-delay="0">0</div>--}}
		{{----}}
					{{--<h3>Todays Visitors</h3>--}}
					{{----}}
				{{--</div>--}}
		{{----}}
			{{--</div>--}}

			{{--<div class="col-sm-3 col-xs-6">--}}
		{{----}}
				{{--<div class="tile-stats tile-red">--}}
					{{--<div class="icon"><i class="entypo-network"></i></div>--}}
					{{--<div class="num" data-start="0" data-end="90" data-postfix="" data-duration="1500" data-delay="0">0</div>--}}
		{{----}}
					{{--<h3>Total Visitors</h3>--}}
					{{----}}
				{{--</div>--}}
		{{----}}
			{{--</div>--}}

		</div>
		<br>


@endsection
		
