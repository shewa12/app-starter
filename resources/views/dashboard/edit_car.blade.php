@extends('/dashboard-layouts/master')

@section('content')
<div class="content">
      <!--flash message-->
      @include('dashboard.flash')
      <!--flash message end-->
	<!-- Basic datatable -->
	<div class="card">

		<div class="card-header header-elements-inline">
			<h5 class="card-title">Edit Car</h5>
		</div>
		<!--dropdoze-->
		<!--
		<div class="card-body">
			<form action="{{route('uploadFile')}}" class="dropzone dz-clickable" id="dropzone_multiple" method="post">
				
				@csrf
			</form>
		</div>
	-->
		<!--dropdoze end-->
		<div class="card-body">
		<!--gallery-->
			<h3>Gallery <a href="{{route('addImage',$carId)}}" class="btn-primary btn btn-sm">Add Image</a></h3>
			<div class="car-gallery row">
				

				@forelse($carImages as $image)
					<div class="col-sm-6 col-md-4 col-lg-3">
						<img src="{{url('storage/app/images')}}/{{$image->file}}" class="img-thumbnail" alt="Responsive image">
						<a href="{{route('deleteImage',$image->file)}}" class="btn-block btn-warning btn btn-sm">Delete</a>
					</div>
				@empty
				<span style="padding-left:12px;">Image not found<a href="{{route('addImage',$carId)}}"> Add image</a></span>
				@endforelse	
			</div>			
		<!--gallery end-->	
			<h3>Detail</h3>
			<form class="form-horizontal" method="post" action="{{route('updateCar')}}">
				
					<input type="hidden" name="id" value="{{$car->id}}">	
				
				@csrf
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Reference Number</label>
							<input type="number" class="form-control col-md-8 @error('refName') is-invalid @enderror" name="refName" value="{{$car->refName}}">	
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
							<input class="form-control col-md-8" name="title" value="{{$car->title}}">		
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Status</label>
							<select class="form-control col-md-8" name="carStatus">
								<option  value="{{$car->carStatus}}"> {{$car->carStatus}}</option>
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
								<option value="{{$car->salesStatus}}">{{$car->salesStatus}}</option>
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
							<input class="form-control col-md-8" name="brand" required value="{{$car->brand}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Model Year</label>
							<input type="number" class="form-control col-md-8" name="modelYear" required  value="{{$car->modelYear}}">		
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Model</label>
							<input class="form-control col-md-8" name="model" required value="{{$car->model}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Variant</label>
							<input class="form-control col-md-8" name="variant" value="{{$car->variant}}">		
						</div>
					</div>				
				
				</div>	
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Miles</label>
							<input type="number" class="form-control col-md-8" name="miles" value="{{$car->miles}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Fuel Type</label>
							<input class="form-control col-md-8" name="fuelType" value="{{$car->fuelType}}">		
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Volume</label>
							<input type="number" class="form-control col-md-8" name="volume" value="{{$car->volume}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Horsepower</label>
							<input type="number" class="form-control col-md-8" name="horsepower" value="{{$car->horsepower}}">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Transmission</label>
							<input class="form-control col-md-8" name="transmission" value="{{$car->transmission}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Wheel Drive</label>
							<input class="form-control col-md-8" name="wheelDrive" value="{{$car->wheelDrive}}">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Body Type</label>
							<input class="form-control col-md-8" name="bodyType" value="{{$car->bodyType}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Color</label>
							<input class="form-control col-md-8" name="color" value="{{$car->color}}">		
						</div>
					</div>				
				
				</div>					
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Registration</label>
							<input class="form-control col-md-8" name="registration" value="{{$car->registration}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Registration Date</label>
							<input type="date" class="form-control col-md-8" name="registrationDate" value="{{$car->registrationDate}}">		
						</div>
					</div>				
				
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">VIN</label>
							<input class="form-control col-md-8" name="vin" value="{{$car->vin}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Sales Price</label>
							<input class="form-control col-md-8" name="salesPrice" value="{{$car->salesPrice}}">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Purchase Cost</label>
							<input class="form-control col-md-8" name="purchaseCost" value="{{$car->purchaseCost}}">		
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group row">

							<label class="col-md-4 col-form-label">Last Service Miles</label>
							<input class="form-control col-md-8" name="lastServiceMiles" value="{{$car->lastServiceMiles}}">		
						</div>
					</div>				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
								
							<label class="col-md-4 col-form-label">Last Service Date</label>
							<input class="form-control col-md-8" name="lastServiceDate" value="{{$car->lastServiceDate}}">		
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

@section('js')
<script type="text/javascript">

$(".dropzone").dropzone({

	addRemoveLinks:true,
	progressBarWidth:'100%',
	uploadMultiple:false,
    paramName: "file", // The name that will be used to transfer the file
    dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',

    maxFiles:10,
    maxFileSize:5, 
    acceptedFiles:'.jpeg,.jpg,.png,.gif',
    removedFile:function(file){
    	alert(file);
    },
    success: function(file, response) 
        {
            alert(response+file);
        },
    error: function(file, response)
        {
            alert(response+file) ;
        }
});


</script>
@endsection