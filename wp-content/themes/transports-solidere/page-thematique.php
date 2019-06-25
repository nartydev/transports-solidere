
<?php 
/* Template Name: Thématique */ 
get_header(); 
?>
<div id="contenu">
    <div id="barba-wrapper"> 
        <div class="barba-container"> 
            <div class="content-slider">
                <img src="<?= get_template_directory_uri() ?>/assets/img/social@2x.png" class="img-category active img-social">
                <img src="<?= get_template_directory_uri() ?>/assets/img/dessin@2x.png" class="img-category img-numeric">
                <img src="<?= get_template_directory_uri() ?>/assets/img/politique@2x.png" class="img-category img-politique">
                <div class="sample-title-first">Numérique</div>
                <div class="content-all">
                    <div class="container-category" data-id="0">
                        <div class="content-category">
                            <div class="global-content-category">
                                <div class="content-title social-title">
                                    Social
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
                    <div class="container-category" data-id="1">
                        <div class="content-category">
                            <div class="global-content-category">
                                <div class="content-title numeric-title">
                                    Numérique
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
                    <div class="container-category" data-id="2">
                        <div class="content-category">
                            <div class="global-content-category">
                            <div class="content-title">
                                Politique
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
let nextSlide = 0

let fisrtOutTitle = document.querySelector('.sample-title-first') 
let secondOutTitle = document.querySelector('.sample-title-second') 
let allCategories = [...document.querySelectorAll('.container-category')]
let allImages = [...document.querySelectorAll('.img-category')]
let allTexts = [...document.querySelectorAll('.global-content-category')]
let allContentTitle = [...document.querySelectorAll('.content-title')]

allCategories[0].classList.add('active')
// Social -> 0
// Numérique -> 1
// Politique -> 2

function percentToPixel(_elem){
    const value = _elem.getBoundingClientRect()

    console.log(-value.width/2)
    return -value.width / 2 
}

function showNext(actual, next) {
    TweenMax.to(fisrtOutTitle, 0.5, { y: 100, opacity:0, delay:0.5, ease: Power4.easeOut })
    TweenMax.to(allContentTitle[actual], 0.5, { y: 180, ease: Power4.easeOut})
    TweenMax.to(allContentTitle[next], 0.5, { y: 0, ease: Power4.easeOut})
    allImages[actual].classList.remove('active')
    setTimeout(() => {
        allImages[next].classList.add('active')
        console.log('next: ', next, 'actual: ', actual)
        allCategories[actual].classList.remove('active')
        allCategories[next].classList.add('active')
        TweenMax.to(allTexts[next], 0, {y: -250, scale:1,ease: Power4.easeOut})
        TweenMax.to(allTexts[next], 0.5, { y: -50, scale:1,delay:0.1,ease: Power4.easeOut})
        if(actual == 2) {
            fisrtOutTitle.innerHTML = "Politique";
        } else if(actual == 1) {
            fisrtOutTitle.innerHTML = "Numérique";
        } else {
            fisrtOutTitle.innerHTML = "Social";
        }
        TweenMax.to(fisrtOutTitle, 0, {x: percentToPixel(fisrtOutTitle)})
        TweenMax.to(fisrtOutTitle, 0.5, {top:-100, opacity:0.1,delay:0.5,zIndex:11,ease: Power4.easeOut})

        idSlide = 3
    }, 500)
}

function showPrev(actual, next) {
    TweenMax.to(secondOutTitle, 0.5, {y: -100,opacity:0,delay:0.5,zIndex:-11,ease: Power4.easeOut})
       
    TweenMax.to(allContentTitle[actual], 0.5, {y: -180,ease: Power4.easeOut})
    TweenMax.to(allContentTitle[next], 0.5, {y: 0,ease: Power4.easeOut})
    allImages[actual].classList.remove('active')
    setTimeout(() => {
        allImages[next].classList.add('active')
        console.log('next: ', next, 'actual: ', actual)
        allCategories[actual].classList.remove('active')
        allCategories[next].classList.add('active')
        TweenMax.to(allTexts[next], 0, {y: 250,scale:1,ease: Power4.easeOut})
        TweenMax.to(allTexts[next], 0.5, {y: -50,scale:1,delay:0.1,ease: Power4.easeOut})

        if(actual == 2) {
            secondOutTitle.innerHTML = "Politique";
        } else if(actual == 1) {
            secondOutTitle.innerHTML = "Numérique";
        } else {
            secondOutTitle.innerHTML = "Social";
        }
        TweenMax.to(secondOutTitle, 0, {x: percentToPixel(secondOutTitle)})
        TweenMax.to(secondOutTitle, 0.5, {bottom:-100, opacity:0.1,delay:0.5,zIndex:11,ease: Power4.easeOut})
        
    }, 500)
}

fisrtOutTitle.addEventListener('click', () => {
    for(cate of allCategories) {
        console.log(cate.getAttribute('class'), cate.dataset.id, cate.className.includes('active'))
        if(cate.className.includes('active')) {
            if(cate.dataset.id == 2) {
                idSlide = 2
                nextSlide = 0
            } else if(cate.dataset.id == 1) {
                idSlide = 1
                nextSlide = 0
            } else {
                idSlide = 0
                nextSlide = 1
            }
            showNext(idSlide, nextSlide)
            console.log(idSlide, nextSlide)
        }
    }
    console.log(allCategories)
})


secondOutTitle.addEventListener('click', () => {
    console.log('ok')

    for(cate of allCategories) {
        console.log(cate.getAttribute('class'), cate.dataset.id, cate.className.includes('active'))
        if(cate.className.includes('active')) {
            if(cate.dataset.id == 2) {
                idSlide = 2
                nextSlide = 0
            } else if(cate.dataset.id == 1) {
                idSlide = 1
                nextSlide = 2
            } else {
                idSlide = 0
                nextSlide = 2
            }
            showPrev(idSlide, nextSlide)
            console.log(idSlide, nextSlide)
        }
    }
   

    
})

</script>
<?php 
get_footer(); 
?>