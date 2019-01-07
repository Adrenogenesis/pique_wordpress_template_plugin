<?php

/**
* Plugin Name: UploadPlug3
* Plugin URI: http://www.mainwp.com
* Description: This plugin does some stuff with WordPress
* Version: 1.0.0
* Author: Scarabator
* Author URI: http://www.mainwp.com
* License: GPL2
*/

// Hook the 'wp_footer' action hook, add the function named 'mfp_Add_Text' to it
add_action("the_content", "html_form_code");

  function html_form_code() {

  echo "<p id='upl'>Formulaire de contact.</p>";
	echo '<form action="wp-content/plugins/UploadPlg6/uplg.php" method="post">';
  echo '<p>';
	echo 'Votre nom<br/>';
  echo '<input type="text" name="name">';
  echo '</p>';
  echo '<p>';
  echo 'Votre email<br/>';
  echo '<input type="text" name="email">';
  echo '</p>';
  echo '<p>';
  echo 'Email du destinataire<br/>';
  echo'<input type="text" name="dst_email">';
  echo '</p>';
  echo'<p>Envoyer votre fichier</p>';
  echo'<input type="file" name="uploaded_file"></input><br />';
  echo'<input type="submit" value="Envoyer"></input>';
  echo'<input type="reset" value="Effacer">';

  echo '</form>';

}

// Add link

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'my_plugin_action_links' );

function my_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=gpaisr') ) .'">Paramètres</a>';
   $links[] = '<a href="http://newsteck.com" target="_blank">Plus de plugins avec NewsTech</a>';
   return $links;
}

function upl_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#upl {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
    color: black;
		font-size: 11px;
	}
	.block-editor-page #upl {
		display: none;
	}
	</style>
	";
}

add_action( 'admin_head', 'upl_css' );

?>
