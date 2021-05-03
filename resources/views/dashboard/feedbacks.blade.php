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
              <a><i class="far fa-comments"></i> Feedback</a>
            </h5>
            <div class="header-elements">
              <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
              </div>
            </div>
          </div>

        <div class="table-responsive" id="datatableWrapper">
          <table class="table" id="example">
            <thead>
              <tr>
                <th>Sl No.</th>
                <th>Client Name</th>
                <th>Email</th>
                <th>Review</th>  
                <th>Detail</th>              
<!--
                <th>Overall Exp</th>
                <th>Response</th>
                <th>Support</th>
                <th>Satisfaction</th>
-->
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              @forelse($feedbacks as $feedback)

              <tr>
                <td>{{$i++}}</td>
                <td>{{$feedback->name}}</td>
                <td>{{$feedback->email}}</td>
                <td>
                  <?php 
                  $str = $feedback->review;
                  $lenth = strlen($str);
                  if($lenth>30)
                  {
                      echo substr($str, 0,50).'...';
                  }
                  else
                  {
                      echo $str; 
                  }
                  ?>
                </td>
<!--
                <td>{{$feedback->overall_exp}}</td>
                <td>{{$feedback->timely_resp}}</td>
                <td>{{$feedback->our_support}}</td>
                <td>{{$feedback->overall_satisf}}</td>
-->
                <td>
                  <a href="{{route('feedbackDetail',$feedback->id)}}" class="btn btn-primary btn-sm">Detail</a>
                </td>
                <td class="text-center">
                    <button type="submit" class="dropdown-item delete"id="{{$feedback->id}}"><i class="far fa-trash-alt" ></i> 
                        </button>
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
<div class="d-none">
<input type="" name="delete" value="{{$deleteUrl}}">
<input type="" name="formTitle" value="{{$title}}">  
<input type="" name="formId" value="{{$formId}}">  
</div>
<!--spinner overlay-->
@include('elements.spinner')
<!--spinner overlay end-->
<!--url-->

<!--url end-->
@endsection

@section('js')

<script type="text/javascript" src="{{url('public/js/ajax.js')}}"></script>
<script src="{{url('public/assets/js/app.js')}}"></script>
<!--data table with export-->
<script type="text/javascript" src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable
    ( 
      {
          lengthChange: false,
          buttons: [
           {
               extend: 'copy',
               footer: true,

               exportOptions: {
                    columns: [0,1,2,3]
                }

           },           
           {
               extend: 'pdf',
               footer: true,
               exportOptions: {
                    columns: [0,1,2,3]
                }
           },
           {
               extend: 'csv',
               footer: false,
               exportOptions: {
                    columns: [0,1,2,3]
                }              
           },
           {
               extend: 'excel',
               footer: false,
               exportOptions: {
                    columns: [0,1,2,3]
                }            
           }        
          ],
          //"order": [[ 0,"desc" ]]
          "aaSorting": []
      },
    );
 
    table.buttons().container().appendTo( '#datatableWrapper .col-md-6:eq(0)' );
    const formTitle = $("input[name='formTitle']").val();
    const formId = $("input[name='formId']").val();
    const url = `<?php echo url('home/feedback-statistics')?>/${formId}/${formTitle}`;
  
    //add statistics button in dt buttons
    $('.dt-buttons').append("<a class='btn btn-secondary buttons-copy buttons-html5' href='"+url+"'>Statistics</a>");
});  

</script>
@endsection
