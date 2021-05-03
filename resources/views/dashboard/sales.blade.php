@extends('/dashboard-layouts/master')

@section('content')
<div class="content">
        <!--flash message-->
        @include('dashboard/flash')
        <!--flash message end -->
				<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">
							<a href="#" data-toggle="modal" data-target="#addClient" class="btn-primary btn"><i class="fas fa-plus-circle"></i> Add New Sale</a>
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
								<th>Reference Number</th>
								<th>Brand</th>
								<th>Model</th>
								<th>Client Name</th>
								<th>ID Number</th>
								<th>Zip</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Notes</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
              @forelse($sales as $sale)
							<tr>
								<td>#{{$sale->refName}}</td>
								<td>{{$sale->brand}}</td>
								<td>{{$sale->model}}</td>
								<td>{{$sale->name}}</td>
								<td>{{$sale->idNumber}}</td>
								<td>{{$sale->zip}}</td>
								<td>{{$sale->phone}}</td>
								<td>{{$sale->email}}</td>
								<td>{{$sale->notes}}</td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
                        <?php
                        echo 
                        '
                          <a href="#" onClick="editSale('.$sale->refName.',\''.$sale->title.'\' ,\''.$sale->idNumber.'\',\''.$sale->name.'\',\''.$sale->salesCarId.'\',\''.$sale->salesClientId.'\')" data-toggle="modal" data-target="#editClient" class="dropdown-item"><i class="fas fa-edit"></i> Edit Sale</a>
                        ';
                        ?>
												

                        <form action="{{route('deleteSale')}}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{$sale->saleId}}">
                          <button class="dropdown-item"><i class="far fa-trash-alt"></i> Undo Sale</button>
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
<!--add new client modal-->
<!-- Modal -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Sale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form class="form-horizontal" method="post" action="{{route('addNewSale')}}">
            @csrf
      			<div class="form-group">
      				<label>Select Car</label>
      				<select class="form-control" name="carId" required>
                <option>Select</option>
                @forelse($cars as $car)
      					<option value="{{$car->id}}">Reference Number: {{$car->refName}}- Title: {{$car->title}}</option>
      					@empty
                <option>No record found</option>
                @endforelse
      				</select>
      			</div>       			

      			<div class="form-group">
      				<label>Select Client</label>
      				<select class="form-control" name="clientId" required>	
                <option>Select</option>
                @forelse($clients as $client)
                <option value="{{$client->id}}">ID:  {{$client->idNumber}}- Name: {{$client->name}}</option>
                @empty
                <option>No record found</option>
                @endforelse
      				</select>
      				<a href="{{route('clients')}}">Add New Client</a>
      			</div> 
      			      			
      			<div class="form-group">
      				<button class="btn-primary btn">Add Sale</button>
      			</div>
      			

      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--add new client modal end-->

<!--add new client modal-->
<!-- Modal -->
<div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form class="form-horizontal" method="post" action="{{route('addNewSale')}}">
            @csrf
            <div class="form-group">
              <label>Select Car</label>
              <select class="form-control" name="carId" required>
                <option id="selectedRefNameTitle"></option>
                @forelse($cars as $car)
                <option value="{{$car->id}}">Reference Number: {{$car->refName}}- Title: {{$car->title}}</option>
                @empty
                <option>No record found</option>
                @endforelse
              </select>
            </div>            

            <div class="form-group">
              <label>Select Client</label>
              <select class="form-control" name="clientId" required>  
                <option id="selectedIdNumName"></option>
                @forelse($clients as $client)
                <option value="{{$client->id}}">ID:  {{$client->idNumber}}- Name: {{$client->name}}</option>
                @empty
                <option>No record found</option>
                @endforelse
              </select>
              
            </div> 
      			      			
      			<div class="form-group">
      				
      				<button class="btn-primary btn">Update Sale</button>
      			</div>
      			

      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--add new client modal end-->
@endsection

@section('js')
<script type="text/javascript">
  function editSale(refName,title,idNumber,name,carId,clientId){
      $("#selectedRefNameTitle").html("Reference Number: "+refName+" Title: "+title);
      $("#selectedRefNameTitle").val(carId);      

      $("#selectedIdNumName").html("ID: "+idNumber+" Name: "+name);
      $("#selectedIdNumName").val(clientId);
  }
</script>
@endsection
