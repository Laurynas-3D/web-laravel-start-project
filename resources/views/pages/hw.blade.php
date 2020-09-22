@extends('layouts.app')

@section('content')
    <h1><?php echo $title;?></h1>
    <h3>This is the HW page to test functions</h3>
    <hr>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


{{-- function prints hello world message --}}
<?php

function writeMsg($text) {
    echo "<h4>$text</h4><br>";
}
writeMsg("Message over parameter");

echo "<hr>";

// ------------------------------------simple directory scanner example
writeMsg("simple directory scanner example");

// './' is a public folder
$dir    = './';
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

echo "<h3>recursive test</h3><br>";

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
    '1'=>"a1", 
    '1'=>"b1", 
    '1'=>"c1",
    'items' => [ 
        '2' => "a2", 
        '2' => "b2", 
        '2' => "c2", 
        'items'=> [ 
            '3'=> "x3", 
            '3'=> "z3", 
            '3' => 'y3',
        ], 
        'items'=> [ 
            'items'=> [
                'm' => 'mmm', 
                'k' => 'kkk',
            ],
            'al' => 'alfa',
            'be' => 'beta'
        ]
    ]
];


// https://thisinterestsme.com/php-using-recursion-print-values-multidimensional-array/

function recursive2($array){
    foreach($array as $key => $value){
        //If $value is an array.
        if(is_array($value)){
            //We need to loop through it.
            recursive2($value);
        } else{
            //It is not an array, so print it out.
            echo $value, '<br>';
        }
    }
}
recursive2($array1);


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
$folderPath = "./";
foreach ($arr as $value) {
    
    echo $value;
    echo "<br>";
//     dd($value)
    $index++;

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



// function readFolder MY EDIT
$folderPath2 = "./";

function readFolder2( $path ) {

    if ( !( $dir = opendir( $path ) ) ) die( "Can't open $path" );
    $filenames = array();

    while ( $filename = readdir( $dir ) ) {
        if ( $filename != '.' && $filename != '..' ) {
        if ( is_dir( "$path/$filename" ) ) $filename .= '/';
        $filenames[] = $filename;
        }
    }
    closedir ( $dir );
    sort( $filenames );

    //echo "<ul>";
    foreach ( $filenames as $filename ) {
        // echo $filename;
        // echo "<br>";
        // $file_time = date ("F d Y H:i:s.", filemtime($filename));
        // $now_time = new \DateTime();
        // $file_Date = new \DateTime($file_time);

        // if ($file_Date->diff($now_time)->days > 2) { 
        //     echo "<small style='color:green;'>#</small>";
        // } else { 
        //     echo "<small style='color:red;'>#</small>";
        // }
        
        echo "$filename - <small style='color:lightgray;'>(...)</small>";
        if ( is_dir( "$path/$filename" ) ) readFolder2( "$path/" . substr( $filename , 0, -1 ) );
        echo "<br>";
    }
    //echo "</ul>";
}

echo "<br> <h3>Contents of public folder '$folderPath':</h3>";
readFolder2( $folderPath2 );


// SCANDIR FUNCTION

echo "<hr>";
echo "<br> <h3>SCANDIR pubic folder:</h3>";

// './' is a public folder
$dir2 = './';
$pathtoFile = 'favicon.ico';

// Functio to print file working dir and checks whether a file or directory exists
function testFile($fileToTest){

// echo "$fileToTest";
if (file_exists($fileToTest)) {
    echo " - file exists - ";
    echo getcwd();
    } else {
        echo " - file does not exist - ";
        echo getcwd();
    }
}


function testFileTime($fileToTest){

    // echo "$fileToTest";
    if (file_exists($fileToTest)) {

    // Test file date
    $file_time = date ("F d Y H:i:s.", filemtime($fileToTest));
    $now_time = new \DateTime();
    $file_Date = new \DateTime($file_time);
    if ($file_Date->diff($now_time)->days > 2) { 
        echo "$fileToTest <small style='color:green;'>##</small>";
    } else { 
        echo "$fileToTest <small style='color:red;'>##</small>";
        }
    } else {
        echo " - file does not exist - ";
    }
}
testFileTime($pathtoFile);

// Functio to SCAN Folder
function scanFolder($path){

    echo "<hr>";
    $files20 = scandir($path); // Ascending Order

    // print_r($files20);
    $array_modified = array_diff( $files20, ['..','.'] );
    

    foreach ( $array_modified as $file ) {
        echo $file;
        testFile($file);
        echo "<br>";
        if ( is_dir ( "$path/$file" ) ) {
            // chdir($file);
            // scanFolder("$path" . "\\" ."$file");
            scanFolder("$path" ."\\". "$file");
            // echo getcwd();
        }
    }
}
scanFolder($dir2);




?> 
@endsection

