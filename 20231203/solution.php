<?php

$dataInput = __DIR__ . '/Data/data.txt';

$fh = fopen($dataInput,'r');

$lineIdx = $cIdx = 0;
$matrix = [];
$symbolLocs = [];

while (false !== $char = fgetc($fh)) {	
	$matrix[$lineIdx][] = $char;
	// echo "${char}";
	if($char == "\n"){
		$lineIdx++;
		$cIdx=0;
		continue;
	} else if($char != '.' && !is_numeric($char)) {
		$symbolLocs[] = [$lineIdx, $cIdx];
	}
	$cIdx++;
}

// print_r($symbolLocs);

foreach ($symbolLocs as $loc) {
	// print_r($loc);
	if (is_numeric($matrix[$loc[0]-1][$loc[1]-1])) {
		$toCheck[] = [$loc[0]-1,$loc[1]-1];
	}
	if (is_numeric($matrix[$loc[0]-1][$loc[1]])) {
		$toCheck[] = [$loc[0]-1,$loc[1]];
	}
	if (is_numeric($matrix[$loc[0]-1][$loc[1]+1])) {
		$toCheck[] = [$loc[0]-1,$loc[1]+1];
	}
	if (is_numeric($matrix[$loc[0]][$loc[1]-1])) {
		$toCheck[] = [$loc[0],$loc[1]-1];
	}
	if (is_numeric($matrix[$loc[0]][$loc[1]+1])) {
		$toCheck[] = [$loc[0],$loc[1]+1];
	}
	if (is_numeric($matrix[$loc[0]+1][$loc[1]-1])) {
		$toCheck[] = [$loc[0]+1,$loc[1]-1];
	}
	if (is_numeric($matrix[$loc[0]+1][$loc[1]])) {
		$toCheck[] = [$loc[0]+1,$loc[1]];
	}
	if (is_numeric($matrix[$loc[0]+1][$loc[1]+1])) {
		$toCheck[] = [$loc[0]+1,$loc[1]+1];
	}

	// print_r($toCheck);
}
print_r($toCheck);
fclose($fh);


foreach ($toCheck as $value) {
	$row = $value[0];
	$col = $value[1];
	$place = $matrix[$row][$col];

	$valz[$row]=[];

	// echo "START: ROW: ${row}. COL: ${col}\n";
	while(is_numeric($place)){
		// array_push($valz[$row],$place);
		$valz[$row][$col] = $place;
		$place = $matrix[$row][++$col];
	}

	$col = $value[1]-1;
	$place = $matrix[$row][$col];
	while(is_numeric($place)){
		array_unshift($valz[$row],$place);
		// $valz[$row][$col] = $place;
		$place = $matrix[$row][--$col];
	}
	$fin[$row][$col+1] = implode($valz[$row]);
}
print_r($fin);

$sum = 0;
foreach ($fin as $f) {
	foreach ($f as $fVal) {
		$sum += $fVal;
	}
}
echo "Sum: ${sum}\n";