<div class="actions">
	<?php
	echo $this->Html->link($this->Html->image("back.png"), array('action' => 'index'), array( 'escape' => false) );		
	echo $this->Html->link($this->Html->image('edit.png'),array( 'action'=>'edit', $company['Company']['id']),array('escape'=>false));	 
	echo $this->Html->link($this->Html->image("del.png"), array('action' => 'delete',  $company['Company']['id']),array('escape' => false), sprintf(__('¿Seguro que desea eliminar al cliente?', true), $company['Company']['id']));		
	?>
</div>		

<div class="companies view">

	<div class="admin_image">			
		<h2><?php echo $company['Company']['companyname']; ?></h2>
		<dl><?php $i = 0; $class = ' class="altrow"';?>				
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Código'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $company['Company']['code']; ?>
				&nbsp;
			</dd>		
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Contacto'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $company['Company']['contactname']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php  echo $company['Company']['email'];?>
				&nbsp;
			</dd>
		</dl>			
	</div>

	<div class="form_data">
		<h3>Subir nueva factura</h3>
		<?php 
			echo $this->Form->create('Bill', array('action'=>'upload', 'type'=>'file','inputDefaults' => array('label' => false,'div' => false))); 
	 		echo $this->Form->file('file');
	 		echo $this->Form->hidden('company_id',array('value'=>$company['Company']['id']));
			echo $this->Form->end('Subir factura');
		?>		
	</div>
	<h3>Listado de facturas</h3>
	<table cellpadding="0" cellspacing="0">
	<tr>			
			<th>Nº Factura</th>
			<th>Fecha</th>			
			<th>Enviada</th>
			<th>Descargada</th>
			<th>Ver</th>
			<th>Enviar</th>
			<th>Eliminar</th>
	</tr>
	<?php
	foreach ($company['Bill'] as $bill): 
		if($bill['seen'] != '') $status = 'seen';
		else if($bill['sent'] != '') $status = 'sent';
		else $status = 'pending';
	?>
	<tr class="<?php echo $status; ?>">
		<td><?php echo h($bill['reference']); ?>&nbsp;</td>
		<td><?php echo h(date("d-m-Y",strtotime($bill['date']))); ?>&nbsp;</td>		
		<td><?php echo h(date("d-m-Y H:i:s",strtotime($bill['sent']))); ?>&nbsp;</td>
		<td><?php echo h(date("d-m-Y H:i:s",strtotime($bill['seen']))); ?>&nbsp;</td>
		<td><a href="http://docs.google.com/viewer?url=<?php echo rawurlencode(BILL_URL.$bill['name']); ?>" width="600" height="780" style="border: none;"><?php echo $this->Html->image("pdf.png",array('title'=>'Ver'));?></a></td>	
		<td><?php echo $this->Html->link($this->Html->image("email.png",array('title'=>'Enviar')), array('controller'=>'bills', 'action' => 'email', $bill['id']),array( 'escape' => false),null); ?></td>		
		<td><?php echo $this->Form->postLink($this->Html->image("del.png",array('title'=>'Eliminar')), array('controller' =>'bills','action' => 'delete', $bill['id']), array( 'escape' => false), __('Seguro que desea eliminar la factura?')); ?></td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>