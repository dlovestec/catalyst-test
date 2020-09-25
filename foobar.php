<?php

	/*
		Author	: 	Dharmesh Chaudhary
		E-mail	: 	chaudharydharmesh32@gmail.com
		Purpose	:	Logic Test 
	*/

	for($counter = 1; $counter <= 100; $counter++) {
		switch($counter) {
            case ($counter%3 == 0 && $counter%5 == 0):
            echo "foobar<br/>";
            break;
            case ($counter%3 == 0):
            echo "foo<br/>";
            break;
            case ($counter%5 ==0):
            echo "bar<br/>";
            break;
            default:
            echo $counter."<br/>";
            break;
        }
	}
?>