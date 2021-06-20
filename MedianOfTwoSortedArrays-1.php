<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $nums = array_merge($nums1, $nums2);
        sort($nums);
        $medianIndex = count($nums) / 2;

        if (count($nums) % 2 === 1) {
            return $nums[$medianIndex];
        }

        return ($nums[$medianIndex - 1] + $nums[$medianIndex]) / 2;
    }
}

var_dump((new Solution())->findMedianSortedArrays([1, 3], [2]));exit;
