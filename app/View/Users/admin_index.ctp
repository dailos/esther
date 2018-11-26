<div class="actions">
		<ul>
			<li><?php echo $this->Html->link($this->Html->image('add.png',array('title'=>'Crear')), array('action' => 'add'),array('escape' => false));?></li>							
		</ul>
	</div>
<div class="users index">	
	<table cellpadding="0" cellspacing="0">
	<tr>			
			<th><?php echo $this->Paginator->sort('username','Usuario');?></th>		
			<th><?php echo $this->Paginator->sort('name','Nombre');?></th>
			<th><?php echo $this->Paginator->sort('email','Email');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user): ?>
	<?php echo $this->element('trclass',array('i' =>$i,'url' => 'edit/'.$user['User']['id'])); ?>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>	
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>		
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginator'); ?>
</div>

