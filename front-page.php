<?php get_header();?>
    <div class="container pt-5 pb-5">
        <h1><?php the_title();?></h1>
        <p>Front page</p>

        <h4><?php echo the_field('number','options') ?></h4>
        <h4><?php echo the_field('test','Options') ?></h4>


            <?php if(have_rows('content')): ?>
                <?php while(have_rows('content')): the_row();?>

                    <?php if(get_row_layout() == 'item'):?>
                            
                    <?php $repeater = get_sub_field('repeater') ?>

                        <?php foreach($repeater as $rep):?>

                            <div>
                                <h3><?php echo $rep['text1']  ?></h3>
                                <p><?php  echo $rep['text2']?></p>
                            </div>
                            

                        <?php endforeach; ?>

                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>



    </div>    

<?php get_footer();?>