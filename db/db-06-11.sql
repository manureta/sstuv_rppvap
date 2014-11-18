--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.13
-- Dumped by pg_dump version 9.1.13
-- Started on 2014-11-06 02:07:07 ART

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 206 (class 3079 OID 11721)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2253 (class 0 OID 0)
-- Dependencies: 206
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 161 (class 1259 OID 913663)
-- Dependencies: 6
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
-- TOC entry 162 (class 1259 OID 913666)
-- Dependencies: 161 6
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
-- TOC entry 2254 (class 0 OID 0)
-- Dependencies: 162
-- Name: antecedentes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE antecedentes_id_seq OWNED BY antecedentes.id;


--
-- TOC entry 163 (class 1259 OID 913668)
-- Dependencies: 6
-- Name: aprobacion_geodesia; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE aprobacion_geodesia (
    id integer NOT NULL,
    id_partido integer,
    num integer,
    anio character varying(4)
);


ALTER TABLE public.aprobacion_geodesia OWNER TO sstuv_app;

--
-- TOC entry 164 (class 1259 OID 913671)
-- Dependencies: 6 163
-- Name: aprobacion_geodesia_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE aprobacion_geodesia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aprobacion_geodesia_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 164
-- Name: aprobacion_geodesia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE aprobacion_geodesia_id_seq OWNED BY aprobacion_geodesia.id;


--
-- TOC entry 165 (class 1259 OID 913673)
-- Dependencies: 6
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
-- TOC entry 166 (class 1259 OID 913676)
-- Dependencies: 165 6
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
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 166
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE condiciones_socio_urbanisticas_id_seq OWNED BY condiciones_socio_urbanisticas.id;


--
-- TOC entry 167 (class 1259 OID 913678)
-- Dependencies: 6
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
    otros character varying(45)
);


ALTER TABLE public.encuadre_legal OWNER TO sstuv_app;

--
-- TOC entry 168 (class 1259 OID 913681)
-- Dependencies: 167 6
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
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 168
-- Name: encuadre_legal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE encuadre_legal_id_seq OWNED BY encuadre_legal.id;


--
-- TOC entry 169 (class 1259 OID 913683)
-- Dependencies: 6
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
    salon_usos_multiples integer,
    centro_integracion_comunitaria integer,
    otro character varying
);


ALTER TABLE public.equipamiento OWNER TO sstuv_app;

--
-- TOC entry 170 (class 1259 OID 913689)
-- Dependencies: 169 6
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
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 170
-- Name: equipamiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE equipamiento_id_seq OWNED BY equipamiento.id;


--
-- TOC entry 171 (class 1259 OID 913691)
-- Dependencies: 6
-- Name: estado_proceso; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE estado_proceso (
    id integer NOT NULL,
    descripcion character varying(45)
);


ALTER TABLE public.estado_proceso OWNER TO sstuv_app;

--
-- TOC entry 172 (class 1259 OID 913694)
-- Dependencies: 171 6
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
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 172
-- Name: estado_proceso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE estado_proceso_id_seq OWNED BY estado_proceso.id;


--
-- TOC entry 173 (class 1259 OID 913696)
-- Dependencies: 6
-- Name: folio; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE folio (
    id serial NOT NULL,
    cod_folio character varying(7) NOT NULL UNIQUE,
    id_partido integer NOT NULL,
    id_localidad integer,
    matricula character varying(4) NOT NULL,
    fecha date,
    encargado character varying(45),
    nombre_barrio_oficial character varying(45),
    nombre_barrio_alternativo_1 character varying(45),
    nombre_barrio_alternativo_2 character varying(45),
    anio_origen character varying(45),
    superficie character varying(45),
    cantidad_familias integer,
    tipo_barrio integer,
    observacion_caso_dudoso character varying(255),
    judicializado smallint,
    direccion character varying(45),
    num_expedientes character varying(45)
);


ALTER TABLE public.folio OWNER TO sstuv_app;

--
-- TOC entry 174 (class 1259 OID 913702)
-- Dependencies: 173 6
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
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 174
-- Name: folio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE folio_id_seq OWNED BY folio.id;


--
-- TOC entry 175 (class 1259 OID 913704)
-- Dependencies: 6
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
-- TOC entry 176 (class 1259 OID 913707)
-- Dependencies: 6 175
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
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 176
-- Name: infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE infraestructura_id_seq OWNED BY infraestructura.id;


--
-- TOC entry 177 (class 1259 OID 913709)
-- Dependencies: 6
-- Name: localidad; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE localidad (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    id_partido integer NOT NULL
);


ALTER TABLE public.localidad OWNER TO sstuv_app;

--
-- TOC entry 178 (class 1259 OID 913712)
-- Dependencies: 177 6
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
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 178
-- Name: localidad_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE localidad_id_seq OWNED BY localidad.id;


--
-- TOC entry 179 (class 1259 OID 913714)
-- Dependencies: 6
-- Name: nomenclatura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE nomenclatura (
    id integer NOT NULL,
    id_folio integer,
    partida_inmobiliaria character varying(45),
    titular_dominio character varying(45),
    circ character varying(45),
    secc character varying(45),
    chac_quinta character varying(45),
    frac character varying(45),
    mza character varying(45),
    parc character varying(45),
    _inscripcion_dominio character varying(45),
    _dato_verificado_reg_propiedad smallint
);


ALTER TABLE public.nomenclatura OWNER TO sstuv_app;

