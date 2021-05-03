@extends('/dashboard-layouts/master')

@section('content')
<div class="content">
      <!--flash message-->
      @include('elements.errors')
      <!--flash message end-->
        <!-- Basic datatable -->

        <div class="card">

          <div class="card-header header-elements-inline">
            <h5 class="card-title">
              <a href="#"  onClick="resetForm('addForm')" data-toggle="modal" data-target="#adduser" class="btn-primary btn"><i class="fas fa-plus-circle"></i> Create Form</a>
            </h5>
            <div class="header-elements">
              <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                      </div>
                    </div>
          </div>

        <div class="table-responsive" >
          <table class="table datatable-basic">
            <thead>
              <tr>
                <th>Sl No.</th>
                <th>Form Title</th>
                <th>Header Title</th>
                <th>Header Text</th>                
                <th>Form Preview</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              @forelse($forms as $form)
              <?php 
                $id= $form->id;
                $form_title= $form->form_title;
                $header_title= $form->header_title;
                $header_text= $form->header_text;                
                

              ?>  
              <tr>
                <td>{{$i++}}</td>
                <td>{{$form->form_title}}</td>
                <td>{{$form->header_title}}</td>
                <td>{{$form->header_text}}</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="{{route('clientFeedback',$form->id)}}">Preview</a>
                </td>

                <td class="text-center">
                  <div class="list-icons">
                    <div class="dropdown">
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                        <i class="icon-menu9"></i>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right">
                        <?php 

                        echo '
                          <a href="#" onClick="edit('.$id.',\''.$form_title.'\' ,\''.$header_title.'\',\''.$header_text.'\')" data-toggle="modal" data-target="#edituser" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                        ';
                        ?>

                    
                   
                        <button type="submit" class="dropdown-item delete"id="{{$form->id}}"><i class="far fa-trash-alt" ></i> Delete 
                        </button>
                        
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
<!--add new user modal-->
<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="post" id="addForm">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <div class="form-group">
                <label>Form Title*</label>
                <input class="form-control" name="form_title" required></input>
            </div>            

            <div class="form-group">
                <label>Header Title*</label>
                <input type="" class="form-control" name="header_title" required></input>
            </div>            

            <div class="form-group">
                <label>Header Text*</label>
                <textarea class="form-control" name="header_text" required></textarea>
            </div>                       

            <div class="form-group" id="addingResponse">
              
            </div>          
            <div class="form-group">
              
              <button class="btn-primary btn">Create Form</button>
            </div>
            

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--add new user modal end-->

<!--add new user modal-->
<!-- Modal -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="post" id="updateForm">
            @csrf
            <input type="hidden" name="id">
            <div class="form-group">
                <label>Form Title*</label>
                <input class="form-control" name="form_title" required></input>
            </div>            

            <div class="form-group">
                <label>Header Title*</label>
                <input type="" class="form-control" name="header_title" required></input>
            </div>            

            <div class="form-group">
                <label>Header Text*</label>
                <textarea class="form-control" name="header_text" required></textarea>
            </div>  
            
            <div class="form-group" id="updatingResponse">
              
            </div>
                        
            <div class="form-group">
              <button class="btn-primary btn">Update Admin</button>
            </div>
            

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--add new user modal end-->
<!--spinner overlay-->
@include('elements.spinner')
<!--spinner overlay end-->
<!--url-->
<div class="d-none">
<input type="" name="add" value="{{$crudUrl['add']}}">
<input type="" name="update" value="{{$crudUrl['update']}}">
<input type="" name="delete" value="{{$crudUrl['delete']}}">  
</div>
<!--url end-->
@endsection

@section('js')
<script type="text/javascript">

  function edit(id,form_title,header_title,header_text){

      $('[name="id"]').val(id);
      $('[name="form_title"]').val(form_title);
      $('[name="header_title"]').val(header_title);
      $('[name="header_text"]').val(header_text);
  }
  //reset addForm

</script>
<script type="text/javascript" src="{{url('public/js/ajax.js')}}"></script>
  <!--datatable-->
  <script src="{{url('public/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script><!--data tables js-->
  <script src="{{url('public/assets/js/app.js')}}"></script>
  <script src="{{url('public/global_assets/js/demo_pages/datatables_basic.js')}}"></script>
  <!--datatable end-->
@endsection
