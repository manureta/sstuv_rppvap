<?php
class HogarDataGrid extends HogarDataGridGen {
  //array de controles para omitir antes del construct
  public static $strColumnsArray = array(
      'Id' => false,
      'IdFolioObject' => false,
      'FechaAlta' => true,
      'Circ' => true,
      'Secc' => true,
      'Mz' => true,
      'Pc' => true,
      'Telefono' => false,
      'DeclaracionNoOcupacion' => false,
      'TipoDocAdj' => false,
      'DocTerreno' => false,
      'TipoBeneficio' => false,
      'FormaOcupacion' => false,
      'FechaIngreso' => false,
  );


}
?>
