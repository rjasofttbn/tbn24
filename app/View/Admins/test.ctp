public function manager_edit($newsid = null) {
$this->Newsletter->id = $newsid; 
if ($this->request->is('get')) { 

$this->set('campaigns',  $this->Campaign->find('all',array('fields' => 'name')));
$this->request->data = $this->Newsletter->read();
//debug($this->Campaign->find('all',array('fields' => array('Campaign.name'))));
//die;
} else {
$data = $this->request->data;
$data['Newsletter']['campaigns'] = json_encode($data['Newsletter']['campaigns']);
//files 
if($this->request->data['Images']){
$fileOK = $this->uploadFiles('newsletter', $this->request->data['Images']);
if(!array_key_exists('urls', $fileOK)) {
$this->Session->setFlash("File error");
//debug($fileOK);
}
} 
//$this->Newsletter->Behaviors->attach('Mongodb.SqlCompatible');
if ($this->Newsletter->save($data)) { 
$this->Session->setFlash("Newsletter angelegt");
$this->redirect(array('manager' => true, 'controller' => "newsletters", "action" => "manager_index"));
} else {
$this->Session->setFlash("Newsletter konnte nicht angelegt werden");
$this->render();
}
} 
}


//delete image from database start
$file = new File((datalink($data['News']['image_url']['tmp_name'], WWW_ROOT . 'media/' . $data['News']['image_url']['name'])));
pr($file);
exit();
if ($file->delete()) {
echo 'image deleted.....';
}
//delete image from database end

public function editnews($newsid = null) {
$this->layout = "news";
$this->loadModel('News');
$this->loadModel('Category');
$this->News->id = $newsid;
if ($this->request->is('get')) {
$this->request->data = $this->News->read(); //data read from database
} else {
$data = $this->request->data;   //new data insert start         

if (move_uploaded_file($data['News']['image_url']['tmp_name'], WWW_ROOT . 'media/' . $data['News']['image_url']['name'])) {//new image upload
if (!$data) {
//                    pr($data);
//                    exit();
//delete image from database start
$data1 = $this->News->findById($newsid);
$this->request->data = $data1;
$directory = WWW_ROOT . 'media';
if (unlink($directory . DIRECTORY_SEPARATOR . $data1['News']['image_url'])) { //delete image from root and database
echo 'image deleted.....';  //success message
}
//delete image from database end
}

$data['News']['image_url'] = $data['News']['image_url']['name'];
}

if ($this->News->save($data)) {
$this->Session->setFlash("Newsletter angelegt");

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



<div class="radio-list">
    <label class="radio-inline">
        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" > NEW INSTALLATION </label>

    <label class="radio-inline">
        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> SERVICE REPAIR </label>
    <label class="radio-inline">
        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"><span class="require">CANCEL SERVICE</span></label>                                                    
</div>


<?php
$options = array('1' => 'NEW INSTALLATION', '2' => 'SERVICE REPAIR', '3' => 'CANCEL SERVICE');
$attributes = array('legend' => false);
echo $this->Form->radio('gender', $options, $attributes);
?> 