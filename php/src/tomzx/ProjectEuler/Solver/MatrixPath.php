<?php

namespace tomzx\ProjectEuler\Solver;

class MatrixPath
{
	public static function solve(array $matrix, $function = 'max')
	{
		$scanRow = $matrix[0];
		$rowLength = count($scanRow);
		array_shift($matrix);

		// Initialize first row (left cell value + current cell value)
		for ($i = 1; $i < $rowLength; ++$i) {
			$scanRow[$i] = $scanRow[$i - 1] + $scanRow[$i];
		}

		foreach ($matrix as $row) {
			// Same row - Propagate last column value + current cell value
			for ($i = 0; $i < $rowLength; ++$i) {
				if ($i === 0) {
					// First column, sum value from the above cell and current cell value
					$scanRow[$i] = $scanRow[0] + $row[0];
				} else {
					// Determine whether the cell above + value or left cell + value is best
					$left = $scanRow[$i - 1] + $row[$i];
					$right = $scanRow[$i] + $row[$i];
					$scanRow[$i] = $function($left, $right);
				}
			}
		}
		return $scanRow[count($scanRow) - 1];
	}
}
