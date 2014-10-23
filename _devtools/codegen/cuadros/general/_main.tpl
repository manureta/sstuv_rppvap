<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __CUADROS_DIR__ %>/generated" TargetFileName="Cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro %>Gen.class.php"/>
<?php
/**
 * Description of cuadro_1class
 *
 * @author codegen
 */
abstract class Cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro %>Gen extends <%= ($objDefinicionCuadro->isFilasFijas())?'CuadroFijoBase':'CuadroInfinitoBase'; %>{

<%@ deshabilitar_cuadros('objDefinicionCuadro'); %>
<%@ constructor('objDefinicionCuadro'); %>
<%@ columnas('objDefinicionCuadro'); %>
<% if ($objDefinicionCuadro->isFilasFijas()) { %>
    <%@ filas('objDefinicionCuadro'); %>
    <%@ deshabilitar_celdas('objDefinicionCuadro'); %>
<% } %>

<%@ verificar('objDefinicionCuadro'); %>

<% if ($objDefinicionCuadro->IdDefinicionMigracion) { %>
<%@    migrar('objDefinicionCuadro'); %>
<% } %>

}
?>
