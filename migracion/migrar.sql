
-- Para la tabla de folio
drop table if exists migracion.folio;

--delete from datos_folios_integrados where campo98='ID_FOLIO';

--select min(oid::int)  from datos_folios_integrados ;

create table migracion.folio as 
select 
(oid::int - 937347) as id,campo98 as cod_folio, campo1 as id_partido,campo2 as matricula,campo6 as fecha,campo11 as nombre_barrio_oficial,
campo12 as nombre_barrio_alternativo_1, campo13 as nombre_barrio_alternativo_2,campo14 as anio_origen, campo16 as cantidad_familias,
campo17 as tipo_barrio,campo18||'-'||campo19 as observacion_caso_dudoso,campo21 as direccion,campo20 as judicializado,
campo10 as localidad,1 as creador,campo15 as superficie, campo7 as encargado, campo8 as reparticion,'geom'::text as geom
from datos_folios_integrados; 


-- ver los difernetes tipos
--select distinct(tipo_barrio),count(*) from migracion.folio group by tipo_barrio;
 -- ver los codigos de los tipos de barrios
 --select * from tipo_barrio;  

update migracion.folio set tipo_barrio=1 where tipo_barrio='Villa';
update migracion.folio set tipo_barrio=3 where tipo_barrio='sin dato';
update migracion.folio set tipo_barrio=2 where tipo_barrio='Asentamiento precario';
update migracion.folio set tipo_barrio=3 where tipo_barrio='Caso dudoso';
update migracion.folio set tipo_barrio=3 where tipo_barrio='Otro';

-- llenar los 0 a la izquierda hasta completar 7
 -- select distinct(length(cod_folio)) from migracion.folio; -- hay valores 5 6 7 8 pero la de 8 es la primera
update migracion.folio set cod_folio=lpad(cod_folio,7,'0');
update migracion.folio set id_partido=substring(cod_folio from 1 for 3);
update migracion.folio set matricula=substring(cod_folio from 4 for 4); 

--select distinct(anio_origen) from migracion.folio; -- hay un solo valor con fecha exacta
--select distinct(anio_origen) from migracion.folio where length(anio_origen)>4; --"2_AÑO" "28/01/2004" "19279"

update migracion.folio  set anio_origen='1979' where anio_origen='19279';
update migracion.folio set anio_origen='2004' where anio_origen ='28/01/2004';
update migracion.folio  set anio_origen='decada_1970' where anio_origen='decada del 70';
update migracion.folio  set anio_origen='decada_1990' where anio_origen='decada del 90';
update migracion.folio  set anio_origen='decada_1950' where anio_origen='decada del 50';
update migracion.folio  set anio_origen='decada_2000' where anio_origen='decada del 00';
update migracion.folio  set anio_origen='decada_1980' where anio_origen='decada del 80';
update migracion.folio  set anio_origen='decada_1960' where anio_origen='decada del 60';
update migracion.folio  set anio_origen='decada_1990' where anio_origen='decada del 90 ';
update migracion.folio  set anio_origen='decada_1980' where anio_origen='década del 80';
update migracion.folio  set anio_origen='90_o_anterior' where anio_origen='decada del 90 o anterior';
update migracion.folio  set anio_origen='1901' where anio_origen is null;


--select distinct(judicializado) from migracion.folio;  

update migracion.folio set judicializado='sin_dato' where judicializado ='Sin dato';
update migracion.folio set judicializado='no' where judicializado ='No';
update migracion.folio set judicializado='si' where judicializado ='Si';
update migracion.folio set judicializado='sin_dato' where judicializado ='sin dato';
update migracion.folio set judicializado='sin_dato' where judicializado IS NULL;


--select distinct(campo6) from datos_folios_integrados order by campo6 asc;

update migracion.folio set id_partido=(select id from partido where cod_partido=id_partido);

--select distinct(fecha) from migracion.folio where length(fecha) = 5;



update migracion.folio set fecha='01/08/2014' where  fecha='41852';
update migracion.folio set fecha='23/07/2014' where  fecha='41843';
update migracion.folio set fecha='12/11/2014' where  fecha='41955';
update migracion.folio set fecha='20/11/2014' where  fecha='41963';
update migracion.folio set fecha='11/11/2014' where  fecha='41954';
update migracion.folio set fecha='07/07/2014' where  fecha='41827';
update migracion.folio set fecha='28/11/2014' where  fecha='41971';
update migracion.folio set fecha='05/08/2014' where  fecha='41856';
update migracion.folio set fecha='11/08/2014' where  fecha='41862';
update migracion.folio set fecha='25/07/2014' where  fecha='41845';
update migracion.folio set fecha='26/08/2014' where  fecha='41877';
update migracion.folio set fecha='18/09/2014' where  fecha='41900';
update migracion.folio set fecha='11/09/2014' where  fecha='41893';
update migracion.folio set fecha='15/09/2014' where  fecha='41897';
update migracion.folio set fecha='09/09/2014' where  fecha='41891';
update migracion.folio set fecha='03/09/2014' where  fecha='41912';
update migracion.folio set fecha='27/11/2014' where  fecha='41970';
update migracion.folio set fecha='01/10/2014' where  fecha='41913';
update migracion.folio set fecha='18/07/2014' where  fecha='41838';
update migracion.folio set fecha='15/09/2004' where  fecha='38245';
update migracion.folio set fecha='26/11/2014' where  fecha='41969';
update migracion.folio set fecha='01/09/2014' where  fecha='41883';
update migracion.folio set fecha='04/11/2014' where  fecha='41947';
update migracion.folio set fecha='03/09/2014' where  fecha='41885';
update migracion.folio set fecha='10/10/2014' where  fecha='41922';
update migracion.folio set fecha='14/08/2014' where  fecha='41865';
update migracion.folio set fecha='30/07/2014' where  fecha='41850';
update migracion.folio set fecha='28/08/2014' where  fecha='41879';
update migracion.folio set fecha='30/10/2014' where  fecha='41942';

update migracion.folio set fecha='01/01/0001' where  fecha is null;


-- seteo el geom de una tabla previamente exportada
update migracion.folio set geom = (select astext from migracion.geoms  where id_folio=cod_folio);
-- hay 3 geom nulos , los pongo en ''
update migracion.folio set geom = ''  where geom is null;

-- cambio las comas de superficie en puntos
update migracion.folio  set superficie = replace(superficie, ',', '.');
-- hay un valor sin dato de cant familia y varios nulos
update migracion.folio  set cantidad_familias=0 where cantidad_familias ='Sin dato';
update migracion.folio  set cantidad_familias=0 where cantidad_familias is null;

