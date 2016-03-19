<div class="title admin_t">
	<h2>Добавление компании</h2>
</div>
<?php 

echo $this->Form->create('Company', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model '));
echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('address', array('label' => 'Адрес:'));
echo $this->Form->input('phone', array('label' => 'Телефон:'));
echo $this->Form->input('keywords', array('label' => '', 'class' => 'admin_input_f model ', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => '', 'class' => 'admin_input_f model ','placeholder' => 'Описание '));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>