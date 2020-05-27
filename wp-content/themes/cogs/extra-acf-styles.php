<?php
// We'll be outputting CSS
header('Content-type: text/css');
 
?>

.acf-tooltip.acf-fc-popup.bottom {
    width: 30vw;
    min-width: 200px;
    top: 0 !important;
    bottom: 0;
    right: 0;
    left: unset !important;
    position: fixed;
    overflow: auto;
    border-radius: 0;
    margin-top: 0;
}

.acf-tooltip.acf-fc-popup.bottom a {
    font-size: 16px;
    line-height: 1.5;
}

.acf-tooltip.acf-fc-popup.bottom:before {
    content: none;
}