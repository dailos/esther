<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>
	</ul>
</div>	
<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
		<legend><?php echo __('Añadir Producto'); ?></legend>		
	<?php
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('reference', array('label'=>'Referencia'));
		echo $this->Form->input('description', array('label'=>'Descripción'));
		echo $this->Form->input('Format', array('label'=>'Formato'));
		echo $this->Form->input('Group', array('label'=>'Grupo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear'));?>
</div>

