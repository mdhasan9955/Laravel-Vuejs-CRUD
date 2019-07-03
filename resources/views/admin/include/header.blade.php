<header class="main-header"> 
    <a href="{{ route('admin.index') }}" class="logo"> 
        <span class="logo-lg"> Admin Panel </span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="hidden-xs hidden-sm"><a href="#" class="clock"></a></li>  
                <li class="dropdown user user-menu" style="padding-right:5px;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Logout
                    </a>
                    <ul class="dropdown-menu" style="padding-right:3px;">
                        <li class="user-header"> 
                            <p> 
                            </p>
                            <!--   -->
                        </li>
                        <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
                          @csrf
                          <li class="user-footer">                            
                            <div class="pull-left">
                                <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <input type="submit" value="Logout" class="btn btn-default btn-flat"> 
                            </div>
                        </li>
                    </form>
                    </ul>
                </li>
        </ul>
    </div>
</nav>
</header>