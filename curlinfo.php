<?php
// Create a curl handle
$url = 'http://dilemma-select.lotiv.com/candidate/displaysurvey/2160695';
$handle = curl_init($url);
curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);

/* Get the HTML or whatever is linked in $url. */
$response = curl_exec($handle);

/* Check for 404 (file not found). */
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
echo $httpCode.'<br />';
if($httpCode == 404) {
    /* Handle 404 here. */
	echo '404 found';
}
else {
	echo '404 not found';
}

curl_close($handle);
?>