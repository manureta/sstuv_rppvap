<?php

class ConflictosFolioPanel extends ConflictoHabitacionalEditPanel {

    public $strTitulo = 'Condflictos Habitacionales';
    public $strSubtitulo = '';


    public $objFolio;
    public $objConf;
    public $txtCodFolioOriginal;
    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {

        try {
            $this->objConf=ConflictoHabitacional::QuerySingle(QQ::Equal(QQN::ConflictoHabitacional()->IdFolio,QApplication::QueryString("id")));
            $editar_o_nuevo=!is_null($this->objConf)? $this->objConf->Id : null;
            parent::__construct($objParentObject,$strControlsArray,$editar_o_nuevo,QApplication::QueryString("id"));
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        if(Permission::EsDuplicado($this->objFolio->Id)){
          $this->txtCodFolioOriginal=Folio::load($this->objFolio->FolioOriginal)->CodFolio;
        }


    }
}
?>
