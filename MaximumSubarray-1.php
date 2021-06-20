<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $currentSum = $nums[0];
        $result = $nums[0];

        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($nums[$i + 1])) {
                return $result;
            }

            $currentSum += $nums[$i + 1];

            if ($currentSum < $nums[$i + 1]) {
                $currentSum = $nums[$i + 1];
            }

            if ($currentSum > $result) {
                $result = $currentSum;
            }
        }

        return $result;
    }
}

var_dump((new Solution())->maxSubArray([-2,1,-3,4,-1,2,1,-5,4]));
exit;
