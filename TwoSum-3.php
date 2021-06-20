<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target)
    {
        $endIndicator = null;

        for ($indicator = 0; $indicator < count($nums) - 1; $indicator++) {
            for ($i = $indicator + 1; $i < count($nums); $i++) {
                if ($nums[$indicator] + $nums[$i] !== $target) {
                    continue;
                }

                $endIndicator = $i;
                break;
            }

            if (is_null($endIndicator)) {
                continue;
            }

            return [$indicator, $endIndicator];
        }
    }
}
