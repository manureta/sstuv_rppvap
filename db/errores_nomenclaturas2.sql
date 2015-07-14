-- PARA TITULAR DE DOMINIO

-- select count(*) from nomenclatura  where titular_dominio='' or titular_dominio='-'; 83280
--select count(*) from nomenclatura  where _inscripcion_dominio='' or inscripcion_dominio='-'

-- select count(*) from nomenclatura  where titular_dominio is null; 0
-- select count(*) from nomenclatura  where length(titular_dominio) < 3; 83277
-- select count(*) from nomenclatura  where length(titular_dominio) < 5 and titular_dominio<>''; 2769

select distinct(titular_dominio),count(*) from nomenclatura  
where length(titular_dominio) < 5 and titular_dominio<>'' group by titular_dominio;

--1
update nomenclatura set titular_dominio='-' where titular_dominio='T-ÿ'

--2
update nomenclatura set titular_dominio='IDP' where titular doominio='-IDP'

-- creo vistas

create table tripartito.nom_titulares_tmp as 
SELECT n.id AS id, n.titular_dominio as titular,n._inscripcion_dominio as inscripcion,(((((lpad(n.partido::text, 3, '0'::text) || lpad(n.circ::text, 2, '0'::text)) || lpad(n.secc::text, 2, '0'::text)) || lpad(n.chac_quinta::text, 14, '0'::text)) || lpad(n.frac::text, 7, '0'::text)) || lpad(n.mza::text, 7, '0'::text)) || lpad(n.parc::text, 7, '0'::text) AS nomencla
           FROM nomenclatura n where n.titular_dominio='' or n.titular_dominio='-';

drop view v_nomenclaturas_titulares_nulas;

create view v_nomenclaturas_titulares_nulas as
SELECT  a.id, a.nomencla,a.titular,a.inscripcion,p.titular_dominio as t_titular,p.inscripcion_dominio as t_inscripcion
   FROM tripartito.nom_titulares_tmp  a
    JOIN parcelas p ON a.nomencla = p.nomencla::text;

drop table tripartito.nomenclaturas_titulares_nulos;
create table tripartito.nomenclaturas_titulares_nulos as select * from v_nomenclaturas_titulares_nulas;  

select * from(
select distinct(nomencla),count(*) as cant from tripartito.nomenclaturas_titulares_nulos group by nomencla order by cant
)a where cant > 1;   

select * from(
select distinct(nomencla),count(*) as cant from tripartito.nom_titulares_tmp  group by nomencla order by cant
)a where cant > 1;   


-- select * from parcelas  where nomencla='103010E01810000000000000000000000000000000' 4 veces!

update nomenclatura n 
set titular_dominio=(
	select 'T-'||t_titular 
	from tripartito.nomenclaturas_titulares_nulos 
	where nomencla=((((((lpad(n.partido::text, 3, '0'::text) || 
		       lpad(n.circ::text, 2, '0'::text)) || 
		       lpad(n.secc::text, 2, '0'::text)) || 
		       lpad(n.chac_quinta::text, 14, '0'::text)) || 
		       lpad(n.frac::text, 7, '0'::text)) || 
		       lpad(n.mza::text, 7, '0'::text)) || 
		       lpad(n.parc::text, 7, '0'::text))
		       and n.partido=substring(nomencla,1,3)
		       limit 1 
		      )
where 		       
 n.titular_dominio='' or n.titular_dominio='-';		       

--limpiar los que estan vacios en tripartito
update nomenclatura set titular_dominio='-' where titular_dominio='T-'; 1062





-- PARA INSCRIPCION DE DOMINIO

--select count(*) from nomenclatura  where _inscripcion_dominio='' or _inscripcion_dominio='-'; 85127

-- select count(*) from nomenclatura  where _inscripcion_dominio is null; 684
-- select count(*) from nomenclatura  where length(_inscripcion_dominio) < 3; 83277
-- select count(*) from nomenclatura  where length(_inscripcion_dominio) < 5 and _inscripcion_dominio<>''; 17

select distinct(_inscripcion_dominio),count(*) from nomenclatura  
where length(_inscripcion_dominio) < 5 and _inscripcion_dominio<>'' group by _inscripcion_dominio;

--1
update nomenclatura set _inscripcion_dominio='' where _inscripcion_dominio is null


-- creo vistas

create table tripartito.nom_inscripcion_tmp as 
SELECT n.id AS id, n.titular_dominio as titular,n._inscripcion_dominio as inscripcion,(((((lpad(n.partido::text, 3, '0'::text) || lpad(n.circ::text, 2, '0'::text)) || lpad(n.secc::text, 2, '0'::text)) || lpad(n.chac_quinta::text, 14, '0'::text)) || lpad(n.frac::text, 7, '0'::text)) || lpad(n.mza::text, 7, '0'::text)) || lpad(n.parc::text, 7, '0'::text) AS nomencla
           FROM nomenclatura n where n._inscripcion_dominio=''; --85811

drop view v_nomenclaturas_inscripciones_nulas;

create view v_nomenclaturas_inscripciones_nulas as
SELECT  a.id, a.nomencla,a.titular,a.inscripcion,p.titular_dominio as t_titular,p.inscripcion_dominio as t_inscripcion
   FROM tripartito.nom_inscripcion_tmp  a
    JOIN parcelas p ON a.nomencla = p.nomencla::text;

drop table tripartito.nomenclaturas_inscripciones_nulas;
create table tripartito.nomenclaturas_inscripciones_nulas as select * from v_nomenclaturas_inscripciones_nulas;  

select * from(
select distinct(nomencla),count(*) as cant from tripartito.nomenclaturas_inscripciones_nulas group by nomencla order by cant
)a where cant > 1;   


update nomenclatura n 
set _inscripcion_dominio=(
	select t_inscripcion 
	from tripartito.nomenclaturas_inscripciones_nulas 
	where nomencla=((((((lpad(n.partido::text, 3, '0'::text) || 
		       lpad(n.circ::text, 2, '0'::text)) || 
		       lpad(n.secc::text, 2, '0'::text)) || 
		       lpad(n.chac_quinta::text, 14, '0'::text)) || 
		       lpad(n.frac::text, 7, '0'::text)) || 
		       lpad(n.mza::text, 7, '0'::text)) || 
		       lpad(n.parc::text, 7, '0'::text))
		       and n.partido=substring(nomencla,1,3)
		       limit 1 
		      )
where 		       
 n._inscripcion_dominio='';		       

select * from nomenclatura  where _inscripcion_dominio=''










