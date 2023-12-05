<?php

$dataInput = __DIR__ . '/Data/testData.txt';

$fh = fopen($dataInput,'r');

$lineIdx = $cIdx = 0;
$matrix = [];
$symbolLocs = [];

while ($char = fgetc($fh)) {	
	$matrix[$lineIdx][] = $char;
	echo "${char}";
	if($char == "\n"){
		$lineIdx++;
		$cIdx=0;
		continue;
	} else if($char != '.' && !is_numeric($char)) {
		$symbolLocs[] = [$lineIdx, $cIdx];
	}
	$cIdx++;
}

fclose($fh);