<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $strAry = explode(' ', trim($s));
        return strlen(end($strAry));
    }
}

var_dump((new Solution())->lengthOfLastWord('H '));
exit;
