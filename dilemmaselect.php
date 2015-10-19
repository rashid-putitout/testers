<style>
    iframe{
        width: 100%;
        min-height: 500px;
        border: none;
    }
</style>
<?php 

$surveyId = $_GET['sid'];
$surveyShortName = $_GET['sn'];


?>
<h1>Welcome to my Blog</h1>
<?php if(!empty($surveyId && $surveyShortName)){ ?>
    <iframe src="http://www.surveygizmo.com/s3/<?=$surveyId;?>/<?=$surveyShortName;?>"></iframe>
    
<?php }else { echo 'Invalid Link';} ?>   