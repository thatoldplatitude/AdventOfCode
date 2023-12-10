<?php
const COLON = ':';
$dataInput = __DIR__ . '/Data/data.txt';
$fh = fopen($dataInput, 'r');

$timeLine = fgets($fh);
$distanceLine = fgets($fh);
fclose($fh);
$timeLine = trim(substr($timeLine,strpos($timeLine,COLON) + 1));
$distanceLine = trim(substr($distanceLine,strpos($distanceLine,COLON) + 1));
echo $timeLine.PHP_EOL.$distanceLine;

$times = preg_split('/\s+/',$timeLine);
$distances = preg_split('/\s+/',$distanceLine);

$races = count($times);
$product =1;
for ($i=0; $i < $races; $i++) { 
	$time = $times[$i];
	$distance = $distances[$i];
	$mid = intdiv($time,2);

	$valz=[];
	for ($x=$mid; $x > 0; $x--) { 
		$r = $time - $x;
		$val = $r*$x;
		if($val <= $distance) break;
		$valz[$x] = $val;
		$valz[$r] = $val;
	}
	$product *= count($valz);
	print_r($valz);
}
echo "Product: ${product}\n";