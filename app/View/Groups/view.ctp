<div id="content">
	<div class="bannerleft">		
		<?php echo $this->Html->image('productoslateral.png');?>			
	</div>		
	<div class="groupname">
		<h1><?php echo $groupname;?></h1>
	</div>
	<div id="main">					
		<?php  include_once '../View/Products/view.ctp'; ?>					
	</div>	
	<?php echo $this->element('slider')?>
</div>