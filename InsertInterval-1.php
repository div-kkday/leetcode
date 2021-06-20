<?php


class Solution
{

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval)
    {
        $greedyFlagLeft = false;
        $greedyFlagRight = false;
        $eatIndexLeft = null;
        $eatIndexRight = null;

        for ($i = 0; $i < count($intervals); $i++) {
            // $newInterval 左邊若小於等於 $intervals[$i] 右邊，則找出左邊界可能區間
            if ($newInterval[0] <= $intervals[$i][1] && $greedyFlagLeft === false) {
                $greedyFlagLeft = true;
                $eatIndexLeft = $i;
            }

            // 找出左邊界可能區間後開始找右邊
            // $newInterval 右邊若大於等於 $intervals[$i + 1] 左邊，則繼續往右找
            if (
                $greedyFlagLeft === true
                && isset($intervals[$i + 1])
                && $intervals[$i + 1][0] <= $newInterval[1]) {
                $eatIndexRight = $i;
                continue;
            }

            // 當 $newInterval 未大於等於 $intervals[$i + 1] 左邊，但大於等於當前區間左邊
            if ($greedyFlagLeft === true && $intervals[$i][0] <= $newInterval[1]) {
                $greedyFlagRight = true;
                $eatIndexRight = $i;
            }

//            if (
//                $greedyFlagLeft === true
//                && $newInterval[1] < $intervals[$i][0]) {
//                $eatIndexRight = $i - 1;
//                break;
//            }
//
//            if (
//                $greedyFlagLeft === true
//                && $i === count($intervals) - 1
//            ) {
//                $eatIndexRight = $i;
//            }

            if ($greedyFlagLeft && $greedyFlagRight) {
                break;
            }
        }

        var_dump($eatIndexLeft, $eatIndexRight);exit;

        // 0, null => $newInterval 右值小於第一組數的左值（aka 最小數組）
        if ($eatIndexLeft === 0 && is_null($eatIndexRight)) {
            array_unshift($intervals, $newInterval);
            return $intervals;
        }

        // null, null => $newInterval 左值大於最後一組數的右值（aka 最大數組）
        if (is_null($eatIndexLeft) && is_null($eatIndexRight)) {
            array_push($intervals, $newInterval);
            return $intervals;
        }

        // x, null => 右邊為 null，表示介於 (x - 1) ~ x 數組區間（未穿過）
        if (is_null($eatIndexRight)) {
            array_push($intervals, $newInterval);
            sort($intervals);
            return $intervals;
        }

        // x, y => 表示穿過某兩數組間
        $sectionMinNum = min($intervals[$eatIndexLeft][0], $newInterval[0]);;
        $sectionMaxNum = max($intervals[$eatIndexRight][1], $newInterval[1]);

        array_splice($intervals, $eatIndexLeft, $eatIndexRight - $eatIndexLeft + 1);
        array_push($intervals, [$sectionMinNum, $sectionMaxNum]);
        sort($intervals);

        return $intervals;
    }
}

//var_dump((new Solution())->insert([[1,5]], [0, 0]));exit;
var_dump((new Solution())->insert([[3,5], [6,9], [12, 15]], [10, 11]));exit;

// 0, null => $newInterval 右值小於第一組數的左值（aka 最小數組）
// x, null => 右邊為 null，表示介於 (x - 1) ~ x 數組區間（未穿過）
// x, y => 表示有穿過一或多數組
// null, null => $newInterval 左值大於最後一組數的右值（aka 最大數組）
