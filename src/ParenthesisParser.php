<?php


class ParenthesisParser
{
    private $string;
    
    public function __construct($string){
        if(! $string){
            throw new Exception('Cannot parse empty string.');
        }
        if(! is_string($string)){
            throw new Exception('Not a string.');
        }
        $this->string = $string;
    }
    
    public function areClosedCorrectly()
    {
        
        $stack = array();
        $stringArray = $this->toArray();
        
        foreach($stringArray as $character){
            if($character == '('){
                array_push($stack, $character);
            }
            if($character == ')'){
				if(empty($stack)) return false;
                array_pop($stack);
            }
            
            
        }
        
		return (empty($stack)) ? true : false;
        
        
    }
    
    public function toArray(){
        return str_split($this->string);
    }
    
}