<?php //debug($discounts) ?>
<div class="title">
	<h1><?=$category['Category']['title'] ?></h1>
	<p>Любой текст</p>
	<div class="soc_seti glav">
		<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,counter,theme=01" data-services="vkontakte,odnoklassniki,facebook,twitter,google"></div>
	</div>
</div>
<div class="content">
	<ul class="glavnaia">
	<?php foreach($discounts as $item): ?>
		<li>
			<div class="first_lvl">
				<a href="/discount/<?=$item['Discount']['alias']?>" title="<?php echo $item['Discount']['title'] ?>"><img src="/img/discounts/thumbs/<?=$item['Discount']['img']?>" alt="<?php echo $item['Discount']['title'] ?>" title="<?php echo $item['Discount']['title'] ?>"></a>
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

	<!-- <div class="page_schet">
						
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
	</div> -->
	<div class="map_vk">
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
<?php foreach($discounts as $item): ?>
        DG.marker([<?=$item['Discount']['coordinate_lat']?>, <?=$item['Discount']['coordinate_lng']?>]).addTo(map).bindPopup("<?=$item['Discount']['title']?>");
<?php endforeach ?>
    });
</script>
                    </div>
                </div>
                <div class="vk">
                    <img src="/img/vk.jpg" alt="" title=""/>
                </div>
            </div>