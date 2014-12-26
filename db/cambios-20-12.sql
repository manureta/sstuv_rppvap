
INSERT INTO perfil(
            id_perfil, nombre, descripcion)
                VALUES (4, 'visualizador_general', 'visualizador general'),(5, 'visualizador_basico', 'visualizador básico');

INSERT INTO usuario(
            password, email, super_admin, fecha_activacion, nombre, id_perfil, cod_partido, nombre_completo, reparticion)
                            VALUES (md5('general'), 'visualizadorgeneral@buenosaires.gob.ar', false, now(), 'vgeneral', 4, null, 'visualizador general', 'la plata'),
                                (md5('basico'), 'visualizadorbasico@buenosaires.gob.ar', false, now(), 'vbasico', 5, null, 'visualizador basico', 'la plata');
