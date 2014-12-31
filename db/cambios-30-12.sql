ALTER TABLE folio DROP COLUMN superficie;
ALTER TABLE folio ADD COLUMN superficie numeric;

ALTER TABLE usuario ADD COLUMN telefono character varying;
ALTER TABLE folio ALTER COLUMN nombre_barrio_oficial SET NOT NULL;

