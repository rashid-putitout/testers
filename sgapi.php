<?php
/**
* This script is a example of how to do a basic curl call to the SurveyGizmo Restful API to retrieve
* responses for a given survey and display results.
* More documentation on the Restful API can be found at http://developer.surveygizmo.com/
* @author Seth McClaine, SurveyGizmo Web Developer
* 9/20/2011
**/

//Required Fields
$user = 'testeratputitout@gmail.com'; //Email address used to log in
$pass = '123!@#abc'; //Passord used to log in
$survey = '2153581';//Survey to pull from
$status = '';
$datesubmmitted = '';
//Options Filter examples, uncomment to see theese in use
#$status = "&filter[field][1]=status&filter[operator][1]==&filter[value][1]=Complete";//Only show complete responses
#$datesubmmitted = "&filter[field][0]=datesubmitted&filter[operator][0]=>=&filter[value][0]=2011-02-23+13:23:28";//Submit date greater than 2/23/2011 at 1:23:28 PM

//Restful API Call URL
$url ="https://restapi.surveygizmo.com/v4/survey/{$survey}/surveyresponse?user:pass={$user}:{$pass}{$status}{$datesubmmitted}";
echo $url;

//Curl call
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

//The standard return from the API is JSON, decode to php. (It is also possible to request a PSON, PHP object, back. See documentation for more details)
$output= json_decode($output);

//If there are no responses, display an error (Either if the filter is to strong or the given survey does not have responses)
if($output->total_count<1)
{
        die('<h3>No responses found</h3>');
}

//Run through responses
foreach($output->data as $response)
{
        $count++;
        unset($row);
        foreach($response as $key => $value)
        {
                if($count == 1)
                {
                        $header .= "<th>{$key}</th>";
                }
                $row .= "<td>{$value}</td>";
        }
        $trows[] = "<tr>{$row}</tr>";
}

//Display results in a table
echo "<table border='1'>";
echo "<tr>{$header}</tr>";
echo join($trows);
echo "</table>";
?>