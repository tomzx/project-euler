<?php

use tomzx\ProjectEuler\Math;

require_once 'vendor/autoload.php';

// One can calculate the exact lexicographical permutation given an index and the alphabet
// For instance, in this problem, we are given the alphabet 0 1 2 3 4 5 6 7 8 9
// we know there are 10! = 3628800 possible permutations
// We know that if we start with 0........., then there is 9! = 362880 values to fill.
// Or in other words, the lexicographic permutations with 0 as the first number are from
// 1 to 362880. We can rapidly conclude that the millionth lexicographical permutation
// must start with 2, being in the range of 725760..1088640
// To the avid programmer, this will rapidly start to look like a binary search
// but with X branches instead of 2

/**
 * @param array $lexemes ordered from smallest to biggest
 * @param int   $permutationIndex
 */
function q24(array $lexemes, $permutationIndex)
{
	$lexemesCount = count($lexemes);
	$size = Math::factorial($lexemesCount);

	if ($permutationIndex > $size) {
		throw new LogicException('Index is superior to the size of the generatable permutations.');
	}

	$output = '';
	while ($lexemesCount !== 0) {
		$x = Math::factorial($lexemesCount - 1);
		foreach ($lexemes as $index => $lexeme) {
			if ($permutationIndex <= $x) {
				$output .= $lexemes[$index];
				unset($lexemes[$index]);
				break;
			}
			$permutationIndex -= $x;
		}
		--$lexemesCount;
	}
	echo $output;
}

echo q24([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], 1000000);
