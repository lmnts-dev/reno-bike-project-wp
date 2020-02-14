<?php

function getVimeoThumb($id) {
    $lib = new \Vimeo\Vimeo("8d28927fa7e8a65a0a02c916dbb14100e025d239", "LmvHVR7ZhA5FNueiZRxS767F229PJIPJqXL7u8XqZ5N4+MZesIjs+hJ7feeD8fRu82hgxdrYPh/kghTZLSTtkGaw7ndg+ce5dD4dOoiVeqdxwLfOTMu0DGLv6U+lrtGe", "189c612d23025460017caafe852d0587");
    $redirect_uri = "http://local.dannyforster.com/";
    $url = $lib->buildAuthorizationEndpoint($redirect_uri, "","abc");
    $response = $lib->request('/videos/'.$id.'/pictures', array('per_page' => 1), 'GET');
    //return $response['data'][0]['sizes'][6]['link'];
    return $response['body']['data'][0]['sizes'][6]['link'];
}

function imageOrientation($imgSrc) {
    list($width, $height) = getimagesize($imgSrc);

    if ($width < $height) {
        return 'portrait';
    }
    else if ($height < $width) {
        return 'landscape';
    }
    else if ($width == $height) {
        return 'portrait square';
    }
}

?>
