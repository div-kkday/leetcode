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
        $map =[];

        foreach ($nums as $key => $value) {
            $map[$value] = $key;
        }

        for ($i = 0; $i < count($nums); $i++) {
            $complement = $target - $nums[$i];

            if (!array_key_exists($complement, $map) || $map[$complement] === $i) {
                continue;
            }

            return [$i, $map[$complement]];
        }
    }
}
