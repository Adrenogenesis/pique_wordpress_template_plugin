<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <div class="sidebar-module">
        <form role="search" method="get" id="searchform"
              class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div>
                <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" /><br>
                <input type="submit" id="searchsubmit"
                       value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
            </div>
        </form>
        <h4>Archives</h4>
        <ol class="list-unstyled">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
        </ol>
    </div>
    <div class="sidebar-module">
        <ol class="list-unstyled">
            <li><a href="<?php echo wp_login_url( home_url() ); ?>" title="Login">Connexion</a></li>
            <li><a href="wp-login.php?action=register">Inscription</a></li>
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</div><!-- /.blog-sidebar -->