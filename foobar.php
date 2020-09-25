<?php

	/*
		Author	: 	Dharmesh Chaudhary
		E-mail	: 	chaudharydharmesh32@gmail.com
		Purpose	:	Logic Test
		Output	:	1, 2, foo, 4, bar, foo, 7, 8, foo, bar, 11, foo, 13, 14, foobar …
	*/

	/* for loop method */
	
	for($counter = 1; $counter <= 100; $counter++) {
		switch($counter) {
			case ($counter%3 == 0 && $counter%5 == 0):
				echo "foobar,";
				break;
			case ($counter%3 == 0):
				echo "foo,";
				break;
			case ($counter%5 ==0):
				echo "bar,";
				break;
			default:
				echo $counter.",";
				break;
		}
	}
	
	/* for loop method */
?>