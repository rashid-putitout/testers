<?php



$string = "RNOH_Radiology_Musculoskeletal Doctor_15?10*30>TEMPLATE";
$disallowedCharacters = array('/',"\\",'?','*',':','"','<','>','|');
$newString = str_replace($disallowedCharacters, "_", $string);

echo '<br /> old : '.$string;
echo '<br /> new : '.$newString;