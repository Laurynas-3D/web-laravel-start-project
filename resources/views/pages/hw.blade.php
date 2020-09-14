@extends('layouts.app')

@section('content')
    <h1><?php echo $title;?></h1>
    <h3>This is the HW page to test functions</h3>
    <hr>


{{-- function prints hello world message --}}
<?php
    function writeMsg() {
        echo "Hello world!";
    }
    writeMsg();
    ?>

<hr>

<?php
// directory scanner example
$dir    = '../';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
// print_r($files2);
?>

<hr>

<?php
// outputs file modified date example

$filename = 'index.php';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
}
else {
    echo "file does not exist";
}
?>

<hr>

<?php
// outputs current time example
date_default_timezone_set("Europe/Vilnius");
echo "The current time is " . date("H:i:s");
?>
<hr>

{{-- TEST GROUND --}}

<?php
// print file if is older than 2 minutes
$file_life = '120'; //caching time, in seconds

$filename = 'index.php';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
}
else {
    echo "file does not exist";
}
?>

<hr>

<?php
// if else if example
$indexfile = 'index.php';
$indexlife = '120'; // time, in seconds
$indexfile = date ("F d Y H:i:s.", filemtime($filename));

echo "indexfile variable: $indexfile <br>";

$t = date("m");

if ($t < "10") {
    echo "Have a good morning!";
} elseif ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}

echo "<br>";

echo "<br>";

if ($indexfile < $t) {
    echo "1st";
} elseif ($indexfile > $t) {
    echo "2nd";
} else {
    echo "3rd";
}





?> 







@endsection

