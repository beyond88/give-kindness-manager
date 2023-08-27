<?php
/**
 * Load template files
 * 
 * @param string, $object
 * @return string
 */
function give_kindness_manager_templates_part( $file, $object = NULL ){

    $template = '';
    $file_exists = GKM_TEMPLATES . $file. ".php";
    if( file_exists( $file_exists ) ) {
        $template = require_once GKM_TEMPLATES . $file . ".php";
    }
    return $template; 
}