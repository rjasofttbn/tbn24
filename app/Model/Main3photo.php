
<?php

/**
 * 
 */
class Main3Photo extends AppModel {

    var $name = "main3photo";
    var $belongsTo = array('Category');
    public $validate = array(
        'news_id' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'This photo already exist'
        )
    );

}

?>