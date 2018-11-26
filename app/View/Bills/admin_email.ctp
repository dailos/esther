<div class="title">
	<div class="actions">
	<?php
	echo $this->Html->link($this->Html->image("back.png",array('title'=>'Volver a la factura')), array('action' => 'index'), array( 'escape' => false) );	
	?>
	</div>	
</div>
<div class="bills index">
<?php 
$date =date("d-m-Y",strtotime($bill['Bill']['date'])); 
echo $this->Html->script('ckeditor/ckeditor'); 
echo $this->Form->create('Bill', array('action'=>'email',  'inputDefaults' => array('label' => false,'div' => false)));
echo $this->Form->input('id',array('value'=>$bill['Bill']['id']));
echo $this->Form->hidden('reference',array('value'=>$bill['Bill']['reference']));
$hash = md5($bill['Bill']['id']);	
$url = Router::url('/', true).'bills/download/'. $bill['Bill']['id']."/".$hash;
$text = 'Estimado/a '.$bill['Company']['contactname'].':<br><br><br>';
$text .= 'Su factura nº ' . $bill['Bill']['reference'] . ' de <b>LICORES ALCODER CANARIAS, S.L.</b> con fecha ' . $date .' está lista para descargar en el siguiente enlace: ' . $this->Html->link($url,$url);
$text .= '<br><br><br>Reciba un cordial saludo'; 
$text .= '<br><br>Esther Bolaños<br><br> <center>Licores Alcoder Canarias, S.L.<br>Tlf 928 66 52 13<br>administracion@alcoder.es</center>';
?>

	<b>Enviar a:</b><br>
		<?php echo $this->Form->input('email',array('value'=>$bill['Company']['email'],'style'=>'width:300px;')); ?>
	<br><br><b>Mensaje:</b><br>
		<?php echo $this->Form->textarea('body',array('value'=>$text,'class'=>'ckeditor')); ?>					
<br>
<?php echo $this->Form->end('Enviar');?>
</div>