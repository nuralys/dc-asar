<?php 

class SlidersController extends AppController{

	public function admin_index(){
		$data = $this->Slider->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Slider->create();
			$data = $this->request->data['Slider'];
			// debug($data);
			/*ws begin*/
			$getmime = getimagesize(WWW_ROOT . trim($data["imgsource"], '/'));
			$file= end(explode("/",  $data["imgsource"]));
			
			$data["img"]= array(
				"name"=> $file,
				"tmp_name" => WWW_ROOT . trim($data["imgsource"], '/'),
				"error"=> 0,
				"mime"=>$getmime['mime'],
				"size"=>filesize (WWW_ROOT . trim($data["imgsource"], '/'))
			);
			
 			/*ws end*/
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			
			if($this->Slider->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
}