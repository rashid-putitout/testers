<?php

$G = 3;
$S = 2;
$B = 5;
$X = 2;

$Q = 12;

$T1 = $T2 =  $T3 =  $T4 =  $T5 =  $T6 = 5;  
$T7 =  $T8 =  $T9 =  $T10 =  6;
$T11 =  $T12 = 0;

$weightings = $G + (0.6)*$S + (0.2)*$B;
$times = $T1 + $T2 +  $T3 +  $T4 +  $T5 +  $T6 + $T7 +  $T8 +  $T9 +  $T10 +  $T11 +  $T12;

$Sc = 100 * ($weightings / $Q) - ($times / $Q) * (10/1.2);

echo '<br /> weightings : '.$weightings;
echo '<br /> times : '.$times;
echo '<br /> score : '.$Sc;

$totalTIme = 185;
$minute = gmdate("i", $totalTIme);
$seconds = gmdate("s", $totalTIme);
echo '<br /> time :'.$minute.'m:'.$seconds.'s';