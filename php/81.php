<?php

use tomzx\ProjectEuler\Solver\MatrixPath;

require_once 'vendor/autoload.php';

function q81()
{
	$matrix = file_get_contents('81.txt');
	$matrix = array_filter(preg_split('/\r\n|\r|\n/', $matrix));
	$matrix = array_map(function ($line) {
		return array_map('intval', explode(',', $line));
	}, $matrix);

	return MatrixPath::solve($matrix, 'min');
}

echo q81();
