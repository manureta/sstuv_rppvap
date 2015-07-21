select count(*) from tripartito.errores_nomenclaturas  where remplazar = 'SI'; --14780
select count(*) from tripartito.errores_nomenclaturas  where remplazar = 'NO'; --140

select * from tripartito.errores_nomenclaturas  limit 10;

select distinct(nomencla),count(*) as cant from tripartito.errores_nomenclaturas group by nomencla order by cant desc


select distinct((((((lpad(partido::text, 3, '0'::text) || 
       lpad(circ::text, 2, '0'::text)) || 
       lpad(secc::text, 2, '0'::text)) || 
       lpad(chac_quinta::text, 14, '0'::text)) || 
       lpad(frac::text, 7, '0'::text)) || 
       lpad(mza::text, 7, '0'::text)) || 
       lpad(parc::text, 7, '0'::text) ) as nomencla, count(*) as cant,id_folio 
from nomenclatura  group by nomencla,id_folio order by cant desc;



select * from nomenclatura where ((((((lpad(partido::text, 3, '0'::text) || 
       lpad(circ::text, 2, '0'::text)) || 
       lpad(secc::text, 2, '0'::text)) || 
       lpad(chac_quinta::text, 14, '0'::text)) || 
       lpad(frac::text, 7, '0'::text)) || 
       lpad(mza::text, 7, '0'::text)) || 
       lpad(parc::text, 7, '0'::text) )='007020D031600000000000000000031600J0000000'

select * from tripartito.errores_nomenclaturas  where nomencla='009020B0000000003900000010000000000000300A'

/*
select count(*) from nomenclatura  where 
 ((((((lpad(partido::text, 3, '0'::text) || 
       lpad(circ::text, 2, '0'::text)) || 
       lpad(secc::text, 2, '0'::text)) || 
       lpad(chac_quinta::text, 14, '0'::text)) || 
       lpad(frac::text, 7, '0'::text)) || 
       lpad(mza::text, 7, '0'::text)) || 
       lpad(parc::text, 7, '0'::text) ) in (select nomencla from tripartito.errores_nomenclaturas where remplazar='SI') ;
 14776 filas de SI y 140 de NO, supongo que las 4 que faltan son por modificaciones en el aplicativo desde que se creo el shp
*/

--TITULAR

update nomenclatura n 
set titular_dominio='T-'||(
		select t_titular 
		from tripartito.errores_nomenclaturas where nomencla=((((((lpad(n.partido::text, 3, '0'::text) || 
		       lpad(n.circ::text, 2, '0'::text)) || 
		       lpad(n.secc::text, 2, '0'::text)) || 
		       lpad(n.chac_quinta::text, 14, '0'::text)) || 
		       lpad(n.frac::text, 7, '0'::text)) || 
		       lpad(n.mza::text, 7, '0'::text)) || 
		       lpad(n.parc::text, 7, '0'::text))
		       limit 1
		       )
where 
 (((((
      (lpad(n.partido::text, 3, '0'::text) || 
       lpad(n.circ::text, 2, '0'::text)) || 
       lpad(n.secc::text, 2, '0'::text)) || 
       lpad(n.chac_quinta::text, 14, '0'::text)) || 
       lpad(n.frac::text, 7, '0'::text)) || 
       lpad(n.mza::text, 7, '0'::text)) || 
       lpad(n.parc::text, 7, '0'::text) ) in (select nomencla from tripartito.errores_nomenclaturas where remplazar='SI');


-- inscripcion

update nomenclatura n 
set _inscripcion_dominio=(
		select t_inscripc 
		from tripartito.errores_nomenclaturas where nomencla=((((((lpad(n.partido::text, 3, '0'::text) || 
		       lpad(n.circ::text, 2, '0'::text)) || 
		       lpad(n.secc::text, 2, '0'::text)) || 
		       lpad(n.chac_quinta::text, 14, '0'::text)) || 
		       lpad(n.frac::text, 7, '0'::text)) || 
		       lpad(n.mza::text, 7, '0'::text)) || 
		       lpad(n.parc::text, 7, '0'::text))
		       limit 1
		       )
where 
 (((((
      (lpad(n.partido::text, 3, '0'::text) || 
       lpad(n.circ::text, 2, '0'::text)) || 
       lpad(n.secc::text, 2, '0'::text)) || 
       lpad(n.chac_quinta::text, 14, '0'::text)) || 
       lpad(n.frac::text, 7, '0'::text)) || 
       lpad(n.mza::text, 7, '0'::text)) || 
       lpad(n.parc::text, 7, '0'::text) ) in (select nomencla from tripartito.errores_nomenclaturas where remplazar='SI');

/*
update nomenclatura n set titular_dominio=parc.titular_dominio, _inscripcion_dominio=parc.inscripcion_dominio
from (
	select titular_dominio,inscripcion_dominio 
	from parcelas where nomencla=((((((lpad(partido::text, 3, '0'::text) || 
	       lpad(n.circ::text, 2, '0'::text)) || 
	       lpad(n.secc::text, 2, '0'::text)) || 
	       lpad(n.chac_quinta::text, 14, '0'::text)) || 
	       lpad(n.frac::text, 7, '0'::text)) || 
	       lpad(n.mza::text, 7, '0'::text)) || 
	       lpad(n.parc::text, 7, '0'::text))
) as parc 
where 
 (((((
      (lpad(n.partido::text, 3, '0'::text) || 
       lpad(n.circ::text, 2, '0'::text)) || 
       lpad(n.secc::text, 2, '0'::text)) || 
       lpad(n.chac_quinta::text, 14, '0'::text)) || 
       lpad(n.frac::text, 7, '0'::text)) || 
       lpad(n.mza::text, 7, '0'::text)) || 
       lpad(n.parc::text, 7, '0'::text) ) in (select nomencla from tripartito.errores_nomenclaturas where remplazar='SI')

*/
-- EJEMPLO DE NO
--44;"0090001";"009020B000000000470000000000004700D0006000";"A-SOSA NESTOR FABIAN";"0-000000000000"

-- EJEMPLO DE SI
--2;"0080001";"008010D000000000250000000000002500A0001000";"T-BARRAGAN ATILIO FEDE";"F-000016001962";"MUNICIPALIDAD DE BAL";"M-019665000000"