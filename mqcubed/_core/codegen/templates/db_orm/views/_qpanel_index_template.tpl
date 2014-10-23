<template OverwriteFlag="true" DocrootFlag="false" DirectorySuffix="" TargetDirectory="<%= __PANEL_DRAFTS_VIEWS__ %>/<%= strtolower($objTable->ClassName) %>/generated" TargetFileName="<%= $objTable->ClassName %>IndexPanel.tpl.php"/>
	<?php $_CONTROL->dtg<%= $objTable->ClassNamePlural %>->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEdit<%=$objTable->ClassName%>) {
				$_CONTROL->pnlEdit<%=$objTable->ClassName%>->Render();
				} 
	?>
