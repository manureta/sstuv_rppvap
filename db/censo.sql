drop table censo_grupo_familiar cascade;

CREATE TABLE censo_grupo_familiar
(
  censo_grupo_familiar_id serial NOT NULL,
  id_folio integer NOT NULL,
  fecha_alta timestamp without time zone,
  circ character varying (2),
  secc character varying (2),
  mz character varying (7),
  pc character varying (7),
  telefono character varying (20),
  declaracion_no_ocupacion boolean,
  tipo_doc_adj text,
  tipo_beneficio text,
  CONSTRAINT censo_grupo_familiar_pkey PRIMARY KEY (censo_grupo_familiar_id),
  CONSTRAINT censo_grupo_familiar_id_folio_fkey FOREIGN KEY (id_folio)
      REFERENCES folio (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT censo_grupo_familiar_id_folio_key UNIQUE (id_folio)
);

drop table censo_persona cascade;

create table censo_persona(
 censo_persona_id serial not null,
 censo_grupo_familiar_id integer not null,
 apellido character varying(255) not null,
 nombres character varying(255) not null,
 fecha_nacimiento date not null,
 edad integer,
 estado_civil character varying(255),
 de_o_con_quien character varying(255),
 ocupacion character varying(255),
 ingreso   double precision,
 tipo_doc character varying(255),
 doc integer not null unique,
 nacionalidad character varying(255),
 nya_madre character varying(255),
 nya_padre character varying(255),
 relacion_parentesco_jefe_hogar character varying(255),
 CONSTRAINT censo_persona_pkey PRIMARY KEY (censo_persona_id),
  CONSTRAINT censo_persona_id_grupo_familiar_fkey FOREIGN KEY (censo_grupo_familiar_id)
      REFERENCES censo_grupo_familiar (censo_grupo_familiar_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);
