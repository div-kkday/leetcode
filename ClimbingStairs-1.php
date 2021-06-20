<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        $prePre = 0;
        $pre = 1;
        $cur = 0;
        $i = 0;

        while ($i < $n) {
            $cur = $prePre + $pre;
            $prePre = $pre;
            $pre = $cur;

            $i++;
        }

        return $cur;
    }
}

echo (new Solution())->climbStairs(6);
