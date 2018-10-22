<?php
/*
$date = new DateTime('First day of current month at midnight');
$lastDate = new DateTime('last day of current month');


$date -> add(new DateInterval('+1day'));

$dateAsString = $date ->format('Y-m-d H:i:s')
*/


//MATTHIEU STYLE:


//0.    IN MY FUNCTION, ASSUMMING TWO INPUT PARAMETERS YEAR AND MONTH
function getAllMondaysOfMonth($year, $month){
//1.    CREATE A DATE FROM YEAR AND MONTH
$date = DateTime::createFromFormat('Yn', $year.$month);
//2.    GO TO FIRST DAY OF THE MONTH
$date = new DateTime('first day of' .$date->format('F Y'));
$date = new DateTime('Test');
//3.    IF CURRENT DAY IS NOT A MONDAY , GO TO NEXT MONDAY
$interval = DateInterval::createFromDateString('next monday');
if ($date->format('N')!=1){
    $date->add($interval);
    $date->add($interval);
}
//4.    WHILE THE DATE MONTH IS THE NEEDED MONTH:\
$mondays = [];  //SET MONDAY VALUE TO UNDEFINED BEFORE ENTERING THE LOOP
while ($date->format('m') == $month) {
//  4.1 ADD THE DATE INTO AN ARRAY
    $mondays[] = $date->format('l j, M Y');
//  4.2 GO TO NEXT MONDAY
    $date->add($interval);
}
//5. RETURN THE ARRAY
    return $mondays;
}


/*

To prepare some meeting, your CTO want a function returning all mondays of a month as string into an array. 
The function will receive at first argument a year, and at second place, a month, both as integer type.

The returning date is expected to be a string, and to follow the following format : 'Monday 1, Feb 2021'.

The function MUST be named 'getAllMondaysOfMonth'.

To validate it, just cd into the Exercice2 folder and run "php phpunit-6.5.5.phar".
*/