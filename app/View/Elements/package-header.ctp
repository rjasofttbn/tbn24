<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin</title>
        <meta name="author" content="SuggeElson" />
        <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
        <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
        <meta name="application-name" content="Supr admin template" />

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- ******************* Bootstrap added by sakib. -->

        <?php
        echo $this->Html->css(
                array(
                    'http://fonts.googleapis.com/css?family=Open+Sans:400,700',
                    'http://fonts.googleapis.com/css?family=Droid+Sans:400,700'
                )
        );
        ?>

        <?php
        echo $this->Html->css(
                array(
                    'bootstrap/bootstrap.min',
                    'bootstrap/bootstrap-responsive.min',
                    'supr-theme/jquery.ui.supr',
                    'icons',
                    '/plugins/misc/qtip/jquery.qtip',
                    '/plugins/misc/prettify/prettify',
                    '/plugins/misc/pnotify/jquery.pnotify.default',
                    '/plugins/forms/uniform/uniform.default',
                    'main',
                    'custom'
                )
        );
        ?>

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo $this->webroot; ?>/images/favicon.ico" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-144-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-57-precomposed.png" />

        <script type="text/javascript">
            //adding load class to body and hide page
            document.documentElement.className += 'loadstate';
        </script>

    </head>

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
                        </img>
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
                        <ul id="myTab" class="nav nav-tabs pattern">
                            <li class="active"><a href="#home" data-toggle="tab"><span><i class="icomoon-icon-home-8"></i></span></a></li>
                            <li class="menutext"><a href="#profile" data-toggle="tab">TV.live</a></li>
                            <li class=""><a href="#home" data-toggle="tab">Video</a></li>
                            <li class=""><a href="#profile" data-toggle="tab">Photo</a></li>
                            <li class=""><a href="#profile" data-toggle="tab">Education</a></li>
                            <li class=""><a href="#profile" data-toggle="tab">Health</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bangladesh <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#dropdown1" data-toggle="tab">Bangladesh</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Politics</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Society</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Law</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">More</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">World <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#dropdown1" data-toggle="tab">World</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Americas</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Europe</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Africa</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">South & Central Asia</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Mid East</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Asia Pacific</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sports <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#dropdown1" data-toggle="tab">Sports</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Cricket</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Football</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Tennis</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Other Sports</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entertainment <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#dropdown1" data-toggle="tab">Entertainment</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">TV</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Film</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">Music</a></li>
                                    <li><a href="#dropdown2" data-toggle="tab">More</a></li>
                                </ul>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sci-Tech <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#dropdown1" data-toggle="tab">Sci-Tech</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Science</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Technology</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Life <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#dropdown1" data-toggle="tab">Life</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Fashion</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Food</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Relation</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Auto</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Travel</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Others</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Business <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#dropdown1" data-toggle="tab">Business</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Economy</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Industry</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Markets</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Tech</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Service</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">More</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Comment <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#dropdown1" data-toggle="tab">Comment</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Opinion</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Interview</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">Issues</a></li>
                                        <li><a href="#dropdown2" data-toggle="tab">More</a></li>
                                    </ul>
                                </li>
                            </li>
                            </li>
                        </ul>


                    </div>

                </div>
            </div>
        </div>


        </div>


        <!-- /Menu Bar Starts Here -->
    </body>  