-- los nombres de barrio son obligatorios
update migracion.folio set nombre_barrio_oficial='' where  nombre_barrio_oficial is null;

--select * from migracion.folio  order by id;

-- INSERTAR EN LA TABLA POSTA
	truncate folio cascade;
	INSERT INTO folio(
		select id, cod_folio, id_partido::int, matricula, fecha::DATE, nombre_barrio_oficial, 
		    nombre_barrio_alternativo_1, nombre_barrio_alternativo_2, anio_origen, 
		    cantidad_familias::int, tipo_barrio::int, observacion_caso_dudoso, direccion, 
		    geom, judicializado, localidad, creador, superficie::numeric, encargado, 
		    reparticion from migracion.folio where id<>0
	);
---------------------------------------------------------------------------------------------------------------------------


-- Tabla para condiciones socio-urb

drop table if exists migracion.condiciones_socio_urbanisticas;

create table migracion.condiciones_socio_urbanisticas as 
select
campo98 as id_folio, campo27 as espacio_libre_comun, campo50 as presencia_org_sociales, 
campo51 as nombre_refernte, campo52 as telefono_referente
from datos_folios_integrados;

update migracion.condiciones_socio_urbanisticas set espacio_libre_comun=TRUE where espacio_libre_comun='Si';
update migracion.condiciones_socio_urbanisticas set espacio_libre_comun=FALSE where espacio_libre_comun='Sin dato';
update migracion.condiciones_socio_urbanisticas set espacio_libre_comun=FALSE where espacio_libre_comun='No';
update migracion.condiciones_socio_urbanisticas set espacio_libre_comun=FALSE where espacio_libre_comun='No consigna';
update migracion.condiciones_socio_urbanisticas set espacio_libre_comun=FALSE where espacio_libre_comun IS NULL;

update migracion.condiciones_socio_urbanisticas set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));

-- INSERTAR 
INSERT INTO condiciones_socio_urbanisticas (
id_folio, espacio_libre_comun, presencia_org_sociales, nombre_refernte, telefono_referente
)
select id_folio::int, espacio_libre_comun::boolean, presencia_org_sociales, nombre_refernte, 
            telefono_referente from migracion.condiciones_socio_urbanisticas  where id_folio is not null;





----------------------------------------------------------------------------------------------------------------


-- Tabla para Equipamiento


drop table if exists migracion.equipamiento;

create table migracion.equipamiento as 
select
campo98 as id_folio, campo28 as unidad_sanitaria, campo29 as jardin_infantes, campo30 as escuela_primaria, campo31 as escuela_secundaria, campo32 as comedor, 
campo33 as centro_integracion_comunitaria, campo34 as otro from datos_folios_integrados;

update migracion.equipamiento set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));


-- ver los difernetes tipo unidad_sanitaria
--select distinct(unidad_sanitaria),count(*) from migracion.equipamiento group by unidad_sanitaria;

 -- ver los codigos de equipamiento
 

update migracion.equipamiento set unidad_sanitaria=1 where unidad_sanitaria='Dentro del barrio';
update migracion.equipamiento set unidad_sanitaria=2 where unidad_sanitaria='Próximo al barrio';
update migracion.equipamiento set unidad_sanitaria=3 where unidad_sanitaria='Distante > 1 km';
update migracion.equipamiento set unidad_sanitaria=4 where unidad_sanitaria='Inexistente';
update migracion.equipamiento set unidad_sanitaria=5 where unidad_sanitaria='Sin dato';
update migracion.equipamiento set unidad_sanitaria=4 where unidad_sanitaria='No existe';
update migracion.equipamiento set unidad_sanitaria=5 where unidad_sanitaria IS NULL;



-- ver los difernetes tipo jardin_infantes
--select distinct(jardin_infantes),count(*) from migracion.equipamiento group by jardin_infantes;

 -- ver los codigos de equipamiento
 

update migracion.equipamiento set jardin_infantes=1 where jardin_infantes='Dentro del barrio';
update migracion.equipamiento set jardin_infantes=2 where jardin_infantes='Próximo al barrio';
update migracion.equipamiento set jardin_infantes=3 where jardin_infantes='Distante > 1 km';
update migracion.equipamiento set jardin_infantes=4 where jardin_infantes='Inexistente';
update migracion.equipamiento set jardin_infantes=5 where jardin_infantes='Sin dato';
update migracion.equipamiento set jardin_infantes=4 where jardin_infantes='No existe';
update migracion.equipamiento set jardin_infantes=5 where jardin_infantes IS NULL;


-- ver los difernetes tipo escuela_primaria
--select distinct(escuela_primaria),count(*) from migracion.equipamiento group by escuela_primaria;

 -- ver los codigos de equipamiento
 

update migracion.equipamiento set escuela_primaria=1 where escuela_primaria='Dentro del barrio';
update migracion.equipamiento set escuela_primaria=2 where escuela_primaria='Próximo al barrio';
update migracion.equipamiento set escuela_primaria=3 where escuela_primaria='Distante > 1 km';
update migracion.equipamiento set escuela_primaria=4 where escuela_primaria='Inexistente';
update migracion.equipamiento set escuela_primaria=5 where escuela_primaria='Sin dato';
update migracion.equipamiento set escuela_primaria=4 where escuela_primaria='No existe';
update migracion.equipamiento set escuela_primaria=5 where escuela_primaria IS NULL;


-- ver los difernetes tipo escuela_secundaria
--select distinct(escuela_secundaria),count(*) from migracion.equipamiento group by escuela_secundaria;

 -- ver los codigos de equipamiento
 

update migracion.equipamiento set escuela_secundaria=1 where escuela_secundaria='Dentro del barrio';
update migracion.equipamiento set escuela_secundaria=2 where escuela_secundaria='Próximo al barrio';
update migracion.equipamiento set escuela_secundaria=3 where escuela_secundaria='Distante > 1 km';
update migracion.equipamiento set escuela_secundaria=4 where escuela_secundaria='Inexistente';
update migracion.equipamiento set escuela_secundaria=5 where escuela_secundaria='Sin dato';
update migracion.equipamiento set escuela_secundaria=4 where escuela_secundaria='No existe';
update migracion.equipamiento set escuela_secundaria=5 where escuela_secundaria IS NULL;


-- ver los difernetes tipo comedor

