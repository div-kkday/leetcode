<?php

class Solution
{
    public function fibo(int $n)
    {
        if ($n === 0) {
            return 0;
        }

        if ($n === 1) {
            return 1;
        }

        return self::fibo($n - 2) + self::fibo($n - 1);
    }
}

echo (new Solution())->fibo(6);
