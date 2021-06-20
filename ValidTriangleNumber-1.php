<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function triangleNumber($nums)
    {
        $nums = array_filter($nums, function ($nums) {
            return $nums > 0;
        });

        if (count($nums) < 3) {
            return 0;
        }

        $result = 0;

        sort($nums);

        for ($i = 0; $i < count($nums) - 2; $i++) {
            $k = $i + 2;
            for ($j = $i + 1; $j < count($nums) - 1; $j++) {
                while (
                    $k < count($nums)
                    && $nums[$i] + $nums[$j] > $nums[$k]
                ) {
                    $k++;
                }

                $result += $k - $j - 1;
            }
        }

        return $result;
    }
}

var_dump((new Solution())->triangleNumber([0,1,0,1]));exit;
var_dump((new Solution())->triangleNumber([2, 2, 3, 4]));exit;
var_dump((new Solution())->triangleNumber([1,1,3,4]));exit;
