<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        if (empty($nums)) {
            return [-1, -1];
        }

        // 從中間開始找
        $leftIndices = 0;
        $rightIndices = count($nums) - 1;
        $midIndices = (int)floor(($rightIndices - $leftIndices) / 2);

        // 抓其中一個 target index
        while ($nums[$midIndices] !== $target) {
            // 三指標重疊代表找不到
            if (
                $leftIndices === $midIndices &&
                $midIndices === $rightIndices
            ) {
                return [-1, -1];
            }

            // 判斷中間數大小決定往左或右找
            if ($target < $nums[$midIndices]) {
                $rightIndices = max($midIndices - 1, $leftIndices);
                $midIndices = (int)floor(($leftIndices + $rightIndices) / 2);
                continue;
            }

            if ($target > $nums[$midIndices]) {
                $leftIndices = min($midIndices + 1, $rightIndices);
                $midIndices = (int)floor(($leftIndices + $rightIndices) / 2);
                continue;
            }
        }

        $leftIndices = $nums[$leftIndices] !== $target ? $midIndices : $leftIndices;
        $rightIndices = $nums[$rightIndices] !== $target ? $midIndices : $rightIndices;

        // 找到之後往左與右查看至最後一個相同的數，抓出 index
        while (
            isset($nums[$leftIndices - 1])
            && $nums[$leftIndices - 1] === $target
        ) {
            $leftIndices--;
        }

        while (
            isset($nums[$rightIndices + 1])
            && $nums[$rightIndices + 1] === $target
        ) {
            $rightIndices++;
        }

        return [$leftIndices, $rightIndices];
    }
}

var_dump((new Solution())->searchRange([5, 7, 7, 8, 8, 8, 8], 8));exit;
