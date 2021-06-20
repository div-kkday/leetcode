<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    public function reverse($x)
    {
        $numAry = str_split($x);
        $signedNumber = 1;

        if ($numAry[0] === '-') {
            array_shift($numAry);
            $signedNumber = -1;
        }

        $total = 0;

        foreach ($numAry as $key => $value) {
            $total += $value * pow(10, $key);
        }

        if (
            $total >= pow(2, 31)
            || $total < -pow(2, 31)
        ) {
            return 0;
        }

        return $signedNumber * $total;
    }
}

echo (new Solution())->reverse(-123);
