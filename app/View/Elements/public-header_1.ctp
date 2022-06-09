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

                            
                            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='index') )?'active' :'inactive' ?>">
                                    <?php echo $this->Html->link(
                                       '<span><i class="icomoon-icon-home-8"></i>',
                                        array(
                                            
                                            'action'=>'index'
                                            ),
                                        array(
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                            </li>
                            
                            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='livetv') )?'active' :'inactive' ?>">

                                <?php echo $this->Html->link('TV.live',array( 'action' => 'livetv'))?>
                                 
                            </li>
                            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='video') )?'active' :'inactive' ?>">
                                <?php echo $this->Html->link('Video',array('action' => 'video'))?></li>
                            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='photo') )?'active' :'inactive' ?>">
                                <?php echo $this->Html->link('Photo',array( 'action' => 'photo'))?>
                            </li>
                            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='education') )?'active' :'inactive' ?>">
                                <?php echo $this->Html->link('Education',array( 'action' => 'education'))?>
                            </li>
                            <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='health') )?'active' :'inactive' ?>">
                                <?php echo $this->Html->link('Health',array( 'action' => 'health'))?></li>

                            <li class="dropdown <?php echo (!empty($this->params['action']) && ($this->params['action']=='bangladesh') || ($this->params['action']=='politics') || ($this->params['action']=='society') || ($this->params['action']=='law') || ($this->params['action']=='more_news') )?'active' :'inactive' ?>">
                               <?php echo $this->Html->link(
                                       'Bangladesh <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'bangladesh'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bangladesh <b class="caret"></b></a> -->
                                <ul class="dropdown-menu">
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='bangladesh') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'Bangladesh',
                                        array(
                                            
                                            'action'=>'bangladesh'
                                            )
                                    );
                                    ?>
                                        <!-- <a href="#dropdown1" data-toggle="tab">Bangladesh</a> -->
                                    </li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='politics') )?'active' :'inactive' ?>">  
                                        <?php echo $this->Html->link(
                                       'Politics',
                                        array(
                                            
                                            'action'=>'politics'
                                            )
                                    );
                                    ?></li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='society') )?'active' :'inactive' ?>"> 
                                        <?php echo $this->Html->link(
                                       'Society',
                                        array(
                                            
                                            'action'=>'society'
                                            )
                                    );
                                    ?></li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='law') )?'active' :'inactive' ?>">  
                                        <?php echo $this->Html->link(
                                       'Law',
                                        array(
                                            
                                            'action'=>'law'
                                            )
                                    );
                                    ?></li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='more_news') )?'active' :'inactive' ?>"> 
                                        <?php echo $this->Html->link(
                                       'More',
                                        array(
                                            
                                            'action'=>'more_news'
                                            )
                                    );
                                    ?></li>
                                </ul>
                            </li>
                            <li class="dropdown <?php echo (!empty($this->params['action']) && ($this->params['action']=='world')  )?'active' :'inactive' ?>">
                                <?php echo $this->Html->link(
                                       'World <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'world'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">World <b class="caret"></b></a> -->
                                <ul class="dropdown-menu">
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='world') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'World',
                                        array(
                                            'controller'=>'frontends',
                                            'action'=>'world'
                                            )
                                    );
                                    ?>                                
                                    </li>
                                    
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='america') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'America',
                                        array(
                                            'controller'=>'frontends',
                                            'action'=>'america'
                                            )
                                    );
                                    ?>                                
                                    </li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='europe') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'Europe',
                                        array(
                                            'controller'=>'frontends',
                                            'action'=>'europe'
                                            )
                                    );
                                    ?>                                
                                    </li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='africa') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'Africa',
                                        array(
                                            'controller'=>'frontends',
                                            'action'=>'africa'
                                            )
                                    );
                                    ?>                                
                                    </li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='central_asia') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'Asia',
                                        array(
                                            'controller'=>'frontends',
                                            'action'=>'central_asia'
                                            )
                                    );
                                    ?>                                
                                    </li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='mid_east') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'Middle East',
                                        array(
                                            'controller'=>'frontends',
                                            'action'=>'mid_east'
                                            )
                                    );
                                    ?>                                
                                    </li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='asia_pacific') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                       'Asia Pacific',
                                        array(
                                            'controller'=>'frontends',
                                            'action'=>'asia_pacific'
                                            )
                                    );
                                    ?>                                
                                    </li>
                                </ul>
                            </li>


                            <li class="dropdown <?php echo (!empty($this->params['action']) && ($this->params['action']=='sports') || ($this->params['action']=='cricket') || ($this->params['action']=='football') || ($this->params['action']=='tennis') || ($this->params['action']=='other_sports') )?'active' :'inactive' ?>">
                             
                              <?php 
                              echo $this->Html->link(
                                       'Sports <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'sports'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                    


                                <ul class="dropdown-menu">
                                    <li class= "<?php echo (!empty($this->params['action']) && ($this->params['action']=='sports') )?'active' :'inactive' ?>">
                                         <?php echo $this->Html->link(
                                           'Sports',
                                            array(
                                                
                                                'action'=>'sports'
                                                )
                                            );
                                        ?>
                                    </li>
                                    <li class= "<?php echo (!empty($this->params['action']) && ($this->params['action']=='cricket') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'Cricket',
                                            array(
                                                
                                                'action'=>'cricket'
                                                )
                                            );
                                        ?>
                                    </li>
                                    <li class= "<?php echo (!empty($this->params['action']) && ($this->params['action']=='football') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'Football',
                                            array(
                                                
                                                'action'=>'football'
                                                )
                                            );
                                        ?>
                                    </li>
                                    <li class= "<?php echo (!empty($this->params['action']) && ($this->params['action']=='tennis') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'Tennis',
                                            array(
                                                
                                                'action'=>'tennis'
                                                )
                                            );
                                        ?>
                                    </li>
                                    <li class= "<?php echo (!empty($this->params['action']) && ($this->params['action']=='other_sports') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'Other Sports',
                                            array(
                                                
                                                'action'=>'other_sports'
                                                )
                                            );
                                        ?></li>
                                </ul>
                            </li>
                            <li class="dropdown <?php echo (!empty($this->params['action']) && 
                            ($this->params['action']=='entertainment') || ($this->params['action']=='tv') || ($this->params['action']=='film') || ($this->params['action']=='music') || ($this->params['action']=='more_e') )?'active' :'inactive' ?>" >
                                <?php echo $this->Html->link(
                                       'Entertainment <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'entertainment'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                                <ul class="dropdown-menu">
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='entertainment') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'Entertainment',
                                            array(
                                                
                                                'action'=>'entertainment'
                                                )
                                            );
                                        ?>
                                    </li>
                                    <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='tv') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'TV',
                                            array(
                                                
                                                'action'=>'tv'
                                                )
                                            );
                                        ?></li>
                                    <li class=" <?php echo (!empty($this->params['action']) && ($this->params['action']=='film') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'Film',
                                            array(
                                                
                                                'action'=>'film'
                                                )
                                            );
                                        ?></li>
                                    <li class=" <?php echo (!empty($this->params['action']) && ($this->params['action']=='music') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'Music',
                                            array(
                                                
                                                'action'=>'music'
                                                )
                                            );
                                        ?></li>
                                    <li class=" <?php echo (!empty($this->params['action']) && ($this->params['action']=='more_e') )?'active' :'inactive' ?>">
                                        <?php echo $this->Html->link(
                                           'More',
                                            array(
                                                
                                                'action'=>'more_e'
                                                )
                                            );
                                        ?></li>
                                </ul>
                                <li class="dropdown <?php echo (!empty($this->params['action']) && ($this->params['action']=='science_tech') || ($this->params['action']=='science') || ($this->params['action']=='technology') )?'active' :'inactive' ?>">
                                    <?php echo $this->Html->link(
                                       'Sci-Tech <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'science_tech'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                                    <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sci-Tech <b class="caret"></b></a> -->
                                    <ul class="dropdown-menu">
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='science_tech') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Sci-Tech',
                                            array(
                                                
                                                'action'=>'science_tech'
                                                )
                                            );
                                        ?>
                                        </li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='science') )?'active' :'inactive' ?>">
                                         <?php echo $this->Html->link(
                                           'Science',
                                            array(
                                                
                                                'action'=>'science'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='technology') )?'active' :'inactive' ?>">
                                         <?php echo $this->Html->link(
                                           'Technology',
                                            array(
                                                
                                                'action'=>'technology'
                                                )
                                            );
                                        ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown <?php echo (!empty($this->params['action']) && ($this->params['action']=='life') || ($this->params['action']=='fashion') || ($this->params['action']=='food') || ($this->params['action']=='relation') || ($this->params['action']=='auto') || ($this->params['action']=='travel') || ($this->params['action']=='life_ok') )?'active' :'inactive' ?>">
                                    <?php echo $this->Html->link(
                                       'Life <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'life'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                                    <ul class="dropdown-menu">
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='life') )?'active' :'inactive' ?>"> 
                                            <?php echo $this->Html->link(
                                           'Life',
                                            array(
                                                
                                                'action'=>'life'
                                                )
                                            );
                                        ?>
                                        </li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='fashion') )?'active' :'inactive' ?>"> 
                                            <?php echo $this->Html->link(
                                           'Fashion',
                                            array(
                                                
                                                'action'=>'fashion'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='food') )?'active' :'inactive' ?>">

                                            <?php echo $this->Html->link(
                                           'Food',
                                            array(
                                                
                                                'action'=>'food'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='relation') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Relation',
                                            array(
                                                
                                                'action'=>'relation'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='auto') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Auto',
                                            array(
                                                
                                                'action'=>'auto'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='travel') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Travel',
                                            array(
                                                
                                                'action'=>'travel'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='life_ok') )?'active' :'inactive' ?>">

                                            <?php echo $this->Html->link(
                                           'Others',
                                            array(
                                                
                                                'action'=>'life_ok'
                                                )
                                            );
                                        ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown <?php echo (!empty($this->params['action']) && ($this->params['action']=='business') || ($this->params['action']=='economy') || ($this->params['action']=='industry') || ($this->params['action']=='markets') || ($this->params['action']=='business_technology') || ($this->params['action']=='service') || ($this->params['action']=='business_more') )?'active' :'inactive' ?>">
                                    <?php echo $this->Html->link(
                                       'Business <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'business'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                                    <ul class="dropdown-menu">
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='business') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Business',
                                            array(
                                                
                                                'action'=>'business'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='economy') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Economy',
                                            array(
                                                
                                                'action'=>'economy'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='industry') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Industry',
                                            array(
                                                
                                                'action'=>'industry'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='markets') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Markets',
                                            array(
                                                
                                                'action'=>'markets'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='business_technology') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Tech',
                                            array(
                                                
                                                'action'=>'business_technology'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='service') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Service',
                                            array(
                                                
                                                'action'=>'service'
                                                )
                                            );
                                        ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='business_more') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'More',
                                            array(
                                                
                                                'action'=>'business_more'
                                                )
                                            );
                                        ?></li>
                                    </ul>
                                </li>
                                <li class="dropdown <?php echo (!empty($this->params['action']) && ($this->params['action']=='comments') || ($this->params['action']=='opinion') || ($this->params['action']=='interview') || ($this->params['action']=='issues') || ($this->params['action']=='com_more'))?'active' :'inactive' ?>">
                                    <?php echo $this->Html->link(
                                       'Comments <b class="caret"></b>',
                                        array(
                                            
                                            'action'=>'comments'
                                            ),
                                        array(
                                            'data-toggle'=>'dropdown',
                                            'class'=>'dropdown-toggle',
                                            'escape'=>false  //NOTICE THIS LINE ***************
                                        )
                                    );
                                    ?>
                                    <ul class="dropdown-menu">
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='comments') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Comments',
                                            array(
                                                    
                                                    'action'=>'comments'
                                                    )
                                                );
                                            ?>
                                        </li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='opinion') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Opinion',
                                            array(
                                                    
                                                    'action'=>'opinion'
                                                    )
                                                );
                                            ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='interview') )?'active' :'inactive' ?>">

                                            <?php echo $this->Html->link(
                                           'Interview',
                                            array(
                                                    
                                                    'action'=>'interview'
                                                    )
                                                );
                                            ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='issues') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'Issues',
                                            array(
                                                    
                                                    'action'=>'issues'
                                                    )
                                                );
                                            ?></li>
                                        <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='com_more') )?'active' :'inactive' ?>">
                                            <?php echo $this->Html->link(
                                           'More',
                                            array(
                                                    
                                                    'action'=>'com_more'
                                                    )
                                                );
                                            ?></li>
                                    </ul>
                                </li>
                            
                            
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

