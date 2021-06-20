<?php


class BubbleSort
{
    public function sort(array $nums): array
    {
        for ($i = 0; $i < count($nums); $i++) {
            $completedFlag = true;

            // 最後一位數位置已固定，所以下一輪的終點是 count($nums) - $i - 1，多減一是因為最後一位數沒對象可以換
            for ($j = 0; $j < count($nums) - $i - 1; $j++) {
                if ($nums[$j] <= $nums[$j + 1]) {
                    continue;
                }

                $tmp = $nums[$j + 1];
                $nums[$j + 1] = $nums[$j];
                $nums[$j] = $tmp;
                $completedFlag = false;
            }

            // 若換完一輪後 $completedFlag 還是 true，則代表全部排序完畢
            if ($completedFlag === true) {
                break;
            }
        }

        return $nums;
    }
}

var_dump((new BubbleSort())->sort([9, 4, 8, 7, 9, 4, 5]));
