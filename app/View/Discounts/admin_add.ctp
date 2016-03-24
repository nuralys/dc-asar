<div class="admin_t">
	<h2>Добавление скидки</h2>
</div>
<?php 
echo $this->Form->create('Discount', array('type' => 'file'));?>
<div class="input select">
	<label for="DiscountCategoryId">Категория:</label>
	<select name="data[Discount][category_id]" id="DiscountCategoryId">
		<option value="0">-</option>
		<?php foreach($cats as $k => $v):?>
			<option value="<?=$k?>"><?=$v?></option>
		<?php endforeach ?>
	</select>
</div>
<?php
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('price', array('label' => 'Цена:'));
echo $this->Form->input('discount', array('label' => 'Скидка:'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова'));
echo $this->Form->input('description', array('label' => 'Описание'));
echo $this->Form->input('company_id', array('type' => 'hidden', 'value' => $this->params['pass'][0]));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>