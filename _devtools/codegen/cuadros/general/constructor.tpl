    public function  __construct() {

	$this->intIdDefinicionCuadro = <%= $objDefinicionCuadro->IdDefinicionCuadro %>;
	$this->strNombre = '<%= $objDefinicionCuadro->Nombre %>';
	$this->strNumero = '<%= $objDefinicionCuadro->Numero %>';
	$this->blnObligatorio = <%= ($objDefinicionCuadro->Obligatorio) ? 'true' : 'false' %>;
	$this->intCriterioCompletitud = CriterioCompletitudType::<%= CriterioCompletitudType::ToToken($objDefinicionCuadro->CCriterioCompletitud); %>;
	
	<% if ($objDefinicionCuadro->CantidadFilasPrecargadas) { %>
	$this->intCantidadFilasCrear = <%= $objDefinicionCuadro->CantidadFilasPrecargadas %>; //GENERADO
	<% } %>
    <% if ($objDefinicionCuadro->isFilasFijas()) { %>
        $this->strTituloFilas = '<%= $objDefinicionCuadro->TituloFilas %>';
    <% } %>
        try {
            parent::__construct();
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }
