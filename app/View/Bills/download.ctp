<div id="content">
	<h1><?php echo "Descarga de factura"?></h1>		
	<b><?php echo "Su factura nº ".$bill['Bill']['reference']." con fecha ". $bill['Bill']['date']." está lista para descargar."; ?></b>
	<br><br>
	<b>Para proceder con la descarga pulse en el icono PDF. Su navegador le preguntará si desea guardar el fichero. Deberá permitir la descarga.</b>	
	<br><br><br>
	<center><?php echo $this->Html->link($this->Html->image("pdfbig.png",array('title'=>'Descargar pdf')), array('controller' => 'bills', 'action' => 'download',  $bill['Bill']['id'],$hash,1),array('escape' => false));?></center>
	<br><br><br>
	<b>Nota: </b>Esta descarga es confidencial y sólo accesible mediante el link enviado mediante correo electrónico. Dicho link no podrá ser compartido sin nuestro consentimiento.
	<br><br>
</div>
		
	
