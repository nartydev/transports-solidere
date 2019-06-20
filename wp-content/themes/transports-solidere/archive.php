
<?php 
/* Template Name: Catégories */ 
get_header(); 
?>
<div id="contenu">
    <div id="barba-wrapper"> 
        <div class="barba-container"> 
            <div class="container">

                <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title() ?> par catégories</a></h2>
                <?php

$cats = get_categories();
foreach ($cats as $cat) {
    
    query_posts('showposts=1000&cat='.$cat->cat_ID);
    
    ?>
                <h2><?php echo $cat->cat_name; ?></h2>
                
                <ul>
                    <?php while (have_posts()) : the_post(); ?>
                    <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Commentaires (<?php echo $post->comment_count ?>)</li>
                    <?php endwhile;  ?>
                </ul>
                
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer(); 
?>