<div id="content" class="clearfix">
    <div class="contentwrapper"><!--Content wrapper-->

        <div class="heading">

            <h3>All News</h3>                  
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
                <li class="active">All newses</li>
            </ul>

        </div><!-- End .heading-->

        <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

        <div class="row-fluid">

            <div class="span12">

                <div class="box gradient">

                    <div class="title">
                        <h4>
                            <span>All News list</span>
                        </h4>
                    </div>
                    <?php echo $this->Session->flash(); ?>
                    <div class="content noPad clearfix">
                        <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Image Url</th>
                                    <th>Youtube Url</th>
                                    <th>Insert date</th>                                                                                              
                                    <th>Status</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($newses as $single):
                                    $newses = $single['News'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo substr($newses["title"], 0,  29); ?></td>
                                        
                                        <td> <?php
                                            $output = $newses["details"];
                                            if (strlen($newses["details"]) > 77) {
                                                $output = substr($newses["details"], 0, strpos($newses["details"], ' ', 77));
                                            }
                                            echo $output;
                                            ?></td>
                                        <td><?php echo $single['Category']['name']; ?></td>
                                        <td><img src="<?php echo $this->webroot . 'newsImages' . '/' . $newses['image_url']; ?>"  width="50px" height="50px" /></td>
                                        <td><?php echo $newses['youtube_url']; ?></td>
                                        <td><?php echo $newses['created']; ?></td> 
                                        <td><?php echo $newses['status']; ?></td>
                                        <td>   
                                            <div class="controls center">
                                                <a aria-describedby="qtip-7" data-hasqtip="true" title="View" oldtitle="Edit task" href="<?php echo Router::url(array('controller' => 'news', 'action' => 'editnews', $newses['id'])) ?>" class="tip"><span class="icon12  icomoon-icon-pencil-4"></span></a>

                                                <?php if ($role == 'sadmin'):
                                                    ?>
                                                    <?php if ($newses['status'] != 'unpublished'): ?>

                                                        <a aria-describedby="qtip-7" data-hasqtip="true" title="unpublished" 
                                                           onclick="if (confirm( & quot; Are you sure to unpublished this news? & quot; )) { return true; } return false;"

                                                           href="<?php
                                                           echo Router::url(array('controller' => 'news', 'action' => 'unpublishednews', $newses['id'])
                                                           )
                                                           ?>" class="tip"><span class="icon12 iconic-icon-move-horizontal-alt2"></span></a>
                                                       <?php endif; ?>

                                                    <?php if ($newses['status'] != 'published'): ?>
                                                        <a aria-describedby="qtip-8" data-hasqtip="true" title="published" placeholder="published" oldtitle="" 
                                                           onclick="if (confirm( & quot; Are you sure to published this news? & quot; )) { return true; } return false;"

                                                           href="<?php
                                                           echo Router::url(array('controller' => 'news', 'action' => 'publishednews', $newses['id'])
                                                           )
                                                           ?>"
                                                           class="tip"><span class="icon12 icomoon-icon-checkmark"></span></a>
                                                        <?php endif; ?>

                                                    <?php
                                                endif;
                                                ?>



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
