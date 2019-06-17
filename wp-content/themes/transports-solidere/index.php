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
		</div>
		<div class="container">
		<div id="map"></div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js"></script>

  <script>

const width = 750, height = 750;

	const path = d3.geoPath();

	const projection = d3.geoConicConformal()
    .center([2.454071, 46.279229])
    .scale(3300)
	.translate([width / 2, height / 2]);
	
	path.projection(projection);

	const svg = d3.select('#map').append("svg")
		.attr("id", "svg")
		.attr("width", width)
		.attr("height", height);

	const deps = svg.append("g");

	d3.json('http://localhost/transports-solidere/wp-content/themes/transports-solidere/assets/departments.json').then(function(geojson) {			
    deps.selectAll("path")
        .data(geojson.features)
        .enter()
        .append("path")
        .attr('class', 'department')
        .attr("d", path)
        .on("mouseover", function(d) {
            div.transition()        
                .duration(200)
                .style("opacity", .9);      
            div.html("Département : " + d.properties.NOM_DEPT + "<br/>"
                  +  "Région : " + d.properties.NOM_REGION)  
                .style("left", (d3.event.pageX + 30) + "px")     
                .style("top", (d3.event.pageY - 30) + "px")
        })
        .on("mouseout", function(d) {
            div.style("opacity", 0);
            div.html("")
                .style("left", "-500px")
                .style("top", "-500px");
        });
});

	var div = d3.select("body").append("div")   
    .attr("class", "tooltip")               
	.style("opacity", 0);
	

  </script>
</div>
<?php get_footer(); ?>