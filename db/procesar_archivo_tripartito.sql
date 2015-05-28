-- convertir a csv para eliminar problemas de codificacion
-- soffice --headless --convert-to csv --outdir conv TRIPARTITO_055.20150408_01.TXT

drop table if exists tripartito.datos_tripartito_055_20150408_01;
create table tripartito.datos_tripartito_055_20150408_01(id serial primary key,valor text);

COPY tripartito.datos_tripartito_055_20150408_01 (valor) 
FROM '/home/fedex/Escritorio/conv/TRIPARTITO_055.20150408_01.csv';


drop table if exists tripartito.tripartito_055_20150408_01;
create table tripartito.tripartito_055_20150408_01  (
partido	character varying(3),
partida	character varying(6),
digito_verificador	character varying(1),
circ	character varying(2),
seccion	character varying(2),
chacra_numero	character varying(4),
chacra_letra	character varying(3),
quinta_letra	character varying(3),
quinta_numero	character varying(4),
fraccion_numero	character varying(4),
fraccion_letra	character varying(3),
manzana_numero	character varying(4),
manzana_letra	character varying(3),
parcela_numero	character varying(4),
parcela_letra	character varying(3),
subparcela	character varying(6),
destinatario	character varying(33),
calle	character varying(45),
barrio	character varying(30),
numero	character varying(8),
piso	character varying(3),
depto	character varying(4),
cpostal	character varying(4),
cpa	character varying(8),
localidad	character varying(30),
efectividad_vifente	character varying(8),
caracteristicas_vigente	character varying(1),
superficie_tierra	character varying(9),
valor_tierra_historico	character varying(13),
valor_tierra_vigente	character varying(9),
valor_edificio_historico	character varying(13),
valor_edificio_vigente_97	character varying(9),
valor_mejoras_historico	character varying(13),
valor_mejoras_vigente_97	character varying(9),
valuacion_fiscal_vigente	character varying(13),
motivo_movimiento_vigente	character varying(1),
partido_partida_origen	character varying(9),
titular_del_dominio	character varying(20),
codigo_titular	character varying(2),
nro_descrip_domi	character varying(21),
valuacion_supedi	character varying(9),
cuit_responsable	character varying(11),
apellido_responsable	character varying(80),
tipo_responsable	character varying(20),
cuit_responsable_2	character varying(11),
apellido_responsable_2	character varying(80),
tipo_responsable_2	character varying(20)
);


insert into tripartito.tripartito_055_20150408_01  
SELECT 
substr(valor,1,3) as "Partido",
substr(valor,4,6) as "Partida",
substr(valor,10,1) as "Digito verificador",
substr(valor,11,2) as "Circ",
substr(valor,13,2) as "Seccion",
substr(valor,15,4) as "Chacra Numero",
substr(valor,19,3) as "Chacra Letra",
substr(valor,22,3) as "Quinta Letra",
substr(valor,25,4) as "Quinta Numero",
substr(valor,29,4) as "Fraccion Numero",
substr(valor,33,3) as "Fraccion Letra",
substr(valor,36,4) as "Manzana Numero",
substr(valor,40,3) as "Manzana Letra",
substr(valor,43,4) as "Parcela Numero",
substr(valor,47,3) as "Parcela Letra",
substr(valor,50,6) as "Subparcela",
substr(valor,56,33) as "Destinatario",
substr(valor,89,45) as "calle",
substr(valor,134,30) as "Barrio",
substr(valor,164,8) as "Numero",
substr(valor,172,3) as "Piso",
substr(valor,175,4) as "Depto",
substr(valor,179,4) as "C.Postal",
substr(valor,183,8) as "cpa",
substr(valor,191,30) as "Localidad",
substr(valor,221,8) as "Efectividad Vifente",
substr(valor,229,1) as "Caracteristicas Vigente",
substr(valor,230,9) as "Superficie Tierra",
substr(valor,239,13) as "Valor Tierra Historico",
substr(valor,252,9) as "Valor Tierra Vigente",
substr(valor,261,13) as "Valor Edificio Historico",
substr(valor,274,9) as "Valor Edificio Vigente 97",
substr(valor,283,13) as "Valor Mejoras Historico",
substr(valor,296,9) as "Valor Mejoras Vigente 97",
substr(valor,305,13) as "Valuacion Fiscal Vigente",
substr(valor,318,1) as "Motivo Movimiento Vigente",
substr(valor,319,9) as "Partido - Partida - Origen",
substr(valor,328,20) as "Titular del dominio",
substr(valor,348,2) as "Codigo Titular",
substr(valor,350,21) as "Nro Descrip Domi",
substr(valor,371,9) as "Valuacion Supedi",
substr(valor,380,11) as "Cuit Responsable",
substr(valor,391,80) as "Apellido Responsable",
substr(valor,471,20) as "Tipo Responsable",
substr(valor,491,11) as "Cuit Responsable 2",
substr(valor,502,80) as "Apellido Responsable 2",
substr(valor,582,20) as "Tipo Responsable 2"
FROM tripartito.datos_tripartito_055_20150408_01;

-- select count(*) from tripartito.datos_tripartito_055_20150408_01; 341850
-- select count(*) from tripartito.tripartito_055_20150408_01; 381850 
-- chequeo
-- select * from tripartito.tripartito_055_20150408_01  where partido <> '055'; 