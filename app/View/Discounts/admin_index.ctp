<div class=" admin_t">
	<h2>Скидки</h2>
</div>
	<a class="admin_add"href="discounts/add">Добавить скидку</a>
<table>
	<tr>
		<th>ID</th>
		<th>Название</th>
		<th>Дествия</th>	
	</tr>
	<?php foreach ($data as $item) : ?>
	<tr>
		<td><?=$item['Discount']['id'];?></td>
		<td><?=$item['Discount']['title'];?></td>
		<td><?php echo $this->Html->link('Редактировать', array('action' => 'edit', $item['Discount']['id'])); ?> | 
		<?php echo $this->Form->postLink('Удалить', array('action' => 'delete', $item['Discount']['id']), array('confirm' => 'Подтвердите удаление')) ?></td>
	</tr>
	<?php endforeach; ?>
</table>