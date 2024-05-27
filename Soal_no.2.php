<?php

/*Jawaban soal nomor 2*/
function pecahan_uang($amount) {
	$pecahan = [100000,
		50000,
		20000,
		5000,
		100,
		50];
	$result = [];

	foreach ($pecahan as $hasil_pecahan) {
		$hitung = intdiv($amount, $hasil_pecahan);
		$result[$hasil_pecahan] = $hitung;
		$amount -= $hitung * $hasil_pecahan;
	}

	return $result;
}

$amount = 1575250;
$pecahan = pecahan_uang($amount);

foreach ($pecahan as $hasil_pecahan => $hitung) {
	echo "Rp " . number_format($hasil_pecahan, 0, ',', '.') . " : " . $hitung . " lembar\n";
}