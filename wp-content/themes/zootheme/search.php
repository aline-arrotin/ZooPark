<?php get_header();?>
<?php affTemplate("search.php"); ?>
<div class="section">
  <div class="container">
    <div class="row center">
      <h2 class="header col s12 light">Résultat(s) de votre recherche:</h2>
      <?php $search_query = get_search_query(); ?>
      <?php if(have_posts($search_query)):
      while(have_posts($search_query)) : the_post($search_query); ?>
      <div class="col s12 center">
        <h3 class="center"><?php the_title(); ?></h3>
        <p><?php the_content(); ?></p>
      </div>
    <?php endwhile;
    endif; ?>
  </div>
</div>
</div>
<?php get_footer(); ?>