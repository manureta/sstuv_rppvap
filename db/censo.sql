CREATE TABLE censo_grupo_familiar
(
  id serial NOT NULL,
  id_folio integer NOT NULL,
  fecha_alta timestamp without time zone,
  nomenclatura character varying (42),
  declaracion_no_ocupacion boolean,
  tipo_doc_adj text,
  tipo_beneficio text,
  CONSTRAINT censo_grupo_familiar_pkey PRIMARY KEY (id),
  CONSTRAINT censo_grupo_familiar_id_folio_fkey FOREIGN KEY (id_folio)
      REFERENCES folio (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT censo_grupo_familiar_id_folio_key UNIQUE (id_folio)
);

create table censo_persona(
 id serial not null,
 id_grupo_familiar integer not null,
 apellido character varying(255) not null,
 nombres character varying(255) not null,
 fecha_nacimiento date not null,
 edad integer,
 estado_civil character varying(255),
 ocupacion character varying(255),
 ingreso   character varying,
 dni integer not null unique,
 nacionalidad character varying(255),
 nya_madre character varying(255),
 nya_padre character varying(255),
 relacion_parentesco_jefe_hogar character varying(255),
 CONSTRAINT censo_persona_pkey PRIMARY KEY (id),
  CONSTRAINT censo_persona_id_grupo_familiar_fkey FOREIGN KEY (id_grupo_familiar)
      REFERENCES censo_grupo_familiar (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT censo_persona_id_grupo_familiar_key UNIQUE (id_grupo_familiar)

 
);