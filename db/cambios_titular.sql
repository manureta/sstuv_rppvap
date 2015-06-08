alter table parcelas add column titular_dominio character varying(20);
alter table parcelas add column inscripcion_dominio character varying(13);
update parcelas set titular_dominio = '';