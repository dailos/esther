<?php 
	if(is_array ($product['Product'])){
		$descriptionproduct = $product['Product']['description'];
		$nameproduct = $product['Product']['name'];
	}else{
		$descriptionproduct	= $product['description'];
		$nameproduct	= $product['name'];													
		}
?>
<div class="productinfo">
	<center><h2><?php echo h($nameproduct); ?></h2></center>
	<p><?php echo h($descriptionproduct); ?></p>	
	<div class="related">
		<h4><?php echo __('Formatos disponibles');?></h4>
		<ul class="arrow">
		<?php foreach ($product['Format'] as $format): ?> 
			<li>			
				<input type="button" value="<?php echo $format['description'];  ?>" 
				onclick="new Ajax.Updater('mainpic', '/products/loadimage/<?php echo $format['FormatsProduct']['id']; ?>');" />				
			</li>
		<?php endforeach;?>
		</ul>
	</div>
</div>
<div class="productpic">
	<div id="mainpic">
	<?php if ($idpic)echo $this->Html->image('/files/products/'.$idpic.STANDARD);
		else echo $this->Html->image('/files/products/'.$product['Format'][0]['FormatsProduct']['id'].STANDARD);
	?>
	</div>	
</div>



				



