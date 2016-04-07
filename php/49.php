<?php

use tomzx\ProjectEuler\Generator\Prime;

require_once 'vendor/autoload.php';

// There are 1061 primes between 1000 and 9999, doing 1000 choose 3 is quite counter productive.
// What can be first done is to remove all the primes which cannot be permutation of other primes. This can be easily
// done by separating each digit and sorting them, which should result in similar numbers if there's more than 1. Then
// we can test only those groups with 3 or more numbers. Finally, for each of these groups, we'll test if the tree
// numbers are separated by the same distance.
function q49()
{
	$primes = Prime::between(1000, 9999);

	$groups = [];
	foreach ($primes as $prime) {
		$primeDigits = str_split($prime);
		sort($primeDigits);
		$primeIdentifier = implode('', $primeDigits);
		$groups[$primeIdentifier][] = $prime;
	}

	$groupsToTest = [];
	foreach ($groups as $group) {
		if (count($group) >= 3) {
			$groupsToTest[] = $group;
		}
	}

	foreach ($groupsToTest as $group) {
		$groupSize = count($group);
		for ($i = 0; $i < $groupSize; ++$i) {
			for ($j = $i + 1; $j < $groupSize; ++$j) {
				for ($k = $j + 1; $k < $groupSize; ++$k) {
					if ($group[$i] === 1487 && $group[$j] === 4817 && $group[$k] === 8147) {
						continue;
					}
					$distance1 = $group[$j] - $group[$i];
					$distance2 = $group[$k] - $group[$j];
					if ($distance1 === $distance2) {
						return $group[$i] . $group[$j] . $group[$k];
					}
				}
			}
		}
	}
}

echo q49();
