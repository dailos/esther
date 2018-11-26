<div id="content">
	<div class="bannerleft">		
		<?php echo $this->Html->image('productoslateral.png');?>			
	</div>
	<h2>Todos los productos</h2>
	<div id="main">		
		<div id="scroll">
			<?php foreach ($products as $product): ?>
			<div class="producto">				
				<?php 
					echo $this->Js->link($this->Html->image('/files/products/'.$product['Format'][0]['FormatsProduct']['id'].CAROUSEL,
						array('title'=>$product['Product']['name'],'class' =>'producto_imagen')),
						array('controller'=>'products', 'action'=>'view',$product['Product']['id']),
						array('escape'=>false,'before' =>  $this->Js->get('#main')->effect('hide', array('buffer' => false)),
							  'complete'  => $this->Js->get('#main')->effect('fadeIn', array('buffer' => false)),'update' => '#main'),null,false);	?>					
				<center><?php echo h($product['Product']['name']); ?>&nbsp;</center>
			</div>		
			<?php endforeach; ?>
		</div>					
	</div>			
</div>