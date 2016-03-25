<div class="slid_banner">
        <div class="slid_schetchik">
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
            <div class="schetchik">
                <div class="schet">
                    <div class="karta_schet">
                            <div class="timer">
                                <span>1043</span>
                          </div>
                          <p>Клиентов</p>
                    </div>
                    <div class="karta_priobresti">
                        <div class="timer">
                                <span>4043</span>
                          </div>
                          <p>Партнеров</p>
                    </div>
                </div>
                <a href="/page/get_card" class="button1">Приобрести карту</a>
            </div>
       </div>
       <div class="banner_border">
           <div class="banner">
                <img src="/img/banner.jpg" alt="" title=""/>
           </div>
       </div>
    </div>
    <div class="content_osnovnoi">
        <div class="title">
            <h1>Скидки</h1>
            <p>Любой текст</p>
            <div class="soc_seti glav">
                <ul>
                    <li><img src="/img/klass.png" alt="" title=""/></li>
                    <li><img src="/img/facebook.png" alt="" title=""/></li>
                    <li><img src="/img/vk.png" alt="" title=""/></li>
                    <li><img src="/img/twitter.png" alt="" title=""/></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <ul class="glavnaia">
            <?php foreach($data as $item): ?>
                <li>
                    <div class="first_lvl">
                        <a href="/discount/<?=$item['Discount']['alias']?>"><img src="/img/discounts/thumbs/<?=$item['Discount']['img']?>" alt="<?php echo $item['Discount']['title'] ?>" title="<?php echo $item['Discount']['title'] ?>"/></a>
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
            <div class="map_vk">
                <div class="map_bg">
                    <div class="map">
                        <div id="map" style="width: 100%; height: 400px;"></div>

  <script>
   DG.then(function () {
        var map = DG.map('map', {
            center: [51.159, 71.439],
            zoom: 11
        });
         map.locate({setView: true, watch: true})
            .on('locationfound', function(e) {
                DG.marker([e.latitude, e.longitude]).addTo(map);
                map.setZoom(11);
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
            </div>
        </div>
    </div>
</div>