<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1><?php single_cat_title();?></h1>
        <p>archive</p>
    <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
    
    <div class="card mb-2" style="width: 18rem;">
    <?php if(has_post_thumbnail()):?>
                <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
    <?php endif;?> 
        <div class="card-body">
        
                <h5 class="card-title"><?php the_title() ?></h5>  
                <p class="card-text"><?php the_excerpt() ?></p>    
                <a class="btn btn-primary" href="<?php the_permalink();?>">Read more</a>

        </div>
    </div>
    <?php endwhile; endif;?>
    </div>    
<?php get_footer();?>