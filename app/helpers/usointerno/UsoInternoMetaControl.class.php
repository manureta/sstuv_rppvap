<?php
class UsoInternoMetaControl extends UsoInternoMetaControlGen {
        /**
         * Create and setup QAjaxAutoCompleteEntidadTextBox lstEstadoFolioObject
         * @param string $strControlId optional ControlId to use
         * @return QAjaxAutoCompleteEntidadTextBox
         */
        public function lstEstadoFolioObject_Create($strControlId = null) {
            parent::lstEstadoFolioObject_Create($strControlId);
            $this->lstEstadoFolioObject->Name = QApplication::Translate('Estado del Folio');

            return $this->lstEstadoFolioObject;
        }


}
?>
