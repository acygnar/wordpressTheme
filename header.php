<!DOCTYPE html>
<html lang="pl">
<head>
    
    <?php wp_head();?>

</head>
<body <?php body_class();?>>

<header>

    <div class="container">
    <?php wp_nav_menu( array(

        'theme_location' => 'top-menu',
        'menu_class' => 'navigation',

));?>
    </div>
  
<div class="conditional">
<p>Test conditionals tags:  <?php conditionalText(); ?></p>
</div>

</header>
    
