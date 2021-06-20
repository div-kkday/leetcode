<?php

class Solution
{
    /**
     * @param Integer $x
     * @return Boolean
     */
    public function isPalindrome($x)
    {
        if ($x >= 0 && $x < 10) {
            return true;
        }

        if ($x < 0 || $x % 10 === 0) {
            return false;
        }

        $revertedNumber = 0;
        while ($x > $revertedNumber) {
            $revertedNumber = $revertedNumber * 10 + $x % 10;
            $x /= 10;

            if ((int)$x === $revertedNumber) {
                break;
            }
        }

        return (int)$x === $revertedNumber || (int)$x === (int)($revertedNumber / 10);
    }
}

echo (int)(new Solution())->isPalindrome(121);
