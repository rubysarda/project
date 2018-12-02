<!DOCTYPE html>
<html>
<body>

<?php



$x = 5;
$y = 10;

function myTest() {
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
} 

myTest();
echo $y; // outputs 15
function teststatic() {
    static $x = 0;
    echo $x;
    $x++;
}

teststatic();
echo "<br>";
teststatic();
echo "<br>";
$x = 10.365;
var_dump($x);
?>
</body>
</html>