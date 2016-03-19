<?php

App::uses('AppController', 'Controller');

class CompaniesController extends AppController {

	public $uses = array('Discount', 'Company', 'City');


	public function view($alias = null){
		if(!$this->Company->findByAlias($alias)){
			throw new NotFoundException('Такой страницы нету...'); //404
		}
		$data = $this->Company->findByAlias($alias);

		$this->set(compact('data'));
	}

	public function admin_index(){
		$data = $this->Company->find('all');
		$this->set(compact('data'));
	}

	public function index($alias = null){
		if(is_null($alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$data = $this->Company->findByAlias($alias);
		if(!$data){
			throw new NotFoundException("Такой страницы нету");
		}
		$news = $this->News->find('all',array(
			'limit' => 4,
			'order' => array('created' => 'desc')
			));
		$title_for_layout = $data['Company']['title'];
		$meta['keywords'] = $data['Company']['keywords'];
		$meta['description'] = $data['Company']['description'];
		$this->set(compact('alias', 'data', 'news', 'title_for_layout', 'meta'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Company->create();
			$data = $this->request->data['Company'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Company->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Company->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Company->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Company->id = $id;
			$data1 = $this->request->data['Company'];
			if(!$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Company->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data'));
		}
	}

	public function admin_delete($id){
		if (!$this->Company->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Company->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}
