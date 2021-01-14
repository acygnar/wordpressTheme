<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1><?php the_title();?></h1>
        <p>index.php</p>

        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

            <?php the_content() ?>
            <a class="btn btn-success" href="<?php the_permalink();?>">Read more</a>

        <?php endwhile; endif;?>
    </div>    
<?php get_footer();?>