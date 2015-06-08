/*
SELECT 
partido||
circ||
lpad(trim(seccion),2,'0')|| 
replace(chacra_numero, ' ', '0')||
replace(chacra_letra, ' ', '0')||
replace(quinta_letra, ' ', '0')||
replace(quinta_numero, ' ', '0')||
replace(fraccion_numero, ' ', '0')||
lpad(trim(fraccion_letra),3,'0')||
replace(manzana_numero, ' ', '0')||
lpad(trim(manzana_letra),3,'0')||
replace(parcela_numero, ' ', '0')||
lpad(trim(parcela_letra),3,'0') 
as nomencla,
titular_del_dominio,partida,quinta_numero,quinta_letra,
substring(nro_descrip_domi,10,1)||'-'||substring(nro_descrip_domi,4,6)||substring(nro_descrip_domi,17,6) as inscripcion_dominio  
from tripartito.tripartito_055_20150408_01  where partido='055' and partida='049960';
*/

update parcelas set
titular_dominio=tripartito.titular_del_dominio,
inscripcion_dominio=tripartito.inscripcion_dominio
from
(
	select 
	 titular_del_dominio,
	 substring(nro_descrip_domi,10,1)||'-'||substring(nro_descrip_domi,4,6)||substring(nro_descrip_domi,17,6) as inscripcion_dominio,
	 partido||
	circ||
	lpad(trim(seccion),2,'0')|| 
	replace(chacra_numero, ' ', '0')||
	replace(chacra_letra, ' ', '0')||
	replace(quinta_letra, ' ', '0')||
	replace(quinta_numero, ' ', '0')||
	replace(fraccion_numero, ' ', '0')||
	lpad(trim(fraccion_letra),3,'0')||
	replace(manzana_numero, ' ', '0')||
	lpad(trim(manzana_letra),3,'0')||
	replace(parcela_numero, ' ', '0')||
	lpad(trim(parcela_letra),3,'0') 
	as nomencla	
	 from tripartito.tripartito_055_20150408_01
	
) as tripartito
where partido=55 and parcelas.nomencla=tripartito.nomencla ;
-- 227091 reg actualizados en en 055

-- cant de reg en 055
-- select count(*) from parcelas where partido=55 (235883)

-- cant de reg no encontrados
-- select count(*) from parcelas where partido=55 and inscripcion_dominio is null (8792) que es el 3.7%
-- select count(*) from parcelas where partido=55 and titular_dominio ='' (8790) mas 2 nulls

