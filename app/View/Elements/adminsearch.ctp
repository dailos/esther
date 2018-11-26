<div class="adminsearch">
	<div>
	<?php  
	echo $this->Form->create('Product'); 
	echo $this->Form->input('adminsearch',array('label'=>'Buscar: '));	
	$this->Js->get('#ProductAdminsearch');
	$this->Js->event('keyup', $this->Js->request(array('action' => 'index'),
						array('update'=>'#main','dataExpression'=>true,  'evalScripts'=>true,
						'data'=> $this->Js->serializeForm(array('isForm' => true, 'inline' => true)))));			
						
	echo $this->Html->scriptBlock('document.getElementById("ProductAdminsearch").focus();');
	echo $this->Js->writeBuffer(array('onDomReady' => false, 'inline' => true)); 
	?>
	</div>
</div>
