<div class=" admin_t">
	<h2>Список компании</h2>
</div>
	<a class="admin_add"href="companies/add">Добавить компанию</a>
<table>
	<tr>
		<th>ID</th>
		<th>Название</th>
		<th>Скидки</th>
		<th>Дествия</th>	
	</tr>
	<?php foreach ($data as $item) : ?>
	<tr>
		<td><?=$item['Company']['id'];?></td>
		<td><?=$item['Company']['title'];?></td>
		<td><a href="/admin/discounts/view/<?=$item['Company']['id'];?>">Скидки</a></td>
		<td><?php echo $this->Html->link('Редактировать', array('action' => 'edit', $item['Company']['id'])); ?> | 
		<?php echo $this->Form->postLink('Удалить', array('action' => 'delete', $item['Company']['id']), array('confirm' => 'Подтвердите удаление')) ?></td>
	</tr>
	<?php endforeach; ?>
</table>