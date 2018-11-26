<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>											
	</ul>
</div>	
<div class="products form">	
	<h2>Redimensionar fotos:</h2>	
	<?php
		echo $this->Form->create('Product');
		echo $this->Form->input('start',array('label'=>'Comienzo'));
		echo $this->Form->input('nelements',array('label'=>'Nº Elementos'));			
		echo $this->Form->end('Redimensionar');	
	?>
</div>	
					