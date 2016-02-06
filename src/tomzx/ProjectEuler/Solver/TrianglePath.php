<?php

namespace tomzx\ProjectEuler\Solver;

class TrianglePath
{
	public static function solve($triangle, $function = 'max')
	{
		$scanRow = $triangle[0];
		array_shift($triangle);
		foreach ($triangle as $row) {
			$rowLength = count($row);
			$newScanRow = [];
			for ($i = 0; $i < $rowLength; ++$i) {
				if ($i === 0) {
					$newScanRow[$i] = $scanRow[0] + $row[0];
				} elseif ($i === $rowLength - 1) {
					$newScanRow[$i] = $scanRow[$i - 1] + $row[$i];
				} else {
					$left = $scanRow[$i - 1] + $row[$i];
					$right = $scanRow[$i] + $row[$i];
					$newScanRow[$i] = $function($left, $right);
				}
			}
			$scanRow = $newScanRow;
			// echo implode(' ', $scanRow).PHP_EOL;
		}
		return $function($scanRow);
	}
}
