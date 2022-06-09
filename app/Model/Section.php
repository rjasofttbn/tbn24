<?php

class Section extends AppModel {

    var $name = "section";
    public $validate = array(
        'name' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This section already exist'
        )
    );

}

?>