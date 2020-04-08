<?php 
    $height = 176;
    if ( $squiggle['size'] == 'small') {
        $height = $height / 2; 
    }
?>

<svg class="squiggle-vertical <?php echo 'clr-' . $squiggle['color'] ?> <?php echo 'align-' . $squiggle['align'] ?>" width="8px" height="<?php echo $height ?>px" viewBox="0 0 8 <?php echo $height ?>">
    <g stroke-width="1" fill="none" fill-rule="evenodd">
        <path d="M7,0.5 C7,7.78970311 1,7.78970311 1,15.0794062 C1,22.3691093 7,22.3691093 7,29.6597942 C7,36.9514609 1,36.9514609 1,44.2431276 C1,51.5328307 7,51.5328307 7,58.8235156 C7,66.1142004 1,66.1142004 1,73.4058671 C1,80.6975338 7,80.6975338 7,87.9872369 C7,95.2798853 1,95.2798853 1,102.572534 C1,109.862237 7,109.862237 7,117.15194 C7,124.444588 1,124.444588 1,131.738219 C1,139.027922 7,139.027922 7,146.317625 C7,153.613219 1,153.613219 1,160.909794 C1,168.204406 7,168.204406 7,175.5" stroke="#F684B4" stroke-width="2"></path>
    </g>
</svg>

<?php 
    unset($squiggle);
?>