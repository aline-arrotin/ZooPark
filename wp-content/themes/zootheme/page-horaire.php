<?php
/**
* Template Name: horaire
**/
?>
<?php get_header(); ?>
<?php affTemplate("page-horaire.php"); ?>
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
              //myPrint_r($tarifs);

        for($i=0; $i<count($horaire); $i++) :
              //echo $tarifs[$i]->slug;
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
        <?php while($myhoraire -> have_posts()) : $myhoraire -> the_post(); ?>
          <ul class="tabs">
            <li class="tab col s3"><a href="#spring"><?php echo $horaire[$i]->name; ?></a></li>
          </ul>
        </div>
        <div id="spring" class="col s12"><p><?php the_content(); ?></p></div>

      <?php endwhile; ?>
    <?php endif; ?>
  <?php endfor; ?>
</div>
</div>
</div>
<?php get_footer(); ?>