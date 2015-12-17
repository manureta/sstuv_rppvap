create table conflicto_habitacional(
  id serial NOT NULL,
  id_folio integer NOT NULL,
  intervino_area boolean,
  fuero_interviniente character varying(255),
  juzgado_interviniente character varying(255),
  caratula_expediente character varying(255),
  ministerio_desarrollo boolean,
  ministerio_desarrollo_referente character varying(255),
  defensor_pueblo boolean,
  defensor_pueblo_referente character varying(255),
  secretaria_nacional boolean,
  secretaria_nacional_referente character varying(255),
  municipalidad boolean,
  municipalidad_referente character varying(255),
  organizacion_barrial boolean,
  organizacion_barrial_referente character varying(255),	
  otros_organismos text,
  orden_desalojo boolean,
  fecha_ejecucion character varying(255),
  suspension_hecho boolean,
  solicitud_suspension boolean,
  fecha_suspension character varying(255),
  duracion_suspension character varying(255),
  mesa_gestion boolean,
  observaciones text , 
  CONSTRAINT conflicto_habitacional_pkey PRIMARY KEY (id),
  CONSTRAINT conflicto_habitacional_id_folio_fkey FOREIGN KEY (id_folio)
      REFERENCES folio (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT conflicto_habitacional_id_folio_key UNIQUE (id_folio)
);

