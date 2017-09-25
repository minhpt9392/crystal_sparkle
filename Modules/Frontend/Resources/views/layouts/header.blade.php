<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">

    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="header-content">
            <div class="navbar-header pull-left">
                <a href="index.html" class="navbar-brand">
                    <small>
                        <b>SPARKLE </b>SPA
                    </small>
                </a>

                <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button"
                        data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                    <span class="sr-only">Menu</span>
                    <img src="{{ asset('images/avatars/user.jpg')}}" alt="Jason's Photo"/>
                </button>

                <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse"
                        data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>
            </div>

            <nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <li>
                        <a href="#">
                            <i class="ace-icon fa fa-user"></i>
                            Hello {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a>
                    </li>
                    @endif
                    <li class="green dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-envelope"></i>
                            Messages
                            <span class="badge badge-warning">5</span>
                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-envelope-o"></i>
                                5 Messages
                            </li>
                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/images/avatars/avatar.png" class="msg-photo"
                                                 alt="Alex's Avatar"/>
                                            <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/images/avatars/avatar3.png" class="msg-photo"
                                                 alt="Susan's Avatar"/>
                                            <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/images/avatars/avatar4.png" class="msg-photo"
                                                 alt="Bob's Avatar"/>
                                            <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/images/avatars/avatar2.png" class="msg-photo"
                                                 alt="Kate's Avatar"/>
                                            <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="assets/images/avatars/avatar5.png" class="msg-photo"
                                                 alt="Fred's Avatar"/>
                                            <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="inbox.html">
                                    See all messages
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <li>
                        <a href="/home/logout">
                            <i class="ace-icon fa fa-mail-forward"></i>
                            Logout
                        </a>
                    </li>
                    @else
                        <li>
                            <a href="/login">
                                <i class="ace-icon fa fa-sign-in"></i>
                                Login
                            </a>
                        </li>
                    @endif
                </ul>


            </nav>
        </div><!-- /.navbar-container -->
    </div>
</div>