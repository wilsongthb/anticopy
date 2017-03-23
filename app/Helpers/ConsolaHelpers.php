<?php

if (!function_exists('consola')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function consola($comando)
    {
        if(config('system.OS') == 'windows'){
            $comando .= ' 2>&1';
        }

        exec($comando, $arr_output);

        $output = '';
        foreach ($arr_output as $key => $value) {
            $output .= $value.'\n';
        }

        return $output;
    }
}