--select distinct(comedor),count(*) from migracion.equipamiento group by comedor;

 -- ver los codigos de equipamiento
 

update migracion.equipamiento set comedor=1 where comedor='Dentro del barrio';
update migracion.equipamiento set comedor=2 where comedor='Próximo al barrio';
update migracion.equipamiento set comedor=3 where comedor='Distante > 1 km';
update migracion.equipamiento set comedor=4 where comedor='Inexistente';
update migracion.equipamiento set comedor=5 where comedor='Sin dato';
update migracion.equipamiento set comedor=4 where comedor='No existe';
update migracion.equipamiento set comedor=5 where comedor IS NULL;


-- ver los difernetes tipo CIC

--select distinct(centro_integracion_comunitaria),count(*) from migracion.equipamiento group by centro_integracion_comunitaria;

 -- ver los codigos de equipamiento
 

update migracion.equipamiento set centro_integracion_comunitaria=1 where centro_integracion_comunitaria='Dentro del barrio';
update migracion.equipamiento set centro_integracion_comunitaria=2 where centro_integracion_comunitaria='Próximo al barrio';
update migracion.equipamiento set centro_integracion_comunitaria=3 where centro_integracion_comunitaria='Distante > 1 km';
update migracion.equipamiento set centro_integracion_comunitaria=4 where centro_integracion_comunitaria='Inexistente';
update migracion.equipamiento set centro_integracion_comunitaria=5 where centro_integracion_comunitaria='Sin dato';
update migracion.equipamiento set centro_integracion_comunitaria=4 where centro_integracion_comunitaria='No existe';
update migracion.equipamiento set centro_integracion_comunitaria=5 where centro_integracion_comunitaria IS NULL;


--INSERTAR EN EQUIPAMIENTO
INSERT INTO equipamiento(
            id_folio, unidad_sanitaria, jardin_infantes, escuela_primaria, 
            escuela_secundaria, comedor, centro_integracion_comunitaria, 
            otro)
    select id_folio::int, unidad_sanitaria::int, jardin_infantes::int, escuela_primaria::int, 
            escuela_secundaria::int, comedor::int, centro_integracion_comunitaria::int, 
            otro from migracion.equipamiento  where id_folio is not null;

--------------------------------------------------------------------------------------------------------------------------



-- Tabla para Transporte

drop table if exists migracion.transporte;

create table migracion.transporte as 
select
campo98 as id_folio, campo35 as colectivos, campo36 as ferrocarril, campo37 as remis_combis from datos_folios_integrados;

update migracion.transporte set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));

-- colectivos


update migracion.transporte set colectivos=1 where colectivos= 'Dentro del barrio';
update migracion.transporte set colectivos=2 where colectivos='Próximo al barrio';
update migracion.transporte set colectivos=3 where colectivos='Distante > 1 km';
update migracion.transporte set colectivos=4 where colectivos='Inexistente';
update migracion.transporte set colectivos=5 where colectivos='Sin dato';
update migracion.transporte set colectivos=4 where colectivos='No existe';
update migracion.transporte set colectivos=5 where colectivos IS NULL;


-- ffcc

update migracion.transporte set ferrocarril=1 where ferrocarril='Dentro del barrio';
update migracion.transporte set ferrocarril=2 where ferrocarril='Próximo al barrio';
update migracion.transporte set ferrocarril=3 where ferrocarril='Distante > 1 km';
update migracion.transporte set ferrocarril=4 where ferrocarril='Inexistente';
update migracion.transporte set ferrocarril=5 where ferrocarril='Sin dato';
update migracion.transporte set ferrocarril=4 where ferrocarril='No existe';
update migracion.transporte set ferrocarril=5 where ferrocarril IS NULL;


-- remis/combis

update migracion.transporte set remis_combis=1 where remis_combis='Dentro del barrio';
update migracion.transporte set remis_combis=2 where remis_combis='Próximo al barrio';
update migracion.transporte set remis_combis=3 where remis_combis='Distante > 1 km';
update migracion.transporte set remis_combis=4 where remis_combis='Inexistente';
update migracion.transporte set remis_combis=5 where remis_combis='Sin dato';
update migracion.transporte set remis_combis=4 where remis_combis='No existe';
update migracion.transporte set remis_combis=5 where remis_combis IS NULL;


-- INSERTAR TRSNPORTE
INSERT INTO transporte(
            id_folio, colectivos, ferrocarril, remis_combis)
    select id_folio::int, colectivos::int, ferrocarril::int, remis_combis::int from migracion.transporte  where id_folio is not null;

------------------------------------------------------------------------------------------------------------------------------------




-- Tabla para infraesctructura


drop table if exists migracion.infraestructura;

create table migracion.infraestructura as 
select

campo98 as id_folio, campo38 as energia_electrica_medidor_individual, campo39 as energia_electrica_medidor_colectivo, campo40 as alumbrado_publico, campo41 as agua_corriente, campo42 as agua_potable, campo43 as red_cloacal, campo44 as sist_alternativo_eliminacion_excretas, campo45 as red_gas,
campo46 as pavimento, campo47 as cordon_cuneta, campo48 as desagues_pluviales, campo49 as recoleccion_residuos from datos_folios_integrados;

update migracion.infraestructura set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));


-- medidor individual


update migracion.infraestructura set energia_electrica_medidor_individual=1 where energia_electrica_medidor_individual='Inexistente';
update migracion.infraestructura set energia_electrica_medidor_individual=1 where energia_electrica_medidor_individual='inexistente';
update migracion.infraestructura set energia_electrica_medidor_individual=2 where energia_electrica_medidor_individual='Cobertura parcial';
update migracion.infraestructura set energia_electrica_medidor_individual=2 where energia_electrica_medidor_individual='Cobertura Parcial';
update migracion.infraestructura set energia_electrica_medidor_individual=3 where energia_electrica_medidor_individual='Cobertura total';
update migracion.infraestructura set energia_electrica_medidor_individual=3 where energia_electrica_medidor_individual='Cobertura Total';
update migracion.infraestructura set energia_electrica_medidor_individual=4 where energia_electrica_medidor_individual='Sin dato';
update migracion.infraestructura set energia_electrica_medidor_individual=4 where energia_electrica_medidor_individual='sin dato';
update migracion.infraestructura set energia_electrica_medidor_individual=4 where energia_electrica_medidor_individual IS NULL;


-- medidor colectivo


