select count(*) from tripartito.errores_nomenclaturas  where remplazar = 'SI'; --14780
select count(*) from tripartito.errores_nomenclaturas  where remplazar = 'NO'; --140

select distinct(nomencla),count(*) as cant from tripartito.errores_nomenclaturas group by nomencla order by cant desc


select distinct((((((lpad(partido::text, 3, '0'::text) || 
       lpad(circ::text, 2, '0'::text)) || 
       lpad(secc::text, 2, '0'::text)) || 
       lpad(chac_quinta::text, 14, '0'::text)) || 
       lpad(frac::text, 7, '0'::text)) || 
       lpad(mza::text, 7, '0'::text)) || 
       lpad(parc::text, 7, '0'::text) ) as nomencla, count(*) as cant,id_folio 
from nomenclatura  group by nomencla,id_folio order by cant desc;


/*
"007020D031600000000000000000031600J0000000"
"013010G000000001130000000000011300A0015000"
"055020H00000000140000000100000000000000000"
"063120A0000000000000000020000000000000100A"
"07403000000000000000000000000000000062000J"
"074030D00000000000000000300000000000000000"
"074030R00000000000000000000001530000008000"
"086010D0000000000000000010000000000000100M"
"103010C00000000126000000800000000000000000"
"103010E01810000000000000000000000000000000"
"133040C000000000000000000000012300A0000000"
"13504000000000000000000000000000000028600C"
*/

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

update nomenclatura n 
set titular_dominio=(
		select titular_dominio 
		from parcelas where nomencla=((((((lpad(partido::text, 3, '0'::text) || 
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
       lpad(n.parc::text, 7, '0'::text) ) in (select nomencla from tripartito.errores_nomenclaturas where remplazar='SI')




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