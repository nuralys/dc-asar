<div class="slid_banner">
			<div class="slid">
					<section class="sliders" >
						<div class="slider__item">
								<img src="/images/slider/slide1.jpg" alt="">
						</div>
						<div class="slider__item">
								<img src="/images/slider/slide1.jpg" alt="">
						</div>
						<div class="slider__item">
								<img src="/images/slider/slide1.jpg" alt="">
						</div>
					</section>	
			</div>
		</div>
			<div class="content_osnovnoi">
				<div class="content">
					<div class="o_clube_txt">
						<?=$data['Discount']['body'];?>
					</div>
					<div class="map_vk card_underline">
						<div class="contact_card">
							<div class="contact">
								<p><span>Наш сайт: </span>-asar.kz</p>
								<p><span>Телефоны: </span><?=$data['Company']['phone'];?></p>
								<p><span>Время работы: </span>- 10:00-18:30</p>
								<p><span>Адрес: </span><?=$data['Company']['address'];?></p>
							</div>
							<div class="card">
								<img src="/img/card.png" alt="" title=""/>
							</div>
						</div>
						<div class="map_bg">
							<div class="map">
							<div id="map" style="width: 100%; height: 400px;"></div>
							<script>
   DG.then(function () {
        var map = DG.map('map', {
            center: [51.159, 71.439],
            zoom: 7
        });
         map.locate({setView: true, watch: true})
            .on('locationfound', function(e) {
                DG.marker([e.latitude, e.longitude]).addTo(map);
                map.setZoom(15);
            })
            .on('locationerror', function(e) {
                console.log(e);
                alert("Location access denied.");
            });
<?php foreach($data as $item): ?>
        DG.marker([<?=$item['Discount']['coordinate_lat']?>, <?=$item['Discount']['coordinate_lng']?>]).addTo(map).bindPopup("<?=$item['Discount']['title']?>");
<?php endforeach ?>
    });
</script>
							</div>
						</div>
						<div class="vk">
							<img src="/img/vk.jpg" alt="" title=""/>
						</div>
					</div><!-- map_vk card_underline -->
					<div class="title">
						<h1>О клубе</h1>
						<p>Любой текст</p>
					</div>
					<ul class="glavnaia">
						<li>
							<div class="first_lvl">
								<img src="/img/tour.jpg" alt="" title=""/>
								<div class="poloska">
									<p>Туристическое агенство “Авентура”</p>
									<div class="discount">
										<p>50%</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div><!-- content -->
			</div><!-- content_osnovnoi -->