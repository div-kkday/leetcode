<?php

class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    public function reverse($x)
    {
        if ($x === 0) {
            return $x;
        }

        $signedNumber = 1;

        if ($x < 0) {
            $x = -1 * $x;
            $signedNumber = -1;
        }

        while ($x >= 1) {
            $remain = $x % 10;
            $total = ($total * 10) + $remain;
            $x = $x / 10;
        }

        return $total > 2147483648 ? 0 : $signedNumber * $total;
    }
}

echo (new Solution())->reverse(123);
