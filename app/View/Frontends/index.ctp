
<div class="span8">
    <div class="row-fluid">
        <div class="span6">
            <div class="box">

                <div class="title">
                    <h4><span>On Focus</span></h4>  
                </div>

                <div class="content">
                    <?php foreach ($main_news as $result): ?>
                    
                     <img class="myimage"  src="<?php echo $this->webroot . 'newsImages' . '/' . $result['n']['image_url']; ?>"/> 
                        <a href="#"><h2><?php
                                            $output = $result['n']["title"];
                                            if (strlen($result['n']["title"]) > 29) {
                                                $output = substr($result['n']["title"], 0, strpos($result['n']["title"], ' ', 29));
                                            }
                                            echo $output;
                                            ?></h2></a>
                        <p><?php 
                                 if (strlen($result['n']["details"]) > 211) {
                                    $output1 = substr($result['n']["details"], 0, strpos($result['n']["details"], ' ', 211));
                                    
                                    if (empty($output1)) {
                                         $output = substr($result['n']["details"], 0, strpos($result['n']["details"], ' ', 200));

                                    }
                                     else {
                                        $output = substr($result['n']["details"], 0, strpos($result['n']["details"], ' ', 211));

                                     }                                                         
                                   
                                }
                                else {
                                    $output = $result['n']["details"];
                                }
                                echo $output;                                 
                                ?> </p> 
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="span6">
            <div class="box">

                <div class="title">
                    <h4><span>Latest</span></h4>  
                </div>

                <div class="content">

                    <?php
                    foreach ($latest_sql as $single):
                        ?>
                        <div class="page-header">
                            <div class="row">

                                <div class="span4">
                                    <div class="" id="mainstory">

                                        <img class="myimage"  src="<?php echo $this->webroot . 'newsImages' . '/' . $single['news']['image_url']; ?>"/> 
                                    </div>
                                </div>
                                <div class="span8">
                                    <a href="#"><span class="newstitle"><?php
                                            $output = $single["news"]["title"];
                                            if (strlen($single["news"]["title"]) > 29) {
                                                $output = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 29));
                                            }
                                            echo $output;
                                            ?></span></a>
                                </div>

                            </div>
                        </div>

                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="box">

                <div class="title">
                    <h4><span>Featured Stories</span></h4>  
                </div>

                <div class="content">
                    <div class="page-header">
                        <div class="row">
                            <a href="#">
                                <div class="span4">
                                    <div class="" id="mainstory">
                                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    </div>
                                </div>
                                <div class="span8">
                                    <span class="newstitle">US seeks extradition of seven FIFA officials</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="page-header">
                        <div class="row">
                            <a href="#">
                                <div class="span4">
                                    <div class="" id="mainstory">
                                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    </div>
                                </div>
                                <div class="span8">
                                    <span class="newstitle">US seeks extradition of seven FIFA officials</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="page-header">
                        <div class="row">
                            <a href="#">
                                <div class="span4">
                                    <div class="" id="mainstory">
                                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    </div>
                                </div>
                                <div class="span8">
                                    <span class="newstitle">US seeks extradition of seven FIFA officials</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="page-header">
                        <div class="row">
                            <a href="#">
                                <div class="span4">
                                    <div class="" id="mainstory">
                                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    </div>
                                </div>
                                <div class="span8">
                                    <span class="newstitle">US seeks extradition of seven FIFA officials</span>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="span6">

            <div class="box">

                <div class="title">
                    <h4><span>More News</span></h4>  
                </div>

                <div class="content">
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#">  202 killed in workplace accidents in last 6 months </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#">  Fazle Hasan Abed wins World Food Prize </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#">  BD now a lower-middle income country: WB </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#"> Egypt approves new terrorism law after deadly attacks </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#">  WikiLeaks claims NSA targeted German ministers beyond Merkel </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#"> US, Cuba restoring diplomatic ties after 54 years </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#"> Greece’s Tsipras digs in against bailout </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#"> US, Venezuela launch quiet diplomacy to ease acrimony </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#"> Policy not meant to control media: PM </a>
                    </div>
                    <div class="page-header">
                        <i class="entypo-icon-arrow-17"></i>
                        <a href="#"> Bullets from Rony’s pistol killed 2: police </a>
                    </div>

                </div>

            </div><!-- End .box -->

        </div>
    </div>
    
    
    

    <div class="box">
        <div class="content">

            Google Ad  
            <br>
            <br>
            <br>
            <br>

        </div>

    </div>




    <div class="box">
        <div class="title">
            <h4>Photo Gallery</h4>
        </div>


    </div>
    <div class="row-fluid">

        <div class="span6">
            <div class="box">



                <div class="content">
                    <a href="#">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                        <p>News Details</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="box">



                <div class="content">
                    <a href="#">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                        <p>News Details</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">

        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">

        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">
                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="center" id="mainstory">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">

                            <p>Image Title</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left:0px ; padding-top:0px;">
        <div class="span12">
            <div class="span12">
                <div class="span4">

                    <div class="box">

                        <div class="title" id="world">

                            <h4>
                                <a href="#">
                                    <span>Bangladesh</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">

                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>

                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="world">

                            <h4>
                                <a href="#">
                                    <span>World</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held</a> 
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="sports">

                            <h4>
                                <a href="#">
                                    <span>Sports</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a> 
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left:0px ; padding-top:0px;">
        <div class="span12">
            <div class="span12">
                <div class="span4">

                    <div class="box">

                        <div class="title" id="entertainment" >

                            <h4>
                                <a href="#">
                                    <span>Entertainment</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="sci">

                            <h4>
                                <a href="#">
                                    <span>Sci-Tech</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a> 
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a> 
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a> 
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="life">

                            <h4>
                                <a href="#">
                                    <span>Life</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left:0px ; padding-top:0px;">
        <div class="span12">
            <div class="span12">
                <div class="span4">

                    <div class="box">

                        <div class="title" id="business">

                            <h4>
                                <a href="#">
                                    <span>Business</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="comment">

                            <h4>
                                <a href="#">
                                    <span>Comment</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="art">

                            <h4>
                                <a href="#">
                                    <span>Art & Culture</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a> 
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left:0px ; padding-top:0px;">
        <div class="span12">
            <div class="span12">
                <div class="span4">

                    <div class="box">

                        <div class="title" id="edu">

                            <h4>
                                <a href="#">
                                    <span>Education</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a> 
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="health">

                            <h4>
                                <a href="#">
                                    <span>Health</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
                <div class="span4">

                    <div class="box">

                        <div class="title" id="society">

                            <h4>
                                <a href="#">
                                    <span>Society</span>
                                </a>
                            </h4>

                        </div>
                        <div class="content">
                            <div class="" id="mainstory">
                                <a href="#">
                                    <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                    <p>Image Title</p>
                                </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                            <div class="page-header">
                                <i class="entypo-icon-arrow-17"></i>
                                <a href="#">2 suspected militants held </a>
                            </div>
                        </div>

                    </div><!-- End .box -->

                </div>
            </div>
        </div>
    </div>


    <div class="box">
        <div class="title">
            <h4>Video</h4>
        </div>


    </div>
    <div class="row-fluid">

        <div class="span6">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">

        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">

        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="box">



                <div class="content">
                    <div class="" id="mainstory">
                        <img class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                        <p>Image Title</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




