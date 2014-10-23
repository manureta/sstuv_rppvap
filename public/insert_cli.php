#!/usr/bin/env php
<?php
error_reporting(E_ALL);
$opts  = "h::";
$opts .= "u::";
$opts .= "p::";
$opts .= "d:";
$opts .= "i::";

$options = getopt($opts, array('recreatedb::', 'texttrash::'));
if (!array_key_exists('d', $options)) {
    echo <<<EOF
    USAGE:
    -d                      Nombre de la base de datos (parametro obligatorio)
    -u                      Usuario para conectarse
    -p                      Password del usuario
    -h host[:port]          Host y puerto, opcional
    -i                      Cantidad de inserts en la tabla dato
    --recreatedb            Indica si se quieren recrear las tablas 'campo' y 'dato'
    --texttrash             Texto que se agrega al valor de algunos insert como para emular campos con dato character varying
    
    EXAMPLE:    php insert_batch_cli.php -upostgres -ddoc2014_test -i99999 -p --recreatedb
    
EOF;
    exit;
}
$hostport = isset($options['h']) ? $options['h'] : '';
$hostport = explode(':', $hostport);
$host = isset($hostport[0]) ? $hostport[0] : '';
$port = isset($hostport[1]) ? $hostport[1] : '';

if (!$port) {
    $port = 5432;
}
$user = isset($options['u']) ? $options['u'] : '';
$password = isset($options['p']) ? $options['p'] : '';
$inserts = isset($options['i']) ? $options['i'] : '1000';
$dbname = $options['d'] ;

$conn_string = " dbname='$dbname' ";
if ($password) {
    $conn_string .= " password='$password'";
}
if ($user) {
    $conn_string .= " user='$user'";
}
if ($host) {
    $conn_string .= " host='$host'";
}
if ($port) {
    $conn_string .= " port='$port'";
}

$link = pg_connect($conn_string);

if (array_key_exists('recreatedb', $options)) {
    $sql = <<<EOF
            TRUNCATE TABLE campo CASCADE;
            DROP TABLE IF EXISTS campo CASCADE;
EOF;
    pg_query($sql);
    $sql = <<<EOF
            CREATE TABLE campo
(
  id_campo serial NOT NULL,
  id_cuadro integer NOT NULL,
  c_tipo_dato integer NOT NULL,
  obligatorio boolean NOT NULL DEFAULT false,
  nombre character varying NOT NULL,
  CONSTRAINT campo_pkey PRIMARY KEY (id_campo)
)
WITH (
  OIDS=FALSE
);
EOF;
    $res = pg_query($sql);
    $sql = <<<EOF
            TRUNCATE TABLE dato CASCADE;
            DROP TABLE IF EXISTS dato CASCADE;
EOF;
    pg_query($sql);
    $sql = <<<EOF
CREATE TABLE dato
(
  id_dato serial NOT NULL,
  id_campo integer NOT NULL,
  id_personal integer NOT NULL,
  id_designacion integer NOT NULL,
  valor character varying NOT NULL,
  fecha_modificacion timestamp NOT NULL,
  CONSTRAINT dato_pkey PRIMARY KEY (id_dato),
  CONSTRAINT a_fkey FOREIGN KEY (id_campo)
      REFERENCES campo (id_campo) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
EOF;
    pg_query($sql);
    $sql = 'INSERT INTO campo (id_cuadro,c_tipo_dato,obligatorio,nombre) VALUES ';
    $values = array();
    for ($i = 0; $i < $inserts; $i++) {
        $values[] = "(1,1,FALSE,'Nombre$i')";
    }
    $sql .= implode(",\n", $values);
    pg_query($sql);
    
    echo "Tablas 'campo' y 'dato' creadas ok...\n";
}

$values = array();
$intTimeInit = time();
echo "Time init $intTimeInit\n";
echo "Insertando $inserts en 'dato'...\n";
for ($i = 0; $i < $inserts; $i++) {
    if ($i % ceil($inserts/100) == 0) {
        echo "INSERT $i/$inserts...\n";
    }
    $val = rand(1,99999);
    if ($val % 2 == 0) {
        if (array_key_exists('texttrash', $options)) {
            $val .= $options['texttrash'];
        } else {
            $val .= 'abcdefghijklmn';
        }
    }
    $now = date('Y-m-d H:i:s');
    $query = 'INSERT INTO dato (id_campo,id_personal,id_designacion,valor,fecha_modificacion) VALUES ';
    $query .= "(1,1,1,'$val',TIMESTAMP '$now')";
    pg_query($query);
}
$intTimeEnd = time();
echo "Time end $intTimeEnd\n";
echo "Total ".($intTimeEnd-$intTimeInit)."\n";

