<h1>Список товаров</h1>
<a href="/admin/products/add">Добавить новый товар</a>

 <?php if(!empty($data)): ?>

 <ul class="product_catalog_container">
 	<?php foreach($data as $item): ?>
	<li class="product_catalog">
		<a href="/product/edit/<?=$item['Product']['id']?>"class="product_catalog_item">
			<div class="product_catalog_img">
				<img src="/img/product/thumbs/<?=$item['Product']['img1']?>" alt="" class="one" >
				<img src="/img/product/thumbs/<?=$item['Product']['img2']?>" alt="" class="two">
			</div>
			<span class="produc_list_item__name"><?=$item['Product']['title']?></span>
			<!-- <span class="produc_list_item__brand">GEMMA LACE INSERT DRESS</span> -->
			<div class="price_slider">
				<span class="old_price"><?=$item['Product']['old_price']?> тг</span>
				<span class="news_price"><?=$item['Product']['price']?> тг</span>
			</div>
		</a>
		(
			<a href="/admin/products/edit/<?=$item['Product']['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Product']['id']), array('confirm' => 'Подтвердите удаление')); ?>
		)
	</li>
	<?php endforeach ?>
</ul>
<?php else: ?>
<p>К сожалению в данной категории нету товаров...</p>
<?php endif ?>