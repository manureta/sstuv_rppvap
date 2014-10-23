<?php
class PageHomePanel extends QPanel {
    public $pnlNoticia;

    public function __construct($objParentObject, $strSetEditPanelMethod = null, $strCloseEditPanelMethod = null, $strControlId = null) {
        
        
        // Call the Parent
        try {
                parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
        }
        $this->Template = __VIEW_DIR__.'/page/home.tpl.php';
        $this->pnlNoticia = new QPanel($this);
        $this->pnlNoticia->Name = 'Noticias';        
        $this->pnlNoticia->Visible = false;
        //$arrNoticias = Noticia::LoadAll(QQ::OrderBy(QQN::Noticia()->Arriba, false, QQN::Noticia()->Fecha));     
        $arrNoticias = array();//Noticia::LoadAll(QQ::OrderBy(QQN::Noticia()->Arriba, false, QQN::Noticia()->Fecha));     
        $text = '<span style="font-weight:bold">NOTICIAS</span><br><br>';
        foreach($arrNoticias as $objNoticia){ 
            if(!$objNoticia->Mostrar) continue;
            $this->pnlNoticia->Visible = true;
            $text .= '<span style="font-size:x-small; color:dimgrey; font-weight:bold;">'.$objNoticia->Fecha. '</span><span style="color:dodgerblue;"> | </span> <span style="font-size:x-small; color:dimgrey;">Noticia ' .$objNoticia->IdNoticia.'</span><br><span style="font-weight:bold">'. "$objNoticia->Titulo </span><br>".'<span style="font-size:x-small; color:dimgrey;">'."$objNoticia->Texto</span><br><hr>";
        }
        $this->pnlNoticia->Text = $text;
    }

}
?>
