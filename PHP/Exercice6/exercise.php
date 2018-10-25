<?php


function easterReverse($filePath){
    $content = file_get_contents($filePath);
    //var_dump($fileContent);
    $secondPart = substr($content, floor(strlen($content) / 2));
    $firstPart = substr($content, 0, strlen($secondPart) - 1);
    $read = fopen('file.txt', 'r+');
    strrev($secondPart);
    fseek($read, strlen($firstPart), SEEK_SET);
    fwrite($read ,strrev($secondPart), strlen($secondPart));
    
    fclose($read);
    
    //$fullText = fwrite($read, strrev($secondPart));
   // echo $fullText;
    
};






/*
To create an easter egg, your dev leader create a function that shuffle a file. You find this easter egg really dangerous because no rollback
can be done.

You decide to create a function called "easterReverse" that take a file path as argument, to reverse the second half part of the file.

Tips : Use "floor(strlen($fileContent) / 2)" to calculate the middle of the file.
Warning : you are not allowed to use "file_put_contents", "w" or "w+" access mode.

To validate it, just cd into the Exercice6 folder and run "php phpunit-6.5.5.phar".

*/