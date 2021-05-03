@extends('/dashboard-layouts/master')

@section('content')
<div class="content">

	<!-- Basic datatable -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h3 class="card-title">Car Detail</h3>
			<div class="flaot-right">
				<a href="{{route('addNewCar')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Car</a>
				<a href="{{route('carEdit', $car->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit Car</a>
			</div>
		</div>
		
		<div class="card-body">
			<h3>Gallery</h3>
			<div class="car-gallery row">
				@forelse($carImages as $image)
					<div class="col-sm-6 col-md-4 col-lg-3">
						<img src="{{url('storage/app/images')}}/{{$image->file}}" class="img-thumbnail" alt="Responsive image">
					</div>
				@empty
				<span style="padding-left:12px;">Image not found<a href="{{route('addImage',$carId)}}"> Add image</a></span>
				@endforelse
	
			</div>

			<h3>Detail</h3>
			<div class="car-detail row">
				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table-bordered table">
							<tbody>
								<tr>
									<td>Created At</td>
									<td>{{$car->created_at}}</td>
								</tr>								
								<tr>
									<td>Reference Number</td>
									<td>{{$car->refName}}</td>
								</tr>								
								<tr>
									<td>Title</td>
									<td>{{$car->title}}</td>
								</tr>								
								<tr>
									<td>Car Status</td>
									<td>{{$car->carStatus}}</td>
								</tr>								
								
								<tr>
									<td>Sales Status</td>
									<td>{{$car->salesStatus}}</td>
								</tr>								
								<tr>
									<td>Brand</td>
									<td>{{$car->brand}}</td>
								</tr>								
								<tr>
									<td>Model Year</td>
									<td>{{$car->modelYear}}</td>
								</tr>								
								<tr>
									<td>Model</td>
									<td>{{$car->model}}</td>
								</tr>								
								<tr>
									<td>Variant</td>
									<td>{{$car->variant}}</td>
								</tr>								
								<tr>
									<td>Miles</td>
									<td>{{$car->miles}}</td>
								</tr>								
								<tr>
									<td>Fuel Type</td>
									<td>{{$car->fuelType}}</td>
								</tr>								
								<tr>
									<td>Volume</td>
									<td>{{$car->volume}}</td>
								</tr>								

							</tbody>
						</table>
					</div>	
				</div><!--col-md-6-->

				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table-bordered table">
							<tbody>
								<tr>
									<td>Horse Power</td>
									<td>{{$car->horsepower}}</td>
								</tr>								
								<tr>
									<td>Transmission</td>
									<td>{{$car->transmission}}</td>
								</tr>								
								<tr>
									<td>Wheel Drive</td>
									<td>{{$car->wheelDrive}}</td>
								</tr>								
								<tr>
									<td>Body Type</td>
									<td>{{$car->bodyType}}</td>
								</tr>								
								<tr>
									<td>Color</td>
									<td>{{$car->color}}</td>
								</tr>								
								<tr>
									<td>Registration</td>
									<td>{{$car->registration}}</td>
								</tr>								
								<tr>
									<td>Body Type</td>
									<td>{{$car->registrationDate}}</td>
								</tr>								
								<tr>
									<td>VIN</td>
									<td>{{$car->vin}}</td>
								</tr>								
								<tr>
									<td>Sales Price</td>
									<td>
									    <?php 
									        setlocale(LC_MONETARY,"en_US");
                                            echo money_format("%i", $car->salesPrice);
									    ?>
									   
									</td>
								</tr>								
								<tr>
									<td>Purchase Cost</td>
									<td>{{$car->purchaseCost}}</td>
								</tr>								
								<tr>
									<td>Last Service Miles</td>
									<td>{{$car->lastServiceMiles}}</td>
								</tr>								
								<tr>
									<td>Last Service Date</td>
									<td>{{$car->lastServiceDate}}</td>
								</tr>
							</tbody>
						</table>
					</div>						
				</div><!--col-md-6 end-->

			</div>

		</div>
	</div>
	<!-- /basic datatable -->		

</div>
@endsection
