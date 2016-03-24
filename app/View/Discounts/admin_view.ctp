<div class=" admin_t">
	<h2><?=$data['Company']['title'];?> : Скидки</h2>
</div>
	<a class="admin_add" href="/admin/discounts/add/<?=$data['Company']['id'];?>">Добавить скидку</a>
<table>
	<tr>
		<th>ID</th>
		<th>Название</th>
		<th>Скидки</th>
		<th>Дествия</th>	
	</tr>
	<?php foreach ($data['Discount'] as $item) : ?>
	<tr>
		<td><?=$item['id'];?></td>
		<td><?=$item['title'];?></td>
		<td><a href="/admin/discounts/view/<?=$item['id'];?>">Скидки</a></td>
		<td><?php echo $this->Html->link('Редактировать', array('action' => 'edit', $item['id'])); ?> | 
		<?php echo $this->Form->postLink('Удалить', array('action' => 'delete', $item['id']), array('confirm' => 'Подтвердите удаление')) ?></td>
	</tr>
	<?php endforeach; ?>
</table>