
<?php 
/* Template Name: A propos */ 
get_header(); 
?>
<div id="contenu">
    <div class="container">
        <div class="flex-container">
            <div class="col-4">
                <img src="<?= get_template_directory_uri() ?>/assets/img/photos/about/routes_about.jpg" alt="Transports" class="road-img">
                <div class="road-line"></div>
            </div>
            <div class="col-4">
                <h2 class="middle-title"><span class="bold">Transports Solid’<span class="color-green">ère</span></span>, l’initiative.</h2>
                <p>Les transports ont été et sont toujours une des pierres angulaires du développement des civilisations et des échanges mondialisés. L’équipe est parti du constat que ceux-ci portent de nombreux enjeux cruciaux qu'ils soient économiques, environnementaux ou encore sociaux. Aujourd’hui, pour certaines personnes précaires, les transports peuvent être un élément de marginalisation important. Nous avons voulu faire dialoguer les données puis les partager pour retranscrire un problème et proposer des solutions.  </p>
            </div>
        </div>
        <div class="space">
            <h2 class="middle-title">
            <span class="bold">Transports Solid’<span class="color-green">ère</span></span>,<br/>
            les objectifs.
            </h2>
            <div class="flex-container">
                <div class="col-3-about">
                    <div class="bold-little-title">Sensibiliser</div>
                    <p class="target-text">Le but premier est d’éveiller les consciences sur les raisons et l’impact de la « fracture mobilité » en France.  </p>
                </div>
                <div class="col-3-about">
                    <div class="bold-little-title">Servir de relai</div>
                    <p class="target-text">Toute personne engagée, et désirant le changement peut réutiliser nos graphiques pour appuyer ses propos.</p>
                </div>
                <div class="col-3-about">
                    <div class="bold-little-title">Proposer des opportunités </div>
                    <p class="target-text">Les articles sont grâce aux adresses, aux conseils, et aux solutions proposées, des oppportunités à saisir.  </p>
                </div>
            </div>
        </div>
        <div class="space">
            <h2 class="middle-title">
            <span class="bold">Transports Solid’<span class="color-green">ère</span></span>,<br/>
            l'équipe.
            </h2>
            <div class="flex-container">
                <div class="col-3-staff">
                    <div class="content-img-staff">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/photos/about/louise.jpeg" alt="L'équipe" class="img-responsive">
                        <div class="green-overlay"></div>
                    </div>
                    <div class="content-desc-staff">
                        <div class="name-staff">Louise Bonnaves</div>
                        <div class="desc-staff">Direction Artistique, Rédaction, Illustrations </div>
                    </div>
                </div>
                <div class="col-3-staff">
                    <div class="content-img-staff">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/photos/about/yoan.jpg" alt="L'équipe" class="img-responsive">
                        <div class="green-overlay"></div>
                    </div>
                    <div class="content-desc-staff">
                        <div class="name-staff">Yoan Gross</div>
                        <div class="desc-staff"> Rédaction, Motion Design, Développement, Marketing </div>
                    </div>
                </div>
                <div class="col-3-staff">
                    <div class="content-img-staff">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/photos/about/kerian.jpg" alt="L'équipe" class="img-responsive">
                        <div class="green-overlay"></div>
                    </div>
                    <div class="content-desc-staff">
                        <div class="name-staff">Kérian Pelat</div>
                        <div class="desc-staff"> Développement, Marketing </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer(); 
?>