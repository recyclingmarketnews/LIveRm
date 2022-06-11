@extends('dashboard.layouts.app')


@section('content')
				<!-- container -->
				<div class="container-fluid">

					
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Find Pricing</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Pricing</span>
						</div>
					</div>
				</div>

				<!-- breadcrumb -->
				@if ($alertFm = Session::get('message'))
                    <div class="alert alert-{{Session::get('type')}} alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $alertFm }}</strong>
                    </div>
                @endif
				<!-- row -->
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="card custom-card">
    						<div class="card-body">
								<div class="d-flex mt-3 mt-md-0 justify-content-end">
								    <select id="test" name="search" class="form-control">
								        @forelse($category as $key)
								        <option value="{{ $key->id }}" {{ $key->id == $id ? 'selected' : '' }}>{{ $key->name }}</option>
								        @empty
								        @endforelse
								    </select>
        						</div>
							</div>
						</div>
					</div>
				</div>
				@if($result)
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="card custom-card">
							<div class="card-body">
								<div class="user-lock">
							    	<div class="main-content-label mg-b-5 mb-4">
                    					Search Result Of: <strong>{{ $result[0]->name }}</strong>
                    				</div>
								</div>
								<h5 class="mb-1 mt-3 card-title">Highest Price: ${{ $result[0]->maxprice }}</h5> 
								<h5 class="mb-1 mt-3 card-title">Average Price:  ${{ $result[0]->price }}</h5>
								<h5 class="mb-1 mt-3 card-title">Lowest Price : ${{ $result[0]->minprice }}</h5> 
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="card custom-card  overflow-hidden">
							<div class="card-body">
								<div class="user-lock">
								<div class="main-content-label mg-b-5 mb-4">
                					Historical Chart 
                				</div>

                				<!-- row -->
                				<div class="row row-sm">
                					<div class="col-sm-12 col-md-12">
                								<div class="chartjs-wrapper-demo">
                									<canvas id="chartArea1"></canvas>
                								</div>
                					</div><!-- col-6 -->
                				</div>
                				<!-- /row -->
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				<!-- row closed -->


				</div>
				<!-- Container closed -->

			</div>
			<!-- main-content closed -->
		<script>
		$('#test').select2({
          placeholder: 'Select Product For Search'
        });
		$('#test').change(function(){
               var selected = $(this).children("option:selected").val();  
               window.location.href = "{{ URL::to('findpricesearch') }}/"+selected;
        });
		    $((function() {
    "use strict";
    var r = document.getElementById("chartArea1").getContext("2d");
var b = r.createLinearGradient(0, 280, 0, 0);
    b.addColorStop(0, "rgba(0,123,255,0)"), b.addColorStop(1, "rgba(0,123,255,.3)")
    new Chart(document.getElementById("chartArea1"), {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [ {
                data: [10, 20, 25, 55, 50, 45, 35, 37, 45, 35, 55, 40],
                borderColor: "#007bff",
                borderWidth: 1,
                backgroundColor: b
            }]
        },
        options: {
            maintainAspectRatio: !1,
            legend: {
                display: !1,
                labels: {
                    display: !1
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: !0,
                        fontSize: 10,
                        max: 80,
                        fontColor: "rgb(171, 167, 167,0.9)"
                    },
                    gridLines: {
                        display: !0,
                        color: "rgba(171, 167, 167,0.2)",
                        drawBorder: !1
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: !0,
                        fontSize: 11,
                        fontColor: "rgb(171, 167, 167,0.9)"
                    },
                    gridLines: {
                        display: !0,
                        color: "rgba(171, 167, 167,0.2)",
                        drawBorder: !1
                    }
                }]
            }
        }
    });
}));
		</script>			
		@endsection