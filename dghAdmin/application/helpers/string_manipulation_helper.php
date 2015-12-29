<?php

function concat_string($firststr, $secondStr){
	
	if(!is_null($secondStr) && !empty($secondStr) && $secondStr!=NULL){
		
		return trim($firststr.' '.$secondStr);
	}else{
		return trim($firststr);
	}
	
}


function returnCharFromPosition($source, $numberOfCharRequired){
	
	/*
	 * get the string lenght
	 * 
	 */
	$length = strlen($source);
	//echo $length;
	$position = $length-$numberOfCharRequired;
	//echo $position;
	
	return substr($source, $position, $numberOfCharRequired);
}

function getDataTime20MinEarlier(){
	
	//$currenttimestamp = date($format)
}


function makeFourDigitNumber($number){
	
	//echo $number;
	
	
	$strlength = strlen($number);
	//echo $strlength;
	
	if($strlength>=4){
		
		return $number;
	}	
	else if($strlength ==1 ){

		$number = '000'.$number;
		
		return $number;
	}else if($strlength ==2 ){

		$number = '00'.$number;
		
		return $number;
	}else if($strlength ==3 ){

		$number = '0'.$number;
		
		return $number;
	}
	
	
	
}



?>