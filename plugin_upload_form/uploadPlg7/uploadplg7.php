<?php

/**
* Plugin Name: UploadPlg7
* Plugin URI: http://www.mainwp.com
* Description: This plugin does some stuff with WordPress
* Version: 1.0.0
* Author: Scarabator
* Author URI: http://www.mainwp.com
* License: GPL2
*/



add_action('admin_menu', 'test_plugin_setup_menu');

function test_plugin_setup_menu(){
        add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
}

function test_init(){
        test_handle_post();
?>
        <h1>Hello World!</h1>
        <h2>Upload a File</h2>
        <!-- Form to handle the upload - The enctype value here is very important -->
        <form  method="post" enctype="multipart/form-data">
                <input type='file' id='test_upload_pdf' name='test_upload_pdf'></input>
                <?php submit_button('Upload') ?>
        </form>
<?php
}

function test_handle_post(){
        // First check if the file appears on the _FILES array
        if(isset($_FILES['test_upload_pdf'])){
                $pdf = $_FILES['test_upload_pdf'];

                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded=media_handle_upload('test_upload_pdf', 0);
                // Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
}

?>
