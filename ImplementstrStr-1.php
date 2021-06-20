<?php

class Solution
{

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle)
    {
        if ($needle === '') {
            return 0;
        }

        $strAry = str_split($haystack);
        $targetAry = str_split($needle);

        $comparing = false;
        $strIndicator = 0;
        $retryIndicator = 0;
        $targetIndicator = 0;
        $result = null;
        $targetAryCount = count($targetAry);

        while ($targetIndicator < $targetAryCount) {
            while (true) {
                if (!isset($strAry[$strIndicator])) {
                    return -1;
                }

                if ($targetAry[$targetIndicator] !== $strAry[$strIndicator]) {
                    $retryIndicator++;
                    $strIndicator = $retryIndicator;

                    if ($comparing === false) {
                        continue;
                    }

                    $comparing = false;
                    $targetIndicator = 0;
                    $result = null;

                    continue;
                }

                if (is_null($result)) {
                    $result = $strIndicator;
                }

                $comparing = true;
                $strIndicator++;
                break;
            }

            $targetIndicator++;
        }

        return $result;
    }
}

//var_dump((new Solution())->strStr('mississippi', 'issip'));
var_dump((new Solution())->strStr('mississippi', 'pi'));
//var_dump((new Solution())->strStr('aabaaabaaac', 'aabaaac'));
exit;
