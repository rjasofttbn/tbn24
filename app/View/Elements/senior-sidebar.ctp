<div id="wrapper">

    <!--Responsive navigation button-->  
    <div class="resBtn">
        <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
    </div>

    <!--Left Sidebar collapse button-->  
    <div class="collapseBtn leftbar">
        <a href="#" class="tipR" title="Hide Left Sidebar"><span class="icon12 minia-icon-layout"></span></a>
    </div>

    <!--Sidebar background-->
    <div id="sidebarbg"></div>
    <!--Sidebar content-->
    <div id="sidebar">

        <div class="shortcuts">
            <ul>
                <li><a href="support.html" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                <li><a href="charts.html" title="Sales statistics" class="tip"><span class="icon24 icomoon-icon-pie-2"></span></a></li>
                <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
            </ul>
        </div><!-- End search -->            

        <div class="sidenav">

            <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                <h5 class="title" style="margin-bottom:0">Navigation</h5>
            </div><!-- End .sidenav-widget -->

            <div class="mainnav">
                <ul>
                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>User Manaement</a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'role')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Create Role</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'editrole')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Edit Role</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'register')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Create User</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'manage_user')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Manage User</a>
                            </li>

                        </ul>                        
                    </li>

                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>News</a>
                        <ul class="sub">                                         
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'insert_news')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Insert News</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'manage_newses')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Manage News</a>
                            </li> 
                        </ul>                        
                    </li> 
                    
                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Top Editor</a>
                        <ul class="sub">                                         
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'senior_editor')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Senior Editor</a>
                               
                            
                                <ul class="sub">
                                    

                                    <?php
                                   

                                    foreach ($categories as $id => $cat):
                                        ?>
                                        <li>
                                            <a style="color: #333;" href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'senior_editor', $id)) ?>">

                                                <span class="icon16 icomoon-icon-arrow-right-2"></span>
                                                <?php echo $cat; ?>
                                            </a>
                                        </li>

                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </li>                
                                
                            
                        </ul>                        
                    </li>  
                </ul>
            </div>
        </div><!-- End sidenav -->
    </div><!-- End #sidebar -->
