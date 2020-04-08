<?php 
    $width = 176;
    if ( $squiggle['size'] == 'small') {
        $width = $width / 2; 
    }
?>

<svg class="squiggle-horizontal <?php echo 'clr-' . $squiggle['color'] ?> <?php echo 'align-' . $squiggle['center'] ?>" width="<?php echo $width ?>px" height="8px" viewBox="0 0 <?php echo $width ?> 8">
    <g stroke-width="1" fill="none" fill-rule="evenodd">
        <path d="M91,-83.5 C91,-76.2102969 85,-76.2102969 85,-68.9205938 C85,-61.6308907 91,-61.6308907 91,-54.3402058 C91,-47.0485391 85,-47.0485391 85,-39.7568724 C85,-32.4671693 91,-32.4671693 91,-25.1764844 C91,-17.8857996 85,-17.8857996 85,-10.5941329 C85,-3.30246623 91,-3.30246623 91,3.98723688 C91,11.2798853 85,11.2798853 85,18.5725338 C85,25.8622369 91,25.8622369 91,33.15194 C91,40.4445884 85,40.4445884 85,47.7382187 C85,55.0279218 91,55.0279218 91,62.3176249 C91,69.6132187 85,69.6132187 85,76.9097942 C85,84.2044062 91,84.2044062 91,91.5" stroke="#F684B4" stroke-width="2" transform="translate(88.000000, 4.000000) rotate(90.000000) translate(-88.000000, -4.000000) "></path>
    </g>
</svg>

<?php 
    unset($squiggle);
?>