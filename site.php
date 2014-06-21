<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kirill Cherkashin
 * Date: 3/12/12
 * Time: 10:51 PM
 */

$query = $_SERVER["QUERY_STRING"];
if( !preg_match( "/^[a-z0-9]+$/", $query ) ) {
	die( "404" );
}
$file_name = $query . ".html";
if( !file_exists( $file_name )){
	die( "404" );
}

$file = file_get_contents( $file_name );
$file = preg_replace( "/(page[0-9]{1,2})\.html/", "site.php?$1", $file );
echo $file;