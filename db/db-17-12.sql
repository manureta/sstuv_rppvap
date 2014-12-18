--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2014-12-17 18:23:03 ART

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 6 (class 2615 OID 18299)
-- Name: topology; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA topology;


ALTER SCHEMA topology OWNER TO postgres;

--
-- TOC entry 216 (class 3079 OID 11829)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2538 (class 0 OID 0)
-- Dependencies: 216
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 380 (class 1255 OID 29339)
-- Name: addauth(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION addauth(text) RETURNS boolean
    LANGUAGE plpgsql
    AS $_$ 
DECLARE
	lockid alias for $1;
	okay boolean;
	myrec record;
BEGIN
	-- check to see if table exists
	--  if not, CREATE TEMP TABLE mylock (transid xid, lockcode text)
	okay := 'f';
	FOR myrec IN SELECT * FROM pg_class WHERE relname = 'temp_lock_have_table' LOOP
		okay := 't';
	END LOOP; 
	IF (okay <> 't') THEN 
		CREATE TEMP TABLE temp_lock_have_table (transid xid, lockcode text);
			-- this will only work from pgsql7.4 up
			-- ON COMMIT DELETE ROWS;
	END IF;

	--  INSERT INTO mylock VALUES ( $1)
--	EXECUTE 'INSERT INTO temp_lock_have_table VALUES ( '||
--		quote_literal(getTransactionID()) || ',' ||
--		quote_literal(lockid) ||')';

	INSERT INTO temp_lock_have_table VALUES (getTransactionID(), lockid);

	RETURN true::boolean;
END;
$_$;


ALTER FUNCTION public.addauth(text) OWNER TO sstuv_app;

--
-- TOC entry 381 (class 1255 OID 29340)
-- Name: addgeometrycolumn(character varying, character varying, integer, character varying, integer); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION addgeometrycolumn(character varying, character varying, integer, character varying, integer) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	ret  text;
BEGIN
	SELECT AddGeometryColumn('','',$1,$2,$3,$4,$5) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.addgeometrycolumn(character varying, character varying, integer, character varying, integer) OWNER TO sstuv_app;

--
-- TOC entry 382 (class 1255 OID 29341)
-- Name: addgeometrycolumn(character varying, character varying, character varying, integer, character varying, integer); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION addgeometrycolumn(character varying, character varying, character varying, integer, character varying, integer) RETURNS text
    LANGUAGE plpgsql STABLE STRICT
    AS $_$
DECLARE
	ret  text;
BEGIN
	SELECT AddGeometryColumn('',$1,$2,$3,$4,$5,$6) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.addgeometrycolumn(character varying, character varying, character varying, integer, character varying, integer) OWNER TO sstuv_app;

--
-- TOC entry 383 (class 1255 OID 29342)
-- Name: addgeometrycolumn(character varying, character varying, character varying, character varying, integer, character varying, integer); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION addgeometrycolumn(character varying, character varying, character varying, character varying, integer, character varying, integer) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	catalog_name alias for $1;
	schema_name alias for $2;
	table_name alias for $3;
	column_name alias for $4;
	new_srid alias for $5;
	new_type alias for $6;
	new_dim alias for $7;
	rec RECORD;
	sr varchar;
	real_schema name;
	sql text;

BEGIN

	-- Verify geometry type
	IF ( NOT ( (new_type = 'GEOMETRY') OR
			   (new_type = 'GEOMETRYCOLLECTION') OR
			   (new_type = 'POINT') OR
			   (new_type = 'MULTIPOINT') OR
			   (new_type = 'POLYGON') OR
			   (new_type = 'MULTIPOLYGON') OR
			   (new_type = 'LINESTRING') OR
			   (new_type = 'MULTILINESTRING') OR
			   (new_type = 'GEOMETRYCOLLECTIONM') OR
			   (new_type = 'POINTM') OR
			   (new_type = 'MULTIPOINTM') OR
			   (new_type = 'POLYGONM') OR
			   (new_type = 'MULTIPOLYGONM') OR
			   (new_type = 'LINESTRINGM') OR
			   (new_type = 'MULTILINESTRINGM') OR
			   (new_type = 'CIRCULARSTRING') OR
			   (new_type = 'CIRCULARSTRINGM') OR
			   (new_type = 'COMPOUNDCURVE') OR
			   (new_type = 'COMPOUNDCURVEM') OR
			   (new_type = 'CURVEPOLYGON') OR
			   (new_type = 'CURVEPOLYGONM') OR
			   (new_type = 'MULTICURVE') OR
			   (new_type = 'MULTICURVEM') OR
			   (new_type = 'MULTISURFACE') OR
			   (new_type = 'MULTISURFACEM')) )
	THEN
		RAISE EXCEPTION 'Invalid type name - valid ones are:
	POINT, MULTIPOINT,
	LINESTRING, MULTILINESTRING,
	POLYGON, MULTIPOLYGON,
	CIRCULARSTRING, COMPOUNDCURVE, MULTICURVE,
	CURVEPOLYGON, MULTISURFACE,
	GEOMETRY, GEOMETRYCOLLECTION,
	POINTM, MULTIPOINTM,
	LINESTRINGM, MULTILINESTRINGM,
	POLYGONM, MULTIPOLYGONM,
	CIRCULARSTRINGM, COMPOUNDCURVEM, MULTICURVEM
	CURVEPOLYGONM, MULTISURFACEM,
	or GEOMETRYCOLLECTIONM';
		RETURN 'fail';
	END IF;


	-- Verify dimension
	IF ( (new_dim >4) OR (new_dim <0) ) THEN
		RAISE EXCEPTION 'invalid dimension';
		RETURN 'fail';
	END IF;

	IF ( (new_type LIKE '%M') AND (new_dim!=3) ) THEN
		RAISE EXCEPTION 'TypeM needs 3 dimensions';
		RETURN 'fail';
	END IF;


	-- Verify SRID
	IF ( new_srid != -1 ) THEN
		SELECT SRID INTO sr FROM spatial_ref_sys WHERE SRID = new_srid;
		IF NOT FOUND THEN
			RAISE EXCEPTION 'AddGeometryColumns() - invalid SRID';
			RETURN 'fail';
		END IF;
	END IF;


	-- Verify schema
	IF ( schema_name IS NOT NULL AND schema_name != '' ) THEN
		sql := 'SELECT nspname FROM pg_namespace ' ||
			'WHERE text(nspname) = ' || quote_literal(schema_name) ||
			'LIMIT 1';
		RAISE DEBUG '%', sql;
		EXECUTE sql INTO real_schema;

		IF ( real_schema IS NULL ) THEN
			RAISE EXCEPTION 'Schema % is not a valid schemaname', quote_literal(schema_name);
			RETURN 'fail';
		END IF;
	END IF;

	IF ( real_schema IS NULL ) THEN
		RAISE DEBUG 'Detecting schema';
		sql := 'SELECT n.nspname AS schemaname ' ||
			'FROM pg_catalog.pg_class c ' ||
			  'JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace ' ||
			'WHERE c.relkind = ' || quote_literal('r') ||
			' AND n.nspname NOT IN (' || quote_literal('pg_catalog') || ', ' || quote_literal('pg_toast') || ')' ||
			' AND pg_catalog.pg_table_is_visible(c.oid)' ||
			' AND c.relname = ' || quote_literal(table_name);
		RAISE DEBUG '%', sql;
		EXECUTE sql INTO real_schema;

		IF ( real_schema IS NULL ) THEN
			RAISE EXCEPTION 'Table % does not occur in the search_path', quote_literal(table_name);
			RETURN 'fail';
		END IF;
	END IF;


	-- Add geometry column to table
	sql := 'ALTER TABLE ' ||
		quote_ident(real_schema) || '.' || quote_ident(table_name)
		|| ' ADD COLUMN ' || quote_ident(column_name) ||
		' geometry ';
	RAISE DEBUG '%', sql;
	EXECUTE sql;


	-- Delete stale record in geometry_columns (if any)
	sql := 'DELETE FROM geometry_columns WHERE
		f_table_catalog = ' || quote_literal('') ||
		' AND f_table_schema = ' ||
		quote_literal(real_schema) ||
		' AND f_table_name = ' || quote_literal(table_name) ||
		' AND f_geometry_column = ' || quote_literal(column_name);
	RAISE DEBUG '%', sql;
	EXECUTE sql;


	-- Add record in geometry_columns
	sql := 'INSERT INTO geometry_columns (f_table_catalog,f_table_schema,f_table_name,' ||
										  'f_geometry_column,coord_dimension,srid,type)' ||
		' VALUES (' ||
		quote_literal('') || ',' ||
		quote_literal(real_schema) || ',' ||
		quote_literal(table_name) || ',' ||
		quote_literal(column_name) || ',' ||
		new_dim::text || ',' ||
		new_srid::text || ',' ||
		quote_literal(new_type) || ')';
	RAISE DEBUG '%', sql;
	EXECUTE sql;


	-- Add table CHECKs
	sql := 'ALTER TABLE ' ||
		quote_ident(real_schema) || '.' || quote_ident(table_name)
		|| ' ADD CONSTRAINT '
		|| quote_ident('enforce_srid_' || column_name)
		|| ' CHECK (ST_SRID(' || quote_ident(column_name) ||
		') = ' || new_srid::text || ')' ;
	RAISE DEBUG '%', sql;
	EXECUTE sql;

	sql := 'ALTER TABLE ' ||
		quote_ident(real_schema) || '.' || quote_ident(table_name)
		|| ' ADD CONSTRAINT '
		|| quote_ident('enforce_dims_' || column_name)
		|| ' CHECK (ST_NDims(' || quote_ident(column_name) ||
		') = ' || new_dim::text || ')' ;
	RAISE DEBUG '%', sql;
	EXECUTE sql;

	IF ( NOT (new_type = 'GEOMETRY')) THEN
		sql := 'ALTER TABLE ' ||
			quote_ident(real_schema) || '.' || quote_ident(table_name) || ' ADD CONSTRAINT ' ||
			quote_ident('enforce_geotype_' || column_name) ||
			' CHECK (GeometryType(' ||
			quote_ident(column_name) || ')=' ||
			quote_literal(new_type) || ' OR (' ||
			quote_ident(column_name) || ') is null)';
		RAISE DEBUG '%', sql;
		EXECUTE sql;
	END IF;

	RETURN
		real_schema || '.' ||
		table_name || '.' || column_name ||
		' SRID:' || new_srid::text ||
		' TYPE:' || new_type ||
		' DIMS:' || new_dim::text || ' ';
END;
$_$;


ALTER FUNCTION public.addgeometrycolumn(character varying, character varying, character varying, character varying, integer, character varying, integer) OWNER TO sstuv_app;

--
-- TOC entry 264 (class 1255 OID 18167)
-- Name: addpoint(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION addpoint(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_addpoint';


ALTER FUNCTION public.addpoint(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 265 (class 1255 OID 18168)
-- Name: addpoint(geometry, geometry, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION addpoint(geometry, geometry, integer) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_addpoint';


ALTER FUNCTION public.addpoint(geometry, geometry, integer) OWNER TO postgres;

--
-- TOC entry 263 (class 1255 OID 18166)
-- Name: affine(geometry, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION affine(geometry, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_affine';


ALTER FUNCTION public.affine(geometry, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 266 (class 1255 OID 18169)
-- Name: area(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION area(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_area_polygon';


ALTER FUNCTION public.area(geometry) OWNER TO postgres;

--
-- TOC entry 267 (class 1255 OID 18170)
-- Name: area2d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION area2d(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_area_polygon';


ALTER FUNCTION public.area2d(geometry) OWNER TO postgres;

--
-- TOC entry 268 (class 1255 OID 18171)
-- Name: asewkb(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION asewkb(geometry) RETURNS bytea
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'WKBFromLWGEOM';


ALTER FUNCTION public.asewkb(geometry) OWNER TO postgres;

--
-- TOC entry 269 (class 1255 OID 18172)
-- Name: asewkb(geometry, text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION asewkb(geometry, text) RETURNS bytea
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'WKBFromLWGEOM';


ALTER FUNCTION public.asewkb(geometry, text) OWNER TO postgres;

--
-- TOC entry 270 (class 1255 OID 18173)
-- Name: asewkt(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION asewkt(geometry) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_asEWKT';


ALTER FUNCTION public.asewkt(geometry) OWNER TO postgres;

--
-- TOC entry 271 (class 1255 OID 18174)
-- Name: ashexewkb(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION ashexewkb(geometry) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_asHEXEWKB';


ALTER FUNCTION public.ashexewkb(geometry) OWNER TO postgres;

--
-- TOC entry 272 (class 1255 OID 18175)
-- Name: ashexewkb(geometry, text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION ashexewkb(geometry, text) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_asHEXEWKB';


ALTER FUNCTION public.ashexewkb(geometry, text) OWNER TO postgres;

--
-- TOC entry 273 (class 1255 OID 18176)
-- Name: assvg(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION assvg(geometry) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_asSVG';


ALTER FUNCTION public.assvg(geometry) OWNER TO postgres;

--
-- TOC entry 274 (class 1255 OID 18177)
-- Name: assvg(geometry, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION assvg(geometry, integer) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_asSVG';


ALTER FUNCTION public.assvg(geometry, integer) OWNER TO postgres;

--
-- TOC entry 275 (class 1255 OID 18178)
-- Name: assvg(geometry, integer, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION assvg(geometry, integer, integer) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_asSVG';


ALTER FUNCTION public.assvg(geometry, integer, integer) OWNER TO postgres;

--
-- TOC entry 276 (class 1255 OID 18179)
-- Name: azimuth(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION azimuth(geometry, geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_azimuth';


ALTER FUNCTION public.azimuth(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 277 (class 1255 OID 18182)
-- Name: boundary(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION boundary(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'boundary';


ALTER FUNCTION public.boundary(geometry) OWNER TO postgres;

--
-- TOC entry 278 (class 1255 OID 18183)
-- Name: buffer(geometry, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION buffer(geometry, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT COST 100
    AS '$libdir/postgis-2.1', 'buffer';


ALTER FUNCTION public.buffer(geometry, double precision) OWNER TO postgres;

--
-- TOC entry 279 (class 1255 OID 18184)
-- Name: buildarea(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION buildarea(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT COST 100
    AS '$libdir/postgis-2.1', 'ST_BuildArea';


ALTER FUNCTION public.buildarea(geometry) OWNER TO postgres;

--
-- TOC entry 280 (class 1255 OID 18185)
-- Name: centroid(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION centroid(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'centroid';


ALTER FUNCTION public.centroid(geometry) OWNER TO postgres;

--
-- TOC entry 384 (class 1255 OID 29345)
-- Name: checkauth(text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION checkauth(text, text) RETURNS integer
    LANGUAGE sql
    AS $_$ SELECT CheckAuth('', $1, $2) $_$;


ALTER FUNCTION public.checkauth(text, text) OWNER TO sstuv_app;

--
-- TOC entry 385 (class 1255 OID 29346)
-- Name: checkauth(text, text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION checkauth(text, text, text) RETURNS integer
    LANGUAGE plpgsql
    AS $_$ 
DECLARE
	schema text;
BEGIN
	IF NOT LongTransactionsEnabled() THEN
		RAISE EXCEPTION 'Long transaction support disabled, use EnableLongTransaction() to enable.';
	END IF;

	if ( $1 != '' ) THEN
		schema = $1;
	ELSE
		SELECT current_schema() into schema;
	END IF;

	-- TODO: check for an already existing trigger ?

	EXECUTE 'CREATE TRIGGER check_auth BEFORE UPDATE OR DELETE ON ' 
		|| quote_ident(schema) || '.' || quote_ident($2)
		||' FOR EACH ROW EXECUTE PROCEDURE CheckAuthTrigger('
		|| quote_literal($3) || ')';

	RETURN 0;
END;
$_$;


ALTER FUNCTION public.checkauth(text, text, text) OWNER TO sstuv_app;

--
-- TOC entry 374 (class 1255 OID 18282)
-- Name: collect(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION collect(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE
    AS '$libdir/postgis-2.1', 'LWGEOM_collect';


ALTER FUNCTION public.collect(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 375 (class 1255 OID 18283)
-- Name: combine_bbox(box2d, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION combine_bbox(box2d, geometry) RETURNS box2d
    LANGUAGE c IMMUTABLE
    AS '$libdir/postgis-2.1', 'BOX2D_combine';


ALTER FUNCTION public.combine_bbox(box2d, geometry) OWNER TO postgres;

--
-- TOC entry 376 (class 1255 OID 18284)
-- Name: combine_bbox(box3d, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION combine_bbox(box3d, geometry) RETURNS box3d
    LANGUAGE c IMMUTABLE
    AS '$libdir/postgis-2.1', 'BOX3D_combine';


ALTER FUNCTION public.combine_bbox(box3d, geometry) OWNER TO postgres;

--
-- TOC entry 281 (class 1255 OID 18186)
-- Name: contains(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION contains(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'contains';


ALTER FUNCTION public.contains(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 282 (class 1255 OID 18187)
-- Name: convexhull(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION convexhull(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT COST 100
    AS '$libdir/postgis-2.1', 'convexhull';


ALTER FUNCTION public.convexhull(geometry) OWNER TO postgres;

--
-- TOC entry 283 (class 1255 OID 18188)
-- Name: crosses(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION crosses(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'crosses';


ALTER FUNCTION public.crosses(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 285 (class 1255 OID 18190)
-- Name: difference(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION difference(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'difference';


ALTER FUNCTION public.difference(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 286 (class 1255 OID 18191)
-- Name: dimension(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION dimension(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_dimension';


ALTER FUNCTION public.dimension(geometry) OWNER TO postgres;

--
-- TOC entry 386 (class 1255 OID 29347)
-- Name: disablelongtransactions(); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION disablelongtransactions() RETURNS text
    LANGUAGE plpgsql
    AS $$ 
DECLARE
	rec RECORD;

BEGIN

	--
	-- Drop all triggers applied by CheckAuth()
	--
	FOR rec IN
		SELECT c.relname, t.tgname, t.tgargs FROM pg_trigger t, pg_class c, pg_proc p
		WHERE p.proname = 'checkauthtrigger' and t.tgfoid = p.oid and t.tgrelid = c.oid
	LOOP
		EXECUTE 'DROP TRIGGER ' || quote_ident(rec.tgname) ||
			' ON ' || quote_ident(rec.relname);
	END LOOP;

	--
	-- Drop the authorization_table table
	--
	FOR rec IN SELECT * FROM pg_class WHERE relname = 'authorization_table' LOOP
		DROP TABLE authorization_table;
	END LOOP;

	--
	-- Drop the authorized_tables view
	--
	FOR rec IN SELECT * FROM pg_class WHERE relname = 'authorized_tables' LOOP
		DROP VIEW authorized_tables;
	END LOOP;

	RETURN 'Long transactions support disabled';
END;
$$;


ALTER FUNCTION public.disablelongtransactions() OWNER TO sstuv_app;

--
-- TOC entry 287 (class 1255 OID 18192)
-- Name: disjoint(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION disjoint(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'disjoint';


ALTER FUNCTION public.disjoint(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 284 (class 1255 OID 18189)
-- Name: distance(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION distance(geometry, geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT COST 100
    AS '$libdir/postgis-2.1', 'LWGEOM_mindistance2d';


ALTER FUNCTION public.distance(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 288 (class 1255 OID 18193)
-- Name: distance_sphere(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION distance_sphere(geometry, geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT COST 100
    AS '$libdir/postgis-2.1', 'LWGEOM_distance_sphere';


ALTER FUNCTION public.distance_sphere(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 387 (class 1255 OID 29348)
-- Name: dropgeometrycolumn(character varying, character varying); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION dropgeometrycolumn(character varying, character varying) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	ret text;
BEGIN
	SELECT DropGeometryColumn('','',$1,$2) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.dropgeometrycolumn(character varying, character varying) OWNER TO sstuv_app;

--
-- TOC entry 388 (class 1255 OID 29349)
-- Name: dropgeometrycolumn(character varying, character varying, character varying); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION dropgeometrycolumn(character varying, character varying, character varying) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	ret text;
BEGIN
	SELECT DropGeometryColumn('',$1,$2,$3) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.dropgeometrycolumn(character varying, character varying, character varying) OWNER TO sstuv_app;

--
-- TOC entry 389 (class 1255 OID 29350)
-- Name: dropgeometrycolumn(character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION dropgeometrycolumn(character varying, character varying, character varying, character varying) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	catalog_name alias for $1;
	schema_name alias for $2;
	table_name alias for $3;
	column_name alias for $4;
	myrec RECORD;
	okay boolean;
	real_schema name;

BEGIN


	-- Find, check or fix schema_name
	IF ( schema_name != '' ) THEN
		okay = 'f';

		FOR myrec IN SELECT nspname FROM pg_namespace WHERE text(nspname) = schema_name LOOP
			okay := 't';
		END LOOP;

		IF ( okay <> 't' ) THEN
			RAISE NOTICE 'Invalid schema name - using current_schema()';
			SELECT current_schema() into real_schema;
		ELSE
			real_schema = schema_name;
		END IF;
	ELSE
		SELECT current_schema() into real_schema;
	END IF;

	-- Find out if the column is in the geometry_columns table
	okay = 'f';
	FOR myrec IN SELECT * from geometry_columns where f_table_schema = text(real_schema) and f_table_name = table_name and f_geometry_column = column_name LOOP
		okay := 't';
	END LOOP;
	IF (okay <> 't') THEN
		RAISE EXCEPTION 'column not found in geometry_columns table';
		RETURN 'f';
	END IF;

	-- Remove ref from geometry_columns table
	EXECUTE 'delete from geometry_columns where f_table_schema = ' ||
		quote_literal(real_schema) || ' and f_table_name = ' ||
		quote_literal(table_name)  || ' and f_geometry_column = ' ||
		quote_literal(column_name);

	-- Remove table column
	EXECUTE 'ALTER TABLE ' || quote_ident(real_schema) || '.' ||
		quote_ident(table_name) || ' DROP COLUMN ' ||
		quote_ident(column_name);

	RETURN real_schema || '.' || table_name || '.' || column_name ||' effectively removed.';

END;
$_$;


ALTER FUNCTION public.dropgeometrycolumn(character varying, character varying, character varying, character varying) OWNER TO sstuv_app;

--
-- TOC entry 390 (class 1255 OID 29351)
-- Name: dropgeometrytable(character varying); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION dropgeometrytable(character varying) RETURNS text
    LANGUAGE sql STRICT
    AS $_$ SELECT DropGeometryTable('','',$1) $_$;


ALTER FUNCTION public.dropgeometrytable(character varying) OWNER TO sstuv_app;

--
-- TOC entry 391 (class 1255 OID 29352)
-- Name: dropgeometrytable(character varying, character varying); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION dropgeometrytable(character varying, character varying) RETURNS text
    LANGUAGE sql STRICT
    AS $_$ SELECT DropGeometryTable('',$1,$2) $_$;


ALTER FUNCTION public.dropgeometrytable(character varying, character varying) OWNER TO sstuv_app;

--
-- TOC entry 392 (class 1255 OID 29353)
-- Name: dropgeometrytable(character varying, character varying, character varying); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION dropgeometrytable(character varying, character varying, character varying) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	catalog_name alias for $1;
	schema_name alias for $2;
	table_name alias for $3;
	real_schema name;

BEGIN

	IF ( schema_name = '' ) THEN
		SELECT current_schema() into real_schema;
	ELSE
		real_schema = schema_name;
	END IF;

	-- Remove refs from geometry_columns table
	EXECUTE 'DELETE FROM geometry_columns WHERE ' ||
		'f_table_schema = ' || quote_literal(real_schema) ||
		' AND ' ||
		' f_table_name = ' || quote_literal(table_name);

	-- Remove table
	EXECUTE 'DROP TABLE '
		|| quote_ident(real_schema) || '.' ||
		quote_ident(table_name);

	RETURN
		real_schema || '.' ||
		table_name ||' dropped.';

END;
$_$;


ALTER FUNCTION public.dropgeometrytable(character varying, character varying, character varying) OWNER TO sstuv_app;

--
-- TOC entry 289 (class 1255 OID 18195)
-- Name: dump(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION dump(geometry) RETURNS SETOF geometry_dump
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_dump';


ALTER FUNCTION public.dump(geometry) OWNER TO postgres;

--
-- TOC entry 290 (class 1255 OID 18196)
-- Name: dumprings(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION dumprings(geometry) RETURNS SETOF geometry_dump
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_dump_rings';


ALTER FUNCTION public.dumprings(geometry) OWNER TO postgres;

--
-- TOC entry 393 (class 1255 OID 29354)
-- Name: enablelongtransactions(); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION enablelongtransactions() RETURNS text
    LANGUAGE plpgsql
    AS $$ 
DECLARE
	"query" text;
	exists bool;
	rec RECORD;

BEGIN

	exists = 'f';
	FOR rec IN SELECT * FROM pg_class WHERE relname = 'authorization_table'
	LOOP
		exists = 't';
	END LOOP;

	IF NOT exists
	THEN
		"query" = 'CREATE TABLE authorization_table (
			toid oid, -- table oid
			rid text, -- row id
			expires timestamp,
			authid text
		)';
		EXECUTE "query";
	END IF;

	exists = 'f';
	FOR rec IN SELECT * FROM pg_class WHERE relname = 'authorized_tables'
	LOOP
		exists = 't';
	END LOOP;

	IF NOT exists THEN
		"query" = 'CREATE VIEW authorized_tables AS ' ||
			'SELECT ' ||
			'n.nspname as schema, ' ||
			'c.relname as table, trim(' ||
			quote_literal(chr(92) || '000') ||
			' from t.tgargs) as id_column ' ||
			'FROM pg_trigger t, pg_class c, pg_proc p ' ||
			', pg_namespace n ' ||
			'WHERE p.proname = ' || quote_literal('checkauthtrigger') ||
			' AND c.relnamespace = n.oid' ||
			' AND t.tgfoid = p.oid and t.tgrelid = c.oid';
		EXECUTE "query";
	END IF;

	RETURN 'Long transactions support enabled';
END;
$$;


ALTER FUNCTION public.enablelongtransactions() OWNER TO sstuv_app;

--
-- TOC entry 295 (class 1255 OID 18203)
-- Name: endpoint(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION endpoint(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_endpoint_linestring';


ALTER FUNCTION public.endpoint(geometry) OWNER TO postgres;

--
-- TOC entry 291 (class 1255 OID 18197)
-- Name: envelope(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION envelope(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_envelope';


ALTER FUNCTION public.envelope(geometry) OWNER TO postgres;

--
-- TOC entry 224 (class 1255 OID 18129)
-- Name: estimated_extent(text, text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION estimated_extent(text, text) RETURNS box2d
    LANGUAGE c IMMUTABLE STRICT SECURITY DEFINER
    AS '$libdir/postgis-2.1', 'geometry_estimated_extent';


ALTER FUNCTION public.estimated_extent(text, text) OWNER TO postgres;

--
-- TOC entry 223 (class 1255 OID 18128)
-- Name: estimated_extent(text, text, text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION estimated_extent(text, text, text) RETURNS box2d
    LANGUAGE c IMMUTABLE STRICT SECURITY DEFINER
    AS '$libdir/postgis-2.1', 'geometry_estimated_extent';


ALTER FUNCTION public.estimated_extent(text, text, text) OWNER TO postgres;

--
-- TOC entry 292 (class 1255 OID 18198)
-- Name: expand(box2d, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION expand(box2d, double precision) RETURNS box2d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX2D_expand';


ALTER FUNCTION public.expand(box2d, double precision) OWNER TO postgres;

--
-- TOC entry 293 (class 1255 OID 18199)
-- Name: expand(box3d, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION expand(box3d, double precision) RETURNS box3d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_expand';


ALTER FUNCTION public.expand(box3d, double precision) OWNER TO postgres;

--
-- TOC entry 294 (class 1255 OID 18200)
-- Name: expand(geometry, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION expand(geometry, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_expand';


ALTER FUNCTION public.expand(geometry, double precision) OWNER TO postgres;

--
-- TOC entry 296 (class 1255 OID 18204)
-- Name: exteriorring(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION exteriorring(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_exteriorring_polygon';


ALTER FUNCTION public.exteriorring(geometry) OWNER TO postgres;

--
-- TOC entry 394 (class 1255 OID 29357)
-- Name: find_srid(character varying, character varying, character varying); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION find_srid(character varying, character varying, character varying) RETURNS integer
    LANGUAGE plpgsql IMMUTABLE STRICT
    AS $_$
DECLARE
	schem text;
	tabl text;
	sr int4;
BEGIN
	IF $1 IS NULL THEN
	  RAISE EXCEPTION 'find_srid() - schema is NULL!';
	END IF;
	IF $2 IS NULL THEN
	  RAISE EXCEPTION 'find_srid() - table name is NULL!';
	END IF;
	IF $3 IS NULL THEN
	  RAISE EXCEPTION 'find_srid() - column name is NULL!';
	END IF;
	schem = $1;
	tabl = $2;
-- if the table contains a . and the schema is empty
-- split the table into a schema and a table
-- otherwise drop through to default behavior
	IF ( schem = '' and tabl LIKE '%.%' ) THEN
	 schem = substr(tabl,1,strpos(tabl,'.')-1);
	 tabl = substr(tabl,length(schem)+2);
	ELSE
	 schem = schem || '%';
	END IF;

	select SRID into sr from geometry_columns where f_table_schema like schem and f_table_name = tabl and f_geometry_column = $3;
	IF NOT FOUND THEN
	   RAISE EXCEPTION 'find_srid() - couldnt find the corresponding SRID - is the geometry registered in the GEOMETRY_COLUMNS table?  Is there an uppercase/lowercase missmatch?';
	END IF;
	return sr;
END;
$_$;


ALTER FUNCTION public.find_srid(character varying, character varying, character varying) OWNER TO sstuv_app;

--
-- TOC entry 255 (class 1255 OID 18158)
-- Name: fix_geometry_columns(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION fix_geometry_columns() RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
	mislinked record;
	result text;
	linked integer;
	deleted integer;
	foundschema integer;
BEGIN

	-- Since 7.3 schema support has been added.
	-- Previous postgis versions used to put the database name in
	-- the schema column. This needs to be fixed, so we try to
	-- set the correct schema for each geometry_colums record
	-- looking at table, column, type and srid.
	
	return 'This function is obsolete now that geometry_columns is a view';

END;
$$;


ALTER FUNCTION public.fix_geometry_columns() OWNER TO postgres;

--
-- TOC entry 297 (class 1255 OID 18205)
-- Name: force_2d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION force_2d(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_2d';


ALTER FUNCTION public.force_2d(geometry) OWNER TO postgres;

--
-- TOC entry 298 (class 1255 OID 18206)
-- Name: force_3d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION force_3d(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_3dz';


ALTER FUNCTION public.force_3d(geometry) OWNER TO postgres;

--
-- TOC entry 299 (class 1255 OID 18207)
-- Name: force_3dm(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION force_3dm(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_3dm';


ALTER FUNCTION public.force_3dm(geometry) OWNER TO postgres;

--
-- TOC entry 300 (class 1255 OID 18208)
-- Name: force_3dz(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION force_3dz(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_3dz';


ALTER FUNCTION public.force_3dz(geometry) OWNER TO postgres;

--
-- TOC entry 301 (class 1255 OID 18209)
-- Name: force_4d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION force_4d(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_4d';


ALTER FUNCTION public.force_4d(geometry) OWNER TO postgres;

--
-- TOC entry 302 (class 1255 OID 18210)
-- Name: force_collection(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION force_collection(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_collection';


ALTER FUNCTION public.force_collection(geometry) OWNER TO postgres;

--
-- TOC entry 303 (class 1255 OID 18211)
-- Name: forcerhr(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION forcerhr(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_clockwise_poly';


ALTER FUNCTION public.forcerhr(geometry) OWNER TO postgres;

--
-- TOC entry 232 (class 1255 OID 18134)
-- Name: geometryfromtext(text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION geometryfromtext(text) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_from_text';


ALTER FUNCTION public.geometryfromtext(text) OWNER TO postgres;

--
-- TOC entry 231 (class 1255 OID 18133)
-- Name: geometryfromtext(text, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION geometryfromtext(text, integer) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_from_text';


ALTER FUNCTION public.geometryfromtext(text, integer) OWNER TO postgres;

--
-- TOC entry 304 (class 1255 OID 18212)
-- Name: geometryn(geometry, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION geometryn(geometry, integer) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_geometryn_collection';


ALTER FUNCTION public.geometryn(geometry, integer) OWNER TO postgres;

--
-- TOC entry 233 (class 1255 OID 18135)
-- Name: geomfromwkb(bytea); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION geomfromwkb(bytea) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_from_WKB';


ALTER FUNCTION public.geomfromwkb(bytea) OWNER TO postgres;

--
-- TOC entry 305 (class 1255 OID 18213)
-- Name: geomunion(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION geomunion(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'geomunion';


ALTER FUNCTION public.geomunion(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 395 (class 1255 OID 29358)
-- Name: get_proj4_from_srid(integer); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION get_proj4_from_srid(integer) RETURNS text
    LANGUAGE plpgsql IMMUTABLE STRICT
    AS $_$
BEGIN
	RETURN proj4text::text FROM spatial_ref_sys WHERE srid= $1;
END;
$_$;


ALTER FUNCTION public.get_proj4_from_srid(integer) OWNER TO sstuv_app;

--
-- TOC entry 306 (class 1255 OID 18214)
-- Name: getbbox(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION getbbox(geometry) RETURNS box2d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_to_BOX2D';


ALTER FUNCTION public.getbbox(geometry) OWNER TO postgres;

--
-- TOC entry 314 (class 1255 OID 18222)
-- Name: interiorringn(geometry, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION interiorringn(geometry, integer) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_interiorringn_polygon';


ALTER FUNCTION public.interiorringn(geometry, integer) OWNER TO postgres;

--
-- TOC entry 315 (class 1255 OID 18223)
-- Name: intersection(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION intersection(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'intersection';


ALTER FUNCTION public.intersection(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 307 (class 1255 OID 18215)
-- Name: intersects(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION intersects(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'intersects';


ALTER FUNCTION public.intersects(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 316 (class 1255 OID 18224)
-- Name: isclosed(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION isclosed(geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_isclosed';


ALTER FUNCTION public.isclosed(geometry) OWNER TO postgres;

--
-- TOC entry 317 (class 1255 OID 18225)
-- Name: isempty(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION isempty(geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_isempty';


ALTER FUNCTION public.isempty(geometry) OWNER TO postgres;

--
-- TOC entry 308 (class 1255 OID 18216)
-- Name: isring(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION isring(geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'isring';


ALTER FUNCTION public.isring(geometry) OWNER TO postgres;

--
-- TOC entry 309 (class 1255 OID 18217)
-- Name: issimple(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION issimple(geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'issimple';


ALTER FUNCTION public.issimple(geometry) OWNER TO postgres;

--
-- TOC entry 318 (class 1255 OID 18226)
-- Name: isvalid(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION isvalid(geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT COST 100
    AS '$libdir/postgis-2.1', 'isvalid';


ALTER FUNCTION public.isvalid(geometry) OWNER TO postgres;

--
-- TOC entry 321 (class 1255 OID 18229)
-- Name: length(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION length(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_length_linestring';


ALTER FUNCTION public.length(geometry) OWNER TO postgres;

--
-- TOC entry 320 (class 1255 OID 18228)
-- Name: length2d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION length2d(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_length2d_linestring';


ALTER FUNCTION public.length2d(geometry) OWNER TO postgres;

--
-- TOC entry 319 (class 1255 OID 18227)
-- Name: length3d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION length3d(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_length_linestring';


ALTER FUNCTION public.length3d(geometry) OWNER TO postgres;

--
-- TOC entry 322 (class 1255 OID 18230)
-- Name: line_interpolate_point(geometry, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION line_interpolate_point(geometry, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_line_interpolate_point';


ALTER FUNCTION public.line_interpolate_point(geometry, double precision) OWNER TO postgres;

--
-- TOC entry 323 (class 1255 OID 18231)
-- Name: line_locate_point(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION line_locate_point(geometry, geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_line_locate_point';


ALTER FUNCTION public.line_locate_point(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 324 (class 1255 OID 18232)
-- Name: line_substring(geometry, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION line_substring(geometry, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_line_substring';


ALTER FUNCTION public.line_substring(geometry, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 325 (class 1255 OID 18233)
-- Name: linefrommultipoint(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION linefrommultipoint(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_line_from_mpoint';


ALTER FUNCTION public.linefrommultipoint(geometry) OWNER TO postgres;

--
-- TOC entry 310 (class 1255 OID 18218)
-- Name: linemerge(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION linemerge(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT COST 100
    AS '$libdir/postgis-2.1', 'linemerge';


ALTER FUNCTION public.linemerge(geometry) OWNER TO postgres;

--
-- TOC entry 326 (class 1255 OID 18234)
-- Name: locate_between_measures(geometry, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION locate_between_measures(geometry, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_locate_between_m';


ALTER FUNCTION public.locate_between_measures(geometry, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 396 (class 1255 OID 29359)
-- Name: lockrow(text, text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION lockrow(text, text, text) RETURNS integer
    LANGUAGE sql STRICT
    AS $_$ SELECT LockRow(current_schema(), $1, $2, $3, now()::timestamp+'1:00'); $_$;


ALTER FUNCTION public.lockrow(text, text, text) OWNER TO sstuv_app;

--
-- TOC entry 397 (class 1255 OID 29360)
-- Name: lockrow(text, text, text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION lockrow(text, text, text, text) RETURNS integer
    LANGUAGE sql STRICT
    AS $_$ SELECT LockRow($1, $2, $3, $4, now()::timestamp+'1:00'); $_$;


ALTER FUNCTION public.lockrow(text, text, text, text) OWNER TO sstuv_app;

--
-- TOC entry 398 (class 1255 OID 29361)
-- Name: lockrow(text, text, text, timestamp without time zone); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION lockrow(text, text, text, timestamp without time zone) RETURNS integer
    LANGUAGE sql STRICT
    AS $_$ SELECT LockRow(current_schema(), $1, $2, $3, $4); $_$;


ALTER FUNCTION public.lockrow(text, text, text, timestamp without time zone) OWNER TO sstuv_app;

--
-- TOC entry 399 (class 1255 OID 29362)
-- Name: lockrow(text, text, text, text, timestamp without time zone); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION lockrow(text, text, text, text, timestamp without time zone) RETURNS integer
    LANGUAGE plpgsql STRICT
    AS $_$ 
DECLARE
	myschema alias for $1;
	mytable alias for $2;
	myrid   alias for $3;
	authid alias for $4;
	expires alias for $5;
	ret int;
	mytoid oid;
	myrec RECORD;
	
BEGIN

	IF NOT LongTransactionsEnabled() THEN
		RAISE EXCEPTION 'Long transaction support disabled, use EnableLongTransaction() to enable.';
	END IF;

	EXECUTE 'DELETE FROM authorization_table WHERE expires < now()'; 

	SELECT c.oid INTO mytoid FROM pg_class c, pg_namespace n
		WHERE c.relname = mytable
		AND c.relnamespace = n.oid
		AND n.nspname = myschema;

	-- RAISE NOTICE 'toid: %', mytoid;

	FOR myrec IN SELECT * FROM authorization_table WHERE 
		toid = mytoid AND rid = myrid
	LOOP
		IF myrec.authid != authid THEN
			RETURN 0;
		ELSE
			RETURN 1;
		END IF;
	END LOOP;

	EXECUTE 'INSERT INTO authorization_table VALUES ('||
		quote_literal(mytoid::text)||','||quote_literal(myrid)||
		','||quote_literal(expires::text)||
		','||quote_literal(authid) ||')';

	GET DIAGNOSTICS ret = ROW_COUNT;

	RETURN ret;
END;
$_$;


ALTER FUNCTION public.lockrow(text, text, text, text, timestamp without time zone) OWNER TO sstuv_app;

--
-- TOC entry 400 (class 1255 OID 29363)
-- Name: longtransactionsenabled(); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION longtransactionsenabled() RETURNS boolean
    LANGUAGE plpgsql
    AS $$ 
DECLARE
	rec RECORD;
BEGIN
	FOR rec IN SELECT oid FROM pg_class WHERE relname = 'authorized_tables'
	LOOP
		return 't';
	END LOOP;
	return 'f';
END;
$$;


ALTER FUNCTION public.longtransactionsenabled() OWNER TO sstuv_app;

--
-- TOC entry 327 (class 1255 OID 18235)
-- Name: m(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION m(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_m_point';


ALTER FUNCTION public.m(geometry) OWNER TO postgres;

--
-- TOC entry 311 (class 1255 OID 18219)
-- Name: makebox2d(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makebox2d(geometry, geometry) RETURNS box2d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX2D_construct';


ALTER FUNCTION public.makebox2d(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 328 (class 1255 OID 18236)
-- Name: makebox3d(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makebox3d(geometry, geometry) RETURNS box3d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_construct';


ALTER FUNCTION public.makebox3d(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 329 (class 1255 OID 18237)
-- Name: makeline(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makeline(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_makeline';


ALTER FUNCTION public.makeline(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 330 (class 1255 OID 18238)
-- Name: makepoint(double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makepoint(double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_makepoint';


ALTER FUNCTION public.makepoint(double precision, double precision) OWNER TO postgres;

--
-- TOC entry 331 (class 1255 OID 18239)
-- Name: makepoint(double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makepoint(double precision, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_makepoint';


ALTER FUNCTION public.makepoint(double precision, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 332 (class 1255 OID 18240)
-- Name: makepoint(double precision, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makepoint(double precision, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_makepoint';


ALTER FUNCTION public.makepoint(double precision, double precision, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 333 (class 1255 OID 18241)
-- Name: makepointm(double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makepointm(double precision, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_makepoint3dm';


ALTER FUNCTION public.makepointm(double precision, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 312 (class 1255 OID 18220)
-- Name: makepolygon(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION makepolygon(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_makepoly';


ALTER FUNCTION public.makepolygon(geometry) OWNER TO postgres;

--
-- TOC entry 334 (class 1255 OID 18242)
-- Name: max_distance(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION max_distance(geometry, geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_maxdistance2d_linestring';


ALTER FUNCTION public.max_distance(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 335 (class 1255 OID 18243)
-- Name: mem_size(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION mem_size(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_mem_size';


ALTER FUNCTION public.mem_size(geometry) OWNER TO postgres;

--
-- TOC entry 313 (class 1255 OID 18221)
-- Name: multi(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION multi(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_force_multi';


ALTER FUNCTION public.multi(geometry) OWNER TO postgres;

--
-- TOC entry 234 (class 1255 OID 18136)
-- Name: noop(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION noop(geometry) RETURNS geometry
    LANGUAGE c STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_noop';


ALTER FUNCTION public.noop(geometry) OWNER TO postgres;

--
-- TOC entry 338 (class 1255 OID 18246)
-- Name: npoints(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION npoints(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_npoints';


ALTER FUNCTION public.npoints(geometry) OWNER TO postgres;

--
-- TOC entry 339 (class 1255 OID 18247)
-- Name: nrings(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION nrings(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_nrings';


ALTER FUNCTION public.nrings(geometry) OWNER TO postgres;

--
-- TOC entry 340 (class 1255 OID 18248)
-- Name: numgeometries(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION numgeometries(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_numgeometries_collection';


ALTER FUNCTION public.numgeometries(geometry) OWNER TO postgres;

--
-- TOC entry 336 (class 1255 OID 18244)
-- Name: numinteriorring(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION numinteriorring(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_numinteriorrings_polygon';


ALTER FUNCTION public.numinteriorring(geometry) OWNER TO postgres;

--
-- TOC entry 337 (class 1255 OID 18245)
-- Name: numinteriorrings(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION numinteriorrings(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_numinteriorrings_polygon';


ALTER FUNCTION public.numinteriorrings(geometry) OWNER TO postgres;

--
-- TOC entry 341 (class 1255 OID 18249)
-- Name: numpoints(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION numpoints(geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_numpoints_linestring';


ALTER FUNCTION public.numpoints(geometry) OWNER TO postgres;

--
-- TOC entry 342 (class 1255 OID 18250)
-- Name: overlaps(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION "overlaps"(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'overlaps';


ALTER FUNCTION public."overlaps"(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 344 (class 1255 OID 18252)
-- Name: perimeter2d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION perimeter2d(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_perimeter2d_poly';


ALTER FUNCTION public.perimeter2d(geometry) OWNER TO postgres;

--
-- TOC entry 343 (class 1255 OID 18251)
-- Name: perimeter3d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION perimeter3d(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_perimeter_poly';


ALTER FUNCTION public.perimeter3d(geometry) OWNER TO postgres;

--
-- TOC entry 345 (class 1255 OID 18253)
-- Name: point_inside_circle(geometry, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION point_inside_circle(geometry, double precision, double precision, double precision) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_inside_circle_point';


ALTER FUNCTION public.point_inside_circle(geometry, double precision, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 346 (class 1255 OID 18254)
-- Name: pointn(geometry, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION pointn(geometry, integer) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_pointn_linestring';


ALTER FUNCTION public.pointn(geometry, integer) OWNER TO postgres;

--
-- TOC entry 347 (class 1255 OID 18255)
-- Name: pointonsurface(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION pointonsurface(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'pointonsurface';


ALTER FUNCTION public.pointonsurface(geometry) OWNER TO postgres;

--
-- TOC entry 401 (class 1255 OID 29364)
-- Name: populate_geometry_columns(); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION populate_geometry_columns() RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
	inserted    integer;
	oldcount    integer;
	probed      integer;
	stale       integer;
	gcs         RECORD;
	gc          RECORD;
	gsrid       integer;
	gndims      integer;
	gtype       text;
	query       text;
	gc_is_valid boolean;

BEGIN
	SELECT count(*) INTO oldcount FROM geometry_columns;
	inserted := 0;

	EXECUTE 'TRUNCATE geometry_columns';

	-- Count the number of geometry columns in all tables and views
	SELECT count(DISTINCT c.oid) INTO probed
	FROM pg_class c,
		 pg_attribute a,
		 pg_type t,
		 pg_namespace n
	WHERE (c.relkind = 'r' OR c.relkind = 'v')
	AND t.typname = 'geometry'
	AND a.attisdropped = false
	AND a.atttypid = t.oid
	AND a.attrelid = c.oid
	AND c.relnamespace = n.oid
	AND n.nspname NOT ILIKE 'pg_temp%';

	-- Iterate through all non-dropped geometry columns
	RAISE DEBUG 'Processing Tables.....';

	FOR gcs IN
	SELECT DISTINCT ON (c.oid) c.oid, n.nspname, c.relname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'r'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND n.nspname NOT ILIKE 'pg_temp%'
	LOOP

	inserted := inserted + populate_geometry_columns(gcs.oid);
	END LOOP;

	-- Add views to geometry columns table
	RAISE DEBUG 'Processing Views.....';
	FOR gcs IN
	SELECT DISTINCT ON (c.oid) c.oid, n.nspname, c.relname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'v'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
	LOOP

	inserted := inserted + populate_geometry_columns(gcs.oid);
	END LOOP;

	IF oldcount > inserted THEN
	stale = oldcount-inserted;
	ELSE
	stale = 0;
	END IF;

	RETURN 'probed:' ||probed|| ' inserted:'||inserted|| ' conflicts:'||probed-inserted|| ' deleted:'||stale;
END

$$;


ALTER FUNCTION public.populate_geometry_columns() OWNER TO sstuv_app;

--
-- TOC entry 402 (class 1255 OID 29365)
-- Name: populate_geometry_columns(oid); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION populate_geometry_columns(tbl_oid oid) RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
	gcs         RECORD;
	gc          RECORD;
	gsrid       integer;
	gndims      integer;
	gtype       text;
	query       text;
	gc_is_valid boolean;
	inserted    integer;

BEGIN
	inserted := 0;

	-- Iterate through all geometry columns in this table
	FOR gcs IN
	SELECT n.nspname, c.relname, a.attname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'r'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND n.nspname NOT ILIKE 'pg_temp%'
		AND c.oid = tbl_oid
	LOOP

	RAISE DEBUG 'Processing table %.%.%', gcs.nspname, gcs.relname, gcs.attname;

	DELETE FROM geometry_columns
	  WHERE f_table_schema = gcs.nspname
	  AND f_table_name = gcs.relname
	  AND f_geometry_column = gcs.attname;

	gc_is_valid := true;

	-- Try to find srid check from system tables (pg_constraint)
	gsrid :=
		(SELECT replace(replace(split_part(s.consrc, ' = ', 2), ')', ''), '(', '')
		 FROM pg_class c, pg_namespace n, pg_attribute a, pg_constraint s
		 WHERE n.nspname = gcs.nspname
		 AND c.relname = gcs.relname
		 AND a.attname = gcs.attname
		 AND a.attrelid = c.oid
		 AND s.connamespace = n.oid
		 AND s.conrelid = c.oid
		 AND a.attnum = ANY (s.conkey)
		 AND s.consrc LIKE '%srid(% = %');
	IF (gsrid IS NULL) THEN
		-- Try to find srid from the geometry itself
		EXECUTE 'SELECT srid(' || quote_ident(gcs.attname) || ')
				 FROM ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gsrid := gc.srid;

		-- Try to apply srid check to column
		IF (gsrid IS NOT NULL) THEN
			BEGIN
				EXECUTE 'ALTER TABLE ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
						 ADD CONSTRAINT ' || quote_ident('enforce_srid_' || gcs.attname) || '
						 CHECK (srid(' || quote_ident(gcs.attname) || ') = ' || gsrid || ')';
			EXCEPTION
				WHEN check_violation THEN
					RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not apply constraint CHECK (srid(%) = %)', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname), quote_ident(gcs.attname), gsrid;
					gc_is_valid := false;
			END;
		END IF;
	END IF;

	-- Try to find ndims check from system tables (pg_constraint)
	gndims :=
		(SELECT replace(split_part(s.consrc, ' = ', 2), ')', '')
		 FROM pg_class c, pg_namespace n, pg_attribute a, pg_constraint s
		 WHERE n.nspname = gcs.nspname
		 AND c.relname = gcs.relname
		 AND a.attname = gcs.attname
		 AND a.attrelid = c.oid
		 AND s.connamespace = n.oid
		 AND s.conrelid = c.oid
		 AND a.attnum = ANY (s.conkey)
		 AND s.consrc LIKE '%ndims(% = %');
	IF (gndims IS NULL) THEN
		-- Try to find ndims from the geometry itself
		EXECUTE 'SELECT ndims(' || quote_ident(gcs.attname) || ')
				 FROM ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gndims := gc.ndims;

		-- Try to apply ndims check to column
		IF (gndims IS NOT NULL) THEN
			BEGIN
				EXECUTE 'ALTER TABLE ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
						 ADD CONSTRAINT ' || quote_ident('enforce_dims_' || gcs.attname) || '
						 CHECK (ndims(' || quote_ident(gcs.attname) || ') = '||gndims||')';
			EXCEPTION
				WHEN check_violation THEN
					RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not apply constraint CHECK (ndims(%) = %)', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname), quote_ident(gcs.attname), gndims;
					gc_is_valid := false;
			END;
		END IF;
	END IF;

	-- Try to find geotype check from system tables (pg_constraint)
	gtype :=
		(SELECT replace(split_part(s.consrc, '''', 2), ')', '')
		 FROM pg_class c, pg_namespace n, pg_attribute a, pg_constraint s
		 WHERE n.nspname = gcs.nspname
		 AND c.relname = gcs.relname
		 AND a.attname = gcs.attname
		 AND a.attrelid = c.oid
		 AND s.connamespace = n.oid
		 AND s.conrelid = c.oid
		 AND a.attnum = ANY (s.conkey)
		 AND s.consrc LIKE '%geometrytype(% = %');
	IF (gtype IS NULL) THEN
		-- Try to find geotype from the geometry itself
		EXECUTE 'SELECT geometrytype(' || quote_ident(gcs.attname) || ')
				 FROM ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gtype := gc.geometrytype;
		--IF (gtype IS NULL) THEN
		--    gtype := 'GEOMETRY';
		--END IF;

		-- Try to apply geometrytype check to column
		IF (gtype IS NOT NULL) THEN
			BEGIN
				EXECUTE 'ALTER TABLE ONLY ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				ADD CONSTRAINT ' || quote_ident('enforce_geotype_' || gcs.attname) || '
				CHECK ((geometrytype(' || quote_ident(gcs.attname) || ') = ' || quote_literal(gtype) || ') OR (' || quote_ident(gcs.attname) || ' IS NULL))';
			EXCEPTION
				WHEN check_violation THEN
					-- No geometry check can be applied. This column contains a number of geometry types.
					RAISE WARNING 'Could not add geometry type check (%) to table column: %.%.%', gtype, quote_ident(gcs.nspname),quote_ident(gcs.relname),quote_ident(gcs.attname);
			END;
		END IF;
	END IF;

	IF (gsrid IS NULL) THEN
		RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine the srid', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
	ELSIF (gndims IS NULL) THEN
		RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine the number of dimensions', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
	ELSIF (gtype IS NULL) THEN
		RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine the geometry type', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
	ELSE
		-- Only insert into geometry_columns if table constraints could be applied.
		IF (gc_is_valid) THEN
			INSERT INTO geometry_columns (f_table_catalog,f_table_schema, f_table_name, f_geometry_column, coord_dimension, srid, type)
			VALUES ('', gcs.nspname, gcs.relname, gcs.attname, gndims, gsrid, gtype);
			inserted := inserted + 1;
		END IF;
	END IF;
	END LOOP;

	-- Add views to geometry columns table
	FOR gcs IN
	SELECT n.nspname, c.relname, a.attname
		FROM pg_class c,
			 pg_attribute a,
			 pg_type t,
			 pg_namespace n
		WHERE c.relkind = 'v'
		AND t.typname = 'geometry'
		AND a.attisdropped = false
		AND a.atttypid = t.oid
		AND a.attrelid = c.oid
		AND c.relnamespace = n.oid
		AND n.nspname NOT ILIKE 'pg_temp%'
		AND c.oid = tbl_oid
	LOOP
		RAISE DEBUG 'Processing view %.%.%', gcs.nspname, gcs.relname, gcs.attname;

	DELETE FROM geometry_columns
	  WHERE f_table_schema = gcs.nspname
	  AND f_table_name = gcs.relname
	  AND f_geometry_column = gcs.attname;
	  
		EXECUTE 'SELECT ndims(' || quote_ident(gcs.attname) || ')
				 FROM ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gndims := gc.ndims;

		EXECUTE 'SELECT srid(' || quote_ident(gcs.attname) || ')
				 FROM ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gsrid := gc.srid;

		EXECUTE 'SELECT geometrytype(' || quote_ident(gcs.attname) || ')
				 FROM ' || quote_ident(gcs.nspname) || '.' || quote_ident(gcs.relname) || '
				 WHERE ' || quote_ident(gcs.attname) || ' IS NOT NULL LIMIT 1'
			INTO gc;
		gtype := gc.geometrytype;

		IF (gndims IS NULL) THEN
			RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine ndims', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
		ELSIF (gsrid IS NULL) THEN
			RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine srid', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
		ELSIF (gtype IS NULL) THEN
			RAISE WARNING 'Not inserting ''%'' in ''%.%'' into geometry_columns: could not determine gtype', quote_ident(gcs.attname), quote_ident(gcs.nspname), quote_ident(gcs.relname);
		ELSE
			query := 'INSERT INTO geometry_columns (f_table_catalog,f_table_schema, f_table_name, f_geometry_column, coord_dimension, srid, type) ' ||
					 'VALUES ('''', ' || quote_literal(gcs.nspname) || ',' || quote_literal(gcs.relname) || ',' || quote_literal(gcs.attname) || ',' || gndims || ',' || gsrid || ',' || quote_literal(gtype) || ')';
			EXECUTE query;
			inserted := inserted + 1;
		END IF;
	END LOOP;

	RETURN inserted;
END

$$;


ALTER FUNCTION public.populate_geometry_columns(tbl_oid oid) OWNER TO sstuv_app;

--
-- TOC entry 403 (class 1255 OID 29367)
-- Name: postgis_full_version(); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION postgis_full_version() RETURNS text
    LANGUAGE plpgsql IMMUTABLE
    AS $$
DECLARE
	libver text;
	projver text;
	geosver text;
	libxmlver text;
	usestats bool;
	dbproc text;
	relproc text;
	fullver text;
BEGIN
	SELECT postgis_lib_version() INTO libver;
	SELECT postgis_proj_version() INTO projver;
	SELECT postgis_geos_version() INTO geosver;
	SELECT postgis_libxml_version() INTO libxmlver;
	SELECT postgis_uses_stats() INTO usestats;
	SELECT postgis_scripts_installed() INTO dbproc;
	SELECT postgis_scripts_released() INTO relproc;

	fullver = 'POSTGIS="' || libver || '"';

	IF  geosver IS NOT NULL THEN
		fullver = fullver || ' GEOS="' || geosver || '"';
	END IF;

	IF  projver IS NOT NULL THEN
		fullver = fullver || ' PROJ="' || projver || '"';
	END IF;

	IF  libxmlver IS NOT NULL THEN
		fullver = fullver || ' LIBXML="' || libxmlver || '"';
	END IF;

	IF usestats THEN
		fullver = fullver || ' USE_STATS';
	END IF;

	-- fullver = fullver || ' DBPROC="' || dbproc || '"';
	-- fullver = fullver || ' RELPROC="' || relproc || '"';

	IF dbproc != relproc THEN
		fullver = fullver || ' (procs from ' || dbproc || ' need upgrade)';
	END IF;

	RETURN fullver;
END
$$;


ALTER FUNCTION public.postgis_full_version() OWNER TO sstuv_app;

--
-- TOC entry 404 (class 1255 OID 29368)
-- Name: postgis_scripts_build_date(); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION postgis_scripts_build_date() RETURNS text
    LANGUAGE sql IMMUTABLE
    AS $$SELECT '2012-10-07 12:25:36'::text AS version$$;


ALTER FUNCTION public.postgis_scripts_build_date() OWNER TO sstuv_app;

--
-- TOC entry 405 (class 1255 OID 29369)
-- Name: postgis_scripts_installed(); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION postgis_scripts_installed() RETURNS text
    LANGUAGE sql IMMUTABLE
    AS $$SELECT '1.5 r7360'::text AS version$$;


ALTER FUNCTION public.postgis_scripts_installed() OWNER TO sstuv_app;

--
-- TOC entry 256 (class 1255 OID 18159)
-- Name: probe_geometry_columns(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION probe_geometry_columns() RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
	inserted integer;
	oldcount integer;
	probed integer;
	stale integer;
BEGIN


	RETURN 'This function is obsolete now that geometry_columns is a view';
END

$$;


ALTER FUNCTION public.probe_geometry_columns() OWNER TO postgres;

--
-- TOC entry 348 (class 1255 OID 18256)
-- Name: relate(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION relate(geometry, geometry) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'relate_full';


ALTER FUNCTION public.relate(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 349 (class 1255 OID 18257)
-- Name: relate(geometry, geometry, text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION relate(geometry, geometry, text) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'relate_pattern';


ALTER FUNCTION public.relate(geometry, geometry, text) OWNER TO postgres;

--
-- TOC entry 350 (class 1255 OID 18258)
-- Name: removepoint(geometry, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION removepoint(geometry, integer) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_removepoint';


ALTER FUNCTION public.removepoint(geometry, integer) OWNER TO postgres;

--
-- TOC entry 254 (class 1255 OID 18157)
-- Name: rename_geometry_table_constraints(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION rename_geometry_table_constraints() RETURNS text
    LANGUAGE sql IMMUTABLE
    AS $$
SELECT 'rename_geometry_table_constraint() is obsoleted'::text
$$;


ALTER FUNCTION public.rename_geometry_table_constraints() OWNER TO postgres;

--
-- TOC entry 351 (class 1255 OID 18259)
-- Name: reverse(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION reverse(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_reverse';


ALTER FUNCTION public.reverse(geometry) OWNER TO postgres;

--
-- TOC entry 235 (class 1255 OID 18137)
-- Name: se_is3d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION se_is3d(geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_hasz';


ALTER FUNCTION public.se_is3d(geometry) OWNER TO postgres;

--
-- TOC entry 236 (class 1255 OID 18138)
-- Name: se_ismeasured(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION se_ismeasured(geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_hasm';


ALTER FUNCTION public.se_ismeasured(geometry) OWNER TO postgres;

--
-- TOC entry 239 (class 1255 OID 18141)
-- Name: se_locatebetween(geometry, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION se_locatebetween(geometry, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_locate_between_m';


ALTER FUNCTION public.se_locatebetween(geometry, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 238 (class 1255 OID 18140)
-- Name: se_m(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION se_m(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_m_point';


ALTER FUNCTION public.se_m(geometry) OWNER TO postgres;

--
-- TOC entry 237 (class 1255 OID 18139)
-- Name: se_z(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION se_z(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_z_point';


ALTER FUNCTION public.se_z(geometry) OWNER TO postgres;

--
-- TOC entry 352 (class 1255 OID 18260)
-- Name: segmentize(geometry, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION segmentize(geometry, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_segmentize2d';


ALTER FUNCTION public.segmentize(geometry, double precision) OWNER TO postgres;

--
-- TOC entry 353 (class 1255 OID 18261)
-- Name: setpoint(geometry, integer, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION setpoint(geometry, integer, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_setpoint_linestring';


ALTER FUNCTION public.setpoint(geometry, integer, geometry) OWNER TO postgres;

--
-- TOC entry 354 (class 1255 OID 18262)
-- Name: shift_longitude(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION shift_longitude(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_longitude_shift';


ALTER FUNCTION public.shift_longitude(geometry) OWNER TO postgres;

--
-- TOC entry 355 (class 1255 OID 18263)
-- Name: simplify(geometry, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION simplify(geometry, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_simplify2d';


ALTER FUNCTION public.simplify(geometry, double precision) OWNER TO postgres;

--
-- TOC entry 356 (class 1255 OID 18264)
-- Name: snaptogrid(geometry, double precision, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION snaptogrid(geometry, double precision, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_snaptogrid';


ALTER FUNCTION public.snaptogrid(geometry, double precision, double precision, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 357 (class 1255 OID 18265)
-- Name: snaptogrid(geometry, geometry, double precision, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION snaptogrid(geometry, geometry, double precision, double precision, double precision, double precision) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_snaptogrid_pointoff';


ALTER FUNCTION public.snaptogrid(geometry, geometry, double precision, double precision, double precision, double precision) OWNER TO postgres;

--
-- TOC entry 406 (class 1255 OID 29370)
-- Name: st_area(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_area(text) RETURNS double precision
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_Area($1::geometry);  $_$;


ALTER FUNCTION public.st_area(text) OWNER TO sstuv_app;

--
-- TOC entry 407 (class 1255 OID 29371)
-- Name: st_asbinary(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_asbinary(text) RETURNS bytea
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_AsBinary($1::geometry);  $_$;


ALTER FUNCTION public.st_asbinary(text) OWNER TO sstuv_app;

--
-- TOC entry 408 (class 1255 OID 29372)
-- Name: st_asgeojson(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_asgeojson(text) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_AsGeoJson($1::geometry);  $_$;


ALTER FUNCTION public.st_asgeojson(text) OWNER TO sstuv_app;

--
-- TOC entry 409 (class 1255 OID 29373)
-- Name: st_asgml(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_asgml(text) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_AsGML($1::geometry);  $_$;


ALTER FUNCTION public.st_asgml(text) OWNER TO sstuv_app;

--
-- TOC entry 410 (class 1255 OID 29374)
-- Name: st_askml(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_askml(text) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_AsKML($1::geometry);  $_$;


ALTER FUNCTION public.st_askml(text) OWNER TO sstuv_app;

--
-- TOC entry 411 (class 1255 OID 29375)
-- Name: st_assvg(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_assvg(text) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_AsSVG($1::geometry);  $_$;


ALTER FUNCTION public.st_assvg(text) OWNER TO sstuv_app;

--
-- TOC entry 412 (class 1255 OID 29376)
-- Name: st_astext(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_astext(text) RETURNS text
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_AsText($1::geometry);  $_$;


ALTER FUNCTION public.st_astext(text) OWNER TO sstuv_app;

--
-- TOC entry 245 (class 1255 OID 18148)
-- Name: st_box(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box(box3d) RETURNS box
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_to_BOX';


ALTER FUNCTION public.st_box(box3d) OWNER TO postgres;

--
-- TOC entry 242 (class 1255 OID 18145)
-- Name: st_box(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box(geometry) RETURNS box
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_to_BOX';


ALTER FUNCTION public.st_box(geometry) OWNER TO postgres;

--
-- TOC entry 243 (class 1255 OID 18146)
-- Name: st_box2d(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box2d(box3d) RETURNS box2d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_to_BOX2D';


ALTER FUNCTION public.st_box2d(box3d) OWNER TO postgres;

--
-- TOC entry 240 (class 1255 OID 18142)
-- Name: st_box2d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box2d(geometry) RETURNS box2d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_to_BOX2D';


ALTER FUNCTION public.st_box2d(geometry) OWNER TO postgres;

--
-- TOC entry 244 (class 1255 OID 18147)
-- Name: st_box3d(box2d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box3d(box2d) RETURNS box3d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX2D_to_BOX3D';


ALTER FUNCTION public.st_box3d(box2d) OWNER TO postgres;

--
-- TOC entry 241 (class 1255 OID 18144)
-- Name: st_box3d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box3d(geometry) RETURNS box3d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_to_BOX3D';


ALTER FUNCTION public.st_box3d(geometry) OWNER TO postgres;

--
-- TOC entry 252 (class 1255 OID 18155)
-- Name: st_box3d_in(cstring); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box3d_in(cstring) RETURNS box3d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_in';


ALTER FUNCTION public.st_box3d_in(cstring) OWNER TO postgres;

--
-- TOC entry 253 (class 1255 OID 18156)
-- Name: st_box3d_out(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_box3d_out(box3d) RETURNS cstring
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_out';


ALTER FUNCTION public.st_box3d_out(box3d) OWNER TO postgres;

--
-- TOC entry 251 (class 1255 OID 18154)
-- Name: st_bytea(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_bytea(geometry) RETURNS bytea
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_to_bytea';


ALTER FUNCTION public.st_bytea(geometry) OWNER TO postgres;

--
-- TOC entry 413 (class 1255 OID 29379)
-- Name: st_coveredby(text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_coveredby(text, text) RETURNS boolean
    LANGUAGE sql IMMUTABLE
    AS $_$ SELECT ST_CoveredBy($1::geometry, $2::geometry);  $_$;


ALTER FUNCTION public.st_coveredby(text, text) OWNER TO sstuv_app;

--
-- TOC entry 414 (class 1255 OID 29380)
-- Name: st_covers(text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_covers(text, text) RETURNS boolean
    LANGUAGE sql IMMUTABLE
    AS $_$ SELECT ST_Covers($1::geometry, $2::geometry);  $_$;


ALTER FUNCTION public.st_covers(text, text) OWNER TO sstuv_app;

--
-- TOC entry 415 (class 1255 OID 29381)
-- Name: st_distance(text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_distance(text, text) RETURNS double precision
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_Distance($1::geometry, $2::geometry);  $_$;


ALTER FUNCTION public.st_distance(text, text) OWNER TO sstuv_app;

--
-- TOC entry 416 (class 1255 OID 29382)
-- Name: st_dwithin(text, text, double precision); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_dwithin(text, text, double precision) RETURNS boolean
    LANGUAGE sql IMMUTABLE
    AS $_$ SELECT ST_DWithin($1::geometry, $2::geometry, $3);  $_$;


ALTER FUNCTION public.st_dwithin(text, text, double precision) OWNER TO sstuv_app;

--
-- TOC entry 250 (class 1255 OID 18153)
-- Name: st_geometry(bytea); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry(bytea) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_from_bytea';


ALTER FUNCTION public.st_geometry(bytea) OWNER TO postgres;

--
-- TOC entry 247 (class 1255 OID 18150)
-- Name: st_geometry(box2d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry(box2d) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX2D_to_LWGEOM';


ALTER FUNCTION public.st_geometry(box2d) OWNER TO postgres;

--
-- TOC entry 248 (class 1255 OID 18151)
-- Name: st_geometry(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry(box3d) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_to_LWGEOM';


ALTER FUNCTION public.st_geometry(box3d) OWNER TO postgres;

--
-- TOC entry 249 (class 1255 OID 18152)
-- Name: st_geometry(text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry(text) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'parse_WKT_lwgeom';


ALTER FUNCTION public.st_geometry(text) OWNER TO postgres;

--
-- TOC entry 262 (class 1255 OID 18165)
-- Name: st_geometry_cmp(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry_cmp(geometry, geometry) RETURNS integer
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'lwgeom_cmp';


ALTER FUNCTION public.st_geometry_cmp(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 261 (class 1255 OID 18164)
-- Name: st_geometry_eq(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry_eq(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'lwgeom_eq';


ALTER FUNCTION public.st_geometry_eq(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 260 (class 1255 OID 18163)
-- Name: st_geometry_ge(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry_ge(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'lwgeom_ge';


ALTER FUNCTION public.st_geometry_ge(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 259 (class 1255 OID 18162)
-- Name: st_geometry_gt(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry_gt(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'lwgeom_gt';


ALTER FUNCTION public.st_geometry_gt(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 258 (class 1255 OID 18161)
-- Name: st_geometry_le(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry_le(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'lwgeom_le';


ALTER FUNCTION public.st_geometry_le(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 257 (class 1255 OID 18160)
-- Name: st_geometry_lt(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_geometry_lt(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'lwgeom_lt';


ALTER FUNCTION public.st_geometry_lt(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 417 (class 1255 OID 29385)
-- Name: st_intersects(text, text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_intersects(text, text) RETURNS boolean
    LANGUAGE sql IMMUTABLE
    AS $_$ SELECT ST_Intersects($1::geometry, $2::geometry);  $_$;


ALTER FUNCTION public.st_intersects(text, text) OWNER TO sstuv_app;

--
-- TOC entry 418 (class 1255 OID 29386)
-- Name: st_length(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION st_length(text) RETURNS double precision
    LANGUAGE sql IMMUTABLE STRICT
    AS $_$ SELECT ST_Length($1::geometry);  $_$;


ALTER FUNCTION public.st_length(text) OWNER TO sstuv_app;

--
-- TOC entry 377 (class 1255 OID 18285)
-- Name: st_length3d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_length3d(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_length_linestring';


ALTER FUNCTION public.st_length3d(geometry) OWNER TO postgres;

--
-- TOC entry 379 (class 1255 OID 18287)
-- Name: st_makebox3d(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_makebox3d(geometry, geometry) RETURNS box3d
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_construct';


ALTER FUNCTION public.st_makebox3d(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 378 (class 1255 OID 18286)
-- Name: st_perimeter3d(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_perimeter3d(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_perimeter_poly';


ALTER FUNCTION public.st_perimeter3d(geometry) OWNER TO postgres;

--
-- TOC entry 246 (class 1255 OID 18149)
-- Name: st_text(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION st_text(geometry) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_to_text';


ALTER FUNCTION public.st_text(geometry) OWNER TO postgres;

--
-- TOC entry 358 (class 1255 OID 18266)
-- Name: startpoint(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION startpoint(geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_startpoint_linestring';


ALTER FUNCTION public.startpoint(geometry) OWNER TO postgres;

--
-- TOC entry 361 (class 1255 OID 18269)
-- Name: summary(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION summary(geometry) RETURNS text
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_summary';


ALTER FUNCTION public.summary(geometry) OWNER TO postgres;

--
-- TOC entry 359 (class 1255 OID 18267)
-- Name: symdifference(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION symdifference(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'symdifference';


ALTER FUNCTION public.symdifference(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 360 (class 1255 OID 18268)
-- Name: symmetricdifference(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION symmetricdifference(geometry, geometry) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'symdifference';


ALTER FUNCTION public.symmetricdifference(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 363 (class 1255 OID 18271)
-- Name: touches(geometry, geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION touches(geometry, geometry) RETURNS boolean
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'touches';


ALTER FUNCTION public.touches(geometry, geometry) OWNER TO postgres;

--
-- TOC entry 362 (class 1255 OID 18270)
-- Name: transform(geometry, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION transform(geometry, integer) RETURNS geometry
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'transform';


ALTER FUNCTION public.transform(geometry, integer) OWNER TO postgres;

--
-- TOC entry 419 (class 1255 OID 29389)
-- Name: unlockrows(text); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION unlockrows(text) RETURNS integer
    LANGUAGE plpgsql STRICT
    AS $_$ 
DECLARE
	ret int;
BEGIN

	IF NOT LongTransactionsEnabled() THEN
		RAISE EXCEPTION 'Long transaction support disabled, use EnableLongTransaction() to enable.';
	END IF;

	EXECUTE 'DELETE FROM authorization_table where authid = ' ||
		quote_literal($1);

	GET DIAGNOSTICS ret = ROW_COUNT;

	RETURN ret;
END;
$_$;


ALTER FUNCTION public.unlockrows(text) OWNER TO sstuv_app;

--
-- TOC entry 420 (class 1255 OID 29390)
-- Name: updategeometrysrid(character varying, character varying, integer); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION updategeometrysrid(character varying, character varying, integer) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	ret  text;
BEGIN
	SELECT UpdateGeometrySRID('','',$1,$2,$3) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.updategeometrysrid(character varying, character varying, integer) OWNER TO sstuv_app;

--
-- TOC entry 421 (class 1255 OID 29391)
-- Name: updategeometrysrid(character varying, character varying, character varying, integer); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION updategeometrysrid(character varying, character varying, character varying, integer) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	ret  text;
BEGIN
	SELECT UpdateGeometrySRID('',$1,$2,$3,$4) into ret;
	RETURN ret;
END;
$_$;


ALTER FUNCTION public.updategeometrysrid(character varying, character varying, character varying, integer) OWNER TO sstuv_app;

--
-- TOC entry 422 (class 1255 OID 29392)
-- Name: updategeometrysrid(character varying, character varying, character varying, character varying, integer); Type: FUNCTION; Schema: public; Owner: sstuv_app
--

CREATE FUNCTION updategeometrysrid(character varying, character varying, character varying, character varying, integer) RETURNS text
    LANGUAGE plpgsql STRICT
    AS $_$
DECLARE
	catalog_name alias for $1;
	schema_name alias for $2;
	table_name alias for $3;
	column_name alias for $4;
	new_srid alias for $5;
	myrec RECORD;
	okay boolean;
	cname varchar;
	real_schema name;

BEGIN


	-- Find, check or fix schema_name
	IF ( schema_name != '' ) THEN
		okay = 'f';

		FOR myrec IN SELECT nspname FROM pg_namespace WHERE text(nspname) = schema_name LOOP
			okay := 't';
		END LOOP;

		IF ( okay <> 't' ) THEN
			RAISE EXCEPTION 'Invalid schema name';
		ELSE
			real_schema = schema_name;
		END IF;
	ELSE
		SELECT INTO real_schema current_schema()::text;
	END IF;

	-- Find out if the column is in the geometry_columns table
	okay = 'f';
	FOR myrec IN SELECT * from geometry_columns where f_table_schema = text(real_schema) and f_table_name = table_name and f_geometry_column = column_name LOOP
		okay := 't';
	END LOOP;
	IF (okay <> 't') THEN
		RAISE EXCEPTION 'column not found in geometry_columns table';
		RETURN 'f';
	END IF;

	-- Update ref from geometry_columns table
	EXECUTE 'UPDATE geometry_columns SET SRID = ' || new_srid::text ||
		' where f_table_schema = ' ||
		quote_literal(real_schema) || ' and f_table_name = ' ||
		quote_literal(table_name)  || ' and f_geometry_column = ' ||
		quote_literal(column_name);

	-- Make up constraint name
	cname = 'enforce_srid_'  || column_name;

	-- Drop enforce_srid constraint
	EXECUTE 'ALTER TABLE ' || quote_ident(real_schema) ||
		'.' || quote_ident(table_name) ||
		' DROP constraint ' || quote_ident(cname);

	-- Update geometries SRID
	EXECUTE 'UPDATE ' || quote_ident(real_schema) ||
		'.' || quote_ident(table_name) ||
		' SET ' || quote_ident(column_name) ||
		' = setSRID(' || quote_ident(column_name) ||
		', ' || new_srid::text || ')';

	-- Reset enforce_srid constraint
	EXECUTE 'ALTER TABLE ' || quote_ident(real_schema) ||
		'.' || quote_ident(table_name) ||
		' ADD constraint ' || quote_ident(cname) ||
		' CHECK (srid(' || quote_ident(column_name) ||
		') = ' || new_srid::text || ')';

	RETURN real_schema || '.' || table_name || '.' || column_name ||' SRID changed to ' || new_srid::text;

END;
$_$;


ALTER FUNCTION public.updategeometrysrid(character varying, character varying, character varying, character varying, integer) OWNER TO sstuv_app;

--
-- TOC entry 364 (class 1255 OID 18272)
-- Name: x(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION x(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_x_point';


ALTER FUNCTION public.x(geometry) OWNER TO postgres;

--
-- TOC entry 365 (class 1255 OID 18273)
-- Name: xmax(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION xmax(box3d) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_xmax';


ALTER FUNCTION public.xmax(box3d) OWNER TO postgres;

--
-- TOC entry 366 (class 1255 OID 18274)
-- Name: xmin(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION xmin(box3d) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_xmin';


ALTER FUNCTION public.xmin(box3d) OWNER TO postgres;

--
-- TOC entry 367 (class 1255 OID 18275)
-- Name: y(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION y(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_y_point';


ALTER FUNCTION public.y(geometry) OWNER TO postgres;

--
-- TOC entry 368 (class 1255 OID 18276)
-- Name: ymax(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION ymax(box3d) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_ymax';


ALTER FUNCTION public.ymax(box3d) OWNER TO postgres;

--
-- TOC entry 369 (class 1255 OID 18277)
-- Name: ymin(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION ymin(box3d) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_ymin';


ALTER FUNCTION public.ymin(box3d) OWNER TO postgres;

--
-- TOC entry 370 (class 1255 OID 18278)
-- Name: z(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION z(geometry) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_z_point';


ALTER FUNCTION public.z(geometry) OWNER TO postgres;

--
-- TOC entry 371 (class 1255 OID 18279)
-- Name: zmax(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION zmax(box3d) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_zmax';


ALTER FUNCTION public.zmax(box3d) OWNER TO postgres;

--
-- TOC entry 373 (class 1255 OID 18281)
-- Name: zmflag(geometry); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION zmflag(geometry) RETURNS smallint
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'LWGEOM_zmflag';


ALTER FUNCTION public.zmflag(geometry) OWNER TO postgres;

--
-- TOC entry 372 (class 1255 OID 18280)
-- Name: zmin(box3d); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION zmin(box3d) RETURNS double precision
    LANGUAGE c IMMUTABLE STRICT
    AS '$libdir/postgis-2.1', 'BOX3D_zmin';


ALTER FUNCTION public.zmin(box3d) OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 171 (class 1259 OID 29393)
-- Name: antecedentes; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE antecedentes (
    id integer NOT NULL,
    id_folio integer,
    sin_intervencion boolean,
    obras_infraestructura boolean,
    equipamientos boolean,
    intervenciones_en_viviendas boolean,
    otros character varying(45)
);


ALTER TABLE public.antecedentes OWNER TO sstuv_app;

--
-- TOC entry 172 (class 1259 OID 29396)
-- Name: antecedentes_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE antecedentes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.antecedentes_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2539 (class 0 OID 0)
-- Dependencies: 172
-- Name: antecedentes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE antecedentes_id_seq OWNED BY antecedentes.id;


--
-- TOC entry 173 (class 1259 OID 29398)
-- Name: archivos_adjuntos; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE archivos_adjuntos (
    id integer NOT NULL,
    id_folio integer,
    tipo character varying,
    path_file character varying
);


ALTER TABLE public.archivos_adjuntos OWNER TO sstuv_app;

--
-- TOC entry 174 (class 1259 OID 29404)
-- Name: archivos_adjuntos_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE archivos_adjuntos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.archivos_adjuntos_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2540 (class 0 OID 0)
-- Dependencies: 174
-- Name: archivos_adjuntos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE archivos_adjuntos_id_seq OWNED BY archivos_adjuntos.id;


--
-- TOC entry 175 (class 1259 OID 29406)
-- Name: condiciones_socio_urbanisticas; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE condiciones_socio_urbanisticas (
    id integer NOT NULL,
    id_folio integer NOT NULL,
    espacio_libre_comun boolean,
    presencia_org_sociales character varying(255),
    nombre_refernte character varying(45),
    telefono_referente character varying(45)
);


ALTER TABLE public.condiciones_socio_urbanisticas OWNER TO sstuv_app;

--
-- TOC entry 176 (class 1259 OID 29409)
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE condiciones_socio_urbanisticas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.condiciones_socio_urbanisticas_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2541 (class 0 OID 0)
-- Dependencies: 176
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE condiciones_socio_urbanisticas_id_seq OWNED BY condiciones_socio_urbanisticas.id;


--
-- TOC entry 177 (class 1259 OID 29411)
-- Name: encuadre_legal; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE encuadre_legal (
    id integer NOT NULL,
    id_folio integer,
    decreto_2225_95 boolean,
    ley_24374 boolean,
    decreto_815_88 boolean,
    ley_23073 boolean,
    decreto_4686_96 boolean,
    expropiacion character varying(45),
    otros character varying(45),
    ley_14449 boolean,
    tiene_expropiacion boolean
);


ALTER TABLE public.encuadre_legal OWNER TO sstuv_app;

--
-- TOC entry 178 (class 1259 OID 29414)
-- Name: encuadre_legal_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE encuadre_legal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.encuadre_legal_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2542 (class 0 OID 0)
-- Dependencies: 178
-- Name: encuadre_legal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE encuadre_legal_id_seq OWNED BY encuadre_legal.id;


--
-- TOC entry 179 (class 1259 OID 29416)
-- Name: equipamiento; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE equipamiento (
    id integer NOT NULL,
    id_folio integer,
    unidad_sanitaria integer,
    jardin_infantes integer,
    escuela_primaria integer,
    escuela_secundaria integer,
    comedor integer,
    centro_integracion_comunitaria integer,
    otro character varying
);


ALTER TABLE public.equipamiento OWNER TO sstuv_app;

--
-- TOC entry 180 (class 1259 OID 29422)
-- Name: equipamiento_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE equipamiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipamiento_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2543 (class 0 OID 0)
-- Dependencies: 180
-- Name: equipamiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE equipamiento_id_seq OWNED BY equipamiento.id;


--
-- TOC entry 215 (class 1259 OID 29818)
-- Name: estado_folio; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE estado_folio (
    id integer NOT NULL,
    nombre character varying NOT NULL,
    descripcion character varying
);


ALTER TABLE public.estado_folio OWNER TO sstuv_app;

--
-- TOC entry 214 (class 1259 OID 29816)
-- Name: estado_folio_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE estado_folio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_folio_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2544 (class 0 OID 0)
-- Dependencies: 214
-- Name: estado_folio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE estado_folio_id_seq OWNED BY estado_folio.id;


--
-- TOC entry 181 (class 1259 OID 29424)
-- Name: estado_proceso; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE estado_proceso (
    id integer NOT NULL,
    descripcion character varying(45)
);


ALTER TABLE public.estado_proceso OWNER TO sstuv_app;

--
-- TOC entry 182 (class 1259 OID 29427)
-- Name: estado_proceso_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE estado_proceso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_proceso_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2545 (class 0 OID 0)
-- Dependencies: 182
-- Name: estado_proceso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE estado_proceso_id_seq OWNED BY estado_proceso.id;


--
-- TOC entry 183 (class 1259 OID 29429)
-- Name: folio; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE folio (
    id integer NOT NULL,
    cod_folio character varying(7) NOT NULL,
    id_partido integer NOT NULL,
    matricula character varying(4) NOT NULL,
    fecha date NOT NULL,
    encargado character varying(128) NOT NULL,
    nombre_barrio_oficial character varying(45),
    nombre_barrio_alternativo_1 character varying(45),
    nombre_barrio_alternativo_2 character varying(45),
    anio_origen character varying(45) NOT NULL,
    superficie character varying(45),
    cantidad_familias integer,
    tipo_barrio integer NOT NULL,
    observacion_caso_dudoso character varying(255),
    direccion character varying(45),
    geom text NOT NULL,
    judicializado character varying,
    localidad character varying,
    reparticion_publica character varying
);


ALTER TABLE public.folio OWNER TO sstuv_app;

--
-- TOC entry 184 (class 1259 OID 29435)
-- Name: folio_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE folio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.folio_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2546 (class 0 OID 0)
-- Dependencies: 184
-- Name: folio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE folio_id_seq OWNED BY folio.id;


--
-- TOC entry 185 (class 1259 OID 29437)
-- Name: infraestructura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE infraestructura (
    id integer NOT NULL,
    id_folio integer,
    energia_electrica_medidor_individual integer,
    energia_electrica_medidor_colectivo integer,
    alumbrado_publico integer,
    agua_corriente integer,
    agua_potable integer,
    red_cloacal integer,
    sist_alternativo_eliminacion_excretas integer,
    red_gas integer,
    pavimento integer,
    cordon_cuneta integer,
    desagues_pluviales integer,
    recoleccion_residuos integer
);


ALTER TABLE public.infraestructura OWNER TO sstuv_app;

--
-- TOC entry 186 (class 1259 OID 29440)
-- Name: infraestructura_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE infraestructura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.infraestructura_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2547 (class 0 OID 0)
-- Dependencies: 186
-- Name: infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE infraestructura_id_seq OWNED BY infraestructura.id;


--
-- TOC entry 187 (class 1259 OID 29442)
-- Name: localidad; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE localidad (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    id_partido integer NOT NULL
);


ALTER TABLE public.localidad OWNER TO sstuv_app;

--
-- TOC entry 188 (class 1259 OID 29445)
-- Name: localidad_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE localidad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.localidad_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2548 (class 0 OID 0)
-- Dependencies: 188
-- Name: localidad_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE localidad_id_seq OWNED BY localidad.id;


--
-- TOC entry 189 (class 1259 OID 29447)
-- Name: nomenclatura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE nomenclatura (
    id integer NOT NULL,
    id_folio integer,
    partida_inmobiliaria character varying(45),
    titular_dominio character varying(45),
    circ character varying(2),
    secc character varying(2),
    chac_quinta character varying(14),
    frac character varying(7),
    mza character varying(7),
    parc character varying(7),
    _inscripcion_dominio character varying(128),
    partido character varying(3),
    _dato_verificado_reg_propiedad boolean,
    estado_geografico character varying(8)
);


ALTER TABLE public.nomenclatura OWNER TO sstuv_app;

--
-- TOC entry 190 (class 1259 OID 29453)
-- Name: nomenclatura_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE nomenclatura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nomenclatura_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2549 (class 0 OID 0)
-- Dependencies: 190
-- Name: nomenclatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE nomenclatura_id_seq OWNED BY nomenclatura.id;


--
-- TOC entry 191 (class 1259 OID 29455)
-- Name: opciones_equipamientos; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_equipamientos (
    id integer NOT NULL,
    opcion character varying(45) NOT NULL
);


ALTER TABLE public.opciones_equipamientos OWNER TO sstuv_app;

--
-- TOC entry 192 (class 1259 OID 29458)
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE opciones_equipamientos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.opciones_equipamientos_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2550 (class 0 OID 0)
-- Dependencies: 192
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_equipamientos_id_seq OWNED BY opciones_equipamientos.id;


--
-- TOC entry 193 (class 1259 OID 29460)
-- Name: opciones_infraestructura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_infraestructura (
    id integer NOT NULL,
    opcion character varying(45)
);


ALTER TABLE public.opciones_infraestructura OWNER TO sstuv_app;

--
-- TOC entry 194 (class 1259 OID 29463)
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE opciones_infraestructura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.opciones_infraestructura_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2551 (class 0 OID 0)
-- Dependencies: 194
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_infraestructura_id_seq OWNED BY opciones_infraestructura.id;


--
-- TOC entry 195 (class 1259 OID 29465)
-- Name: opciones_transporte; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_transporte (
    id integer NOT NULL,
    opcion character varying(45)
);


ALTER TABLE public.opciones_transporte OWNER TO sstuv_app;

--
-- TOC entry 196 (class 1259 OID 29468)
-- Name: opciones_transporte_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE opciones_transporte_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.opciones_transporte_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2552 (class 0 OID 0)
-- Dependencies: 196
-- Name: opciones_transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_transporte_id_seq OWNED BY opciones_transporte.id;


--
-- TOC entry 197 (class 1259 OID 29470)
-- Name: organismos_de_intervencion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE organismos_de_intervencion (
    id integer NOT NULL,
    id_folio integer,
    nacional boolean,
    provincial boolean,
    municipal boolean,
    fecha_intervencion date,
    programas text
);


ALTER TABLE public.organismos_de_intervencion OWNER TO sstuv_app;

--
-- TOC entry 198 (class 1259 OID 29476)
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE organismos_de_intervencion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.organismos_de_intervencion_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2553 (class 0 OID 0)
-- Dependencies: 198
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE organismos_de_intervencion_id_seq OWNED BY organismos_de_intervencion.id;


--
-- TOC entry 199 (class 1259 OID 29478)
-- Name: partido; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE partido (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    cod_partido character varying(3)
);


ALTER TABLE public.partido OWNER TO sstuv_app;

--
-- TOC entry 200 (class 1259 OID 29481)
-- Name: partido_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE partido_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.partido_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2554 (class 0 OID 0)
-- Dependencies: 200
-- Name: partido_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE partido_id_seq OWNED BY partido.id;


--
-- TOC entry 201 (class 1259 OID 29483)
-- Name: perfil; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE perfil (
    id_perfil integer NOT NULL,
    nombre character varying NOT NULL,
    descripcion character varying
);


ALTER TABLE public.perfil OWNER TO sstuv_app;

--
-- TOC entry 202 (class 1259 OID 29489)
-- Name: perfil_id_perfil_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE perfil_id_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfil_id_perfil_seq OWNER TO sstuv_app;

--
-- TOC entry 2555 (class 0 OID 0)
-- Dependencies: 202
-- Name: perfil_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE perfil_id_perfil_seq OWNED BY perfil.id_perfil;


--
-- TOC entry 203 (class 1259 OID 29491)
-- Name: regularizacion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE regularizacion (
    id integer NOT NULL,
    id_folio integer,
    proceso_iniciado boolean,
    observaciones text
);


ALTER TABLE public.regularizacion OWNER TO sstuv_app;

--
-- TOC entry 204 (class 1259 OID 29494)
-- Name: regularizacion_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE regularizacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.regularizacion_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2556 (class 0 OID 0)
-- Dependencies: 204
-- Name: regularizacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE regularizacion_id_seq OWNED BY regularizacion.id;


--
-- TOC entry 205 (class 1259 OID 29496)
-- Name: situacion_ambiental; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE situacion_ambiental (
    id integer NOT NULL,
    id_folio integer,
    sin_problemas boolean,
    reserva_electroducto boolean,
    inundable boolean,
    sobre_terraplen_ferroviario boolean,
    sobre_camino_sirga boolean,
    expuesto_contaminacion_industrial boolean,
    sobre_suelo_degradado boolean,
    otro character varying(45)
);


ALTER TABLE public.situacion_ambiental OWNER TO sstuv_app;

--
-- TOC entry 206 (class 1259 OID 29499)
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE situacion_ambiental_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.situacion_ambiental_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2557 (class 0 OID 0)
-- Dependencies: 206
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE situacion_ambiental_id_seq OWNED BY situacion_ambiental.id;


--
-- TOC entry 207 (class 1259 OID 29501)
-- Name: tipo_barrio; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE tipo_barrio (
    id integer NOT NULL,
    tipo character varying(45) NOT NULL
);


ALTER TABLE public.tipo_barrio OWNER TO sstuv_app;

--
-- TOC entry 208 (class 1259 OID 29504)
-- Name: tipo_barrio_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE tipo_barrio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_barrio_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2558 (class 0 OID 0)
-- Dependencies: 208
-- Name: tipo_barrio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE tipo_barrio_id_seq OWNED BY tipo_barrio.id;


--
-- TOC entry 209 (class 1259 OID 29506)
-- Name: transporte; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE transporte (
    id integer NOT NULL,
    id_folio integer,
    colectivos integer,
    ferrocarril integer,
    remis_combis integer
);


ALTER TABLE public.transporte OWNER TO sstuv_app;

--
-- TOC entry 210 (class 1259 OID 29509)
-- Name: transporte_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE transporte_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transporte_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2559 (class 0 OID 0)
-- Dependencies: 210
-- Name: transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE transporte_id_seq OWNED BY transporte.id;


--
-- TOC entry 211 (class 1259 OID 29511)
-- Name: uso_interno; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE uso_interno (
    id_folio integer NOT NULL,
    informe_urbanistico_fecha character varying(45),
    mapeo_preliminar boolean,
    no_corresponde_inscripcion boolean,
    resolucion_inscripcion_provisoria character varying(45),
    resolucion_inscripcion_definitiva character varying(45),
    regularizacion_fecha_inicio date,
    regularizacion_tiene_plano boolean,
    regularizacion_circular_10_catastro boolean,
    regularizacion_aprobacion_geodesia integer,
    regularizacion_registracion integer,
    regularizacion_estado_proceso integer,
    num_expediente character varying,
    registracion_legajo character varying,
    registracion_fecha character varying,
    registracion_folio character varying,
    geodesia_num character varying,
    geodesia_anio character varying,
    tiene_censo boolean,
    fecha_censo character varying,
    geodesia_partido character varying,
    ley_14449 boolean,
    estado_folio integer
);


ALTER TABLE public.uso_interno OWNER TO sstuv_app;

--
-- TOC entry 212 (class 1259 OID 29517)
-- Name: usuario; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE usuario (
    id_usuario integer NOT NULL,
    password character varying NOT NULL,
    email character varying NOT NULL,
    super_admin boolean,
    fecha_activacion date DEFAULT now() NOT NULL,
    nombre character varying,
    id_perfil integer,
    cod_partido character varying(3),
    nombre_completo character varying NOT NULL,
    reparticion character varying NOT NULL
);


ALTER TABLE public.usuario OWNER TO sstuv_app;

--
-- TOC entry 213 (class 1259 OID 29524)
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_usuario_seq OWNER TO sstuv_app;

--
-- TOC entry 2560 (class 0 OID 0)
-- Dependencies: 213
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE usuario_id_usuario_seq OWNED BY usuario.id_usuario;


--
-- TOC entry 2240 (class 2604 OID 29526)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY antecedentes ALTER COLUMN id SET DEFAULT nextval('antecedentes_id_seq'::regclass);


--
-- TOC entry 2241 (class 2604 OID 29527)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY archivos_adjuntos ALTER COLUMN id SET DEFAULT nextval('archivos_adjuntos_id_seq'::regclass);


--
-- TOC entry 2242 (class 2604 OID 29528)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY condiciones_socio_urbanisticas ALTER COLUMN id SET DEFAULT nextval('condiciones_socio_urbanisticas_id_seq'::regclass);


--
-- TOC entry 2243 (class 2604 OID 29529)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY encuadre_legal ALTER COLUMN id SET DEFAULT nextval('encuadre_legal_id_seq'::regclass);


--
-- TOC entry 2244 (class 2604 OID 29530)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento ALTER COLUMN id SET DEFAULT nextval('equipamiento_id_seq'::regclass);


--
-- TOC entry 2262 (class 2604 OID 29821)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY estado_folio ALTER COLUMN id SET DEFAULT nextval('estado_folio_id_seq'::regclass);


--
-- TOC entry 2245 (class 2604 OID 29531)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY estado_proceso ALTER COLUMN id SET DEFAULT nextval('estado_proceso_id_seq'::regclass);


--
-- TOC entry 2246 (class 2604 OID 29532)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio ALTER COLUMN id SET DEFAULT nextval('folio_id_seq'::regclass);


--
-- TOC entry 2247 (class 2604 OID 29533)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura ALTER COLUMN id SET DEFAULT nextval('infraestructura_id_seq'::regclass);


--
-- TOC entry 2248 (class 2604 OID 29534)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY localidad ALTER COLUMN id SET DEFAULT nextval('localidad_id_seq'::regclass);


--
-- TOC entry 2249 (class 2604 OID 29535)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY nomenclatura ALTER COLUMN id SET DEFAULT nextval('nomenclatura_id_seq'::regclass);


--
-- TOC entry 2250 (class 2604 OID 29536)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_equipamientos ALTER COLUMN id SET DEFAULT nextval('opciones_equipamientos_id_seq'::regclass);


--
-- TOC entry 2251 (class 2604 OID 29537)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_infraestructura ALTER COLUMN id SET DEFAULT nextval('opciones_infraestructura_id_seq'::regclass);


--
-- TOC entry 2252 (class 2604 OID 29538)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_transporte ALTER COLUMN id SET DEFAULT nextval('opciones_transporte_id_seq'::regclass);


--
-- TOC entry 2253 (class 2604 OID 29539)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY organismos_de_intervencion ALTER COLUMN id SET DEFAULT nextval('organismos_de_intervencion_id_seq'::regclass);


--
-- TOC entry 2254 (class 2604 OID 29540)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY partido ALTER COLUMN id SET DEFAULT nextval('partido_id_seq'::regclass);


--
-- TOC entry 2255 (class 2604 OID 29541)
-- Name: id_perfil; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY perfil ALTER COLUMN id_perfil SET DEFAULT nextval('perfil_id_perfil_seq'::regclass);


--
-- TOC entry 2256 (class 2604 OID 29542)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion ALTER COLUMN id SET DEFAULT nextval('regularizacion_id_seq'::regclass);


--
-- TOC entry 2257 (class 2604 OID 29543)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY situacion_ambiental ALTER COLUMN id SET DEFAULT nextval('situacion_ambiental_id_seq'::regclass);


--
-- TOC entry 2258 (class 2604 OID 29544)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY tipo_barrio ALTER COLUMN id SET DEFAULT nextval('tipo_barrio_id_seq'::regclass);


--
-- TOC entry 2259 (class 2604 OID 29545)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte ALTER COLUMN id SET DEFAULT nextval('transporte_id_seq'::regclass);


--
-- TOC entry 2261 (class 2604 OID 29546)
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY usuario ALTER COLUMN id_usuario SET DEFAULT nextval('usuario_id_usuario_seq'::regclass);


--
-- TOC entry 2486 (class 0 OID 29393)
-- Dependencies: 171
-- Data for Name: antecedentes; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY antecedentes (id, id_folio, sin_intervencion, obras_infraestructura, equipamientos, intervenciones_en_viviendas, otros) FROM stdin;
1	3	f	t	f	f	
\.


--
-- TOC entry 2561 (class 0 OID 0)
-- Dependencies: 172
-- Name: antecedentes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('antecedentes_id_seq', 1, true);


--
-- TOC entry 2488 (class 0 OID 29398)
-- Dependencies: 173
-- Data for Name: archivos_adjuntos; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY archivos_adjuntos (id, id_folio, tipo, path_file) FROM stdin;
\.


--
-- TOC entry 2562 (class 0 OID 0)
-- Dependencies: 174
-- Name: archivos_adjuntos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('archivos_adjuntos_id_seq', 1, false);


--
-- TOC entry 2490 (class 0 OID 29406)
-- Dependencies: 175
-- Data for Name: condiciones_socio_urbanisticas; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY condiciones_socio_urbanisticas (id, id_folio, espacio_libre_comun, presencia_org_sociales, nombre_refernte, telefono_referente) FROM stdin;
1	3	t			
\.


--
-- TOC entry 2563 (class 0 OID 0)
-- Dependencies: 176
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('condiciones_socio_urbanisticas_id_seq', 1, true);


--
-- TOC entry 2492 (class 0 OID 29411)
-- Dependencies: 177
-- Data for Name: encuadre_legal; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY encuadre_legal (id, id_folio, decreto_2225_95, ley_24374, decreto_815_88, ley_23073, decreto_4686_96, expropiacion, otros, ley_14449, tiene_expropiacion) FROM stdin;
1	3	t	t	t	f	f			f	f
\.


--
-- TOC entry 2564 (class 0 OID 0)
-- Dependencies: 178
-- Name: encuadre_legal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('encuadre_legal_id_seq', 1, true);


--
-- TOC entry 2494 (class 0 OID 29416)
-- Dependencies: 179
-- Data for Name: equipamiento; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY equipamiento (id, id_folio, unidad_sanitaria, jardin_infantes, escuela_primaria, escuela_secundaria, comedor, centro_integracion_comunitaria, otro) FROM stdin;
1	3	2	2	2	\N	\N	\N	
\.


--
-- TOC entry 2565 (class 0 OID 0)
-- Dependencies: 180
-- Name: equipamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('equipamiento_id_seq', 1, true);


--
-- TOC entry 2530 (class 0 OID 29818)
-- Dependencies: 215
-- Data for Name: estado_folio; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY estado_folio (id, nombre, descripcion) FROM stdin;
2	enviado_espera	Enviado/Espera
3	validacion	Validación
4	no_corresponde	No corresponde inscripción
5	notificacion	Notificación para confirmar los datos
6	confirmacion	Confirmado
1	carga/edicion	En proceso de  carga o edición
7	inscripcion	Inscripción
\.


--
-- TOC entry 2566 (class 0 OID 0)
-- Dependencies: 214
-- Name: estado_folio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('estado_folio_id_seq', 7, true);


--
-- TOC entry 2496 (class 0 OID 29424)
-- Dependencies: 181
-- Data for Name: estado_proceso; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY estado_proceso (id, descripcion) FROM stdin;
1	Iniciado
3	Escriturado
2	Acta de regularización de preadjucación
\.


--
-- TOC entry 2567 (class 0 OID 0)
-- Dependencies: 182
-- Name: estado_proceso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('estado_proceso_id_seq', 3, true);


--
-- TOC entry 2498 (class 0 OID 29429)
-- Dependencies: 183
-- Data for Name: folio; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY folio (id, cod_folio, id_partido, matricula, fecha, encargado, nombre_barrio_oficial, nombre_barrio_alternativo_1, nombre_barrio_alternativo_2, anio_origen, superficie, cantidad_familias, tipo_barrio, observacion_caso_dudoso, direccion, geom, judicializado, localidad, reparticion_publica) FROM stdin;
2	0180001	11	0001	2014-12-17	yo				1900		\N	2			POLYGON ((-57.95511245727539 -34.92422301690581, -57.98532485961914 -34.941110902427646, -57.95511245727539 -34.960246302573466, -57.89743423461914 -34.951241964789624, -57.95511245727539 -34.92422301690581))	si		
3	0550001	64	0001	2014-12-17	yo				90		\N	2			POLYGON ((-57.94163703918457 -34.93266739425499, -57.94987678527831 -34.9450509087636, -57.93889045715332 -34.95236756110989, -57.92103767395019 -34.94786508309557, -57.92241096496582 -34.93660780623881, -57.93065071105957 -34.93266739425499, -57.94163703918457 -34.93266739425499))	sin_dato		
\.


--
-- TOC entry 2568 (class 0 OID 0)
-- Dependencies: 184
-- Name: folio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('folio_id_seq', 3, true);


--
-- TOC entry 2500 (class 0 OID 29437)
-- Dependencies: 185
-- Data for Name: infraestructura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY infraestructura (id, id_folio, energia_electrica_medidor_individual, energia_electrica_medidor_colectivo, alumbrado_publico, agua_corriente, agua_potable, red_cloacal, sist_alternativo_eliminacion_excretas, red_gas, pavimento, cordon_cuneta, desagues_pluviales, recoleccion_residuos) FROM stdin;
1	3	2	\N	3	\N	\N	\N	\N	\N	3	\N	\N	\N
\.


--
-- TOC entry 2569 (class 0 OID 0)
-- Dependencies: 186
-- Name: infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('infraestructura_id_seq', 1, true);


--
-- TOC entry 2502 (class 0 OID 29442)
-- Dependencies: 187
-- Data for Name: localidad; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY localidad (id, nombre, id_partido) FROM stdin;
\.


--
-- TOC entry 2570 (class 0 OID 0)
-- Dependencies: 188
-- Name: localidad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('localidad_id_seq', 1, true);


--
-- TOC entry 2504 (class 0 OID 29447)
-- Dependencies: 189
-- Data for Name: nomenclatura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY nomenclatura (id, id_folio, partida_inmobiliaria, titular_dominio, circ, secc, chac_quinta, frac, mza, parc, _inscripcion_dominio, partido, _dato_verificado_reg_propiedad, estado_geografico) FROM stdin;
\.


--
-- TOC entry 2571 (class 0 OID 0)
-- Dependencies: 190
-- Name: nomenclatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('nomenclatura_id_seq', 1, false);


--
-- TOC entry 2506 (class 0 OID 29455)
-- Dependencies: 191
-- Data for Name: opciones_equipamientos; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_equipamientos (id, opcion) FROM stdin;
1	Dentro del barrio
2	Próximo al barrio
3	Distante > 1 KM
4	Inexistente
5	Sin dato
\.


--
-- TOC entry 2572 (class 0 OID 0)
-- Dependencies: 192
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_equipamientos_id_seq', 5, true);


--
-- TOC entry 2508 (class 0 OID 29460)
-- Dependencies: 193
-- Data for Name: opciones_infraestructura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_infraestructura (id, opcion) FROM stdin;
1	Inexistente
2	Cobertura Parcial
3	Cobertura Total
4	Sin dato
\.


--
-- TOC entry 2573 (class 0 OID 0)
-- Dependencies: 194
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_infraestructura_id_seq', 4, true);


--
-- TOC entry 2510 (class 0 OID 29465)
-- Dependencies: 195
-- Data for Name: opciones_transporte; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_transporte (id, opcion) FROM stdin;
1	Dentro del barrio
2	Próximo al barrio
3	Distante > 1 KM 
4	Inexistente
5	Sin dato
\.


--
-- TOC entry 2574 (class 0 OID 0)
-- Dependencies: 196
-- Name: opciones_transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_transporte_id_seq', 5, true);


--
-- TOC entry 2512 (class 0 OID 29470)
-- Dependencies: 197
-- Data for Name: organismos_de_intervencion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY organismos_de_intervencion (id, id_folio, nacional, provincial, municipal, fecha_intervencion, programas) FROM stdin;
1	3	t	f	f	\N	
\.


--
-- TOC entry 2575 (class 0 OID 0)
-- Dependencies: 198
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('organismos_de_intervencion_id_seq', 1, true);


--
-- TOC entry 2514 (class 0 OID 29478)
-- Dependencies: 199
-- Data for Name: partido; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY partido (id, nombre, cod_partido) FROM stdin;
10	Bragado	012
11	Carmen de Areco	018
12	Zarate	038
13	General Lamadrid	040
14	General Rodriguez	046
15	Saladillo	093
16	San Nicolas	098
17	Hipolito Yrigoyen	119
18	Salliquelo	122
19	Tres Lomas	127
20	Ameghino	128
21	Las Flores	058
22	Chascomus	027
23	Lobos	062
24	General Guido	037
25	Islas Baradero	309
26	Islas San Nicolas	398
27	Exaltacion de la Cruz	031
28	Florencio Varela	032
29	Chacabuco	026
30	Tordillo	105
31	Chivilcoy	028
32	Berazategui	120
33	Balcarce	008
34	San Vicente	100
35	Castelli	020
36	Colon	021
37	Malvinas Argentinas	133
38	Daireaux	019
39	Magdalena	065
40	General Belgrano	036
41	Cañuelas	015
42	Merlo	072
43	Tigre	057
44	Juarez	053
45	General Lavalle	042
46	Navarro	075
47	General Paz	043
48	Tapalque	104
49	Campana	014
50	San Cayetano	116
51	General Villegas	050
52	Ituzaingo	136
53	Pte. Peron	129
54	Trenque Lauquen	107
55	Rauch	088
56	Pila	083
57	Rivadavia	089
58	Moreno	074
59	San Fernando	096
60	Baradero	009
61	Roque Perez	091
62	Ensenada	115
63	Matanza	070
64	La Plata	055
65	Pilar	084
66	Berisso	114
67	General Las Heras	041
68	General Arenales	035
69	Lujan	064
70	Lomas de Zamora	063
71	Ayacucho	005
72	Monte	073
73	Dolores	029
74	General San Martin	047
75	Carlos Tejedor	017
76	Punta Indio	134
77	Esteban Echeverria	030
78	Gonzalez Chavez	051
79	Rojas	090
80	Alberti	002
81	Suipacha	102
82	Capitan Sarmiento	121
83	San Andres de Giles	094
84	Salto	067
85	Guamini	052
86	Pellegrini	081
87	San Antonio de Areco	095
88	Saavedra	092
89	Junin	054
90	General Viamonte	049
91	Olavarria	078
92	Islas San Fernando	396
93	Adolfo Alsina	001
94	General Alvarado	033
95	Tres Arroyos	108
96	Arrecifes	010
97	Laprida	056
98	Puan	085
99	Coronel Pringles	023
100	Quilmes	086
101	Almirante Brown	003
102	Tandil	103
103	Islas Zarate	338
104	Villa Gesell	125
105	Villarino	111
106	General Alvear	034
107	Loberia	061
108	La Costa	123
109	General Pinto	044
110	Moron	101
111	Hurlingham	135
112	Necochea	076
113	Mar Chiquita	069
114	Coronel Rosales	113
115	Coronel Dorrego	022
116	Monte Hermoso	126
117	Islas Campana	314
118	Escobar	118
119	Jose C. Paz	132
120	General Madariaga	039
121	Pinamar	124
122	Lanus	025
123	Ezeiza	130
124	Pergamino	082
125	General Pueyrredon	045
126	Pehuajo	080
127	Leandro N. Alem	059
128	Islas Ramallo	387
129	Veinticinco de Mayo	109
130	Mercedes	071
131	Marcos Paz	068
132	Bolivar	011
133	Patagones	079
134	Brandsen	013
135	Azul	006
136	Tres de Febrero	117
137	San Isidro	097
138	Vicente Lopez	110
139	San Miguel	131
140	Maipu	066
141	Tornquist	106
142	Islas Tigre	357
143	Coronel Suarez	024
144	San Pedro	099
145	Ramallo	087
146	Bahia Blanca	007
147	Avellaneda	004
148	Nueve de Julio	077
149	Carlos Casares	016
150	Lincoln	060
151	Islas San Pedro	399
152	Lezama	137
\.


--
-- TOC entry 2576 (class 0 OID 0)
-- Dependencies: 200
-- Name: partido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('partido_id_seq', 152, true);


--
-- TOC entry 2516 (class 0 OID 29483)
-- Dependencies: 201
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY perfil (id_perfil, nombre, descripcion) FROM stdin;
1	administrador	administrador
2	editor	editor
\.


--
-- TOC entry 2577 (class 0 OID 0)
-- Dependencies: 202
-- Name: perfil_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('perfil_id_perfil_seq', 2, true);


--
-- TOC entry 2518 (class 0 OID 29491)
-- Dependencies: 203
-- Data for Name: regularizacion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY regularizacion (id, id_folio, proceso_iniciado, observaciones) FROM stdin;
1	3	t	
\.


--
-- TOC entry 2578 (class 0 OID 0)
-- Dependencies: 204
-- Name: regularizacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('regularizacion_id_seq', 1, true);


--
-- TOC entry 2520 (class 0 OID 29496)
-- Dependencies: 205
-- Data for Name: situacion_ambiental; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY situacion_ambiental (id, id_folio, sin_problemas, reserva_electroducto, inundable, sobre_terraplen_ferroviario, sobre_camino_sirga, expuesto_contaminacion_industrial, sobre_suelo_degradado, otro) FROM stdin;
1	3	f	t	f	t	f	f	f	
\.


--
-- TOC entry 2579 (class 0 OID 0)
-- Dependencies: 206
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('situacion_ambiental_id_seq', 1, true);


--
-- TOC entry 2522 (class 0 OID 29501)
-- Dependencies: 207
-- Data for Name: tipo_barrio; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY tipo_barrio (id, tipo) FROM stdin;
1	Villa
2	Asentamiento Precario
3	Otro
\.


--
-- TOC entry 2580 (class 0 OID 0)
-- Dependencies: 208
-- Name: tipo_barrio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('tipo_barrio_id_seq', 3, true);


--
-- TOC entry 2524 (class 0 OID 29506)
-- Dependencies: 209
-- Data for Name: transporte; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY transporte (id, id_folio, colectivos, ferrocarril, remis_combis) FROM stdin;
1	3	2	\N	\N
\.


--
-- TOC entry 2581 (class 0 OID 0)
-- Dependencies: 210
-- Name: transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('transporte_id_seq', 1, true);


--
-- TOC entry 2526 (class 0 OID 29511)
-- Dependencies: 211
-- Data for Name: uso_interno; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY uso_interno (id_folio, informe_urbanistico_fecha, mapeo_preliminar, no_corresponde_inscripcion, resolucion_inscripcion_provisoria, resolucion_inscripcion_definitiva, regularizacion_fecha_inicio, regularizacion_tiene_plano, regularizacion_circular_10_catastro, regularizacion_aprobacion_geodesia, regularizacion_registracion, regularizacion_estado_proceso, num_expediente, registracion_legajo, registracion_fecha, registracion_folio, geodesia_num, geodesia_anio, tiene_censo, fecha_censo, geodesia_partido, ley_14449, estado_folio) FROM stdin;
3	sin_dato	t	t			\N	f	f	\N	\N	\N							f		055	f	1
\.


--
-- TOC entry 2527 (class 0 OID 29517)
-- Dependencies: 212
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY usuario (id_usuario, password, email, super_admin, fecha_activacion, nombre, id_perfil, cod_partido, nombre_completo, reparticion) FROM stdin;
1	21232f297a57a5a743894a0e4a801fc3	pepe	\N	2014-10-24	admin	1	\N	Administrador	sstuv
7	b4248609e02e46bc9781dc6a2687f90f	lalala	f	2014-12-17	laplata	2	055	platense	municipio
\.


--
-- TOC entry 2582 (class 0 OID 0)
-- Dependencies: 213
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('usuario_id_usuario_seq', 7, true);


--
-- TOC entry 2264 (class 2606 OID 29548)
-- Name: antecedentes_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2267 (class 2606 OID 29550)
-- Name: antecedentes_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_pkey PRIMARY KEY (id);


--
-- TOC entry 2269 (class 2606 OID 29552)
-- Name: archivos_adjuntos_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY archivos_adjuntos
    ADD CONSTRAINT archivos_adjuntos_pkey PRIMARY KEY (id);


--
-- TOC entry 2272 (class 2606 OID 29554)
-- Name: condiciones_socio_urbanisticas_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2274 (class 2606 OID 29556)
-- Name: condiciones_socio_urbanisticas_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_pkey PRIMARY KEY (id, id_folio);


--
-- TOC entry 2277 (class 2606 OID 29558)
-- Name: encuadre_legal_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_pkey PRIMARY KEY (id);


--
-- TOC entry 2280 (class 2606 OID 29560)
-- Name: equipamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_pkey PRIMARY KEY (id);


--
-- TOC entry 2339 (class 2606 OID 29826)
-- Name: estado_folio_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY estado_folio
    ADD CONSTRAINT estado_folio_pkey PRIMARY KEY (id);


--
-- TOC entry 2282 (class 2606 OID 29562)
-- Name: estado_proceso_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY estado_proceso
    ADD CONSTRAINT estado_proceso_pkey PRIMARY KEY (id);


--
-- TOC entry 2284 (class 2606 OID 29564)
-- Name: folio_cod_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_cod_folio_key UNIQUE (cod_folio);


--
-- TOC entry 2287 (class 2606 OID 29566)
-- Name: folio_id_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_id_key UNIQUE (id);


--
-- TOC entry 2289 (class 2606 OID 29568)
-- Name: folio_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_pkey PRIMARY KEY (id);


--
-- TOC entry 2334 (class 2606 OID 29570)
-- Name: id_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_usuario_pk PRIMARY KEY (id_usuario);


--
-- TOC entry 2292 (class 2606 OID 29572)
-- Name: infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 2295 (class 2606 OID 29574)
-- Name: localidad_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_pkey PRIMARY KEY (id);


--
-- TOC entry 2298 (class 2606 OID 29576)
-- Name: nomenclatura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_pkey PRIMARY KEY (id);


--
-- TOC entry 2300 (class 2606 OID 29578)
-- Name: opciones_equipamientos_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_equipamientos
    ADD CONSTRAINT opciones_equipamientos_pkey PRIMARY KEY (id);


--
-- TOC entry 2302 (class 2606 OID 29580)
-- Name: opciones_infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_infraestructura
    ADD CONSTRAINT opciones_infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 2304 (class 2606 OID 29582)
-- Name: opciones_transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_transporte
    ADD CONSTRAINT opciones_transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 2307 (class 2606 OID 29584)
-- Name: organismos_de_intervencion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_pkey PRIMARY KEY (id);


--
-- TOC entry 2309 (class 2606 OID 29586)
-- Name: partido_cod_partido_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY partido
    ADD CONSTRAINT partido_cod_partido_key UNIQUE (cod_partido);


--
-- TOC entry 2312 (class 2606 OID 29588)
-- Name: partido_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY partido
    ADD CONSTRAINT partido_pkey PRIMARY KEY (id);


--
-- TOC entry 2314 (class 2606 OID 29590)
-- Name: perfil_nombre_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_nombre_key UNIQUE (nombre);


--
-- TOC entry 2316 (class 2606 OID 29592)
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id_perfil);


--
-- TOC entry 2318 (class 2606 OID 29594)
-- Name: regularizacion_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2321 (class 2606 OID 29596)
-- Name: regularizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_pkey PRIMARY KEY (id);


--
-- TOC entry 2324 (class 2606 OID 29598)
-- Name: situacion_ambiental_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_pkey PRIMARY KEY (id);


--
-- TOC entry 2327 (class 2606 OID 29600)
-- Name: tipo_barrio_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY tipo_barrio
    ADD CONSTRAINT tipo_barrio_pkey PRIMARY KEY (id);


--
-- TOC entry 2330 (class 2606 OID 29602)
-- Name: transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 2332 (class 2606 OID 29604)
-- Name: uso_interno_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_pkey PRIMARY KEY (id_folio);


--
-- TOC entry 2337 (class 2606 OID 29606)
-- Name: usuario_nombre_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_nombre_key UNIQUE (nombre);


--
-- TOC entry 2265 (class 1259 OID 29607)
-- Name: antecedentes_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX antecedentes_id_idx ON antecedentes USING btree (id);


--
-- TOC entry 2270 (class 1259 OID 29608)
-- Name: cond_socio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX cond_socio_id_idx ON condiciones_socio_urbanisticas USING btree (id);


--
-- TOC entry 2275 (class 1259 OID 29609)
-- Name: encuadre_legal_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX encuadre_legal_id_idx ON encuadre_legal USING btree (id);


--
-- TOC entry 2278 (class 1259 OID 29610)
-- Name: equipamiento_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX equipamiento_id_idx ON equipamiento USING btree (id);


--
-- TOC entry 2285 (class 1259 OID 29611)
-- Name: folio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX folio_id_idx ON folio USING btree (id);


--
-- TOC entry 2290 (class 1259 OID 29612)
-- Name: infraestructura_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX infraestructura_id_idx ON infraestructura USING btree (id);


--
-- TOC entry 2293 (class 1259 OID 29613)
-- Name: localidad_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX localidad_id_idx ON localidad USING btree (id);


--
-- TOC entry 2296 (class 1259 OID 29614)
-- Name: nomenclatura_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX nomenclatura_id_idx ON nomenclatura USING btree (id);


--
-- TOC entry 2305 (class 1259 OID 29615)
-- Name: organismos_de_intervencion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX organismos_de_intervencion_id_idx ON organismos_de_intervencion USING btree (id);


--
-- TOC entry 2310 (class 1259 OID 29616)
-- Name: partido_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX partido_id_idx ON partido USING btree (id);


--
-- TOC entry 2319 (class 1259 OID 29617)
-- Name: regularizacion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX regularizacion_id_idx ON regularizacion USING btree (id);


--
-- TOC entry 2322 (class 1259 OID 29618)
-- Name: situacion_ambiental_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX situacion_ambiental_id_idx ON situacion_ambiental USING btree (id);


--
-- TOC entry 2325 (class 1259 OID 29619)
-- Name: tipo_barrio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX tipo_barrio_id_idx ON tipo_barrio USING btree (id);


--
-- TOC entry 2328 (class 1259 OID 29620)
-- Name: transporte_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX transporte_id_idx ON transporte USING btree (id);


--
-- TOC entry 2335 (class 1259 OID 29621)
-- Name: usuario_id_usuario_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE INDEX usuario_id_usuario_idx ON usuario USING btree (id_usuario);

ALTER TABLE usuario CLUSTER ON usuario_id_usuario_idx;


--
-- TOC entry 2340 (class 2606 OID 29622)
-- Name: antecedentes_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2341 (class 2606 OID 29627)
-- Name: archivos_adjuntos_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY archivos_adjuntos
    ADD CONSTRAINT archivos_adjuntos_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2342 (class 2606 OID 29632)
-- Name: condiciones_socio_urbanisticas_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2343 (class 2606 OID 29637)
-- Name: encuadre_legal_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2344 (class 2606 OID 29642)
-- Name: equipamiento_centro_integracion_comunitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_centro_integracion_comunitaria_fkey FOREIGN KEY (centro_integracion_comunitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2345 (class 2606 OID 29647)
-- Name: equipamiento_comedor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_comedor_fkey FOREIGN KEY (comedor) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2346 (class 2606 OID 29652)
-- Name: equipamiento_escuela_primaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_primaria_fkey FOREIGN KEY (escuela_primaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2347 (class 2606 OID 29657)
-- Name: equipamiento_escuela_secundaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_secundaria_fkey FOREIGN KEY (escuela_secundaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2348 (class 2606 OID 29662)
-- Name: equipamiento_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2349 (class 2606 OID 29667)
-- Name: equipamiento_jardin_infantes_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_jardin_infantes_fkey FOREIGN KEY (jardin_infantes) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2350 (class 2606 OID 29672)
-- Name: equipamiento_unidad_sanitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_unidad_sanitaria_fkey FOREIGN KEY (unidad_sanitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2351 (class 2606 OID 29677)
-- Name: folio_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2352 (class 2606 OID 29682)
-- Name: folio_tipo_barrio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_tipo_barrio_fkey FOREIGN KEY (tipo_barrio) REFERENCES tipo_barrio(id);


--
-- TOC entry 2378 (class 2606 OID 29687)
-- Name: id_perfil_fk; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_perfil_fk FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil);


--
-- TOC entry 2353 (class 2606 OID 29692)
-- Name: infraestructura_agua_corriente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_corriente_fkey FOREIGN KEY (agua_corriente) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2354 (class 2606 OID 29697)
-- Name: infraestructura_agua_potable_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_potable_fkey FOREIGN KEY (agua_potable) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2355 (class 2606 OID 29702)
-- Name: infraestructura_alumbrado_publico_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_alumbrado_publico_fkey FOREIGN KEY (alumbrado_publico) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2356 (class 2606 OID 29707)
-- Name: infraestructura_cordon_cuneta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_cordon_cuneta_fkey FOREIGN KEY (cordon_cuneta) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2357 (class 2606 OID 29712)
-- Name: infraestructura_desagues_pluviales_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_desagues_pluviales_fkey FOREIGN KEY (desagues_pluviales) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2358 (class 2606 OID 29717)
-- Name: infraestructura_energia_electrica_medidor_colectivo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_colectivo_fkey FOREIGN KEY (energia_electrica_medidor_colectivo) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2359 (class 2606 OID 29722)
-- Name: infraestructura_energia_electrica_medidor_individual_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_individual_fkey FOREIGN KEY (energia_electrica_medidor_individual) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2360 (class 2606 OID 29727)
-- Name: infraestructura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2361 (class 2606 OID 29732)
-- Name: infraestructura_pavimento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pavimento_fkey FOREIGN KEY (pavimento) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2362 (class 2606 OID 29737)
-- Name: infraestructura_recoleccion_residuos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_recoleccion_residuos_fkey FOREIGN KEY (recoleccion_residuos) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2363 (class 2606 OID 29742)
-- Name: infraestructura_red_cloacal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_cloacal_fkey FOREIGN KEY (red_cloacal) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2364 (class 2606 OID 29747)
-- Name: infraestructura_red_gas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_gas_fkey FOREIGN KEY (red_gas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2365 (class 2606 OID 29752)
-- Name: infraestructura_sist_alternativo_eliminacion_excretas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_sist_alternativo_eliminacion_excretas_fkey FOREIGN KEY (sist_alternativo_eliminacion_excretas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2366 (class 2606 OID 29757)
-- Name: localidad_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2367 (class 2606 OID 29762)
-- Name: nomenclatura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2368 (class 2606 OID 29767)
-- Name: organismos_de_intervencion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES antecedentes(id_folio);


--
-- TOC entry 2369 (class 2606 OID 29772)
-- Name: regularizacion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2370 (class 2606 OID 29777)
-- Name: situacion_ambiental_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2371 (class 2606 OID 29782)
-- Name: transporte_colectivos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_colectivos_fkey FOREIGN KEY (colectivos) REFERENCES opciones_transporte(id);


--
-- TOC entry 2372 (class 2606 OID 29787)
-- Name: transporte_ferrocarril_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_ferrocarril_fkey FOREIGN KEY (ferrocarril) REFERENCES opciones_transporte(id);


--
-- TOC entry 2373 (class 2606 OID 29792)
-- Name: transporte_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2374 (class 2606 OID 29797)
-- Name: transporte_remis_combis_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_remis_combis_fkey FOREIGN KEY (remis_combis) REFERENCES opciones_transporte(id);


--
-- TOC entry 2377 (class 2606 OID 29827)
-- Name: uso_interno_estado_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_estado_folio_fkey FOREIGN KEY (estado_folio) REFERENCES estado_folio(id);


--
-- TOC entry 2375 (class 2606 OID 29802)
-- Name: uso_interno_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2376 (class 2606 OID 29807)
-- Name: uso_interno_regularizacion_estado_proceso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_regularizacion_estado_proceso_fkey FOREIGN KEY (regularizacion_estado_proceso) REFERENCES estado_proceso(id);


--
-- TOC entry 2537 (class 0 OID 0)
-- Dependencies: 7
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2014-12-17 18:23:04 ART

--
-- PostgreSQL database dump complete
--

