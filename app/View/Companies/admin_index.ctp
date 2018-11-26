<div class="actions">
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('add.png',array('title'=>'Crear')), array('action' => 'add'),array('escape' => false));?></li>							
	</ul>
</div>	
<div class="companies index">
	<table cellpadding="0" cellspacing="0">
	<tr>			
			<th><?php echo $this->Paginator->sort('companyname','Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('code','Código'); ?></th>
			<th><?php echo $this->Paginator->sort('contactname','Contacto'); ?></th>
			<th><?php echo $this->Paginator->sort('email','Email'); ?></th>
			<th>Última Fecha Factura</th>	
			<th>Estado</th>								
	</tr>
	<?php
	$i = 0;
	foreach ($companies as $company):
		$status = "seen"; 
		$date = null;
		foreach ($company['Bill'] as $bill){
			if($bill['seen'] == '') $status = 'sent';
			if($bill['date'] > $date ) $date = $bill['date'];						
		}
	
		echo $this->element('trclass',array('i' =>$i,'url' => 'view/'.$company['Company']['id'])); ?>	
		<td><?php echo h($company['Company']['companyname']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['code']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['contactname']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['email']); ?>&nbsp;</td>	
		<td><?php echo h(date("d-m-Y",strtotime($date))); ?>&nbsp;</td>	
		<td class="<?php echo $status;?>"> &nbsp;</td>				
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginator'); ?>
</div>

