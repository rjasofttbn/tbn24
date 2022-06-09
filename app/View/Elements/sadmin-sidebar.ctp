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
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Menu Management</a>
                        <ul class="sub">                                         
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'menus', 'action' => 'addMenu')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Add Menu</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'menus', 'action' => 'editMenu')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Edit Menu</a>
                            </li> 

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'menus', 'action' => 'addSubMenu')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Add Sub Menu</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'menus', 'action' => 'editSubMenu')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Edit Sub Menu</a>
                            </li> 

                        </ul>                        
                    </li> 


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
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Category Management</a>
                        <ul class="sub">                                         
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'category')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Insert Category</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'editcategory')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Edit Category</a>
                            </li> 
                        </ul>                        
                    </li>  

                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>News Management</a>
                        <ul class="sub">                                         
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'insert_news')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Insert News</a>
                            </li>
                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'manage_news')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Manage News</a>
                            </li> 

                        </ul>                        
                    </li> 

                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Home Settings</a>
                        <ul class="sub">  

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'column')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Add Column</a>
                            </li>

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'editcolumn')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Manage Column</a>
                            </li> 

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'section')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Add Section</a>
                            </li>

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'editsection')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Manage Section</a>
                            </li> 

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'homesetting')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Add news home</a>
                            </li>

                        </ul>                        
                    </li> 


                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Breaking News</a>
                        <ul class="sub">                                         

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'breaking_news')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>breaking News</a>
                            </li> 

                        </ul>                        
                    </li>  
                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Photo Gallery Setting</a>
                        <ul class="sub">                                       

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'main_photo')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Main Photo</a>
                            </li> 

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'main_2_photo')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Main Photo Two</a>
                            </li> 

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'main_3_photo')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Main Photo Three</a>
                            </li> 

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'add_category_photo')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Category Select for Photo</a>
                            </li> 
                        </ul>                        
                    </li>

                    <li>
                        <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Video Gallery Setting</a>
                        <ul class="sub">                                       

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'main_video')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Main Video</a>
                            </li>                             

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'main_3_video')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Video Three</a>
                            </li> 

                            <li>
                                <a href="<?php echo Router::url(array('controller' => 'news', 'action' => 'add_category_video')) ?>"><span class="icon16 icomoon-icon-arrow-right-2"></span>Category Select for Video</a>
                            </li> 

                        </ul>                        
                    </li>


                </ul>
            </div>
        </div><!-- End sidenav -->
    </div><!-- End #sidebar -->
