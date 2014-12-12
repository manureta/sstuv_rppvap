CREATE OR REPLACE FUNCTION actualizar_estado_nomenclaturas(_id_folio integer)
  RETURNS boolean AS
$BODY$
DECLARE
	nomencla RECORD;
	--_parcelas setof parcelas;
	_nom_tmp character varying;
	_interseccion boolean;
	_overlaps boolean;
	_completo character varying;
	_parcial character varying;
	_exterior character varying;
	_desconocido character varying;
		
BEGIN
	_completo:='completo';
	_parcial:='parcial';
	_exterior:='exterior';
	_desconocido:='error';

create temporary table _parcelas as 
select nomencla,st_intersects(geom,(select the_geom from v_folios where gid=_id_folio)) as interseccion,
st_overlaps(geom,(select the_geom from v_folios where gid=_id_folio)) as overlaps
 from parcelas where nomencla in (
SELECT (((((partido::text || circ::text) || secc::text) || chac_quinta::text) || frac::text) || mza::text) || parc::text AS nomencla
           FROM nomenclatura where id_folio=_id_folio);

FOR nomencla IN (SELECT *  FROM nomenclatura WHERE id_folio=_id_folio) LOOP    
    _nom_tmp:=(((((nomencla.partido || nomencla.circ::text) || nomencla.secc::text) || nomencla.chac_quinta::text) || nomencla.frac::text) || nomencla.mza::text) || nomencla.parc::text;

    RAISE NOTICE 'Actualizando  %...',_nom_tmp;

    _interseccion:=(select interseccion from _parcelas where _parcelas.nomencla=_nom_tmp);
	RAISE NOTICE 'Intersecta  %...',_interseccion;		
    _overlaps:=(select overlaps from _parcelas where _parcelas.nomencla=_nom_tmp);
    	RAISE NOTICE 'Intersecta  %...',_overlaps;	

    EXECUTE 'UPDATE nomenclatura'|| 
        CASE
            WHEN (_interseccion AND NOT _overlaps)
                THEN ' SET estado_geografico='||quote_literal(_completo)||' where id='||nomencla.id
            WHEN (_interseccion AND _overlaps)
                THEN ' SET estado_geografico='||quote_literal(_parcial)||' where id='||nomencla.id
            WHEN (NOT _interseccion)
                THEN ' SET estado_geografico='||quote_literal(_exterior)||' where id='||nomencla.id    
            ELSE ' SET estado_geografico='||quote_literal(_desconocido)||' where id='||nomencla.id END;
    
END LOOP;

RETURN true;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

--select actualizar_estado_nomenclaturas(1);

--select parc,partido,estado_geografico from nomenclatura where id_folio=1

--SELECT id  FROM nomenclatura WHERE id_folio=1


/*
select nomencla,st_intersects(geom,(select the_geom from v_folios where gid=1)) as interseccion,
st_overlaps(geom,(select the_geom from v_folios where gid=1)) as overlaps
 from parcelas where nomencla in (
SELECT (((((partido::text || circ::text) || secc::text) || chac_quinta::text) || frac::text) || mza::text) || parc::text AS nomencla
           FROM nomenclatura where id_folio=1);
*/