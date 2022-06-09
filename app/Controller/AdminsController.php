<?php

/**
 * 
 */
App::uses('AppController', 'Controller');

class AdminsController extends AppController {

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

    function register() {
        $admins = $this->Auth->user();
        if ($admins['Role']['name'] != 'sadmin') {
            $this->layout = "registration";
        }
        $this->loadModel('User');
        $this->loadModel('Role');
        if ($this->request->is('post')) {
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                $this->User->save($this->request->data['User']);
                $msg = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> User registration succeesfull </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('register');
            } else {
                $msg = $this->generateError($this->User->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('roles', $this->Role->find("list"));
    }

    function login() {
        $this->loadModel('User');
        $this->layout = "admin-login";
        // if already logged in check this step
        if ($this->Auth->loggedIn()) {
            return $this->redirect('dashboard'); //(array('action' => 'deshboard'));
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
        $this->Session->setFlash('you have successfully logged out');
        $this->Auth->logout();
        return $this->redirect(array('controller' => 'admins', 'action' => 'login'));
    }
    
    function addMenu(){
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
                return $this->redirect('insert_menu');
            } else {
                $msg = $this->generateError($this->Menu->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
    }
    
    function editMenu (){
        $this->loadModel('Menu');
        
        if ($this->request->is('post')) {
            $this->Menu->set($this->request->data);
            $this->Menu->id=$this->request->data['Menu'];
            if ($this->Menu->validates()) {
//                pr ($this->request->data);
//                exit();
                $this->Menu->save($this->request->data['Menu']);
                $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> Menu update succeesfully </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editmenu');
            }
            else {
                $msg = $this->generateError($this->Menu->validationErrors);
                $this->Session->setFlash($msg);
            }
        } 
        $this->set('Menus', $this->Menu->find("list"));
        
    }
    
    function addSubMenu(){
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
                return $this->redirect('insert_sub_menu');
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
            $admin = $this->Auth->user();
            $this->SubMenu->set($this->request->data);
//              pr($this->request->data);
//                                exit();
            if ($this->SubMenu->validates()) {
                $this->request->data['SubMenu']['menu_id'] = $admin['id'];

                $this->SubMenu->save($this->request->data['SubMenu'], array('validate' => true));
                // $this->MyModel->saveAll($data, array('validate' => true));
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Sub menu updated succeesfully </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editsubmenu');
            } else {
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Sub menu already exist </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editsubmenu');
            }
        }
        $this->set('Menus', $this->Category->find("list"));
        $this->set('SubMenu', $this->News->find("list"));
    }

    function dashboard() {
        
    }

    function role() {
        $this->loadModel('Role');
        if ($this->request->is('post')) {
            $this->Role->set($this->request->data);
            if ($this->Role->validates()) {
                $this->Role->save($this->request->data['Role']);
                $msg = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Role added succeesfull </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('role');
            } else {
                $msg = $this->generateError($this->Role->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
    }

    public function editrole() {
        $this->loadModel('Role');
     
        if ($this->request->is('post')) {
            $this->Role->set($this->request->data);
            $this->Role->id=$this->request->data['Role'];
            if ($this->Role->validates()) {
                $this->Role->save($this->request->data['Role']);
                $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> Role update succeesfully </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editrole');
            }
            else {
                $msg = $this->generateError($this->Role->validationErrors);
                $this->Session->setFlash($msg);
            }
        } 
        $this->set('roles', $this->Role->find("list"));
    }

    function manage_user() {
        $this->loadModel('User');
        $users = $this->User->find('all');
        $this->set(compact('users'));
//        pr($users);
//        exit;
    }

    function emailsetting() {
        $this->loadModel('Setting');
        if ($this->request->is('post')) {
            $this->Setting->set($this->request->data);
            if ($this->Setting->validates()) {
                $this->request->data['Setting']['field'] = 'email';
                $this->Setting->save($this->request->data['Setting']);
                $msg = '<div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong> Email Insert succeesfully </strong>
   </div>';
            } else {
                $msg = $this->generateError($this->Setting->validationErrors);
            }
            $this->Session->setFlash($msg);
        }
    }

    public function edituser($id = NULL) {
        $this->loadModel('User');
        $this->loadModel('Role');

        $user = $this->User->findById($id);

        if ($this->request->is('put')) {
//             pr($this->request->data);
//             exit();

            $this->User->save($this->request->data['User']);
            $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> User update succeesfully </strong>
			</div>';
            $this->Session->setFlash($msg);
            return $this->redirect('manage_user');
        } else {
            $this->request->data = $user;
        }
        $this->set('roles', $this->Role->find("list"));
    }

    function blockuser($id = null) {
        $this->loadModel('User');
        $this->User->id = $id;
        $this->User->saveField("status", "blocked");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> User block succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_user');
    }

    function activeuser($id = null) {
        $this->loadModel('User');
        $this->User->id = $id;
        $this->User->saveField("status", "active");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> User active Successfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_user');
    }

    function deleteuser($id = null) {
        $this->loadModel('User');
        $this->User->id = $id;
        $this->User->delete($this->request->data('User.id'));
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> User deleted Successfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_user');
    }

    function insert_news1() {
        $this->layout = "news";
        $this->loadModel('News');
        $this->loadModel('Category');
        if ($this->request->is('post')) {
            if (move_uploaded_file($this->request->data['News']['image_url']['tmp_name'], WWW_ROOT . 'media/' . $this->request->data['News']['image_url']['name'])) {
                // echo "File uploaded Successfully";

                pr($this->request->data);
                exit();
                $this->request->data['News']['image_url'] = $this->request->data['News']['image_url']['name'];
            }

            $this->News->save($this->request->data['News']);
            $msg = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> News insert succeesfully </strong>
            </div>';
            $this->Session->setFlash($msg);
            return $this->redirect('insert_news');
        }
        $this->set('categories', $this->Category->find("list"));
    }

    function manage_newses() {
        $this->loadModel('News');
         $newses = $this->News->find('all');
        $this->set(compact('newses'));
        
       
    }

//    public function editnews($newsid = null) {
//        $this->layout = "news";
//        $this->loadModel('News');
//        $this->loadModel('Category');
//        $this->News->id = $newsid;
//        if ($this->request->is('get')) {
//            $this->request->data = $this->News->read(); //data read from database
//
//            $data1 = $this->News->findById($newsid); //delete image from database start
//            $this->request->data = $data1;
//            $directory = WWW_ROOT . 'media';
//            if (unlink($directory . DIRECTORY_SEPARATOR . $data1['News']['image_url'])) { //delete image from root and database
//                echo 'image deleted.....';
//            }
//        } else {
//            $data = $this->request->data;   //new data insert start         
//
//            if (move_uploaded_file($data['News']['image_url']['tmp_name'], WWW_ROOT . 'media/' . $data['News']['image_url']['name'])) {//new image upload
//                $data['News']['image_url'] = $data['News']['image_url']['name'];
//            }
//            if ($this->News->save($data)) {
//                $msg = '<div class="alert alert-success">
//            <button type="button" class="close" data-dismiss="alert">&times;</button>
//           <strong> News update successfully </strong>
//          </div>';
//                $this->Session->setFlash($msg);
//                $this->redirect(array('controller' => "admins", "action" => "manage_newses"));
//            } else {
//                $this->Session->setFlash("not updated");
//                $this->render();
//            }
//        }
//        if (!$this->request->data) {
//            $data = $this->News->findById($newsid);
//            $this->request->data = $data;
//        }
//        $this->set('categories', $this->Category->find("list"));
//    }

    public function editnews1($newsid = null) {
        $this->layout = "news";
        $this->loadModel('News');
        $this->loadModel('Category');
        $this->News->id = $newsid;
        if ($this->request->is('get')) {
            $this->request->data = $this->News->read(); //data read from database

            $data1 = $this->News->findById($newsid); //delete image from database start
            $this->request->data = $data1;
            $directory = WWW_ROOT . 'media';
            if (unlink($directory . DIRECTORY_SEPARATOR . $data1['News']['image_url'])) { //delete image from root and database
                echo 'image deleted.....';
            }
        } else {
            $data = $this->request->data;   //new data insert start         

            if (move_uploaded_file($data['News']['image_url']['tmp_name'], WWW_ROOT . 'media/' . $data['News']['image_url']['name'])) {//new image upload
                $data['News']['image_url'] = $data['News']['image_url']['name'];
            }
            if ($this->News->save($data)) {
                $msg = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong> News update successfully </strong>
          </div>';
                $this->Session->setFlash($msg);
                $this->redirect(array('controller' => "admins", "action" => "manage_newses"));
            } else {
                $this->Session->setFlash("not updated");
                $this->render();
            }
        }
        if (!$this->request->data) {
            $data = $this->News->findById($newsid);
            $this->request->data = $data;
        }
        $this->set('categories', $this->Category->find("list"));
    }
    
    function blocknews1($id = null) {
        $this->loadModel('News');
        $this->News->id = $id;
        $this->News->saveField("status", "blocked");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News block succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_newses');
    }

    function activenews1($id = null) {
        $this->loadModel('News');
        $this->News->id = $id;
        $this->News->saveField("status", "active");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News active succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_newses');
    }

    function deletenews1($id = null) {
        $this->loadModel('News');
        $this->News->id = $id;
        $this->News->delete($this->request->data('News.id'));
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News deleted succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_newses');
    }

    function senior_editor1($id = null) {
        $this->loadModel('News');
        $this->loadModel('Category');
        $categories = $this->Category->find('list');
        if ($id) {
            $news = $this->News->find('all', array(
                'conditions' => array('News.category_id' => $id)));
            $this->set(compact('news', 'categories'));
        } else {
            $news = $this->News->find('all');
            $this->set(compact('news', 'categories'));
        }
    }

    function senior_editor_activenews1($id = null) {
        $this->loadModel('News');
        $this->News->id = $id;
        $this->News->saveField("status", "active");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News active succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('senior_editor');
    }

    function senior_editor_blocknews1($id = null) {
        $this->loadModel('News');
        $this->News->id = $id;
        $this->News->saveField("status", "blocked");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News block succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('senior_editor');
    }

    function view_news_category_wise1() {
        $senior_editor = $this->Newses->find('category_id');
        $this->set(compact('senior_editor'));
    }

    function chief_editor1($id = null) {
        $this->loadModel('News');
        $this->loadModel('Category');
        $categories = $this->Category->find('list');
        if ($id) {
            $news = $this->News->find('all', array(
                'conditions' => array('News.category_id' => $id)));
            $this->set(compact('news', 'categories'));
        } else {
            $news = $this->News->find('all');
            $this->set(compact('news', 'categories'));
        }
    }

    function chief_editor_activenews1($id = null) {
        $this->loadModel('News');
        $this->News->id = $id;
        $this->News->saveField("status", "active");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News active succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('chief_editor');
    }

    function chief_editor_blocknews1($id = null) {
        $this->loadModel('News');
        $this->News->id = $id;
        $this->News->saveField("status", "blocked");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News block succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('chief_editor');
    }

}

?>