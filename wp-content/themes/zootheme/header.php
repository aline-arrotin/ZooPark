<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Zoopark</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo bloginfo('template_url'); ?>/css/styles.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class=" ">
    <div class="search-bar nav-wrapper lighten-1 container">
    <?php get_search_form(); ?>
    </div>
  </nav>
  <nav class="white nav-princip" role="navigation">
    <div class="nav-wrapper container">
    <a id="logo-container" href="<?php bloginfo('url');?>" class="brand-logo"><h1 class="brand">ZooPark/<em>adventure</em></h1></a>

      <?php

      $args = array('container' => 'ul', 'container_class' => 'right hide-on-med-and-down', 'menu_class' =>'right hide-on-med-and-down', 'menu' => 'primary','theme_location' => 'primary');
      wp_nav_menu($args); ?>

      <?php

      $args = array('menu_id' => 'nav-mobile', 'container_id' => 'nav-mobile', 'container' => 'ul', 'container_class' => 'side-nav', 'menu_class' =>'side-nav', 'menu' => 'mobile','theme_location' => 'mobile');
      wp_nav_menu($args); ?>

      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>



