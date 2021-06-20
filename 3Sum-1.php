<?php


class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        if (count($nums) < 3) {
            return [];
        }

        sort($nums);

        $left = 0;
        $result = [];

        while ($left < count($nums) - 2) {
            $mid = $left + 1;
            $right = count($nums) - 1;

            while ($mid < $right) {
                $leftNum = $nums[$left];
                $midNum = $nums[$mid];
                $rightNum = $nums[$right];

                $sum = $leftNum + $midNum + $rightNum;
                $ans = [$leftNum, $midNum, $rightNum];

                if ($sum === 0) {
                    if (!in_array($ans, $result)) {
                        $result[] = $ans;
                    }

                    $right--;
                    $mid++;
                    continue;
                }

                // sum 大於 0，要變小
                if ($sum > 0) {
                    $right--;
                    continue;
                }

                // sum 低於 0，要變大
                if ($sum < 0) {
                    $mid++;
                    continue;
                }
            }

            $left++;
        }

        return $result;
    }
}

var_dump((new Solution())->threeSum([-1, 0, 1, 2, -1, -4]));
