<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1><?php the_title();?></h1>
        <p>single</p>

        <?php the_post_thumbnail('medium', array('class' => 'TEST')); ?>

        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('small');}; ?>



        <!--<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
            <img src="<?php echo $url ?>" />-->


        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

            <?php the_content() ?>

        <?php endwhile; endif;?>
    </div>    
<?php get_footer();?>