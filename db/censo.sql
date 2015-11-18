drop table hogar cascade;

CREATE TABLE hogar
(
  id serial NOT NULL,
  id_folio integer NOT NULL,
  fecha_alta date not null,
  circ character varying (2) not null,
  secc character varying (2) not null,
  mz character varying (7) not null,
  pc character varying (7) not null,
  telefono character varying (20),
  direccion character varying (255),
  declaracion_no_ocupacion boolean,
  doc_terreno character varying(255),
  tipo_beneficio character varying(255),
  forma_ocupacion character varying (255),
  fecha_ingreso character varying(50),
  CONSTRAINT hogar_pkey PRIMARY KEY (id),
  CONSTRAINT hogar_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio (id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION
);

drop table ocupante cascade;

create table ocupante(
 id serial not null,
 id_hogar integer,
 apellido character varying(255) not null,
 nombres character varying(255) not null,
 fecha_nacimiento date not null,
 edad integer,
 estado_civil character varying(255),
 de_o_con_quien character varying(255),
 ocupacion character varying(255),
 ingreso   character varying(10),
 tipo_doc character varying(255) not null,
 doc integer not null unique,
 nacionalidad character varying(255),
 nya_madre character varying(255),
 nya_padre character varying(255),
 relacion_parentesco_jefe_hogar character varying(255),
 referente boolean,
 CONSTRAINT ocupante_pkey PRIMARY KEY (id),
  CONSTRAINT ocupante_hogar_fkey FOREIGN KEY (id_hogar)
      REFERENCES hogar (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);
