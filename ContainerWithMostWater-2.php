<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $maxArea = 0;
        $leftIndices = 0;
        $rightIndices = count($height) - 1;

        while ($leftIndices < $rightIndices) {
            $length = $rightIndices - $leftIndices;

            if ($height[$leftIndices] <= $height[$rightIndices]) {
                $maxArea = max($maxArea, $height[$leftIndices] * $length);
                $leftIndices++;
                continue;
            }

            $maxArea = max($maxArea, $height[$rightIndices] * $length);
            $rightIndices--;
        }

        return $maxArea;
    }
}

echo (new Solution())->maxArea([1,8,6,2,5,4,8,3,7]);
