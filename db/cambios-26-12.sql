DROP TABLE archivos_adjuntos;

CREATE TABLE evolucion_folio
(
  id serial NOT NULL,
  id_folio integer,
  contenido character varying,
  CONSTRAINT evolucion_pkey PRIMARY KEY (id ),
  CONSTRAINT evolucion_id_folio_fkey FOREIGN KEY (id_folio)
      REFERENCES folio (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

ALTER TABLE evolucion_folio ADD COLUMN fecha date;
ALTER TABLE evolucion_folio ADD COLUMN estado character varying;

