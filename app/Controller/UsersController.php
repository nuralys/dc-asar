<?php

class UsersController extends AppController{

	public $uses = array('Card', 'User', 'Referal');

	public function admin_index(){
		$data = $this->User->find('all');
		$this->set(compact('data'));
	}

	public function admin_login(){
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Session->setFlash('Неверный логин или пароль.', 'default', array(), 'bad');
	    }
	}

	public function admin_logout(){
		return $this->redirect($this->Auth->logout());
	}

	public function login(){
		if($this->request->is('post')){
			// debug($this->request->data);
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			}else{
				$this->Session->setFlash('Ошибка авторизации', 'default', array(), 'bad');
			}
		}
	}

	public function edit(){
		// if(is_null($id) || !(int)$id || !$this->News->exists($id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$id = $this->Auth->user();
		$data = $this->User->findById($id['id']);
		// if(!$id){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			unset($data1['password']);
			unset($data1['password_repeat']);
			
			if($this->User->save($data1)){
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

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

	public function registration(){
		if($this->request->is('post') && !empty($this->request->data)){
			$this->User->create();
			$data = $this->request->data['User'];
			$card_id = $this->Card->find('all', array(
				'conditions' => array('code' => $data['code']),
				'fields' => array('id', 'code')
			));
			$card_id = $card_id[0]['Card']['id'];
			// debug($data);
			// debug($card_id);
			//  if(!$data['img']['name']){
			//  	unset($data['img']);
			// }

			if($this->User->save($data)){
				$user_id= $this->User->id;
				// $this->request->data['Card']['user_id'] = $this->User->id;
				// $this->request->data['Card']['active'] = 1;
				// $user_id = $this->User->getLastInsertId();
				// $this->data['Card']['user_id'] = $user_id;
				// $this->data['Card']['active'] = 1;
				// $this->Card->updateAll(
				// 	array('Card.active' => 1),
				// );
				$this->Card->updateAll(
					array('Card.active' => 1, 'Card.user_id' => $user_id),
					array('Card.code' => $data['code'])
				);

				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function cabinet(){
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$id = $this->Auth->user();
		$user = $this->User->findById($id['id']);
		$user_id = 1;
		$referals_tree = $this->Referal->find('threaded');
		$referals = $this->Referal->find('all');
		$getChildrens = $this->_getChildrens($referals, $user_id);
		$piramida = $this->_piramida($getChildrens);
		// $childrens = $this->_getUserId($referals_tree, $user_id);
		// debug($childrens);
		// debug($getChildrens);
		$this->set(compact('data', 'referals_tree', 'childrens', 'getChildrens', 'piramida'));
	}

	protected function _piramida($data = array()){
		$html = '';
		foreach($data['Children'] as $key => $value){
			
			$html .= '<li>'.$key;
			// debug($value);
			if(!empty($value['Children'])){

				$html .= $this->_rec($value['Children']);
			}
			// $html .= '<br>';
			// debug($value);
			// $html
			// debug($html);
			// $html .= $this->_rec($value['Children']);
			// return false;
			$html .= '</li>';
			// debug($html);
		}
		return $html;
	}
	protected function _recNotEmpty($value = array()){
		$html = '';
		$html .= '<ul>';
		// debug('_recNotEmpty');
		// debug($value);
			foreach($value as $key => $value){
				$html .= '<li>'.$key.'</li>';
			}
		$html .= '</ul>';
		return $html;
	}

	protected function _recEmpty($value = array()){
		$html = '';
		foreach ($value as $key => $value) {
			$html .= '<ul>';
				$html .= '<li>'.$key;
				if(!empty($value['Children'])){
					$html .= $this->_recNotEmpty($value['Children']);
				}
				$html.='</li>';
				$html .= '</ul>';
		}
		return $html;
	}
	protected function _rec($value = array()){
		debug(1);
		debug($value);
		$html = '';
		
		foreach ($value as $key => $value) {
			$html .= '<ul>';
			$html .= '<li>'.$key;
			if(!empty($value['Children'])){
			$html .= $this->_rec($value['Children']);
			}
			$html.='</li>';
			$html .= '</ul>';
		}
		return $html;
	}


protected function _getChildrens($referals, $user_id){
	if(empty($data)){
		$data = array();
	}
	// debug($referals);
	foreach ($referals as $item) {
		if($item['Referal']['parent_id'] == $user_id){
			$data['Children'][$item['Referal']['user_id']] = $item['Referal']['user_id'];
			// debug($data);
			$data['Children'][$item['Referal']['user_id']] = $this->_getChildrens($referals, $data['Children'][$item['Referal']['user_id']]);
		}
	}
	// debug($data);
	return $data;
}
		

	protected function _catMenuHtml($referals_tree = false){
		if(!$referals_tree) return false;
		$html = '';
		// debug($referals_tree);
		foreach ($referals_tree as $item) {
			$html .= $this->_catMenuTemplate($item);
		}
		return $html;
	}

	protected function _catMenuTemplate($referal){
		ob_start();
		include APP . "View/Elements/referals_tpl.ctp";
		return ob_get_clean();
	}

}