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
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        $curr = $head;

        while (!is_null($curr) && !is_null($curr->next)) {
            if ($curr->val === $curr->next->val) {
                $curr->next = $curr->next->next;
                continue;
            }

            $curr = $curr->next;
        }

        return $head;
    }
}