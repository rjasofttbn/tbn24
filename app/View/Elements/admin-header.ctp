 <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
        
    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="<?php echo Router::url(array('controller'=>'admins','action'=>'dashboard'))?>">Admin</a>
                <div class="nav-no-collapse">
                    <ul class="nav pull-right usernav">
                        <li><a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'logout')) ?>"><span class="icon16 icomoon-icon-exit"></span> Logout</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->