<?php

class Solution
{
    /**
     * @param Integer $x
     * @return Boolean
     */
    public function isPalindrome($x)
    {
        if ($x < 0) {
            return false;
        }

        if ($x >= 0 && $x < 10) {
            return true;
        }

        $numAry = str_split($x);

        while (count($numAry) > 1) {
            $head = array_shift($numAry);
            $tail = array_pop($numAry);

            if ($head !== $tail) {
                return false;
            }
        }

        return true;
    }
}

echo (int)(new Solution())->isPalindrome(121);