--
-- TOC entry 180 (class 1259 OID 913717)
-- Dependencies: 6 179
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
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 180
-- Name: nomenclatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE nomenclatura_id_seq OWNED BY nomenclatura.id;


--
-- TOC entry 181 (class 1259 OID 913719)
-- Dependencies: 6
-- Name: opciones_equipamientos; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_equipamientos (
    id integer NOT NULL,
    opcion character varying(45) NOT NULL
);


ALTER TABLE public.opciones_equipamientos OWNER TO sstuv_app;

--
-- TOC entry 182 (class 1259 OID 913722)
-- Dependencies: 6 181
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
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 182
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_equipamientos_id_seq OWNED BY opciones_equipamientos.id;


--
-- TOC entry 183 (class 1259 OID 913724)
-- Dependencies: 6
-- Name: opciones_infraestructura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_infraestructura (
    id integer NOT NULL,
    opcion character varying(45)
);


ALTER TABLE public.opciones_infraestructura OWNER TO sstuv_app;

--
-- TOC entry 184 (class 1259 OID 913727)
-- Dependencies: 6 183
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
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 184
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_infraestructura_id_seq OWNED BY opciones_infraestructura.id;


--
-- TOC entry 185 (class 1259 OID 913729)
-- Dependencies: 6
-- Name: opciones_transporte; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_transporte (
    id integer NOT NULL,
    opcion character varying(45)
);


ALTER TABLE public.opciones_transporte OWNER TO sstuv_app;

--
-- TOC entry 186 (class 1259 OID 913732)
-- Dependencies: 6 185
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
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 186
-- Name: opciones_transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_transporte_id_seq OWNED BY opciones_transporte.id;


--
-- TOC entry 187 (class 1259 OID 913734)
-- Dependencies: 6
-- Name: organismos_de_intervencion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE organismos_de_intervencion (
    id integer NOT NULL,
    id_folio integer,
    nacional boolean,
    provincial boolean,
    municipal boolean,
    fecha_intervencion date,
    programas text,
    observaciones character varying(45)
);


ALTER TABLE public.organismos_de_intervencion OWNER TO sstuv_app;

--
-- TOC entry 188 (class 1259 OID 913740)
-- Dependencies: 6 187
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
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 188
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE organismos_de_intervencion_id_seq OWNED BY organismos_de_intervencion.id;


--
-- TOC entry 189 (class 1259 OID 913742)
-- Dependencies: 6
-- Name: partido; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE partido (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    cod_partido character varying(3)
);


ALTER TABLE public.partido OWNER TO sstuv_app;

--
-- TOC entry 190 (class 1259 OID 913747)
-- Dependencies: 6 189
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
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 190
-- Name: partido_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE partido_id_seq OWNED BY partido.id;


--
-- TOC entry 191 (class 1259 OID 913749)
-- Dependencies: 6
-- Name: perfil; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE perfil (
    id_perfil integer NOT NULL,
    nombre character varying NOT NULL,
    descripcion character varying
);


ALTER TABLE public.perfil OWNER TO sstuv_app;

--
-- TOC entry 192 (class 1259 OID 913755)
-- Dependencies: 6 191
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
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 192
-- Name: perfil_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE perfil_id_perfil_seq OWNED BY perfil.id_perfil;


--
-- TOC entry 193 (class 1259 OID 913757)
-- Dependencies: 6
-- Name: registracion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE registracion (
    id integer NOT NULL,
    id_folio integer,
    legajo character varying(45),
    folio character varying(45),
    fecha date
);


ALTER TABLE public.registracion OWNER TO sstuv_app;

--
-- TOC entry 194 (class 1259 OID 913760)
-- Dependencies: 193 6
-- Name: registracion_id_seq; Type: SEQUENCE; Schema: public; Owner: sstuv_app
--

CREATE SEQUENCE registracion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.registracion_id_seq OWNER TO sstuv_app;

--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 194
-- Name: registracion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE registracion_id_seq OWNED BY registracion.id;


--
-- TOC entry 195 (class 1259 OID 913762)
-- Dependencies: 6
-- Name: regularizacion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE regularizacion (
    id integer NOT NULL,
    id_folio integer,
    proceso_iniciado boolean
);


ALTER TABLE public.regularizacion OWNER TO sstuv_app;

--
-- TOC entry 196 (class 1259 OID 913765)
-- Dependencies: 6 195
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
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 196
-- Name: regularizacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE regularizacion_id_seq OWNED BY regularizacion.id;


--
-- TOC entry 197 (class 1259 OID 913767)
-- Dependencies: 6
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
-- TOC entry 198 (class 1259 OID 913770)
-- Dependencies: 197 6
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
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 198
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE situacion_ambiental_id_seq OWNED BY situacion_ambiental.id;


--
-- TOC entry 199 (class 1259 OID 913772)
-- Dependencies: 6
-- Name: tipo_barrio; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE tipo_barrio (
    id integer NOT NULL,
    tipo character varying(45) NOT NULL
);


ALTER TABLE public.tipo_barrio OWNER TO sstuv_app;

--
-- TOC entry 200 (class 1259 OID 913775)
-- Dependencies: 199 6
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
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 200
-- Name: tipo_barrio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE tipo_barrio_id_seq OWNED BY tipo_barrio.id;


