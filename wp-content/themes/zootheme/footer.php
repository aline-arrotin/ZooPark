   <footer class="page-footer brown lighten-1">
    <div class="container">
      <div class="row">

        <?php
        $terms = get_terms ('faire', array(
          "orderby" => 'name',
          "order" => "DESC"));
            //myPrint_r($terms);

        for($i=0; $i<count($terms); $i++) :
              //echo $terms[$i]->slug;
          $args = array(
            "post_type" => "a_faire",
            "showposts" => -1,
            "orderby" => "title",
            "order" => "DESC",
            "tax_query" => array(
              array(
                'taxonomy' => "faire",
                "field" => "slug",
                "terms" => $terms[$i]->slug),
              )
            );


        $myshow = new WP_Query($args);
        if($myshow -> have_posts()) : ?>

        <div class="col l3 m6 s12">
          <h3 class="white-text"><?php echo $terms[$i]->name; ?></h3>
          <ul class="footer-links">
            <?php while($myshow -> have_posts()) : $myshow -> the_post(); ?>
              <?php //print_r($post); ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
    <?php endfor; ?>


    <div class="gmap col l6 m12 s12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.611005566264!2d4.42693131589!3d50.46696797947765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c22f2139954003%3A0xe96185b4bd67c4d8!2sRue+Joseph+Stranard%2C+6041+Charleroi!5e0!3m2!1sfr!2sbe!4v1468392433608" style="width:100%; height:225px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</div>


<div class="section white">
  <div class="access-map container">
    <div class="row">
      <div class="col s12 center">
        <h3 class="brown-text">Adresse</h3>


        <?php $col4 = array(
          'post_type' => 'adresse',
          'posts_per_page'=> -1
          );


          $adresse = new WP_Query($col4); ?>

          <?php if($adresse -> have_posts()) :
          while($adresse -> have_posts()) : $adresse -> the_post(); ?>
          <p>
            <h4><em><?php the_field("ville"); ?></em>
              <img src="<?php echo bloginfo('template_directory'); ?>/img/ZOOPARK-03.svg" alt="logo"></h4>

              <span itemprop="streetAddress"><?php the_field("adresse"); ?></span>
              <span itemprop="addressLocality"><?php the_field("localite"); ?></span>
              <span itemprop="addressRegion"><?php the_field("region"); ?></span>
          </p>
              <p><?php the_field("sortie"); ?></p>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="section version grey darken-3">
    <div class="row">
     <?php $translations = pll_the_languages( array( 'raw' => 1 ) ); ?><?php //print_r($translations); //Je récupère mon array. ?>
     <?php foreach($translations as $key => $value) : // Dans mon array je récupère ma clé et sa valeur.?>
       <?php $link = $value['url']; // Ma variable $link est = à mon array à la ligne [url].
       $label= $value['name'];  // Ma variable $label est = à mon array à la ligne [name].?>
       <div class="col s6 center">
        <a href="<?php echo $link; //J'appel ma variable.?>" class="waves-effect text waves-orange btn-flat">
          <?php echo $label; //J'affiche ma variable.?>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="footer-copyright center grey darken-4">
  <div class="container">
    ZooPark <a class="brown-text text-lighten-3" href="#">2016</a>
  </div>
</div>
</footer>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/materialize.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/init.js"></script>
  <script>   $(document).ready(function() {
    $('select').material_select();
  });</script>
</body>
</html>