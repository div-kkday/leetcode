<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        // 思路：找出陣列中的中值當 head，陣列中剩下的值拆至左右邊樹，重複遞迴處理

        // 遞迴終止條件：當陣列為空時，無法繼續往下串接子節點，回傳此節點為 null
        if (empty($nums)) {
            return null;
        }

        // 找出中間值陣列 index
        $pivotIndex = (int)(count($nums) / 2);

        // new 一節點並設定為陣列中間值
        $head = new TreeNode($nums[$pivotIndex]);

        // 若陣列只有一個元素，亦無法再向下串接節點，直接回傳此節點
        if (count($nums) === 1) {
            return $head;
        }

        // 遞迴處理左樹
        $head->left = self::sortedArrayToBST(array_slice($nums, 0, $pivotIndex));

        // 遞迴處理右樹
        $head->right = self::sortedArrayToBST(array_slice($nums, $pivotIndex + 1));

        return $head;
    }
}
