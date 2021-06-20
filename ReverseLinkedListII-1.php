<?php

//class ListNode
//{
//    public $val = 0;
//    public $next = null;
//
//    function __construct($val = 0, $next = null)
//    {
//        $this->val = $val;
//        $this->next = $next;
//    }
//}

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

class Solution
{
    /**
     * @param ListNode $head
     * @param Integer $left
     * @param Integer $right
     * @return ListNode
     */
    public function reverseBetween($head, $left, $right)
    {
        var_dump($head);exit;
    }
}

var_dump((new Solution())->reverseBetween([1, 2, 3, 4, 5], 2, 4));
