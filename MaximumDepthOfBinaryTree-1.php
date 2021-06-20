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

        if (isset($root->left)) {
            $this->currentDepth++;
            self::maxDepth($root->left);
        }

        if (isset($root->right)) {
            $this->currentDepth++;
            self::maxDepth($root->right);
        }

        $this->maxDepth = max($this->currentDepth, $this->maxDepth);
        $this->currentDepth--;

        return $this->maxDepth;
    }
}

var_dump((new Solution())->maxDepth([3,9,20,null,null,15,7]));exit;
