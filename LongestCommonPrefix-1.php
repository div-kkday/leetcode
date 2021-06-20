<?php

class Solution
{
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        if (empty($strs)) {
            return '';
        }

        $shortestStrCount = 200;
        $strsCount = count($strs);
        $prefix = '';

        foreach ($strs as $str) {
            $strLength = strlen($str);
            $shortestStrCount = $strLength < $shortestStrCount ? $strLength : $shortestStrCount;
        }

        for ($i = 0; $i < $shortestStrCount; $i++) {
            $targetChar = substr($strs[0], $i, 1);

            for ($j = 0; $j < $strsCount; $j++) {
                if ($targetChar !== substr($strs[$j], $i, 1)) {
                    break 2;
                }
            }

            $prefix .= $targetChar;
        }

        return $prefix;
    }
}

echo (new Solution())->longestCommonPrefix(['flower', 'flow', 'flight']);
