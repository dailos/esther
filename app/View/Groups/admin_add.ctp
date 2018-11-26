<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>
	</ul>
</div>		
<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php echo __('Añadir Grupo'); ?></legend>		
	<?php
		echo $this->Form->input('name',array('label'=>'Nombre'));
		echo $this->Form->input('description',array('label'=>'Descripción'));	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Aceptar'));?>
</div>

