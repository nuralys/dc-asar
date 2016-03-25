<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
	public $hasOne = array(
	        'Card' => array(
	            'className'  => 'Card',
	            // 'conditions' => array('Recipe.approved' => '1'),
	            // 'order'      => 'Recipe.created DESC'
	        ),
	        'Referal' => array(
	        	'className' => 'Referal'
	        )
	    );
	// public $

	public $validate = array(
		'username' => array(

		    'validEmailRule' => array(
	            'rule' => array('email'),
	            'message' => 'Пожалуйста введите правильный e-mail'
	        ),
	        
		    'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите email'
	        ),

			'uniqueEmailRule' => array(
	            'rule' => 'isUnique',
	            'message' => 'Такой email уже существует'
	        )
		),
		'password' =>  array(
	        'length' => array(
	            'rule'      => array('between', 6, 40),
	            'message'   => 'Пароль не должен быть меньше 6 и больше 40 знаков',
	            'on'        => 'create',  // we only need this validation on create
	        ),
	    ),
	    'password_repeat' => array(
	        'compare' => array(
	            'rule'    => array('validate_passwords'),
	            'message' => 'Пароли не совпадают',
	        ),
	    ),
	);

	public function validate_passwords() { //password match check
	    return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_repeat'];
	}

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    return true;
	}
}