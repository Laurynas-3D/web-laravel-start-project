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
    

echo "<hr>";


// directory scanner example
$dir    = '../';
$files1 = scandir($dir); // Ascending Order
$files2 = scandir($dir, 1); // Descending Order

print_r($files1);
// print_r($files2);


echo "<hr>";


// outputs file modified date example

$filename = 'index.php';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
}
else {
    echo "file does not exist";
}


echo "<hr>";


// outputs current time example
date_default_timezone_set("Europe/Vilnius");
echo "The current time is " . date("H:i:s");

echo "<hr>";


// {{-- TEST GROUND --}}
// print file if is older than 2 minutes
$file_life = '120'; //caching time, in seconds

$filename = 'index.php';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
}
else {
    echo "file does not exist";
}


echo "<hr>";


// if else if example
$indexfile = 'index.php';
$indexfile = date ("F d Y H:i:s.", filemtime($filename));
$faviconfile = "favicon.ico";
$faviconfile = date ("F d Y H:i:s.", filemtime($faviconfile));

echo "indexfile variable: $indexfile <br>";
echo "faviconfile variable: $faviconfile <br>";

$t = date("i");

if ($t < "10") {
    echo "Have a good morning! - 1st";
} elseif ($t < "20") {
    echo "Have a good day! - 2nd";
} else {
    echo "Have a good night! - 3rd";
}

echo "<br>";
echo "<br>";


// PHP program to compare dates 
// Declare two dates and  
// initialize it 
$date1 = "1998-11-24"; 
$date2 = "1997-03-26"; 
  
// Use comparison operator to  
// compare dates 
if ($indexfile > $faviconfile) 
    echo "$indexfile is latest than $faviconfile"; 
else
    echo "$indexfile is older than $faviconfile"; 


echo "<br>";
echo "<hr>";

// PHP program to compare dates 
// this one uses 
$someDate = new \DateTime('2020-09-12 17:14:40');
$now = new \DateTime();

if($someDate->diff($now)->days > 2) {
   echo 'The date was more than 30 days ago.';
} else {
    echo "the date is not older than two days";
}


echo "<br>";
echo "<hr>";


// PHP program to compare dates test with files
$someDate = new \DateTime($indexfile);
$now = new \DateTime();

if($someDate->diff($now)->days > 2) {
   echo 'The file is older than 2 days.';
} else {
    echo "The file is not older than 2 days.";
}


echo "<br>";
echo "<hr>";
echo "loop test <br>";


for ($x = 0; $x <= 10; $x++) {
  echo "The number is: $x <br>";
}

echo "<br>";
echo "<hr>";
echo "for each loop test <br>";

$index = -1;
$arr = $files1;
foreach ($arr as $value) {
    
    echo $value;
    echo "<br>";
//     dd($value)
//     $index++;
//     $indexfile = date ("F d Y H:i:s.", filemtime($value));
//     $fileDate = new \DateTime($indexfile);
//     $now = new \DateTime();
//     if($fileDate->diff($now)->days > 2) {
//         echo '$index - $value - The file is older than 2 days. <br>';
// } else {
//     echo "$index - $value - The file is not older than 2 days. <br>";
    
//     }
//     unset($value);
}
// echo "<br>";
// print_r($arr);
// // $arr is now array(2, 4, 6, 8)
// unset($value); // break the reference with the last element










?> 
@endsection

