<?php
/**
 * Created by PhpStorm.
 * User: Vlado
 * Date: 10-Feb-17
 * Time: 18:23
 */

header("Content-type: image/jpeg");
//URL for IMDb Image.
$url = rawurldecode($_REQUEST['url']);
echo file_get_contents($url);
?>