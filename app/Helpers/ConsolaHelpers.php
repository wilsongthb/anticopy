<?php

if (!function_exists('consola')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function consola($comando, &$return_val)
    {
        if(config('system.OS') == 'windows'){
            $comando .= ' 2>&1';
        }

        exec($comando, $arr_output, $return_val);

        $output = '';
        foreach ($arr_output as $key => $value) {
            // $output .= $value.'\n';
            $output .= $value.PHP_EOL;
        }

        return $output;
    }
}
