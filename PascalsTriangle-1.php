<?php

class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if ($numRows === 1) {
            return [[1]];
        }

        if ($numRows === 2) {
            return [
                [1],
                [1, 1],
            ];
        }

        $result = [
            [1],
            [1, 1],
        ];

        for ($i = 2; $i < $numRows; $i++) {
            $previousNums = $result[$i - 1];
            $currentNums = [1];

            for ($j = 1; $j < count($previousNums); $j++) {
                $currentNums[] = $previousNums[$j - 1] + $previousNums[$j];

                if ($j === $i) {
                    $currentNums[] = $previousNums[$j] + 1;
                }
            }

            $currentNums[] = 1;

            $result[] = $currentNums;
        }

        return $result;
    }
}

var_dump((new Solution())->generate(5));exit;
