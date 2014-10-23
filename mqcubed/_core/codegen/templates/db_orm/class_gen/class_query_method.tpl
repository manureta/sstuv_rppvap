    protected static $arrQueryTextFields = array(
<% foreach ($objTable->ColumnArray as $objColumn) { %>
<% if (!($objColumn->Identity || $objColumn->Timestamp || $objColumn->PrimaryKey || $objColumn->Reference) && $objColumn->Indexed) { %>
        array("name"=>"<%= $objColumn->PropertyName %>","type"=>"<%= $objColumn->VariableType %>"),
<% } %><% } %>
    );

    public static function GetQueryTextConditions($strParameter){
        $arrCond = array();
        foreach (<%= $objTable->ClassName %>::$arrQueryTextFields as $arrCampo) {
            switch ($arrCampo['type']) {
                case QType::String:
                    $arrCond[] = QQ::Like(QQN::<%= $objTable->ClassName %>()->$arrCampo['name'], '%' . $strParameter . '%');
                    break;
                case QType::Integer:
                case QType::Float:
                    if(is_numeric($strParameter))
                        $arrCond[] = QQ::Equal(QQN::<%= $objTable->ClassName %>()->$arrCampo['name'], $strParameter);
                    break;
            }
        }
        switch (count($arrCond)) {
            case 0:
                throw new QCallerException('La clase <%= $objTable->ClassName %> no tiene definidos campos para la búsqueda de Autocomplete');
            case 1:
                return $arrCond[0];
            default:
                return QQ::OrCondition($arrCond);
        }
    }