update migracion.infraestructura set energia_electrica_medidor_colectivo=1 where energia_electrica_medidor_colectivo='Inexistente';
update migracion.infraestructura set energia_electrica_medidor_colectivo=1 where energia_electrica_medidor_colectivo='inexistente';
update migracion.infraestructura set energia_electrica_medidor_colectivo=2 where energia_electrica_medidor_colectivo='Cobertura parcial';
update migracion.infraestructura set energia_electrica_medidor_colectivo=2 where energia_electrica_medidor_colectivo='Cobertura Parcial';
update migracion.infraestructura set energia_electrica_medidor_colectivo=3 where energia_electrica_medidor_colectivo='Cobertura total';
update migracion.infraestructura set energia_electrica_medidor_colectivo=3 where energia_electrica_medidor_colectivo='Cobertura Total';
update migracion.infraestructura set energia_electrica_medidor_colectivo=4 where energia_electrica_medidor_colectivo='Sin dato';
update migracion.infraestructura set energia_electrica_medidor_colectivo=4 where energia_electrica_medidor_colectivo='sin dato';
update migracion.infraestructura set energia_electrica_medidor_colectivo=4 where energia_electrica_medidor_colectivo IS NULL;




-- alumbrado publico


update migracion.infraestructura set alumbrado_publico=1 where alumbrado_publico='Inexistente';
update migracion.infraestructura set alumbrado_publico=1 where alumbrado_publico='inexistente';
update migracion.infraestructura set alumbrado_publico=2 where alumbrado_publico='Cobertura parcial';
update migracion.infraestructura set alumbrado_publico=2 where alumbrado_publico='Cobertura Parcial';
update migracion.infraestructura set alumbrado_publico=3 where alumbrado_publico='Cobertura total';
update migracion.infraestructura set alumbrado_publico=3 where alumbrado_publico='Cobertura Total';
update migracion.infraestructura set alumbrado_publico=4 where alumbrado_publico='Sin dato';
update migracion.infraestructura set alumbrado_publico=4 where alumbrado_publico='sin dato';
update migracion.infraestructura set alumbrado_publico=4 where alumbrado_publico IS NULL;




-- agua corriente


update migracion.infraestructura  set agua_corriente=1 where agua_corriente='Inexistente';
update migracion.infraestructura  set agua_corriente=1 where agua_corriente='inexistente';
update migracion.infraestructura  set agua_corriente=2 where agua_corriente='Cobertura parcial';
update migracion.infraestructura  set agua_corriente=2 where agua_corriente='Cobertura Parcial';
update migracion.infraestructura  set agua_corriente=3 where agua_corriente='Cobertura total';
update migracion.infraestructura  set agua_corriente=3 where agua_corriente='Cobertura Total';
update migracion.infraestructura  set agua_corriente=4 where agua_corriente='Sin dato';
update migracion.infraestructura  set agua_corriente=4 where agua_corriente='sin dato';
update migracion.infraestructura  set agua_corriente=4 where agua_corriente IS NULL;



-- agua potable


update migracion.infraestructura  set agua_potable=1 where agua_potable='Inexistente';
update migracion.infraestructura  set agua_potable=1 where agua_potable='inexistente';
update migracion.infraestructura  set agua_potable=2 where agua_potable='Cobertura parcial';
update migracion.infraestructura  set agua_potable=2 where agua_potable='Cobertura Parcial';
update migracion.infraestructura  set agua_potable=3 where agua_potable='Cobertura total';
update migracion.infraestructura  set agua_potable=3 where agua_potable='Cobertura Total';
update migracion.infraestructura  set agua_potable=4 where agua_potable='Sin dato';
update migracion.infraestructura  set agua_potable=4 where agua_potable='sin dato';
update migracion.infraestructura  set agua_potable=4 where agua_potable IS NULL;



-- cloacal


update migracion.infraestructura  set red_cloacal=1 where red_cloacal='Inexistente';
update migracion.infraestructura  set red_cloacal=1 where red_cloacal='inexistente';
update migracion.infraestructura  set red_cloacal=2 where red_cloacal='Cobertura parcial';
update migracion.infraestructura  set red_cloacal=2 where red_cloacal='Cobertura Parcial';
update migracion.infraestructura  set red_cloacal=3 where red_cloacal='Cobertura total';
update migracion.infraestructura  set red_cloacal=3 where red_cloacal='Cobertura Total';
update migracion.infraestructura  set red_cloacal=4 where red_cloacal='Sin dato';
update migracion.infraestructura  set red_cloacal=4 where red_cloacal='sin dato';
update migracion.infraestructura  set red_cloacal=4 where red_cloacal IS NULL;



-- sistema excreta


update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=1 where sist_alternativo_eliminacion_excretas='Inexistente';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=1 where sist_alternativo_eliminacion_excretas='inexistente';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=2 where sist_alternativo_eliminacion_excretas='Cobertura parcial';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=2 where sist_alternativo_eliminacion_excretas='Cobertura Parcial';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=3 where sist_alternativo_eliminacion_excretas='Cobertura total';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=3 where sist_alternativo_eliminacion_excretas='Cobertura Total';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=4 where sist_alternativo_eliminacion_excretas='Sin dato';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=4 where sist_alternativo_eliminacion_excretas='sin dato';
update migracion.infraestructura  set sist_alternativo_eliminacion_excretas=4 where sist_alternativo_eliminacion_excretas IS NULL;



-- gas


update migracion.infraestructura  set red_gas=1 where red_gas='Inexistente';
update migracion.infraestructura  set red_gas=1 where red_gas='inexistente';
update migracion.infraestructura  set red_gas=2 where red_gas='Cobertura parcial';
update migracion.infraestructura  set red_gas=2 where red_gas='Cobertura Parcial';
update migracion.infraestructura  set red_gas=3 where red_gas='Cobertura total';
update migracion.infraestructura  set red_gas=3 where red_gas='Cobertura Total';
update migracion.infraestructura  set red_gas=4 where red_gas='Sin dato';
update migracion.infraestructura  set red_gas=4 where red_gas='sin dato';
update migracion.infraestructura  set red_gas=4 where red_gas IS NULL;



-- pavimento


update migracion.infraestructura  set pavimento=1 where pavimento='Inexistente';
update migracion.infraestructura  set pavimento=1 where pavimento='inexistente';
update migracion.infraestructura  set pavimento=2 where pavimento='Cobertura parcial';
update migracion.infraestructura  set pavimento=2 where pavimento='Cobertura Parcial';
update migracion.infraestructura  set pavimento=3 where pavimento='Cobertura total';
update migracion.infraestructura  set pavimento=3 where pavimento='Cobertura Total';
update migracion.infraestructura  set pavimento=4 where pavimento='Sin dato';
update migracion.infraestructura  set pavimento=4 where pavimento='sin dato';
update migracion.infraestructura  set pavimento=4 where pavimento IS NULL;




