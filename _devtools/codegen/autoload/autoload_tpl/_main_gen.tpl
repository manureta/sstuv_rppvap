<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __MODEL_DIR__ %>/autoload/generated" TargetFileName="_cuadros_paths_gen.inc.php"/>
<?php
<% foreach ($objDefinicionCuadroArray as $objDefinicionCuadro) { %>
    QApplication::$ClassFile['cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro; %>'] = __MODEL_DIR__.'/cuadros/Cuadro<%= $objDefinicionCuadro->IdDefinicionCuadro; %>.class.php';
<% } %>

<% foreach ($objDefinicionConsistenciaArray as $objDefinicionConsistencia) { %>
    QApplication::$ClassFile['consistencia<%= $objDefinicionConsistencia->IdDefinicionConsistencia; %>'] = __MODEL_DIR__.'/consistencias/Consistencia<%= $objDefinicionConsistencia->IdDefinicionConsistencia; %>.class.php';
<% } %>

<% foreach ($objDefinicionMigracionArray as $objDefinicionMigracion) { %>
    QApplication::$ClassFile['migracion<%= strtolower(QConvertNotation::CamelCaseFromUnderscore($objDefinicionMigracion->NombreCorto)); %>'] = __MODEL_DIR__.'/migraciones/Migracion<%= QConvertNotation::CamelCaseFromUnderscore($objDefinicionMigracion->NombreCorto); %>.class.php';
<% } %>

?>
