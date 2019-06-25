
<?php 
/* Template Name: Contact */ 
get_header(); 
?>
<div id="contenu">
    <div class="container">
        <div class="flex-container">
            <div class="col-4">
                <img src="<?= get_template_directory_uri() ?>/assets/img/photos/contact/contact.jpg" alt="Transports" class="road-img">
                <div class="road-line"></div>
            </div>
            <div class="col-4">
                <h2 class="middle-title bold">Contactez-nous !</h2>
                <p>L’équipe de Transports Solid’ère souhaiterait pouvoir entrer en contact avec  des personnes partageant les mêmes convictions et valeurs pour échanger sur le sujet.
                L’intérêt serait d’ailleurs de pouvoir  rencontrer des associations ou encore des institutions locales, pour 
                mettre en place de manière concrète des solutions. 
                </p>
            </div>
        </div>
        <div class="space">
            <div class="flex-container">
                <div>
                    <div class="title-data bold">Contacts</div>
                    <div class="mt-2">+ 33 6 71 31 21 71</div>
                    <div class="middle-text">+ 33 1 42 11 91 02</div>
                    <div class="last-text">l.bonnaves@gmail.com</div>
                    <div class="title-data bold">Réseaux sociaux</div>
                    <ul class="social-network">
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="box-contact">
                    <h2 class="middle-title bold txt-center">Envoyez-nous un message </h2>
                    <form class="contact-form" method="post" action="">
                        <div class="group-input">
                            <label>Nom :</label>
                            <input type="text" name="lastname" class="input-contact"/>
                        </div>
                        <div class="group-input">
                            <label>Prénom :</label>
                            <input type="text" name="firstname" class="input-contact"/>
                        </div>
                        <div class="group-input">
                            <label>Email :</label>
                            <input type="email" name="lastname" class="input-contact"/>
                        </div>
                        <div class="group-input">
                            <label>Message :</label>
                            <textarea name="content"></textarea>
                        </div>
                        <div class="group-input">
                            <input type="submit" value="Envoyer" class="submit-button"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer(); 
?>