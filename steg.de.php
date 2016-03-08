<?php

require 'vendor/autoload.php';

$im = imagecreatefrompng("output.png");

echo Morpheus\Data::read($im);