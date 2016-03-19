<?php

class ProductsController extends AppController{
	public $uses = array('Product', 'News', 'Category');
	public function admin_index(){
		$data = $this->Product->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Product->create();
			$data = $this->request->data['Product'];
			/*ws begin*/
			$getmime = getimagesize(WWW_ROOT . trim($data["imgsource"], '/'));
			$file= end(explode("/",  $data["imgsource"]));
			$getmime2 = getimagesize(WWW_ROOT . trim($data["imgsource2"], '/'));
			$file2= end(explode("/",  $data["imgsource2"]));
			$data["img1"]= array(
				"name"=> $file,
				"tmp_name" => WWW_ROOT . trim($data["imgsource"], '/'),
				"error"=> 0,
				"mime"=>$getmime['mime'],
				"size"=>filesize (WWW_ROOT . trim($data["imgsource"], '/'))
			);
			$data["img2"]= array(
				"name"=> $file2,
				"tmp_name" => WWW_ROOT . trim($data["imgsource2"], '/'),
				"error"=> 0,
				"mime"=>$getmime2['mime'],
				"size"=>filesize (WWW_ROOT . trim($data["imgsource2"], '/'))
			);
 			/*ws end*/
			 if(!$data['img1']['name']){
			 	unset($data['img1']);
			}
			if(!$data['img2']['name']){
			 	unset($data['img2']);
			}
			if($this->Product->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Product->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Product->id = $id;
			$data1 = $this->request->data['Product'];
			/*ws begin*/
			$getmime = getimagesize(WWW_ROOT . trim($data1["imgsource"], '/'));
			$file= end(explode("/",  $data1["imgsource"]));
			$getmime2 = getimagesize(WWW_ROOT . trim($data1["imgsource2"], '/'));
			$file2 = end(explode("/",  $data1["imgsource2"]));
			$data1["img1"]= array(
				"name"=> $file,
				"tmp_name" => WWW_ROOT . trim($data1["imgsource"], '/'),
				"error"=> 0,
				"mime"=>$getmime['mime'],
				"size"=>filesize (WWW_ROOT . trim($data1["imgsource"], '/'))
			);

			$data1["img2"]= array(
				"name"=> $file2,
				"tmp_name" => WWW_ROOT . trim($data1["imgsource2"], '/'),
				"error"=> 0,
				"mime"=>$getmime2['mime'],
				"size"=>filesize (WWW_ROOT . trim($data1["imgsource2"], '/'))
			);
 			/*ws end*/
			if(!$data1['img1']['name']){
				unset($data1['img1']);
			}
			if(!$data1['img2']['name']){
				unset($data1['img2']);
			}
			if($this->Product->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$c_list = $this->Category->find('list');
			$this->set(compact('id', 'data', 'c_list'));
		}
	}

	public function admin_delete($id){
		if (!$this->Product->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Product->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index($id){
		
		$title_for_layout = 'Товары';
		$data = $this->Product->find('all', array(
			'conditions' => array('id' => $id),
			'order' => array('id' => 'desc')
			));
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Product->findById($id);
		$news = $this->News->find('all', array(
			'limit' => 4,
			'order' => array('date' => 'desc')
		));
		$title_for_layout = $data['Product']['title'];
		$this->set(compact('data', 'news', 'title_for_layout'));
	}

	public function category($category_id){
		$data = $this->Product->find('all', array(
			'conditions' => array('category_id' => $category_id)
			));
		$this->set(compact('data'));
	}

	public function basket(){
		if($this->request->is('post')){
			$data = $this->request->data['Product'];
			debug($data);
		}
	}

	public function search(){
		$search = !empty($_GET['q']) ? $_GET['q'] : null ;
		if( is_null($search)){
			return $this->set('search_res', 'Введите поисковый запрос');
		}
		$search_res = $this->Product->find('all', array(
			'conditions' => array('title LIKE' => '%'.$search.'%')
			));
		$title_for_layout = 'Поиск';
		$this->set(compact('search_res', 'title_for_layout'));
		
	}
}