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
              <form action="{{route('passwordReset')}}" method="post">
                @csrf
                <div class="form-group">
                  <label>Current Password</label>
                  <input class="form-control" type="password" name="old_password" placeholder="current password" required="">
                </div>                

                <div class="form-group">
                  <label>New Password</label>
                  <input  class="form-control" type="password" name="password" placeholder="new password" required="">
                </div>    

                <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control" type="password" name="password_confirmation" placeholder="confirm password" required="">
                </div>                

                <div class="form-group">
                    <button class="btn-primary btn btn-block">Update Password</button>
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
