<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1><?php single_cat_title();?></h1>
        <p>archive cars</p>     <!-- Dalczego nie korzysta z archive-cars   -->

        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

            <h3><?php the_title() ?></h3>  
            <?php if(has_post_thumbnail()):?>

                <img src="<?php the_post_thumbnail_url('small')?>" class="img-fluid">

            <?php endif;?>  
            <?php the_excerpt() ?>
            <a class="btn btn-success" href="<?php the_permalink();?>">Read more</a>
           

        <?php endwhile; endif;?>
    </div>
        
<?php get_footer();?>


