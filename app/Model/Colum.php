<?php

class Column extends AppModel {

    var $name = "column";
    public $validate = array(
        'name' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This column name already exist'
        )
    );

}

?>