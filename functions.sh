#!/bin/bash

generarUpdateSql () {
  rm $TMP_DIR/$PROYECT_NAME-trunk2/db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql
  if [ ! -f db/postgresql/$PROYECT_NAME-$NEW_TAG.sql ]; then 
    continuar "No existe el archivo db/postgresql/$PROYECT_NAME-$NEW_TAG.sql"
  fi

  SOME_FOUND=""
  for part in db/postgresql/$PROYECT_NAME-$NEW_TAG-*.sql; do 
    #part=db/postgresql/$PROYECT_NAME-update-$NEW_TAG.part$i.sql 
    if [ ! -f "$part" ] ; then
      if [ -z "$SOME_FOUND" ]; then
        continuar "No se encuentran los $PROYECT_NAME-$NEW_TAG.partN.sql"
        break;
      fi
     # si no existe el archivo pero se encontraron algunos partN es porque se
     # termino de aplicar los part. Salgo del for
      break; 
    fi
    echo '-- inicio ' $(basename $part) >>"$TMP_DIR/$PROYECT_NAME-trunk2/db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql"
    cat $part                           >>"$TMP_DIR/$PROYECT_NAME-trunk2/db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql"
    echo '-- fin '    $(basename $part) >>"$TMP_DIR/$PROYECT_NAME-trunk2/db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql"
    run svn delete $part --username $SVN_USER --password $SVN_PASS >/dev/null
    #rm -f $part &>/dev/null
    SOME_FOUND="foo"
  done

  if [ -z "$SOME_FOUND" ] ; then
    fatalError "No se encuentran parts haciendo un tag F o V"
  fi

  cat >>"$TMP_DIR/$PROYECT_NAME-trunk2/db/postgresql/$PROYECT_NAME-update-$NEW_TAG.sql" <<EOF 
    INSERT INTO sistema_version (codigo_version, nombre_version, descripcion_version, file_path, fecha, orden) VALUES ('$NEW_TAG', '$PROYECT_NAME-$NEW_TAG', '', '', NOW(), (SELECT COALESCE(max(orden),0)+1 FROM sistema_version));
EOF
}

generarDiff () {
    PROYECT_NAME=$1
    ULTIMA_VERSION=$2
    NEW_TAG=$3
    DIFF_ARCHIVE="$PROYECT_NAME-"$ULTIMA_VERSION"_"$NEW_TAG".diff"
    cd $TMP_DIR
    svn export "$SVN_TAGS_URL/$ULTIMA_VERSION" "$TMP_DIR/$PROYECT_NAME$ULTIMA_VERSION" --username $SVN_USER --password $SVN_PASS 1> /dev/null
    #svn export "$SVN_TAGS_URL/$NEW_TAG" "$TMP_DIR/$PROYECT_NAME$NEW_TAG" --username $SVN_USER --password $SVN_PASS 1> /dev/null
    #svn export --force "$TMP_DIR/$PROYECT_NAME/$NEW_TAG" "$TMP_DIR/$PROYECT_NAME$NEW_TAG" 1> /dev/null
    BorrarNoVanEnRelease "$PROYECT_NAME$ULTIMA_VERSION"
    BorrarNoVanEnRelease "$PROYECT_TMP_DIR"
    diff -Naur -X <(cd ${PROYECT_NAME}${ULTIMA_VERSION}/db/postgresql/;ls -A;cd - ;cd ${PROYECT_TMP_DIR}/db/postgresql/; ls -A) "${PROYECT_NAME}$ULTIMA_VERSION" "${PROYECT_TMP_DIR}" > "$TMP_DIR/$DIFF_ARCHIVE"
}


log () {
  TMPDATETIME=`date "+%D %H:%M:%S"`
  echo -e "[$TMPDATETIME] $*"
  echo -e "[$TMPDATETIME] $*" >> $LOG_FILE
}

run () {
	log "$PWD: $*"
	$*
}

