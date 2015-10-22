/**
 * @url http://www.digimantra.com/ 
 */
<?php
/**
 * facebook有多少粉丝
 * @param  [type] $facebook_name [description]
 * @return [type]                [description]
 */
function fb_fan_count($facebook_name){
    // Example: https://graph.facebook.com/digimantra
    $data = json_decode(file_get_contents("https://graph.facebook.com/".$facebook_name));
    echo $data->likes;
}