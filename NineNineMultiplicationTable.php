<?php


class NineNineMultiplicationTable
{
    public static function show()
    {
        for ($i = 1; $i <= 9; $i++) {
            for ($j = 1; $j <= 9 ; $j++) {
                $answer = $i * $j;
                echo "{$i} x {$j} = {$answer}\n";
            }
        }
    }
}

NineNineMultiplicationTable::show();
