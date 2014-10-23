#!/bin/bash

# README
# Archivo para taggear una nueva version del sistema ra.
#
# Pasos
# 1- Se hace un copy a la nueva version, desde la anterior
# 2- Se realiza un checkout de esta ultima nueva version
# 3- Se realizan exports del archivo ra/config/VERSION y del directorio mqcubed del proyecto library
# 4- Ambos exports se añaden y commitean a la version con la que estamos trabajando
# 5- Se realiza un export en otra carpeta de esta ultima version
# 6- Se realizan modificaciones a algunos archivos, como ser .htacces, update.php, .conf, etc
# 7- Se hace exports de los 2 ultimos tags para poder realizar un diff de sistema, y crear el archivo .diff
# 8- Se crean todos los archivos .zip y .tar
#
#
#
#
#
#

if [ $# -ne 4 -a $# -ne 5 ]; then
    echo "Usar como:"
    echo "  $0 <tipo_tag(V|F|B)> <svn_url> <svn_user> <svn_pass> [--final]"
    echo "  Ejemplo: $0 F http://10.10.10.234/svn usuario pass"
    exit 1
fi

exec 2>tmp/error.log
####################################
# CONFIGURAR BEGIN #################
####################################

tail -f tmp/error.log &

PROYECT_NAME="ra2013"
SVN_URL=$2
SVN_USER=$3
SVN_PASS=$4
DO_REAL_SVN_TAG=$5

LOG_FILE="$PWD/tmp/tagger.log"

####################################
# CONFIGURAR END ###################
####################################

SVN_TRUNK_URL="$SVN_URL/$PROYECT_NAME/trunk"
SVN_TAGS_URL="$SVN_URL/$PROYECT_NAME/tags"
SVN_TRUNK_LIBRARY_URL="$SVN_URL/library/trunk"
SVN_TAGS_LIBRARY_URL="$SVN_URL/library/tags"
TMP_DIR="/tmp/${PROYECT_NAME}_TAGGER"

. ./functions.sh

rm -rf "$TMP_DIR" &> /dev/null
createDir "$TMP_DIR"

UNIXDATE=`date +%s`
YEAR=`date +%Y`
MONTH=`toLower $( date +%b )`
DAY=`date +%d`

zip -h &>/dev/null || fatalError "zip no encontrado";

log "Comenzando proceso de taggeo de version, proyecto: $PROYECT_NAME"

T=`toUpper $1`

TIPO_TAG_OK=0
if [ "$T" = "F" ] || [ "$T" = "V" ] || [ "$T" = "B" ] ; then
  TIPO_TAG=$T
else
  while [ $TIPO_TAG_OK -eq 0 ] ; do
    echo "Elija el tipo de taggeo (V)ersion, (F)uncionalidad, (B)ugs"
    read TIPO_TAG
    TIPO_TAG=`toUpper $TIPO_TAG`
    if [ $TIPO_TAG = "V" ] || [ $TIPO_TAG = "F" ] || [ $TIPO_TAG = "B" ] ; then
      TIPO_TAG_OK=1
    else
      TIPO_TAG_OK=0
    fi
  done
fi

#####################################################
# TESTING
#####################################################
#ULTIMA_VERSION=""
#
#getNewLatestVersion "$TIPO_TAG" 
#echo "ULTIMA_VERSION $ULTIMA_VERSION, $NEW_TAG"
#exit;
##############################################
# END TESTING
##############################################

ULTIMA_VERSION=""

getNewLatestVersion "$TIPO_TAG"

# Esto nos permite, descomentandolo taggear una revision especifica de trunk en vez de HEAD
#EXTRA_SVN="-r2324"

##########################################################
# Se preparan los archivos para el release, se genera el #
# update-VERSION.sql y se genera el archivo VERSION      #
##########################################################
mkdir "$TMP_DIR/$PROYECT_NAME-trunk2"
cd "$TMP_DIR/$PROYECT_NAME-trunk2"
svn checkout $SVN_TRUNK_URL . --username $SVN_USER --password $SVN_PASS $EXTRA_SVN >/dev/null
echo "$NEW_TAG" > "config/VERSION"

### SQLS

if [ "$TIPO_TAG" != "B" ] ; then
  #generarUpdateSql
  run svn delete db/postgresql/$PROYECT_NAME-$NEW_TAG-*.sql --username $SVN_USER --password $SVN_PASS >/dev/null
  ULTIMA_FUNCIONALIDAD=`echo $ULTIMA_VERSION | cut -f1,2 -d .`
  run svn delete db/postgresql/$PROYECT_NAME-$ULTIMA_FUNCIONALIDAD.sql >/dev/null 
  rm -f db/postgresql/$PROYECT_NAME-$ULTIMA_FUNCIONALIDAD.sql &>/dev/null
  #run svn delete db/postgresql/$PROYECT_NAME-update-$ULTIMA_FUNCIONALIDAD.sql --username $SVN_USER --password $SVN_PASS >/dev/null 
  #rm -f db/postgresql/$PROYECT_NAME-update-$ULTIMA_FUNCIONALIDAD.sql &>/dev/null
  run svn add db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql >/dev/null
fi

########################################################################
# Chequeamos si es (F)uncionalidad lo que hay que actualizar           #
# si es true, y no existe el archivo db/postgres/update_$NEW_TAG.sql   #
# entonces preguntamos si quiere seguir con el proceso o parar antes   #
# ningun commit                                                        #
########################################################################
if [ "$TIPO_TAG" != "B" ] && [ ! -f "db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql" ] ; then
  continuar "No existe el archivo db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql" 
fi

########################################################################
# Se exportea el tag creado de la version                              #
########################################################################
PROYECT_TMP_DIR="$TMP_DIR/$PROYECT_NAME"
#if [ ! -d $PROYECT_TMP_DIR ] ; then
#  createDir $PROYECT_TMP_DIR
#fi
if [ -n "$DO_REAL_SVN_TAG" ] ; then
  run svn copy $SVN_TRUNK_URL "$SVN_TAGS_URL/$NEW_TAG" --username $SVN_USER --password $SVN_PASS -m"Tag$NEW_TAG" $EXTRA_SVN > /dev/null
  run svn checkout "$SVN_TAGS_URL/$NEW_TAG" "$PROYECT_TMP_DIR" > /dev/null
  if [ $? -ne 0 ] ; then fatalError "SVN no pudo hacer el tag en $SVN_TAGS_URL/$NEW_TAG" ;fi
else
  run svn export "$TMP_DIR/$PROYECT_NAME-trunk2" "$PROYECT_TMP_DIR" > /dev/null
  if [ $? -ne 0 ] ; then fatalError "SVN no pudo hacer export local de $TMP_DIR/$PROYECT_NAME-trunk2" ;fi
fi
cd $PROYECT_TMP_DIR

########################################################################
# Agrego el library al tag                                             #
# La carpeta mqcubed ahora esta en el manager,                         #
# no es necesaria ni en el release del RA ni en el del Padron          #
########################################################################
#cd "$PROYECT_TMP_DIR/$NEW_TAG"
#run svn export $SVN_TRUNK_LIBRARY_URL/php/mqcubed "$PROYECT_TMP_DIR/mqcubed" --username $SVN_USER --password $SVN_PASS >/dev/null
#if [ $? -gt 0 ] ; then fatalError "SVN no pudo exportar desde $SVN_TRUNK_LIBRARY_URL/php/mqcubed." ;fi

if [ -n "$DO_REAL_SVN_TAG" ] ; then
  #run svn add mqcubed >/dev/null
  #si quedo algun partN.sql es porque estamos haciendo un (B)ugfix y el partN es para el proximo (F)uncionalidad o (V)ersion asi que no los incluyo en el (B)ugfix
  run svn del db/postgresql/$PROYECT_NAME-[.0-9]*-[0-9][0-9][0-9].sql &>/dev/null
else
  #si quedo algun partN.sql es porque estamos haciendo un (B)ugfix y el partN es para el proximo (F)uncionalidad o (V)ersion asi que no los incluyo en el (B)ugfix
  rm -f db/postgresql/$PROYECT_NAME-[.0-9]*-[0-9][0-9][0-9].sql &>/dev/null
fi


#####################################
# Armamos los releases del proyecto #
#####################################

########################################################################
# Genero el diff de archivos para el update                            #
########################################################################
DIFF_ARCHIVE="$PROYECT_NAME-"$ULTIMA_VERSION"_"$NEW_TAG".diff"
cd $TMP_DIR
svn export "$SVN_TAGS_URL/$ULTIMA_VERSION" "$TMP_DIR/$PROYECT_NAME$ULTIMA_VERSION" --username $SVN_USER --password $SVN_PASS 1> /dev/null
if [ -n "$DO_REAL_SVN_TAG" ]; then
	BorrarNoVanEnReleaseSvn "$PROYECT_TMP_DIR"
	echo "$NEW_TAG" > ${PROYECT_TMP_DIR}"/config/VERSION"
  run svn commit $PROYECT_TMP_DIR --username $SVN_USER --password $SVN_PASS -m"Tag$NEW_TAG$EXTRA_SVN" >/dev/null
  run svn commit $TMP_DIR/$PROYECT_NAME-trunk2 --username $SVN_USER --password $SVN_PASS -m"Tag$NEW_TAG$EXTRA_SVN" >/dev/null
  svn export "$SVN_TAGS_URL/$NEW_TAG" "$TMP_DIR/$PROYECT_NAME$NEW_TAG" --username $SVN_USER --password $SVN_PASS 1> /dev/null
  PROYECT_TMP_DIR="$TMP_DIR/$PROYECT_NAME$NEW_TAG" # apunto el $PROYECT_TMP_DIR al checkout
else
  BorrarNoVanEnRelease "$PROYECT_TMP_DIR"
fi
BorrarNoVanEnRelease "$PROYECT_NAME$ULTIMA_VERSION" # por si la ultima version fue taggeada con un tagger roto
diff -Naur -X <(cd ${PROYECT_NAME}${ULTIMA_VERSION}/db/postgresql/;ls -A;cd - ;cd ${PROYECT_TMP_DIR}/db/postgresql/; ls -A) "${PROYECT_NAME}$ULTIMA_VERSION" `basename "$PROYECT_TMP_DIR"` > "$TMP_DIR/$DIFF_ARCHIVE"

########################################################################
# Creo estructura para xampp                                            #
########################################################################
createDir "$TMP_DIR/xampp"
createDir "$TMP_DIR/xampp/apps"
createDir "$TMP_DIR/xampp/apache"
createDir "$TMP_DIR/xampp/apache/conf"
createDir "$TMP_DIR/xampp/apache/conf/sites"
createDir "$TMP_DIR/xampp/apps/$PROYECT_NAME"
cp -Rp "$PROYECT_TMP_DIR/"* "$TMP_DIR/xampp/apps/$PROYECT_NAME/"
cp -p "$TMP_DIR/xampp/apps/$PROYECT_NAME/config/httpd_${PROYECT_NAME}_xampp.conf" "$TMP_DIR/xampp/apache/conf/sites/"
mv "$TMP_DIR/xampp/apps/$PROYECT_NAME/public/dist.htaccess" "$TMP_DIR/xampp/apps/$PROYECT_NAME/public/.htaccess"

########################################################################
# Armo el zip de update                                        #
########################################################################
createDir "$TMP_DIR/${PROYECT_NAME}versiones"
UPDATE_ZIP="$PROYECT_NAME-update_$NEW_TAG.zip"
zip -jr "$TMP_DIR/${PROYECT_NAME}versiones/$UPDATE_ZIP"  "$TMP_DIR/$DIFF_ARCHIVE" 1> /dev/null
if [ -f "$PROYECT_TMP_DIR/db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql" ] ; then
	zip -jg "$TMP_DIR/${PROYECT_NAME}versiones/$UPDATE_ZIP" "$PROYECT_TMP_DIR/db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql" 1> /dev/null
fi
log "Diff comprimido en $UPDATE_ZIP"

########################################################################
# Armo el tar release                                                  #
########################################################################
cd "xampp/apps/$PROYECT_NAME"
ARCHIVE_TAR="$PROYECT_NAME-$NEW_TAG.tar.gz"
tar --owner=www-data --group=www-data -czf "$TMP_DIR/${PROYECT_NAME}versiones/$ARCHIVE_TAR" * 1> /dev/null
log "Proyecto comprimido en $ARCHIVE_TAR"

########################################################################
# Armo el zip release                                                  #
########################################################################
cd $TMP_DIR
ARCHIVE_ZIP="$PROYECT_NAME-$NEW_TAG-xampp.zip"
zip -r "$TMP_DIR/${PROYECT_NAME}versiones/$ARCHIVE_ZIP" "xampp" 1> /dev/null
log "Proyecto comprimido en $ARCHIVE_ZIP"



########################################################################
# Copio los releases al home del usuario                               #
########################################################################
if [ ! -d "$HOME/versiones${PROYECT_NAME}" ] ; then
  createDir $HOME/versiones${PROYECT_NAME}
fi
cp -p "$TMP_DIR/${PROYECT_NAME}versiones/$ARCHIVE_ZIP" $HOME/versiones${PROYECT_NAME}/
cp -p "$TMP_DIR/${PROYECT_NAME}versiones/$ARCHIVE_TAR" $HOME/versiones${PROYECT_NAME}/
cp -p "$TMP_DIR/${PROYECT_NAME}versiones/$UPDATE_ZIP" $HOME/versiones${PROYECT_NAME}/

# antes del borrarDirTmp aproposito, porque necesita el changelog
#DESC_RELEASE=`leerDescripcionChangelog $NEW_TAG`

#borrarDirTmp
log "Los archivos temporales quedaron en $TMP_DIR/ los archivos de release en $HOME/versiones${PROYECT_NAME}/{$ARCHIVE_ZIP,$ARCHIVE_TAR,$UPDATE_ZIP}"

if [ -n "$DO_REAL_SVN_TAG" ]; then
  log "Taggeo de version finalizado correctamente"
else
  log "Para taggear definitivamente correr con --final"
fi
kill %1
