<?php
return [
    'OS' => 'windows',
    'OSs' => [
        'windows',
        'ubuntu'
    ],

    /* 
        Necesario en windows
        Ubicacion de pdftotext binaries, en ubuntu no sera necesario mas que copiar la clave, 
        porque los comandos disponene de los binarios desde cualquier ubicacion
    */
    'pdftotext' => 'C:/xpdfbin-win-3.04/bin64/pdftotext'
];