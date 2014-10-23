<template OverwriteFlag="false" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __MIGRACIONES_DIR__ %>" TargetFileName="Migracion<%= QConvertNotation::CamelCaseFromUnderscore($objDefinicionMigracion->NombreCorto) %>.class.php"/>
<?php
/**
* <%= QConvertNotation::CamelCaseFromUnderscore($objDefinicionMigracion->NombreCorto) %>
* <%= $objDefinicionMigracion->Descripcion %>
*/
abstract class Migracion<%= QConvertNotation::CamelCaseFromUnderscore($objDefinicionMigracion->NombreCorto) %> {

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){

    }

}
?>
