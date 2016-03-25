<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array('Page', 'Product');

	public function admin_index(){
		$data = $this->Page->find('all');
		$title_for_layout = 'Pages';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Page->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Page->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Page->id = $id;
			$data1 = $this->request->data['Page'];
			
			if($this->Page->save($data1)){
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

	public function index($page_alias = null){
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$page = $this->Page->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		// $news = $this->News->find('all',array(
		// 	'limit' => 4,
		// 	'order' => array('created' => 'desc')
		// 	));
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta'));
	}

	public function get_card(){
		App::uses('CakeEmail', 'Network/Email');
		if(!empty($this->data)){
			$email = new CakeEmail('default'); //smtp
			$email->from(array('info@dc-asar.kz' => 'Дисконтный клуб - dc-asar.kz'))
			->to('info@dc-asar.kz')
			->subject('Новые письмо с сайта');
			$message = 'Text';
			if( $email->send($message) ){
				$this->Session->setFlash('Письмо успешно отправлено', 'default', array(), 'good');
				//unset($message);
				return $this->redirect(FULL_BASE_URL);
			}else{
				$this->Session->setFlash('Ошибка!', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
	
	}

}
