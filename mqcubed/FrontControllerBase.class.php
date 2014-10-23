<?php

// cosas que se comparten entre los FrontController de las distintas
// aplicaciones
abstract class FrontControllerBase extends QForm {
// polling stuff imported from qcodo official git at c03cddd5fc5a3cfdbf29
    private $pxyPollingProxy = null;
    private $intPollingInterval = null;
    private $strPollingMethod = null;
    private $objPollingParentObject = null;

    /**
     * Adds polling to the QForm
     * @param string $strMethodName name of the event handling method to be called 
     * @param object $objParentControl optional object that contains the method (uses the QForm if none is specified)
     * @param integer $intPollingInterval the interval (in ms) the polling will occur (optional, default is 2500ms)
     * @param string $strWaitIconId optional ControlId of the QWaitIcon wanted to show up during de call
     * @return void
     */
    public function SetPollingProcessor($strMethodName, $objParentControl = null, $intPollingInterval = 2500, $strWaitIconId = null) {
      if (!$this->pxyPollingProxy)
        $this->pxyPollingProxy = new QControlProxy($this, 'pxyPollingFor' . $this->strFormId);

      // Setup Values
      $this->intPollingInterval = $intPollingInterval;
      $this->strPollingMethod = $strMethodName;
      $this->objPollingParentObject = $objParentControl;

      // Setup the Control Proxy
      $this->pxyPollingProxy->RemoveAllActions(QClickEvent::EventName);
      $this->pxyPollingProxy->AddAction(new QClickEvent(), new QAjaxAction('Polling_Process'));

      // Make the JS Call
      QApplication::ExecuteJavascript(sprintf('qc.regPP("%s", %s, "%s");', $this->pxyPollingProxy->ControlId, $this->intPollingInterval, $strWaitIconId));
    }

    protected function Polling_Process($strFormId, $strControlId, $strParameter) {
      if ($this->strPollingMethod) {
        $objObject = ($this->objPollingParentObject) ? $this->objPollingParentObject : $this;
        $strMethod = $this->strPollingMethod;
        $objObject->$strMethod();
        if ($this->IsPollingActive()) 
            QApplication::ExecuteJavascript(sprintf('qc.regPP("%s", %s, "%s");', $this->pxyPollingProxy->ControlId, $this->intPollingInterval, $strParameter));
      }
    }

    /**
     * Returns whether or not Polling is currently active
     * @return boolean
     */
    public function IsPollingActive() {
      return (!is_null($this->strPollingMethod));
    }

    /**
     * Stops polling of polling processor
     * @return void
     */
    public function ClearPollingProcessor() {
      $this->strPollingMethod = null;
      $this->objPollingParentObject = null;
    }
    
    
    
}
?>
