<?php

class Referal extends AppModel{
	public $belongsTo = array(
	        
	        'User' => array(
	        	'className' => 'User'
	        )
	    );
}