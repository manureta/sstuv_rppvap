#!/bin/bash
if [ $# -ne 3  -a $# -ne 4 ]; then
    echo "Usar como:"
    echo "  $0 <base> <tabla> <archivo> [encoding]"
    echo "  Ejemplo: $0 mibase datos_cruces cruces.csv LATIN1"
    exit 1
fi

DB=$1
TABLA=$2
FILE=$3

ENCODING="UTF8"
if [ $# -eq 4 ]; then
    ENCODING=$4
fi

CANT_CAMPOS=`head -1 "$FILE" |tr ',' '\n' |wc -l`

echo "Dropeando y creando la tabla $TABLA con $CANT_CAMPOS campos...";

SQL="drop table if exists $TABLA; create table $TABLA ("

for (( c=1; c<= $CANT_CAMPOS; c++ ))
do
   SQL="$SQL campo$c varchar, "
done
SQL=`echo "$SQL) with oids;"|sed  s/\,\ \)/\)/g`

psql -h localhost -U postgres -d $DB -c "$SQL"


echo "Importando los datos de $FILE con ENCODING $ENCODING en la tabla $TABLA de $DB ..."

psql -1 -U postgres -h localhost -d $DB -c "COPY $TABLA from STDIN delimiter as ',' null as '' CSV QUOTE '\"' ENCODING '$ENCODING';" < $FILE

echo "Vacuum $TABLA ..."
psql -1 -U postgres -h localhost -d $DB -c "vacuum analyze $TABLA;"



