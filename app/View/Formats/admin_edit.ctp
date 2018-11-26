<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>					
		<li><?php echo $this->Html->link($this->Html->image('del.png',array('title'=>'Eliminar')),array('action' => 'delete', $this->Form->value('Format.id')),array('escape' => false),sprintf('¿Seguro que desea eliminar el formato?'));?></li>						
	</ul>
</div>	
<div class="formats form">
<?php echo $this->Form->create('Format');?>
	<fieldset>
		<legend><?php echo __('Editar Formato'); ?></legend>					
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name',array('label'=>'Nombre'));
			echo $this->Form->input('description',array('label'=>'Descripción'));		
		?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>

