<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_VIEWS__ %>/<%= strtolower($objTable->ClassName) %>/generated" TargetFileName="<%=$objTable->ClassName%>ItemPanel.tpl.php"/>
<?php $_CONTROL->pnlRow->Render(); ?>
<?php $_CONTROL->pnl<%=$objTable->ClassName%>View->Render();?>