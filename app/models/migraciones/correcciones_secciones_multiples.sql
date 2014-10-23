/*EJECUTAR EN EL ORDEN EN QUE APARECEN*/
/*********************************************************************************************************/
/*********************************************************************************************************/
--CASO 3 multinivel jardin/primaria cargada como dos multiples 
--eliminar la seccion de jardin para que quede solo la de primaria, corregir id de seccion en alumnos
/*********************************************************************************************************/
/*********************************************************************************************************/
----determinar casos-----------------------------------------------------------
drop table if exists dosauna;
select * into temp dosauna
from seccion  JOIN
(
select * from 
(--secciones multinivel de secciones_multiples 400;'Primario 6y7 / EGB 1,2y3 /Jardín
select id_localizacion, c_modalidad1 
from secciones_multiples sm
join oferta_dictada using (id_oferta_dictada)
where c_oferta_agregada in (400) and c_tipo_seccion =14 and total<>0
) smn 
JOIN
(select s.id_localizacion, s.c_modalidad1, nombre
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion in (6,7,8,9) and c_turno in (6,9) and c_oferta_agregada=3200 --'Jardín de Infantes / Jardín Maternal'
intersect
select s.id_localizacion, s.c_modalidad1, nombre
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion in (6,7,8,9) and c_turno=3 and c_oferta_agregada=2700 --'Primario/EGB 1,2y3'
) sm USING(id_localizacion,c_modalidad1)
) f
using (id_localizacion, c_modalidad1, nombre)
order by id_seccion;
--temporales para correcciones-----------------------------------------------------------
drop table if exists cambios;
select * into temp cambios from 
(--secciones de primaria a las que hay que pasar
select distinct ol.id_localizacion as loc, id_seccion as secp from dosauna 
join alumnos using (id_seccion) 
join plan_dictado using (id_plan_dictado)
join oferta_local ol using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where c_oferta_agregada  =2700 
) pri
join
(-- secciones de jardin que se van a eliminar
select distinct ol.id_localizacion as loc, id_seccion as secj from dosauna 
join alumnos using (id_seccion) 
join plan_dictado using (id_plan_dictado)
join oferta_local ol using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where c_oferta_agregada=3200 ) jar using (loc);
--correcciones------------------------------------------------------------------------------
--cambiar el id de seccion de jardin al de primaria
update alumnos set id_seccion=secp from cambios where id_seccion=secj;
update alumnos_edad set id_seccion=secp from cambios where id_seccion=secj;
--cambiar el tipo de seccion
update seccion set c_tipo_seccion=14 where id_seccion in (select secp from cambios);
--eliminar las secciones de jardin
delete from seccion where id_seccion in (select secj from cambios);


/*********************************************************************************************************/
/*********************************************************************************************************/
--CASO 1 multinivel cargada como multiple
--multinivel  <>0 en secciones_multiples y hay multinivel en seccion: cambiar tipo de seccion
/*********************************************************************************************************/
/*********************************************************************************************************/

/*********************************************************************************************************/
--CASO 1.1 jardin/primaria
/*********************************************************************************************************/
----determinar casos-----------------------------------------------------------
drop table if exists sec_multinivel;
select id_localizacion, c_modalidad1 , id_seccion into temp sec_multinivel 
from 
(--secciones multinivel de secciones_multiples 400;'Primario 6y7 / EGB 1,2y3 /Jardín'
select id_localizacion, c_modalidad1 
from secciones_multiples sm
join oferta_dictada using (id_oferta_dictada)
where c_oferta_agregada in (400) and c_tipo_seccion =14 and total<>0
) smn join 
(select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=3200 --'Jardín de Infantes / Jardín Maternal'
intersect
select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=2700 --'Primario/EGB 1,2y3'
) sm USING(id_localizacion,c_modalidad1);

