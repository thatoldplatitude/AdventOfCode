<?php

/**
 * Get input of file. Each line has a number, surrounded with useless data.
 * Parse out the first & last digit of the line. Combined that will be the original value that should've been.
 *  n.b.: seems liek if there is only one digit on the line, then it is not a single digit, but a two digit number
 * with only one unique value.
 * 
 * for all digits gathered, sum.
 */


 // Lets get this file
$fh = fopen("ourDataInput.txt",'r');

 // read line by line
while ($line = fgets($fh)) {
	/** 
	 * We have the line. now loop over the str.
	 * Check if the char at current index is a number,
	 * then save it in an arr maybe? idk yet. sure.
	 * */
	$lineLength = strlen($line);
	for ($i=0; $i < $lineLength; $i++) { 
		if(is_numeric($line[$i])){
			// Save in an array maybe. at least for now.
		}
	}
	/**
	 * When we've got the numbers from our line. We'll need
	 * to grab the 1st and last to then make a 2digit value.
	 */
}

//Don't forget to close.
fclose($fh);