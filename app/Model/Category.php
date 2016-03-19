<?php

class Category extends AppModel{

	public $hasMany = array(
        'Discount' => array(
            'className'  => 'Discount',
            // 'conditions' => array('Recipe.approved' => '1'),
            // 'order'      => 'Recipe.created DESC'
        )
    );
}