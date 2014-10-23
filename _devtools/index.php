<?php
	// Include prepend.inc to load QCubed
	require('../app/prepend.inc.php');	/* if you DO NOT have "includes/" in your include_path */
	// require('prepend.inc.php');				/* if you DO have "includes/" in your include_path */
?>
<html>
	<head>
		<title>QCubed Development Framework - Start Page</title>
		<style>
			TD, BODY { font: 12px <?php _p(QFontFamily::Verdana) ?>; }
			.title { font: 30px <?php _p(QFontFamily::Verdana) ?>; font-weight: bold; margin-left: -2px;}
			.title_action { font: 12px <?php _p(QFontFamily::Verdana) ?>; font-weight: bold; margin-bottom: -4px; }
			.item_divider { line-height: 16px; }
			.heading { font: 16px <?php _p(QFontFamily::Verdana) ?>; font-weight: bold; }
		</style>
	</head><body>	
		<div class="title_action">QCubed Development Framework <?= QCODO_VERSION ?></div>

		<ul class="title">
		<li><a href="codegen.php">codegen.php</a> - to code generate your tables</li>
		<li><a href="cuadroscodegen.php">cuadroscodegen.php</a> - GENERAR LOS CUADROS</li>
		</ul>
		
		For more information, please go to the QCubed website at: <a href="http://www.qcu.be/">http://www.qcu.be/</a>
		<br /><br /><br />

		<?php QApplication::VarDump(); ?>
	</body>
</html>
