<?php
require('C:\xampp\htdocs\dev\anticopy\app\Helpers\ComparacionHelpers.php');

// Tesis
// $tesis1 = file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\docs\43f2171843160caa8796c805e1c05454.pdf1491178193.txt');
// $tesis2 = file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\docs\2105b67c40fe6beb0c69f650ae34d5aa.pdf1491178197.txt');
$tesis1 = <<<EOD
SOUL DECISION LYRICS - Ooh It's Kind Of Crazy

http://www.azlyrics.com/lyrics/souldecision/oohitskindofcrazy.html

"Ooh It's Kind Of Crazy" lyrics
SOUL DECISION LYRICS
"Ooh It's Kind Of Crazy"
EOD;
$tesis2 = <<<EOD
SOUL DECISION LYRICS - No One Does It Better

http://www.azlyrics.com/lyrics/souldecision/noonedoesitbetter.html

SOUL DECISION LYRICS
"No One Does It Better"
If I can't have anybody else but you, Baby don't you know what you put me through.
EOD;


$r = compararStrings(
    $tesis1,
    $tesis2,
    120,
    1,
    true
);

var_dump($r);