/*********************************************************************************************************/
--CASO 1.2 primaria/secundaria
/*********************************************************************************************************/
----determinar casos-----------------------------------------------------------
drop table if exists sec_multinivel2;
select id_localizacion, c_modalidad1 , id_seccion into temp sec_multinivel2 
from (--secciones multinivel de secciones_multiples  4500;'Secundario/Medio/Polimodal y Primario/EGB 1,2y3'
select id_localizacion, c_modalidad1 
from secciones_multiples sm
join oferta_dictada using (id_oferta_dictada)
where c_oferta_agregada in (4500) and c_tipo_seccion =14 and total<>0
) smn join 
(select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=3100 --'Secundario/Medio/Polimodal'
intersect
select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=2700 --'Primario/EGB 1,2y3'
) sm USING(id_localizacion,c_modalidad1);
--correcciones------------------------------------------------------------------------------
--cambiar tipo de seccion multiple a nultinivel
update seccion set c_tipo_seccion = 14 where id_seccion in 
(select id_seccion from sec_multinivel 
union
select id_seccion from sec_multinivel2);

/*********************************************************************************************************/
/*********************************************************************************************************/
--CASO 2 son dos multiples y no una multinivel 
--multinivel =0 en secciones_multiples y faltan  multiples en seccion: agregar seccion faltante
/*********************************************************************************************************/
/*********************************************************************************************************/
/*********************************************************************************************************/
--CASO 2.1 jardin/primaria
/*********************************************************************************************************/
----determinar casos-----------------------------------------------------------
drop table if exists sec_multiples;
select id_localizacion, c_modalidad1 , id_seccion into temp sec_multiples 
from 
(--secciones multinivel de secciones_multiples 400;'Primario 6y7 / EGB 1,2y3 /Jardín'
select id_localizacion, c_modalidad1 
from secciones_multiples sm
join oferta_dictada using (id_oferta_dictada)
where c_oferta_agregada in (400) and c_tipo_seccion =14 and total=0) smn 
join 
(select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=3200 --'Jardín de Infantes / Jardín Maternal'
intersect
select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=2700 --'Primario/EGB 1,2y3'
) sm USING(id_localizacion,c_modalidad1);

--temporales para correcciones-----------------------------------------------------------
-- AGREGAMOS UNA COLUMNA PARA TENER EL ID VIEJO
ALTER TABLE seccion ADD column id_seccion_viejo integer;
-- insertamos secciones nuevas para los chicos de jardín
INSERT INTO seccion(id_localizacion, c_modalidad1, c_turno, c_jornada, 
                    nombre, c_tipo_seccion, id_seccion_viejo)
            
select s.id_localizacion, s.c_modalidad1, c_turno, c_jornada,
nombre, c_tipo_seccion, id_seccion
from seccion s
join sec_multiples using(id_seccion);
--correcciones------------------------------------------------------------------------------
-- movemos los chicos de jardín a las secciones nuevas
update alumnos set id_seccion=p.id_seccion
from (
select * from seccion s, plan_dictado p
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
) p
where alumnos.id_plan_dictado = p.id_plan_dictado
and c_oferta_agregada=3200 
and alumnos.id_seccion=p.id_seccion_viejo; 
-- movemos los chicos de jardín a las secciones nuevas
update alumnos_edad set id_seccion=p.id_seccion
from (
select * from seccion s, plan_dictado p
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
) p
where alumnos_edad.id_plan_dictado = p.id_plan_dictado
and c_oferta_agregada=3200 
and alumnos_edad.id_seccion=p.id_seccion_viejo; 

/*********************************************************************************************************/
--CASO 2.2 primaria/secundaria
/*********************************************************************************************************/
----determinar casos-----------------------------------------------------------
drop table if exists sec_multiples2;
select id_localizacion, c_modalidad1 , id_seccion into temp sec_multiples2 
from 
(--secciones multinivel de secciones_multiples 4500;'Secundario/Medio/Polimodal y Primario/EGB 1,2y3'
select id_localizacion, c_modalidad1 
from secciones_multiples sm
join oferta_dictada using (id_oferta_dictada)
where c_oferta_agregada in (4500) and c_tipo_seccion =14 and total=0) smn 
join 
(select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=3100 --'Secundario/Medio/Polimodal'
intersect
select s.id_localizacion, s.c_modalidad1, id_seccion
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion = 6 and c_oferta_agregada=2700 --'Primario/EGB 1,2y3'
) sm USING(id_localizacion,c_modalidad1);
--temporales para correcciones-----------------------------------------------------------
-- insertamos secciones nuevas para los chicos de primaria
INSERT INTO seccion(id_localizacion, c_modalidad1, c_turno, c_jornada, 
                    nombre, c_tipo_seccion, id_seccion_viejo)
            
