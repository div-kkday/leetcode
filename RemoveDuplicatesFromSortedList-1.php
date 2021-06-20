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
        $curr = $head; // 記住當下節點
        $temp = $curr->next;
        $flag = false; // 用於處理數鍊之最後一組相同數字標記

        // 確認下一個節點是否為空且 flag 為 true
        while (isset($temp) || $flag === true) {
            // 往下個節點移動，直至發現與當前節點值不同
            if ($curr->val === $temp->val) {
                $temp = $temp->next;
                $flag = true;
                continue;
            }

            // 若 flag 為 true 且 temp 為空，代表已經跑完 linklist 但最後還是有重複數字狀況
            if (!isset($temp) && $flag === true) {
                $curr->next = null;
                break;
            }

            $curr->next = $temp; // 將當前節點 next 改接至第一個發現的不同數字之節點
            $curr = $temp; // 移動當前節點至第一個發現的不同數字
            $temp = $curr->next;
        }

        return $head;
    }
}