<table>
	<tr>			
		<th>Nº Factura</th>
		<th>Fecha</th>			
		<th>Cliente</th>
		<th>Enviada</th>
		<th>Descargada</th>		
	</tr>
<?php foreach ($bills as $bill): ?>
	<tr>
		<td><?php echo h($bill['Bill']['reference']); ?>&nbsp;</td>
		<td><?php echo h(date("d-m-Y",strtotime($bill['Bill']['date']))); ?>&nbsp;</td>		
		<td><?php echo h($bill['Company']['companyname']); ?>&nbsp;</td>
		<td><?php if ($bill['Bill']['sent']) echo h(date("d-m-Y H:i:s",strtotime($bill['Bill']['sent']))); ?>&nbsp;</td>
		<td><?php if( $bill['Bill']['seen']) echo h(date("d-m-Y H:i:s",strtotime($bill['Bill']['seen']))); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
</table>