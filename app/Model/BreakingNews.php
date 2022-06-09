<?php

/**
 * 
 */
class BreakingNews extends AppModel {

    var $name = "BreakingNews";
    var $belongsTo = array('User', 'Category');
    public $validate = array(
        'category_id' => array(
            'rule' => 'idAndTypeUnique',
            'message' => "Type and ID already exist"
        )
    );

    public function idAndTypeUnique() {
        $existing = $this->find('first', array(
            'conditions' => array(
                'priority' => $this->data[$this->name]['priority'],
                //'news_id' => $this->data[$this->name]['news_id']
                'category_id' => $this->data[$this->name]['category_id']
            )
        ));

        return (count($existing) == 0);
    }

}

?>

