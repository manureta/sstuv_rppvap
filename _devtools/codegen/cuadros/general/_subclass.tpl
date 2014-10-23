<template OverwriteFlag="false" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __CUADROS_DIR__ %>" TargetFileName="Cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro %>.class.php"/>
<?php
require_once(__CUADROS_DIR__. "/generated/Cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro %>Gen.class.php");
/**
 * Description of cuadro_1class
 *
 * @author codegen
 */
class Cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro %> extends Cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro %>Gen{


}
?>