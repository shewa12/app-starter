	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{{route('dashboard')}}" class="d-inline-block">
				<img src="{{url('public/images/logo.png')}}" alt="" style="height:36px;">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
		
			<ul class="navbar-nav ml-auto"></ul>
                    <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#fff;">
								@if(empty(Auth::user()->image))
				                  <img src="{{url('public/images/avatar.png')}}" class="rounded-circle rounded-circle mr-2" style="width:28px;height: 28px">
				                @else
				                  <img src="{{url('storage/app/avatars')}}/{{Auth::user()->image}}"class="rounded-circle mr-2" style="width:28px;height: 28px"> 
				                @endif 
								<span>{{Auth::user()->name}}</span>	
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                	<a href="{{route('myProfile')}}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>

                                	<a href="{{route('updatePassword')}}" class="dropdown-item"><i class="fas fa-unlock"></i> Update Password</a>
						<!--logout-->
			                      <a class="dropdown-item" href="{{ url('/logout') }}"
			                          onclick="event.preventDefault();
			                          document.getElementById('logout-form').submit();">
			                          <i class="icon-switch2"></i> Logout
			                      </a>

			                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
			                        @csrf
			                      </form>						
						<!--logout end-->
                                </div>
                            </li>
                        
                    </ul>
		</div>
	</div>