<div class="title admin_t">
		<h2>Добавление товара</h2>
	</div>
<?php 

echo $this->Form->create('Product', array('type' => 'file'));?>
<div class="input select">
	<label for="ProductParentId">Услуга:</label>
	<select name="data[Product][category_id]" id="ProductId">
		<option value="0">-</option>
		<option value="1">Новая коллекция</option>
		<option value="2">Верх</option>
		<option value="3">Низ</option>
		<option value="4">Аксессуары</option>
	</select>
</div>
<?php
echo $this->Form->input('title', array('label' => 'Название', 'class' => 'admin_input_f model '));
echo $this->Form->input('body', array('label' => 'Описание', 'id' => 'editor'));
?>
<div id="cropContainerEyecandy"></div>

    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/croppic.css" rel="stylesheet">
   	<script src="/js/croppic.min.js"></script>
    <script>
		var croppicContainerEyecandyOptions = {
				uploadUrl:'/ajax/img_save_to_file.php',
				cropUrl:'/ajax/img_crop_to_file.php',
				imgEyecandy:false,				
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(data){ console.info(data);},
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(data){ console.info(data.url); console.info(data.urlsource);				
				$('.imgcrop').val(data.url);
				$('.imgsource').val(data.urlsource);
				},
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);

	</script>
<input type="text" required="required" name="data[Product][imgsource]" class="imgsource" value="" />
<input type="text" required="required" name="data[Product][imgcrop]" class="imgcrop" value="" />

<div id="cropContainerEyecandyBack"></div>
    <script>
		var croppicContainerEyecandyBackOptions = {
				uploadUrl:'/ajax/img_save_to_file.php',
				cropUrl:'/ajax/img_crop_to_file.php',
				imgEyecandy:false,				
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(data){ console.info(data);},
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(data){ console.info(data.url); console.info(data.urlsource);				
				$('.imgcrop2').val(data.url);
				$('.imgsource2').val(data.urlsource);
				},
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerEyecandyBakc = new Croppic('cropContainerEyecandyBack', croppicContainerEyecandyBackOptions);

	</script>
<input type="text" required="required" name="data[Product][imgsource2]" class="imgsource2" value="" />
<input type="text" required="required" name="data[Product][imgcrop2]" class="imgcrop2" value="" />
<?php
// echo $this->Form->input('img1', array('label' => 'Передняя часть:', 'type' => 'file'));
// echo $this->Form->input('img2', array('label' => 'Задняя часть:', 'type' => 'file'));
echo $this->Form->input('color', array('label' => 'Цвета', 'class' => 'admin_input_f', 'placeholder' => 'Белый, черный'));
echo $this->Form->input('size', array('label' => 'Размеры', 'class' => 'admin_input_f', 'placeholder' => 'XL, XXL'));
echo $this->Form->input('old_price', array('label' => 'Старая цена:'));
echo $this->Form->input('price', array('label' => 'Новая цена:'));
echo $this->Form->input('recommended', array('type' => 'checkbox', 'label' => 'Рекоммендованный'));
echo $this->Form->input('keywords', array('label' => '', 'class' => 'admin_input_f', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => '', 'class' => 'admin_input_f','placeholder' => 'Описание '));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>