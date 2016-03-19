<div class="side_bar_container">
				<div class="side_bar" id="sidebar">
					<div class="sider_bar_zhurnal">
						<img src="/img/side_bar_zhurnal.jpg">
					</div>
					<div class="side_bar_video">
						<iframe width="325" height="184" src="https://www.youtube.com/embed/PWVy6PdijtE" frameborder="0" allowfullscreen=""></iframe>
						<div class="video side_bar_title">COVER STORY LITTLE QUEENS bY WDmagazine</div>
						<div class="vides des">
							<p>
								Летнюю обложку журнала WDmagazine украсят - Одна из 
самых красивых певиц в России Татьяна Котова и юная 
модель Милана Лионенко.
							</p>
						</div>
					</div>
					<?php foreach($newsForSidebar as $item): ?>
					<div class="sider_bar_item">
						<div class="sider_bar_item_img">
						<a href="">	<img src="/img/side_bar_img1.jpg" alt=""></a>
						</div>
						<div class="side_bar_title">
						<a href=""><?=$item['News']['title'] ?></a>
						</div>
						<div class="side_bar_item des">
							<p>
								<?= $this->Text->truncate(strip_tags($item['News']['body']), 129, array('ellipsis' => '...', 'exact' => true)) ?>
							</p>
						</div>
					</div>
					<?php endforeach; ?>

					<div class="insta">
						<!-- По умолчанию -->
						<iframe src="/inwidget/index.php" scrolling="no" frameborder="no" style="border:none;width:325px;height:330px;overflow:hidden;"></iframe>
					</div>
				</div>
			</div>