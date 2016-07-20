<?php get_header(); ?>
<?php affTemplate("archive-les_animaux.php"); ?>
<div class="row">
	<?php
	$args = array(
		"post_type" => "les_animaux",
		"showposts" => -1,
		"orderby" => 'meta_value_num',
		"order" => 'ASC');


	$mylink = new WP_Query($args);
	//print_r($mylink);
	if($mylink -> have_posts()) : ?>
	<?php while($mylink -> have_posts()) : $mylink -> the_post(); ?>
		<div class="col s12 m4">
			<div class="icon-block">
				<h2 class="center brown-text"><i class="fi <?php the_field('class');?>"></i></h2>
				<h3 class="center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><em><?php $cat = wp_get_object_terms(get_the_ID(),
					'continent'); echo $cat[0]->name; ?></em></a></h3>

					<p class="light"><?php the_excerpt($length); ?></p>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>