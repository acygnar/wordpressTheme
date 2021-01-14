<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1><?php the_title();?></h1>
        <p>single CAR</p>
        <?php if (is_single('Seat ibiza') ): ?>
                <p>To jest Seat Ibiza</p>
        <?php endif; ?>
        <?php if (is_single('Seat Cordoba') ): ?>
                <p>To jest Seat Cordoba</p>
        <?php endif; ?>
        <?php if (is_single(2) ): ?>
                <p>To jest post o ID 2</p>
        <?php endif; ?>


        <?php if(has_post_thumbnail()):?>

            <img class="img-fluid" src="<?php the_post_thumbnail_url('small');?>">    <!--czemu nie działa -->
                
        <?php endif;?>

        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

            <?php the_content() ?>
            <?php the_author() ?>
            <p>Cena: <?php echo get_post_meta($post->ID, 'Cena', true);?></p> 

        <?php endwhile; endif;?>
    </div>    
<?php get_footer();?>