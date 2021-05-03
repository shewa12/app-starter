@extends('/dashboard-layouts/master')

@section('content')
<div class="content">
    <!--flash message-->
    @include('dashboard.flash')
    <!--flash message end-->

	<!-- Basic datatable -->
	<div class="card">	
		
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Add Photo <a href="{{route('carManagement')}}" class="btn btn-sm btn-info">Back</a></h5>
		</div>
		<!--dropdoze-->
		<div class="card-body">
			<form action="{{route('uploadFile')}}" class="dropzone dz-clickable" id="dropzone_multiple" method="post">
				<input type="hidden" name="carId" value={{$carId}}>
				@csrf
			</form>
		</div>
		<!--dropdoze end-->

	</div>
		

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
    removedfile:function(file)
    {
    	var name = file.upload.filename;
        var fileRef;
        //var token= $('meta[name="_token"]').attr('content');
        var dataString= {'fileName':name};
        $.ajax({
        	url:'<?php echo url('home/delete-file')?>'+"/"+name,
        	type:"GET",
        	data:dataString,
        	dataType:"HTML",
        	success:function(data)
        	{
        		
        		return (fileRef = file.previewElement) != null ? 
        		fileRef.parentNode.removeChild(file.previewElement) : void 0;
        	},
        	error:function(data){
        		console.log("error deleting file");
        	}
        });
        
    },
    success: function(response) 
        {
            //alert(response.file);
        },
    error: function(response)
        {
           	return false;
        }
});
</script>
@endsection