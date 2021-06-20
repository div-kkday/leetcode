<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val)
    {
        $originalAryLength = count($nums);

        for ($i = 0; $i < $originalAryLength; $i++) {
            if ($val !== $nums[$i]) {
                continue;
            }

            unset($nums[$i]);
        }

        return count($nums);
    }
}

$nums = [0, 1, 2, 2, 3, 0, 4, 2];
$val = 2;
var_dump((new Solution())->removeElement($nums, $val));
exit;
