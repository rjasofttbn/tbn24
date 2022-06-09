<?php

/**
 * 
 */
class AdminsController extends AppController {

    var $layout = 'admin';

    public function beforeFilter() {
        parent::beforeFilter();
        $user=$this->Auth->user();
        $sidebar = $user['Role']['name'];
        pr($sidebar); exit;
        $this->set(compact('sidebar'));
    }

    public function isAuthorized($user = null) {

        return true;
    }
    function login() {
        $this->loadModel('Admin');
        $this->layout = "admin-login";
        // if already logged in check this step
        if ($this->Auth->loggedIn()) {
            return $this->redirect('deshboard'); //(array('action' => 'deshboard'));
        }
        // after submit login form check this step
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Auth->user('status') == 'active') {
                    // user is activated
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    // user is not activated
                    // log the user out
                    $msg = '<div class="alert alert-error">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>You are blocked, Contact with Adminstrator</strong>
                        </div>';
                    $this->Session->setFlash($msg);
                    return $this->redirect($this->Auth->logout());
                }
            } else {
                $msg = '<div class="alert alert-error">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Incorrect email/password combination. Try Again</strong>
                        </div>';
                $this->Session->setFlash($msg);
            }
        }
    }

    public function logout() {
        // $user = $this->Auth->user();
        // $this->Session->destroy();

        $this->Session->setFlash('you have successfully logged out');
        $this->Auth->logout();
        return $this->redirect(array('controller' => 'admins', 'action' => 'login'));
    }

    function deshboard() {
        
    }

    function create(){
        $this->loadModel('User');
        $this->loadModel('Role');
        if ($this->request->is('post')) {
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                //$this->request->data['User']['password'] = md5($this->request->data['User']['password']);
                $this->User->save($this->data);
                $msg = '<div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong> User Created succeesfully </strong>
   </div>';
            } else {
                $msg = $this->generateError($this->User->validationErrors);
            }
            $this->Session->setFlash($msg);
            // return $this->redirect('create');
        }
        $this->set('roles', $this->Role->find("list"));
    }

    function manage() {
        $this->loadModel('User');
        $users = $this->User->find('all');
        $this->set(compact('users'));
    }

    function edit($id = null) {
        $this->loadModel('User');
        $this->loadModel('Role');
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $this->request->data['User']['id'];
            $this->User->save($this->request->data['User']);
            $msg = '<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong> Agent updated succeesfully </strong>
	</div>';
            $this->Session->setFlash($msg);
            $this->set('roles', $this->Role->find("list"));
        }
        if (!$this->request->data) {
            $data = $this->User->findById($id);
            $this->request->data = $data;
            $this->set('roles', $this->Role->find("list"));
        }
    }

    function delete($id) {
        $this->loadModel('User');
        $this->User->delete($id);
        $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> User deleted succeesfully </strong>
			</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage');
    }

    function block($id) {
        $this->loadModel('User');
        $this->User->id = $id;
        $this->User->saveField("status", "blocked");
        $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> User blocked succeesfully </strong>
			</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage');
    }

    function active($id) {
        $this->loadModel('User');
        $this->User->id = $id;
        $this->User->saveField("status", "active");
        $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> User activated succeesfully </strong>
			</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage');
    }

    function junioredit() {
        //var $layout = 'news';
        $this->layout = "news";
        $this->loadModel('Newses');
        $this->loadModel('Category');
        //$this->TinyMCE->editor('advanced');
        //$this->Tinymce->input($Model.fieldName, $options = array(), $tinyoptions = array(), $preset = null)
//        $this->request->clientIp();

        if ($this->request->is('post')) {
            $this->Newses->save($this->request->data['Newses']);
            $msg = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> News Insert succeesfully </strong>
            </div>';
            $this->Session->setFlash($msg);
            return $this->redirect('junioredit');
        }

        $this->set('categories', $this->Category->find("list"));
    }

    function newses() {
        $this->layout = "news";
        $this->loadModel('Newses');
        $newses = $this->Newses->find('all');

        $this->set(compact('newses'));
    }

}

?>