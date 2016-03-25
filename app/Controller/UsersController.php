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
		
		$user_id = $id['id'];
		$referals_tree = $this->Referal->find('threaded');
		$referals = $this->Referal->find('all');
		$users = $this->User->find('all');
		$getChildrens = $this->_getChildrens($referals, $user_id, $users);
		$piramida = $this->_piramida($getChildrens);
		// $childrens = $this->_getUserId($referals_tree, $user_id);
		// debug($referals);
		// debug($getChildrens);
		// die();
		$this->set(compact('data', 'referals_tree', 'childrens', 'getChildrens', 'piramida'));
	}

	protected function _piramida($data = array()){
		$html = '';
		if(empty($data['Children'])){
			$html = 'У Вас нету рефералов';
		}else{
			foreach($data['Children'] as $key => $value){
			
				$html .= '<li>'.$key;
				// debug($value);
				if(!empty($value['Children'])){

					$html .= $this->_rec($value['Children']);
				}
				
				$html .= '</li>';
				// debug($html);
			}	
		}
		
		return $html;
	}

	protected function _recNotEmpty($value = array()){
		$html = '';
		$html .= '<ul class="test">';
		// debug('_recNotEmpty');
		// debug($value);
			foreach($value as $key => $value){
				$html .= '<li><div>'.$key.'</div></li>';

			}
		$html .= '</ul>';
		return $html;
	}

	protected function _recEmpty($value = array()){
		$html = '';
		foreach ($value as $key => $value) {
			$html .= '<ul >';
				$html .= '<li><div>'.$key.'</div>';
				if(!empty($value['Children'])){
					$html .= $this->_recNotEmpty($value['Children']);
				}
				$html.='</li>';
				$html .= '</ul>';
		}
		return $html;
	}
	protected function _rec($value = array()){
		//debug(1);
		//debug($value);
		$html = '';
		$i=1;
		// debug($value);
		// die('DIE');
		foreach ($value as $key => $value) {
			$html .= '<ul >';
			$html .= '<li><div><img src="/img/pol_car2.png"/>'.$key.'</div>';
			if(!empty($value['Children'])){
				$html .= $this->_rec($value['Children']);
			}
			$html.='</li>';
			$html .= '</ul>';
			$i++;
		}
		return $html;
	}


	protected function _getChildrens($referals, $user_id, $u=null){
		if(empty($data)){
			$data = array();
		}
		 
		foreach ($referals as $item) {
			if($item['Referal']['parent_id'] == $user_id){
				$data['Children'][$item['Referal']['user_id']] = $item['Referal']['user_id'];
				// debug($data);
				$data['Children'][$item['Referal']['user_id']] = $this->_getChildrens($referals, $data['Children'][$item['Referal']['user_id']]);
				// $data['Children'][$item['Referal']['username']] = $item['Referal']['user_id'];
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

	public function forgetpwd(){
		App::uses('CakeEmail', 'Network/Email');
		//$this->layout="signup";
		$this->User->recursive=-1;
		if(!empty($this->data))
		{
			if(empty($this->data['User']['email']))
			{
				$this->Session->setFlash('Please Provide Your Email Adress that You used to Register with Us', 'default', array(), 'bad');
			}
			else
			{
				$email=$this->data['User']['email'];
				$fu=$this->User->find('first',array('conditions'=>array('User.username'=>$email)));
				if($fu)
				{
					//debug($fu);
					if($fu['User']['active'])
					{
						$key = Security::hash(String::uuid(),'sha512',true);
						$hash=sha1($fu['User']['username'].rand(0,100));
						$url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
						$ms=$url;
						$ms=wordwrap($ms,1000);
						//debug($url);
						$fu['User']['tokenhash']=$key;
						$this->User->id=$fu['User']['id'];
						if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){

							//============Email================//
						$email = new CakeEmail('default'); //smtp
						$email->from(array('info@dc-asar.kz' => 'Дисконтный клуб - dc-asar.kz'))
						->to('info@dc-asar.kz')
						->subject('Новые письмо с сайта');
						// $message = $ms;
						// debug($email->send('test'));
						// die('lol');
			if( $email->send($ms) ){
				$this->Session->setFlash('Письмо успешно отправлено', 'default', array(), 'good');
				//unset($message);
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка!', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}

						//$this->Session->setFlash('Check Your Email To Reset your password', 'default', array(), 'bad');

							//============EndEmail=============//
						}
						else{
							$this->Session->setFlash('Error Generating Reset link', 'default', array(), 'bad');
						}
					}
					else
					{
						$this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it', 'default', array(), 'bad');
					}
				}
				else
				{
					$this->Session->setFlash('Email does Not Exist', 'default', array(), 'bad');
				}
			}
		}
	}

	function reset($token=null){
		//$this->layout="Login";
		$this->User->recursive=-1;
		if(!empty($token)){
			$u=$this->User->findBytokenhash($token);
			if($u){
				$this->User->id=$u['User']['id'];
				if(!empty($this->data)){
					$this->User->data=$this->data;
					$this->User->data['User']['username']=$u['User']['username'];
					$new_hash=sha1($u['User']['username'].rand(0,100));//created token
					$this->User->data['User']['tokenhash']=$new_hash;
					if($this->User->validates(array('fieldList'=>array('password','password_confirm')))){
						if($this->User->save($this->User->data))
						{
							$this->Session->setFlash('Password Has been Updated', 'default', array(), 'good');
							$this->redirect(array('controller'=>'users','action'=>'login'));
						}

					}
					else{

						$this->set('errors',$this->User->invalidFields());
					}
				}
			}
			else
			{
				$this->Session->setFlash('Token Corrupted,,Please Retry.the reset link work only for once.', 'default', array(), 'bad');
			}
		}

		else{
			$this->redirect('/');
		}
	}

}