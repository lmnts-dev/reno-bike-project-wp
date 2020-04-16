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
$navItems = wp_get_nav_menu_items('Primary Navigation');

?>


<div class="overlay-nav-container" id="overlay-nav">
    <div class="left">
        <div class="top">
            <a href="/" class="branding nav-overlay-toggle">
                <?php // echo '<img src="' . esc_url( $logo_dark[0] ) . '" alt="VCC Logo">'; ?>
            </a>
            <div class="exit nav-overlay-toggle" id="overlay-exit"></div>
        </div>
        <nav class="overlay-nav">
        <div class="menu-primary-navigation-container">
            <ul class="menu" id="menu-primary-navigation-1">
                <?php foreach ( $navItems as $item ){ ?>
                    <?php 
                        $parent = false;
                        foreach ( $navItems as $tempItem ){
                            if (  $tempItem->menu_item_parent == $item->ID ){
                                $parent = true;
                                break;
                            }
                        }
                    ?>
                    <?php if ( $item->menu_item_parent == 0 ){ ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $parent ? 'menu-item-has-children' : '' ?> menu-item-<?php echo $item->ID ?>">
                            <a href="<?php echo $item->url ?>" class="nav-overlay-toggle">
                                <?php echo $item->title ?>
                            </a>
                            <?php if ($parent) {?>
                                <input type="checkbox" id="toggle-<?php echo $item->ID ?>" name="toggle"/>
                                <label for="toggle-<?php echo $item->ID ?>"></label>
                                <ul class="sub-menu">
                                    <?php foreach ( $navItems as $subItem ){ ?>
                                        <?php if ( $subItem->menu_item_parent == $item->ID ){ ?>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?php echo $subItem->ID ?>">
                                                <a href="<?php echo $subItem->url ?>" class="nav-overlay-toggle">
                                                    <?php echo $subItem->title ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            <?php }?>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </nav>
        <div class="overlay-nav-cta">
          <a href="<?php echo $cta['button_url'] ?>">
            <?php echo $cta['button_label'] ?>
          </a>
        </div>
    </div>
    <div class="right"></div>
</div>