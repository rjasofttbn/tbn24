<?php

class Videogallery extends AppModel {

    var $name = "videogallery";
    var $belongsTo = array('Category');
    public $validate = array(
        'category_id' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This Category already exist'
        )
    );

}

?>