<?php 
/**
 * Base class for all jQuery-based effects.
 * 
 * @package Actions
 */
abstract class QJQAction extends QAction {
	protected $strControlId = null;
	protected $strMethod = null;
	
	protected function __construct(QControl $objControl, $strMethod) {
		$this->strControlId = $objControl->ControlId;
		$this->strMethod = QType::Cast($strMethod, QType::String);
		$this->setJavaScripts($objControl);
	}

	private function setJavaScripts($objControl) {
		$objControl->AddJavascriptFile('_core/jquery/jquery-1.3.2.min.js');
		$objControl->AddJavascriptFile('jquery-ui-1.7.2.custom/development-bundle/ui/effects.core.js');
		
		switch($this->strMethod) {
			case 'blind' :
			case 'bounce' :
			case 'clip' :
			case 'drop' :            
			case 'explode' :
			case 'fold' :
			case 'highlight' :                
			case 'scale':            
			case 'shake' :    
			case 'slide' :                                    
			case 'transfer' :
			case 'pulsate' :
				$objControl->AddJavascriptFile('jquery-ui-1.7.2.custom/development-bundle/ui/effects.' . $this->strMethod . '.js');
				break;

			// The following two effects have a dependency on the scale effect
			case 'puff':
			case 'size':
				$objControl->AddJavascriptFile('jquery-ui-1.7.2.custom/development-bundle/ui/effects.scale.js');
				break;
		}
	}
}
