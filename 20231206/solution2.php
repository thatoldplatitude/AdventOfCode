<?php
const COLON = ':';
$dataInput = __DIR__ . '/Data/testData.txt';
$fh = fopen($dataInput, 'r');

$timeLine = fgets($fh);
$distanceLine = fgets($fh);
fclose($fh);
$timeLine = trim(substr($timeLine,strpos($timeLine,COLON) + 1));
$distanceLine = trim(substr($distanceLine,strpos($distanceLine,COLON) + 1));
echo $timeLine.PHP_EOL.$distanceLine;

$time = preg_replace('/\s+/','',$timeLine);
$distance = preg_replace('/\s+/','',$distanceLine);

echo "TIme: ${time}.\nDistance: ${distance}.\n";
$mid = intdiv($time,2);
$vcount=0;

for ($x=$mid; $x > 0; $x--) { 
	$r = $time - $x;
	$val = $r*$x;
	if($val <= $distance) break;
	$vcount += 2; // -1 from total count if distance is even.
}
// $count = count($valz);

echo "count: ${vcount}\n"; 