select s.id_localizacion, s.c_modalidad1, c_turno, c_jornada,
nombre, c_tipo_seccion, id_seccion
from seccion s
join sec_multiples2 using(id_seccion);
--correcciones------------------------------------------------------------------------------
-- movemos los chicos de primaria a las secciones nuevas
update alumnos set id_seccion=p.id_seccion
from (
select * from seccion s, plan_dictado p
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
) p
where alumnos.id_plan_dictado = p.id_plan_dictado
and c_oferta_agregada=3100 
and alumnos.id_seccion=p.id_seccion_viejo; 

-- movemos los chicos de primaria a las secciones nuevas
update alumnos_edad set id_seccion=p.id_seccion
from (
select * from seccion s, plan_dictado p
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
) p
where alumnos_edad.id_plan_dictado = p.id_plan_dictado
and c_oferta_agregada=3100 
and alumnos_edad.id_seccion=p.id_seccion_viejo; 

/*********************************************************************************************************/
/*********************************************************************************************************/
--CASO 4 jardin/primaria/secundaria como 2 multinivel y es 1
--loc, mod1 que tiene 2 multinivel en secciones_multiples y 1 multinivel en seccion
 /*********************************************************************************************************/
/*********************************************************************************************************/
----determinar casos-----------------------------------------------------------
drop table if exists para_eliminar;

(--localizacion, modalidad1 con secciones multiples en pri/jar y en pri/sec
(--secciones multinivel de secciones_multiples 400;'Primario 6y7 / EGB 1,2y3 /Jardín'
select id_localizacion, c_modalidad1, c_tipo_seccion into temp para_eliminar
from secciones_multiples sm
join oferta_dictada using (id_oferta_dictada)
where c_oferta_agregada in (400) and c_tipo_seccion =14 and total=1)
intersect
(--secciones multinivel de secciones_multiples 4500;'Secundario/Medio/Polimodal y Primario/EGB 1,2y3'
select id_localizacion, c_modalidad1, c_tipo_seccion  
from secciones_multiples sm
join oferta_dictada using (id_oferta_dictada)
where c_oferta_agregada in (4500) and c_tipo_seccion =14 and total=1)
)
INTERSECT
--secciones multiples de la tabla seccion
select s.id_localizacion, s.c_modalidad1, c_tipo_seccion   
from seccion s
join alumnos using (id_seccion)
join plan_dictado using (id_plan_dictado)
join oferta_local using (id_oferta_local)
join oferta_tipo ot using (c_oferta)
join oferta_agregada_base_assn using (c_oferta_base)
where s.c_tipo_seccion =14 --in (6,7,8,9) 
group by 1,2,3
having count(distinct id_seccion)=1;

--crear oferta si no existe---------------------------------------------------------------
/*crear la oferta dictada con oferta agregada 200 si no existe*/
/*31/07/13 la oferta 200 (todas) ya no se usa, para el celeste se creo 4800 (i-p-egb-s-p), reemplazo 200 por 4800*/
/*ademas, este insert daba error porque estaban cruzados los valores mod1, of agregada en */
/*los campos del insert y los datos*/
INSERT INTO oferta_dictada(id_localizacion, c_modalidad1, c_oferta_agregada)
(select id_localizacion, c_modalidad1, 4800 from para_eliminar --4800 era 200
except
select id_localizacion, c_modalidad1, c_oferta_agregada from oferta_dictada);
--temporales para correcciones-----------------------------------------------------------
/*loc, id_oferta_dictada para las agregadas 200, 400, 4500*/
drop table if exists cambios2;

select id_localizacion as loc, id_oferta_dictada as de200, null::integer as de400, null::integer as de4500 into temp cambios2
from oferta_dictada od 
where id_localizacion in 
(select id_localizacion from secciones_multiples sm 
join oferta_dictada using (id_oferta_dictada)
join para_eliminar using (id_localizacion, c_modalidad1, c_tipo_seccion)
where c_oferta_agregada=400) 
and c_oferta_agregada in (4800); --id_oferta_dictada para todas --4800 era 200

