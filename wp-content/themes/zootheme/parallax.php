        <div class="row center">
          <?php if(have_posts()) :
          while(have_posts()) : the_post(); ?>
          <h2 class="header col s12 light"><?php the_title(); ?></h2>
          <?php endwhile;
      endif; ?>
        </div>

        <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light brown lighten-1">Billeterie</a>
        </div>