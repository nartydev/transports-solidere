// Si vous cliquez sur le même lien de page que la page actuelle, ne rechargez pas (option)
// Si vous souhaitez recharger, supprimez-le et c'est OK.
var links = document.querySelectorAll('a[href]');
var cbk = function (e) {
   if (e.currentTarget.href === window.location.href) {
      e.preventDefault();
      e.stopPropagation();
   }
};
for (var i = 0; i < links.length; i++) {
   links[i].addEventListener('click', cbk);
}

/* 
 * Processus pour changer à la transition
 * Par défaut, la balise META dans la tête ne change pas. (La balise de titre changera.)
 * De plus, js dans le barba-container n'est pas exécuté, alors écrivez le processus que vous souhaitez modifier / exécuter individuellement.
 */
Barba.Dispatcher.on('newPageReady', function (currentStatus, oldStatus, barbaContainer, newPageRawHTML) {

   if (Barba.HistoryManager.history.length === 1) { // Première vue
      return; // Aucune mise à jour n'est nécessaire pour le moment
   }

   var script = document.createElement('script');
   script.src = 'https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js';
   document.body.appendChild(script);

   const width = 880,
      height = 850;

   const path = d3.geoPath();

   const year = 2006

   const projection = d3.geoConicConformal()
      .center([2.454071, 46.279229])
      .scale(5000)
      .translate([width / 2 + 50, height / 2]);

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
         .append("path")
         .attr('class', 'department')
         .attr('id', function (d) {
            console.log(deleteAccent(d.properties.NOM_DEPT.toLowerCase()));
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
            .duration(200)
            .style("opacity", 1);
         div.html(`<div class="title-tooltip">${el.title}</div> 
					<br/>
				${el.percent} <br/> ${el.percent_gini} `)
            .style("left", (d3.event.pageX + 25) + "px")
            .style("top", (d3.event.pageY - 25) + "px")
      })
      classTooltip.on("mouseout", function (d) {
         div.style("opacity", 0);
         div.html("")
            .style("left", "-500px")
            .style("top", "-500px");
      });
   }

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
            })
         })
      })
   }, 200)

   // J'ai emprunté à jquery-pjax
   var $newPageHead = $('<head />').html(
      $.parseHTML(
         newPageRawHTML.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0],
         document,
         true
      )
   );


}); // Fin Dispatcher

// Réglage de l'animation (fondu en sortie → fondu en entrée) (option)
// Si vous n'en avez pas besoin, supprimez-le et c'est OK.
var fadeTransition = Barba.BaseTransition.extend({
   start: function () {
      // start est appelé au tout début immédiatement après l'activation de la transition.

      // Lorsque promise.all est utilisé, .then est exécuté après que tout le traitement passé dans le tableau est terminé.
      // Dans ce cas, .then sera exécuté après que .newContainerLOading et .fadeOut soient terminés.
      Promise
         .all([this.newContainerLoading, this.fadeOut()])
         .then(this.fadeIn.bind(this));
   }, // End start function

   fadeOut: function () {
      // Traitement pour l'ancien contenu de la page.
      // Ici, nous utilisons le fadeout avec animate.
      return $(this.oldContainer).animate({
         opacity: 0
      }, {
         duration: 'fast'
      }).promise();
   },

   fadeIn: function () {
      // Déplacer vers le haut (important pour le sol)
      document.body.scrollTop = 0;

      // Avec tout décrit dans start, cette fonction fadeIn est appelée lorsque fadeOut est terminé.

      var _this = this;
      // Le newContainer correspond ici à la nouvelle lecture du conteneur .barba dans ajax.
      var $el = $(this.newContainer);

      // Au vieux barba-container devenu opacité: 0; à afficher: aucun.
      // Ici comme peut-être fadeIn invocation Comme réglage initial de l'ancien barba-container.
      $(this.oldContainer).hide();
      // Voici également le réglage initial d'un nouveau barba-container.
      // Il y a de la visibilité car il semble être caché par défaut.
      $el.css({
         visibility: 'visible',
         opacity: 0
      });

      $el.animate({
         opacity: 1
      }, 200, function () {
         // En attachant .done (), le DOM de l'ancien barba-container est supprimé et la transition se termine.
         _this.done();
      });
   }
}); // Fin BaseTransition

// Définir la transition créée pour le retour
Barba.Pjax.getTransition = function () {
   return fadeTransition;
};

// Initialisation Barba Js
$().ready(function () {
   Barba.Pjax.start();
   Barba.Prefetch.init(); // Activer la prélecture
});