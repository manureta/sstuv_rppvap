<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo QApplication::$EncodingType; ?>">
    <title><?php echo $this->strPageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/css/estilos_qcodo.css">
    <link rel="stylesheet" type="text/css" href="<?php echo __VIRTUAL_DIRECTORY__; ?>/css/ra.css">
    <style>body {background: white}</style>
</head>
<body>
<?php $this->RenderBegin(); ?>
<?php $this->pnlAppController->Render(); ?>
<?php $this->RenderEnd(); ?>
</body>
</html>
