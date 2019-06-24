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
   console.log(currentStatus, oldStatus)

   if (currentStatus.namespace == 'homepage') {

      $.getScript("https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js", function (data, textStatus, jqxhr) {
         console.log("Load was performed.");
      });
      $.getScript("http://localhost/transports-solidere/wp-content/themes/transports-solidere/assets/js/dataviz.js", function (data, textStatus, jqxhr) {
         console.log("Load was performed.");
      });

   }


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