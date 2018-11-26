<div id="content_home">
	<div class="homeleft" >
		<div class="img_caption">
			<?php echo $this->Html->image('iso.jpg');?>
		</div>
	 	<p>La apuesta de nuestra Empresa por la calidad ha sido reconocida por los certificados<b>UNE-EN ISO 9001 y UNE-EN ISO 22000</b> 
	 	, que junto a nuestra amplia red de distribución y nuestro gran servicio, nos hace estar entre las Empresas líderes del sector.</p>
	</div>
	<div class="slideshow">
		<div class="fadein">
		<?php 
			echo $this->Html->image('SS1.jpg');
			echo $this->Html->image('SS2.jpg');
			echo $this->Html->image('SS3.jpg');			
			?>		  	
		</div>
	</div>
	<?php //echo $this->element('carouselauto');?>		
</div>

<div class="homefooter">	
	<div class="homefooterin">		
		<div class="columns" >
			<h3 style="color: red;">La empresa</h3>
			<div class="img_caption">
				<?php echo $this->Html->image('factory.png');?>
			</div>
			<div>
				Distribuidora en exclusiva de bebidas alcohólicas, con amplia red comercial y presencia en <b>Península</b> y en los <b>archipiélagos Canarios</b> y <b>Balear</b>.
			</div> 															    	
		</div>  
			  
		<div class="columns">
			<h3 style="color: orange;">Productos</h3>					
			<div class="img_caption">
				<?php echo $this->Html->image('star_yellow_new.png');?>
			</div>
			<div>
				<p>Nuestros productos cuentan con los certificados de calidad <b><i>UNE-EN ISO 9001 y UNE-EN ISO 22000</i></b> ,
				 son muy competitivos en precio y van orientados principalmente al sector de hostelería y de alimentación.</p>
			</div>
		</div>	
		
		<div class="columns">			
			<h3 style="color: green;">Objetivos</h3> 
			<div class="img_caption">
				<?php echo $this->Html->image('column-chart.png');?>
			</div>
			<div>
				<p>Nuestra Empresa de gran dinamismo, se está expandiendo a nivel comercial y de producción desarrollando una línea 
				de productos de alta gama, marca <b>Ockallan</b>, como son nuestros productos estrella<b> <i>Crema de Tiramisú</i></b> 
				y <b><i>Soufle de Limón</i></b>.</p>
			</div>
		</div>
	</div>
</div>

<?php 
$script = "
setInterval(function(){
  var imgs = $$('.fadein img'),
  visible = imgs.findAll(function(img){ return img.visible(); });
  if(visible.length>1) visible.last().fade({ duration: .3 });
  else imgs.last().appear({ duration: .3,afterFinish: function(){ imgs.slice(0,imgs.length-1).invoke('show');  } });
}, 3000);
";

$this->Html->scriptBlock($script,array('inline' => false));
?>
