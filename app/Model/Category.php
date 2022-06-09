
<?php

/**
 * 
 */
class Category extends AppModel {

    var $name = "category";
   // var $belongsTo = array('News');
    public $validate = array(
        'name' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This Category already exist'
        )
    );

}

?>