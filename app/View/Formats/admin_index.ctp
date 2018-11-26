<div class="actions">
		<ul>
			<li><?php echo $this->Html->link($this->Html->image('add.png',array('title'=>'Crear')), array('action' => 'add'),array('escape' => false));?></li>							
		</ul>
</div>	
<div class="formats index">	
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('name','Nombre');?></th>
		<th><?php echo $this->Paginator->sort('description','Descripción');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($formats as $format): ?>
	<?php echo $this->element('trclass',array('i' =>$i,'url' => 'edit/'.$format['Format']['id'])); ?>
		<td><?php echo h($format['Format']['name']); ?>&nbsp;</td>
		<td><?php echo h($format['Format']['description']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginator'); ?>
</div>