-- cordon_cuneta


update migracion.infraestructura  set cordon_cuneta=1 where cordon_cuneta='Inexistente';
update migracion.infraestructura  set cordon_cuneta=1 where cordon_cuneta='inexistente';
update migracion.infraestructura  set cordon_cuneta=2 where cordon_cuneta='Cobertura parcial';
update migracion.infraestructura  set cordon_cuneta=2 where cordon_cuneta='Cobertura Parcial';
update migracion.infraestructura  set cordon_cuneta=3 where cordon_cuneta='Cobertura total';
update migracion.infraestructura  set cordon_cuneta=3 where cordon_cuneta='Cobertura Total';
update migracion.infraestructura  set cordon_cuneta=4 where cordon_cuneta='Sin dato';
update migracion.infraestructura  set cordon_cuneta=4 where cordon_cuneta='sin dato';
update migracion.infraestructura  set cordon_cuneta=4 where cordon_cuneta IS NULL;




-- deagues pluviales


update migracion.infraestructura  set desagues_pluviales=1 where desagues_pluviales='Inexistente';
update migracion.infraestructura  set desagues_pluviales=1 where desagues_pluviales='inexistente';
update migracion.infraestructura  set desagues_pluviales=2 where desagues_pluviales='Cobertura parcial';
update migracion.infraestructura  set desagues_pluviales=2 where desagues_pluviales='Cobertura Parcial';
update migracion.infraestructura  set desagues_pluviales=3 where desagues_pluviales='Cobertura total';
update migracion.infraestructura  set desagues_pluviales=3 where desagues_pluviales='Cobertura Total';
update migracion.infraestructura  set desagues_pluviales=4 where desagues_pluviales='Sin dato';
update migracion.infraestructura  set desagues_pluviales=4 where desagues_pluviales='sin dato';
update migracion.infraestructura  set desagues_pluviales=4 where desagues_pluviales IS NULL;





-- recoleccion residuos


update migracion.infraestructura  set recoleccion_residuos=1 where recoleccion_residuos='Inexistente';
update migracion.infraestructura  set recoleccion_residuos=1 where recoleccion_residuos='inexistente';
update migracion.infraestructura  set recoleccion_residuos=2 where recoleccion_residuos='Cobertura parcial';
update migracion.infraestructura  set recoleccion_residuos=2 where recoleccion_residuos='Cobertura Parcial';
update migracion.infraestructura  set recoleccion_residuos=3 where recoleccion_residuos='Cobertura total';
update migracion.infraestructura  set recoleccion_residuos=3 where recoleccion_residuos='Cobertura Total';
update migracion.infraestructura  set recoleccion_residuos=4 where recoleccion_residuos='Sin dato';
update migracion.infraestructura  set recoleccion_residuos=4 where recoleccion_residuos='sin dato';
update migracion.infraestructura  set recoleccion_residuos=4 where recoleccion_residuos IS NULL;

--INSERTAR EN INFRAESTRUCTURA

INSERT INTO infraestructura(
            id_folio, energia_electrica_medidor_individual, energia_electrica_medidor_colectivo, 
            alumbrado_publico, agua_corriente, agua_potable, red_cloacal, 
            sist_alternativo_eliminacion_excretas, red_gas, pavimento, cordon_cuneta, 
            desagues_pluviales, recoleccion_residuos)
    select id_folio::int, energia_electrica_medidor_individual::int, energia_electrica_medidor_colectivo::int, 
            alumbrado_publico::int, agua_corriente::int, agua_potable::int, red_cloacal::int, 
            sist_alternativo_eliminacion_excretas::int, red_gas::int, pavimento::int, cordon_cuneta::int, 
            desagues_pluviales::int, recoleccion_residuos::int
	from migracion.infraestructura where id_folio is not null;

----------------------------------------------------------------------------------------------------------------------	


-- situacion ambiental

drop table if exists migracion.situacion_ambiental;

create table migracion.situacion_ambiental as 
select

campo98 as id_folio, campo53 as sin_problemas, campo54 as reserva_electroducto, campo55 as inundable, campo56 as sobre_terraplen_ferroviario, campo57 as sobre_camino_sirga, campo58 as expuesto_contaminacion_industrial, campo59 as sobre_suelo_degradado, 
campo60 as otro from datos_folios_integrados;

update migracion.situacion_ambiental set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));


-- sin_problemas

update migracion.situacion_ambiental set sin_problemas=TRUE where sin_problemas='Si';
update migracion.situacion_ambiental set sin_problemas=TRUE where sin_problemas='si';
update migracion.situacion_ambiental set sin_problemas=TRUE where sin_problemas='SI';
update migracion.situacion_ambiental set sin_problemas=FALSE where sin_problemas='No';
update migracion.situacion_ambiental set sin_problemas=FALSE where sin_problemas='no';
update migracion.situacion_ambiental set sin_problemas=FALSE where sin_problemas='Sin dato';

-- reserva_electroducto

update migracion.situacion_ambiental set reserva_electroducto=TRUE where reserva_electroducto='Si';
update migracion.situacion_ambiental set reserva_electroducto=TRUE where reserva_electroducto='si';
update migracion.situacion_ambiental set reserva_electroducto=TRUE where reserva_electroducto='SI';
update migracion.situacion_ambiental set reserva_electroducto=FALSE where reserva_electroducto='No';
update migracion.situacion_ambiental set reserva_electroducto=FALSE where reserva_electroducto='no';
update migracion.situacion_ambiental set reserva_electroducto=FALSE where reserva_electroducto='Sin dato';

-- inundable

update migracion.situacion_ambiental set inundable=TRUE where inundable='Si';
update migracion.situacion_ambiental set inundable=TRUE where inundable='si';
update migracion.situacion_ambiental set inundable=TRUE where inundable='SI';
update migracion.situacion_ambiental set inundable=FALSE where inundable='No';
update migracion.situacion_ambiental set inundable=FALSE where inundable='no';
update migracion.situacion_ambiental set inundable=FALSE where inundable='Sin dato';

--sobre_terraplen_ferroviario

