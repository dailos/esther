<div id='breadcrumb'>
<?php 
	echo $this->Html->link('Inicio','/') ;		
	foreach ($breadcrumb as $item){
		echo ' > ' . $this->Html->link($item['name'],$item['url']);
		
	}	
?>
</div>