--
-- TOC entry 201 (class 1259 OID 913777)
-- Dependencies: 6
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
-- TOC entry 202 (class 1259 OID 913780)
-- Dependencies: 6 201
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
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 202
-- Name: transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE transporte_id_seq OWNED BY transporte.id;


--
-- TOC entry 203 (class 1259 OID 913782)
-- Dependencies: 6
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
    regularizacion_estado_proceso integer
);


ALTER TABLE public.uso_interno OWNER TO sstuv_app;

--
-- TOC entry 204 (class 1259 OID 913785)
-- Dependencies: 1982 6
-- Name: usuario; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE usuario (
    id_usuario integer NOT NULL,
    password character varying NOT NULL,
    email character varying NOT NULL,
    super_admin boolean,
    fecha_activacion timestamp without time zone DEFAULT now() NOT NULL,
    nombre character varying,
    id_perfil integer,
    respuesta_a character varying,
    respuesta_b character varying,
    pregunta_secreta_a character varying,
    pregunta_secreta_b character varying
);


ALTER TABLE public.usuario OWNER TO sstuv_app;

--
-- TOC entry 205 (class 1259 OID 913792)
-- Dependencies: 204 6
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
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 205
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE usuario_id_usuario_seq OWNED BY usuario.id_usuario;


--
-- TOC entry 1962 (class 2604 OID 913794)
-- Dependencies: 162 161
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY antecedentes ALTER COLUMN id SET DEFAULT nextval('antecedentes_id_seq'::regclass);


--
-- TOC entry 1963 (class 2604 OID 913795)
-- Dependencies: 164 163
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY aprobacion_geodesia ALTER COLUMN id SET DEFAULT nextval('aprobacion_geodesia_id_seq'::regclass);


--
-- TOC entry 1964 (class 2604 OID 913796)
-- Dependencies: 166 165
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY condiciones_socio_urbanisticas ALTER COLUMN id SET DEFAULT nextval('condiciones_socio_urbanisticas_id_seq'::regclass);


