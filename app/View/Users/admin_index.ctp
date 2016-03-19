<div class="title admin_t">
	<h2>Список пользователей</h2>
</div>
	
<table>
	<tr>
		<th>ID</th>
		<th>Логин</th>
		<th>ФИО</th>
		<th>Дата регистрации</th>
		<th>Дествия</th>	
	</tr>
	<?php foreach ($data as $item) : ?>
	<tr>
		<td><?=$item['User']['id'];?></td>
		<td><?=$item['User']['username'];?></td>
		<td><?=$item['User']['fio'];?></td>
		<td><?=$item['User']['created'];?></td>
		<td><?php echo $this->Html->link('Редактировать', array('action' => 'edit', $item['User']['id'])); ?> | 
		<?php echo $this->Form->postLink('Удалить', array('action' => 'delete', $item['User']['id']), array('confirm' => 'Подтвердите удаление')) ?></td>
	</tr>
	<?php endforeach; ?>
</table>