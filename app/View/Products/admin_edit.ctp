<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>	
		<li><?php echo $this->Html->link($this->Html->image('del.png',array('title'=>'Eliminar')), array('action' => 'delete',$this->Form->value('Product.id') ),array('escape' => false), sprintf('¿Seguro que desea eliminar el producto?'));?></li>										
	</ul>
</div>	
<div class="products form">	
<h2><?php echo $this->Form->value('Product.name')?></h2>
	<div class="admin_image">	
	<?php
		echo $this->Form->create('Product');
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('reference', array('label'=>'Referencia'));
		echo $this->Form->input('description', array('label'=>'Descripción'));
		echo $this->Form->input('Group', array('label'=>'Grupos'));
		echo $this->Form->input('Format', array('label'=>'Formatos habilitados'));		
		echo $this->Form->end('Guardar');	
	?>
	</div>	
					
	<div class="form_data">							
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo 'Miniatura';?></th>
				<th><?php echo 'Formato';?></th>	
				<th><?php echo 'Subir';?></th>					
			</tr>
			<?php foreach ($this->request->data['Format'] as $format): ?>
			<tr>	
				<td>
				<?php 
				if(file_exists('files/products/'.$format['FormatsProduct']['id'].THUMB))
					echo $this->Html->image('/files/products/'.$format['FormatsProduct']['id'].THUMB);
				else 
					echo $this->Html->image('noimage_small.png');
				?>
				</td>
				
				<td><?php echo h($format['name']); ?>&nbsp;</td>	
				
				<td>	
				<?php 
				echo $this->Form->create('Product', array('action' => "upload" ,'type'=>'file','inputDefaults' => array('label' => false,'div' => false))); 
				echo $this->Form->hidden('id',array('value'=>$format['FormatsProduct']['id']));
				echo $this->Form->hidden('product_id',array('value'=>$this->Form->value('Product.id')));	
				echo $this->Form->file('file');
				echo $this->Form->end('Subir y redimensionar');
				?>  		
				</td>									
			</tr>		 				 			 			 	
			<?php endforeach;?>
		</table>			
	</div>
</div>