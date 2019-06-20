
<?php 
/* Template Name: Thématique */ 
get_header(); 
?>
<div id="contenu">
    <div id="barba-wrapper"> 
        <div class="barba-container"> 
            <div class="content-slider">
                <img src="<?= get_template_directory_uri() ?>/assets/img/social@2x.png" class="img-category active img-social">
                <img src="<?= get_template_directory_uri() ?>/assets/img/dessin@2x.png" class="img-category img-social">
                <img src="<?= get_template_directory_uri() ?>/assets/img/politique@2x.png" class="img-category img-politique">
                <div class="sample-title-first">Numérique</div>
                <div class="content-all">
                    <div class="container-category" data-id="1">
                        <div class="content-category">
                            <div class="global-content-category">
                                <div class="content-title social-title">
                                    Social
                                </div>
                                <div class="content-article social-desc">
                                    4 articles
                                </div>
                            </div>
                            <?php
                            $category_id = get_cat_ID( 'Social' );
                            $category_link = get_category_link( $category_id );
                            ?>
                            <div class="content-button-next">
                                <a href="<?= $category_link ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/arrow-right.png" class="size-icon-arrow"></a>
                            </div>
                        </div>
                    </div>
                    <div class="container-category" data-id="2">
                        <div class="content-category">
                            <div class="global-content-category">
                                <div class="content-title numeric-title">
                                    Numérique
                                </div>
                                <div class="content-article numeric-desc">
                                    5 articles
                                </div>
                            </div>
                            <?php
                            $category_id = get_cat_ID( 'Numérique' );
                            $category_link = get_category_link( $category_id );
                            ?>
                            <div class="content-button-next">
                                <a href="<?= $category_link ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/arrow-right.png" class="size-icon-arrow"></a>
                            </div>
                        </div>
                    </div>
                    <div class="container-category" data-id="3">
                        <div class="content-category">
                            <div class="global-content-category">
                            <div class="content-title">
                                Politique
                            </div>
                            <div class="content-article">
                                2 articles
                            </div>
                            </div>
                            <?php
                            $category_id = get_cat_ID( 'Politique' );
                            $category_link = get_category_link( $category_id );
                            ?>
                            <div class="content-button-next">
                                <a href="<?= $category_link ?>">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/arrow-right.png" class="size-icon-arrow"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sample-title-second">Politique</div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/easing/EasePack.min.js"></script>
<script>
let idSlide = 0

let fisrtOutTitle = document.querySelector('.sample-title-first') 
let secondOutTitle = document.querySelector('.sample-title-second') 
let allCategories = [...document.querySelectorAll('.container-category')]
let allTexts = [...document.querySelectorAll('.global-content-category')]
let allContentTitle = [...document.querySelectorAll('.content-title')]
let allContentArticle = [...document.querySelectorAll('.content-article')]

allCategories[0].classList.add('active')

fisrtOutTitle.addEventListener('click', () => {
    console.log('ok')
    if(idSlide == 0) {
        TweenMax.to(fisrtOutTitle, 0.5, { y: 100, opacity:0, delay:0.5, ease: Power4.easeOut })
        TweenMax.to(allContentTitle[0], 0.5, { y: 180, ease: Power4.easeOut})
        TweenMax.to(allContentArticle[0], 0.5, { y: 180, ease: Power4.easeOut})
        TweenMax.to(allContentTitle[1], 0.5, { y: 0, ease: Power4.easeOut})
        TweenMax.to(allContentArticle[1], 0.5, { y: 0, ease: Power4.easeOut })
        setTimeout(() => {
            allCategories[0].classList.remove('active')
            allCategories[1].classList.add('active')
            TweenMax.to(allTexts[1], 0, {
                y: -250,
                scale:1,
                ease: Power4.easeOut
            })
            TweenMax.to(allTexts[1], 0.5, {
                y: -50,
                scale:1,
                delay:0.1,
                ease: Power4.easeOut
            })

            fisrtOutTitle.innerHTML = "Social";

            TweenMax.to(fisrtOutTitle, 0.5, {
                top:-100,
                opacity:0.1,
                delay:0.5,
                ease: Power4.easeOut
            })

            idSlide = 2
        }, 500)
    } else if(idSlide === 2) {
        console.log('ok')
        TweenMax.to(fisrtOutTitle, 0.5, {
            y: 100,
            opacity:0,
            delay:0.5,
            ease: Power4.easeOut
        })

         TweenMax.to(allContentTitle[1], 0.5, {
                            y: 180,
                            ease: Power4.easeOut
                        })
        TweenMax.to(allContentArticle[1], 0.5, {
                            y: 180,
                            ease: Power4.easeOut
                        })
         TweenMax.to(allContentTitle[0], 0.5, {
                            y: 0,
                            ease: Power4.easeOut
                        })
        TweenMax.to(allContentArticle[0], 0.5, {
                            y: 0,
                            ease: Power4.easeOut
                        })
        
        setTimeout(() => {
            allCategories[1].classList.remove('active')
            allCategories[0].classList.add('active')
            TweenMax.to(allTexts[0], 0, {
                y: -250,
                scale:1,
                ease: Power4.easeOut
            })
            TweenMax.to(allTexts[0], 0.5, {
                y: -50,
                scale:1,
                delay:0.1,
                ease: Power4.easeOut
            })

            fisrtOutTitle.innerHTML = "Numérique";

            TweenMax.to(fisrtOutTitle, 0.5, {
                            top:-100,
                            opacity:0.1,
                            delay:0.5,
                            ease: Power4.easeOut
                        })
            
                        idSlide = 0
        }, 500)
    }

    
})


