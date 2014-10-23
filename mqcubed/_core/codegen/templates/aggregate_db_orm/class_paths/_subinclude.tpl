<template OverwriteFlag="false" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __MODEL_DIR__ %>/autoload/" TargetFileName="_class_paths.inc.php"/>
<?php
require __MODEL_DIR__. '/autoload/generated/_class_paths_gen.inc.php';
// This file is where you should put your manually added files

QApplication::$ClassFile['errornotfoundpanel'] = __CONTROLLER_DIR__.'/error/ErrorNotfoundPanel.class.php';
QApplication::$ClassFile['pagehomepanel'] = __CONTROLLER_DIR__.'/page/PageHomePanel.class.php';
QApplication::$ClassFile['pagetestpanel'] = __CONTROLLER_DIR__.'/page/PageTestPanel.class.php';
QApplication::$ClassFile['qqn'] = __MODEL_DIR__.'/orm/generated/QQN.class.php';
