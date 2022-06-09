<div id="content" class="clearfix">
    <div class="contentwrapper"><!--Content wrapper-->

        <div class="heading">

            <h3>All Users</h3>                    


            <div class="resBtnSearch">
                <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
            </div>

            <div class="search">

                <form id="searchform" action="search.html">
                    <input type="text" id="tipue_search_input" class="top-search" placeholder="Search here ..." />
                    <input type="submit" id="tipue_search_button" class="search-btn" value=""/>
                </form>

            </div><!-- End search -->

            <ul class="breadcrumb">
                <li>You are here:</li>
                <li>
                    <a href="#" class="tip" title="back to dashboard">
                        <span class="icon16 icomoon-icon-screen-2"></span>
                    </a> 
                    <span class="divider">
                        <span class="icon16 icomoon-icon-arrow-right-2"></span>
                    </span>
                </li>
                <li class="active">All users</li>
            </ul>

        </div><!-- End .heading-->

        <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

        <div class="row-fluid">
            <?php echo $this->Session->flash(); ?>
            <div class="span12">

                <div class="box gradient">

                    <div class="title">
                        <h4>
                            <span>All User list</span>
                        </h4>
                    </div>

                    <div class="content noPad clearfix">
                        <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>National Id</th>
                                    <th>Roll</th>
                                    <th>Date of Birth</th>  
                                    <th>Ip</th>                                              
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $single):
//                                    pr($single);
//                                exit;
                                    $user = $single['User'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['nid']; ?></td>
                                        <td><?php echo $single['Role']['name']; ?></td>
                                        <td><?php echo $user['dob']; ?></td>                                                
                                        <td><?php echo $user['ip']; ?></td>                                                
                                        <td><?php echo $user['created']; ?></td>
                                        <td><?php echo $user['status']; ?></td>

                                        <td>   
                                            <div class="controls center">

                                                    <a aria-describedby="qtip-7" data-hasqtip="true" title="Edit" target="_blank" oldtitle="Edit task" href="<?php echo Router::url(array('controller' => 'admins', 'action' => 'edituser', $user['id'])) ?>" class="tip"><span class="icon12  icomoon-icon-pencil-4"></span></a>

                                                <a aria-describedby="qtip-8" data-hasqtip="true" title="Delete" oldtitle="Remove task"
                                                   onclick="if (confirm( &quot; Are you sure to delete this User? &quot; )) { return true; } return false;"
                                                   href="<?php
                                                   echo Router::url(array('controller' => 'admins', 'action' => 'deleteuser', $user['id'])
                                                   )
                                                   ?>" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>                          
                                                   <?php if ($user['status'] != 'blocked'): ?>

                                                    <a aria-describedby="qtip-7" data-hasqtip="true" title="Block" 
                                                       onclick="if (confirm( &quot; Are you sure to block this User? &quot; )) { return true; } return false;"

                                                       href="<?php
                                                       echo Router::url(array('controller' => 'admins', 'action' => 'blockuser', $user['id'])
                                                       )
                                                       ?>" class="tip"><span class="icon12 iconic-icon-move-horizontal-alt2"></span></a>
                                                   <?php endif; ?>

                                                <?php if ($user['status'] != 'active'): ?>
                                                    <a aria-describedby="qtip-8" data-hasqtip="true" title="Active" placeholder="Block" oldtitle="" 
                                                       onclick="if (confirm( &quot; Are you sure to active this User? &quot; )) { return true; } return false;"

                                                       href="<?php
                                                       echo Router::url(array('controller' => 'admins', 'action' => 'activeuser', $user['id'])
                                                       )
                                                       ?>"
                                                       class="tip"><span class="icon12 icomoon-icon-checkmark"></span></a>
                                                    <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                endforeach;
                                ?>


                            </tbody>

                        </table>
                    </div>

                </div><!-- End .box -->

            </div><!-- End .span12 -->

        </div><!-- End .row-fluid -->

        <!-- Page end here -->               
    </div><!-- End contentwrapper -->
</div><!-- End #content -->