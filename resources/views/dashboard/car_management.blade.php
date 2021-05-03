@extends('/dashboard-layouts/master')

@section('content')
<div class="content">
      <!--flash message-->
      @include('dashboard.flash')
      <!--flash message end-->
				<!-- Basic datatable -->
				<div class="card">
					<!--
					<li>
						
						<a target="_blank" href="https://web.whatsapp.com/send?phone=008801921711839&text=Hello, I have visit  and I need help from you. Here is link ">Shewa</a>
						<a target="_blank" href="https://web.whatsapp.com/send?phone=008801912614146&text=Hello, I have visit  and I need help from you. Here is link ">SN</a>
					</li>
				-->
					<div class="card-header header-elements-inline">
						<h5 class="card-title">
							<a href="{{route('addNewCar')}}" class="btn-primary btn"><i class="fas fa-plus-circle"></i> Add New Car</a>
						</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="table-responsive">
					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Sl No.</th>
								<th>Reference Number</th>
								<th>Registration</th>
								<th>Model Year</th>
								<th>Brand</th>
								<th>Model</th>
								<th>Color</th>
								<th>Status</th>
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1;?>
						@forelse($cars as $car)
							
							<tr>
								<td>{{$i++}}</td>
								<td>{{$car->refName}}}</td>
								<td>{{$car->registration}}</td>
								<td>{{$car->modelYear}}</td>
								<td>{{$car->brand}}</td>
								<td>{{$car->model}}</td>
								<td>{{$car->color}}</td>
								<td>{{$car->status}}</td>
								
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{route('addImage',$car->id)}}" class="dropdown-item"><i class="fas fa-search-plus"></i> Add Image</a>
												
												<a href="{{route('carDetail',$car->id)}}" class="dropdown-item"><i class="fas fa-search-plus"></i> Detail</a>
												<a href="{{route('carEdit',$car->id)}}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
												<form action="{{route('deleteCar')}}" method="post">
													@csrf	
													<input type="hidden" name="id" value="{{$car->id}}">
													<button type="submit" class="dropdown-item"><i class="far fa-trash-alt"></i> Delete</button>
												</form>
												
											</div>
										</div>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td>No record found</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>	
				</div>
				<!-- /basic datatable -->		

</div>
@endsection
