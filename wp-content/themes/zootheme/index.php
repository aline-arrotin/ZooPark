<?php get_header(); ?>
<?php affTemplate("index.php"); ?>
<main>
  <section>
    <?php if(have_posts()) :
      while(have_posts()) : the_post(); ?>
<!--      <?php //print_r($post); ?> -->
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php endwhile;
    endif; ?>
  </section>
</main>
<?php get_footer(); ?>