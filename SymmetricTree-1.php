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
    function isSymmetric($root) {
        // 左樹 pre order 往下比對，右數 post order 往下比對
        return self::isNodeSameValue($root->left, $root->right);
    }

    function isNodeSameValue($leftTreeNode, $rightTreeNode) {
        // 比對左右樹節點值，若不同則 retun false
        if ($leftTreeNode->val !== $rightTreeNode->val) {
            return false;
        }

        // 當前節點為空代表到達底部，目前為止都比對一致，return true 返回上一層
        if (is_null($leftTreeNode->val) && is_null($rightTreeNode->val)) {
            return true;
        }

        // 左樹先往左節點探，右樹往右節點探，直至底部
        if (self::isNodeSameValue($leftTreeNode->left, $rightTreeNode->right) === false) {
            return false;
        }

        // 左樹左節點探完後開始往右節點探，右樹右節點探完後開始往左節點探，直至底部
        if (self::isNodeSameValue($leftTreeNode->right, $rightTreeNode->left) === false) {
            return false;
        }

        // 比對至最後都沒有不同，return true
        return true;
    }
}
