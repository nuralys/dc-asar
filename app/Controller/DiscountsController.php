<?php

class DiscountsController extends AppController {

	public $uses = array('Discount', 'Company', 'City');
	public $components = array('Paginator');
	public function home(){
		
		$data = $this->Discount->find('all');
		$this->view = 'home';
		$title_for_layout = 'Дисконтный клуб Асар';
		$this->set(compact('title_for_layout', 'data'));
	}

	public function view($alias = null){
		if(!$this->Discount->findByAlias($alias)){
			throw new NotFoundException('Такой страницы нету...'); //404
		}
		$data = $this->Discount->findByAlias($alias);

		$this->set(compact('data'));
	}

	public function admin_view($id){
		if(is_null($id) || !(int)$id || !$this->Company->exists($id)){
			throw new NotFoundException('Такой страницы нету...'); //404
		}
		$data = $this->Company->findById($id);

		$this->set(compact('data'));
	}

	public function admin_index(){
		$data = $this->Discount->find('all');
		$this->set(compact('data'));
	}

	public function index($page_alias = null){
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$page = $this->Discount->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		$news = $this->News->find('all',array(
			'limit' => 4,
			'order' => array('created' => 'desc')
			));
		$title_for_layout = $page['Discount']['title'];
		$meta['keywords'] = $page['Discount']['keywords'];
		$meta['description'] = $page['Discount']['description'];
		$this->set(compact('page_alias', 'page', 'news', 'title_for_layout', 'meta'));
	}

	public function search(){
		$search = !empty($_GET['q']) ? $_GET['q'] : null ;
		if( is_null($search)){
			return $this->set('search_res', 'Введите пойсковый запрос');
		}
		$this->Paginator->settings = array(
			'conditions' => array('Discount.title LIKE' => '%' . $search . '%'),
			'fields' => array('id', 'title', 'alias', 'discount', 'img'),
			'recursive' => -1,
			'limit' => 10,
			'order' => array('date' => 'desc')
			);
		$search_res = $this->Paginator->paginate('Discount');
		$this->set(compact('search_res'));
	}
}
