
<?php

/**
 * 
 */
class Role extends AppModel {

    var $name = "role";
    public $validate = array(
        'name' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This role already exist'
        )
    );

}

?>