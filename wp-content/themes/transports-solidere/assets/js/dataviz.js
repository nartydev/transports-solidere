const width = 880,
    height = 850;

const path = d3.geoPath();

const year = 2006

const projection = d3.geoConicConformal()
    .center([2.454071, 46.279229])
    .scale(5000)
    .translate([width / 2 + 50, height / 2 + 20]);

path.projection(projection);


const svg = d3.select('#map').append("svg")
    .attr("id", "svg")
    .attr("width", width)
    .attr("height", height);

const deps = svg.append("g");


function deleteAccent(department) {
    let newVal = department.replace("'", "");
    newVal = newVal.replace(new RegExp(/\s/g), "");
    newVal = newVal.replace(new RegExp(/[àáâãäå]/g), "a");
    newVal = newVal.replace(new RegExp(/æ/g), "ae");
    newVal = newVal.replace(new RegExp(/ç/g), "c");
    newVal = newVal.replace(new RegExp(/[èéêë]/g), "e");
    newVal = newVal.replace(new RegExp(/[ìíîï]/g), "i");
    newVal = newVal.replace(new RegExp(/ñ/g), "n");
    newVal = newVal.replace(new RegExp(/[òóôõö]/g), "o");
    return newVal
}

d3.json('http://localhost/transports-solidere/wp-content/themes/transports-solidere/assets/departments.json').then(function (geojson) {
    deps.selectAll("path")
        .data(geojson.features)
        .enter()
        .append("g")
        .attr('class', 'department')
        .attr('id', function (d) {
            return deleteAccent(d.properties.NOM_DEPT.toLowerCase())
        })
        .append("path")
        .attr('id', function (d) {
            return deleteAccent(d.properties.NOM_DEPT.toLowerCase())
        })
        .attr("d", path)

});

var div = d3.select("body").append("div")
    .attr("class", "tooltip")
    .style("opacity", 0);

function updateTooltip(classTooltip, el) {
    classTooltip.on("mouseover", function (d) {
        div.transition()
            .duration(0)
            .style("opacity", 1);
        div.html(`<div class="title-tooltip">${el.title}</div> 
                    <div class="pad">
					<div class="upper marge">Indice de Gini</div>
                   
				${el.percent} <br/> <div class="upper marge">Ménages avec voiture</div> ${el.percent_gini}  </div>`)
            .style("left", (d3.event.pageX + 20) + "px")
            .style("top", (d3.event.pageY - 10) + "px")
        var centroid = path.centroid(d);
        console.log(centroid)
    })
    classTooltip.on("mousemove", function (d) {
        div.style("left", (d3.event.pageX + 20) + "px")
            .style("top", (d3.event.pageY - 10) + "px")
    })
    classTooltip.on("mouseout", function (d) {
        div.style("opacity", 0);
        div.html("")
            .style("left", "-500px")
            .style("top", "-500px");
    });
}

const allDepartments = [...document.querySelectorAll('.department')]

setTimeout(() => {

    fetch('http://localhost/transports-solidere/wp-content/themes/transports-solidere/assets/data/' + year + '.json').then((response) => {
        response.json().then(function (data) {
            console.log(data)
            data.map((el) => {
                var name = deleteAccent(el.title.toLowerCase())

                if (el.percent_gini.slice(0, 4) >= 0.0 && el.percent_gini.slice(0, 4) <= 0.32) {
                    let selected = d3.select(`#${name}`).style("fill", "#E4EBED")
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.32 && el.percent_gini.slice(0, 4) <= 0.33) {
                    let selected = d3.select(`#${name}`).style("fill", "#CCDBDB")
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.33 && el.percent_gini.slice(0, 4) <= 0.33) {
                    let selected = d3.select(`#${name}`).style("fill", "#AFC3C6")
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.33 && el.percent_gini.slice(0, 4) <= 0.34) {
                    let selected = d3.select(`#${name}`).style("fill", "#76878E")
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.34 && el.percent_gini.slice(0, 4) <= 0.36) {
                    let selected = d3.select(`#${name}`).style("fill", "#566368")
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.36 && el.percent_gini.slice(0, 4) <= 0.37) {
                    let selected = d3.select(`#${name}`).style("fill", "#3C4B51")
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.37 && el.percent_gini.slice(0, 4) <= 0.51) {
                    let selected = d3.select(`#${name}`).style("fill", "#242E35")
                    updateTooltip(selected, el)
                }

                if (el.percent_gini.slice(0, 4) >= 0.0 && el.percent_gini.slice(0, 4) <= 0.32) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#2ecc71");
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.32 && el.percent_gini.slice(0, 4) <= 0.33) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#3498db");
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.33 && el.percent_gini.slice(0, 4) <= 0.33) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#e74c3c");
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.33 && el.percent_gini.slice(0, 4) <= 0.34) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#e67e22");
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.34 && el.percent_gini.slice(0, 4) <= 0.36) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#f1c40f");
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.36 && el.percent_gini.slice(0, 4) <= 0.37) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#1abc9c");
                    updateTooltip(selected, el)
                } else if (el.percent_gini.slice(0, 4) >= 0.37 && el.percent_gini.slice(0, 4) <= 0.51) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#9b59b6");
                    updateTooltip(selected, el)
                }
            })
        })
    })
}, 200)

const element = document.querySelector('.motion')

lottie.loadAnimation({
    container: element, // the dom element that will contain the animation
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'http://localhost/transports-solidere/wp-content/themes/transports-solidere/assets/data.json' // the path to the animation json
});