--
-- TOC entry 1965 (class 2604 OID 913797)
-- Dependencies: 168 167
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY encuadre_legal ALTER COLUMN id SET DEFAULT nextval('encuadre_legal_id_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 913798)
-- Dependencies: 170 169
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento ALTER COLUMN id SET DEFAULT nextval('equipamiento_id_seq'::regclass);


--
-- TOC entry 1967 (class 2604 OID 913799)
-- Dependencies: 172 171
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY estado_proceso ALTER COLUMN id SET DEFAULT nextval('estado_proceso_id_seq'::regclass);


--
-- TOC entry 1968 (class 2604 OID 913800)
-- Dependencies: 176 175
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura ALTER COLUMN id SET DEFAULT nextval('infraestructura_id_seq'::regclass);


--
-- TOC entry 1969 (class 2604 OID 913801)
-- Dependencies: 178 177
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY localidad ALTER COLUMN id SET DEFAULT nextval('localidad_id_seq'::regclass);


--
-- TOC entry 1970 (class 2604 OID 913802)
-- Dependencies: 180 179
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY nomenclatura ALTER COLUMN id SET DEFAULT nextval('nomenclatura_id_seq'::regclass);


--
-- TOC entry 1971 (class 2604 OID 913803)
-- Dependencies: 182 181
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_equipamientos ALTER COLUMN id SET DEFAULT nextval('opciones_equipamientos_id_seq'::regclass);


--
-- TOC entry 1972 (class 2604 OID 913804)
-- Dependencies: 184 183
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_infraestructura ALTER COLUMN id SET DEFAULT nextval('opciones_infraestructura_id_seq'::regclass);


--
-- TOC entry 1973 (class 2604 OID 913805)
-- Dependencies: 186 185
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_transporte ALTER COLUMN id SET DEFAULT nextval('opciones_transporte_id_seq'::regclass);


--
-- TOC entry 1974 (class 2604 OID 913806)
-- Dependencies: 188 187
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY organismos_de_intervencion ALTER COLUMN id SET DEFAULT nextval('organismos_de_intervencion_id_seq'::regclass);


--
-- TOC entry 1975 (class 2604 OID 913807)
-- Dependencies: 190 189
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY partido ALTER COLUMN id SET DEFAULT nextval('partido_id_seq'::regclass);


--
-- TOC entry 1976 (class 2604 OID 913808)
-- Dependencies: 192 191
-- Name: id_perfil; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY perfil ALTER COLUMN id_perfil SET DEFAULT nextval('perfil_id_perfil_seq'::regclass);


--
-- TOC entry 1977 (class 2604 OID 913809)
-- Dependencies: 194 193
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY registracion ALTER COLUMN id SET DEFAULT nextval('registracion_id_seq'::regclass);


--
-- TOC entry 1978 (class 2604 OID 913810)
-- Dependencies: 196 195
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion ALTER COLUMN id SET DEFAULT nextval('regularizacion_id_seq'::regclass);


--
-- TOC entry 1979 (class 2604 OID 913811)
-- Dependencies: 198 197
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY situacion_ambiental ALTER COLUMN id SET DEFAULT nextval('situacion_ambiental_id_seq'::regclass);


--
-- TOC entry 1980 (class 2604 OID 913812)
-- Dependencies: 200 199
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY tipo_barrio ALTER COLUMN id SET DEFAULT nextval('tipo_barrio_id_seq'::regclass);


--
-- TOC entry 1981 (class 2604 OID 913813)
-- Dependencies: 202 201
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte ALTER COLUMN id SET DEFAULT nextval('transporte_id_seq'::regclass);


--
-- TOC entry 1983 (class 2604 OID 913814)
-- Dependencies: 205 204
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY usuario ALTER COLUMN id_usuario SET DEFAULT nextval('usuario_id_usuario_seq'::regclass);


--
-- TOC entry 2201 (class 0 OID 913663)
-- Dependencies: 161 2246
-- Data for Name: antecedentes; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY antecedentes (id, id_folio, sin_intervencion, obras_infraestructura, equipamientos, intervenciones_en_viviendas, otros) FROM stdin;
\.


--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 162
-- Name: antecedentes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('antecedentes_id_seq', 1, false);


--
-- TOC entry 2203 (class 0 OID 913668)
-- Dependencies: 163 2246
-- Data for Name: aprobacion_geodesia; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY aprobacion_geodesia (id, id_partido, num, anio) FROM stdin;
\.


--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 164
-- Name: aprobacion_geodesia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('aprobacion_geodesia_id_seq', 1, false);


--
-- TOC entry 2205 (class 0 OID 913673)
-- Dependencies: 165 2246
-- Data for Name: condiciones_socio_urbanisticas; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY condiciones_socio_urbanisticas (id, id_folio, espacio_libre_comun, presencia_org_sociales, nombre_refernte, telefono_referente) FROM stdin;
\.


--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 166
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('condiciones_socio_urbanisticas_id_seq', 1, false);


--
-- TOC entry 2207 (class 0 OID 913678)
-- Dependencies: 167 2246
-- Data for Name: encuadre_legal; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY encuadre_legal (id, id_folio, decreto_2225_95, ley_24374, decreto_815_88, ley_23073, decreto_4686_96, expropiacion, otros) FROM stdin;
\.


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 168
-- Name: encuadre_legal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('encuadre_legal_id_seq', 1, false);


--
-- TOC entry 2209 (class 0 OID 913683)
-- Dependencies: 169 2246
-- Data for Name: equipamiento; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY equipamiento (id, id_folio, unidad_sanitaria, jardin_infantes, escuela_primaria, escuela_secundaria, comedor, salon_usos_multiples, centro_integracion_comunitaria, otro) FROM stdin;
\.


--
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 170
-- Name: equipamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('equipamiento_id_seq', 1, false);


--
-- TOC entry 2211 (class 0 OID 913691)
-- Dependencies: 171 2246
-- Data for Name: estado_proceso; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY estado_proceso (id, descripcion) FROM stdin;
\.


--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 172
-- Name: estado_proceso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('estado_proceso_id_seq', 1, false);


--
-- TOC entry 2213 (class 0 OID 913696)
-- Dependencies: 173 2246
-- Data for Name: folio; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY folio (id, id_partido, id_localidad, matricula, fecha, encargado, nombre_barrio_oficial, nombre_barrio_alternativo_1, nombre_barrio_alternativo_2, anio_origen, superficie, cantidad_familias, tipo_barrio, observacion_caso_dudoso, judicializado, direccion, num_expedientes) FROM stdin;
\.


--
-- TOC entry 2282 (class 0 OID 0)
-- Dependencies: 174
-- Name: folio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('folio_id_seq', 1, false);


--
-- TOC entry 2215 (class 0 OID 913704)
-- Dependencies: 175 2246
-- Data for Name: infraestructura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY infraestructura (id, id_folio, energia_electrica_medidor_individual, energia_electrica_medidor_colectivo, alumbrado_publico, agua_corriente, agua_potable, red_cloacal, sist_alternativo_eliminacion_excretas, red_gas, pavimento, cordon_cuneta, desagues_pluviales, recoleccion_residuos) FROM stdin;
\.


--
-- TOC entry 2283 (class 0 OID 0)
-- Dependencies: 176
-- Name: infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('infraestructura_id_seq', 1, false);


--
-- TOC entry 2217 (class 0 OID 913709)
-- Dependencies: 177 2246
-- Data for Name: localidad; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY localidad (id, nombre, id_partido) FROM stdin;
\.


--
-- TOC entry 2284 (class 0 OID 0)
-- Dependencies: 178
-- Name: localidad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('localidad_id_seq', 1, true);


--
-- TOC entry 2219 (class 0 OID 913714)
-- Dependencies: 179 2246
-- Data for Name: nomenclatura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY nomenclatura (id, id_folio, partida_inmobiliaria, titular_dominio, circ, secc, chac_quinta, frac, mza, parc, _inscripcion_dominio, _dato_verificado_reg_propiedad) FROM stdin;
\.


--
-- TOC entry 2285 (class 0 OID 0)
-- Dependencies: 180
-- Name: nomenclatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('nomenclatura_id_seq', 1, false);


--
-- TOC entry 2221 (class 0 OID 913719)
-- Dependencies: 181 2246
-- Data for Name: opciones_equipamientos; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_equipamientos (id, opcion) FROM stdin;
1	Dentro del barrio
2	Próximo al barrio
3	Distante > 1 KM
4	No Existe
\.


--
-- TOC entry 2286 (class 0 OID 0)
-- Dependencies: 182
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_equipamientos_id_seq', 4, true);


--
-- TOC entry 2223 (class 0 OID 913724)
-- Dependencies: 183 2246
-- Data for Name: opciones_infraestructura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_infraestructura (id, opcion) FROM stdin;
1	Inexistente
2	Cobertura Parcial
3	Cobertura Total
\.


--
-- TOC entry 2287 (class 0 OID 0)
-- Dependencies: 184
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_infraestructura_id_seq', 3, true);


--
-- TOC entry 2225 (class 0 OID 913729)
-- Dependencies: 185 2246
-- Data for Name: opciones_transporte; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_transporte (id, opcion) FROM stdin;
1	Dentro del barrio
2	Próximo al barrio
3	Distante > 1 KM 
4	No Existe
\.


--
-- TOC entry 2288 (class 0 OID 0)
-- Dependencies: 186
-- Name: opciones_transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_transporte_id_seq', 4, true);


--
-- TOC entry 2227 (class 0 OID 913734)
-- Dependencies: 187 2246
-- Data for Name: organismos_de_intervencion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY organismos_de_intervencion (id, id_folio, nacional, provincial, municipal, fecha_intervencion, programas, observaciones) FROM stdin;
\.


--
-- TOC entry 2289 (class 0 OID 0)
-- Dependencies: 188
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('organismos_de_intervencion_id_seq', 1, false);


--
-- TOC entry 2229 (class 0 OID 913742)
-- Dependencies: 189 2246
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
-- TOC entry 2290 (class 0 OID 0)
-- Dependencies: 190
-- Name: partido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('partido_id_seq', 152, true);


--
-- TOC entry 2231 (class 0 OID 913749)
-- Dependencies: 191 2246
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY perfil (id_perfil, nombre, descripcion) FROM stdin;
1	administrador	administrador
2	editor	editor
\.


--
-- TOC entry 2291 (class 0 OID 0)
-- Dependencies: 192
-- Name: perfil_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('perfil_id_perfil_seq', 2, true);


--
-- TOC entry 2233 (class 0 OID 913757)
-- Dependencies: 193 2246
-- Data for Name: registracion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY registracion (id, id_folio, legajo, folio, fecha) FROM stdin;
\.


--
-- TOC entry 2292 (class 0 OID 0)
-- Dependencies: 194
-- Name: registracion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('registracion_id_seq', 1, false);


--
-- TOC entry 2235 (class 0 OID 913762)
-- Dependencies: 195 2246
-- Data for Name: regularizacion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY regularizacion (id, id_folio, proceso_iniciado) FROM stdin;
\.


--
-- TOC entry 2293 (class 0 OID 0)
-- Dependencies: 196
-- Name: regularizacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('regularizacion_id_seq', 1, false);


--
-- TOC entry 2237 (class 0 OID 913767)
-- Dependencies: 197 2246
-- Data for Name: situacion_ambiental; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY situacion_ambiental (id, id_folio, sin_problemas, reserva_electroducto, inundable, sobre_terraplen_ferroviario, sobre_camino_sirga, expuesto_contaminacion_industrial, sobre_suelo_degradado, otro) FROM stdin;
\.


--
-- TOC entry 2294 (class 0 OID 0)
-- Dependencies: 198
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('situacion_ambiental_id_seq', 1, false);


--
-- TOC entry 2239 (class 0 OID 913772)
-- Dependencies: 199 2246
-- Data for Name: tipo_barrio; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY tipo_barrio (id, tipo) FROM stdin;
\.


--
-- TOC entry 2295 (class 0 OID 0)
-- Dependencies: 200
-- Name: tipo_barrio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('tipo_barrio_id_seq', 1, false);


--
-- TOC entry 2241 (class 0 OID 913777)
-- Dependencies: 201 2246
-- Data for Name: transporte; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY transporte (id, id_folio, colectivos, ferrocarril, remis_combis) FROM stdin;
\.


--
-- TOC entry 2296 (class 0 OID 0)
-- Dependencies: 202
-- Name: transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('transporte_id_seq', 1, false);


--
-- TOC entry 2243 (class 0 OID 913782)
-- Dependencies: 203 2246
-- Data for Name: uso_interno; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY uso_interno (id_folio, informe_urbanistico_fecha, mapeo_preliminar, no_corresponde_inscripcion, resolucion_inscripcion_provisoria, resolucion_inscripcion_definitiva, regularizacion_fecha_inicio, regularizacion_tiene_plano, regularizacion_circular_10_catastro, regularizacion_aprobacion_geodesia, regularizacion_registracion, regularizacion_estado_proceso) FROM stdin;
\.


--
-- TOC entry 2244 (class 0 OID 913785)
-- Dependencies: 204 2246
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY usuario (id_usuario, password, email, super_admin, fecha_activacion, nombre, id_perfil, respuesta_a, respuesta_b, pregunta_secreta_a, pregunta_secreta_b) FROM stdin;
1	21232f297a57a5a743894a0e4a801fc3	pepe	\N	2014-10-24 01:16:33.75143	admin	1	\N	\N	\N	\N
\.


--
-- TOC entry 2297 (class 0 OID 0)
-- Dependencies: 205
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('usuario_id_usuario_seq', 1, true);


--
-- TOC entry 1985 (class 2606 OID 913816)
-- Dependencies: 161 161 2247
-- Name: antecedentes_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 1988 (class 2606 OID 913818)
-- Dependencies: 161 161 2247
-- Name: antecedentes_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_pkey PRIMARY KEY (id);


--
-- TOC entry 1991 (class 2606 OID 913820)
-- Dependencies: 163 163 2247
-- Name: aprobacion_geodesia_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY aprobacion_geodesia
    ADD CONSTRAINT aprobacion_geodesia_pkey PRIMARY KEY (id);


--
-- TOC entry 1994 (class 2606 OID 913822)
-- Dependencies: 165 165 2247
-- Name: condiciones_socio_urbanisticas_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 1996 (class 2606 OID 913824)
-- Dependencies: 165 165 165 2247
-- Name: condiciones_socio_urbanisticas_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_pkey PRIMARY KEY (id, id_folio);


--
-- TOC entry 1999 (class 2606 OID 913826)
-- Dependencies: 167 167 2247
-- Name: encuadre_legal_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_pkey PRIMARY KEY (id);


--
-- TOC entry 2002 (class 2606 OID 913828)
-- Dependencies: 169 169 2247
-- Name: equipamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_pkey PRIMARY KEY (id);


--
-- TOC entry 2004 (class 2606 OID 913830)
-- Dependencies: 171 171 2247
-- Name: estado_proceso_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY estado_proceso
    ADD CONSTRAINT estado_proceso_pkey PRIMARY KEY (id);


--
-- TOC entry 2007 (class 2606 OID 913832)
-- Dependencies: 173 173 2247
-- Name: folio_id_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_id_key UNIQUE (id);


--
-- TOC entry 2009 (class 2606 OID 913834)
-- Dependencies: 173 173 2247
-- Name: folio_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_pkey PRIMARY KEY (id);


--
-- TOC entry 2057 (class 2606 OID 913836)
-- Dependencies: 204 204 2247
-- Name: id_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_usuario_pk PRIMARY KEY (id_usuario);


--
-- TOC entry 2012 (class 2606 OID 913838)
-- Dependencies: 175 175 2247
-- Name: infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 2015 (class 2606 OID 913840)
-- Dependencies: 177 177 2247
-- Name: localidad_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_pkey PRIMARY KEY (id);


--
-- TOC entry 2018 (class 2606 OID 913842)
-- Dependencies: 179 179 2247
-- Name: nomenclatura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_pkey PRIMARY KEY (id);


--
-- TOC entry 2020 (class 2606 OID 913844)
-- Dependencies: 181 181 2247
-- Name: opciones_equipamientos_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_equipamientos
    ADD CONSTRAINT opciones_equipamientos_pkey PRIMARY KEY (id);


--
-- TOC entry 2022 (class 2606 OID 913846)
-- Dependencies: 183 183 2247
-- Name: opciones_infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_infraestructura
    ADD CONSTRAINT opciones_infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 2024 (class 2606 OID 913848)
-- Dependencies: 185 185 2247
-- Name: opciones_transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_transporte
    ADD CONSTRAINT opciones_transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 2027 (class 2606 OID 913850)
-- Dependencies: 187 187 2247
-- Name: organismos_de_intervencion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_pkey PRIMARY KEY (id);


--
-- TOC entry 2029 (class 2606 OID 913746)
-- Dependencies: 189 189 2247
-- Name: partido_cod_partido_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY partido
    ADD CONSTRAINT partido_cod_partido_key UNIQUE (cod_partido);


--
-- TOC entry 2032 (class 2606 OID 913852)
-- Dependencies: 189 189 2247
-- Name: partido_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY partido
    ADD CONSTRAINT partido_pkey PRIMARY KEY (id);


--
-- TOC entry 2034 (class 2606 OID 913854)
-- Dependencies: 191 191 2247
-- Name: perfil_nombre_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_nombre_key UNIQUE (nombre);


--
-- TOC entry 2036 (class 2606 OID 913856)
-- Dependencies: 191 191 2247
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id_perfil);


