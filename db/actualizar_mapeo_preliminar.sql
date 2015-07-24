-- Veo los tipos de estados con sus codigos

--"4";"No corresponde inscripción"
--"6";"Confirmado"
--"7";"Inscripción"


select f.cod_folio,u.estado_folio,u.mapeo_preliminar 
from folio f join uso_interno u on f.id=u.id_folio 
where u.estado_folio in (4,6,7)
and u.mapeo_preliminar; --esto da 260 registros

update uso_interno  set mapeo_preliminar = false where estado_folio in (4,6,7) and mapeo_preliminar; -- volver a correr la de arriba para confirmar


