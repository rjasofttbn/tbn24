<div id="content" class="clearfix">
    <div class="contentwrapper"><!--Content wrapper-->


<script language="javascript" type="text/javascript">
   

    function getXMLHTTP() { //fuction to return the xml http object
        var xmlhttp = false;
        try {
            xmlhttp = new XMLHttpRequest();
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e1) {
                    xmlhttp = false;
                }
            }
        }

        return xmlhttp;
    }

    function getModel(category_id) {
      

           var strURL = " <?php echo $this->webroot;?>newsImages/findnews.php?category_id=" + category_id;

             var req = getXMLHTTP();

        if (req) {

            req.onreadystatechange = function() {
                if (req.readyState == 4) {
// only if "OK"
                    if (req.status == 200) {
                        document.getElementById('modeldiv').innerHTML = req.responseText;
                    } else {
                        alert("Problem while using XMLHTTP:\n" + req.statusText);
                    }
                }
            }
            req.open("GET", strURL, true);
            req.send(null);
        }
    }


</script>
        <div class="heading">

            <h3>Breaking News management</h3>                    

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
                            <span>Breaking news</span>
                        </h4>

                        <?php echo $this->Session->flash(); ?>

                    </div>
                    <div class="content">

                        <?php
                        echo $this->Form->create('BreakingNews', array(
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                            'id' => 'form-validate',
                            'class' => 'form-horizontal',
                            'novalidate' => 'novalidate',
                            'enctype' => 'multipart/form-data'
                                )
                        );
                        ?>

                       
                        <!--  -->
                        
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="normal">News Category</label>
                                    <?php
                                    echo $this->Form->input('category_id', array(
                                        'type' => 'select',
                                        'options' => $categories,
                                        'class' => 'span9 uniform',
                                        'onChange' => 'getModel(this.value)',
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
                                    <label class="form-label span3" for="normal">News Title</label>
                                    <?php
                                    // echo $this->Form->input('news_id', array(
                                    //     'type' => 'select',
                                    //     'options' => $news,
                                    //     'class' => 'span9 uniform',
                                    //     'div' => array('class' => 'span9')
                                    //         )
                                    // );
                                    ?>
                                    <div id="modeldiv" class="span9 uniform">
                                        <select name="news_id" >
                                            <option>Select News</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="normal">News Priority</label>
                                    <?php
                                    echo $this->Form->input('Priority', array(
                                        'type' => 'select',
                                        'options' => array(5,4,3,2,1),
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
                                    <div class="form-actions">
                                        <div class="span3"></div>
                                        <div class="span9 controls">
                                            <?php
                                            echo $this->Form->button(
                                                    'Insert', array('class' => 'btn marginR10', 'type' => 'submit')
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

        </div><!-- End .span12 -->

    </div><!-- End .row-fluid -->  

</div><!-- End .row-fluid -->  