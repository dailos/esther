<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>
	</ul>
</div>	
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Añadir Usuario'); ?></legend>			
	<?php
		echo $this->Form->input('username',array('label'=>'Nombre de usuario'));
		echo $this->Form->input('password',array('label'=>'Clave'));
		echo $this->Form->input('name',array('label'=>'Nombre'));
		echo $this->Form->input('email',array('label'=>'Email'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
