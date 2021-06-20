<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $nums1Indices = 0;
        $nums2Indices = 0;

        // 把遇開好的陣列位址之值換為 null，避免用 0 判斷邏輯
        for ($i = $m; $i < $m + $n; $i++) {
            $nums1[$i] = null;
        }

        // 開始把 $nums2 的值依序往 $nums1 塞
        while ($nums2Indices < $n) {
            // 找出 $nums2[$nums2Indices] 在 $nums1 中要塞的目的 index
            while (!is_null($nums1[$nums1Indices]) && $nums1[$nums1Indices] <= $nums2[$nums2Indices]) {
                $nums1Indices++;
            }

            // 將 $nums2[$nums2Indices] 塞入 $nums1，並處理陣列位移
            $tempIndices = $nums1Indices;
            $temp1 = $nums2[$nums2Indices];
            $temp2 = null;
            while (!is_null($temp1) && $tempIndices < $m + $n) {
                $temp2 = $nums1[$tempIndices]; // 先將第一位移出至 temp2 暫存
                $nums1[$tempIndices] = $temp1; // 將 temp1 值放入第一位

                // 若沒有下一位則結束
                if ($tempIndices + 1 >= $m + $n) {
                    break;
                }

                $temp1 = $temp2; // 將先前暫存於 temp2 之第一位值存至 temp1
                $tempIndices++;
            }

            $nums2Indices++;
        }

        return $nums1;
    }
}

//$nums = [1, 2, 3, 0, 0, 0];
//var_dump((new Solution())->merge($nums, 3, [2, 5, 6], 3));exit;

$nums = [1,2,4,5,6,0];
var_dump((new Solution())->merge($nums, 5, [3], 1));exit;
