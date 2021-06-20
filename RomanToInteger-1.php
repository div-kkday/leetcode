<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s)
    {
        $map = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];

        $strAry = str_split($s);
        $indicator = 0;
        $total = 0;

        while ($indicator < count($strAry)) {
            $a = $strAry[$indicator];

            if (!isset($strAry[$indicator + 1])) {
                $total += $map[$a];
                break;
            }

            $b = $strAry[$indicator + 1];

            if ($map[$a] < $map[$b] && in_array($a, ['I', 'X', 'C'])) {
                $total += $map[$b] - $map[$a];
                $indicator += 2;
                continue;
            }

            $total += $map[$a];
            $indicator += 1;
        }

        return $total;
    }
}

echo (new Solution())->romanToInt('MCMXCIV');
//echo (new Solution())->romanToInt('MC');
