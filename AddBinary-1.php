<?php

class Solution
{

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b)
    {
        $aryA = str_split($a);
        $aryB = str_split($b);
        $indicatorA = count($aryA) - 1;
        $indicatorB = count($aryB) - 1;
        $carry = 0;
        $resultStr = '';

        do {
            $current = $carry;

            if ($indicatorA >= 0) {
                $current += $aryA[$indicatorA];
            }

            if ($indicatorB >= 0) {
                $current += $aryB[$indicatorB];
            }

            if ($current - 2 >= 0) {
                $current -= 2;
                $carry = 1;
                $resultStr = "{$current}{$resultStr}";
                $indicatorA--;
                $indicatorB--;
                continue;
            }

            $resultStr = "{$current}{$resultStr}";
            $carry = 0;
            $indicatorA--;
            $indicatorB--;
        } while ($indicatorA >= 0 || $indicatorB >= 0);

        if ($carry > 0) {
            $resultStr = "1{$resultStr}";
        }

        return $resultStr;
    }
}

var_dump((new Solution())->addBinary('11010', '1011'));
exit;

// 11010
//  1011
// ===========
//100101

//  1011
// 11010