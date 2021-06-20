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
        $indicatorA = strlen($a) - 1;
        $indicatorB = strlen($b) - 1;
        $carry = 0;
        $resultStr = '';

        do {
            $current = $carry;

            if ($indicatorA >= 0) {
                $current += substr($a, $indicatorA, 1);
            }

            if ($indicatorB >= 0) {
                $current += substr($b, $indicatorB, 1);
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