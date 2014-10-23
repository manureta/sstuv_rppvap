<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __MODEL_DIR__ %>/autoload/generated" TargetFileName="_class_paths_gen.inc.php"/>
<?php

<% foreach ($objTableArray as $objTable) { %>

    // ClassPaths for the <%= $objTable->ClassName %> class
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>indexpanelgen'] = __CONTROLLER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/generated/'. $objTable->ClassName %>IndexPanelGen.class.php';
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>editpanelgen'] = __CONTROLLER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/generated/'. $objTable->ClassName %>EditPanelGen.class.php';

    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>indexpanel'] = __CONTROLLER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/'. $objTable->ClassName %>IndexPanel.class.php';
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>editpanel'] = __CONTROLLER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/'. $objTable->ClassName %>EditPanel.class.php';

    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>modalpanel'] = __CONTROLLER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/'. $objTable->ClassName %>ModalPanel.class.php';
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>modalpanelgen'] = __CONTROLLER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/generated/'. $objTable->ClassName %>ModalPanelGen.class.php';

    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>datagridgen'] = __HELPER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/generated/'. $objTable->ClassName %>DataGridGen.class.php';
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>metacontrolgen'] = __HELPER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/generated/'. $objTable->ClassName %>MetaControlGen.class.php';
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>datagrid'] = __HELPER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/'. $objTable->ClassName %>DataGrid.class.php';
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>metacontrol'] = __HELPER_DIR__.'<%= '/'.strtolower($objTable->ClassName) .'/'. $objTable->ClassName %>MetaControl.class.php';

    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>gen'] = __MODEL_DIR__.'<%= '/orm/generated/'.$objTable->ClassName %>Gen.class.php';
    QApplication::$ClassFile['<%= strtolower($objTable->ClassName)%>'] = __MODEL_DIR__.'<%= '/orm/'.$objTable->ClassName %>.class.php';
    QApplication::$ClassFile['qqnode<%= strtolower($objTable->ClassName)%>'] = __MODEL_DIR__.'<%= '/orm/generated/QQNode'. $objTable->ClassName %>.class.php';
    <% foreach ($objTable->ManyToManyReferenceArray as $objReference) { %>
     QApplication::$ClassFile['qqnode<%= strtolower($objTable->ClassName.$objReference->ObjectDescription)%>'] = __MODEL_DIR__.'<%= '/orm/generated/QQNode'.$objTable->ClassName.$objReference->ObjectDescription %>.class.php';
    <% } %>
    QApplication::$ClassFile['qqreversereferencenode<%= strtolower($objTable->ClassName)%>'] = __MODEL_DIR__.'<%= '/orm/generated/QQReverseReferenceNode'. $objTable->ClassName %>.class.php';

<% } %>
