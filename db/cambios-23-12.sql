ALTER TABLE uso_interno DROP COLUMN regularizacion_tiene_plano;

ALTER TABLE uso_interno ADD COLUMN regularizacion_tiene_plano character varying;

ALTER TABLE uso_interno DROP COLUMN tiene_censo;

ALTER TABLE uso_interno ADD COLUMN tiene_censo character varying;

ALTER TABLE uso_interno DROP COLUMN ley_14449;

ALTER TABLE uso_interno ADD COLUMN ley_14449 character varying;
