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
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        // 空樹，回傳 true
        if (is_null($root)) {
            return true;
        }

        return abs(self::height($root->left) - self::height($root->right)) < 2 // 以遞迴方式逐步確認每個階層的左右樹階差是否小於 2
            && self::isBalanced($root->left) // 以遞迴方式確認左樹每層之階差
            && self::isBalanced($root->right); // 以遞迴方式確認右樹每層之階差
    }

    function height($node) {
        // 當節點為空，回退計算前一層樹高時以 -1 抵銷
        if (is_null($node)) {
            return -1;
        }

        // 每個節點計算下高之方式為 1 + 左右樹取最高階層之樹高度
        return 1 + max(self::height($node->left), self::height($node->right));
    }
}
