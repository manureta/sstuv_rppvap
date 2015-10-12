<?php
/**
 * Este es un panel índice que hereda de ComentariosIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 *
 */
class ComentariosFolioPanel extends ComentariosIndexPanel {

    public $strTitulo = '';
    public $strSubtitulo = '';

    public $btnSiguente;

    public $txtCodFolioOriginal;
    protected $objFolio;


    public function __construct($objParentObject, $strColumnsArray = null, $strControlsArray = null, $strControlId = null) {

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->Template=__VIEW_DIR__."/comentarios/ComentariosFolioPanel.tpl.php";
        $this->objFolio = Folio::Load(QApplication::QueryString("id"));
        $this->dtgComentarioses->AddCondition(QQ::Equal(QQN::Comentarios()->IdFolio,QApplication::QueryString("id")));
        $this->dtgComentarioses->ShowFilter=true;

        if(Permission::EsDuplicado($this->objFolio->Id)){
          $this->txtCodFolioOriginal=Folio::load($this->objFolio->FolioOriginal)->CodFolio;
        }
        $this->btnCreateNew->Text="Agregar Comentario";
        $this->blnAutoRenderChildren = false;
    }

    public function ComentariosEditPanel_Create($intId = null) {
        if (isset($this->pnlEditComentarios))
            $this->Form->RemoveControl($this->pnlEditComentarios->ControlId);

        $this->pnlEditComentarios = new ComentariosEditPanel($this, $this->strControlsArray, $intId);
        $this->pnlEditComentarios->lstIdFolioObject->Value = $this->objFolio->Id;
        $this->pnlEditComentarios->lstIdFolioObject->Text = $this->objFolio->__toString();
        $this->pnlEditComentarios->lstIdFolioObject->Enabled = false;
        if(is_null($intId)){
          $this->pnlEditComentarios->lstIdUsuarioObject->Value = Session::GetObjUsuario()->IdUsuario;
          $this->pnlEditComentarios->lstIdUsuarioObject->Text = Session::GetObjUsuario()->NombreCompleto;
          $this->pnlEditComentarios->calFechaCreacion->DateTime=QDateTime::Now();
        }
        $this->pnlEditComentarios->lstIdUsuarioObject->Enabled=false;
        
        $this->pnlEditComentarios->calFechaCreacion->Enabled=false;
        $this->pnlEditComentarios->calFechaCreacion->Visible=false;

        $this->pnlEditComentarios->calFechaModificacion->Enabled=false;
        $this->pnlEditComentarios->calFechaModificacion->Visible=false;

        return $this->pnlEditComentarios;
    }

}
?>
