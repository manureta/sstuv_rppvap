<?php
/**
 * Este es un panel índice que hereda de CondicionesSocioUrbanisticasIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class CondicionesSocioUrbanisticasIndexPanel extends CondicionesSocioUrbanisticasIndexPanelGen {

    public $strTitulo = 'CondicionesSocioUrbanisticas';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'CondicionesSocioUrbanisticas'
            );
    }

}
?>