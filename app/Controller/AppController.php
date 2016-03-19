<?php


App::uses('Controller', 'Controller');


class AppController extends Controller {
	public $uses = array('App', 'Category');

	public $components = array('DebugKit.Toolbar', 'Menu', 'Session', 'Auth' => array(
            'loginRedirect' => '/',
            'logoutRedirect' => '/',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller'),
            'authError' => 'Вы не имеете прав доступа к данной странице'
        ));

	public $helpers = array('Html', 'Form', 'Session');

	public function isAuthorized($user) {
	    // Admin can access every action
	    if (isset($user['role']) && $user['role'] === 'admin') {
	        return true;
	    }

	    // Default deny
	    return false;
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
		$cat_menu = $this->Menu->getCatMenu();
		$admin = (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') ? 'admin/' : false;
		if(!$admin) $this->Auth->allow();
		if($admin){
			$this->layout = 'default';
		}else{
			$this->layout = 'index';
		}
		$logged_user = $this->Auth->user();
		$this->set(compact('admin', 'cat_menu', 'logged_user'));

	}

	protected function __newsForSidebar(){
		$newsForSidebar = $this->News->find('all', array(
			'order' => array('date' => 'desc'),
			'limit' => 3
			));
		return $newsForSidebar;
	}
}
