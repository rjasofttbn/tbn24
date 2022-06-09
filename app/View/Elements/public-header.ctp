<body>
    <div id="pre">
        <div class="container">
            <div class="row-fluid">
                <span class="btn" style="float: left;">English</span>
                <span class="btn pull-right" style="float: right;">Login</span>
            </div>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="row-fluid">
                <div class="span2">
                    <img src="<?php echo $this->webroot; ?>images/myimage/tbnlogo.png">
                </div>
                <div class="span2" id="headertext">

                </div>
                <div class="span5" id="headertext">
                    <div>
                        <a href="#"><i class="topicon icomoon-icon-facebook-2"></i></a>
                        <a href="#"><i class="topicon icomoon-icon-twitter"></i></a>
                        <a href="#"><i class="topicon icomoon-icon-google-plus-3"></i></a>
                        <a href="#"><i class="topicon icomoon-icon-linkedin"></i></a>
                        <a href="#"><i class="topicon icomoon-icon-youtube"></i></a>
                        <a href="#"><i class="topicon entypo-icon-email"></i></a>
                        <a href="#"><i class="topicon icomoon-icon-blogger"></i></a>
                    </div>
                    <div id="headertext">
                        <span class="info"> New York, Wednesday, July 3, 2015|</span>

                        Video | Weather | Share Market
                    </div>
                </div>
                <div class="span3" id="headertext">

                    <div id="form-container">
            <!--<input type="submit" id="searchsubmit" value="" />-->
                        <a class="search-submit-button" href="javascript:void(0)">
                            <i class="topsearchicon icomoon-icon-search-3"></i>
                        </a>
                        <div id="searchtext">
                            <input type="text" id="s" name="s" value="" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /navbar-inner -->
    </div> <!--  /navbar --> 

    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div style="margin-bottom: 10px;">
                    <ul class="nav nav-tabs pattern">
                        <li class="active">
                            <a href="<?php echo Router::url('/', true); ?>"><span><i class="icomoon-icon-home-8"></i></span></a>                                   
                        </li>
                        
                        
                       

                       
                        <?php
                  // pr($filteredMenu); exit;
                        foreach ($filteredMenu as $menu):
                         // echo $menu; exit;
                            if (isset($menu['sub_menu'])):
                                
                                ?>
                                <li class="dropdown inactive">
                                    <a href="<?php
                                    $url = '/' . $menu['menu']['action'];
                                    echo Router::url($url, true);
                                    ?>" data-toggle="dropdown" class="dropdown-toggle"><?php echo $menu['menu']['name']; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($menu['sub_menu'] as $m):
                                            ?>
                                            <li class="inactive"> 
                                                <a href="<?php
                                                $url = '/' . $m['action'];
                                                echo Router::url($url, true);
                                                ?>"><?php echo $m['name']; ?></a>
                                            </li>
                                            <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                </li>
                                            
                                   <?php         
                                    else:
                                        ?>
                                        <li class="inactive">
                                            <a href="<?php
                                            $url = '/' . $menu['menu']['action'];
                                            echo Router::url($url, true);
                                            ?>"><?php echo $menu['menu']['name']; ?></a>                                   
                                        </li>
                                    <?php
                                    endif;
                                    ?>
                                    <?php
                                endforeach;
                                ?>                 
                            </ul>
                            </div>
                            </div>
                            </div>
                            </div>

                            <!-- /Menu Bar Starts Here -->

                            <div id="fb-root"></div>
                            <script>(function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id))
                                        return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                            <div class="container">
                                <div class="row-fluid">
                                    <div class="span3">
                                        <div class="box">

                                            <div class="content">
                                                <div class="page-header" style="border-bottom: 0px;">
                                                    <div class="row">
                                                        <div class="span5">
                                                            <div class="" id="mainstory">
                                                                <img style="margin-bottom: 0px;" class="myimage" src="<?php echo $this->webroot; ?>images/myimage/image.jpg">
                                                            </div>
                                                        </div>
                                                        <div class="span7">
                                                            <a href="#"> <span class="">US seeks extradition of seven FIFA officials</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="span9">
                                        <div class="box">
                                            <div class="content">

                                                Ad Box 
                                                <br>
                                                <br>
                                                <br>
                                                <br>

                                            </div>

                                        </div><!-- End .box -->

                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">

                                        <div id="headline">
                                            <div class="row" style="margin-bottom: -17px;">
                                                <div class="span1">
                                                    <div class="healine_title">Headline</div>
                                                </div><!--end col-md-2-->

                                                <div class="span11">
                                                    <div class="headlist"><marquee behavior="scroll" scrollamount="5" scrolldelay="1" direction="left" onmouseover="stop();" onmouseout="start();">
                                                            <ul class="list-inline" style="">
                                                                <li><a href="#"><i class="entypo-icon-arrow-17"></i>&nbsp;IMF ready to help Greece</a></li>
                                                                <li><a href="#"><i class="entypo-icon-arrow-17"></i>&nbsp;359 overseas jobseekers brought back: FM</a></li>
                                                                <li><a href="#"><i class="entypo-icon-arrow-17"></i>&nbsp;Charge framing of Kibria murder case deferred till 14 July</a></li>
                                                                <li><a href="#"><i class="entypo-icon-arrow-17"></i>&nbsp;Erashad questions speaker's authority</a></li>
                                                                <li><a href="#"><i class="entypo-icon-arrow-17"></i>&nbsp;Arrest warrant issued against 16 BNP men</a></li></ul><!--end ul-->
                                                        </marquee></div><!--end hl_list-->
                                                </div><!--end col-md-10-->
                                            </div><!--end row-->
                                        </div>

                                    </div>
                                </div>
                                <div class="row-fluid">

