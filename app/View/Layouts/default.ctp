<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic'));

		echo $this->Html->script(array('ckeditor/ckeditor', 'jquery.min', 'jquery.imgareaselect'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<header>
		
		<section class="head">
			<div class="cr">
				<div class="logo">
					<a href="">
						<img src="" alt=""/>
					</a>

				</div>
				<nav class="top_menu">
					<div class="top_menu_item">
						<a href="/admin/cards">Дисконтные карты</a>
					</div>
					<div class="top_menu_item">
						<a href="/admin/categories">Категории</a>
					</div>
					<div class="top_menu_item">
						<a href="/admin/users">Список пользователей</a>
					</div>
					<div class="top_menu_item">
						<a href="/admin/companies">Компании</a>
					</div>
					<div class="top_menu_item ">
						<a href="/admin/discounts">Скидки</a>
					</div>
					<div class="top_menu_item ">
						<a href="/admin/pages">Страницы</a>
					</div>
					
				</nav>
			</div>
		</section>
	</header>

		<div class="content">

			<?php echo $this->Session->flash('good'); ?>
			<?php echo $this->Session->flash('bad'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		
	
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
