<?php

require('b2n.php');

require 'keys.php';

require 'vendor/autoload.php';

$accname = $_POST["key"];

$im = imagecreatefrompng($accname . ".png");

$base128 = new Base2n(6);

$edata = Morpheus\Data::read($im);

$rdata = explode("-[sep]-", $edata);

$co = $rdata[2];
$key = $keys[$co];
$sig = $rdata[1];

$myPublic = $base128->decode($key);
$signature = $base128->decode($sig);



$message = $rdata[0];

if (ed25519_sign_open($message,  $myPublic, $signature)){

echo "<b>" . $message . "</b>'s Command Seal is verified to have been issued by <b>" . $rdata[2] . "</b>";

} else { 
echo "Invalid Comand Seal Verification";
}
?>
<br><br>
<form action="" method="POST" enctype="multipart/form-data">
Name - <input type="text" name="key" /><br>
<input type="submit"/>
<br><br>

<b>List of Names:</b>
<br>
<?php
$snips = glob("./*.png");
foreach($snips as $snip) {
if (!(pathinfo($snip, PATHINFO_FILENAME) === "normal")){
echo pathinfo($snip, PATHINFO_FILENAME) . "<br>";
}
}


 
