<?php
require_once __DIR__ . '/Utils/TrieUtil.class.php';

$dataInput = __DIR__ . '/Data/data.txt';
const BASE = 10;

/**
 * String:Int map of nubmers.
 * Flags to trigger a search--if the current index
 * holds a value j,x,z,y etc... no need to even try to search.
 */
$digitStrs = [
	"one"	=>	1,
	"two"	=>	2,
	"three"	=>	3,
	"four"	=>	4,
	"five"	=>	5,
	"six"	=>	6,
	"seven"	=>	7,
	"eight"	=>	8,
	"nine"	=>	9
];
$flags = ['o','t','f','s','e','n'];

$Trie = new Trie();

foreach ($digitStrs as $key => $value) {
	$Trie->insert($key);
}

/**
 * Get input of file. Each line has a number, surrounded with useless data.
 * Parse out the first & last digit of the line. Combined that will be the original value that should've been.
 *  n.b.: seems liek if there is only one digit on the line, then it is not a single digit, but a two digit number
 * with only one unique value.
 * 
 * for all digits gathered, sum.
 */


/** 
 * Lets get this file.
 * & whatever else we needa ttrack.
 */
$fh = fopen($dataInput,'r');
$sum=0;
 // read line by line
while ($line = fgets($fh)) {
	/** 
	 * We have the line. now loop over the str.
	 * Check if the char at current index is a number,
	 * then save it in an arr maybe? idk yet. sure.
	 * */
	$lineLength = strlen($line);
	$individualDigits = [];
	for ($i=0; $i < $lineLength; $i++) { 
		if(is_numeric($line[$i])){
			// Save in an array maybe. at least for now.
			$individualDigits[] = $line[$i];
		}
	}
	/**
	 * When we've got the numbers from our line. We'll need
	 * to grab the 1st and last to then make a 2digit value.
	 */
	$first = $individualDigits[0];
	$last = $individualDigits[sizeof($individualDigits) -1];

	$lineValue = ($first * BASE) + $last;
	$sum += $lineValue;
}
//Don't forget to close.
echo $sum.PHP_EOL;
fclose($fh);