<?php

class parentClass{
    
    public static $myValue = 0;
    public $mySecondValue = 0;
    
    
    public static function getValue(){
        
        if(self::$myValue === 0){
            self::$myValue = rand(0, 1000);
        }
        return self::$myValue;
    }
    
    public function getSecondValue(){
        
        if($this->mySecondValue === 0){
            $this->mySecondValue = rand(0, 1000);
        }
        return $this->mySecondValue;
    }
    
    
    
}