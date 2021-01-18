<?php get_header();?>
<?php   
$title = get_field('title');
$description = get_field('description');
$wysiwyg = get_field('wysiwyg');
$image = get_field('image');
$img = $image['sizes']['large'];
$title = $image['title'];
$imageDescription = $image['description'];
$file = get_field('upload_file');
$fileUrl = $file['url'];
$fileName = $file['filename'];
$fileTitle = $file['title'];
$gallery = get_field('gallery');

?>


    <div class="container pt-5 pb-5">
        <h1><?php the_title();?></h1>
        <p>Front page</p>

        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

            <?php the_content() ?>

        <?php endwhile; endif;?>

        <?php if($title):?>
            <h3><?php echo $title; ?></h3>
        <?php endif;?>    

        <?php if($description):?>
            <p><?php echo nl2br($description); ?></p>
        <?php endif;?>    

        <?php if($wysiwyg):?>
            <p><?php echo ($wysiwyg); ?></p>
        <?php endif;?>  



          <?php if($image):?>  
          <h3><?php echo ($title) ?></h3>  
          <img class="img-fluid" src="<?php echo ($img) ?>" alt="">  
          <p><?php echo($imageDescription)?></p>
          <?php endif;?>  


          <?php if($file):?>  
          <h3><?php echo ($fileTitle) ?></h3>  
          <a href="<?php echo ($fileUrl)?>" download><?php echo ($fileName)?></a>
          <?php endif;?> 

          <?php if($gallery):?>

            <?php foreach($gallery as $img):?>
                <div class="col-3"><img class="img-fluid" src="<?php echo ($img['url']); ?>"></div>
            <?php endforeach?>
        <?php endif;?>  

        <?php
        $selects = get_field('select_color');
        foreach($selects as $select):?>
               <div><?php echo $select['label']?></div>
        <?php endforeach ?>    

        <?php $checkbox = get_field('checkbox');?>
        <div><?php echo implode(',' , $checkbox); ?></div>

        <?php 
        $button_group = get_field('button_group');?>
        <div><?php echo  ($button_group) ?></div>
    
        <?php 
        $relationship = get_field('cars_relationship');

            var_dump($relationship);

            foreach($relationship as $rel):
        ?>
        <div><a href="<?php echo $rel -> guid?>"><?php echo $rel -> post_title?></a>
        <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $rel -> ID, 'small' ) ?>" alt="">
        </div>
        <?php endforeach ?>
    
    
    
    </div>  



<?php get_footer();?>