<div id="carousel-wrapper">	
	<div id="carousel-content">
	            	      
    	<?php foreach ($products as $product ):?>
    		<div class="slide">
    		<?php echo $this->Html->image('/files/products/'.$product['Format'][0]['FormatsProduct']['id'].CAROUSEL,
					array('title'=>$product['Product']['name'],'class' =>'carouselauto_imagen'));?>
			</div>
		<?php endforeach;?>  					  			  		 										
	</div>
</div>
<script type="text/javascript">
	new Carousel('carousel-wrapper', $$('#carousel-content .slide'),null,{auto:true,duration:0.3,circular:true,frecuency:5});	
</script>
