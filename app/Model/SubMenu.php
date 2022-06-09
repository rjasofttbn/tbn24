
<?php

/**
 * 
 */
class SubMenu extends AppModel {

    var $name = "sub_menu";
    var $belongsTo = array('Menu');
    public $validate = array(
        'name' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This sub menus already exist'
        )
    );

}

?>