update cambios2 set de400=id_oferta_dictada from
(select id_localizacion, id_oferta_dictada 
from oferta_dictada od 
where id_localizacion in 
(select id_localizacion from secciones_multiples sm 
join oferta_dictada using (id_oferta_dictada)
join para_eliminar using (id_localizacion, c_modalidad1, c_tipo_seccion)
where c_oferta_agregada=400) 
and c_oferta_agregada in (400) --id_oferta_dictada para ini/pri
) w where id_localizacion=loc;

update cambios2 set de4500=id_oferta_dictada from
(select id_localizacion, id_oferta_dictada 
from oferta_dictada od 
where id_localizacion in 
(select id_localizacion from secciones_multiples sm 
join oferta_dictada using (id_oferta_dictada)
join para_eliminar using (id_localizacion, c_modalidad1, c_tipo_seccion)
where c_oferta_agregada=400) 
and c_oferta_agregada in (4500) --id_oferta_dictada para pri/sec
) w where id_localizacion=loc;
--correcciones------------------------------------------------------------------------------
/*cambiar id_oferta_dictada de secciones_multiples que tenia la oferta agregada 400 al id_oferta_dictada de la oferta agregada 200*/
update secciones_multiples set id_oferta_dictada=de200
from cambios2 
where id_oferta_dictada=de400;
/*eliminar de secciones multiples los registros con las ofertas_dictadas que tienen la oferta_agregada 4500*/
delete from secciones_multiples where id_oferta_dictada in (select de4500 from cambios2);

/*********************************************************************************************************/
/*********************************************************************************************************/
--CASO 5 multiplan 
--secciones multiplan con mas de un grado-oferta
--generar un id seccion por id_seccion/grado oferta y mover de alumnos y alumnos_edad
 /*********************************************************************************************************/
/*********************************************************************************************************/
--temporales para correcciones-----------------------------------------------------------
-- AGREGAMOS UNA COLUMNA PARA determinar id_seccion para cada grado_oferta
ALTER TABLE seccion ADD column grado_oferta integer;

--temporales para correcciones-----------------------------------------------------------
-- insertamos secciones nuevas para los chicos de primaria
INSERT INTO seccion(id_localizacion, c_modalidad1, c_turno, c_jornada, 
                    nombre, c_tipo_seccion, id_seccion_viejo, grado_oferta)
select s.id_localizacion, s.c_modalidad1, c_turno, c_jornada,
nombre, c_tipo_seccion, s.id_seccion, c_grado_oferta
from seccion s 
JOIN --las secciones que tienen mas de un grado oferta para la seccion multiplan
(SELECT id_seccion
from seccion s
left join alumnos a using(id_seccion)
left join plan_dictado p using(id_plan_dictado)
WHERE c_tipo_seccion=13 and c_alumno=1
group by 1
having count(distinct c_grado_oferta) >1) a using (id_seccion)
JOIN --combinaciones id_seccion, grado_oferta
(SELECT distinct id_seccion,c_grado_oferta
from seccion s
left join alumnos a using(id_seccion)
left join plan_dictado p using(id_plan_dictado)
WHERE c_tipo_seccion=13 and c_alumno=1) b using (id_seccion);

--correcciones------------------------------------------------------------------------------
-- movemos los chicos a las secciones nuevas
update alumnos set id_seccion=p.id_seccion
from seccion p
where alumnos.id_seccion=p.id_seccion_viejo and alumnos.c_grado_oferta=p.grado_oferta and c_tipo_seccion=13; 

update alumnos_edad set id_seccion=p.id_seccion
from seccion p
where alumnos_edad.id_seccion=p.id_seccion_viejo and alumnos_edad.c_grado_oferta=p.grado_oferta and c_tipo_seccion=13; 
--eliminar secciones reemplazadas de tabla seccion
delete from seccion where id_seccion in
(select distinct id_seccion_viejo from seccion where c_tipo_seccion=13 and id_seccion_viejo is not null);

--eliminar temporales para correcciones-----------------------------------------------------------
ALTER TABLE seccion DROP column id_seccion_viejo;
ALTER TABLE seccion DROP column grado_oferta;

