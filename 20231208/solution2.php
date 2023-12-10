<?php
$dataInput = __DIR__ . '/Data/data.txt';
const START = "A";
const END = "Z";

$fh = fopen($dataInput,'r');
$order = fgets($fh);
$orderLength = strlen(trim($order));

fgets($fh); // Eat newline

$map=[];
$startKs;
while (false !== ($line = fgets($fh))) {
	
	list($vname, $mvs) = explode(" = ",$line);
	$mvs = trim($mvs, "()\n");
	list($left, $right) = explode(", ",$mvs);
	echo "VName: ${vname}. MVS: L: ${left}. R: ${right}\n";

	$map[$vname] = [
		"L"	=> $left,
		"R"	=> $right,
		"isStart"	=> $vname[strlen($vname) -1] == START,
		"isEnd"	=> $vname[strlen($vname) -1] == END
	];
	if($vname[strlen($vname) -1] == START){
		$startKs[] = $vname;
	}

}
fclose($fh);
// print_r($startKs);return;
$counts=[];
foreach ($startKs as $key) {
	$i=$key;
	$count = 0;
	$io = $order[$count % $orderLength];

	while(($val = $map[$i][$io]) && !$map[$val]["isEnd"]) {
		$count++;
		$io = $order[$count % $orderLength];
		$i = $val;
		// echo "[I: ${i}. IO: ${io}.] => Val: ${val}.\n";
	}
	// $counts[$key] = $count + 1;
	$counts[] = $count + 1;
}

// echo gcd(current($counts), next($counts));

echo lcmm($counts);

function gcd($a, $b) {
	while($b) {
		$tmp=$b;
		$b = $a%$b;
		$a = $tmp;
		// echo "A: ${a}. B: ${b}\n";
	}
	return $a;
}

function lcm($a, $b) {
	return ($a * $b / gcd($a, $b));
}

function lcmm(array $args) {
	if(sizeof($args) == 2) {
		return lcm($args[0], $args[1]);
	}else {
		return lcm(array_pop($args),lcmm($args));
	}
}