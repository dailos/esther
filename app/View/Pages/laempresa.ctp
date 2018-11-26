<div id="content">
	<div class="bannerleft" >
		<?php echo $this->Html->image('empresalateral.png');?>	 	
	</div>
	
	<div class="empresacontentleft">
	<p><span class="big1">A</span>lcoder es un grupo Empresarial con más de cuarenta años de presencia en el mercado nacional que avalan nuestro "buen hacer".
		Estamos especialmente preocupados en ofrecer a nuestros clientes, productos de alta calidad, y un servicio ágil y eficaz. Nuestra red comercial 
		y de distribución está en constante expansión en Península y en los archipiélagos Canario y Balear.
		<div id="map">
		<?php 
			$icon = 'http://alcoder.es/productos/img/bar_coktail.png';					
			echo $this->GoogleMapV3->map(array('width' =>'450px', 'height'=>'450px','localize'=>false,'latitude'=> 40, 'longitude'=> -1,'zoom'=>6));  
			echo $this->GoogleMapV3->addMarker(array('latitude'=>27.96,'longitude'=>-15.58,'markerIcon'=> $icon));//Gran Canaria
			echo $this->GoogleMapV3->addMarker(array('latitude'=>28.30,'longitude'=>-16.49,'markerIcon'=> $icon));//Tenerife
			echo $this->GoogleMapV3->addMarker(array('latitude'=>28.45,'longitude'=>-13.96,'markerIcon'=> $icon));//Fuerteventura
			echo $this->GoogleMapV3->addMarker(array('latitude'=>29.03,'longitude'=>-13.59,'markerIcon'=> $icon));//Lanzarote
			echo $this->GoogleMapV3->addMarker(array('latitude'=>28.66,'longitude'=>-17.81,'markerIcon'=> $icon));//La Palma
			echo $this->GoogleMapV3->addMarker(array('latitude'=>36.84,'longitude'=>-2.46,'markerIcon'=> $icon));//Almeria
			echo $this->GoogleMapV3->addMarker(array('latitude'=>40.00,'longitude'=>-3.70,'markerIcon'=> $icon));//Madrid
			echo $this->GoogleMapV3->addMarker(array('latitude'=>36.70,'longitude'=>-4.39,'markerIcon'=> $icon));//Malaga
			echo $this->GoogleMapV3->addMarker(array('latitude'=>41.98,'longitude'=>2.82,'markerIcon'=> $icon));//Girona
			echo $this->GoogleMapV3->addMarker(array('latitude'=>37.98,'longitude'=>-1.12,'markerIcon'=> $icon));//Murcia
			echo $this->GoogleMapV3->addMarker(array('latitude'=>38.34,'longitude'=>-0.40,'markerIcon'=> $icon));//Alicante
			echo $this->GoogleMapV3->addMarker(array('latitude'=>41.38,'longitude'=>2.10,'markerIcon'=> $icon));//Barcelona
			echo $this->GoogleMapV3->addMarker(array('latitude'=>37.76,'longitude'=>-3.78,'markerIcon'=> $icon));//Jaen
			echo $this->GoogleMapV3->addMarker(array('latitude'=>41.11,'longitude'=>1.20,'markerIcon'=> $icon));//Tarragpma
			echo $this->GoogleMapV3->addMarker(array('latitude'=>39.56,'longitude'=>2.66,'markerIcon'=> $icon));//Palma de Mallorca
		?> 
		</div>
		En la actualidad nuestra Empresa ha invertido en una nueva gama de productos de la línea Ockallan, fruto de la investigación y de nuestro 
		deseo de ofrecer a nuestros clientes nuevos sabores.

		Actualmente tenemos presencia en:
		
		<ul class="arrow">
			<li onmouseover="moveTo(28,-15.7,7);Effect.toggle('locationcanarias','blind');return false; ">
				<span class='area'>Islas Canarias</span> 
				<div id="locationcanarias" style="display:none;">
					<ul>
						<li>Gran Canaria</li>
						<li>Tenerife</li>
						<li>Fuerteventura</li>
						<li>Lanzarote</li>
						<li>La Palma</li>															
					</ul>	
				</div>		
			</li>	
			<li  onmouseover="moveTo(40,-1.0,6);Effect.toggle('locationpeninsula','blind'); return false; ">
				<span class='area'>Península</span>
				<div id="locationpeninsula" style="display:none;">
					<ul>
						<li>Almería</li>
						<li>Madrid</li>
						<li>Málaga</li>
						<li>Girona</li>
						<li>Murcia</li>
						<li>Alicante</li>
						<li>Barcelona</li>
						<li>Jaén</li>
						<li>Tarragona</li>											
					</ul>	
				</div>
			</li>		 
			<li onmouseover="moveTo(39.56,2.66,8);Effect.toggle('locationbaleares','blind');  return false; ">
				<span class='area'>Baleares</span>
				<div id="locationbaleares" style="display:none;">
					<ul>
						<li>Palma de Mallorca</li>
					</ul>
				</div>
			</li>
		</ul>							
	</div>
		
</div>
	
