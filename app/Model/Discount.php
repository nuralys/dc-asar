<?php

class Discount extends AppModel {
    // public $hasOne = 'Profile';
    public $belongsTo = array(
        'Company' => array(
            'className'  => 'Company',
            // 'conditions' => array('Recipe.approved' => '1'),
            // 'order'      => 'Recipe.created DESC'
        ),
        'City' => array(
            'className'  => 'City',
            // 'conditions' => array('Recipe.approved' => '1'),
            // 'order'      => 'Recipe.created DESC'
        ),
        'Category' => array(
            'className' => 'Category'
        )
    );
   
}
?>