<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('add.png',array('title'=>'Crear')), array('action' => 'add'),array('escape' => false));?></li>	
		<li><?php echo $this->Html->link($this->Html->image('inf.png',array('title'=>'Redimensionar todo')), array('action' => 'resizeAll'),array('escape' => false));?></li>
		<li><?php echo $this->Html->link($this->Html->image('sort.png',array('title'=>'Reordenar')), array('action' => 'sort'),array('escape' => false));?></li>						
	</ul>
</div>
<div class="groups index">	

	<div id="main">
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo 'Miniatura';?></th>
				<th><?php echo $this->Paginator->sort('name','Nombre');?></th>					
				<th><?php echo 'N. Productos';?></th>		
				<th><?php echo $this->Paginator->sort('order','Posición');?></th>	
		</tr>
		<?php
		$i = 0;		
		foreach ($groups as $group):
			 $nproduct = count($group['Product']); 				
			 echo $this->element('trclass',array('i' =>$i,'url' => 'edit/'.$group['Group']['id'])); ?>
			<td><?php if(file_exists(GROUPS_PATH.$group['Group']['id'].THUMB))
							echo $this->Html->image('/files/groups/'.$group['Group']['id'].THUMB);
					   else echo $this->Html->image('noimage_small.png');?></td>
			<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
			<td><?php echo $nproduct; ?>&nbsp;</td>
			<td><?php echo h($group['Group']['order']); ?>&nbsp;</td>
			
		</tr>
	<?php endforeach; ?>
		</table>
		<?php echo $this->element('paginator'); ?>	
	</div>
</div>
	


