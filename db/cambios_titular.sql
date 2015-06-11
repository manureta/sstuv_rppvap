alter table parcelas add column titular_dominio character varying(20);
alter table parcelas add column inscripcion_dominio character varying(13);
-- generar los sql y correrlos
---
--

--update parcelas set titular_dominio = 'T-'||titular_dominio where titular_dominio<>'' and titular_dominio is not null;
--no pude porque es mayor a 20 caracteres