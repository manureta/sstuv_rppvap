#/bin/bash

if [ $# -ne 2 ]; then
  echo "Usar como:"
  echo "  sudo -u postgres $0 <orig_version> <target_version>"
  exit 1
fi

OV=$1
TV=$2
DB="ra2013_tmp_$$"
echo "creando base $DB"
createdb $DB
droplang plpgsql $DB &>/dev/null

echo "levantando versión $OV"
psql $DB -1 -f db/postgresql/ra2013-$OV.sql >/dev/null

rm -f /tmp/ra2013-update-$TV.sql

for f in db/postgresql/ra2013-$TV-*.sql ; do
  if [ ! -f "$f" ] ; then
    echo "No se encontraron los ra2013-$TV.partN.sql"
		dropdb $DB
    exit 1;
  fi
  file $f |grep BOM
  if [ $? -eq 0 ] ; then
    echo "El part $f tiene BOMB!"
    exit 1;
  fi
  echo "concatenando $f"
  echo '-- inicio ' $(basename $f) >> /tmp/ra2013-update-$TV.sql
  cat $f >> /tmp/ra2013-update-$TV.sql
  echo '-- fin ' $(basename $f) >> /tmp/ra2013-update-$TV.sql
done

echo "-- corremos la actualización de la tabla definicion_celda por las dudas"  >> /tmp/ra2013-update-$TV.sql
echo "SELECT actualizar_definicion_celdas();"  >> /tmp/ra2013-update-$TV.sql
echo ""  >> /tmp/ra2013-update-$TV.sql
echo "-- insertamos el nuevo sistema_version en el sistema" >> /tmp/ra2013-update-$TV.sql
echo "INSERT INTO sistema_version (codigo_version, nombre_version, descripcion_version, file_path, fecha, orden) VALUES ('$TV', 'ra2013-$TV', '', '', NOW(), (SELECT COALESCE(max(orden),0)+1 FROM sistema_version));" >> /tmp/ra2013-update-$TV.sql

echo "corriendo updates..."
psql $DB -1 -f /tmp/ra2013-update-$TV.sql >/dev/null
echo "insertando en sistema_version"

echo "generando dump"
echo "pg_dump --format=p --no-privileges --inserts --no-owner $DB -f /tmp/ra2013-$TV.sql"

pg_dump --format=p --no-privileges --inserts --no-owner $DB -f /tmp/ra2013-$TV.sql

cp /tmp/ra2013-update-$TV.sql /tmp/ra2013-$TV.sql db/postgresql

if [ $? -ne 0 ] ; then
  echo "No se pudo copiar los SQL a db/postgresql. Buscar los archivos generados en /tmp/ y copiar"
  echo "cp /tmp/ra2013-update-$TV.sql /tmp/ra2013-$TV.sql db/postgresql"
fi

echo "Para eliminar la base temporal correr:"
echo "dropdb $DB"

