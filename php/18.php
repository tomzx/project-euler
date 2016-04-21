<?php

use tomzx\ProjectEuler\Solver\TrianglePath;

require_once 'vendor/autoload.php';

function q18()
{
	$triangle = file_get_contents('18.txt');
	$triangle = array_filter(preg_split('/\r\n|\r|\n/', $triangle));
	$triangle = array_map(function ($line) {
		return explode(' ', $line);
	}, $triangle);

	return TrianglePath::solve($triangle);
}

echo q18();
