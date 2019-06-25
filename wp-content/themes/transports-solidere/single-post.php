
<?php get_header(); ?>

<div id="barba-wrapper"> 
    <div class="barba-container"> 
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="post">
                        <div class="header-post">
                            <div class="post-cate color-green upper bold"><?php the_category(', '); ?></div>
                            <h2 class="post-title"><?php the_title(); ?></h2>
                            <p class="post-info">
                                Écrit par <?php the_author(); ?>, le <?php the_date(); ?>
                            </p>
                            <div class="post-intro">
                            <?php if( get_field('introduction') ): ?>
                                    <?php the_field('introduction'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
</div>
                        <div class="post-content">
                            <div class="min-container">
                                <div class="col-title">
                                Le <br/>
                                constat
                                </div>
                                <div class="col-content">
                                    <?php the_field('le_constat'); ?>
                                </div>
                            </div>
                            <div class="banner-full">
                                <img src="">
                            </div>
                            <div class="container flex-container">
                                <div class="col-title">
                                Les <br/>
                                enjeux
                                </div>
                                <div class="col-content">
                                    <?php the_field('les_enjeux'); ?>
                                </div>
                            </div>
                            <div class="container flex-container">
                                <div class="col-title">
                                Les <br/>
                                solutions
                                </div>
                                <div class="col-content">
                                    <?php the_field('les_solutions'); ?>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
<?php get_footer(); ?>