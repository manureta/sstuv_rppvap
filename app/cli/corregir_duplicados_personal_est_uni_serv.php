<?php
require(dirname(__FILE__).'/../../app/Bootstrap.php');
Bootstrap::Initialize();

require(dirname(__FILE__).'/../../app/helpers/PersonalEstablecimientoUnidadServicioHelper.class.php');
PersonalEstablecimientoUnidadServicioHelper::MergearDuplicados();
