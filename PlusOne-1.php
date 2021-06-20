<?php

class Solution
{

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits)
    {
        $digitsCount = count($digits);
        $indicator = $digitsCount - 1;

        do {
            $digits[$indicator]++;

            if ($digits[$indicator] !== 10) {
                return $digits;
            }

            $digits[$indicator] = 0;
            $indicator--;

            if ($indicator < 0) {
                array_unshift($digits, 1);
                return $digits;
            }
        } while (true);
    }
}

var_dump((new Solution())->plusOne([7, 2, 8, 5, 0, 9, 1, 2, 9, 5, 3, 6, 6, 7, 3, 2, 8, 4, 3, 7, 9, 5, 7, 7, 4, 7, 4, 9, 4, 7, 0, 1, 1, 1, 7, 4, 0, 0, 6]));
//var_dump((new Solution())->plusOne([9, 9]));
exit;
