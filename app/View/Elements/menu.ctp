<?php 
	$cont = $this->params['controller'];
	if(count($this->params['pass'])) $act =  $this->params['pass'][0];	
	$home = $laempresa = $productos = $contacto =  "";	
	if($cont =='pages'){		
		if($act == "home") $home = 'active_tab';
		else if($act == "laempresa") $laempresa = 'active_tab';
		else if($act == "contacto") $contacto = 'active_tab';		
	}else{
		$productos = 'active_tab';
	}
?>

<div id="menu">
	<ul id="menu-horizontal">
		<li class="<?php echo $home;?>" ><?php echo $this->Html->link('INICIO',array('controller'=>'pages','action'=>'display','home'));?></li>
		<li class="<?php echo $laempresa;?>" ><?php echo $this->Html->link('LA EMPRESA',array('controller'=>'pages','action'=>'display','laempresa'));?></li>
		<li class="<?php echo $productos;?>" ><?php echo $this->Html->link('PRODUCTOS',array('controller'=>'groups','action'=>'index'));?></li>	
		<li class="<?php echo $contacto;?>" ><?php echo $this->Html->link('CONTACTO',array('controller'=>'pages','action'=>'display','contacto'));?></li>
	</ul>
</div>