--
-- TOC entry 2039 (class 2606 OID 913858)
-- Dependencies: 193 193 2247
-- Name: registracion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY registracion
    ADD CONSTRAINT registracion_pkey PRIMARY KEY (id);


--
-- TOC entry 2041 (class 2606 OID 913860)
-- Dependencies: 195 195 2247
-- Name: regularizacion_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2044 (class 2606 OID 913862)
-- Dependencies: 195 195 2247
-- Name: regularizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_pkey PRIMARY KEY (id);


--
-- TOC entry 2047 (class 2606 OID 913864)
-- Dependencies: 197 197 2247
-- Name: situacion_ambiental_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_pkey PRIMARY KEY (id);


--
-- TOC entry 2050 (class 2606 OID 913866)
-- Dependencies: 199 199 2247
-- Name: tipo_barrio_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY tipo_barrio
    ADD CONSTRAINT tipo_barrio_pkey PRIMARY KEY (id);


--
-- TOC entry 2053 (class 2606 OID 913868)
-- Dependencies: 201 201 2247
-- Name: transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 2055 (class 2606 OID 913870)
-- Dependencies: 203 203 2247
-- Name: uso_interno_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_pkey PRIMARY KEY (id_folio);


--
-- TOC entry 2060 (class 2606 OID 913872)
-- Dependencies: 204 204 2247
-- Name: usuario_nombre_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_nombre_key UNIQUE (nombre);


