<?php

$location = "/".filter_input(INPUT_GET, '_escaped_fragment_');
return makePage(getData($location), $location);

function makePage($data, $loc) {
    $pageUrl = "http://example.com".$loc;

    $html  = '<!doctype html>'.PHP_EOL;
    $html .= '<html>'.PHP_EOL;
    $html .= '<head>'.PHP_EOL;

    $html .= '<meta property="og:title" content="'.$data['title'].'"/>'.PHP_EOL;
    $html .= '<meta property="og:type" content="website"/>'.PHP_EOL;
    $html .= '<meta property="og:description" content="'.$data['description'].'"/>'.PHP_EOL;
    $html .= '<meta property="og:site_name" content="SITE_NAME"/>'.PHP_EOL;
    $html .= '<meta property="og:image" content="'.$data['img'].'"/>'.PHP_EOL;
    $html .= '<meta property="og:image:type" content="'.$data['img_type'].'"/>'.PHP_EOL;
    $html .= '<meta property="og:image:width" content="'.$data['img_width'].'"/>'.PHP_EOL;
    $html .= '<meta property="og:image:height" content="'.$data['img_height'].'"/>'.PHP_EOL;

    $html .= '<title>'.$data['title'].'</title>'.PHP_EOL;
    $html .= '<meta name="description" content="'.$data['description'].'"/>'.PHP_EOL;

    $html .= '<meta property="name" content="'.$data['title'].'"/>'.PHP_EOL;
    $html .= '<meta property="description" content="'.$data['description'].'"/>'.PHP_EOL;

    $html .= '<meta property="twitter:title" content="'.$data['title'].'"/>'.PHP_EOL;
    $html .= '<meta property="twitter:description" content="'.$data['description'].'"/>'.PHP_EOL;
    
    $html .= '<meta http-equiv="refresh" content="0;url='.$pageUrl.'">'.PHP_EOL;
    $html .= '</head>'.PHP_EOL;
    $html .= '</html>';

    echo $html;
}

function getData($loc) {
    $data = json_decode(file_get_contents('./meta.json'), true)['meta'];
    $dataCount = count($data);
    for ($x = 0; $x <= $dataCount; $x++) {
        if ($data[$x]['location'] == $loc){
            return $data[$x];
        }
    } 
}