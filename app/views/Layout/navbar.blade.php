
	<!-- Mainbar head starts -->
	<div class="main-head">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-6">
					<!-- Page title -->
					<h2><i class="fa fa-desktop lblue"></i> Dashboard</h2>
				</div><!-- end col-md-3 col-sm-4 col-xs-6 -->

				<div class="col-md-3 col-sm-4 col-xs-6">
					<!-- Search block -->
					<div class="head-search">
						<form class="form">
							<div class="input-group">
								<input type="text" class="form-control" placehoilder="search...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div><!-- end input-group -->
						</form><!-- end Form -->
					</div><!-- end head-search -->
				</div><!-- col-md-3 col-sm-3 col-xs-6 -->
				<!-- Notifications -->
				<div class="col-md-3 col-sm-4 hidden-xs">
					<div class="head-noty text-center">
					<!-- notification tab starts -->
						<div class="dropdown">
							<a href="#" id="notifications" data-toggle="dropdown" class="mhead-icon"><i class="fa fa-bell"></i><span class="label label-info">2</span></a>
							<!-- dropdown -->
							<ul class="dropdown-menu" role="button" aria-labelledby="notifications">
							<!-- Dropdown menu head -->
								<li class="dropdown-head">
									Notifications <span class="label label-info pull-right">2</span>
								</li><!-- end dropdown-head -->								
								<!-- content -->
								<li>
									<a href="#"><i class="fa fa-user"></i>New user registered <b class="pull-right">5 mins ago</b>
									<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-user"></i>New order <b class="pull-right">10 mins ago</b>
									<div class="clearfix"></div>
									</a>
								</li>
								<li class="dropdown-foot text-center">
									<a href="#">View All</a>
								</li><!-- end dropdown-foot -->
							</ul><!-- end dropdown-menu -->
						</div><!-- end dropdown -->
						<!-- end notification tab -->
						<!-- message tab starts -->
						<div class="dropdown">
							<a href="#" id="messages" data-toggle="dropdown" class="mhead-icon">
								<i class="fa fa-envelope"></i><span class="label label-danger">2</span>
							</a>
							<ul class="dropdown-menu" role="button" aria-labelledby="messages">
								<!-- Dropdown menu head -->
								<li class="dropdown-head">
									Messages <span class="label label-danger pull-right">3</span>
								</li><!-- end dropdown-head -->
								<!-- content -->
								<li>
									<a href="#">
										<!-- title -->
										Hi boss ,...... <i class="fa fa-reply pull-right"></i>
										<!-- para -->
										<span>something some thing</span>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<!-- title -->
										By boss ,...... <i class="fa fa-reply pull-right"></i>
										<!-- para -->
										<span> notsomething some thing</span>
										<div class="clearfix"></div>
									</a>
								</li>
								<!-- dropdown-foot -->
								<li class="dropdown-foot text-center">
									<a href="#">View All</a>
								</li>
							</ul><!-- end dropdown-menu -->
						</div><!-- end drop down -->
							<!-- end message tab -->
					</div><!-- end head-noty text-center -->
					<div class="clearfix"></div>
				</div><!-- end col-md-3 col-sm-4 hidden-xs -->
				<!-- head user -->
				<div class="col-md-3 hidden-sm hidden-xs">
					<div class="head-user dropdown pull-right">
						<a href="#" data-toggle="dropdown" id="profile">
							
							@if(Auth::user()->contact)
							{{ HTML::image('public/img/'.Auth::user()->contact->image,'',array('class'=>"img-circle img-responsive"))}}
							@else
							<i class="fa fa-user"></i>
							@endif
							<!-- this image for if any image available then only enable -->
							<!-- Username -->
							{{ ucfirst(Auth::user()->displayname)}}
							<i class="fa fa-caret-down"></i>
						</a>
						<!-- dropdown -->
						<ul class="dropdown-menu" aria-labelledby="profile">
							<li><a href="<?php echo URL::to(Auth::getProfile().'/users').'/'.Auth::user()->id; ?>">View/Edit Profile</a></li>
							<li><a href="<?php echo URL::to(Auth::getProfile().'/users').'/'.Auth::user()->id.'/edit'; ?>">Change Password</a></li>
							<li><a href="<?php echo URL::to('account/sign-out') ?>">Sign Out</a></li>
						</ul><!-- end dropdown-menu -->
					</div><!-- end head-user dropdown -->
				</div><!-- end col-md-3 -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end main-head -->

