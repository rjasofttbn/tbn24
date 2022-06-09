
<?php

/**
 * 
 */
App::uses('Security', 'Utility');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    var $belongsTo = array('Role');
    var $name = "user";
    public $validate = array(
        'email' => array(
            'rule' => 'isUnique',
            'required' => true,
            'message' => 'email already exist'
        ),
        'password' => array(
            'rule' => array('minLength', '6'),
            'message' => 'password must be minimum 6 characters long'
        )
    );

   function hashPassword() {
     if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
    }

    function setIP() {
          /* IP address insert */
        $exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
        $hostname = trim($exec); //remove any spaces before and after
        $ip = gethostbyname($hostname); //resolves the hostname using local hosts resolver or DNS
        $this->data['User']['ip'] = $ip;
    }

    function beforeSave($options = array()) {
        $this->hashPassword();
        $this->setIP();
        return true;
    }

}

?>