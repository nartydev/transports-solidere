<?php get_header();?>
<div id="contenu">
	<div id="barba-wrapper"> 
      <div class="barba-container" data-namespace="homepage"> 
	  	
		  	<div class="flex-container middle">
			  <div class="col-3">
	  			<div class="motion"></div>
			  </div>
			  <div class="col-6">
				  <h1>Les transports, marqueurs sociaux mais moteurs de désenclavement ?</h1>
				  <p>La mobilité est au coeur de la vie de l’Homme moderne, que ce soit pour remplir son frigo, aller travailler ou sociabiliser. Avec l’évolution des moyens de transports, la notion de distance a beaucoup évolué, les espaces de la vie quotidienne aussi, mais pas pour tout le monde. Qui sont ces délaissés, et pourquoi le sont-ils ? Numériques, sociales ou encore politiques, des solutions existent.</p>
				</div>
			</div> 
		  <div class="container flex-container">
			  <div class="content-data">
				  <div class="first-top">
					  <div class="title-data"><span class="bold">Prix</span> du carburant</div>
					  <div class="year">2006</div>
					  <div class="price-gasoline">1,43€/L</div>
				  </div>
				  <div class="m-5">
					  <div class="title-data">Inégalités de revenu <span class="bold"> (GINI) </span></div>
					  <div class="content-data-score">
						  <div class="section-gini section-1-gini">
						  	<div> de 0.00 à 0.32 </div>
						  </div>
						  <div class="section-gini section-2-gini">
						  	<div> de 0.32 à 0.33 </div>
						  </div>
						  <div class="section-gini section-3-gini">
						  	<div> de 0.33 à 0.33 </div>
						  </div>
						  <div class="section-gini section-4-gini">
						  	<div> de 0.33 à 0.34 </div>
						  </div>
						  <div class="section-gini section-5-gini">
						  	<div> de 0.34 à 0.36 </div>
						  </div>
						  <div class="section-gini section-6-gini">
						  	<div> de 0.36 à 0.37 </div>
						  </div>
						  <div class="section-gini section-7-gini">
						  	<div> de 0.37 à 0.51 </div>
						  </div>
					  </div>
				  </div>
				  <div class="m-5">
					  <div class="title-data">Part des ménages disposant d'au moins <span class="bold">une voiture</span></div>
					  <div class="content-data-score">
						  <div class="section-transports">
							  	<img src="<?= get_template_directory_uri() ?>/assets/img/transports-01@2x.png" class="img-transports">
								<div> de 0% à 82.1% </div>
						  </div>
						  <div class="section-transports">
							  	<img src="<?= get_template_directory_uri() ?>/assets/img/transports-02@2x.png" class="img-transports">
								<div> de 81.1% à 83.3% </div>
						  </div>
						  <div class="section-transports">
							  	<img src="<?= get_template_directory_uri() ?>/assets/img/transports-03@2x.png" class="img-transports">
								<div> de 83.3% à 84% </div>
						  </div>
						  <div class="section-transports">
							  	<img src="<?= get_template_directory_uri() ?>/assets/img/transports-04@2x.png" class="img-transports">
								<div> de 84% à 84.9% </div>
						  </div>
						  <div class="section-transports">
							  	<img src="<?= get_template_directory_uri() ?>/assets/img/transports-05@2x.png" class="img-transports">
								<div> de 84.9% à 85.6% </div>
						  </div>
						  <div class="section-transports">
							  	<img src="<?= get_template_directory_uri() ?>/assets/img/transports-06@2x.png" class="img-transports">
								<div> de 85.6% à 86.2% </div>
						  </div>
						  <div class="section-transports">
							  	<img src="<?= get_template_directory_uri() ?>/assets/img/transports-07@2x.png" class="img-transports">
								<div> de 86.2% à 87.3% </div>
						  </div>
					  </div>
				  </div>
			  </div>
			  <div id="map"></div>
		  </div>
	  </div>
	</div>
	<div class="content-display">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.3/lottie.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js"></script>
		<script src="<?= get_template_directory_uri() ?>/assets/js/dataviz.js<?= "?d=".rand(0,10000); ?>"></script>
	</div>
</div>
<?php get_footer(); ?>