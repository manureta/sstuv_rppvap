alter table parcelas drop constraint enforce_srid_geom;
update parcelas set geom=st_transform(geom,4326);
create view v_folios as select id as gid,st_geomfromtext(geom,4326) as the_geom from folio;
drop view if exists v_parcelas;
create view v_parcelas as select a.*,p.geom as the_geom from 
((SELECT n.id as gid,n.estado_geografico, f.cod_folio,n.partido|| n.circ || n.secc || n.chac_quinta || n.frac || n.mza || n.parc as nomencla 
FROM nomenclatura n join folio f on n.id_folio=f.id)) as a join parcelas p on a.nomencla=p.nomencla;
