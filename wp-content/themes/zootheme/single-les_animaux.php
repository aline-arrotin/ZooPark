<?php get_header(); ?>
<?php affTemplate("single-les_animaux.php"); ?>
<div class="row">
	<?php
	$args = array(
		"post_type" => "les_animaux",
		"showposts" => -1,
		"orderby" => 'meta_value_num',
		"order" => 'ASC');


	
	//print_r($mylink);
	if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<div class="col s12 m8 center">
			<div class="icon-block">
				<h2 class="center brown-text"><i class="fi <?php the_field('class');?>"></i></h2>
				<h3 class="center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><em><?php $cat = wp_get_object_terms(get_the_ID(),
					'continent'); echo $cat[0]->name; ?></em></a></h3>

					<p class="light"><?php the_content(); ?></p>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>