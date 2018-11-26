<div id="content">
	<div class="bannerleft">		
		<?php echo $this->Html->image('productoslateral.png');?>			
	</div>
	<?php if ($empty):?>
		<div class="noencontrado">
			<p>No se han encontrado productos, repita la búsqueda</p>
		</div>
	<?php else:?>			
		<div id="main">		
			<?php  include_once '../View/Products/view.ctp'; ?>			
		</div>	
		<?php echo $this->element('slider')?>	
	<?php endif;?>
</div>