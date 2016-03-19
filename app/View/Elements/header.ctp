<header>	
	<div class="top_line">
		<div class="cr">
			<div class="top_menu">
				<ul>
					<li><a href="/">Главная</a></li>
					<li><a href="/page/free_coupons">Бесплатные купоны</a></li>
					<li><a href="/page/cardholders">Держателям карт</a></li>
					<li><a href="/page/for_partners">Партнерам</a></li>
					<li><a href="/page/about">О клубе</a></li>
					<li><a href="/page/marketing">Маркетинг</a></li>
				</ul>
			</div>
			<div class="m_menu"></div>
			<div class="mob_part">
				<ul class="mob_ul">
					<li><a href="/">Главная</a></li>
					<li><a href="/page/free_coupons">Бесплатные купоны</a></li>
					<li><a href="/page/cardholders">Держателям карт</a></li>
					<li><a href="/page/for_partners">Партнерам</a></li>
					<li><a href="/page/about">О клубе</a></li>
					<li><a href="/page/marketing">Маркетинг</a></li>
				</ul>
				<div class="mob_close"></div>
			</div>
			<div class="auto">
				<ul>
				<?php if($logged_user): ?>
					<li>Добро пожаловать, <?php echo $logged_user['username'] ?></li>
					<li><a href="/users/logout"><i class="fa fa-sign-out"></i>Выход</a></li>
					<?php else: ?>
					<li><a href="#modal1" id="go" class="open_modal"><i class="fa fa-user"></i>Регистрация</a></li>
					<li><a href="/users/login"><i class="fa fa-sign-out"></i>Вход</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="logo_poisk_bg">
		<div class="cr">
			<div class="logo_poisk">
				<div class="logo">
					<a href="index.html"><img src="/img/logo.png" alt=""/></a>
				</div>
				<div class="poisk">
					<form action="/search">
						<input type="text" name="q" class="search rounded" placeholder="Искать...">
						<button type="submit">Найти</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="menu_bg">
		<div class="cr">
			<div class="menu" id="nav">
				<ul class="menu_display">
					<?php echo $cat_menu; ?>
				</ul>
				<script>
				  var navigation = responsiveNav("#nav", {
					insert: "before"
				  });
				</script>
			</div>
		</div>
	</div>
</header>