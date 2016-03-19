<?php //debug($category) ?>
<div class="title">
	<h1><?=$category['Category']['title'] ?></h1>
	<p>Любой текст</p>
	<div class="soc_seti glav">
		<ul>
			<li><img src="/img/klass.png" alt="" title=""></li>
			<li><img src="/img/facebook.png" alt="" title=""></li>
			<li><img src="/img/vk.png" alt="" title=""></li>
			<li><img src="/img/twitter.png" alt="" title=""></li>
		</ul>
	</div>
</div>
<div class="content">
	<ul class="glavnaia">
	<?php foreach($discounts as $item): ?>
		<li>
			<div class="first_lvl">
				<a href="/discount/<?=$item['Discount']['alias']?>" title="<?php echo $item['Discount']['title'] ?>"><img src="/img/tour.jpg" alt="<?php echo $item['Discount']['title'] ?>" title="<?php echo $item['Discount']['title'] ?>"></a>
				<div class="poloska">
					<a href="/discount/<?=$item['Discount']['alias']?>" title="<?php echo $item['Discount']['title'] ?>"><p><?=$item['Discount']['title'];?></p></a>
					<div class="discount">
						<p><?=$item['Discount']['discount'];?>%</p>
					</div>
				</div>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>

	<div class="pagination">
			<div class="pages"> 
			<div class="pages_list">
			<strong>Страница:</strong>
		
	<?php 
	echo $this->Paginator->counter(array(
	'separator' => ' из ',

	));
	?>
</div> 
<div class="page_item">
	<?php echo $this->Paginator->first('<<',(array('class' => 'first'))); ?>
				
				<ol>
	<?php echo $this->Paginator->numbers(
	array(
	'separator' => '',
	'tag' => 'li',
	'modulus' => 2
	)
	); ?>
					<!-- <li class="current">1</li>
					<li><a href="#">2</a></li>
					<li> <a class="next i-next" href="#" title="Next"></a> </li> -->
				</ol>
	<?php echo $this->Paginator->last('>>',(array('class' => 'last'))); ?>
			</div>
			</div>
		</div>

	<div class="page_schet">
						
		<ul>
			<li class="pager-previo last"><a href="/node?page=1" title="На следующую страницу"><i class="fa fa-angle-double-left"></i></a></li>
			<li><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="">5</a></li>
			<li><a href="">6</a></li>
			<li><a href="">7</a></li>
			<li><a href="">8</a></li>
			<li><a href="">9</a></li>
			<li class="pager-next last"><a href="/node?page=1" title="На следующую страницу"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>
	</div>
	<div class="map_vk">
                <div class="map_bg">
                    <div class="map">
                        <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=5yj6a47IS0FP9lrM_dUD8E8NbY1cUYPI&width=100%&height=100%"></script>
                    </div>
                </div>
                <div class="vk">
                    <img src="/img/vk.jpg" alt="" title=""/>
                </div>
            </div>