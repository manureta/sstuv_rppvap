--agregar columna donde guarda el fiolio original
ALTER TABLE folio ADD COLUMN folio_original integer;

-- nuevo perfil
INSERT INTO perfil(
             nombre, descripcion)
    VALUES ('carga_externa', 'Carga externa no municipal');

INSERT INTO estado_folio(
            nombre, descripcion)
    VALUES ('duplicado', 'Folio Duplicado');
    