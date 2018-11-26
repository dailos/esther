<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('lista.png',array('title'=>'listado')), array('action' => 'pdf'),array('escape' => false));?></li>							
	</ul>
</div>	
<div class="bills index">
	<table cellpadding="0" cellspacing="0">
	<tr>			
			<th><?php echo $this->Paginator->sort('reference','Nº Factura'); ?></th>
			<th><?php echo $this->Paginator->sort('date','Fecha'); ?></th>			
			<th><?php echo $this->Paginator->sort('company_id','Cliente'); ?></th>
			<th><?php echo $this->Paginator->sort('sent','Enviada'); ?></th>
			<th><?php echo $this->Paginator->sort('seen','Descargada'); ?></th>
			<th><?php echo __('Ver'); ?></th>
			<th><?php echo __('Enviar'); ?></th>
			<th><?php echo __('Eliminar'); ?></th>
	</tr>
	<?php
	foreach ($bills as $bill): 
		if($bill['Bill']['seen'] != '') $status = 'seen';
		else if($bill['Bill']['sent'] != '') $status = 'sent';
		else $status = 'pending';
	?>
	<tr class="<?php echo $status; ?>">
		<td><?php echo h($bill['Bill']['reference']); ?>&nbsp;</td>
		<td><?php echo h(date("d-m-Y",strtotime($bill['Bill']['date']))); ?>&nbsp;</td>		
		<td><?php echo h($bill['Company']['companyname']); ?>&nbsp;</td>
		<td><?php if ($bill['Bill']['sent']) echo h(date("d-m-Y H:i:s",strtotime($bill['Bill']['sent']))); ?>&nbsp;</td>
		<td><?php if( $bill['Bill']['seen']) echo h(date("d-m-Y H:i:s",strtotime($bill['Bill']['seen']))); ?>&nbsp;</td>
		<td><a href="http://docs.google.com/viewer?url=<?php echo rawurlencode(BILL_URL.$bill['Bill']['name']); ?>" width="600" height="780" style="border: none;"><?php echo $this->Html->image("pdf.png",array('title'=>'Ver'));?></a></td>		
		<td><?php echo $this->Html->link($this->Html->image("email.png",array('title'=>'Enviar')), array('action' => 'email', $bill['Bill']['id']),array( 'escape' => false),null); ?></td>		
		<td><?php echo $this->Form->postLink($this->Html->image("del.png",array('title'=>'Eliminar')), array('controller' =>'bills','action' => 'delete', $bill['Bill']['id']), array( 'escape' => false), __('Seguro que desea eliminar la factura?')); ?></td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginator'); ?>
</div>

