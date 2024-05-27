<?php

$number = 1225441;
$breakdown = output_number($number);

foreach ($breakdown as $value) {
	echo $value . PHP_EOL;
}