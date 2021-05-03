			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								@if(empty(Auth::user()->image))
				                  <img src="{{url('public/images/avatar.png')}}" class="rounded-circle avatar" style="width:38px;height: 38px">
				                @else
				                  <img src="{{url('storage/app/avatars')}}/{{Auth::user()->image}}"class="rounded-circle avatar" style="width:38px;height: 38px"> 
				                @endif  
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">{{Auth::user()->name}}</div>
								<div class="font-size-xs opacity-50">
								{{Auth::user()->email}}
								</div>
							</div>
							<!--
							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
							-->
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="/" class="nav-link">
								<i class="fas fa-envelope"></i>
								<span>
									Send Mail
								</span>
							</a>
						</li>						

						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="far fa-comments"></i> <span>Client Feedbacks</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Client Feedbacks">
								
								<li class="nav-item">
									<a href="/" class="nav-link active">
										Menu
									</a>
								</li>								

								<li class="nav-item">
									<a href="/" class="nav-link active">
										Menu
									</a>
								</li>

							</ul>
						</li>

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->