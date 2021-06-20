<?php

/*
 * 時間複雜度：O(n^2)
 * 空間複雜度：O(1)
 */

class SelectionSort
{
    public function sort(array $nums): array
    {
        for ($i = 0; $i < count($nums); $i++) {
            $minIndex = $i;

            for ($j = $i + 1; $j < count($nums); $j++) {
                $minIndex = $nums[$j] < $nums[$minIndex] ? $j : $minIndex;
            }

            $tmp = $nums[$minIndex];
            $nums[$minIndex] = $nums[$i];
            $nums[$i] = $tmp;
        }

        return $nums;
    }
}

var_dump((new SelectionSort())->sort([9, 4, 8, 7, 9, 4, 5]));
