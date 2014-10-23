<template OverwriteFlag="false" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __CONSISTENCIAS_DIR__ %>" TargetFileName="Consistencia<%= $objDefinicionConsistencia->IdDefinicionConsistencia %>.class.php"/>
<?php
/**
* Codigo: <%= $objDefinicionConsistencia->Codigo %>
* <%= $objDefinicionConsistencia->Descripcion %>
*/
abstract class Consistencia<%= $objDefinicionConsistencia->IdDefinicionConsistencia %> {

    /**
    * Codigo: <%= $objDefinicionConsistencia->Codigo %>
    * <%= $objDefinicionConsistencia->Descripcion %>
    * @return boolean
    */
    public static function Ejecutar(){

    }

}
?>