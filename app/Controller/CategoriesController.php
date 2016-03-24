<?php

class CategoriesController extends AppController{

	public $uses = array('Category', 'Discount');
	public $components = array('Paginator');

	public function admin_index($cat_id = null){
		$this->index($cat_id);
	}

	public function index($alias = null){
		if(!$alias){
			//Все товары категории
			// $discounts = $this->Discount->find('all', array(
			// 	'fields' => array('id', 'title', 'price', 'img'),
			// 	'recursive' => -1
			// 	));
			$this->Paginator->settings = array(
				'fields' => array('id', 'title', 'discount', 'img', 'alias', 'coordinate_lat', 'coordinate_lng'),
				'recursive' => -1,
				'limit' => 3,
				);
			$discounts = $this->Paginator->paginate('Discount');
			//Получаем корневые категории
			$cats = $this->Category->find('all', array(
				'conditions' => array(
					'parent_id' => 0
					),
				));
			// $cats_menu_sidebar = $this->_catMenuSidebar($cats, $cat_id = 0);
			// $cats_menu_sidebar[$cat_id][$cat_id] = 'Каталог';
			return $this->set(compact('discounts', 'cats_menu_sidebar', 'alias'));
		}
		if(!$this->Category->findByAlias($alias)){
			throw new NotFoundException('Такой категории нету...'); //404
		}
		$cats = $this->Category->find('all');
		$category = $this->Category->findByAlias($alias);

		$cat_id = $category['Category']['id'];
		$ids = $this->_catsIds($cats, $cat_id);
		$ids = !$ids ? $cat_id : $ids . $cat_id;
		$ids = explode(",", $ids);
		// $discounts = $this->Discount->find('all', array(
		// 	'conditions' => array('Discount.category_id' => $ids),
		// 	'fields' => array('id', 'title', 'price', 'img'),
		// 	'recursive' => -1
		// 	));
		$this->Paginator->settings = array(
			'conditions' => array('Discount.category_id' => $ids),
			'fields' => array('id', 'title', 'discount', 'img', 'alias', 'coordinate_lat', 'coordinate_lng'),
			'recursive' => -1,
			'limit' => 3
			);
		$discounts = $this->Paginator->paginate('Discount');
		$cats_menu_sidebar = $this->_catMenuSidebar($cats, $cat_id); //вывод сайдбара
		return $this->set(compact('discounts', 'cats_menu_sidebar', 'cat_id', 'category'));
	}

	protected function _catsIds($cats, $cat_id){
		$data = '';
		foreach($cats as $item){
			if($item['Category']['parent_id'] == $cat_id){
				$data .= $item['Category']['id'] . ',';
				$data .= $this->_catsIds($cats, $item['Category']['id']);
			}
		}
		return $data;
	}

	protected function _catMenuSidebar($cats, $cat_id){
		$data = array();
		foreach($cats as $item){
			if($item['Category']['id'] == $cat_id){
				$data[$cat_id][$cat_id] = $item['Category']['title'];
			}
			if($item['Category']['parent_id'] == $cat_id){
				$data[$cat_id]['Children'][$item['Category']['id']] = $item['Category']['title'];
			}
		}
		return $data;
	}

	public function test($alias = null){
		
		$this->view = 'index';
		$this->set(compact('cat_id'));
	}
}