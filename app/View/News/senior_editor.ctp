<div id="content" class="clearfix">
    <div class="contentwrapper"><!--Content wrapper-->
        <div class="heading">
            <h3>Senior Editor</h3>                 
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
                <li class="active">All Newses</li>
            </ul>

        </div><!-- End .heading-->

        <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

        <div class="row-fluid"> 
           
            <div class="span10">
                
                    <?php echo $this->Session->flash(); ?>
                <div class="box gradient">
                    <div class="title">
                        <h4>
                            <span>News list</span>
                        </h4>
                    </div>
                    <div class="content noPad clearfix"> 
                        <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>News Image</th>
                                    <th>Insert Date</th>
                                    <th>Status</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($news as $id => $single):
//                                foreach ($news as $single):
//                                     $newses = $single['News'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $single['News']['title']; ?></td>
                                        <td><?php echo $single['News']['details']; ?></td>                                      

                                                
                                        <td><img src="<?php echo $this->webroot . 'media' . '/' . $single['News']['image_url']; ?>"  width="50px" height="50px" /></td>



                                        <td><?php echo $single['News']['created']; ?></td>
                                        <td><?php echo $single['News']['status']; ?></td>
                                        <td>   
                                            <div  class="controls center">

                                                <a aria-describedby="qtip-8" data-hasqtip="true"  title="View" oldtitle="View"
                                                   onclick="if (confirm( & quot; Are you sure to delete this User? & quot; )) { return true; } return false;"
                                                   href="<?php
                                                   echo Router::url(array('controller' => 'admins', 'action' => 'edit', $single['News']['id'])
                                                   )
                                                   ?>" class="tip"><span aria-hidden="true" class="icomoon-icon-eye-3"></span></a> 

<!--                                                <a aria-describedby="qtip-8" data-hasqtip="true" title="Delete" oldtitle="Remove task"
                                                   onclick="if (confirm( & quot; Are you sure to delete this News? & quot; )) { return true; } return false;"
                                                   href="<?php
                                                   echo Router::url(array('controller' => 'admins', 'action' => 'deletenews', $single['News']['id'])
                                                   )
                                                   ?>" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>                          -->


                                                <?php if ($single['News']['status'] != 'blocked'): ?>
                                                    <a aria-describedby="qtip-7" data-hasqtip="true" title="Block" oldtitle="Edit task"
                                                       onclick="if (confirm( & quot; Are you sure to block this News? & quot; )) { return true; } return false;"

                                                       href="<?php
                                                       echo Router::url(array('controller' => 'admins', 'action' => 'senior_editor_blocknews', $single['News']['id'])
                                                       )
                                                       ?>" class="tip"><span class="icon12 iconic-icon-move-horizontal-alt2"></span></a>
                                                   <?php endif; ?>

                                                <?php if ($single['News']['status'] != 'active'): ?>
                                                    <a aria-describedby="qtip-8" data-hasqtip="true" title="Active" oldtitle="Remove task" 
                                                       onclick="if (confirm( & quot; Are you sure to active this News? & quot; )) { return true; } return false;"

                                                       href="<?php
                                                       echo Router::url(array('controller' => 'admins', 'action' => 'senior_editor_activenews', $single['News']['id'])
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