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
    private $currSum = 0;

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum) {
        // 空節點 return
        if (is_null($root)) {
            return false;
        }

        // 計算沿途至當前節點之值總和
        $this->currSum += $root->val;

        // 若無子節點則為葉節點
        if (is_null($root->left) && is_null($root->right)) {
            // 判定沿途路徑總和是否等於目標值
            if ($this->currSum === $targetSum) {
                return true;
            }

            // 返回上一層前將當前節點之值減回
            $this->currSum -= $root->val;

            return false;
        }

        // 持續往左節點探
        $answer = self::hasPathSum($root->left, $targetSum);

        // 當找葉節點與目標值相符，return true
        if ($answer === true) {
            return true;
        }

        // 持續往右節點探
        $answer = self::hasPathSum($root->right, $targetSum);

        // 當找葉節點與目標值相符，return true
        if ($answer === true) {
            return true;
        }

        // 左右節點皆探完，減去當前節點之值
        $this->currSum -= $root->val;

        // 返回上一層節點
        return false;
    }
}
