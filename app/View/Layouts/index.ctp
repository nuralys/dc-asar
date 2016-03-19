<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?php echo $title_for_layout ?> | dc-asar.kz</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<?php if(isset($meta['keywords'])): ?>
		<meta name="keywords" content="<?=$meta['keywords']?>">
	<?php endif; ?>
	<?php if(isset($meta['description'])): ?>
		<meta name="description" content="<?=$meta['description']?>">
	<?php endif; ?>
<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.js"></script>
	<link rel="stylesheet" href="/libs/font-awesome-4.2.0/css/font-awesome.min.css" />
<script src="http://maps.api.2gis.ru/2.0/loader.js"></script>
<?php 
	echo $this->fetch('script');
	echo $this->fetch('css');
	echo $this->Html->css(array('reset', 'style', 'slide', 'jquery.fancybox.css?v=2.1.5'));
	echo $this->Html->script(array('app', 'responsive-nav','jquery.fancybox.pack.js?v=2.1.5'));
	 ?>

	<!--[if lte IE 9]>
	<link rel="stylesheet" type="text/css" media="Screen" href="css/main-ie6.css">
	<script type="text/javascript" src="/js/ie6-fix.js"></script>
	<![endif]-->
    
</head>
<body>
<div class="page">
	<?php echo $this->element('header'); ?>
	<div class="container">
		<div class="cr">
			<?php echo $this->fetch('content'); ?>
	</div>
	</div>
	<?php echo $this->element('footer'); ?>
	<div id="modal1" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
	<span class="modal_close"></span>
	<div class="title_z">Регистрация компании</div>

        <form method="POST" name="form1" action="form.php" >
        	<div class="form_item check">
        		<input type="radio" id="partner"><label for="partner">Являюсь партнером клуба “Асар”</label>
        	</div>
        	<div class="form_item check">
        		<input type="radio" id="akc"><label for="akc">Хочу разместить акцию</label>
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Ваш эмаил..." />
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Телефон..." />
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Логин..." />
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Город..." />
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Имя..." />
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Пароль..." />
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Фамилия..." />
        	</div>
        	<div class="form_item">
        		<input type="text" placeholder="Пароль еще раз..." />
        	</div>
        	<div class="form_item_bottom">
        		<input type="checkbox" id="accept"><label for="accept">Я принимаю <a href="">пользовательское соглашение</a></label>
        	</div>
			<button type="submit" class="from_reg"  name="submit1" >ЗАРЕГИСТРИРОВАТЬСЯ</button>
		</form>
	</div>
	<div id="overlay"></div><!-- Подложка -->
</body>
</html>