
<div class="title admin_t">
		<h2>Регистрация</h2>
	</div>
	
<?php 

echo $this->Form->create('User');
echo $this->Form->input('code', array('label' => 'Активационный код', 'type'=>'text', 'class' => 'admin_input_f model '));
echo $this->Form->input('username', array('label' => 'e-mail', 'class' => 'admin_input_f model '));
echo $this->Form->input('password', array('label' => 'Пароль'));
echo $this->Form->input('password_repeat', array('label' => 'Повторите пароль', 'type'=>'password'));
echo $this->Form->input('fio', array('label' => 'ФИО', 'class' => 'admin_input_f model '));
echo $this->Form->end('Зарегистрироваться');
?>
</div>