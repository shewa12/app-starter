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
              <a><i class="far fa-comments"></i> {{$title}}</a>
            </h5>

          </div>

          <div class="card-body">
            <h3 id="total"></h3>
            <div class="row">
              <div class="col-md-6">
                <canvas id="overall_exp"></canvas>
              </div>
              <div class="col-md-6">
                <canvas id="timely_resp"></canvas>
              </div>
            </div>            

            <div class="row">
              <div class="col-md-6">
                <canvas id="our_support"></canvas>
              </div>
              <div class="col-md-6">
                <canvas id="overall_satisf"></canvas>
              </div>
            </div>

          </div>

      </div>
        

</div>


<!--spinner overlay-->
@include('elements.spinner')
<!--spinner overlay end-->
<!--url-->
<input type="hidden" name="formId" value="{{$formId}}">
<!--url end-->
@endsection

@section('js')

<script src="{{url('public/assets/js/app.js')}}"></script>
<script src="{{url('public/js/chart.min.js')}}"></script>
<script src="{{url('public/js/utils.js')}}"></script>
<script>
$(document).ready(function(){
const formId = $("input[name='formId']").val();
const exp = document.getElementById('overall_exp').getContext('2d');
const response = document.getElementById('timely_resp').getContext('2d');
const support = document.getElementById('our_support').getContext('2d');
const satis = document.getElementById('overall_satisf').getContext('2d');
    $.ajax({
        url:'<?php echo url('home/get-statistics')?>'+'/'+formId,
        type:'get',
        dataType:'json',
        beforeSend:()=>{
            $(".overlay").show();
        },
        success:(data)=>{
            $(".overlay").hide();
        document.getElementById('total').innerHTML = `Total Feedback: ${data.msg.totalCount}`;
        let dataSet =[
            {
                'elem':exp,
                'data':Object.values(data.msg.overall_exp),
                'label':'Overall Experience',
            },           
            {
                'elem':response,
                'data':Object.values(data.msg.timely_resp),
                'label':'Timely Response',
            },            
            {
                'elem':support,
                'data':Object.values(data.msg.our_support),
                'label':'Our Support',
            },            
            {
                'elem':satis,
                'data':Object.values(data.msg.overall_satisf),
                'label':'Overall Satisfaction',
            },
        ];


        for(let d of dataSet)
        {

           
            Chart.defaults.global.responsive = true;
            var myChart = new Chart(d.elem, {
                type: 'bar',
                data: 
                {
                    labels: ['Very Good', 'Good', 'Fair', 'Poor'],
                    datasets: [{
                        label: d.label,
                        barPercentage: 0.5,

                        data: Object.values(d.data),//[0,45,10,1],//d.data
                        backgroundColor: [
                            
                            'rgba(119, 236, 70, 0.55)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(119, 236, 70, 0.76)',
                            'rgba(54, 162, 235, 1)' ,
                            'rgba(255, 206, 86, 1)' ,
                            'rgba(255, 99, 132, 1)' ,
                            
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    showTooltips: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                stepSize: 20,
                                beginAtZero: true,
                                max: 200,
                            }
                        }]
                    }
                }
            });

        }
        },
        error:()=>{
            window.onerror = function(message,url,line,col,error){
                let fullError = {
                    'message': message,
                    'url': url,
                    'line': line,
                    'col': col,
                    'error': error,
                };
            }
            console.log(`Error Statistics: ${fullError}`);
        }
    });

});
</script>
@endsection
