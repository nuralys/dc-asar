<div class="content">
		<?php foreach($news as $item): ?>
				<div class="news_item">
					<div class="date"><?=$item['News']['date'] ?></div>
					<div class="news_item_img">
						<a href="/news/<?=$item['News']['id'] ?>"><img src="/img/news/thumbs/<?=$item['News']['img'] ?>" alt=""></a>
						<div class="news_item_img_shadow">
						
						</div>
					</div>
					<div class="news_item_title"><a href="/news/<?=$item['News']['id'] ?>"><?=$item['News']['title'] ?></a></div>
					<div class="news_item_des">
						<p>
							<?= $this->Text->truncate(strip_tags($item['News']['body']), 850, array('ellipsis' => '...', 'exact' => true)) ?>
						</p>
					</div>
				</div>
				<?php endforeach ?>
				
			</div>
			<?php echo $this->element('sidebar'); ?>