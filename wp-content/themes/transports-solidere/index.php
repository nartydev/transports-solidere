<?php get_header();?>
<div id="contenu">
	<div id="barba-wrapper"> 
      <div class="barba-container"> 
	  	<div class="container">
		  	<div class="flex-container middle">
			  <div class="col-3"></div>
			  <div class="col-6">
				  <h1>Les transports, moteurs d’enclavement et marqueurs sociaux ?</h1>
				  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, consectetur officia magni eum quae totam debitis, aspernatur molestiae a earum, veniam odit similique! Unde, repellendus? Ea laboriosam dolores doloribus aliquam.</p>
				</div>
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
						  <div class="section-1-gini"></div>
						  <div class="section-2-gini"></div>
						  <div class="section-3-gini"></div>
						  <div class="section-4-gini"></div>
						  <div class="section-5-gini"></div>
						  <div class="section-6-gini"></div>
						  <div class="section-7-gini"></div>
					  </div>
				  </div>
				  <div class="m-5">
					  <div class="title-data">Part des ménages disposant d'au moins <span class="bold">une voiture</span></div>
					  <div class="content-data-score">
						  <div class="section-transports">
							  <img src="<?= get_template_directory_uri() ?>/assets/img/transports-01@2x.png" class="img-transports">
						  </div>
						  <div class="section-transports">
							  <img src="<?= get_template_directory_uri() ?>/assets/img/transports-02@2x.png" class="img-transports">
						  </div>
						  <div class="section-transports">
							  <img src="<?= get_template_directory_uri() ?>/assets/img/transports-03@2x.png" class="img-transports">
						  </div>
						  <div class="section-transports">
							  <img src="<?= get_template_directory_uri() ?>/assets/img/transports-04@2x.png" class="img-transports">
						  </div>
						  <div class="section-transports">
							  <img src="<?= get_template_directory_uri() ?>/assets/img/transports-05@2x.png" class="img-transports">
						  </div>
						  <div class="section-transports">
							  <img src="<?= get_template_directory_uri() ?>/assets/img/transports-06@2x.png" class="img-transports">
						  </div>
						  <div class="section-transports">
							  <img src="<?= get_template_directory_uri() ?>/assets/img/transports-07@2x.png" class="img-transports">
						  </div>
					  </div>
				  </div>
			  </div>
			  <div id="map"></div>
		  </div>
	  </div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js"></script>

  <script>

	const width = 880, height = 850;

	const path = d3.geoPath();

	const year = 2006

	const projection = d3.geoConicConformal()
    .center([2.454071, 46.279229])
    .scale(5000)
	.translate([width / 2 + 50, height / 2 +20]);
	
	path.projection(projection);

	const svg = d3.select('#map').append("svg")
		.attr("id", "svg")
		.attr("width", width)
		.attr("height", height);

	const deps = svg.append("g");


	function deleteAccent(department) {
		let newVal = department.replace("'","");
		newVal = newVal.replace(new RegExp(/\s/g),"");
		newVal = newVal.replace(new RegExp(/[àáâãäå]/g),"a");
		newVal = newVal.replace(new RegExp(/æ/g),"ae");
		newVal = newVal.replace(new RegExp(/ç/g),"c");
		newVal = newVal.replace(new RegExp(/[èéêë]/g),"e");
		newVal = newVal.replace(new RegExp(/[ìíîï]/g),"i");
		newVal = newVal.replace(new RegExp(/ñ/g),"n");                
		newVal = newVal.replace(new RegExp(/[òóôõö]/g),"o");
		return newVal
	}

	d3.json('http://localhost/transports-solidere/wp-content/themes/transports-solidere/assets/departments.json').then(function(geojson) {			
    deps.selectAll("path")
        .data(geojson.features)
        .enter()
        .append("path")
		.attr('class', 'department')
		.attr('id', function(d) { console.log(deleteAccent(d.properties.NOM_DEPT.toLowerCase())); return deleteAccent(d.properties.NOM_DEPT.toLowerCase()) })
		.attr("d", path)
	});

	var div = d3.select("body").append("div")   
    .attr("class", "tooltip")               
	.style("opacity", 0);
	
	function updateTooltip(classTooltip, el) {
		classTooltip.on("mouseover", function(d) {
			div.transition()        
				.duration(200)
				.style("opacity", 1);      
			div.html(`<div class="title-tooltip">${el.title}</div> 
					<br/>
				${el.percent} <br/> ${el.percent_gini} `)  
				.style("left", (d3.event.pageX + 30 ) + "px")     
				.style("top", (d3.event.pageY - 25) + "px")
		})
		classTooltip.on("mouseout", function(d) {
			div.style("opacity", 0);
			div.html("")
				.style("left", "-500px")
				.style("top", "-500px");
		});
	}

	setTimeout(() => {

		fetch('http://localhost/transports-solidere/wp-content/themes/transports-solidere/assets/data/' + year +'.json').then((response) => {
			response.json().then(function(data) {
				console.log(data)
				data.map((el) => {
					var name = deleteAccent(el.title.toLowerCase())

					if(el.percent_gini.slice(0,4) >= 0.0 && el.percent_gini.slice(0,4) <= 0.32) {
						let selected = d3.select(`#${name}`).style("fill", "#E4EBED")
						updateTooltip(selected, el)
					} 
					else if(el.percent_gini.slice(0,4) >= 0.32 && el.percent_gini.slice(0,4) <= 0.33) {
						let selected = d3.select(`#${name}`).style("fill", "#CCDBDB")
						updateTooltip(selected, el)
					} 
					else if(el.percent_gini.slice(0,4) >= 0.33 && el.percent_gini.slice(0,4) <= 0.33) {
						let selected = d3.select(`#${name}`).style("fill", "#AFC3C6")
						updateTooltip(selected, el)
					} 
					else if(el.percent_gini.slice(0,4) >= 0.33 && el.percent_gini.slice(0,4) <= 0.34) {
						let selected = d3.select(`#${name}`).style("fill", "#76878E")
						updateTooltip(selected, el)
					}
					else if(el.percent_gini.slice(0,4) >= 0.34 && el.percent_gini.slice(0,4) <= 0.36) {
						let selected = d3.select(`#${name}`).style("fill", "#566368")
						updateTooltip(selected, el)
					}
					else if(el.percent_gini.slice(0,4) >= 0.36 && el.percent_gini.slice(0,4) <= 0.37) {
						let selected = d3.select(`#${name}`).style("fill", "#3C4B51")
						updateTooltip(selected, el)
					}
					else if(el.percent_gini.slice(0,4) >= 0.37 && el.percent_gini.slice(0,4) <= 0.51) {
						let selected = d3.select(`#${name}`).style("fill", "#242E35")
						updateTooltip(selected, el)
					}
				})
			})
		})
	}, 200)

  </script>
</div>
<?php get_footer(); ?>