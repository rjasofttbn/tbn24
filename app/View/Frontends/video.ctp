<div class="span8">
    <div class="row-fluid">
        <?php foreach ($main_video as $video): ?>
            <div class="span6">

                <div class="box">
                    <div class="content">
                        <img class="myimage" src="<?php echo $this->webroot . 'newsImages' . '/' . $video['n']['image_url']; ?>"/>
                        <a href="#"> <p><?php
                                $output = $video["n"]["title"];
                                if (strlen($video["n"]["title"]) > 20) {
                                    $output = substr($video["n"]["title"], 0, strpos($video["n"]["title"], ' ', 20));
                                }
                                echo $output;
                                ?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row-fluid">
        <?php foreach ($main_3_video as $main3video):
            ?>
            <div class="span4">
                <div class="box">
                    <div class="content">
                        <div class="center" id="mainstory">

                            <img style="height: 124px;" class="myimage" src="<?php echo $this->webroot . 'newsImages' . '/' . $main3video['n']['image_url']; ?>"/>

                            <a href="#"> <p><?php
                                    $output = $main3video["n"]["title"];
                                    if (strlen($main3video["n"]["title"]) > 20) {
                                        $output = substr($main3video["n"]["title"], 0, strpos($main3video["n"]["title"], ' ', 20));
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

    



