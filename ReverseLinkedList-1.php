<?php


class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head)
    {
        $result = null;
        $curr = $head;

        while (!is_null($curr)) {
            $next = $curr->next;
            $curr->next = $result;
            $result = $curr;
            $curr = $next;
        }

        return $result;
    }
}

var_dump((new Solution())->reverseList(new ListNode(0)));
exit;
