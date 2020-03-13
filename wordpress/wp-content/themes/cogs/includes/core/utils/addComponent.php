<?php

/** 
 * 
 * addComponent:
 * Our function to conditionally call our site sections
 * when they are used outside of the ACF loop.
 * 
 * @author Peter Laxalt
 * @since 3/2020
 * 
 */


function addComponent($name)
{
    $rowLayout = $name;
    $idx = 'static';

    include get_template_directory() . '/includes/lib/sections/' . $rowLayout . '.php';
}
