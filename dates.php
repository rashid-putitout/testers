<?php 

echo '<h1>Date Difference</h1>' ;

$date1 = "2015-08-01";
$date2 = "2015-07-01";

$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff / (365 * 60 * 60 * 24));
$months = ceil(($diff - ($years * 365 * 60 * 60 * 24)) / ((365 * 60 * 60 * 24) / 12));
$months2 = floor(($diff - ($years * 365 * 60 * 60 * 24)) / ((365 * 60 * 60 * 24) / 12));
$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months2 * 30 * 60 * 60 * 24)/ (60 * 60 * 24));

echo " $years years $months months $days days";
echo '<br /> ---------------------------------------------------------------------- <br />';

echo '<h1>Date Difference with datetime objects </h1>' ;
$datetime1 = new DateTime($date1);
$datetime2 = new DateTime($date2);
$interval = $datetime1->diff($datetime2);
$results = array();
$results['years'] = $interval->format('%y');
$results['months'] = $interval->format('%m');
$results['days'] = $interval->format('%d');
echo '<pre>';print_r($results); echo '</pre>';

echo '<br /> ---------------------------------------------------------------------- <br />';

echo json_encode(array(
            array('rashid.akram@putitout.co.uk' , '0'),
            array('ahsanalikhan1@putitout.co.uk' , '1'),
            array('ahsanalikhan2@putitout.co.uk' , '0'), 
           )
        );
    $integers = array('133',-133,10,10.5,600);
    $dates = array( '20145-05-06', '2014-05-06', 20145-05-06, '20145-15-06', '20145-12-30' );
    foreach($integers as $integer){
       // if( isset($integer) && ( !is_float($integer) || $integer <= 0 || $integer >= 500) ){
        if( isset($integer) && ( ($integer - 0 != $integer) || $integer <= 0 || $integer >= 500) ){ 
            echo $integer.' is not integer <br />';
        } 
        else{
            echo $integer.' is integer <br />';
        }
    } 
    echo '<h1>Dates </h1>';
    foreach($dates as $date){
        
        $newDate = date('Y-m-d',  strtotime($date));
        if($newDate == $date){
            echo $newDate.' is valid date <br />';
        }
        else{
            echo $newDate.' is not valid date <br />';
        }
    }
    echo '<br /> <h1> Array Differences </h1>';
    $array1 = array(1,2,3); // user children
    $array2 = array(1,2);   // saved children
    $array3 = array(2); // new children
    $array4 = array(1,2,3); // new children 1
    
    echo '<pre>';
    print_r(array_diff($array2, $array4));
