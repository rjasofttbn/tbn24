<?php

/**
 * 
 */
App::uses('AppController', 'Controller');

class MenusController extends AppController {

    var $layout = 'admin';

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index', 'forgotpassword');
        $admins = $this->Auth->user();
//         pr($admins); exit;
        $isSadmin = false;
        if ($admins['Role']['name'] == 'sadmin') {
            $isSadmin = true;
        }
        $sidebar = $admins['Role']['name'];
        $this->set(compact('sidebar', 'isSamdin'));
    }

    public function isAuthorized($user = null) {
        return true;
    }

    function addMenu() {
        $this->loadModel('Menu');
        if ($this->request->is('post')) {
            $this->Menu->set($this->request->data);
            if ($this->Menu->validates()) {
                $this->Menu->save($this->request->data['Menu']);
                $msg = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Menu added succeesfull </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect($this->referer());
            } else {
                $msg = $this->generateError($this->Menu->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('Menus', $this->Menu->find("list"));
    }

    function isLooged_in() {
        $this->layout = 'ajax';
        $status = 'NO';
        if (count($this->Auth->user())) {
            $admin = $this->Auth->user();
            if ($admin['Role']['name'] == 'customer') {
                $status = 'YES';
            }
        }
        echo $status . ',' . $this->Session->read('lastUrl');
        exit;
    }

    function editMenu() {
        $this->loadModel('Menu');

        if ($this->request->is('post')) {
            $this->Menu->set($this->request->data);
            $this->Menu->id = $this->request->data['Menu'];
            if ($this->Menu->validates()) {
                $this->Menu->save($this->request->data['Menu']);
                $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> Menu update succeesfully </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect($this->referer());
            } else {
                $msg = $this->generateError($this->Menu->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('Menus', $this->Menu->find("list"));
    }

    function addSubMenu() {
        $this->loadModel('Menu');
        $this->loadModel('SubMenu');
        if ($this->request->is('post')) {
            $this->SubMenu->set($this->request->data);
            if ($this->SubMenu->validates()) {
//                pr($this->request->data);
//                exit();
                $this->SubMenu->save($this->request->data['Sub_menus']);
                $msg = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Sub menu added succeesfull </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('addSubMenu');
            } else {
                $msg = $this->generateError($this->SubMenu->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('menus', $this->Menu->find("list"));
    }

    function editSubMenu() {
        $this->loadModel('Menu');
        $this->loadModel('SubMenu');

        if ($this->request->is('post')) {
            $this->SubMenu->set($this->request->data);
            if ($this->SubMenu->validates()) {
//                pr($this->request->data);
//                exit();
                $this->SubMenu->save($this->request->data['SubMenu'], array('validate' => true));
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Sub menu updated succeesfully </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editSubMenu');
            } else {
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Sub menu already exist </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editSubMenu');
            }
        }

        $menus = $this->Menu->find('list', array('order' => array('Menu.name' => 'ASC')));
        $sub_menus = $this->SubMenu->find('list', array('fields' => array('id', 'name', 'menu_id'), 'order' => array('SubMenu.name' => 'ASC')));
        $this->set(compact('menus', 'sub_menus'));
    }

}

?>