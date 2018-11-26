<div id="header">
	<div id="logo">
		<?php echo $this->Html->image("logo.png",array('title'=> 'Licores Alcoder'));?>
	</div>
	<div id="search">	
		<?php 
			if($searched) echo $this->Html->link('Cancelar búsqueda',array('controller'=>'groups'), array('class'=>'cancelarbusqueda'));
			else echo "<a href=\"#\" onclick=\"Effect.toggle('optionsearch', 'slide'); return false;\">Buscar productos</a>";
		?>			
		<div id="optionsearch" style="display:none;">		
			<?php  
			echo $this->Form->create('Product',array('action' => 'search')); 
			echo $this->Form->input('search',array('label'=> false,'value'=>''));		
			 echo $this->Form->submit('Buscar');												
			?>					
		</div>			
	</div>	
</div>	