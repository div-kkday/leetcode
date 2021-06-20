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

    private $maxDepth = 1;
    private $currentDepth = 1;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if (!isset($root)) {
            return 0;
        }

        // 先一路往左看
        $leftHeight = self::maxDepth($root->left);

        // 再一路往右看
        $rightHeight = self::maxDepth($root->right);

        // 取左右樹較大高度者後 return 並 +1 計算樹的高度
        return max($leftHeight, $rightHeight) + 1;
    }
}

var_dump((new Solution())->maxDepth([3,9,20,null,null,15,7]));exit;
