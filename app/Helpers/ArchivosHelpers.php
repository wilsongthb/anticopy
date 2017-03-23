<?php
if (!function_exists('DummyFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function DummyFunction()
    {
        return 'DUMMY DUMMY :D';
    }
}
if (!function_exists('formatBytes')) {

    /**
     * description: Formatea bits para mostrarlos en mb gb, como corresponda
     *
     * @param
     * @return
     */
    function formatBytes($bytes, $precision = 2) { 
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow)); 

        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }
}
if (!function_exists('LinkDescarga')) {

    /**
     * description: genera el link de descarga de la clase Archivos
     *
     * @param
     * @return
     */
    function LinkDescarga($item)
    {
        return url('/descargar/'.$item->id.'/'.$item->nombre);
    }
}
if (!function_exists('pathNombre')) {

    /**
     * description: obtiene el nombre del path de un archivo
     *
     * @param
     * @return
     */
    function pathNombre($path, $sep = '/')
    {
        return substr(strrchr($path, $sep), 1);
    }
}