--
-- TOC entry 1986 (class 1259 OID 913873)
-- Dependencies: 161 2247
-- Name: antecedentes_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX antecedentes_id_idx ON antecedentes USING btree (id);


--
-- TOC entry 1989 (class 1259 OID 913874)
-- Dependencies: 163 2247
-- Name: aprobacion_geodesia_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX aprobacion_geodesia_id_idx ON aprobacion_geodesia USING btree (id);


--
-- TOC entry 1992 (class 1259 OID 913875)
-- Dependencies: 165 2247
-- Name: cond_socio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX cond_socio_id_idx ON condiciones_socio_urbanisticas USING btree (id);


--
-- TOC entry 1997 (class 1259 OID 913876)
-- Dependencies: 167 2247
-- Name: encuadre_legal_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX encuadre_legal_id_idx ON encuadre_legal USING btree (id);


--
-- TOC entry 2000 (class 1259 OID 913877)
-- Dependencies: 169 2247
-- Name: equipamiento_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX equipamiento_id_idx ON equipamiento USING btree (id);


--
-- TOC entry 2005 (class 1259 OID 913878)
-- Dependencies: 173 2247
-- Name: folio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX folio_id_idx ON folio USING btree (id);


--
-- TOC entry 2010 (class 1259 OID 913879)
-- Dependencies: 175 2247
-- Name: infraestructura_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX infraestructura_id_idx ON infraestructura USING btree (id);


