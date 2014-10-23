<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __MODEL_DIR__ %>/autoload/generated" TargetFileName="_tipo_class_paths_gen.inc.php"/>
<?php

<% foreach ($objTableArray as $objTable) { %>

        // ClassPaths for the <%= $objTable->ClassName %> class

        QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>gen'] = __MODEL_DIR__.'<%= '/orm/generated/'.$objTable->ClassName %>Gen.class.php';
        QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>'] = __MODEL_DIR__.'<%= '/orm/'.$objTable->ClassName %>.class.php';
        QApplication::$ClassFile['qqnode<%= strtolower($objTable->ClassName)%>'] = __MODEL_DIR__.'<%= '/orm/generated/QQNode'. $objTable->ClassName %>.class.php';
        <% foreach ($objTable->ManyToManyReferenceArray as $objReference) { %>
         QApplication::$ClassFile['qqnode<%= strtolower($objTable->ClassName.$objReference->ObjectDescription)%>'] = __MODEL_DIR__.'<%= '/orm/generated/QQNode'.$objTable->ClassName.$objReference->ObjectDescription %>.class.php';
        <% } %>
        QApplication::$ClassFile['qqreversereferencenode<%= strtolower($objTable->ClassName)%>'] = __MODEL_DIR__.'<%= '/orm/generated/QQReverseReferenceNode'. $objTable->ClassName %>.class.php';
<% } %>
