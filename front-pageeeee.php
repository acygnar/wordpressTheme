<?php get_header();?>
<?php $link = get_field('link'); 
      $page_link = get_field('page_link');
      
?>

    <div class="container pt-5 pb-5">
        <h1><?php the_title();?></h1>
        <p>Front page</p>

    
        <?php 
        $relationship = get_field('cars_relationship');
            foreach($relationship as $post):
        ?>
        <?php setup_postdata( $post )?>
            <div>
            <?php the_content() ?>
            <?php the_field('owner') ?>
            </div>
           
            
              
       
        <?php wp_reset_postdata()?>
        <?php endforeach ?>
    
        <p><?php echo print_r($link)  ;?></p>
        <a href="<?php echo $link['url']  ;?>"><?php echo $link['title']  ;?></a>


        <div>
            <p><?php echo print_r($page_link);?></p>

            <?php foreach($page_link as $link):?>
                
                <a href="<?php echo $link;?>"><?php echo $link  ;?></a>

            <?php endforeach; ?>
        
        </div>


        <br /><br />
        <div>
        <?php if(have_rows('repeater')):?>
        
                <?php while(have_rows('repeater')) : the_row();?>

                    <p><?php echo the_sub_field('text') ?></p>
                    <p><?php echo the_sub_field('text2') ?></p>

                    <div>
                    <?php $image = get_sub_field('image');
                          echo print_r($image);
                          $img = $image['sizes']['medium'];  
                    ?>
                        <img src="<?php echo $img ?>" alt="">
                    </div>

                <?php endwhile; ?>
            
         <?php endif; ?>   

        
        </div>
    
    </div>  



<?php get_footer();?>