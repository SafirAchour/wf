<?php
declare(strict_types=1);

function divide(int $divident, int $dividor): float {
    if ($dividor == 0){
        throw new RuntimeException('Division by 0 is not allowed');
    }
    return(float)($divident / $dividor);
}
/*
You must create a function called "divide" that take in first parameter an integer to divide, and in second parameter, the divisor.
 If the divisor is zero, you must throw a RuntimeException.
*/
function arrayDivide(array $arrayDivident, int $dividor): array {
    $result = [];
    
    foreach ($arrayDivident as $array){
        try{
            $result[] = divide($array, $dividor);
        } catch (RuntimeException $testexception){
            $result[] = $array;
        }
    }
    
    return $result;
}