update migracion.situacion_ambiental set sobre_terraplen_ferroviario=TRUE where sobre_terraplen_ferroviario='Si';
update migracion.situacion_ambiental set sobre_terraplen_ferroviario=TRUE where sobre_terraplen_ferroviario='si';
update migracion.situacion_ambiental set sobre_terraplen_ferroviario=TRUE where sobre_terraplen_ferroviario='SI';
update migracion.situacion_ambiental set sobre_terraplen_ferroviario=FALSE where sobre_terraplen_ferroviario='No';
update migracion.situacion_ambiental set sobre_terraplen_ferroviario=FALSE where sobre_terraplen_ferroviario='no';
update migracion.situacion_ambiental set sobre_terraplen_ferroviario=FALSE where sobre_terraplen_ferroviario='Sin dato';


--sobre_camino_sirga

update migracion.situacion_ambiental set sobre_camino_sirga=TRUE where sobre_camino_sirga='Si';
update migracion.situacion_ambiental set sobre_camino_sirga=TRUE where sobre_camino_sirga='si';
update migracion.situacion_ambiental set sobre_camino_sirga=TRUE where sobre_camino_sirga='SI';
update migracion.situacion_ambiental set sobre_camino_sirga=FALSE where sobre_camino_sirga='No';
update migracion.situacion_ambiental set sobre_camino_sirga=FALSE where sobre_camino_sirga='no';
update migracion.situacion_ambiental set sobre_camino_sirga=FALSE where sobre_camino_sirga='Sin dato';


--expuesto_contaminacion_industrial

update migracion.situacion_ambiental set expuesto_contaminacion_industrial=TRUE where expuesto_contaminacion_industrial='Si';
update migracion.situacion_ambiental set expuesto_contaminacion_industrial=TRUE where expuesto_contaminacion_industrial='si';
update migracion.situacion_ambiental set expuesto_contaminacion_industrial=TRUE where expuesto_contaminacion_industrial='SI';
update migracion.situacion_ambiental set expuesto_contaminacion_industrial=FALSE where expuesto_contaminacion_industrial='No';
update migracion.situacion_ambiental set expuesto_contaminacion_industrial=FALSE where expuesto_contaminacion_industrial='no';
update migracion.situacion_ambiental set expuesto_contaminacion_industrial=FALSE where expuesto_contaminacion_industrial='Sin dato';



--sobre_suelo_degradado

update migracion.situacion_ambiental set sobre_suelo_degradado=TRUE where sobre_suelo_degradado='Si';
update migracion.situacion_ambiental set sobre_suelo_degradado=TRUE where sobre_suelo_degradado='si';
update migracion.situacion_ambiental set sobre_suelo_degradado=TRUE where sobre_suelo_degradado='SI';
update migracion.situacion_ambiental set sobre_suelo_degradado=FALSE where sobre_suelo_degradado='No';
update migracion.situacion_ambiental set sobre_suelo_degradado=FALSE where sobre_suelo_degradado='no';
update migracion.situacion_ambiental set sobre_suelo_degradado=FALSE where sobre_suelo_degradado='Sin dato';
update migracion.situacion_ambiental set sobre_suelo_degradado=FALSE where sobre_suelo_degradado='sin dato';


-- INSERTAR

INSERT INTO situacion_ambiental(
            id_folio, sin_problemas, reserva_electroducto, inundable, 
            sobre_terraplen_ferroviario, sobre_camino_sirga, expuesto_contaminacion_industrial, 
            sobre_suelo_degradado, otro)
   select 
            id_folio::int, sin_problemas::boolean, reserva_electroducto::boolean, inundable::boolean, 
            sobre_terraplen_ferroviario::boolean, sobre_camino_sirga::boolean, expuesto_contaminacion_industrial::boolean, 
            sobre_suelo_degradado::boolean, otro from migracion.situacion_ambiental  where id_folio is not null;


--------------------------------------------------------------------------------------------------------------------

  
-- Tabla para regularizaciones


drop table if exists migracion.regularizacion;

create table migracion.regularizacion as 
select
campo98 as id_folio, campo65 as proceso_iniciado, campo97 as observaciones from datos_folios_integrados;

update migracion.regularizacion set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));

--proceso iniciado


update migracion.regularizacion set proceso_iniciado=TRUE where proceso_iniciado='Si';
update migracion.regularizacion set proceso_iniciado=TRUE where proceso_iniciado='si';
update migracion.regularizacion set proceso_iniciado=TRUE where proceso_iniciado='SI';
update migracion.regularizacion set proceso_iniciado=FALSE where proceso_iniciado='No';
update migracion.regularizacion set proceso_iniciado=FALSE where proceso_iniciado='no';
update migracion.regularizacion set proceso_iniciado=FALSE where proceso_iniciado='Sin dato';
update migracion.regularizacion set proceso_iniciado=FALSE where proceso_iniciado is null;

--INSERTAR

INSERT INTO regularizacion(
             id_folio, proceso_iniciado, observaciones)
    select id_folio::int, proceso_iniciado::boolean, observaciones from migracion.regularizacion  where id_folio is not null;


---------------------------------------------------------------------------------------------------------------



-- Tabla para encuadre legal


drop table if exists migracion.encuadre_legal;

create table migracion.encuadre_legal as 
select
campo98 as id_folio, campo66 as decreto_2225_95, campo69 as ley_24374, campo68 as decreto_815_88,
campo70 as ley_23073, campo67 as decreto_4686_96, campo72 as expropiacion, campo73 as otros,false as ley_14449, campo71 as tiene_expropiacion from datos_folios_integrados;

update migracion.encuadre_legal set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));

 

--decreto_2225_95

update migracion.encuadre_legal set decreto_2225_95=TRUE where decreto_2225_95='Si';
update migracion.encuadre_legal set decreto_2225_95=TRUE where decreto_2225_95='si';
update migracion.encuadre_legal set decreto_2225_95=TRUE where decreto_2225_95='SI';
update migracion.encuadre_legal set decreto_2225_95=FALSE where decreto_2225_95='No';
update migracion.encuadre_legal set decreto_2225_95=FALSE where decreto_2225_95='no';
update migracion.encuadre_legal set decreto_2225_95=FALSE where decreto_2225_95='Sin dato';


--ley_24374

update migracion.encuadre_legal set ley_24374=TRUE where ley_24374='Si';
update migracion.encuadre_legal set ley_24374=TRUE where ley_24374='si';
update migracion.encuadre_legal set ley_24374=TRUE where ley_24374='SI';
update migracion.encuadre_legal set ley_24374=FALSE where ley_24374='No';
update migracion.encuadre_legal set ley_24374=FALSE where ley_24374='no';
update migracion.encuadre_legal set ley_24374=FALSE where ley_24374='Sin dato';


