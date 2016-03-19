<div class="content">
				<div class="news_item">
					<div class="date"><?=$post['News']['date'] ?></div>
					<div class="news_item_img">
						<a href=""><img src="/img/news/<?=$post['News']['img']?>" alt=""></a>
						<div class="news_item_img_shadow">
						
						</div>
					</div>
					<div class="news_item_title"><h1>	<?=$post['News']['title'] ?></h1></div>

					<div class="news_item_des">
						<?=$post['News']['body'] ?>
					</div>
					<div id="hypercomments_widget"></div>
<script type="text/javascript">
_hcwp = window._hcwp || [];
_hcwp.push({widget:"Stream", widget_id: 67140});
(function() {
if("HC_LOAD_INIT" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/67140/"+lang+"/widget.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>
				</div>
			</div>
			<?php echo $this->element('sidebar'); ?>