secondOutTitle.addEventListener('click', () => {
    console.log('ok')
    if(idSlide == 0) {
        TweenMax.to(secondOutTitle, 0.5, {
                            y: -100,
                            opacity:0,
                            delay:0.5,
                            zIndex:-11,
                            ease: Power4.easeOut
                        })
       
        TweenMax.to(allContentTitle[0], 0.5, {
                            y: -180,
                            ease: Power4.easeOut
                        })
        TweenMax.to(allContentArticle[0], 0.5, {
                            y: -180,
                            ease: Power4.easeOut
                        })
         TweenMax.to(allContentTitle[2], 0.5, {
                            y: 0,
                            ease: Power4.easeOut
                        })
        TweenMax.to(allContentArticle[2], 0.5, {
                            y: 0,
                            ease: Power4.easeOut
                        })
        setTimeout(() => {
            allCategories[0].classList.remove('active')
            allCategories[2].classList.add('active')
            TweenMax.to(allTexts[2], 0, {
                y: 250,
                scale:1,
                ease: Power4.easeOut
            })
            TweenMax.to(allTexts[2], 0.5, {
                y: -50,
                scale:1,
                delay:0.1,
                ease: Power4.easeOut
            })

            secondOutTitle.innerHTML = "Social";

            TweenMax.to(secondOutTitle, 0.5, {
                            bottom:-100,
                            opacity:0.1,
                            delay:0.5,
                            ease: Power4.easeOut
                        })
            
                        idSlide = 2
        }, 500)
    } else if(idSlide === 2) {
        console.log('ok')
        TweenMax.to(secondOutTitle, 0.5, {
            y: -200,
            opacity:0,
            delay:0.5,
            ease: Power4.easeOut
        })

         TweenMax.to(allContentTitle[2], 0.5, {
                            y: -180,
                            ease: Power4.easeOut
                        })
        TweenMax.to(allContentArticle[2], 0.5, {
                            y: -180,
                            ease: Power4.easeOut
                        })
         TweenMax.to(allContentTitle[0], 0.5, {
                            y: 0,
                            ease: Power4.easeOut
                        })
        TweenMax.to(allContentArticle[0], 0.5, {
                            y: 0,
                            ease: Power4.easeOut
                        })
        
        setTimeout(() => {
            allCategories[2].classList.remove('active')
            allCategories[0].classList.add('active')
            TweenMax.to(allTexts[0], 0, {
                y: 250,
                scale:1,
                ease: Power4.easeOut
            })
            TweenMax.to(allTexts[0], 0.5, {
                y: -50,
                scale:1,
                delay:0.1,
                ease: Power4.easeOut
            })

            secondOutTitle.innerHTML = "Politique";

         TweenMax.to(secondOutTitle, 0.5, {
            y:-100,
            bottom:-100,
            opacity:0.1,
            delay:0.5,
            ease: Power4.easeOut
        })
            
            
        idSlide = 0
        }, 500)
    }

    
})

</script>
<?php 
get_footer(); 
?>