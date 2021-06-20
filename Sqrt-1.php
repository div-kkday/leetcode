<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x)
    {
        $y = $x;

        while ($y * $y > $x) {
            $y = (int)($y / 2);
        }

        while ($y * $y < $x) {
            $y++;
        }

        if ($y * $y === $x) {
            return $y;
        }

        return $y - 1;
    }
}

echo (new Solution())->mySqrt(20);
