<div id="content" class="clearfix">
    <div class="contentwrapper"><!--Content wrapper-->

        <div class="heading">

            <h3>Edit News</h3>                    

            <div class="resBtnSearch">
                <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
            </div>

            <div class="search">

                <form id="searchform" action="search.html">
                    <input type="text" id="tipue_search_input" class="top-search text" placeholder="Search here ...">
                    <input type="submit" id="tipue_search_button" class="search-btn nostyle" value="">
                </form>

            </div><!-- End search -->

            <ul class="breadcrumb">
                <li>You are here:</li>
                <li>
                    <a href="#" class="tip" oldtitle="back to dashboard" title="" data-hasqtip="true">
                        <span class="icon16 icomoon-icon-screen-2"></span>
                    </a> 
                    <span class="divider">
                        <span class="icon16 icomoon-icon-arrow-right-2"></span>
                    </span>
                </li>
                <li class="active">Fill up </li>
            </ul>

        </div><!-- End .heading-->

        <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

        <div class="row-fluid">

            <div class="span12">

                <div class="box">

                    <div class="title">

                        <h4>
                            <span>Edit News</span>
                        </h4>

                        <?php echo $this->Session->flash(); ?>

                    </div>
                    <div class="content">

                        <?php
                        echo $this->Form->create("News", array(
                            'url' => array('controller' => 'news',
                                'action' => 'editnews'), 'type' => 'file'));
                        ?>

                        <?php
//                        echo $this->Form->create("News", array(
//                            'url' => array(
//                                'controller' => 'admins',
//                                'action' => 'editnews'
//                            ),
//                            'id' => 'form-validate',
//                            'class' => 'form-horizontal',
//                            'novalidate' => 'novalidate',
//                            'type' => 'file'
//                                )
//                        );
                        ?>
                        <?php //echo $this->Form->input('id', array('type' => 'hidden')); ?>

                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="required">News Title</label>

                                    <?php
                                    echo $this->Form->input(
                                            'title', array(
                                        'class' => 'span9 text'
                                            )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="normal">News Details</label>
                                    <?php
                                    echo $this->Tinymce->input('News.details', array(
                                        'class' => 'span9'
                                            ), array(
                                        'language' => 'en'
                                            ), 'full'
                                    );
                                    ?>
                                </div>
                            </div> 
                        </div>
                        <?php
                        ?>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="normal">News Category</label>
                                    <?php
                                    echo $this->Form->input('category_id', array(
                                        'type' => 'select',
                                        'options' => $categories,
                                        'class' => 'span9 uniform',
                                        'div' => array('class' => 'span9')
                                            )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="textarea">Picture</label>

                                    <?php
                                    echo $this->Form->input(
                                            'image_url', array(
                                        'type' => 'file',
                                        'id' => 'required',
                                        'class' => 'span9 text'
                                            )
                                    );
                                    ?>
                            
                                   

                                  
                                </div>
                            </div> 
                            
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span9" style="float: right;">
                                
                        <?php
                             $i=0;

                                   foreach ($newses as $single):
                                  //  $newses = $single['News'];
                                  //  $newses = $single['News'];
                                   // echo $single['image_url'];
                                ?>
                                <img src="<?php echo $this->webroot . 'newsImages' . '/' . $single['image_url']; ?>"  width="150px" height="150px" />
                                <?php
                                $i++;
                                if($i==1) break;
                                    endforeach;
                                    ?> 
                                    
                            </div> 
                            
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="normal">Youtube Url</label>
                                    <?php
                                    echo $this->Form->input(
                                            'youtube_url', array(
                                        'id' => 'required',
                                        'class' => 'span9 text'
                                            )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <div class="form-actions">
                                        <div class="span3"></div>
                                        <div class="span9 controls">
                                            <?php
                                            echo $this->Form->button(
                                                    'Update', array('class' => "btn marginR10", 'type' => "submit")
                                            );
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div><!-- End .box -->
            </div><!-- End .span12 -->
        </div><!-- End .row-fluid -->  
    </div><!-- End .span12 -->
</div><!-- End .row-fluid -->  