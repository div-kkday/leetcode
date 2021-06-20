<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums) {
        $result = [];

        for ($i = 0; $i < count($nums); $i++) {
            if ($i === 0) {
                $result[] = $nums[$i];
                continue;
            }

            $result[] = end($result) + $nums[$i];
        }

        return $result;
    }
}

var_dump((new Solution())->runningSum([1,2,3,4]));exit;
