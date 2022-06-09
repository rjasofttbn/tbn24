
<?php

/**
 * 
 */
class Menu extends AppModel {

    var $name = "menu";
    
    public $validate = array(
        'name' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This menu already exist'
        )
    );

}

?>