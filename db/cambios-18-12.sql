ALTER TABLE folio ADD COLUMN creador integer;
ALTER TABLE folio
  ADD CONSTRAINT folio_creador_fkey FOREIGN KEY (creador)
      REFERENCES usuario (id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE folio DROP COLUMN encargado;
ALTER TABLE folio DROP COLUMN reparticion_publica;
