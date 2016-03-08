<?php

require 'vendor/autoload.php';
$im = imagecreatefrompng("normal.png");
$data = 'Test';
Morpheus\Data::write($data, $im);
imagepng($im, "output.png");