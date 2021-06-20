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
    private $currentDepth = 1;
    private $minDepth = null;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        if (is_null($root)) {
            return 0;
        }

        self::findLeaf($root);
        return $this->minDepth;
    }

    function findLeaf($root)
    {
        // 若已經紀錄過最小深度且當前深度大於等於最小深度，則不需繼續比較，直接 return
        if (!is_null($this->minDepth) && $this->currentDepth >= $this->minDepth) {
            $this->currentDepth--; // 回退上一層時高度減一
            return null;
        }

        // 若節點為 null 則 return
        if (is_null($root)) {
            $this->currentDepth--; // 回退上一層時高度減一
            return null;
        }

        // 若無左右節點，將當下深度與最小深度比較並記下最小深後 return
        if (is_null($root->left) && is_null($root->right)) {
            $this->minDepth = is_null($this->minDepth) ? $this->currentDepth : min($this->minDepth, $this->currentDepth);
            $this->currentDepth--;

            return null;
        }

        // 往左節點前進並 count 深度
        $this->currentDepth++;
        self::findLeaf($root->left);

        // 往右節點前進並 count 深度
        $this->currentDepth++;
        self::findLeaf($root->right);

        $this->currentDepth--; // 回退上一層時高度減一
    }
}
