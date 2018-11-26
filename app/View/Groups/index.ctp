<div id="content">	
	<h2><?php echo __('Categorías de productos');?></h2>			
	<div id="scroll">
		<div class="grupo">				
			<?php echo $this->Html->link($this->Html->image('todos.png',array('title'=> 'Todos los productos')),
						array('controller'=>'products', 'action' =>'index'), array('escape'=>false));?>
			<center>Todos los productos</center>
		</div>		
		<?php foreach ($groups as $group): ?>
		<div class="grupo">			
			<?php echo $this->Html->link($this->Html->image('/files/groups/'.$group['Group']['id'].STANDARD,array('title'=>$group['Group']['name'])),
				array('controller'=>'groups', 'action' =>'view',$group['Group']['id']), array('escape'=>false));?>
			<center><?php echo h($group['Group']['name']); ?>&nbsp;</center>
		</div>		
	<?php endforeach; ?>
	</div>	
</div>
