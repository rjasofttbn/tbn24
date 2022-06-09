
<div class="span8">
    
  
    <div class="row-fluid">
        <div class="span7">
            <div class="row-fluid">
                <div class="span12">
            <div class="box hover">                                

                        <?php
                        foreach ($priority_three_news as $single):
                            ?>
                            <div class="content"> 
                                <a href="#"><img  src="<?php echo $this->webroot . 'newsImages' . '/' . $single['news']['image_url']; ?>"/> 
                                    <p></p><h2><?php echo substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 31)); ?></h2>
                                </a>
                                <hr>
                                <?php 
                                 if (strlen($single["news"]["details"]) > 211) {
                                    $output1 = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 211));
                                    
                                    if (empty($output1)) {
                                         $output = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 200));

                                    }
                                     else {
                                        $output = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 211));

                                     }
                                                          
                                   
                                }
                                else {
                                    $output = $single["news"]["details"];
                                }
                                echo $output;



                                 
                                ?>                               
                                </div>
                            <?php
                        endforeach;
                        ?>

            </div>
                </div>
            </div>
            <div class="row-fluid">
                <?php
                foreach ($priority_two_news as $single):
                    ?>
                    <div class="span6">
                        <div class="box hover">
                            <div class="content">
                                <img class="myimage" src="<?php echo $this->webroot . 'newsImages' . '/' . $single['news']['image_url']; ?>" />
                                <p></p><a href="#"><h3><?php
                                        
                                       
                                        $output = $single["news"]["title"];
                                        if (strlen($single["news"]["title"]) > 20) {
                                            $output1 = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 20));
                                            
                                            if (empty($output1)) {
                                                 $output = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 12));

                                            }
                                             else {
                                                $output = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 20));

                                             }
                                                                  
                                           
                                        }
                                        else {
                                            $output = $single["news"]["title"];
                                        }

                                                          
                                      
                                
                                        echo $output;
                                        ?></h3></a>
                                <hr>
                                <p style="text-align: justify;">

                                    <?php 
                                     $output = $single["news"]["details"];
                                     if (strlen($single["news"]["details"]) > 111) {
                                            $output1 = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 111));
                                            
                                            if (empty($output1)) {
                                                 $output = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 100));

                                            }
                                             else {
                                                $output = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 111));

                                             }
                                                                  
                                           
                                        }
                                        else {
                                            $output = $single["news"]["details"];
                                        }
                                         echo $output;



                                    // echo substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 111)); 
                                    ?>                               
                                    ... </p>   
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>    

                <?php
                foreach ($priority_one_news as $single):
                    ?>
                    <div class="span6">
                        <div class="box hover">
                            <div class="content">
                                <img class="myimage" src="<?php echo $this->webroot . 'newsImages' . '/' . $single['news']['image_url']; ?>" />
                                <p></p><a href="#"> <h3><?php
                                        $output = $single["news"]["title"];
                                        if (strlen($single["news"]["title"]) > 20) {
                                            $output = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 20));
                                        }
                                        echo $output;
                                        ?></h3></a>
                                <hr>
                                <p style="text-align: justify;">  
                                    <?php
                                    $output = $single["news"]["details"];
                                     if (strlen($single["news"]["details"]) > 111) {
                                            $output1 = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 111));
                                            
                                            if (empty($output1)) {
                                                 $output = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 100));

                                            }
                                             else {
                                                $output = substr($single["news"]["details"], 0, strpos($single["news"]["details"], ' ', 111));

                                             }
                                                                  
                                           
                                        }
                                        else {
                                            $output = $single["news"]["details"];
                                        }
                                         echo $output;  
                                         ?>                           
                                    </p> 
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?> 
            </div>
            
        </div>
        <div class="span5">
            <div class="box">

                               

                                <div class="content">


                                    <?php
                                    foreach ($more_news as $single):
                                        ?>
                                        <div class="page-header">
                                            <div class="row">

                                                <div class="span4">
                                                    <div class="" id="mainstory">
                                                        <img  src="<?php echo $this->webroot . 'newsImages' . '/' . $single['news']['image_url']; ?>" /> 
                                                    </div>
                                                </div>
                                                <div class="span8">
                                                    <a href="#">      <span class="newstitle"><?php
                                                            $output = $single["news"]["title"];
                                                            if (strlen($single["news"]["title"]) > 20) {
                                                                $output1 = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 20));
                                                                
                                                                if (empty($output1)) {
                                                                     $output = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 12));

                                                                }
                                                                 else {
                                                                    $output = substr($single["news"]["title"], 0, strpos($single["news"]["title"], ' ', 20));

                                                                 }
                                                                                      
                                                               
                                                            }
                                                            else {
                                                                $output = $single["news"]["title"];
                                                            }

                                                            echo $output;
                                                            ?></span>  </a>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                    ?> 
                                    
                                    <p><a href="#">More<i class="entypo-icon-arrow-17" style="margin-left: 0px;"></i></a></p>
                                </div>

                            </div>
            
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





</div>





