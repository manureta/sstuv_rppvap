<?php
class ComentariosEditPanel extends ComentariosEditPanelGen {
    // Local instance of the ComentariosMetaControl
    public $mctComentarios;

    //id variables for meta_create
    protected $intId;

    //array de nombres de controles para omitir (poner en false antes de llamar al construct)
    public static $strControlsArray = array(
        'lblId' => false,
        'lstIdFolioObject' => true,
        'lstIdUsuarioObject' => true,
        'calFechaCreacion' => true,
        'calFechaModificacion' => true,
        'txtComentario' => true,
    );
    public $objFolio;
    public function __construct($objParentObject, $strControlsArray = null, $intId = null, $strControlId = null) {

        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlsArray , $intId , $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Template=__VIEW_DIR__."/comentarios/ComentariosEditPanel.tpl.php";
        $this->Form->RemoveControl($this->pnlTabs->ControlId, true);
        $this->objFolio=Folio::load(QApplication::QueryString("id"));
/*
       if(!Permission::EsCreador($this->objFolio)){
            foreach($this->objControlsArray as $objControl){
                $objControl->Enabled = false;
            }
        }
*/
    }

    protected function metaControl_Create($strControlsArray){
        // Construct the ComentariosMetaControl
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctComentarios = ComentariosMetaControl::Create($this, $this->intId);

        // Call MetaControl's methods to create qcontrols based on Comentarios's data fields
        if (in_array('lblId',$strControlsArray))
            $this->objControlsArray['lblId'] = $this->mctComentarios->lblId_Create();
        if (in_array('lstIdFolioObject',$strControlsArray))
            $this->objControlsArray['lstIdFolioObject'] = $this->mctComentarios->lstIdFolioObject_Create();
        if (in_array('lstIdUsuarioObject',$strControlsArray))
            $this->objControlsArray['lstIdUsuarioObject'] = $this->mctComentarios->lstIdUsuarioObject_Create();
        if (in_array('calFechaCreacion',$strControlsArray))
            $this->objControlsArray['calFechaCreacion'] = $this->mctComentarios->calFechaCreacion_Create();
        if (in_array('calFechaModificacion',$strControlsArray))
            $this->objControlsArray['calFechaModificacion'] = $this->mctComentarios->calFechaModificacion_Create();
        if (in_array('txtComentario',$strControlsArray))
            $this->objControlsArray['txtComentario'] = $this->mctComentarios->txtComentario_Create();

    }

    // Control AjaxAction Event Handlers
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //parent::btnSave_Click($strFormId, $strControlId, $strParameter);
        // Delegate "Save" processing to the ComentariosMetaControl
        $this->calFechaModificacion->DateTime=QDateTime::Now();
        $this->mctComentarios->Save();
        QApplication::DisplayNotification('Los datos se guardaron correctamente');
        QApplication::Redirect(__VIRTUAL_DIRECTORY__."/comentarios/folio/". $this->lstIdFolioObject->Value);

    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
      QApplication::Redirect(__VIRTUAL_DIRECTORY__."/comentarios/folio/". $this->lstIdFolioObject->Value);
    }


}
?>
