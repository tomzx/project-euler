<?php

use tomzx\ProjectEuler\Solver\TrianglePath;

require_once 'vendor/autoload.php';

function q67()
{
	$triangle = file_get_contents('67.txt');
	$triangle = array_filter(preg_split('/\r\n|\r|\n/', $triangle));
	$triangle = array_map(function ($line) {
		return explode(' ', $line);
	}, $triangle);
	return TrianglePath::solve($triangle);
}

echo q67();
