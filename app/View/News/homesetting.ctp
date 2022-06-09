<div id="content" class="clearfix">
    <div class="contentwrapper"><!--Content wrapper-->
        <div class="heading">
            <h3>Home page news setting</h3>                  
            <div class="resBtnSearch">
                <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
            </div>
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
                            <span>Home page news setting</span>
                        </h4>

                        <?php echo $this->Session->flash(); ?>
                        <?php
                        if (isset($errors)):
                            echo $errors;
                        endif;
                        ?>   
                    </div>
                    <div class="content">
                        <?php
                        echo $this->Form->create('Homesetting', array(
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                            'id' => 'form-validate',
                            'class' => 'form-horizontal',
                            'novalidate' => 'novalidate'
                                )
                        );
                        ?>

                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="checkboxes">Category Name</label>
                                    <div class="span9 controls sel">
                                        <?php
                                        echo $this->Form->input('category_id', array(
                                            'type' => 'select',
                                            'options' => $category,
                                            'empty' => '',
                                            'class' => 'span12 uniform nostyle select1 pclass required',
                                            'div' => array('class' => 'span12 required')
                                                )
                                        );
                                        ?>
                                    </div> 
                                </div>
                            </div> 
                        </div>  


                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="checkboxes">News Title</label>
                                    <div class="span9 controls sel">
                                        <?php
                                        echo $this->Form->input('news_id', array(
                                            'type' => 'select',
                                            'options' => $news,
                                            'empty' => '',
                                            'id' => 'cid',
                                            'class' => 'span12 uniform nostyle select1 cclass required',
                                            'div' => array('class' => 'span12 required')
                                                )
                                        );
                                        ?>
                                    </div> 
                                </div>
                            </div> 
                        </div> 
                        
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="checkboxes">Column Name</label>
                                    <div class="span9 controls sel">
                                        <?php
                                        echo $this->Form->input('column_id', array(
                                            'type' => 'select',
                                            'options' => $column,
                                            'empty' => '',
                                            'id' => 'cid',
                                            'class' => 'span12 uniform nostyle select1 cclass required',
                                            'div' => array('class' => 'span12 required')
                                                )
                                        );
                                        ?>
                                    </div> 
                                </div>
                            </div> 
                        </div>
                        
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="checkboxes">Section Name</label>
                                    <div class="span9 controls sel">
                                        <?php
                                        echo $this->Form->input('section_id', array(
                                            'type' => 'select',
                                            'options' => $section,
                                            'empty' => '',
                                            'id' => 'cid',
                                            'class' => 'span12 uniform nostyle select1 cclass required',
                                            'div' => array('class' => 'span12 required')
                                                )
                                        );
                                        ?>
                                    </div> 
                                </div>
                            </div> 
                        </div>
                        
                         <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="required">priority No.</label>
                                    <?php
                                    echo $this->Form->input(
                                        'priority', array(
                                        'id' => 'required',
                                        'class' => 'span9 text',
                                            'type' => 'text'
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
                                                    'Add', array('class' => 'btn marginR10', 'type' => 'submit')
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