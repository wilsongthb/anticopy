<?php
function Console_out($str){
    print($str.PHP_EOL);
}
function arr_utf8_encode($arr){
    $new_arr = [];
    foreach ($arr as $key => $value) {
        if(gettype($value) == 'array'){
            $new_arr[utf8_encode($key)] = arr_utf8_encode($value);
        }else $new_arr[utf8_encode($key)] = utf8_encode($value);
    }
    return $new_arr;
}
if (!function_exists('compararStrings')) {

    /**
     * description
     *
     * @param
     * @return Array Resultado
     */
    function compararStrings($str1, $str2, $longitud_minima = 1, $longitud_salto = 1,$console_mod = false)
    {
        if($console_mod){
            Console_out('COMPARAR STRINGS - 2017');
            Console_out('@Auth: Wilson Pilco Nunhez');
        }
        $length_str1 = strlen($str1);
        $length_str2 = strlen($str2);

        // Vars
        $foco = "";
        
        $resultado = [];

        for ($i=0; $i < $length_str1; $i+=$longitud_salto) { 

            $last_foco = "";

            $foco = substr($str1, $i, $longitud_minima);

            if(strlen($foco) < $longitud_minima){
                continue;
            }

            // Comparacion
            $length_foco = $longitud_minima+$longitud_salto;
            while(stripos($str2, $foco) AND $length_foco<$length_str1){
                if($console_mod){
                    Console_out('Length:'.strlen($foco)."\t".'Foco:'.$foco);
                }
                $last_foco = $foco;
                $foco = substr($str1, $i, $length_foco);
                $length_foco += $longitud_salto;
            }
            if(stripos($str2, $last_foco)){
                $i += strlen($last_foco)-$longitud_salto;
                $resultado[] = $last_foco;
            }

            if($console_mod){
                // Console_out('Length:'.strlen($foco)."\t".'Foco:'.$foco);
                Console_out('Posicion:'.$i."\tde:".$length_str1."\tEncontrados:".count($resultado));
            }
        }

        return $resultado;
    }
}