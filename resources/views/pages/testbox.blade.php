@extends('layouts.app')

@section('content')
    <h1><?php echo $title;?></h1>
    <h4>This is the Array Testbox page</h4>

<?php
echo "<br>";
$correctArray = array(
    0 => 'a',
    1 => array('subA','subB',array(0 => 'subsubA', 1 => 'subsubB', 2 => array(0 => 'deepA', 1 => 'deepB'))),
    2 => 'b',
    3 => array('subA','subB','subC'),
    4 => 'c'
); 

$array1 = array(
    'a1'=>"a1", 
    'b1'=>"b1", 
    'c1'=>"c1",
    array( 
        'a2' => "a2", 
        'b2' => "b2", 
        'c2' => "c2", 
        array(
            'x3'=> "x3", 
            'z3'=> "z3", 
            'y3' => 'y3',
        ), 
        array(
            array(
                'mmm' => 'mmm', 
                'kkk' => 'kkk',
                ),
            'alfa' => 'alfa',
            'beta' => 'beta'
        )
    )
);

// array_walk_recursive Very simple
array_walk_recursive($array1, function ($item, $key) {
    echo "$key holds $item <br>";
});

echo "<hr>";

// Fully persistent. Using 'use' keyword
$counter = 0;
echo "Fully persistent. Using 'use' keyword<br>";

array_walk_recursive( $array1, function($value, $key) use (&$counter) {
    $counter++;
    echo "$counter - $value <br> "; 
}, $counter);
echo "counter : $counter";


// Does not persist
echo "<br><br>Does not persist.<br>";

array_walk_recursive( $array1, function($value, $key, $counter) {
    $counter++;
    echo "$value -> $counter <br> "; 
}, $counter);
echo "<br>";
echo "counter : $counter"; 


//Persists only in same array node
echo "<br><br>Persists only in same array node.<br>";

array_walk_recursive( $array1, function($value, $key, &$counter) {
    $counter++;
    echo "$value -> $counter <br> "; 
}, $counter);



// simple php function print_r
echo "<br>";
echo "<hr>";
echo "php function print_r <br><br>";
print_r ($array1);


// PHP – Using Recursion to print out values in a multidimensional array.
// https://thisinterestsme.com/php-using-recursion-print-values-multidimensional-array/

echo "<hr>";
echo "recursive with Indenting <br>";

function recursive($array, $level = 1){
    foreach($array as $key => $value){
        //If $value is an array.
        if(is_array($value)){
            //We need to loop through it.
            recursive($value, $level + 1);
        } else{
            //It is not an array, so print it out.
            echo str_repeat("-", $level), $value, '<br>';
        }
    }
}
recursive($array1);

echo "<br>";
echo "recursive simple walk <br>";
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

// echo "<br>";
// echo "recursive simple walk KESTO UPDATED<br>";
// function recursive3($array){
//     foreach($array as $value)
//         is_array($value)
//             ? recursive3($value)
//             : echo $value '<br>';
// }
// recursive3($array1);

// stackoverflow – simple reusable implementation:

echo "<hr>";
echo "<br>";
echo " stackoverflow – simple reusable implementation:<br>";

function recursive_foreach($array, $callback) {
    foreach($array as $key => $value) {
        if (is_array($value)) {
            recursive_foreach($value, $callback);
        }
        else {
            call_user_func($callback, $key, $value);
        }
    }
}

// Where $callback is a callback accepting two arguments: key and value. For example:
recursive_foreach($array1, function($k, $v) {
    echo "$k => $v<br>";
});






?>



@endsection

