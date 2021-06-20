<?php

// 其實就是撲克牌在按照手牌排順序的情境
class InsertionSort
{
    public function sort(array $nums): array
    {
        for ($i = 1; $i < count($nums); $i++) {
            $current = $nums[$i];
            $j = $i - 1;

            // 一路往左邊找（index 一路減一），直到發現比自己小的數就中斷
            while ($j >= 0 && $current < $nums[$j]) {
                $nums[$j + 1] = $nums[$j]; // 往下找的過程中，將路上的數字往右推
                $j--;
            }

            // 當找到 index 位置為 -1 或第一個比 $current 小的數，插在他們前面一個位置，aka $j + 1
            $nums[$j + 1] = $current;
        }

        return $nums;
    }
}

var_dump((new InsertionSort())->sort([9, 4, 8, 7, 9, 4, 5]));
