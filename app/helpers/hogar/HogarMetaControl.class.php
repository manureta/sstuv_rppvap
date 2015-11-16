<?php
class HogarMetaControl extends HogarMetaControlGen {


  public function lstOcupanteAsId_Create($strControlId = null) {

      $strConfigArray = array();
      $strConfigArray['strEntity'] = 'Ocupante';
      $strConfigArray['strRefreshMethod'] = 'OcupanteAsIdArray';
      $strConfigArray['strParentPrimaryKeyProperty'] = 'IdHogar';
      $strConfigArray['strPrimaryKeyProperty'] = 'Id';
      $strConfigArray['strAddMethod'] = 'AddOcupanteAsId';
      $strConfigArray['strRemoveMethod'] = 'RemoveOcupanteAsId';

      $strConfigArray['Columns'] = array();
      $strConfigArray['Columns']['Apellido'] = QApplication::Translate('Apellido');
      $strConfigArray['Columns']['Nombres'] = QApplication::Translate('Nombres');
      $strConfigArray['Columns']['Edad'] = QApplication::Translate('Edad');
      $strConfigArray['Columns']['Doc'] = QApplication::Translate('DNI');
      $strConfigArray['Columns']['Nacionalidad'] = QApplication::Translate('Nacionalidad');
      $strConfigArray['Columns']['Referente'] = QApplication::Translate('Referente');

      $this->lstOcupanteAsId = new QListPanel($this->objParentObject, $this->objHogar, $strConfigArray, $strControlId);
      $this->lstOcupanteAsId->Name = Ocupante::Noun();
      $this->lstOcupanteAsId->SetNewMethod($this, "lstOcupanteAsId_New");
      $this->lstOcupanteAsId->SetEditMethod($this, "lstOcupanteAsId_Edit");
      return $this->lstOcupanteAsId;
  }


}
?>
