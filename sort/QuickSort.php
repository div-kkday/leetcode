<?php


class QuickSort
{
    public function sort_1(array $nums): array
    {
        $numsCount = count($nums);

        if ($numsCount < 2) {
            return $nums;
        }

        $pivot = [$nums[0]];
        $left = [];
        $right = [];

        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] <= $pivot[0]) {
                $left[] = $nums[$i];
                continue;
            }

            $right[] = $nums[$i];
        }

        return array_merge(self::sort($left), $pivot, self::sort($right));
    }

    public function sort_2(array $nums): array
    {

    }
}

var_dump((new QuickSort())->sort_2([9, 4, 8, 7, 9, 4, 5]));
