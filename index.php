<?php

$numbers = array(22,33,-13,44,56);

 function min1($arr)
{
	$temp=$arr[0];
	for ($i=0; $i <count($arr) ; $i++) { 
		if ($temp > $arr[$i]) {
			$temp = $arr[$i];
		}
	}
return $temp;
}

function maximum($arr)
{
	$max=$arr[0];
	for ($i=0; $i <count($arr) ; $i++) { 
		if ($max < $arr[$i]) {
			$max = $arr[$i];
		}
	}
return $max;
}

function average($arr)
{
	$avg=0;
	for ($i=0; $i <count($arr) ; $i++) { 
		$avg+=$arr[$i];
	}
return $avg;
}

$stringArr = array('22','3dsd3','1dsad3','sdada','56');


function removeSame($arr){
	array_flip($arr);
	return $arr;
}
$flip = array_flip($stringArr);
//$minimum = min1($numbers);
//echo('minimum of array is'.$minimum);
//echo(' maximum of array is'.maximum($numbers));
//echo(' average of array is'.average($numbers));
//print_r($flip);
//echo(removeSame($numbers));

$str = "hello world      \n";

$trimmed = trim($str);
//var_dump($trimmed);
$strArr = explode(' ', $trimmed);
//print_r($strArr);

$replaceStr = str_replace('world', 'mitko', $trimmed);
//echo $replaceStr;
$searchStr = stripos($trimmed, 'world');
echo $searchStr;

?>

