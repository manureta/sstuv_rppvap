<?php
/**
 * Este es un panel índice que hereda de TipoDatoValorIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class TipoDatoValorIndexPanel extends TipoDatoValorIndexPanelGen {

    public $strTitulo = 'TipoDatoValor';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'TipoDatoValor'
            );
    }

}
?>