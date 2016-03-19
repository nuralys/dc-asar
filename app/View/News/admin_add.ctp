<div class="title admin_t">
		<h2>Добавление новости</h2>
	</div>
<?php 

echo $this->Form->create('News', array('type' => 'file'));
echo $this->Form->input('title', array('label' => '', 'class' => 'admin_input_f model '));
echo $this->Form->input('body', array('label' => '', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('keywords', array('label' => '', 'class' => 'admin_input_f model ', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => '', 'class' => 'admin_input_f model ','placeholder' => 'Описание '));
echo $this->Form->input('date', array('label' => 'Дата:'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>