--decreto_815_88

update migracion.encuadre_legal set decreto_815_88=TRUE where decreto_815_88='Si';
update migracion.encuadre_legal set decreto_815_88=TRUE where decreto_815_88='si';
update migracion.encuadre_legal set decreto_815_88=TRUE where decreto_815_88='SI';
update migracion.encuadre_legal set decreto_815_88=FALSE where decreto_815_88='No';
update migracion.encuadre_legal set decreto_815_88=FALSE where decreto_815_88='no';
update migracion.encuadre_legal set decreto_815_88=FALSE where decreto_815_88='Sin dato';

--ley_23073

update migracion.encuadre_legal set ley_23073=TRUE where ley_23073='Si';
update migracion.encuadre_legal set ley_23073=TRUE where ley_23073='si';
update migracion.encuadre_legal set ley_23073=TRUE where ley_23073='SI';
update migracion.encuadre_legal set ley_23073=FALSE where ley_23073='No';
update migracion.encuadre_legal set ley_23073=FALSE where ley_23073='no';
update migracion.encuadre_legal set ley_23073=FALSE where ley_23073='Sin dato';



--decreto_4686_96

update migracion.encuadre_legal set decreto_4686_96=TRUE where decreto_4686_96='Si';
update migracion.encuadre_legal set decreto_4686_96=TRUE where decreto_4686_96='si';
update migracion.encuadre_legal set decreto_4686_96=TRUE where decreto_4686_96='SI';
update migracion.encuadre_legal set decreto_4686_96=FALSE where decreto_4686_96='No';
update migracion.encuadre_legal set decreto_4686_96=FALSE where decreto_4686_96='no';
update migracion.encuadre_legal set decreto_4686_96=FALSE where decreto_4686_96='Sin dato';


--tiene_expropiacion

update migracion.encuadre_legal set tiene_expropiacion=TRUE where tiene_expropiacion='Si';
update migracion.encuadre_legal set tiene_expropiacion=TRUE where tiene_expropiacion='si';
update migracion.encuadre_legal set tiene_expropiacion=TRUE where tiene_expropiacion='SI';
update migracion.encuadre_legal set tiene_expropiacion=FALSE where tiene_expropiacion='No';
update migracion.encuadre_legal set tiene_expropiacion=FALSE where tiene_expropiacion='no';
update migracion.encuadre_legal set tiene_expropiacion=FALSE where tiene_expropiacion='Sin dato';


--INSERTAR

INSERT INTO encuadre_legal(
            id_folio, decreto_2225_95, ley_24374, decreto_815_88, ley_23073, 
            decreto_4686_96, expropiacion, otros, ley_14449, tiene_expropiacion)
select id_folio::int, decreto_2225_95::boolean, ley_24374::boolean, decreto_815_88::boolean, ley_23073::boolean, 
            decreto_4686_96::boolean, expropiacion, otros, ley_14449::boolean, tiene_expropiacion::boolean
            from migracion.encuadre_legal  where id_folio is not null;


--------------------------------------------------------------------------------------------------------------------

-- Tabla antecedentes

drop table if exists migracion.antecedentes;

create table migracion.antecedentes as 
select
campo98 as id_folio, campo74 as sin_intervencion, campo76 as obras_infraestructura, campo77 as equipamientos, campo75 as intervenciones_en_viviendas,
campo78 as otros from datos_folios_integrados;

update migracion.antecedentes set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));


-- sin_intervencion 

update migracion.antecedentes set sin_intervencion=TRUE where sin_intervencion='Si';
update migracion.antecedentes set sin_intervencion=TRUE where sin_intervencion='si';
update migracion.antecedentes set sin_intervencion=TRUE where sin_intervencion='SI';
update migracion.antecedentes set sin_intervencion=FALSE where sin_intervencion='No';
update migracion.antecedentes set sin_intervencion=FALSE where sin_intervencion='no';
update migracion.antecedentes set sin_intervencion=FALSE where sin_intervencion='Sin dato';

-- obras_infraestructura 

update migracion.antecedentes set obras_infraestructura=TRUE where obras_infraestructura='Si';
update migracion.antecedentes set obras_infraestructura=TRUE where obras_infraestructura='si';
update migracion.antecedentes set obras_infraestructura=TRUE where obras_infraestructura='SI';
update migracion.antecedentes set obras_infraestructura=FALSE where obras_infraestructura='No';
update migracion.antecedentes set obras_infraestructura=FALSE where obras_infraestructura='no';
update migracion.antecedentes set obras_infraestructura=FALSE where obras_infraestructura='Sin dato';

-- equipamientos

update migracion.antecedentes set equipamientos=TRUE where equipamientos='Si';
update migracion.antecedentes set equipamientos=TRUE where equipamientos='si';
update migracion.antecedentes set equipamientos=TRUE where equipamientos='SI';
update migracion.antecedentes set equipamientos=FALSE where equipamientos='No';
update migracion.antecedentes set equipamientos=FALSE where equipamientos='no';
update migracion.antecedentes set equipamientos=FALSE where equipamientos='Sin dato';


--intervenciones_en_viviendas

update migracion.antecedentes set intervenciones_en_viviendas=TRUE where intervenciones_en_viviendas='Si';
update migracion.antecedentes set intervenciones_en_viviendas=TRUE where intervenciones_en_viviendas='si';
update migracion.antecedentes set intervenciones_en_viviendas=TRUE where intervenciones_en_viviendas='SI';
update migracion.antecedentes set intervenciones_en_viviendas=FALSE where intervenciones_en_viviendas='No';
update migracion.antecedentes set intervenciones_en_viviendas=FALSE where intervenciones_en_viviendas='no';
update migracion.antecedentes set intervenciones_en_viviendas=FALSE where intervenciones_en_viviendas='Sin dato';

--INSERTAR

INSERT INTO antecedentes(
            id_folio, sin_intervencion, obras_infraestructura, equipamientos, 
            intervenciones_en_viviendas, otros)
SELECT id_folio::int, sin_intervencion::boolean, obras_infraestructura::boolean, equipamientos::boolean, 
            intervenciones_en_viviendas::boolean, otros FROM migracion.antecedentes  where id_folio is not null;    


------------------------------------------------------------------------------------------------------




-- Tabla organismos de intervencion

drop table if exists migracion.organismos_de_intervencion;

