<?php

/**
 * 
 */
App::uses('AppController', 'Controller');
require_once(APP . 'Vendor' . DS . 'class.upload.php');

class NewsController extends AppController {

    var $layout = 'admin';

    public function beforeFilter() {
        parent::beforeFilter();
        // database name must be thum_img,small_img
        $this->img_config = array(
            'image_url' => array(
                'image_ratio_crop' => true,
                'image_resize' => true,
                'image_x' => 421,
                'image_y' => 295
            ),
            'parent_dir' => 'newsImages',
            'target_path' => array(
                'image_url' => WWW_ROOT . 'newsImages' . DS
            )
        );


        // create the folder if it does not exist
        if (!is_dir($this->img_config['parent_dir'])) {
            mkdir($this->img_config['parent_dir']);
        }
        foreach ($this->img_config['target_path'] as $img_dir) {
            if (!is_dir($img_dir)) {
                mkdir($img_dir);
            }
        }


        $this->video_config = array(
            'news_video_url' => array(
                'video_ratio_crop' => true,
                'video_resize' => true,
                'video_x' => '',
                'video_y' => ''
            ),
            'parent_dir' => 'newsVideos',
            'target_path' => array(
                'news_video_url' => WWW_ROOT . 'newsVideos' . DS
            )
        );
        // create the folder if it does not exist
        if (!is_dir($this->video_config['parent_dir'])) {
            mkdir($this->video_config['parent_dir']);
        }
        foreach ($this->video_config['target_path'] as $Video_dir) {
            if (!is_dir($Video_dir)) {
                mkdir($Video_dir);
            }
        }



        // Allow users to register and logout.
        $this->Auth->allow('index', 'forgotpassword');
        $admins = $this->Auth->user();
        // pr($sidebar); exit;
        $isSamdin = false;
        if ($admins['Role']['name'] == 'sadmin') {
            $isSamdin = true;
        }
        $sidebar = $admins['Role']['name'];
        $this->set(compact('sidebar', 'isSamdin'));

        $this->loadModel('Category');

        $this->set('categories', $this->Category->find('list'));
    }

    function unpublishednews($id = null) {

        $this->News->id = $id;
        $this->News->saveField("status", "unpublished");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News unpublished succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_news');
    }

    function publishednews($id = null) {
        $this->News->id = $id;
        $this->News->saveField("status", "published");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News published succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_news');
    }

    function processImg($img) {
        // pr($img); exit;
        $upload = new Upload($img['image_url']);
        $upload->file_new_name_body = time();
        foreach ($this->img_config['image_url'] as $key => $value) {
            $upload->$key = $value;
        }
        $upload->process($this->img_config['target_path']['image_url']);
        if (!$upload->processed) {
            $msg = $this->generateError($upload->error);
            return $this->redirect('insert_news');
        }
        $return['file_dst_name'] = $upload->file_dst_name;
        return $return;
    }

