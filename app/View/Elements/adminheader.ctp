<?php 		
	$groups = $products = $formats = $users = $companies = $bills = '';
	if($this->params['controller'] =='groups') $groups = 'active_tab';
	else if($this->params['controller'] =='products') $products = 'active_tab';
	else if($this->params['controller'] =='formats') $formats = 'active_tab';
	else if($this->params['controller'] =='users') $users = 'active_tab';
	else if($this->params['controller'] =='companies') $companies = 'active_tab';
	else  $bills = 'active_tab';		
?>
<center>
<?php echo $this->Session->flash();?>
</center>	

<div class="mainmenu">
	<ul id="navigation" class="css_menu">	
		<li class="<?php echo $products;?>" ><?php echo $this->Html->link('Productos', array('controller'=>'products','action' =>'index'));?></li>				
		<li class="<?php echo $groups;?>" ><?php echo $this->Html->link('Grupos', array('controller'=>'groups','action' =>'index'));?></li>	
		<li class="<?php echo $formats;?>" ><?php echo $this->Html->link('Formatos', array('controller'=>'formats','action' =>'index'));?></li>		
		<li class="<?php echo $companies;?>" ><?php echo $this->Html->link('Clientes', array('controller'=>'companies','action' =>'index'));?></li>	
		<li class="<?php echo $bills;?>" ><?php echo $this->Html->link('Fac/Alb', array('controller'=>'bills','action' =>'index'));?></li>
		<li class="<?php echo $users;?>" ><?php echo $this->Html->link('Usuarios', array('controller'=>'users','action' =>'index'));?></li>
	</ul>
</div>
