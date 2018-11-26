<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>
		<li><?php echo $this->Html->link($this->Html->image('del.png',array('title'=>'Eliminar')), array('action' => 'delete', $this->Form->value('User.id')),array('escape' => false), sprintf('¿Seguro que desea eliminar al usuario?'));?></li>							
	</ul>
</div>	
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Editar Usuario'); ?></legend>
			
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username',array('label'=>'Nombre de usuario'));	
		echo $this->Form->input('password', array('label'=>'Clave','value' =>''));
		echo $this->Form->input('name',array('label'=>'Nombre'));
		echo $this->Form->input('email',array('label'=>'Email'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>

