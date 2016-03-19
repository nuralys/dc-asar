<div class="admin_enter">
				<div class="title admin">Панель администратора</div>
<?php 
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => '', 'class' => 'admin_input_f', 'placeholder' => 'Логин'));
	echo $this->Form->input('password', array('label' => '', 'class' => 'admin_input_f', 'placeholder' => 'Пароль'));
	echo $this->Form->end('Войти');
?>
</div>
