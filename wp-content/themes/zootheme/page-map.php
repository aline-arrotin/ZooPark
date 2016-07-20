<?php
/**
* Template Name: map
**/
?>
<?php get_header(); ?>
<?php affTemplate("page-map.php"); ?>
<div class="mini-map section">
	<div class="container">
		<div class="row">
			<div name="" id="liste">
			</div>
			
	<div class="col s12" id="map">
		<img src="<?php echo bloginfo('template_directory'); ?>/img/pointeur.png" alt="" id="cursor">
		<img src="<?php echo bloginfo('template_directory'); ?>/content/images/zoo-map.png" id="carte" alt="map"></div>
	</div>
</div>
</div>
<?php get_footer(); ?>

<script>

	mySelect = document.querySelector("#liste");
	myCursor = document.querySelector("#cursor");
	//alert('test');
	<?php $args = array(
					"post_type" => "les_animaux",
					"showposts" => -1,
					"orderby" => 'meta_value_num',
					"order" => 'ASC'
					);
				 $myanimals = new WP_Query($args);
				if($myanimals -> have_posts()) : ?>

				<?php while($myanimals -> have_posts()) : $myanimals -> the_post();
	$myAnimals[] = array("nom" => get_the_title(), "locationX" => get_field("longitude"), "locationY" => get_field("latitude"));?>
				<?php endwhile; ?>
				<?php 
				$myAnimals = json_encode($myAnimals); //myPrint_r($myAnimals); ?>
			<?php endif; ?>
	myAnimals = <?php echo $myAnimals; ?>;
	texte = '<select id="selectList">';
	texte += '<option value="choice">Choix</option>';
	for(i=0; i< myAnimals.length; i++) {
		texte += '<option value="'+i+'">' + myAnimals[i].nom + '</option>';
	}
	texte += '</select>';
	mySelect.innerHTML = texte;

	mySelect = document.querySelector("#liste select");
	mySelect.onchange = function(){
		//alert("change");
		idChoice = this.value;
		if (idChoice != 'choice') {
			myCursor.style.left = myAnimals[idChoice].locationX;
			myCursor.style.top = myAnimals[idChoice].locationY;
			myCursor.style.display = 'block';
		} else myCursor.style.display = 'none';
	};
</script>







