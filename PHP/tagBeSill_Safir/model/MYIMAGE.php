<?php

//IMAGE MANIPULATION DEMONSTRATION
//IMAGE = LIST OF POINTS WITH A RGB COLOR (BINARY DISTRIBUTED ON PIXELS)


// 1.IMAGE CREATION

$image = imagecreate(300, 300);      // CREATE IMAGE OF 300px by 300px
// RETURNS A STREAM = LIKE A FILE BUT IN MEMORY


// 2. ALLOCATE COLOR
$backgroundColor = imagecolorallocate($image, $red, $green, $blue)

$backgroundColor = imagecolorallocate($image, 255, 0, 0) //$image --> SPECIFY AN IMAGE (file?)

// !!!!! FIRST CREATE A FUNCTION TO SPECIFY IMG TYPE IN HEADER      ??? MAKE SURE THIS IS CORRECT
header('Content-type : image/png');

// 3. DISPLAY IMAGE AND STORE THE RESULT IN A FILE
imagepng($image);