createDir () {
  if [ ! $1 ] ; then
    log "Directorio a crear esta vacio"
    exit
  fi
  mkdir "$1"
  chmod 777 "$1"
  log "Creando $1..."
}

toLower() {
        echo $1 | tr "[:upper:]" "[:lower:]"
}
toUpper() {
        echo $1 | tr "[:lower:]" "[:upper:]"
}

getNewLatestVersion() {
  ALL_TAGS=$( svn ls $SVN_TAGS_URL --username $SVN_USER --password $SVN_PASS | grep -v Padron)
  if [ ! $1 ] ; then
    fatalError "No se pasaron parametros a getNewLastestVersion"
  fi

  for VER in $ALL_TAGS ; do
    if [[ "$VER" =~ ([0-9.]+)*-+([0-9]+)* ]] ; then
      if [ ${BASH_REMATCH[5]} ] ; then
        COD_PAIS=${BASH_REMATCH[5]}
      elif [ ! ${BASH_REMATCH[5]} ] && [ ${BASH_REMATCH[4]} ] ; then
        COD_PAIS=${BASH_REMATCH[4]}
      elif [ ! ${BASH_REMATCH[4]} ] && [ ! ${BASH_REMATCH[5]} ] && [ ${BASH_REMATCH[3]} ] ; then
        COD_PAIS=${BASH_REMATCH[3]}
      elif [ ! ${BASH_REMATCH[4]} ] && [ ! ${BASH_REMATCH[5]} ] && [ ! ${BASH_REMATCH[3]} ] && [ ${BASH_REMATCH[2]} ] ; then
        COD_PAIS=${BASH_REMATCH[2]}
      fi

    fi
  done

  for VER in $ALL_TAGS ; do
    if [[ "$VER" =~ ([0-9]+).([0-9]+)*.?([0-9]+)*.?([0-9]+)*.?-?([0-9]+)* ]] ; then
      FIRST_NUM=${BASH_REMATCH[1]}
      if [[ $FIRST_NUM_ANT -le $FIRST_NUM ]]  ; then
        FIRST_NUM_ANT=$FIRST_NUM
        VERSION_TMP=$FIRST_NUM_ANT
      fi
    fi
  done
  COUNT=0
  FOUND=0
  VERSION_NUM=$FIRST_NUM_ANT
  FIRST_NUM_ANT=0
  NUMBER[0]=9
  NUMBER[1]=10

  while [[ $FOUND -eq 0 ]] && [[ $COUNT -lt 4 ]] ; do
    for VER in $ALL_TAGS ; do
      if [[ "$VER" =~ "$VERSION_TMP".{1}([0-9]+)+-?$COD_PAIS? ]] ; then
        NEXT_NUM=${BASH_REMATCH[1]}
        if [[ $NEXT_NUM_ANT -le $NEXT_NUM ]]  ; then
          for VER2 in $ALL_TAGS ; do
            if [[ "$VER2" =~ "$VERSION_TMP".{1}([0-9]+)+-?$COD_PAID? ]] ; then
              NEW_NUM=${BASH_REMATCH[1]}
              if [[ $A -le $NEW_NUM ]] ; then
                A=$NEW_NUM
                FOUND_TMP=1
              fi
            fi
          done
          if [[ $FOUND_TMP -eq 1 ]] ; then
            NUMBERS[INDEX++]=$A
            VERSION_TMP=$VERSION_TMP"."$A
          fi
          FOUND_TMP=0
          NEW_NUM=0
          A=0
        fi
      fi
    done
    COUNT=$(( $COUNT+1 ))
    NEXT_NUM_ANT=0
  done
  ULTIMA_VERSION=$VERSION_TMP
  case $1 in
    F)
      NEW_NUM=$(( ${NUMBERS[0]} + 1))
      MAX_VERSION=$VERSION_NUM.$NEW_NUM
    ;;
    B)
      NEW_NUM=$(( ${NUMBERS[1]} + 1))
      MAX_VERSION=$VERSION_NUM.${NUMBERS[0]}.$NEW_NUM
    ;;
    V)
      NEW_NUM=$(( $VERSION_NUM + 1))
      MAX_VERSION=$NEW_NUM".0"
    ;;
  esac
  if [[ $COD_PAIS -gt 0 ]] ; then
    MAX_VERSION=$MAX_VERSION"-"$COD_PAIS
  fi
  NEW_TAG=$MAX_VERSION
  #echo $MAX_VERSION

}

