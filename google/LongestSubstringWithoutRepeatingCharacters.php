<?php


class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring_1($s) {
        $stringLength = strlen($s);
        $tempCharKeys = [];
        $result = 0;
        $indicator = 0;

        while ($indicator < $stringLength) {

        }

        for ($i = 0; $i < $stringLength; $i++) {
            if (!array_key_exists(substr($s, $i, 1), $tempCharKeys)) {
                $tempCharKeys[substr($s, $i, 1)] = 1;
                var_dump($tempCharKeys);

                if ($i === $stringLength - 1) {
                    $result = count($tempCharKeys) > $result ? count($tempCharKeys) : $result;
                    break;
                }

                continue;
            }

            $result = count($tempCharKeys) > $result ? count($tempCharKeys) : $result;
            $tempCharKeys = [];
            $tempCharKeys[substr($s, $i, 1)] = 1;
        }

        return $result;
    }

    function lengthOfLongestSubstring_2(string $s)
    {
        $indicator = 0;
        $chars = str_split($s);
        $tempChars = [];
        $result = 0;

        if (strlen($s) === 0) {
            return 0;
        }

        while ($indicator < strlen($s)) {
            $char = $chars[$indicator];

            if (!isset($tempChars[$char])) {
                $tempChars[$char] = $indicator;
                $indicator++;

                if ($indicator === strlen($s)) {
                    $result = max(count($tempChars), $result);
                }

                continue;
            }

            if ($indicator === strlen($s)) {
                $result = max(count($tempChars), $result);
                break;
            }

            $result = max(count($tempChars), $result);

            $indicator = $tempChars[$char] + 1;

            $tempChars = [];
        }

        return $result;
    }

    function lengthOfLongestSubstring_3(string $s)
    {
        $left = 0;
        $right = 0;
        $chars = str_split($s);
        $tempChars = [];
        $result = 0;

        if (strlen($s) === 0) {
            return 0;
        }

        while ($right < strlen($s)) {
            $char = $chars[$right];

            // 未重複，右指標向右移
            if (!isset($tempChars[$char])) {
                $tempChars[$char] = $right;
                $right++;

                // 末元素
                if ($right === strlen($s)) {
                    $result = max($right - $left, $result);
                }

                continue;
            }

            // 遭遇重複元素，利用左右指標算出區間長度，與前次結果取大者
            $result = max($right - $left, $result);

            // 左指標向右移至遭遇與右指標相同字元為止，從 $tempChars 中刪除所經過之字元
            while ($chars[$left] !== $char) {
                unset($tempChars[$chars[$left]]);
                $left++;
            }

            // 左指標最後位置會落在右移過程中，初次與右指標相同字元再右移一個單位
            $left = $tempChars[$char] + 1;

            // 覆寫重複元素之 index 為右指標當前元素
            $tempChars[$char] = $right;
            $right++;
        }

        return $result;
    }
}

var_dump((new Solution())->lengthOfLongestSubstring_3("abcabcbb"));exit;