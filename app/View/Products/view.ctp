<div class="product_container">
				<div class="product_container_img">
					<div class="photo-sliders">
						<div class="photo-slider active">
							<div class="photo-slider-big photo-big">
								
								<img class="big-photo" src="/img/product/thumbs/<?=$data['Product']['img1']?>" alt="">
								<img class="big-photo" src="/img/product/thumbs/<?=$data['Product']['img2']?>" alt="">
								</div>

							<div class="photo-slider-small photo-small">
								<div class="slider-smallimg"><img src="/img/product/thumbs/<?=$data['Product']['img1']?>" alt=""></div>
								<div class="slider-smallimg"><img src="/img/product/thumbs/<?=$data['Product']['img2']?>" alt=""></div>
							</div>
						</div>
					</div>
				</div>
				<div class="product_description">
					<div class="product_title">
						<h2><?=$data['Product']['title']?></h2>
					</div>
					<div class="price">
						Цена: <?=$data['Product']['price']?> тг
					</div>
					<div class="color">
						Цвета: <?=$data['Product']['color']?> 
					</div>
					<div class="size">
						Размеры: <?=$data['Product']['size']?>
					</div>
					<button id="productbuy" class="button" data-id="<?=$data['Product']['id']?>">Купить</button>
					<div class="tabs__wrapper">
				        <div class="tabs-header">
				          <div class="tabs-header__title active">О товаре</div>
				          <div class="tabs-header__title">Оплата</div>
				          <div class="tabs-header__title">Доставка</div>
				        </div>
				        <div class="tabs-box">
				          <div class="tabs-box__item active">
				           <?=$data['Product']['body']?>
				          </div>
				          <div class="tabs-box__item">
				            <p>Lorem ipsum2 dolor sit amet, consectetur adipisicing elit. Porro adipisci quis fugiat consequuntur pariatur! Quisquam nemo repellendus enim sed dolore nesciunt nulla expedita mollitia laboriosam fugit earum, voluptas! Et, debitis.</p>
				          </div>
				          <div class="tabs-box__item">
				            <p>Lorem ipsum 3dolor sit amet, consectetur adipisicing elit. Porro adipisci quis fugiat consequuntur pariatur! Quisquam nemo repellendus enim sed dolore nesciunt nulla expedita mollitia laboriosam fugit earum, voluptas! Et, debitis.</p>
				          </div>
				        </div>
				      </div>
				</div>
			</div>
			<div class="title">
				<h2>НОВОСТИ И ПОЛЕЗНЫЕ СОВЕТЫ</h2>
			</div>
			<div class="news">
			<div class="news-list">
			<?php foreach($news as $item): ?>
				<div  class="news-list-item">
					<a href="/news/<?=$item['News']['id'] ?>" class="news_item">
						<div class="news_item_img">
							<img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="" ></div>
					<div class="news_des"><?=$item['News']['title']?></div>
					</a>
				</div>
			<?php endforeach ?>
			</div>
				
			</div>