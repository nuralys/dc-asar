<?php if(!is_array($search_res)):?>
<?php echo $search_res; ?>
<?php else: ?>
 
 <ul class="product_catalog_container">
 	<?php foreach($search_res as $item): ?>
	<li class="product_catalog">
		<a href="/product/<?=$item['Product']['id']?>"class="product_catalog_item">
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
	</li>
	<?php endforeach ?>
</ul>
<?php endif; ?>