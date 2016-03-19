<div class="title">Поиск модели по параметрам</div>

<div class="search_model"> 
	<form action="/models/search" id="ModelSearchForm" method="get" accept-charset="utf-8">
		<div class="search_model_input">
			<label for="">ФИО</label>
			<input name="fio" type="text" class="search_model_f">
		</div>
		<div class="search_model_input">
			<label for="">ВОЗРАСТ</label>
			<input name="from" type="text" class="search_model_f age" placeholder="OT">-
			<input name="to" type="text" class="search_model_f age" placeholder="ДО">
		</div>
		<div class="search_model_input">
			<label for="">НОМЕР #ID</label>
			<input name="id" type="text" class="search_model_f id">
		</div>
		<div class="submit"><input type="submit" value="Найти"></div>
	</form>
</div>