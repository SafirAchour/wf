<?php


 //USE -> FUNCTION not var!

require_once __DIR__.'/DimensionalMath/Distance/DistanceCalculation.php';
require_once __DIR__.'/DimensionalMath/Vector/AngleCalculation.php';


use function src\DimensionalMath\Distance\threeDimensionDistance as d;
use function src\DimensionalMath\Vector\getVectorAngle as a;
use function src\DimensionalMath\Distance\subSquare as sub;

$distance = d(
    [1, 1, 1],
    [2, 2, 2]
    );

var_dump($distance);

$angle = a([1, 6], [3, 12]);

var_dump($angle);

$sub = sub(5, 9);

var_dump($sub);