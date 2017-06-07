#!/usr/bin/env php

<?php
function baseXdecode($str, $alphabet)
{
	$base = strlen($alphabet);
	$length = strlen($str) - 1;
	$count = 0;

	for($i = 0; $i <= $length; $i++)
	{
		$count = $count + strpos($alphabet, $str[$i]) * pow($base, $length - $i);
	}

	return $count;
}

function baseXencode($id, $alphabet)
{
	$base = strlen($alphabet);
	$str = '';

	if($id == 0)
	{
		return $alphabet[0];
	}

	while($id > 0)
	{
		$str = $str . $alphabet[$id % $base];
		$id = floor($id / $base);
	}

	return strrev($str);
}

$alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//$alphabet .= '`~!@#$%^&*()-_=+[{]}\|;:\'",<.>/?';
//$alphabet = '0123456789><+-=/*^%{}[];:\'".?\\';
//$alphabet = '\\?."\':;][}{%^*/=-+<>9876543210';
//$alphabet = str_shuffle($alphabet);

for($i = 0; $i < 5000; $i++)
{
	$encoded = baseXencode($i, $alphabet);
	echo "$i = ".$encoded." = ".baseXdecode($encoded, $alphabet)."\n";
}
