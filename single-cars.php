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


            <?php if( get_field('Tekst') ): ?>
            <h2><?php the_field('Tekst'); ?></h2>
            <?php endif; ?>

            <?php if( get_field('wysiwyg nazwa') ): ?>
            <div class="acf-field"><?php the_field('wysiwyg_nazwa'); ?></div>
            <?php endif; ?>

            <p>Test flexible content</p>

           

            <p>Wyświetlanie grupy postów </p>
            
            <div class="row">  
<?php 
    $specifications_fields = get_specifications_fields();
              
    foreach ( $specifications_fields as $name => $field ):
        $value = $field['value'];
?>     
     
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 key">
        <strong><?php echo $field['label']; ?>:</strong>
    </div>
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-6 col-xs-12 value">
        <?php echo $value; ?>      
    </div> 
         
    <?php endforeach; ?>
</div> 

        <?php endwhile; endif;?>
    </div>    
<?php get_footer();?>