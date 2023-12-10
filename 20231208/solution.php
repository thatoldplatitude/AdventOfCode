<?php
$dataInput = __DIR__ . '/Data/testData.txt';
const START = "AAA";
const END = "ZZZ";

$fh = fopen($dataInput,'r');
$order = fgets($fh);
$orderLength = strlen(trim($order));

fgets($fh); // Eat newline
echo "Order ${order}\n";
$map=[];
while (false !== ($line = fgets($fh))) {
	// echo $line.PHP_EOL;
	list($vname, $mvs) = explode(" = ",$line);
	$mvs = trim($mvs, "()\n");
	list($left, $right) = explode(", ",$mvs);
	echo "VName: ${vname}. MVS: L: ${left}. R: ${right}\n";

	$map[$vname] = [
		"L"	=> $left,
		"R"	=> $right
	];

}

$i=START;
$count = 0;
$io = $order[$count % $orderLength];

while(END != ($val = $map[$i][$io])) {
	$count++;
	$io = $order[$count % $orderLength];
	$i = $val;
	// echo "[I: ${i}. IO: ${io}.] => Val: ${val}.\n";
}

fclose($fh);

echo "Count: ${count}\n";