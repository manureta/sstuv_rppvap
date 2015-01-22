alter table parcelas drop constraint enforce_srid_geom;
update parcelas set geom=st_transform(geom,4326);

drop view v_folios;
create view v_folios as select id as gid,st_geomfromtext(geom,4326) as the_geom from folio where geom<>'';

drop view if exists v_parcelas;
create view v_parcelas as select a.*,p.geom as the_geom from 
((SELECT 
n.id as gid,
n.estado_geografico,
 f.cod_folio,
 lpad(n.partido,3,'0')||
 lpad(n.circ,2,'0') || 
 lpad(n.secc,2,'0') || 
 lpad(n.chac_quinta,14,'0') || 
 lpad(n.frac,7,'0') || 
 lpad(n.mza,7,'0') || 
 lpad(n.parc,7,'0') as nomencla 
FROM nomenclatura n join folio f on n.id_folio=f.id)) as a join parcelas p on a.nomencla=p.nomencla;


drop view if exists v_caratulas;
create view v_caratulas as 
select
  cod_folio ,
  p.nombre as partido,
  localidad,
  matricula,
  fecha as fecha_carga ,
  nombre_barrio_oficial as nombre_oficial,
  tb.tipo,
  anio_origen,
  cantidad_familias,
  superficie,
  direccion ,
  encargado ,
  reparticion,
  (select opcion from opciones_infraestructura  where id=i.energia_electrica_medidor_individual) as energia_electrica_medidor_individual,
  (select opcion from opciones_infraestructura  where id=i.alumbrado_publico) as alumbrado_publico,
  (select opcion from opciones_infraestructura  where id=i.agua_corriente) as agua_corriente,
  (select opcion from opciones_infraestructura  where id=i.red_cloacal) as red_cloacal,
  (select opcion from opciones_infraestructura  where id=i.red_gas) as red_gas,
  (select opcion from opciones_infraestructura  where id=i.pavimento) as pavimento,
  (select  
	CASE  
	  WHEN no_corresponde_inscripcion THEN 'no_corresponde_inscripcion' 
	  WHEN length(resolucion_inscripcion_definitiva)>0 THEN 'inscripcion_definitiva'
	  WHEN length(resolucion_inscripcion_provisoria)>0 THEN 'inscripcion_provisoria'  
	  WHEN mapeo_preliminar THEN 'mapeo' 
	  ELSE '' 
	END as situacion_registral 
	from uso_interno where id_folio=f.id) as situacion_registral,
  (select num_expediente from uso_interno where id_folio=f.id) as num_expedientes,	
  st_geomfromtext(geom,4326) as the_geom
  from folio f 
  left join partido p on f.id_partido=p.id 
  left join tipo_barrio tb on f.tipo_barrio=tb.id
  left join infraestructura i on f.id=i.id_folio
  where f.geom <>'';