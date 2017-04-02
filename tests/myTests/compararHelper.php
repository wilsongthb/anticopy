<?php
require('C:\xampp\htdocs\dev\anticopy\app\Helpers\ComparacionHelpers.php');

// Tesis
$tesis1 = file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\docs\03b45b2cd438a899aa73a02772cca96b.pdf1491150242.txt');
$tesis2 = file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\docs\94a0fe5623cbc6006dcb43febe443d0b.pdf1491150247.txt');

compararStrings(
    $tesis1,
    $tesis2,
    150,
    10,
    true,
    true
);