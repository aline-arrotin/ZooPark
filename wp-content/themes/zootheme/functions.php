<?php //J'ouvre php mais je ne le ferme pas.
//Mettre une image à la une.
add_theme_support('post-thumbnails');

//Déclarer un menu.

register_nav_menu( 'primary', 'menu principal');
register_nav_menu( 'mobile', 'menu mobile');


//Mes fonctions.
//Pour savoir sur quel page(template) nous sommes.
function affTemplate($template) {
	echo '<div id="affTemplate">'.$template.'</div>';
}

function myPrint_r($variable){
	echo "<pre>";
	print_r($variable);
	echo "</pre>";
}


function my_get_search_form() {
	$form = '<form action="'.get_bloginfo("url").'">';
	$form.= '<div class="input-field">';
	$form.= '<input name="s" id="search" type="search" value="'.get_search_query().'" required>';
	$form.= '<label for="search"><i class="material-icons">search</i></label>';
	$form.= '<i class="material-icons">close</i>';
	$form.= '</div>';
	$form.= '</form>';
	return $form;
}

add_filter('get_search_form', 'my_get_search_form');

//Make theme available for translation

load_theme_textdomain('zootheme', get_template_directory() . '/lang');


function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');