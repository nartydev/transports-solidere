
<?php 
/* Template Name: Catégories */ 
get_header(); 
?>
<div id="contenu">
    <div id="barba-wrapper"> 
        <div class="barba-container"> 
            <div class="container">
                <?php
                if ( have_posts() ) :
                ?>
                <h1 class="mt-4"> DÉSENCLAVEMENT TERRITORIAL ET <span class="upper"><?php strtoupper(single_cat_title()); ?></span></h1>
                <div class="description"><?php echo category_description() ?></div>
                <div class="flex-between">

                    <?php
                    while ( have_posts() ) : the_post();
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
                    ?>
                    <div class="box">
                         <a class="no-deco" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <div class="content-img">
                            <img src="<?php echo $url ?>" />
                        </div>
                        <div class="content-text">
                            <span class="color-green upper bold"><?php single_cat_title() ?></span> - <?php the_time('j M Y') ?>
                            <h2 class="title-article">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </div>
                         </a>
                    </div>
                    
                    <?php endwhile; // End Loop
                    
                else: ?>
                <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer(); 
?>