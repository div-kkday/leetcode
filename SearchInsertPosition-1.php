<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] >= $target) {
                return $i;
            }

            if ($i === count($nums) - 1) {
                return count($nums);
            }

            if ($nums[$i] < $target) {
                continue;
            }
        }
    }
}

var_dump((new Solution())->searchInsert([1, 3, 5, 6], 10));
exit;
