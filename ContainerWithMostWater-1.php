<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $totalCount = count($height);
        $maxArea = 0;

        for ($i = 0; $i < $totalCount; $i++) {
            for ($j = $i + 1; $j < $totalCount; $j++) {
                $minHeight = min($height[$i], $height[$j]);
                $maxArea = max($maxArea, $minHeight * ($j - $i));
            }
        }

        return $maxArea;
    }
}

echo (new Solution())->maxArea([1,8,6,2,5,4,8,3,7]);
