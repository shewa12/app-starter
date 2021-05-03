@extends('/dashboard-layouts/master')

@section('content')
<style type="text/css">
  .semi-title {
    
  }
  .f-text {
 
  }
  .blockquote-footer {
    color:#2187c4;
    font-size: 18px;    
  }
  #detail {
    text-align: center;
    width:80%;
    margin:auto;
    font-size: 15px;    
  }
</style>
<div class="content">
      <!--flash message-->
      @include('elements.errors')
      <!--flash message end-->
        <!-- Basic datatable -->

      <div class="card">

          <div class="card-header header-elements-inline">

            <h5 class="card-title">
              <a><i class="far fa-comments"></i> Feedback for {{$feedback->form_title}}</a>
            </h5>
            <div class="header-elements">
              <div class="btn-group">
                <a class="btn btn-primary" href="{{route('exportPdf',[$feedback->id,$feedback->form_title])}}">Export PDF / Print</a>
                <a class="btn btn-primary" data-toggle="modal" data-target="#sendMail" href="">Send Mail</a>
              </div>              

            </div>
          </div>

        <div class="table-responsive" id="datatableWrapper">
          <table class="table table-bordered table-hover" id="example">

              <tbody>
              <tr>
                <th>Submitted at</th>
                <td>
                    <?php 
                      $date = $feedback->created_at;
                      echo date_format($date,'d F Y');
                      ?>                
                </td>
              </tr>
              <tr>
                <th>Client Name</th>
                <td>{{$feedback->name}}</td>
              </tr>            
              <tr>
                <th>Client Email</th>
                <td>{{$feedback->email}}</td>
              </tr>
              <tr>
                <th>Review</th>
                <td>{{$feedback->review}}</td>
              </tr>            
              <tr>
                <th>Overall Experience</th>
                <td>{{$feedback->overall_exp}}</td>
              </tr>            
              <tr>
                <th>Timely Response</th>
                <td>{{$feedback->timely_resp}}</td>
              </tr>            
              <tr>
                <th>Our Support</th>
                <td>{{$feedback->our_support}}</td>
              </tr>            
              <tr>
                <th>Overall Satisfaction</th>
                <td>{{$feedback->overall_satisf}}</td>
              </tr>
              @if(!empty($feedback->tell_any))
                <tr>
                  <th>Recommendation</th>
                  <td>{{$feedback->tell_any}}</td>
                </tr>

              @endif                          
              </tbody>
          </table>

        </div>  
      </div>
        

</div>

<!-- Modal -->
<div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="post" action="{{route('sendToOthers')}}" id="mailForm">
            @csrf
            <input type="hidden" name="feedback_id" value="{{$feedback->id}}">
            <div class="form-group">
              <label>Mail to* (comma separated multiple value allowed)</label>
              <input class="form-control" type="" name="mail_to" placeholder="to" required>
            </div>            
            <div class="form-group">
              <label>Mail cc (comma separated multiple value allowed)</label>
              <input  class="form-control" type="" name="mail_cc" placeholder="cc" required>
            </div>            
            <div class="form-group">
              <label>Mail Subject*</label>
              <input class="form-control" type="" name="mail_subject" placeholder="subject" required>
            </div>
          
            <div class="form-group" id="mailResponse">
              
            </div>
            
            <div class="form-group">
              <button class="btn-primary btn btn-block">Send Mail</button>
            </div>
          
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--spinner overlay-->
@include('elements.spinner')
<!--spinner overlay end-->
<!--url-->
<input type="hidden" name="sendMailUrl" value="{{$sendMailUrl}}">
<!--url end-->
@endsection

@section('js')

<script src="{{url('public/assets/js/app.js')}}"></script>
<script src="{{url('public/js/ajax.js')}}"></script>

@endsection
