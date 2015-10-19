<?php

$array1 = array(
    'first' => 'val 1',
    'second' => '',
    'third' => 'val 3',
    'fourth' => '',
    'fifth' => 'val 5',
);
$array2 = array('1','2','3','4');
$array3 = array('1','2','5','7');

echo '<pre>';
//print_r(array_filter($array1));
print_r(array_diff($array3, $array2));