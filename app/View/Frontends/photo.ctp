<div class="span8">
    <div class="row-fluid">
        <div class="span8">
            <div class="box hover">
                <div class="content">

                    <?php
                    foreach ($main_photo as $photo):
                        ?>
                        <img class="myimage" src="<?php echo $this->webroot . 'newsImages' . '/' . $photo['n']['image_url']; ?>">
                        <a href="#"><h2><?php
                                $output = $photo["n"]["title"];
                                if (strlen($photo["n"]["title"]) > 20) {
                                    $output = substr($photo["n"]["title"], 0, strpos($photo["n"]["title"], ' ', 20));
                                }
                                echo $output;
                                ?></h2></a>
                                <!--<p>July 11, 2015</p>-->
                        <p style="text-align: justify;">  
                            <?php
                            $output = $photo["n"]["details"];
                            if (strlen($photo["n"]["details"]) > 111) {
                                $output1 = substr($photo["n"]["details"], 0, strpos($photo["n"]["details"], ' ', 111));

                                if (empty($output1)) {
                                    $output = substr($photo["n"]["details"], 0, strpos($photo["n"]["details"], ' ', 100));
                                } else {
                                    $output = substr($photo["n"]["details"], 0, strpos($photo["n"]["details"], ' ', 111));
                                }
                            } else {
                                $output = $photo["n"]["details"];
                            }
                            echo $output;
                            ?>                           
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="span4">
            <?php foreach ($main_2_photo as $photo_2):
                ?>
                <div class="box">
                    <div class="content">
                        <a href="#">
                            <img class="myimage" src="<?php echo $this->webroot . 'newsImages' . '/' . $photo_2['n']['image_url']; ?>"></a>
                        <a href="#"> <p><?php
                                $output = $photo_2["n"]["title"];
                                if (strlen($photo_2["n"]["title"]) > 20) {
                                    $output = substr($photo_2["n"]["title"], 0, strpos($photo_2["n"]["title"], ' ', 20));
                                }
                                echo $output;
                                ?></p>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div class="row-fluid">

        <?php foreach ($main_3_photo as $photo_3):
            ?>

            <div class="span4">
                <div class="box">
                    <div class="content">
                        <div class="center" id="mainstory">
                            <a href="#">
                                <img class="myimage" src="<?php echo $this->webroot . 'newsImages' . '/' . $photo_3['n']['image_url']; ?>"></a>

                                
                            </a>
                            <a href="#"> <p><?php
                                $output = $photo_3["n"]["title"];
                                if (strlen($photo_3["n"]["title"]) > 20) {
                                    $output = substr($photo_3["n"]["title"], 0, strpos($photo_3["n"]["title"], ' ', 20));
                                }
                                echo $output;
                                ?></p>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php endforeach; ?>

    </div>
    <div class="row-fluid">
        <?php
// pr($filteredMenu); exit;
        $counter = 0;
        foreach ($filteredCategory as $result):
            if (in_array($result['category']['name'], $categoryToBeShown)):
                $counter++;
                // echo $menu; exit;
                if (isset($result['news'])):
                    ?>
                    <?php
                    if ($counter % 2 == 0):
                        ?>
                        <div class="span6" >
                            <?php
                        else:
                            ?>
                            <div class="span6" style="margin-left: 0px;">
                            <?php
                            endif;
                            ?>
                            <div class="box" >
                                <div class="title">
                                    <h4><?php echo $result['category']['name']; ?></h4>
                                </div>
                                <div class="row-fluid">
                                    <?php
//                            for ($i = 0; $i < 4; $i++):
                                    for ($i = 0; $i < 4; $i++):
                                        if (isset($result['news'][$i])):
                                            ?>
                                            <div class="span6" style="margin: 0px; background-color: red; width: 50%;">
                                                <div class="content">
                                                    <div class="center" id="mainstory">

                                                        <a href="#">

                                                            <img class="myimage" style="height: 91px; width: 168px;" src=" <?php echo $this->webroot . 'newsImages' . '/' . $result['news'][$i]['img']; ?>" />
                                                            <p>                                                    
                                                                <?php
                                                                $output = $result['news'][$i]['title'];
                                                                if (strlen($result['news'][$i]['title']) > 19) {
                                                                    $output = substr($result['news'][$i]['title'], 0, strpos($result['news'][$i]['title'], ' ', 11));
                                                                }
                                                                echo $output;
                                                                ?>

                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>                              
                                            </div>
                                            <?php
                                        endif;
                                        ?>
                                        <?php
                                    endfor;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>
                    <?php
                endif;
            endforeach;
            ?>  
        </div>
    </div>




