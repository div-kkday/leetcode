<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $originalNumsLength = count($nums);

        for ($i = 0; $i < $originalNumsLength; $i++) {
            if (!isset($nums[$i + 1])) {
                break;
            }
            
            if ($nums[$i] === $nums[$i + 1]) {
                unset($nums[$i]);
            }
        }
        
        return count($nums);
    }
}

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
var_dump((new Solution())->removeDuplicates($nums));
exit;
