<?php

require('b2n.php');
require 'vendor/autoload.php';

$base128 = new Base2n(6);


$key = $_POST["key"];

$mySecret = $key;
$myPublic = ed25519_publickey($mySecret);

$message = htmlspecialchars($_POST["message"]);
$co = htmlspecialchars($_POST["co"]);

$signature = ed25519_sign($message, $mySecret, $myPublic);

$rpub = $base128->encode($myPublic);
$rsig = $base128->encode($signature);

echo "Public Key = ";
echo $rpub;
echo "<br><br> Pilot Name = ";
echo $message;
echo "<br><br> Signature = ";
echo $rsig;

$data = $message . "-[sep]-" . $rsig . "-[sep]-" . $co;

echo "<br><br> Data = ";
echo $data;

$im = imagecreatefrompng("normal.png");
Morpheus\Data::write($data, $im);
imagepng($im, $message . ".png");

echo "<br><br><a href='" . $message . ".png'> Download Seal </a>"
?> - If there is no pilot's name above, do not download.
<br>
<br>
Only currently logged leader is named 'Foo Bar' and uses the password 'testPASSWORDpleaseIGNORE-TESTKEY'
<br>
<br>
<form action="" method="POST" enctype="multipart/form-data">
Password - <input type="text" name="key" value="testPASSWORDpleaseIGNORE-TESTKEY" maxlength="32" /> Must be exactly 32 charecters - Fill until it stops.<br>
Pilot Name - <input type="text" name="message" value="Bar Foo" /><br>
Leader Name - <input type="text" name="co" value="Foo Bar" /><br>
<input type="submit"/>
<br><br> 

<a href='de.php'>Verification Page</a>