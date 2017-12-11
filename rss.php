<?php

header('Content-type: application/xml');
echo file_get_contents("http://ngeonline.com/podcast/darkmoon-herald/feed/");

?>
