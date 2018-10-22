<?php

$password = '123456789';
$salt = 'NaCl';

$saltedPassword = $firstPart . $salt . $lastPart;

$firstPart = substr(
    $password,
    0,
    floor(strlen($password) /2)
);

$lastPart = substr($password, floor(strlen($password) /2));

# IF WE USE BOTH FLOOR AND CEIL WE ADD MODULO:

$firstPartV2 = substr(
    $password,
    0,
    floor(strlen($password) /2) + (strlen($password) % 2)
);

$lastPartV2 = substr($password, ceil(strlen($password) /2));

$saltedPasswordv2 = $firstPartV2 . $salt . $lastPartV2;


/*
#Define median value of pass
$median = (strlen($password)/2)


#If median is a Decimal we , 
if (substr($median, 1, 1) >= .4   {
    floor($median)
} else {
    ceil($median)
}
*/
