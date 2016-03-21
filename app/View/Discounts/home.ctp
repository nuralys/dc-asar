<div class="slid_banner">
        <div class="slid_schetchik">
            <div class="slid">
                <section class="sliders" >
                    <div class="slider__item">
                            <img src="images/slider/slide1.jpg" alt="">
                    </div>
                    <div class="slider__item">
                            <img src="images/slider/slide1.jpg" alt="">
                    </div>
                    <div class="slider__item">
                            <img src="images/slider/slide1.jpg" alt="">
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
                <a href="polucheni_card.html" target="_blank" class="button1">Приобрести карту</a>
            </div>
       </div>
       <div class="banner_border">
           <div class="banner">
                <img src="img/banner.jpg" alt="" title=""/>
           </div>
       </div>
    </div>
    <div class="content_osnovnoi">
        <div class="title">
            <h1>Скидки</h1>
            <p>Любой текст</p>
            <div class="soc_seti glav">
                <ul>
                    <li><img src="img/klass.png" alt="" title=""/></li>
                    <li><img src="img/facebook.png" alt="" title=""/></li>
                    <li><img src="img/vk.png" alt="" title=""/></li>
                    <li><img src="img/twitter.png" alt="" title=""/></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <ul class="glavnaia">
            <?php foreach($data as $item): ?>
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
                    <img src="img/vk.jpg" alt="" title=""/>
                </div>
            </div>
        </div>
    </div>
</div>