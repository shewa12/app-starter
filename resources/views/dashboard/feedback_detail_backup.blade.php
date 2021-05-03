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
                <a class="btn btn-primary" href="">Export PDF / Print</a>
                 <a class="btn btn-primary" href="">Send Mail</a>
              </div>              

            </div>
          </div>

        <div class="card-body" id="detail">

                <blockquote class="blockquote">
                  <p class="mb-0">"{{$feedback->review}}"</p>
                  <footer class="blockquote-footer">{{$feedback->name}}-<cite title="Source Title">{{$feedback->email}}</cite></footer>
                </blockquote>              
                <p>
                  <span class="semi-title">Submitted at: <span><span class="f-text">
                  <?php 
                    $date = $feedback->created_at;
                    echo date_format($date,'d F Y');
                    ?>
                    
                  </span>
                </p>

                <p><span class="semi-title">Overall Experience: <span><span class="f-text">{{$feedback->overall_exp}}</span></p>
                     
                <p><span class="semi-title">Timely Response: <span><span class="f-text">{{$feedback->timely_resp}}</span></p>
                        
                <p><span class="semi-title">Our Support: <span><span class="f-text">{{$feedback->our_support}}</span></p>
                        
                <p><span class="semi-title">Overall Satisfaction: <span><span class="f-text">{{$feedback->overall_satisf}}</span></p>
      
              @if(!empty($feedback->tell_any))
                <p><span class="semi-title">Recommendation: <span><span class="f-text">{{$feedback->tell_any}}</span></p>
              @endif

        </div>  
      </div>
        

</div>


<!--spinner overlay-->
@include('elements.spinner')
<!--spinner overlay end-->
<!--url-->

<!--url end-->
@endsection

@section('js')
<script src="{{url('public/assets/js/app.js')}}"></script>
<script type="text/javascript">
  //print
$("#print").on('click',function(){
  printDiv();
});
function printDiv() 
{

  var divToPrint=document.getElementById('detail');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}  
</script>
@endsection