--
-- TOC entry 2013 (class 1259 OID 913880)
-- Dependencies: 177 2247
-- Name: localidad_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX localidad_id_idx ON localidad USING btree (id);


--
-- TOC entry 2016 (class 1259 OID 913881)
-- Dependencies: 179 2247
-- Name: nomenclatura_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX nomenclatura_id_idx ON nomenclatura USING btree (id);


--
-- TOC entry 2025 (class 1259 OID 913882)
-- Dependencies: 187 2247
-- Name: organismos_de_intervencion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX organismos_de_intervencion_id_idx ON organismos_de_intervencion USING btree (id);


--
-- TOC entry 2030 (class 1259 OID 913883)
-- Dependencies: 189 2247
-- Name: partido_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX partido_id_idx ON partido USING btree (id);


--
-- TOC entry 2037 (class 1259 OID 913884)
-- Dependencies: 193 2247
-- Name: registracion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX registracion_id_idx ON registracion USING btree (id);


--
-- TOC entry 2042 (class 1259 OID 913885)
-- Dependencies: 195 2247
-- Name: regularizacion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX regularizacion_id_idx ON regularizacion USING btree (id);


--
-- TOC entry 2045 (class 1259 OID 913886)
-- Dependencies: 197 2247
-- Name: situacion_ambiental_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX situacion_ambiental_id_idx ON situacion_ambiental USING btree (id);


--
-- TOC entry 2048 (class 1259 OID 913887)
-- Dependencies: 199 2247
-- Name: tipo_barrio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX tipo_barrio_id_idx ON tipo_barrio USING btree (id);


--
-- TOC entry 2051 (class 1259 OID 913888)
-- Dependencies: 201 2247
-- Name: transporte_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX transporte_id_idx ON transporte USING btree (id);


--
-- TOC entry 2058 (class 1259 OID 913889)
-- Dependencies: 204 2247
-- Name: usuario_id_usuario_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE INDEX usuario_id_usuario_idx ON usuario USING btree (id_usuario);

ALTER TABLE usuario CLUSTER ON usuario_id_usuario_idx;


--
-- TOC entry 2061 (class 2606 OID 913890)
-- Dependencies: 195 2040 161 2247
-- Name: antecedentes_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


ALTER TABLE ONLY aprobacion_geodesia
    ADD CONSTRAINT geodesia_id_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2062 (class 2606 OID 913895)