create table migracion.organismos_de_intervencion as 
select
campo98 as id_folio, campo79 as nacional, campo80 as provincial, campo81 as municipal, campo83 as fecha_intervencion,
campo82 as programas from datos_folios_integrados;

update migracion.organismos_de_intervencion set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));


--nacional

update migracion.organismos_de_intervencion set nacional=TRUE where nacional='Si';
update migracion.organismos_de_intervencion set nacional=TRUE where nacional='si';
update migracion.organismos_de_intervencion set nacional=TRUE where nacional='SI';
update migracion.organismos_de_intervencion set nacional=FALSE where nacional='No';
update migracion.organismos_de_intervencion set nacional=FALSE where nacional='no';
update migracion.organismos_de_intervencion set nacional=FALSE where nacional='Sin dato';

--provincial

update migracion.organismos_de_intervencion set provincial=TRUE where provincial='Si';
update migracion.organismos_de_intervencion set provincial=TRUE where provincial='si';
update migracion.organismos_de_intervencion set provincial=TRUE where provincial='SI';
update migracion.organismos_de_intervencion set provincial=FALSE where provincial='No';
update migracion.organismos_de_intervencion set provincial=FALSE where provincial='no';
update migracion.organismos_de_intervencion set provincial=FALSE where provincial='Sin dato';

--municipal

update migracion.organismos_de_intervencion set municipal=TRUE where municipal='Si';
update migracion.organismos_de_intervencion set municipal=TRUE where municipal='si';
update migracion.organismos_de_intervencion set municipal=TRUE where municipal='SI';
update migracion.organismos_de_intervencion set municipal=FALSE where municipal='No';
update migracion.organismos_de_intervencion set municipal=FALSE where municipal='no';
update migracion.organismos_de_intervencion set municipal=FALSE where municipal='Sin dato';

-- INSERTAR

INSERT INTO organismos_de_intervencion(
            id_folio, nacional, provincial, municipal, programas, fecha_intervencion)
select id_folio::int, nacional::boolean, provincial::boolean, municipal::boolean, programas, fecha_intervencion
from migracion.organismos_de_intervencion  where id_folio is not null;

select * from migracion.regularizacion   ;

---------------------------------------------------------------------------------------------------------
------------------
------------------------------------------------------------------------------------------------------------

-- Tabla uso_interno, no la pudimos generar porque encontramos problematicas que no podemos resolver (te las detallamos)


drop table if exists migracion.uso_interno;

create table migracion.uso_interno as 
select
 campo98 as id_folio, campo61 as informe_urbanistico, 
 CASE WHEN campo23 ='Mapeo preliminar' THEN true
            ELSE false
       END as  mapeo_preliminar,
CASE WHEN campo23 ='No corresponde inscripción' THEN true
            ELSE false
       END as no_corresponde_inscripcion,
CASE WHEN campo23 ='Inscripción provisoria' THEN 'n° pendiente'
            ELSE ''
       END  as  resolucion_inscripcion_provisoria,
 campo25 as resolucion_inscripcion_definitiva,
 campo85 as regularizacion_fecha_inicio,
 campo86 as regularizacion_circular_10_catastro,
 campo87 as geodesia_partido,
 campo88 as geodesia_num, 
 campo89 as geodesia_anio,
 campo90 as registracion_legajo,
 campo92 as registracion_fecha, 
 campo91 as registracion_folio, 
 campo93 as regularizacion_estado_proceso, --(es de 3 opciones y no esta creada la tabla de opc)
 campo63 as tiene_censo,
 campo64 as fecha_censo,
 campo26 as num_expediente,
 campo94 as ley_14449, 
 campo62 as fecha_informe_urbanistico,
 campo99 as estado_folio, 
 campo84 as regularizacion_tiene_plano,
 false as objetado,
 ''::text comentario_objetacion
 from datos_folios_integrados ;

update migracion.uso_interno set id_folio = (select id from folio where cod_folio=lpad(id_folio,7,'0'));


update migracion.uso_interno set informe_urbanistico='si' where informe_urbanistico in ('si','Si','SI');
update migracion.uso_interno set informe_urbanistico='no' where informe_urbanistico in ('No');
update migracion.uso_interno set informe_urbanistico='sin_dato' where informe_urbanistico in ('Sin dato','');
update migracion.uso_interno set informe_urbanistico='sin_dato' where informe_urbanistico is null;


update migracion.uso_interno set tiene_censo='sin_dato' where tiene_censo is null;
update migracion.uso_interno set tiene_censo='no' where tiene_censo = 'No';

update migracion.uso_interno set regularizacion_tiene_plano='sin_dato' where regularizacion_tiene_plano is null;

update migracion.uso_interno set ley_14449='sin_dato' where ley_14449 is null;

update migracion.uso_interno set estado_folio=4 where estado_folio='No corresponde inscripcion';
update migracion.uso_interno set estado_folio=5 where estado_folio='Notificacion';
update migracion.uso_interno set estado_folio=3 where estado_folio='Validacion y/o completamiento';

--INSERTAR USO INTERNO

INSERT INTO uso_interno(
            id_folio, informe_urbanistico, mapeo_preliminar, no_corresponde_inscripcion, 
            resolucion_inscripcion_provisoria, resolucion_inscripcion_definitiva, 
            regularizacion_circular_10_catastro, regularizacion_estado_proceso, 
            num_expediente, registracion_legajo, registracion_fecha, registracion_folio, 
            geodesia_num, geodesia_anio, fecha_censo, geodesia_partido, estado_folio, 
            regularizacion_tiene_plano, tiene_censo, ley_14449, objetado, 
            comentario_objetacion, regularizacion_fecha_inicio, fecha_informe_urbanistico)
    select 
    id_folio::int, informe_urbanistico, mapeo_preliminar, no_corresponde_inscripcion, 
            resolucion_inscripcion_provisoria, resolucion_inscripcion_definitiva, 
            regularizacion_circular_10_catastro::boolean, regularizacion_estado_proceso::int, 
            num_expediente, registracion_legajo, registracion_fecha, registracion_folio, 
            geodesia_num, geodesia_anio, fecha_censo, geodesia_partido, estado_folio::int, 
            regularizacion_tiene_plano, tiene_censo, ley_14449, objetado, 
            comentario_objetacion, regularizacion_fecha_inicio, fecha_informe_urbanistico
	from migracion.uso_interno where id_folio is not null;	

------------------------------------------------------------------------------------------------------

-----------                  THE END --------------------------------------------------------------

	
 select 'OK, todo piola';



  


