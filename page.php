<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1><?php the_title();?></h1>
        <p>Page.php</p>

        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

            <?php the_content() ?>

        <?php endwhile; endif;?>
    </div>    
<?php get_footer();?>

 <?php if (is_page('GetPosts')) {
    echo "Posty pobrane za pomocą get_posts()";

    $args = array(
        'numberposts' => 5,
        'post_type' => 'cars',
      );

    $posts = get_posts($args);
}?>