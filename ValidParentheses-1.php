<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $charactors = [
            ')' => '(',
            ']' => '[',
            '}' => '{',
        ];

        $indicator = 0;
        $targetChar = '';
        $stack = [];

        while ($targetChar !== false) {
            $targetChar = substr($s, $indicator, 1);

            if ($targetChar === '') {
                break;
            }

            if (
                empty($stack)
                && !in_array($targetChar, $charactors)
            ) {
                return false;
            }

            if (in_array($targetChar, $charactors)) {
                array_push($stack, $targetChar);
                $indicator++;
                continue;
            }

            if (end($stack) !== $charactors[$targetChar]) {
                break;
            }

            array_pop($stack);
            $indicator++;
        }

        return empty($stack);
    }
}

var_dump((new Solution())->isValid(']'));exit;
//echo (new Solution())->isValid('{([({)]()()[][(){}])})');
