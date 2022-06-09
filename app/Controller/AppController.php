<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // var $components = array('Auth', 'Session');
    public $components = array(
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'email', //Default is 'username' in the userModel
                        'password' => 'password'  //Default is 'password' in the userModel
                    ),
                    'userModel' => 'User',
                    'passwordHasher' => array(
                        'className' => 'Simple',
                        'hashType' => 'sha256'
                    )
                )
            ),
            'loginAction' => array(
                'controller' => 'admins',
                'action' => 'login'
            ),
            'loginRedirect' => array('controller' => 'admins', 'action' => 'dashboard'),
            'logoutRedirect' => array('controller' => 'admins', 'action' => 'login'),
            'authError' => "You can't acces that page",
            'authorize' => 'Controller'
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('index', 'register');
        
        $this->loadModel('Category');        
        $this->set('categories', $this->Category->find('list'));

    }



    function pr($input = null) {
        echo '<pre>';
        print_r($input);
        echo '</pre>';
    }

    function filter_array($input = null) {
        foreach ($input as $key => $value) {
            // str_replace(find,replace,string,count) 
            $k = str_replace("required", "", $key);
            $k = trim($k);
            $output[$k] = $value;
        }
        return $output;
    }

    function generateError($input = null) {
        $output = '<ul>';
        foreach ($input as $single) {
            foreach ($single as $value) {
                $output.='<li>' . $value . '</li>';
            }
        }
        $output.='</ul>';
        $output = '<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			' . $output . '<strong> Change these things and try again. </strong> </div>';
        return $output;
    }

}