-- Dependencies: 173 2006 165 2247
-- Name: condiciones_socio_urbanisticas_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2063 (class 2606 OID 913900)
-- Dependencies: 195 2040 167 2247
-- Name: encuadre_legal_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2064 (class 2606 OID 913905)
-- Dependencies: 181 2019 169 2247
-- Name: equipamiento_centro_integracion_comunitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_centro_integracion_comunitaria_fkey FOREIGN KEY (centro_integracion_comunitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2065 (class 2606 OID 913910)
-- Dependencies: 169 181 2019 2247
-- Name: equipamiento_comedor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_comedor_fkey FOREIGN KEY (comedor) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2066 (class 2606 OID 913915)
-- Dependencies: 181 169 2019 2247
-- Name: equipamiento_escuela_primaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_primaria_fkey FOREIGN KEY (escuela_primaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2067 (class 2606 OID 913920)
-- Dependencies: 2019 169 181 2247
-- Name: equipamiento_escuela_secundaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_secundaria_fkey FOREIGN KEY (escuela_secundaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2068 (class 2606 OID 913925)
-- Dependencies: 1993 169 165 2247
-- Name: equipamiento_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2069 (class 2606 OID 913930)
-- Dependencies: 169 181 2019 2247
-- Name: equipamiento_jardin_infantes_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_jardin_infantes_fkey FOREIGN KEY (jardin_infantes) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2070 (class 2606 OID 913935)
-- Dependencies: 2019 181 169 2247
-- Name: equipamiento_salon_usos_multiples_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_salon_usos_multiples_fkey FOREIGN KEY (salon_usos_multiples) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2071 (class 2606 OID 913940)
-- Dependencies: 181 169 2019 2247
-- Name: equipamiento_unidad_sanitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_unidad_sanitaria_fkey FOREIGN KEY (unidad_sanitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2072 (class 2606 OID 913945)
-- Dependencies: 173 2014 177 2247
-- Name: folio_id_localidad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_id_localidad_fkey FOREIGN KEY (id_localidad) REFERENCES localidad(id);


--
-- TOC entry 2074 (class 2606 OID 913955)
-- Dependencies: 173 2028 189 2247
-- Name: folio_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2073 (class 2606 OID 913950)
-- Dependencies: 173 2049 199 2247
-- Name: folio_tipo_barrio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_tipo_barrio_fkey FOREIGN KEY (tipo_barrio) REFERENCES tipo_barrio(id);


--
-- TOC entry 2099 (class 2606 OID 913960)
-- Dependencies: 2035 191 204 2247
-- Name: id_perfil_fk; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_perfil_fk FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil);


--
-- TOC entry 2075 (class 2606 OID 913965)
-- Dependencies: 183 2021 175 2247
-- Name: infraestructura_agua_corriente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_corriente_fkey FOREIGN KEY (agua_corriente) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2076 (class 2606 OID 913970)
-- Dependencies: 183 2021 175 2247
-- Name: infraestructura_agua_potable_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_potable_fkey FOREIGN KEY (agua_potable) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2077 (class 2606 OID 913975)
-- Dependencies: 183 2021 175 2247
-- Name: infraestructura_alumbrado_publico_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_alumbrado_publico_fkey FOREIGN KEY (alumbrado_publico) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2078 (class 2606 OID 913980)
-- Dependencies: 183 2021 175 2247
-- Name: infraestructura_cordon_cuneta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_cordon_cuneta_fkey FOREIGN KEY (cordon_cuneta) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2079 (class 2606 OID 913985)
-- Dependencies: 183 2021 175 2247
-- Name: infraestructura_desagues_pluviales_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_desagues_pluviales_fkey FOREIGN KEY (desagues_pluviales) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2080 (class 2606 OID 913990)
-- Dependencies: 183 2021 175 2247
-- Name: infraestructura_energia_electrica_medidor_colectivo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_colectivo_fkey FOREIGN KEY (energia_electrica_medidor_colectivo) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2081 (class 2606 OID 913995)
-- Dependencies: 183 2021 175 2247
-- Name: infraestructura_energia_electrica_medidor_individual_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_individual_fkey FOREIGN KEY (energia_electrica_medidor_individual) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2082 (class 2606 OID 914000)
-- Dependencies: 165 175 1993 2247
-- Name: infraestructura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2083 (class 2606 OID 914005)
-- Dependencies: 2021 183 175 2247
-- Name: infraestructura_pavimento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pavimento_fkey FOREIGN KEY (pavimento) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2084 (class 2606 OID 914010)
-- Dependencies: 175 183 2021 2247
-- Name: infraestructura_recoleccion_residuos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_recoleccion_residuos_fkey FOREIGN KEY (recoleccion_residuos) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2085 (class 2606 OID 914015)
-- Dependencies: 2021 183 175 2247
-- Name: infraestructura_red_cloacal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_cloacal_fkey FOREIGN KEY (red_cloacal) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2086 (class 2606 OID 914020)
-- Dependencies: 183 175 2021 2247
-- Name: infraestructura_red_gas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_gas_fkey FOREIGN KEY (red_gas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2087 (class 2606 OID 914025)
-- Dependencies: 2021 175 183 2247
-- Name: infraestructura_sist_alternativo_eliminacion_excretas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_sist_alternativo_eliminacion_excretas_fkey FOREIGN KEY (sist_alternativo_eliminacion_excretas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2088 (class 2606 OID 914075)
-- Dependencies: 177 2028 189 2247
-- Name: localidad_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2089 (class 2606 OID 914030)
-- Dependencies: 173 179 2006 2247
-- Name: nomenclatura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2090 (class 2606 OID 914035)
-- Dependencies: 1984 187 161 2247
-- Name: organismos_de_intervencion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES antecedentes(id_folio);


--
-- TOC entry 2091 (class 2606 OID 914040)
-- Dependencies: 195 193 2040 2247
-- Name: registracion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY registracion
    ADD CONSTRAINT registracion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2092 (class 2606 OID 914045)
-- Dependencies: 2006 195 173 2247
-- Name: regularizacion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2093 (class 2606 OID 914050)
-- Dependencies: 197 165 1993 2247
-- Name: situacion_ambiental_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2094 (class 2606 OID 914055)
-- Dependencies: 185 201 2023 2247
-- Name: transporte_colectivos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_colectivos_fkey FOREIGN KEY (colectivos) REFERENCES opciones_transporte(id);


--
-- TOC entry 2095 (class 2606 OID 914060)
-- Dependencies: 201 2023 185 2247
-- Name: transporte_ferrocarril_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_ferrocarril_fkey FOREIGN KEY (ferrocarril) REFERENCES opciones_transporte(id);


--
-- TOC entry 2096 (class 2606 OID 914065)
-- Dependencies: 1993 201 165 2247
-- Name: transporte_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2097 (class 2606 OID 914070)
-- Dependencies: 201 185 2023 2247
-- Name: transporte_remis_combis_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_remis_combis_fkey FOREIGN KEY (remis_combis) REFERENCES opciones_transporte(id);


--
-- TOC entry 2098 (class 2606 OID 914080)
-- Dependencies: 2006 173 203 2247
-- Name: uso_interno_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2252 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2014-11-06 02:07:08 ART

--
-- PostgreSQL database dump complete
--

