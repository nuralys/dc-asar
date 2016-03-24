<div class="slid_banner">
	<div class="slid">
			<section class="sliders" >
				<div class="slider__item">
						<img src="/img/discounts/<?=$data['Discount']['img'];?>" alt="<?=$data['Discount']['title'];?>">
				</div>
				
			</section>	
	</div>
</div>
<div class="title">
	<h1><?=$data['Discount']['title'] ?></h1>
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
<div class="content_osnovnoi">
	<div class="content">
		<div class="o_clube_txt">
			<?=$data['Discount']['body'];?>
		</div>
		<div class="map_vk card_underline">
			<div class="contact_card">
				<div class="contact">
				<?php if($data['Company']['website']): ?>
					<p><span>Наш сайт: </span><?=$data['Company']['website']?></p>
				<?php endif; ?>
				<?php if($data['Company']['phone']): ?>
					<p><span>Телефоны: </span><?=$data['Company']['phone'];?></p>
					<?php endif; ?>
				<?php if($data['Company']['working_hours']): ?>
					<p><span>Время работы: </span><?=$data['Company']['working_hours']?></p>
				<?php endif; ?>
				<?php if($data['Company']['address']): ?>
					<p><span>Адрес: </span><?=$data['Company']['address'];?></p>
				<?php endif; ?>
				</div>
				<div class="card">
					<img src="/img/card.png" alt="Как получить дисконтную карточку" title=""/>
				</div>
			</div>
			<div class="map_bg">
				<div class="map">
				 <div id="map" style="width: 100%; height: 400px;"></div>
<div id="location">
LatLng(54.98, 82.89)
</div>
<script>
DG.then(function () {
var map = DG.map('map', {
center: [51.159, 71.439],
zoom: 15
});
map.locate({setView: true, watch: true})
.on('locationfound', function(e) {
    DG.marker([e.latitude, e.longitude]).addTo(map).bindPopup("Мое примерное местоположение");
    map.setZoom(11);
})
.on('locationerror', function(e) {
    console.log(e);
    alert("Location access denied.");
});

DG.marker([<?=$data['Discount']['coordinate_lat']?>, <?=$data['Discount']['coordinate_lng']?>]).addTo(map).bindPopup("<?=$data['Discount']['title']?>");

});
</script>
				</div>
			</div>
			<div class="vk">
				<img src="/img/vk.jpg" alt="" title=""/>
			</div>
		</div><!-- map_vk card_underline -->
	</div><!-- content -->
</div><!-- content_osnovnoi -->