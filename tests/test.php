<?php
require('C:\xampp\htdocs\dev\anticopy\app\Helpers\ComparacionHelpers.php');
function microtime_float()
{
list($useg, $seg) = explode(" ", microtime());
return ((float)$useg + (float)$seg);
}

$tiempo_inicio = microtime_float();

// $r = compararStrings(
//     'Cómo posicionar la descripción - top | inferior | left | right | auto. 
// Cuando se especifica "auto", se reorientará dinámicamente la información sobre herramientas. Por ejemplo, si la colocación es "izquierda auto", la descripción se mostrará a la izquierda cuando sea posible, de lo contrario, se mostrará a la derecha.

// Cuando se utiliza una función para determinar la colocación, se le llama con el nodo DOM información sobre herramientas como primer argumento y el elemento DOM nodo de activación como su segundo. El thiscontexto se establece en la instancia de información sobre herramientas.',
//     'Si se proporciona un selector, objetos de información sobre herramientas se delegan a los destinos especificados. En la práctica, esto se utiliza para habilitar el contenido HTML dinámico para tener información sobre herramientas añaden. Ver esta y un ejemplo informativo .',
//     30,
//     1,
//     true
// );
// $r = compararStrings(
//     str_replace([' '],[' '],'Laravel es lo maximo y es la Hostia'),
//     str_replace([' '],[' '],'Node JS es lo maximo y el futuro'),
//     6,
//     1,
//     true
// );
// $r = compararStrings(
//     str_replace([' ', "\n"], '', file_get_contents('C:\xampp\htdocs\dev\laravel_8010\public\php\files\txt\Hallasi Hallasi David _ Bustinza Sancho Saul Alfredo.txt')),
//     str_replace([' ', "\n"], '', file_get_contents('C:\xampp\htdocs\dev\laravel_8010\public\php\files\txt\Hancco_Larico_Odila_Bertha.txt')),
//     30,
//     100,
//     true
// );
// $r = compararStrings(
//     file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\txts\0a2273f894448ad11e8709cca1f73145.pdf1490410336.txt'),
//     file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\txts\9ab44dd1e9520204ca3f2e48a1bc426b.pdf1489977659.txt'),
//     100,
//     150,
//     true
// );
// var_dump($r);
$r = compararStrings(
    file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\txts\033f16ddcbaa1504a277cb2de12e8beb.pdf1490622404.txt'),
    file_get_contents('C:\xampp\htdocs\dev\anticopy\storage\app\docs\60f15de87e9fcc3e1da1cb5740b60efa.txt'),
    15,
    1,
    true
);
var_dump($r);


// file_put_contents('out.txt', json_encode($r));
file_put_contents('out.txt', print_r($r, true));

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;

echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio);