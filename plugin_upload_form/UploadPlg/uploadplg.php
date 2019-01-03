<?php

/**
* Plugin Name: UploadPlug
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
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Votre nom<br/>';
	echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
  // Upload a file
  echo '<input type="hidden" name="MAX_FILE_SIZE" value="30000" />';
  echo'<input type="file" name="fileToUpload" id="fileToUpload" />';
  echo '<input type="submit" name="submit" value="Envoyer le fichier" />';
  echo '</p>';
  // Email expéditeur et du destinataire
	echo '<p>';
	echo 'Votre email<br/>';
	echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
  echo '<p>';
  echo 'Email du destinataire<br/>';
  echo '<input type="email" name="dst-email" value="' . ( isset( $_POST["dst-email"] ) ? esc_attr( $_POST["dst-email"] ) : '' ) . '" size="40" />';
  echo '</p>';
	echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
  echo '</form>';
}

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$subject = sanitize_text_field( $_POST["cf-subject"] );
		$message = esc_textarea( $_POST["cf-message"] );

		// get the blog administrator's email address
		$to = get_option( 'dst_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Merci pour votre message, nous vous enverrons une réponse au plus vite.</p>';
			echo '</div>';
		} else {
			echo 'Erreur inattendue !';
		}
	}
}

// File is_uploaded_file
function upload_file(){

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
}

function cf_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();
  upload_file();
	return ob_get_clean();
}

add_shortcode( 'sitepoint_contact_form', 'cf_shortcode' );


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
