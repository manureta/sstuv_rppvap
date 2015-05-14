create table opciones_estado_expropiacion(
  id serial NOT NULL,  
  descripcion character varying,
  CONSTRAINT opciones_estado_expropiacion_pkey PRIMARY KEY (id)
);

insert into opciones_estado_expropiacion(id,descripcion) values(1,'Proyecto');
insert into opciones_estado_expropiacion(id,descripcion) values(2,'Ley vigente');
insert into opciones_estado_expropiacion(id,descripcion) values(3,'Ley vencida');
insert into opciones_estado_expropiacion(id,descripcion) values(4,'Ley prorrogada');
insert into opciones_estado_expropiacion(id,descripcion) values(5,'Avenimiento');
insert into opciones_estado_expropiacion(id,descripcion) values(6,'Juicio de expropiación directa');
insert into opciones_estado_expropiacion(id,descripcion) values(7,'Juicio de expropiación inversa');
insert into opciones_estado_expropiacion(id,descripcion) values(8,'Perdió vigencia la ley');
insert into opciones_estado_expropiacion(id,descripcion) values(9,'Inmuebles inscripto');


ALTER TABLE encuadre_legal ADD COLUMN fecha_sancion character varying(150);
ALTER TABLE encuadre_legal ADD COLUMN fecha_vencimiento character varying(150);
ALTER TABLE encuadre_legal ADD COLUMN nomenclatura_texto_ley character varying(150);
ALTER TABLE encuadre_legal ADD COLUMN tasacion_administrativa character varying(150);
ALTER TABLE encuadre_legal ADD COLUMN precio_pagado character varying(150);
ALTER TABLE encuadre_legal ADD COLUMN juzgado character varying(150);
ALTER TABLE encuadre_legal ADD COLUMN estado_proceso_expropiacion integer;
ALTER TABLE encuadre_legal ADD COLUMN memoria_descriptiva text;

ALTER TABLE encuadre_legal
  ADD CONSTRAINT encuadre_legal_estado_proceso_expropiacion_fkey FOREIGN KEY (estado_proceso_expropiacion)
      REFERENCES opciones_estado_expropiacion (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;