<?php

class Photogallery extends AppModel {

    var $name = "photogallery";
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