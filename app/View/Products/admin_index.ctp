<?php if(!$isAjax):?>
<div class="actions">
	<ul>			
		<li><?php echo $this->Html->link($this->Html->image('add.png',array('title'=>'Crear')), array('action' => 'add'),array('escape' => false));?></li>	
		<li><?php echo $this->Html->link($this->Html->image('inf.png',array('title'=>'Redimensionar')), array('action' => 'resizen'),array('escape' => false));?></li>							
	</ul>
</div>
	
<div class="products index">		
	<?php echo $this->element('adminsearch');?>	
<?php endif;?>
	<div id="main">
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo 'Miniatura';?></th>
				<th><?php echo $this->Paginator->sort('name','Nombre');?></th>
				<th><?php echo $this->Paginator->sort('reference','Referencia');?></th>			
				<th><?php echo 'Grupos';?></th>
				<th><?php echo 'Formatos';?></th>	
				<th><?php echo 'Formatos con foto';?></th>			
		</tr>
		<?php
		$i = 0;
		foreach ($products as $product): 
		 	$found = false;
		 	$nproducts = 0;
		 	$nimage = 0;
			echo $this->element('trclass',array('i' =>$i,'url' => 'edit/'.$product['Product']['id'])); 
			?>
			<td><?php 
				foreach ($product['Format'] as $format){
					$nproducts++;
					if(file_exists(PRODUCTS_PATH.$format['FormatsProduct']['id'].THUMB)){
						if(!$found)$found = $format['FormatsProduct']['id']; 
						$nimage++;
					}
				}			
				if($found) echo $this->Html->image('/files/products/'.$found.THUMB);
				else echo $this->Html->image('noimage_small.png');?></td>
			<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
			<td><?php echo h($product['Product']['reference']); ?>&nbsp;</td>
			<td><?php foreach ($product['Group'] as $group){
					   	 echo $group['name'].', ';	
			} 

			?>&nbsp;</td>		
			
			<td><?php echo $nproducts; ?>&nbsp;</td>		
			<td><?php echo $nimage; ?>&nbsp;</td>		
		</tr>
	<?php endforeach; ?>
		</table>
		<?php echo $this->element('paginator'); ?>
	</div>
<?php if(!$isAjax):?>
</div>
<?php endif;?>
