<?php

/** 
 * Overlay Navigation
 * Site Overlay Navigation
 * 
 * @author Alisha Garric
 * @since 3/2020
 */

/************************************/
/** Variables */
/************************************/

$cta = get_field('navigation_bar', 'option')['call_to_action'];
$nav = wp_nav_menu(array('menu' => 'primary', 'echo' => false ));
$nav = str_replace( '<ul class="sub-menu">', '<input type="checkbox"><ul class="sub-menu">', $nav );

?>


<div class="overlay-nav-container flex-row" id="overlay-nav">
    <div class="left">
        <div class="top">
            <a href="/" class="branding">
                <?php // echo '<img src="' . esc_url( $logo_dark[0] ) . '" alt="VCC Logo">'; ?>
            </a>
            <div class="exit" id="overlay-exit"></div>
        </div>
        <nav class="overlay-nav">
            <?php  echo $nav ?>
        </nav>
        <div class="overlay-nav-cta">
          <a href="<?php echo $cta['button_url'] ?>">
            <?php echo $cta['button_label'] ?>
          </a>
        </div>
    </div>
    <div class="right"></div>
</div>

<script>
    (function($) {
    "use strict";
        $(document).ready(function(){
            $( "#mobile-nav-icon" ).click(function() {
                $( "#overlay-nav" ).addClass("visible");
                $( "header" ).addClass("hidden");
                $( "body" ).addClass("overlay-lock");
            });

            $( "#overlay-exit" ).click(function() {
                $( "#overlay-nav" ).removeClass("visible");
                $( "header" ).removeClass("hidden");
                $( "body" ).removeClass("overlay-lock");
            });
        });
    })(window.jQuery);

</script>