fatalError() {
  log "ERROR: $1"
  kill %1;
  exit 1;
}

borrarDirTmp() {
  log "Borrando archivos temporales usados"
  rm -rf $PROYECT_TMP_DIR
  rm -rf "$TMP_DIR/${PROYECT_NAME}nacional"
  rm -rf "$TMP_DIR/xampp"
  rm -rf "$TMP_DIR/$PROYECT_NAME-trunk2"
  rm -rf "$TMP_DIR/${PROYECT_NAME}update"
  rm -rf "$TMP_DIR/${PROYECT_NAME}versiones"
  rm -rf "$TMP_DIR/$PROYECT_NAME$ULTIMA_VERSION"
  rm -rf "$PROYECT_TMP_DIR"
}

BorrarNoVanEnReleaseSvn() {
	#cosas que no van en el tar/zip del release
	run svn del "$1/tests" &>/dev/null
	run svn del "$1/_devtools" &>/dev/null
	run svn del "$1/functions.sh" &>/dev/null
	run svn del "$1/tagger.sh" &>/dev/null
	run svn del "$1/create_dump.sh" &>/dev/null
	run svn del "$1/instalar.bat" &>/dev/null
	run svn del "$1/${PROYECT_NAME}nacional" &>/dev/null
}

BorrarNoVanEnRelease() {
	#cosas que no van en el tar/zip del release
	rm -rf "$1/tests" &>/dev/null
	rm -rf "$1/_devtools" &>/dev/null
	rm -rf "$1/functions.sh" &>/dev/null
	rm -rf "$1/tagger.sh" &>/dev/null
	rm -rf "$1/create_dump.sh" &>/dev/null
	rm -rf "$1/instalar.bat" &>/dev/null
	rm -rf "$1/${PROYECT_NAME}nacional" &>/dev/null
}

continuar() {
  SI_NO_OK=0
  echo "$1. Desea seguir de todas maneras? [S]i o [N]o ?"
  read SI_NO
  if [ $SI_NO = "n" ] || [ $SI_NO = "N" ] ; then
    #borrarDirTmp
    fatalError "Adios"
  elif [ $SI_NO = "s" ] || [ $SI_NO = "S" ] ; then
    SI_NO_OK=1
  fi
  while [ $SI_NO_OK -eq 0 ] ; do
    if [  $SI_NO = "s" ] || [ $SI_NO = "S" ] ; then
      SI_NO_OK=1
    elif  [ $SI_NO = "n" ] || [ $SI_NO = "N" ] ; then
      #borrarDirTmp
      fatalError "Adios"
    else
      SI_NO_OK=0
      echo "[S]i o [N]o ?"
      read SI_NO
    fi
  done
}

leerDescripcionChangelog() {
VERS=$1
CHLOG=$PROYECT_TMP_DIR/change_log.txt
awk -f - $CHLOG <<AWK
/^\/(\*)+\/$/ { 
  getline; # salto los marcadores con asteriscos
  getline; # leo version
  if ( \$0 == "$VERS") {
    getline; # salto version
    getline; # salto linea en blanco
    if ( \$1 == "Descripción:") {
      getline; # salto titulo
      getline; # salto subrayado
      while ( \$0 != "Log de Cambios:") {
        print
        getline; # leo descripcion
      }
    }
  }
}
AWK
}


