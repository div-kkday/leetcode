<?php


class MergeSort
{
    public function sort(array $nums): array
    {
        if (count($nums) === 1) {
            return $nums;
        }

        $mid = (int)(count($nums) / 2);
        $left = array_slice($nums, 0, $mid);
        $right = array_slice($nums, $mid);

        $left = self::sort($left);
        $right = self::sort($right);

        return self::merge($left, $right);
    }

    public function merge(array $left, array $right): array
    {
        $result = [];

        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] < $right[0]) {
                $result[] = $left[0];
                array_shift($left);
                continue;
            }

            $result[] = $right[0];
            array_shift($right);
        }

        if (count($left) > 0) {
            $result = array_merge($result, $left);
        }

        if (count($right) > 0) {
            $result = array_merge($result, $right);
        }

        return $result;
    }
}

var_dump((new MergeSort())->sort([9, 4, 8, 7, 9, 4, 5]));
