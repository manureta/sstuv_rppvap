drop table if exists migracion.folio;
create table migracion.folio as 
select 
oid as id,campo98 as cod_folio, campo1 as id_partido,campo2 as matricula,campo6 as fecha,campo11 as nombre_barrio_oficial,
campo12 as nombre_barrio_alternativo_1, campo13 as nombre_barrio_alternativo,campo14 as anio_origen, campo16 as cantidad_familias,
campo17 as tipo_barrio,campo18||'-'||campo19 as observacion_caso_dudoso,campo21 as direccion,campo20 as judicializado,
campo10 as localidad,1 as creador,campo15 as superficie, campo7 as encargado, campo8 as reparticion,'{}' as geom
from datos_folios_integrados; 

 