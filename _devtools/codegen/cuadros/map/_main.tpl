<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __DOCROOT__ %>" TargetFileName="cuadromap.txt"/>

##
##  cuadromap.txt -- rewriting map
##
<% foreach ($objCuadroArray as $objDefinicionCuadro) { %>
<%   foreach ($objDefinicionCuadro->DefcuadroDefpaginaAsIdArray as $i => $objDefcuadroDefpagina) { %>
<%=    $objDefinicionCuadro->DefcuadroDefpaginaAsIdArray[$i]->IdDefinicionPaginaObject->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto.$objDefinicionCuadro->DefcuadroDefpaginaAsIdArray[$i]->IdDefinicionCuadroObject->Numero; %>     ?controller=carga&cuadro=<%= $objDefinicionCuadro->DefcuadroDefpaginaAsIdArray[$i]->IdDefinicionCuadro; %>&pagina=<%= $objDefinicionCuadro->DefcuadroDefpaginaAsIdArray[$i]->IdDefinicionPagina; %>
<%   } %>
<% } %>
