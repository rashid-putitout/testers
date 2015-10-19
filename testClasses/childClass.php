<?php

require_once('parentClass.php');

class childClass extends parentClass{
    
    public function displayValues(){
        //echo '<br /> My first static Value'.$this->myValue;
        echo '<br /> My first dynamic Value: '.$this->getValue();
        echo '<br /> My first dynamic Value: '.$this->getValue();
        echo '<br /> My first dynamic Value: '.$this->getValue();
        
        echo '<br /> My second dynamic Value'.$this->getSecondValue();
        echo '<br /> My second dynamic Value'.$this->getSecondValue();
        echo '<br /> My second dynamic Value'.$this->getSecondValue();
    }
}




$myObj = new childClass();
$myObj->displayValues();

echo '<br /><br />===============================<br /><br />';
$myObj1 = new childClass();
$myObj1->displayValues();



echo '<br /><br />===============================<br /><br />';
$myObj2 = new childClass();
$myObj2->displayValues();