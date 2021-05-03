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
              Send Mail
						</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	           </div>
					</div>

          <div class="card-body col-md-8">
                <form class="form" action="{{route('submitMail')}}" method="post" id="addUser" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="select-user">To*</label>
                        <select  multiple="multiple" name="mail_to[]" class="form-control multiple-select" placeholder="Select Clients" required>
                            
                                @forelse($clients as $value)
                            <option value="{{$value->email}}">{{$value->name}} ({{$value->email}})</option>
                                @empty
                                @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                      <label>Cc (comma separed multiple value allowed)</label>
                      <input type="" name="mail_cc" class="form-control" placeholder="Cc">
                    </div>

                    <div class="form-group">
                        <label>Subject*</label>
                        <input class="form-control" name="mail_subject" placeholder="Mail Subject" required>
                    </div>                                   

                    <div class="form-group">
                        <label>Body*</label>
                        <textarea name="mail_body" class=" form-control" required="" id="" rows="10" placeholder="Mail Body"></textarea>
                    </div>            

                    <!--
                    <div class="form-group">
                        <label>Attachment(docx|pdf|xlsx|csv|jpg|png|jpeg)</label>
                        <input type="file" id="attachment" name="attachment" class="form-control">
                    </div>
                    -->
                    <div class="form-group">
                        <button class="btn-block btn-primary btn">Send Mail <span class="add-loading"></button>
                    </div>

                </form>            
          </div>

				</div>
				<!-- /basic datatable -->		

</div>

<!--spinner overlay-->
@include('elements.spinner')
<!--spinner overlay end-->

@endsection

@section('js')

<script src="{{url('public/assets/js/app.js')}}"></script>
<script src="{{url('public/global_assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
<script src="{{url('public/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{url('public/global_assets/js/demo_pages/editor_summernote.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.multiple-select').select2({
      closeOnSelect :false,
    });
});  
</script>
@endsection
