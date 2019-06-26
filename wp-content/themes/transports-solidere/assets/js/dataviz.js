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

function callOther(el) {
    if (el.percent_gini.slice(0, 4) >= 0.0 && el.percent_gini.slice(0, 4) <= 0.32) {
        return `<div class="bloc-1-gini"></div>`
    } else if (el.percent_gini.slice(0, 4) >= 0.32 && el.percent_gini.slice(0, 4) <= 0.33) {
        return `<div class="bloc-2-gini"></div>`
    } else if (el.percent_gini.slice(0, 4) >= 0.33 && el.percent_gini.slice(0, 4) <= 0.33) {
        return `<div class="bloc-3-gini"></div>`
    } else if (el.percent_gini.slice(0, 4) >= 0.33 && el.percent_gini.slice(0, 4) <= 0.34) {
        return `<div class="bloc-4-gini"></div>`
    } else if (el.percent_gini.slice(0, 4) >= 0.34 && el.percent_gini.slice(0, 4) <= 0.36) {
        return `<div class="bloc-5-gini"></div>`
    } else if (el.percent_gini.slice(0, 4) >= 0.36 && el.percent_gini.slice(0, 4) <= 0.37) {
        return `<div class="bloc-6-gini"></div>`
    } else if (el.percent_gini.slice(0, 4) >= 0.37 && el.percent_gini.slice(0, 4) <= 0.51) {
        return `<div class="bloc-7-gini"></div>`
    }
    return ""
}

function callCircle(el) {
    if (el.percent.slice(0, 4) >= 0.0 && el.percent.slice(0, 4) <= 82.1) {
        return `<div class="circle-1-cars"></div>`
    } else if (el.percent.slice(0, 4) >= 81.1 && el.percent.slice(0, 4) <= 83.3) {
        return `<div class="circle-2-cars"></div>`
    } else if (el.percent.slice(0, 4) >= 83.3 && el.percent.slice(0, 4) <= 84) {
        return `<div class="circle-3-cars"></div>`
    } else if (el.percent.slice(0, 4) >= 84 && el.percent.slice(0, 4) <= 84.9) {
        return `<div class="circle-4-cars"></div>`
    } else if (el.percent.slice(0, 4) >= 84.9 && el.percent.slice(0, 4) <= 85.6) {
        return `<div class="circle-5-cars"></div>`
    } else if (el.percent.slice(0, 4) >= 85.6 && el.percent.slice(0, 4) <= 86.2) {
        return `<div class="circle-6-cars"></div>`
    } else if (el.percent.slice(0, 4) >= 86.2 && el.percent.slice(0, 4) <= 87.3) {
        return `<div class="circle-7-cars"></div>`
    }
    return ""
}

function updateTooltip(classTooltip, el) {
    classTooltip.on("mouseover", function (d) {
        div.transition()
            .duration(0)
            .style("opacity", 1);
        div.html(`<div class="title-tooltip">${el.title}</div> 
                    <div class="pad">
					<div class="upper marge">Indice de Gini</div>
                   ${callOther(el)}
				<span class="bold">${el.percent_gini.slice(0, 4)}</span> <br/><br/> <div class="upper marge">Ménages avec voiture</div> ${callCircle(el)} <span class="bold">${el.percent}</span>  </div>`)
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

                if (el.percent.slice(0, 4) >= 0.0 && el.percent.slice(0, 4) <= 82.1) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#ffe5e8");
                    updateTooltip(selected, el)
                } else if (el.percent.slice(0, 4) >= 81.1 && el.percent.slice(0, 4) <= 83.3) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#fed0d2");
                    updateTooltip(selected, el)
                } else if (el.percent.slice(0, 4) >= 83.3 && el.percent.slice(0, 4) <= 84) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#3fffd4");
                    updateTooltip(selected, el)
                } else if (el.percent.slice(0, 4) >= 84 && el.percent.slice(0, 4) <= 84.9) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#00f5bd");
                    updateTooltip(selected, el)
                } else if (el.percent.slice(0, 4) >= 84.9 && el.percent.slice(0, 4) <= 85.6) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#00e5a2");
                    updateTooltip(selected, el)
                } else if (el.percent.slice(0, 4) >= 85.6 && el.percent.slice(0, 4) <= 86.2) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#00c97f");
                    updateTooltip(selected, el)
                } else if (el.percent.slice(0, 4) >= 86.2 && el.percent.slice(0, 4) <= 87.3) {
                    let selected = d3.select(`#${name}`).append("circle")
                        .attr('transform', function (d) {
                            return 'translate(' + path.centroid(d) + ')'
                        })
                        .style("z-index", "111")
                        .attr("r", 5)
                        .attr("fill", "#00764a");
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