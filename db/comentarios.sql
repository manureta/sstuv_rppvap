--drop table comentarios;
CREATE TABLE comentarios
(
  id serial NOT NULL,
  id_folio integer,
  id_usuario integer,
  fecha_creacion timestamp,
  fecha_modificacion timestamp,
  comentario text,
  CONSTRAINT comentarios_pkey PRIMARY KEY (id),
  CONSTRAINT comentarios_id_folio_fkey FOREIGN KEY (id_folio)
      REFERENCES folio (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT comentarios_id_usuario_fkey FOREIGN KEY (id_usuario)
      REFERENCES usuario (id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
  