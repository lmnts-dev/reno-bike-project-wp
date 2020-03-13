<?php

/** 
 * Default Search Form Template
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

?>

<form action="/" method="get">
  <input type="text" name="s" placeholder="Search" id="search" value="<?php the_search_query(); ?>" />
</form>