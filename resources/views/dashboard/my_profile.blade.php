@extends('/dashboard-layouts/master')

@section('content')
<div class="content">
      <!--flash message-->
    @include('/components.errors')
      <!--flash message end-->
	<div class="row">
      <div class="col-lg-6 offset-lg-3">
          <div class="card">
              
              <div class="card-body">

                @if(empty(Auth::user()->image))
                  <img src="{{url('public/images/avatar.png')}}" class="rounded-circle avatar">
                @else
                  <img src="{{url('storage/app/avatars')}}/{{Auth::user()->image}}"class="rounded-circle avatar"> 
                @endif  
                <form  action="{{route('updateAvatar')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label>Upload Photo </label>
                      <input class="form-control" type="file" class="form-control" name="image" required/>
                    </div>
                    <div class="form-group">
                      <button class="btn-primary btn btn-block">
                          Update Photo
                      </button>
                    </div>
                </form>                

              </div>

          </div>

      </div>

  </div>

</div>

@endsection

@section('js')
<script src="{{url('public/assets/js/app.js')}}"></script>
@endsection
