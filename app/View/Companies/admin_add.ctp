<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('back.png',array('title'=>'Volver')), array('action' => 'index'),array('escape' => false));?></li>
	</ul>
</div>
<div class="companies form">
<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Añadir Cliente'); ?></legend>
	<?php
		echo $this->Form->input('companyname',array('label'=>'Nombre'));
		echo $this->Form->input('code',array('label'=>'Código'));
		echo $this->Form->input('contactname',array('label'=>'Contacto'));
		echo $this->Form->input('email',array('label'=>'Email'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

