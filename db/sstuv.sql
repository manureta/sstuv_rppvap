
SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;



SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;


----------------
--  USUSARIO

--DROP ROLE sstuv_app;

--CREATE ROLE sstuv_app LOGIN PASSWORD 'variosmonosconnavajas' NOSUPERUSER INHERIT NOCREATEDB NOCREATEROLE NOREPLICATION;


---------------
--BASE
---------------
-- DROP DATABASE sstuv_app;


-------------------
-- PERFIL
-------------------

CREATE TABLE perfil
(
  id_perfil serial NOT NULL,
  nombre character varying NOT NULL,
  descripcion character varying,
  CONSTRAINT perfil_pkey PRIMARY KEY (id_perfil),
  CONSTRAINT perfil_nombre_key UNIQUE (nombre)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE perfil
  OWNER TO sstuv_app;

-- DROP TABLE usuario;

CREATE TABLE usuario
(
  id_usuario serial NOT NULL,
  password character varying NOT NULL,
  email character varying NOT NULL,
  super_admin boolean,
  fecha_activacion timestamp without time zone NOT NULL default now(),
  nombre character varying,
  id_perfil integer,
  respuesta_a character varying,
  respuesta_b character varying,
  pregunta_secreta_a character varying,
  pregunta_secreta_b character varying,
  CONSTRAINT id_usuario_pk PRIMARY KEY (id_usuario),
  CONSTRAINT id_perfil_fk FOREIGN KEY (id_perfil)
      REFERENCES perfil (id_perfil) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT usuario_nombre_key UNIQUE (nombre)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE usuario
  OWNER TO sstuv_app;

-- Index: usuario_id_usuario_idx

-- DROP INDEX usuario_id_usuario_idx;

CREATE INDEX usuario_id_usuario_idx
  ON usuario
  USING btree
  (id_usuario);
ALTER TABLE usuario CLUSTER ON usuario_id_usuario_idx;




-- -----------------------------------------------------
-- Table partido
-- -----------------------------------------------------
--DROP TABLE IF EXISTS partido ;

CREATE  TABLE IF NOT EXISTS partido (
  id serial,
  nombre character varying(45) NOT NULL ,
  PRIMARY KEY (id) 
  );
CREATE UNIQUE INDEX partido_id_idx ON partido (id);

-- -----------------------------------------------------
-- Table localidad
-- -----------------------------------------------------
--DROP TABLE IF EXISTS localidad ;

CREATE  TABLE IF NOT EXISTS localidad (
  id serial ,
  nombre character varying(45) NOT NULL ,
  id_partido int NOT NULL references partido(id),
  PRIMARY KEY (id) 
);
CREATE UNIQUE INDEX localidad_id_idx ON localidad (id);

-- -----------------------------------------------------
-- Table tipo_barrio
-- -----------------------------------------------------
--DROP TABLE IF EXISTS tipo_barrio ;

CREATE  TABLE IF NOT EXISTS tipo_barrio (
  id serial,
  tipo character varying(45) NOT NULL ,
  PRIMARY KEY (id) )
;
CREATE UNIQUE INDEX tipo_barrio_id_idx ON tipo_barrio (id);

-- -----------------------------------------------------
-- Table folio
-- -----------------------------------------------------
--DROP TABLE IF EXISTS folio ;

CREATE  TABLE IF NOT EXISTS folio (
  id serial,
  id_partido INT NOT NULL references partido(id),  
  id_localidad int NULL references localidad(id),
  id_matricula INT NULL ,
  fecha DATE ,
  encargado character varying(45) NULL ,
  nombre_barrio_oficial character varying(45) NULL ,
  nombre_barrio_alternativo_1 character varying(45) NULL ,
  nombre_barrio_alternativo_2 character varying(45) NULL ,
  anio_origen character varying(45) NULL ,
  superficie character varying(45) NULL ,
  cantidad_familias INT NULL ,
  tipo_barrio INT references tipo_barrio(id) ,
  observacion_caso_dudoso character varying(255) NULL ,
  judicializado smallint NULL ,
  direccion character varying(45) NULL ,
  _mapeo_preliminar smallint NULL ,
  _resolucion_inscripcion_provisoria character varying(45) NULL ,
  _resolucion_inscripcion_definitiva character varying(45) NULL ,
  num_expedientes character varying(45) NULL ,
  --the_geom geometry ,
  PRIMARY KEY (id)
  
);
CREATE UNIQUE INDEX folio_id_idx ON folio (id);

-- -----------------------------------------------------
-- Table nomenclatura
-- -----------------------------------------------------
--DROP TABLE IF EXISTS nomenclatura ;

CREATE  TABLE IF NOT EXISTS nomenclatura (
  id serial,
  id_folio INT NULL references folio(id),
  partida_inmobiliaria character varying(45) NULL ,
  titular_dominio character varying(45) NULL ,
  circ character varying(45) NULL ,
  secc character varying(45) NULL ,
  chac_quinta character varying(45) NULL ,
  frac character varying(45) NULL ,
  mza character varying(45) NULL ,
  parc character varying(45) NULL ,
  _inscripcion_dominio character varying(45) NULL ,
  _dato_verificado_reg_propiedad smallint NULL ,
  PRIMARY KEY (id) 
);
CREATE UNIQUE INDEX nomenclatura_id_idx ON nomenclatura (id);

-- -----------------------------------------------------
-- Table _socio_urbanisticas
-- -----------------------------------------------------
--DROP TABLE IF EXISTS condiciones_socio_urbanisticas ;

CREATE  TABLE IF NOT EXISTS condiciones_socio_urbanisticas (
  id serial,
  id_folio INT unique references folio(id),
  espacio_libre_comun boolean ,
  presencia_org_sociales character varying(255) NULL ,
  nombre_refernte character varying(45) NULL ,
  telefono_referente character varying(45) NULL ,
  _informe_urbanistico_fecha character varying(45) NULL ,
  PRIMARY KEY (id,id_folio)
  )
;
CREATE UNIQUE INDEX cond_socio_id_idx ON condiciones_socio_urbanisticas (id);


-- -----------------------------------------------------
-- Table opciones_equipamientos
-- -----------------------------------------------------
--DROP TABLE IF EXISTS opciones_equipamientos ;

CREATE  TABLE IF NOT EXISTS opciones_equipamientos (
  id serial,
  opcion character varying(45) NOT NULL ,
  PRIMARY KEY (id) )
;


-- -----------------------------------------------------
-- Table equipamiento
-- -----------------------------------------------------
--DROP TABLE IF EXISTS equipamiento ;

CREATE  TABLE IF NOT EXISTS equipamiento (
  id serial,
  id_folio INT references condiciones_socio_urbanisticas(id_folio) ,
  unidad_sanitaria INT REFERENCES opciones_equipamientos (id) ,
  jardin_infantes INT REFERENCES opciones_equipamientos (id) ,
  escuela_primaria INT REFERENCES opciones_equipamientos (id) ,
  escuela_secundaria INT REFERENCES opciones_equipamientos (id) ,
  comedor INT REFERENCES opciones_equipamientos (id) ,
  salon_usos_multiples INT REFERENCES opciones_equipamientos (id) ,
  centro_integracion_comunitaria INT REFERENCES opciones_equipamientos (id) ,
  otro character varying NULL ,
  PRIMARY KEY (id)
  );
  CREATE UNIQUE INDEX equipamiento_id_idx ON equipamiento (id);



-- -----------------------------------------------------
-- Table opciones_transporte
-- -----------------------------------------------------
--DROP TABLE IF EXISTS opciones_transporte ;

CREATE  TABLE IF NOT EXISTS opciones_transporte (
  id serial,
  opcion character varying(45) NULL ,
  PRIMARY KEY (id) )
;


-- -----------------------------------------------------
-- Table transporte
-- -----------------------------------------------------
--DROP TABLE IF EXISTS transporte ;

CREATE  TABLE IF NOT EXISTS transporte (
  id serial,
  id_folio INT REFERENCES condiciones_socio_urbanisticas (id_folio ) ,
  colectivos INT REFERENCES opciones_transporte (id) ,
  ferrocarril INT REFERENCES opciones_transporte (id) ,
  remis_combis INT REFERENCES opciones_transporte (id) ,
  PRIMARY KEY (id) 
);
CREATE UNIQUE INDEX transporte_id_idx ON transporte (id);


-- -----------------------------------------------------
-- Table opciones_infraestructura
-- -----------------------------------------------------
--DROP TABLE IF EXISTS opciones_infraestructura ;

CREATE  TABLE IF NOT EXISTS opciones_infraestructura (
  id serial,
  opcion character varying(45) NULL ,
  PRIMARY KEY (id) )
;


-- -----------------------------------------------------
-- Table infraestructura
-- -----------------------------------------------------
--DROP TABLE IF EXISTS infraestructura ;

CREATE  TABLE IF NOT EXISTS infraestructura (
  id serial,
  id_folio INT REFERENCES condiciones_socio_urbanisticas (id_folio ) ,
  energia_electrica_medidor_individual INT REFERENCES opciones_infraestructura (id) ,
  energia_electrica_medidor_colectivo INT REFERENCES opciones_infraestructura (id) ,
  alumbrado_publico INT REFERENCES opciones_infraestructura (id) ,
  agua_corriente INT REFERENCES opciones_infraestructura (id) ,
  agua_potable INT REFERENCES opciones_infraestructura (id) ,
  red_cloacal INT REFERENCES opciones_infraestructura (id) ,
  sist_alternativo_eliminacion_excretas INT REFERENCES opciones_infraestructura (id) ,
  red_gas INT REFERENCES opciones_infraestructura (id) ,
  pavimento INT REFERENCES opciones_infraestructura (id) ,
  cordon_cuneta INT REFERENCES opciones_infraestructura (id) ,
  desagues_pluviales INT REFERENCES opciones_infraestructura (id) ,
  recoleccion_residuos INT REFERENCES opciones_infraestructura (id),
  PRIMARY KEY (id) 
);

CREATE UNIQUE INDEX infraestructura_id_idx ON infraestructura (id);

-- -----------------------------------------------------
-- Table situacion_ambiental
-- -----------------------------------------------------
--DROP TABLE IF EXISTS situacion_ambiental ;

CREATE  TABLE IF NOT EXISTS situacion_ambiental (
  id serial,
  id_folio INT REFERENCES condiciones_socio_urbanisticas (id_folio ) ,
  sin_problemas boolean ,
  reserva_electroducto boolean ,
  inundable boolean ,
  sobre_terraplen_ferroviario boolean ,
  sobre_camino_sirga boolean ,
  expuesto_contaminacion_industrial boolean ,
  sobre_suelo_degradado boolean ,
  otro character varying(45) NULL ,
  PRIMARY KEY (id)
);
CREATE UNIQUE INDEX situacion_ambiental_id_idx ON situacion_ambiental(id);

-- -----------------------------------------------------
-- Table estado_proceso
-- -----------------------------------------------------
--DROP TABLE IF EXISTS estado_proceso ;

CREATE  TABLE IF NOT EXISTS estado_proceso (
  id serial,
  descripcion character varying(45) NULL ,
  PRIMARY KEY (id) )
;


-- -----------------------------------------------------
-- Table aprobacion_geodesia

-- ver si el num es un campo unico **************
-- -----------------------------------------------------
--DROP TABLE IF EXISTS aprobacion_geodesia ;

CREATE  TABLE IF NOT EXISTS aprobacion_geodesia (
  id serial,
  --id_folio int references regularizacion(id_folio),/* preguntar */
  cod_partido INT NULL , /* innecesario */
  num INT NULL ,
  anio character varying(4) NULL ,
  PRIMARY KEY (id) )
;
CREATE UNIQUE INDEX aprobacion_geodesia_id_idx ON aprobacion_geodesia(id);

-- -----------------------------------------------------
-- Table regularizacion
-- -----------------------------------------------------
--DROP TABLE IF EXISTS regularizacion ;

CREATE  TABLE IF NOT EXISTS regularizacion (
  id serial,
  id_folio INT unique references folio(id) ,
  proceso_iniciado boolean ,
  _fecha_inicio DATE NULL ,
  _tiene_plano boolean ,
  _circular_10_catastro boolean ,
  _aprobacion_geodesia INT references aprobacion_geodesia(id) ,
  _registracion INT NULL ,
  _estado_proceso INT references estado_proceso(id) ,
  PRIMARY KEY (id)
);

CREATE UNIQUE INDEX regularizacion_id_idx ON regularizacion(id);
-- -----------------------------------------------------
-- Table encuadre_legal
-- -----------------------------------------------------
--DROP TABLE IF EXISTS encuadre_legal ;

CREATE  TABLE IF NOT EXISTS encuadre_legal (
  id serial,
  id_folio INT references regularizacion(id_folio) ,
  decreto_2225_95 boolean ,
  ley_24374 boolean ,
  decreto_815_88 boolean ,
  ley_23073 boolean ,
  decreto_4686_96 boolean ,
  expropiacion character varying(45) NULL ,
  otros character varying(45) NULL ,
  PRIMARY KEY (id)
 );
CREATE UNIQUE INDEX encuadre_legal_id_idx ON encuadre_legal(id);

-- -----------------------------------------------------
-- Table registracion
-- -----------------------------------------------------
--DROP TABLE IF EXISTS registracion ;

CREATE  TABLE IF NOT EXISTS registracion (
  id serial,
  id_folio INT references regularizacion(id_folio) ,
  legajo character varying(45) NULL ,
  folio character varying(45),
  fecha DATE NULL ,
  PRIMARY KEY (id)
  );
CREATE UNIQUE INDEX registracion_id_idx ON registracion(id);

-- -----------------------------------------------------
-- Table antecedentes
-- -----------------------------------------------------
--DROP TABLE IF EXISTS antecedentes ;

CREATE  TABLE IF NOT EXISTS antecedentes (
  id serial,
  id_folio INT unique references regularizacion(id_folio) ,
  sin_intervencion boolean ,
  obras_infraestructura boolean ,
  equipamientos boolean  ,
  intervenciones_en_viviendas boolean  ,
  otros character varying(45) NULL ,
  PRIMARY KEY (id)
  );
CREATE UNIQUE INDEX antecedentes_id_idx ON antecedentes(id);


-- -----------------------------------------------------
-- Table organismos_de_intervencion
-- -----------------------------------------------------
--DROP TABLE IF EXISTS organismos_de_intervencion ;

CREATE  TABLE IF NOT EXISTS organismos_de_intervencion (
  id serial,
  id_folio INT references antecedentes(id_folio) ,
  nacional boolean,
  provincial boolean ,
  municipal boolean ,
  fecha_intervencion DATE NULL ,
  programas TEXT NULL ,
  observaciones character varying(45) NULL ,
  PRIMARY KEY (id)
 );
CREATE UNIQUE INDEX organismos_de_intervencion_id_idx ON organismos_de_intervencion(id);

