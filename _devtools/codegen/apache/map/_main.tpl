<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __DOCROOT__ %>" TargetFileName="paginamap.txt"/>

##
##  paginamap.txt -- rewriting map
##
<% foreach ($objPaginaArray as $objPagina) { %>
<%= strtolower($objPagina->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto).$objPagina->Numero; %>     ?controller=carga&pagina=<%= $objPagina->IdDefinicionPagina; %>
<% } %>