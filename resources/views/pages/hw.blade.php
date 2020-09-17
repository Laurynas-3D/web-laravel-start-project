@extends('layouts.app')

@section('content')
    <h1><?php echo $title;?></h1>
    <h3>This is the HW page to test functions</h3>
    <hr>


{{-- function prints hello world message --}}
<?php

function writeMsg($text) {
    echo "<h4>$text</h4><br>";
}
writeMsg("Message over parameter");

echo "<hr>";

// ------------------------------------simple directory scanner example
writeMsg("simple directory scanner example");

$dir    = '../';
$files1 = scandir($dir); // Ascending Order
$files2 = scandir($dir, 1); // Descending Order

print_r($files1);
// print_r($files2);


echo "<hr>";


// ------------------------------------ outputs file modified date example
writeMsg("outputs file modified date example");

$filename = 'index.php';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
}
else {
    echo "file does not exist";
}


echo "<hr>";


// ------------------------------------ outputs current time example
writeMsg(" outputs current time example ");

date_default_timezone_set("Europe/Vilnius");
echo "The current time is " . date("H:i:s");

echo "<hr>";


// ------------------------------------ print file if is older than 2 minutes
writeMsg(" print file if is older than 2 minutes ");


$file_life = '120'; //caching time, in seconds

$filename = 'index.php';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
}
else {
    echo "file does not exist";
}


echo "<hr>";


// ------------------------------------ if else if example
writeMsg(" if else if example  ");

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


//  ------------------------------------ PHP program to compare dates 
writeMsg(" PHP program to compare dates  ");

// Declare two dates and  
// initialize it 
$date1 = "1998-11-24"; 
$date2 = "1997-03-26"; 
  
// ------------------------------------ Simple IF ELSE
writeMsg(" Simple IF ELSE ");

// Use comparison operator to  
// compare dates 
if ($indexfile > $faviconfile) 
    echo "$indexfile is latest than $faviconfile"; 
else
    echo "$indexfile is older than $faviconfile"; 


echo "<br>";
echo "<hr>";

// ------------------------------------ PHP program to compare dates 
writeMsg("PHP program to compare dates ");

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


// ------------------------------------ PHP program to compare dates test with files
writeMsg("PHP program to compare dates test with files");


$someDate = new \DateTime($indexfile);
$now = new \DateTime();

if($someDate->diff($now)->days > 2) {
   echo 'The file is older than 2 days.';
} else {
    echo "The file is not older than 2 days.";
}

// ------------------------------------ recursive test KESTO side task
echo "<br>";
echo "<hr>";

writeMsg("recursive test KESTO side task");

echo "<h2>recursive test</h2><br>";

$myArray = array(
    'example',
    'example two',
    array(
        'another level',
        array(
            'level three'
        )
    )
);

$array1 = [ 
    'a1'=>"a1", 
    'b1'=>"b1", 
    'c1'=>"c1",
    'items' => [ 
        'a2' => "a2", 
        'b2' => "b2", 
        'c2' => "c2", 
        'items'=> [ 
            'x3'=> "x3", 
            'z3'=> "z3", 
            'y3' => 'y3',
        ], 
        'items'=> [ 
            'items'=> [
                'mmm' => 'mmm', 
                'kkk' => 'kkk',
            ],
            'alfa' => 'alfa',
            'beta' => 'beta'
        ]
    ]
];


// https://www.php.net/manual/en/function.array-walk-recursive.php
// Fully persistent. Using 'use' keyword


// $counter = 0;
// array_walk_recursive( $array1, function($value, $key) use (&$counter) {
//    $counter++;
//    echo "$counter - $value <br> "; 
// }, $counter);
// echo "counter : $counter";

echo "<br> new function test";
echo "<hr>";

// https://thisinterestsme.com/php-using-recursion-print-values-multidimensional-array/

function recursive($array){
    foreach($array as $key => $value){
        //If $value is an array.
        if(is_array($value)){
            //We need to loop through it.
            recursive($value);
        } else{
            //It is not an array, so print it out.
            echo $value, '<br>';
        }
    }
}



echo "<br>";

// ------------------------------------ loop test
writeMsg("Loop test");

echo "<hr>";
echo "loop test <br>";

//simple loop
for ($x = 0; $x <= 4; $x++) {
    echo "The number is: $x <br>";
}

// ------------------------------------ my for each loop test

echo "<hr>";
echo "<h3>for each loop test - folder src</h3> <br>";

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


// ------------------------------------ AWESOME RECURSION function to run through folders
// https://www.elated.com/php-recursive-functions/

$folderPath = "./";

function readFolder( $path ) {

    // Open the folder
    if ( !( $dir = opendir( $path ) ) ) die( "Can't open $path" );
    $filenames = array();

    // Read the contents of the folder, ignoring '.' and '..', and
    // appending '/' to any subfolder names. Add all the files and
    // subfolders to the $filenames array.

    while ( $filename = readdir( $dir ) ) {
        if ( $filename != '.' && $filename != '..' ) {
        if ( is_dir( "$path/$filename" ) ) $filename .= '/';
        $filenames[] = $filename;
        }
    }

    closedir ( $dir );

    // Sort the filenames in alphabetical order
    sort( $filenames );

    // Display the filenames, and process any subfolders

    echo "<ul>";

    foreach ( $filenames as $filename ) {
        echo "<li>$filename";
        if ( substr( $filename, -1 ) == '/' ) readFolder( "$path/" . substr( $filename, 0, -1 ) );
        echo "</li>";
    }

    echo "</ul>";
}

echo "<br> <h3>Contents of public folder '$folderPath':</h3>";
readFolder( $folderPath );







?> 
@endsection

