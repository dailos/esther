<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>					
		<li><?php echo $this->Html->link($this->Html->image('del.png',array('title'=>'Eliminar')),array('action' => 'delete', $this->Form->value('Company.id')),array('escape' => false),sprintf('¿Seguro que desea eliminar al cliente?'));?></li>						
	</ul>
</div>
<div class="companies form">
<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Editar Cliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('companyname',array('label'=>'Nombre'));
		echo $this->Form->input('code',array('label'=>'Código'));
		echo $this->Form->input('contactname',array('label'=>'Contacto'));
		echo $this->Form->input('email',array('label'=>'Email'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