    function category() {
        $this->loadModel('Category');
        if ($this->request->is('post')) {
            $this->Category->set($this->request->data);
            if ($this->Category->validates()) {
                $this->Category->save($this->request->data['Category']);
                $msg = '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong> Category added succeesfull </strong>
   </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('category');
            } else {
                $msg = $this->generateError($this->Category->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
    }

    public function editcategory() {
        $this->loadModel('Category');
        if ($this->request->is('post')) {
            $this->Category->set($this->request->data);
            $this->Category->id = $this->request->data['Category'];
            if ($this->Category->validates()) {
                $this->Category->save($this->request->data['Category']);
                $msg = '<div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong> Category update succeesfully </strong>
   </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editcategory');
            } else {
                $msg = $this->generateError($this->Category->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('category', $this->Category->find("list"));
    }

    function processvideo($video) {
        // pr($img); exit;
        $upload = new Upload($video['news_video_url']);
        $upload->file_new_name_body = time();
//        foreach (is_array($this->video_config['news_video_url']) as $key => $value) {
//            $upload->$key = $value;
//        }


        $upload->process($this->video_config['target_path']['news_video_url']);
        if (!$upload->processed) {
            $msg = $this->generateError($upload->error);
            return $this->redirect('insert_news');
        }
        $return['file_dst_name'] = $upload->file_dst_name;
        return $return;
    }

    public function isAuthorized($user = null) {
        return true;
    }

    function insert_news() {
        $this->loadModel('News');
        $this->loadModel('Category');
        if ($this->request->is('post') || $this->request->is('put')) {
            $result = array();
            $result_video = array();
            $result = $this->processImg($this->request->data['News']);
            $this->request->data['News']['image_url'] = $result['file_dst_name'];


            if (!empty($this->request->data['News']['news_video_url'])) {
//                pr(here);                exit();
                $result_video = $this->processvideo($this->request->data['News']);
                $this->request->data['News']['news_video_url'] = $result_video['file_dst_name'];
            }


            $admin = $this->Auth->user();
            $this->request->data['News']['user_id'] = $admin['id'];

//            pr($this->request->data);
//            exit(); 

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

    function manage_news() {
//        pr($this->Auth->user());
        $admin = $this->Auth->user();
        $role = $admin['Role']['name'];
        $newses = $this->News->find('all');
        // pr($newses); exit;
        $this->set(compact('newses', 'role'));
    }

    public function editnews($newsid = null) {
        $this->layout = "news";

        $this->loadModel('News');
        $this->loadModel('Category');
        $this->News->id = $newsid;
        $newses = $this->News->findById($newsid);
        $this->set(compact('newses'));

        if ($this->request->is('get')) {
            $this->request->data = $this->News->read(); //data read from database
            //delete image from database start
            //  $this->request->data = $data1;
        } else {
            $data = $this->request->data;   //new data insert start  
            $image = $data['News']['image_url'];
            $data1 = $this->News->findById($newsid);
            $directory = WWW_ROOT . 'newsImages';
            if (!empty($data['News']['image_url']['name'])) {

                if (move_uploaded_file($data['News']['image_url']['tmp_name'], WWW_ROOT . 'newsImages/' . $data['News']['image_url']['name'])) {//new image upload
                    $data['News']['image_url'] = $data['News']['image_url']['name'];
                }
                if (unlink($directory . DIRECTORY_SEPARATOR . $data1['News']['image_url'])) { //delete image from root and database
                    echo 'image deleted.....';
                }


                # code...
            } else {
                $data['News']['image_url'] = $data1['News']['image_url'];
            }
            if ($this->News->save($data)) {
                $msg = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong> News update successfully </strong>
          </div>';
                $this->Session->setFlash($msg);
                $this->redirect(array('controller' => "news", "action" => "manage_news"));
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

    function blocknews($id = null) {

        $this->News->id = $id;
        $this->News->saveField("status", "blocked");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News block succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_newses');
    }

    function activenews($id = null) {

        $this->News->id = $id;
        $this->News->saveField("status", "active");
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News active succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_newses');
    }

    function deletenews($id = null) {

        $this->News->id = $id;
        $this->News->delete($this->request->data('News.id'));
        $msg = '<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong> News deleted succeesfully </strong>
</div>';
        $this->Session->setFlash($msg);
        return $this->redirect('manage_newses');
    }

    function breaking_news() {
        $this->loadModel('News');
        $this->loadModel('Category');
        $this->loadModel('BreakingNews');

        if ($this->request->is('post')) {
            $admin = $this->Auth->user();
            $this->BreakingNews->set($this->request->data);
//              pr($this->request->data);
//                                exit();
            if ($this->BreakingNews->validates()) {
                $this->request->data['BreakingNews']['user_id'] = $admin['id'];

                $this->BreakingNews->save($this->request->data['BreakingNews'], array('validate' => true));
                // $this->MyModel->saveAll($data, array('validate' => true));
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Breaking News updated succeesfully </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('manage_news');
            } else {
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Breaking News already exist </strong>
                    </div>';
                $this->Session->setF - lash($msg);
                return $this->redirect('breaking_news');
            }
        }
        $this->set('categories', $this->Category->find("list"));
        $this->set('news', $this->News->find("list"));
    }

    function main_photo() {
        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('MainPhoto');

        if ($this->request->is('post')) {
            $this->MainPhoto->set($this->request->data);
//            if ($this->SubMenu->validates()) {
//                pr($this->request->data);
//                exit();
            $this->MainPhoto->save($this->request->data['MainPhoto'], array('validate' => true));
            $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Photo selected succeesfully </strong>
                    </div>';
            $this->Session->setFlash($msg);
            return $this->redirect('main_photo');
//            } else {
//                $msg = '<div class="alert alert-success">
//                    <button type="button" class="close" data-dismiss="alert">&times;</button>
//                    <strong> Sub menu already exist </strong>
//                    </div>';
//                $this->Session->setFlash($msg);
//                return $this->redirect('editSubMenu');
//            }
        }

        $category = $this->Category->find('list', array('order' => array('Category.name' => 'ASC')));
        $news = $this->News->find('list', array('fields' => array('id', 'title', 'category_id'), 'order' => array('News.title' => 'ASC')));
        $this->set(compact('category', 'news'));
    }

    function main_2_photo() {

        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('Main2Photo');

        if ($this->request->is('post')) {
            $this->Main2Photo->set($this->request->data);
            if ($this->Main2Photo->validates()) {
//                pr($this->request->data);
//                exit();
                $this->Main2Photo->save($this->request->data['Main2Photo'], array('validate' => true));
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Main photo two selected succeesfully </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('main_2_photo');
            } else {
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Main photo already exist </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('main_2_photo');
            }
        }

        $category = $this->Category->find('list', array('order' => array('Category.name' => 'ASC')));
        $news = $this->News->find('list', array('fields' => array('id', 'title', 'category_id'), 'order' => array('News.title' => 'ASC')));
        $this->set(compact('category', 'news'));
    }

    function main_3_photo() {

        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('Main3Photo');

        if ($this->request->is('post')) {
            $this->Main3Photo->set($this->request->data);
            if ($this->Main3Photo->validates()) {
//                pr($this->request->data);
//                exit();
                $this->Main3Photo->save($this->request->data['Main3Photo'], array('validate' => true));
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Main photo three selected succeesfully </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('main_3_photo');
            } else {
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Main photo already exist </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('main_3_photo');
            }
        }

        $category = $this->Category->find('list', array('order' => array('Category.name' => 'ASC')));
        $news = $this->News->find('list', array('fields' => array('id', 'title', 'category_id'), 'order' => array('News.title' => 'ASC')));
        $this->set(compact('category', 'news'));
    }

    public function add_category_photo() {
        $this->loadModel('Category');
        $this->loadModel('Photogallery');
        if ($this->request->is('post')) {
            $this->Photogallery->set($this->request->data);
            if ($this->Photogallery->validates()) {

                $this->Photogallery->save($this->request->data['Photogallery']);
                $msg = '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong> Category added succeesfull </strong>
   </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('add_category_photo');
            } else {
                $msg = $this->generateError($this->Photogallery->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('category', $this->Category->find("list"));
    }

    function main_video() {

        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('MainVideo');

        if ($this->request->is('post')) {
            $this->MainVideo->set($this->request->data);
//            if ($this->SubMenu->validates()) {
//                pr($this->request->data);
//                exit();
            $this->MainVideo->save($this->request->data['MainVideo'], array('validate' => true));
            $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Video selected succeesfully </strong>
                    </div>';
            $this->Session->setFlash($msg);
            return $this->redirect('main_video');
//            } else {
//                $msg = '<div class="alert alert-success">
//                    <button type="button" class="close" data-dismiss="alert">&times;</button>
//                    <strong> Sub menu already exist </strong>
//                    </div>';
//                $this->Session->setFlash($msg);
//                return $this->redirect('editSubMenu');
//            }
        }

        $category = $this->Category->find('list', array('order' => array('Category.name' => 'ASC')));
        $news = $this->News->find('list', array('fields' => array('id', 'title', 'category_id'), 'order' => array('News.title' => 'ASC')));
        $this->set(compact('category', 'news'));
    }

    function main_3_video() {

        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('Main3Video');

        if ($this->request->is('post')) {
            $this->Main3Video->set($this->request->data);
            if ($this->Main3Video->validates()) {
//                pr($this->request->data);
//                exit();
                $this->Main3Video->save($this->request->data['Main3Video'], array('validate' => true));
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Main video three selected succeesfully </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('main_3_video');
            } else {
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Main video already exist </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('main_3_video');
            }
        }

        $category = $this->Category->find('list', array('order' => array('Category.name' => 'ASC')));
        $news = $this->News->find('list', array('fields' => array('id', 'title', 'category_id'), 'order' => array('News.title' => 'ASC')));
        $this->set(compact('category', 'news'));
    }

    public function add_category_video() {
        $this->loadModel('Category');
        $this->loadModel('Videogallery');
        if ($this->request->is('post')) {
            $this->Videogallery->set($this->request->data);
            if ($this->Videogallery->validates()) {
//                pr($this->request->data);
//                exit();
                $this->Videogallery->save($this->request->data['videogallery']);
                $msg = '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong> Category added succeesfull </strong>
   </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('add_category_video');
            } else {
                $msg = $this->generateError($this->Videogallery->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('category', $this->Category->find("list"));
    }

    function column() {
        $this->loadModel('Column');
        if ($this->request->is('post')) {
            $this->Column->set($this->request->data);
            if ($this->Column->validates()) {
                $this->Column->save($this->request->data['Column']);
                $msg = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Column added succeesfull </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('column');
            } else {
                $msg = $this->generateError($this->Column->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
    }

    public function editcolumn() {
        $this->loadModel('Column');

        if ($this->request->is('post')) {
            $this->Column->set($this->request->data);
            $this->Column->id = $this->request->data['Column'];
            if ($this->Column->validates()) {
                $this->Column->save($this->request->data['Column']);
                $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> Column update succeesfully </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editcolumn');
            } else {
                $msg = $this->generateError($this->Column->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('columns', $this->Column->find("list"));
    }

    function section() {
        $this->loadModel('Section');
        if ($this->request->is('post')) {
            $this->Section->set($this->request->data);
            if ($this->Section->validates()) {
                $this->Section->save($this->request->data['Section']);
                $msg = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Section added succeesfull </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('section');
            } else {
                $msg = $this->generateError($this->Section->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
    }

    public function editsection() {
        $this->loadModel('Section');

        if ($this->request->is('post')) {
            $this->Section->set($this->request->data);
            $this->Section->id = $this->request->data['Section'];
            if ($this->Section->validates()) {
                $this->Section->save($this->request->data['Section']);
                $msg = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong> Section update succeesfully </strong>
			</div>';
                $this->Session->setFlash($msg);
                return $this->redirect('editsection');
            } else {
                $msg = $this->generateError($this->Section->validationErrors);
                $this->Session->setFlash($msg);
            }
        }
        $this->set('sections', $this->Section->find("list"));
    }

    function homesetting() {

        $this->loadModel('Category');
        $this->loadModel('News');
        $this->loadModel('Column');
        $this->loadModel('Section');        
        $this->loadModel('Homesetting');

        if ($this->request->is('post')) {
            $this->Homesetting->set($this->request->data);
            if ($this->Homesetting->validates()) {
//                pr($this->request->data);
//                exit();
                $this->Homesetting->save($this->request->data['Homesetting'], array('validate' => true));
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> News selected succeesfully </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('homesetting');
            } else {
                $msg = '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Main photo already exist </strong>
                    </div>';
                $this->Session->setFlash($msg);
                return $this->redirect('homesetting');
            }
        }
        
        $column = $this->Column->find('list', array('order' => array('Column.id' => 'ASC')));
        $category = $this->Category->find('list', array('order' => array('Category.name' => 'ASC')));
        $news = $this->News->find('list', array('fields' => array('id', 'title', 'category_id'), 'order' => array('News.title' => 'ASC')));
        $section = $this->Section->find('list', array('order' => array('Section.id' => 'ASC')));
        $this->set(compact('category', 'news','column','section'));
    }

}

?>