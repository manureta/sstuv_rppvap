<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __MODEL_DIR__ %>/autoload/generated" TargetFileName="_type_class_paths_gen.inc.php"/>
<?php
<% foreach ($objTableArray as $objTypeTable) { %>

                // ClassPaths for the <%= $objTypeTable->ClassName %> class
                QApplication::$ClassFile['<%= strtolower($objTypeTable->ClassName)%>gen'] = __MODEL_DIR__.'<%= '/orm/generated/'. $objTypeTable->ClassName %>Gen.class.php';
                QApplication::$ClassFile['<%= strtolower($objTypeTable->ClassName)%>'] = __MODEL_DIR__.'<%= '/orm/'. $objTypeTable->ClassName %>.class.php';
<% } %>