@extends('/dashboard-layouts/master')

@section('content')
<div class="content">

	<!-- Basic datatable -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Add new car</h5>
		</div>
		
		<div class="card-body">
			
			<form class="form-horizontal" method="post" action="{{route('postCar')}}">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Reference Number</label>
							<input type="number" class="form-control col-md-8 @error('refName') is-invalid @enderror" name="refName">	
                                @error('refName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror								
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Title</label>
							<input class="form-control col-md-8" name="title">		
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Status</label>
							<select class="form-control col-md-8" name="carStatus">
								<option value="Incoming">Incoming</option>
								<option value="Ready">Ready</option>
								<option value="Ended">Ended</option>
							</select>		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Sales Status</label>
							<select class="form-control col-md-8" name="salesStatus">
								<option value="Available">Available</option>
								<option value="Sold">Sold</option>
							</select>		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Brand</label>
							<input class="form-control col-md-8 @error('brand') is-invalid @enderror" name="brand" required>
							@error('brand')		
								<span class="invalid-feedback" role="alert">
								<strong>{{message}}</strong>
								</span>
							@enderror
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Model Year</label>
							<input type="number" class="form-control col-md-8 @error('modelYear') is-invalid @enderror" name="modelYear" required>
							    @error('modelYear')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror			
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Model</label>
							<input class="form-control col-md-8 @error('model') is-invalid @enderror" name="model" required>	
							@error('model')		
								<span class="invalid-feedback" role="alert">
								<strong>{{message}}</strong>
								</span>
							@enderror								
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Variant</label>
							<input class="form-control col-md-8" name="variant">		
						</div>
					</div>				
				
				</div>	
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Miles</label>
							<input type="number" class="form-control col-md-8" name="miles">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Fuel Type</label>
							<input class="form-control col-md-8" name="fuelType">		
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Volume</label>
							<input type="number" class="form-control col-md-8" name="volume">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Horsepower</label>
							<input type="number" class="form-control col-md-8" name="horsepower">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Transmission</label>
							<input class="form-control col-md-8" name="transmission">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Wheel Drive</label>
							<input class="form-control col-md-8" name="wheelDrive">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Body Type</label>
							<input class="form-control col-md-8" name="bodyType">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Color</label>
							<input class="form-control col-md-8" name="color">		
						</div>
					</div>				
				
				</div>					
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Registration</label>
							<input class="form-control col-md-8" name="registration">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Registration Date</label>
							<input type="date" class="form-control col-md-8" name="registrationDate">		
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">VIN</label>
							<input class="form-control col-md-8" name="vin">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Sales Price</label>
							<input class="form-control col-md-8" name="salesPrice">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Purchase Cost</label>
							<input class="form-control col-md-8" name="purchaseCost">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Last Service Miles</label>
							<input class="form-control col-md-8" name="lastServiceMiles">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Last Service Date</label>
							<input type="date" class="form-control col-md-8" name="lastServiceDate">		
						</div>
					</div>					
			
					
				</div>	
				<div class="row">
					<div class="col-md-6 float-right">
						<button type="reset" class="btn-warning btn">Reset</button>
						<button class="btn-primary btn">Submit</button>
					</div>
				</div>							
			</form>
		</div>
	</div>
	<!-- /basic datatable -->		

</div>
@endsection
