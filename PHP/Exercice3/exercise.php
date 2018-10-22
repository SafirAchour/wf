<?php

$input;
$winner;


$aResult = 0
$bResult = 0


foreach ($input as $round) {
    list($a, $b) = $round; //$time = [1,2];

    if ($a > $b) {
        $aResult++;
    }   else if ($b > $a)
        $bResult++
}

if ($aResult > break)


/*
1. First divide the deck of 52 cards by 2 and get 26



2. Create a while true loop  with index 0 - 26

3.  Inside the loop:
    IF A.val > B.val,       A score ++
    ELSE IF A.val < B.val   B score ++
    ELSE                    DRAW

4. At the end of the loop (when no cards are left)
