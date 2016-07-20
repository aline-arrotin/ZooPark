<?php get_header(); ?>
<?php affTemplate("front-page.php"); ?>
<div id="index-banner" class="parallax-container">
  <?php if(have_posts()) :
  while(have_posts()) : the_post();
  $image1 = get_field("image1"); ?>
  <div class="section no-pad-bot">
    <div class="slogan container">
      <div class="row center">
        <h2 class="header col s12 light"><?php the_field('titre1'); ?></h2>
      </div>
      <div class="row center">
        <a href="#" id="download-button" class="btn-large waves-effect waves-light brown lighten-1"><?php _e('Ticketing', 'zootheme') ?></a>
      </div>

    </div>
  </div>
  <div class="parallax"><img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>"></div>
<?php endwhile; ?>
<?php endif; ?>
</div>

<!-- animaux promote-->

<div class="container">
  <div class="section">

    <!--   Icon Section   -->
    <div class="row">
     <?php

     $terms = get_terms ('continent', array());
     $args = array(
      "post_type" => "les_animaux",
      "showposts" => -1,
      "orderby" => 'meta_value_num',
      "order" => 'ASC');


     $myNews = new WP_Query($args);
     if($myNews -> have_posts()) : ?>
     <?php while($myNews -> have_posts()) : $myNews -> the_post(); ?>
      <?php //print_r($post); ?>
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center brown-text"><i class="fi <?php the_field('class');?>"></i></h2>
          <h3 class="center"><?php the_title(); ?><em><?php $cat = wp_get_object_terms(get_the_ID(),
            'continent'); echo $cat[0]->name; ?></em></h3>

            <p class="light"><?php the_field('resume'); ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
</div>

<!-- Call-->
<div class="call orange lighten-1">
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 center">
          <?php
          $args = array(
            "post_type" => "technique",
            "p" => 106); //Permet d'appeler le post par son ID.


          $mytechnique = new WP_Query($args);
          if($mytechnique -> have_posts()) : ?>
          <?php while($mytechnique -> have_posts()) : $mytechnique -> the_post(); ?>
            <?php  $ssTitre = get_field("sous-titre");?> <!-- Déclaré ici et rappeler plus bas, pour ne pas entrer en conflit avec la boucle au centre. -->

            <p><?php the_title(); ?></p>

            <?php
            $tarifs = get_terms ('tarifs', array());
              //myPrint_r($tarifs);

            for($i=0; $i<count($tarifs); $i++) :
              //echo $tarifs[$i]->slug;
              $args = array(
                "post_type" => "tarifs",
                "showposts" => -1,
                "orderby" => 'meta_value_num',
                "order" => 'ASC',
                "tax_query" => array(
                  array(
                    'taxonomy' => "tarifs",
                    "field" => "slug",
                    "terms" => $tarifs[$i]->slug),
                  )
                );


            $mytarifs = new WP_Query($args);
            if($mytarifs -> have_posts()) : ?>
            <?php while($mytarifs -> have_posts()) : $mytarifs -> the_post(); ?>
              <a href="#" id="download-button" class="call-btn btn-large waves-effect waves-light brown lighten-1"><?php echo $tarifs[$i]->name; ?><strong><?php the_title(); ?></strong><span><?php the_field('prix'); ?></span></a>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php endfor; ?>

        <p><small><?php echo $ssTitre; ?></small></p> <!-- Est rappelé ici pour l'afficher. -->
      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</div>
</div>
</div>
</div>

<div class="parallax-container valign-wrapper">
  <?php if(have_posts()) :
  while(have_posts()) : the_post();
  $image2 = get_field("image2"); ?>
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row center">
        <h3 class="header col s12 light"><?php the_field('titre2'); ?></h3>
      </div>
    </div>
  </div>
  <div class="parallax"><img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>"></div>
<?php endwhile; ?>
<?php endif; ?>
</div>

<div class="opening container">
  <div class="section">
    <div class="row">
      <div class="col s12 center">
        <?php
        $args = array(
          "post_type" => "technique",
          "p" => 107);


        $mytechnique = new WP_Query($args);
        if($mytechnique -> have_posts()) : ?>
        <?php while($mytechnique -> have_posts()) : $mytechnique -> the_post(); ?>
          <?php //print_r($post); ?>
          <h3 class="orange-text"><?php the_field('sous-titre'); ?></h3>
          <h4><?php the_title(); ?></h4>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php
      $horaire = get_terms ('saisons', array());
              //myPrint_r($horaire);
      $horaireArray = array();
      for($i=0; $i<count($horaire); $i++) :
              //echo $horaire[$i]->slug;
        $args = array(
          "post_type" => "les_saisons",
          "showposts" => -1,
          "orderby" => 'meta_value_num',
          "order" => 'ASC',
          "tax_query" => array(
            array(
              'taxonomy' => "saisons",
              "field" => "slug",
              "terms" => $horaire[$i]->slug),
            )
          );

      

      $myhoraire = new WP_Query($args);
      if($myhoraire -> have_posts()) : ?>
      <?php while($myhoraire -> have_posts()) : $myhoraire -> the_post();
      //print_r($post);
      $horaireArray[] = array(//Je crée un Big Array dans lequel je mets tout dedans.
        $horaire[$i]->name,
        $content = apply_filters('the_content', $post->post_content), //Filtre pour afficher le p.
        get_field('id')
        );
        endwhile; ?>
      <?php endif; ?>
    <?php endfor; ?>

    <?php //myPrint_r($horaireArray); ?>

    <ul class="tabs">
      <?php for($i=0; $i<count($horaireArray); $i++) : ?>

        <li class="tab col s3"><a href="#<?php echo $horaireArray[$i][2] ?>"><?php echo $horaireArray[$i][0]; ?></a></li>
      <?php endfor; ?>
    </ul>

  </div>

  <?php for($i=0; $i<count($horaireArray); $i++) : ?>
    <div id="<?php echo $horaireArray[$i][2]?>" class="col s12">
      <p><?php echo  $horaireArray[$i][1] ?></p>
    </div>
  <?php endfor; ?>

</div>
</div>
</div>

  <div class="parallax-container valign-wrapper">
    <?php if(have_posts()) :
    while(have_posts()) : the_post();
    $image3 = get_field("image3"); ?>
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h3 class="header col s12 light"><?php the_field('titre3'); ?></h3>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>"></div>
  <?php endwhile; ?>
  <?php endif; ?>
  </div>
<?php get_footer(); ?>