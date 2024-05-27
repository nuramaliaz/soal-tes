<?php

/*Jawaban soal nomor 4*/
function output_number($number) {
	$output = [1000000,
		200000,
		20000,
		5000,
		400,
		40,
		1];
	$result = [];

	foreach ($output as $hasil_output) {
		while ($number >= $hasil_output) {
			$result[] = $hasil_output;
			$number -= $hasil_output;
		}
	}

	return $result;
}