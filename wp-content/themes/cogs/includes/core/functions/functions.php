<?php

function imageOrientation($imgSrc)
{
    list($width, $height) = getimagesize($imgSrc);

    if ($width < $height) {
        return 'portrait';
    } else if ($height < $width) {
        return 'landscape';
    } else if ($width == $height) {
        return 'portrait square';
    }
}
