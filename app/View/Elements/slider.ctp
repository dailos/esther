<div id="scrollable">	
<?php 											
	foreach ($products as $product ){	
		if(is_array ($product['Product'])){
			$idproduct = $product['Product']['id'];
			$nameproduct = $product['Product']['name'];
		}else{
			$idproduct	= $product['id'];
			$nameproduct	= $product['name'];													
		}

		foreach ($product['Format'] as $item)
			echo $this->Js->link($this->Html->image('/files/products/'.$item['FormatsProduct']['id'].CAROUSEL,array('title'=>$nameproduct." : ".$item['name'],'class'=>'carousel_imagen')),
			array('controller'=>'products', 'action'=>'view',$idproduct,$item['FormatsProduct']['id']),
			array('escape'=>false,'before' =>  $this->Js->get('#main')->effect('hide', array('buffer' => false)),
				  'complete'  => $this->Js->get('#main')->effect('fadeIn', array('buffer' => false)),'update' => '#main'),null,false);									
	} 
?>  					  			  		 											
</div>

<div id="sliderwrap">
	<div id="track-left"></div>
	<div id="track">
		<div id="handle"><img src="img/handle.png" alt="" /></div>
	</div>
</div>

<script type="text/javascript" language="javascript">
// <![CDATA[

	// horizontal slider control
	var slider = new Control.Slider('handle', 'track', {
		onSlide: function(v) { scrollHorizontal(v, $('scrollable'), slider);  },
		onChange: function(v) { scrollHorizontal(v, $('scrollable'), slider); }
	});
		
	// scroll the element horizontally based on its width and the slider maximum value
	function scrollHorizontal(value, element, slider) {
		element.scrollLeft = Math.round(value/slider.maximum*(element.scrollWidth-element.offsetWidth));
	}
			
	// disable horizontal scrolling if text doesn't overflow the div
	if ($('scrollable').scrollWidth <= $('scrollable').offsetWidth) {
		slider.setDisabled();
		$('sliderwrap').hide();
	}

// ]]>
</script>
