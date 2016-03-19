<?php
// App::uses('AppController', 'Controller');
class CardsController extends AppController{

	public $uses = array('Card', 'Discount');

	public function admin_index(){
		// $data = $this->Discount->find('all');
		$data = $this->Card->find('all');
		$title_for_layout = 'Дисконтные карты';
		$this->set(compact('title_for_layout', 'data'));
	}

	
}