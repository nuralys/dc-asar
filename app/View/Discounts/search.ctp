<?php if(!is_array($search_res)) : ?>
	<h3><?=$search_res;?></h3>
<?php elseif(!empty($search_res)): ?>
	<ul class="glavnaia">
	<?php foreach($search_res as $item): ?>
        <li>
            <div class="first_lvl">
                <a href="/discount/<?=$item['Discount']['alias']?>"><img src="img/tour.jpg" alt="<?php echo $item['Discount']['title'] ?>" title="<?php echo $item['Discount']['title'] ?>"/></a>
                <div class="poloska">
                   <a href="/discount/<?=$item['Discount']['alias']?>" title="<?php echo $item['Discount']['title'] ?>"><p><?php echo $item['Discount']['title'] ?></p></a>
                    <div class="discount">
                        <p><?php echo $item['Discount']['discount'] ?>%</p>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach ?>
	</ul>
    <div class="pagination">
		<div class="pages">
			<div class="pages_list">
				<strong>Страниц:</strong>
	<?php 
	echo $this->Paginator->counter(array(
	'separator' => ' из ',

	));
	?>
	</div> 
<div class="page_item">

	<?php echo $this->Paginator->first('<<', (array('class' => 'first'))); ?>
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
	<?php echo $this->Paginator->last('>>' ,(array('class' => 'last'))); ?>
	</div>
			</div>
		</div>
		<?php else: ?>
		<h3>Ничего не найдено...</h3>
<?php endif; ?>