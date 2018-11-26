<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>		
		<li><?php echo $this->Html->link($this->Html->image('del.png',array('title'=>'Eliminar')), array('action' => 'delete', $this->Form->value('Group.id')),array('escape' => false), sprintf('¿Seguro que desea eliminar el grupo?'));?></li>							
	</ul>
</div>			
<div class="groups form">
	<h2><?php echo $this->Form->value('Group.name')?></h2>
	<div class="admin_image">	
		<?php
		if(file_exists(GROUPS_PATH.$this->Form->value('Group.id').STANDARD))
			echo $this->Html->image('/files/groups/'.$this->Form->value('Group.id').STANDARD);
		else 
			echo $this->Html->image('noimage_medium.png');
		
		echo $this->Form->create('Group', array('action' => "upload" ,'type'=>'file','inputDefaults' => array('label' => false,'div' => false))); 
		echo $this->Form->hidden('id',array('value'=>$this->Form->value('Group.id')));	
		echo $this->Form->file('file');		
		echo $this->Form->end('Subir y redimensionar');
			
		echo $this->Form->create('Group');
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('description',array('label'=>'Descripción'));
		echo $this->Form->end(__('Guardar'));
		?>								
	</div>
		
	<div class="form_data">					
		<h3>Productos</h3>
		<table cellpadding="0" cellspacing="0">
			<tr>
					<th><?php echo 'Miniatura';?></th>
					<th><?php echo 'Nombre';?></th>
					<th><?php echo 'Referencia';?></th>										
			</tr>
			<?php
			$i = 0;			
			foreach ($this->request->data['Product'] as $product): 							
			 	$found = false;				 	
				echo $this->element('trclass',array('i' =>$i,'url' => '/admin/products/edit/'.$product['id'])); 
				?>
				<td><?php 
					foreach ($product['Format'] as $format){							
						if(file_exists(PRODUCTS_PATH.$format['FormatsProduct']['id'].THUMB)){
							if(!$found)$found = $format['FormatsProduct']['id']; 								
						}
					}			
					if($found) echo $this->Html->image('/files/products/'.$found.THUMB);
					else echo $this->Html->image('noimage_small.png');?></td>
				<td><?php echo h($product['name']); ?>&nbsp;</td>
				<td><?php echo h($product['reference']); ?>&nbsp;</td>						
			</tr>				
			<?php  endforeach; ?>
		</table>
	</div>
</div>
