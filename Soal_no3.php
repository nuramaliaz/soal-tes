<?php
/*Jawaban soal nomor 3*/
$email = "user@example.com";
$brekdown = explode("@", $email);

$result = $brekdown[1];

echo $result;
