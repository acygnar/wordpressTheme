<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1>Test get_posts</h1>
   
        <?php
$args = array(
  'post_type'   => 'cars',
  'order'       => 'ASC',
  'orderby'     => 'title'
);
$posts = get_posts( $args );

if ($posts) : ?>
  <ul>
    <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      <?php the_post_thumbnail( 'small'); ?>
      <p><?php the_excerpt()?></p>
    <?php endforeach; wp_reset_postdata(); ?>
  </ul>
<?php endif; ?>
        

    </div>    
<?php get_footer();?>