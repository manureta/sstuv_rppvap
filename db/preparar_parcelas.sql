alter table parcelas drop constraint enforce_srid_geom;
update parcelas set geom=st_transform(geom,4326);
create view v_folios as select id as gid,st_geomfromtext(geom,4326) as the_geom from folio;
