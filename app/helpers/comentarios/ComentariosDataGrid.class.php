<?php
class ComentariosDataGrid extends ComentariosDataGridGen {


  public function __construct($objParentObject, $strColumnsArray = null, $strControlId = null) {
      parent::__construct($objParentObject, $strControlId);
  }

  protected function addAllColumns() {
      // Use the MetaDataGrid functionality to add Columns for this datagrid

      // Create the Columns (note that you can use strings for comentarios's properties, or you
      // can traverse down QQN::comentarios() to display fields that are down the hierarchy)
      if (ComentariosDataGrid::$strColumnsArray['Id']) $this->MetaAddColumn('Id')->Title = QApplication::Translate('Id');
      if (ComentariosDataGrid::$strColumnsArray['IdFolioObject']) $this->MetaAddColumn(QQN::Comentarios()->IdFolioObject)->Title = QApplication::Translate('IdFolioObject');
      if (ComentariosDataGrid::$strColumnsArray['IdUsuarioObject']) $this->MetaAddColumn(QQN::Comentarios()->IdUsuarioObject)->Title = QApplication::Translate('Autor');
      if (ComentariosDataGrid::$strColumnsArray['FechaCreacion'])$this->MetaAddColumn('FechaCreacion')->Title = QApplication::Translate('Fecha/Hora');
      if (ComentariosDataGrid::$strColumnsArray['FechaModificacion']) $this->MetaAddColumn('FechaModificacion')->Title = QApplication::Translate('Última Modificación');
      if (ComentariosDataGrid::$strColumnsArray['Comentario']) $this->MetaAddColumn('Comentario')->Title = QApplication::Translate('Comentario');
  }

  protected function ResolveContentItem($mixContent) {

    //Sobreescribo este metodo para cambiar como se muestran las fechas en el datagrid, de esta manera mueatra la hora tambien

    if ($mixContent instanceof QQNode) {
      if (!$mixContent->_ParentNode)
        throw new QCallerException('Content QQNode cannot be a Top Level Node');
      if ($mixContent->_RootTableName == 'comentarios') {
        if (($mixContent instanceof QQReverseReferenceNode) && !($mixContent->_PropertyName))
          throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
        $objCurrentNode = $mixContent;
        while ($objCurrentNode = $objCurrentNode->_ParentNode) {
          if (!($objCurrentNode instanceof QQNode))
            throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
          if (($objCurrentNode instanceof QQReverseReferenceNode) && !($objCurrentNode->_PropertyName))
            throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
        }
        return $mixContent;
      } else
        throw new QCallerException('Content QQNode has a root table of "' . $mixContent->_RootTableName . '". Must be a root of "comentarios".');
    } else if (is_string($mixContent)) switch ($mixContent) {
      case 'Id': return QQN::Comentarios()->Id;
      case 'IdFolio': return QQN::Comentarios()->IdFolio;
      case 'IdFolioObject': return QQN::Comentarios()->IdFolioObject;
      case 'IdUsuario': return QQN::Comentarios()->IdUsuario;
      case 'IdUsuarioObject': return QQN::Comentarios()->IdUsuarioObject;
      case 'FechaCreacion': return new QQNode('fecha_creacion', 'FechaCreacion', 'string', QQN::Comentarios());
      case 'FechaModificacion': return new QQNode('fecha_modificacion', 'FechaModificacion', 'string', QQN::Comentarios());
      case 'Comentario': return QQN::Comentarios()->Comentario;
      default: throw new QCallerException('Simple Property not found in ComentariosDataGrid content: ' . $mixContent);
    } else if ($mixContent instanceof QQAssociationNode)
      throw new QCallerException('Content QQNode cannot go through any "To Many" association nodes.');
    else
      throw new QCallerException('Invalid Content type');
  }



}
?>
