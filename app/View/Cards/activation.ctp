<h3>Активация карты</h3>
<?php 
echo $this->Form->create('Card');
echo $this->Form->input('code', array('label' => 'Код', 'class' => 'admin_input_f model '));
echo $this->Form->end('Создать');
?>
<?php debug($card_data); ?>