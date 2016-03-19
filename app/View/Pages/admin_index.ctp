<div class="title admin_t">
	<h2>Страницы</h2>
</div>

<table>
	<tr>
		<th>ID</th>
		<th>Название</th>
		<th>Дествие</th>	
	</tr>
	<?php foreach ($data as $item) : ?>
	<tr>
		<td><?=$item['Page']['id'];?></td>
		<td><?=$item['Page']['title'];?></td>
		<td><?php echo $this->Html->link('Редактировать', array('action' => 'edit', $item['Page']['id'])); ?></td>
	</tr>
	<?php endforeach; ?>
</table>