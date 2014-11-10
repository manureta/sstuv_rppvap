--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.13
-- Dumped by pg_dump version 9.1.13
-- Started on 2014-11-05 03:53:23 ART

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 205 (class 3079 OID 11721)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2243 (class 0 OID 0)
-- Dependencies: 205
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 202 (class 1259 OID 913134)
-- Dependencies: 5
-- Name: antecedentes; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE antecedentes (
    id integer NOT NULL,
    id_folio character varying (6),
    sin_intervencion boolean,
    obras_infraestructura boolean,
    equipamientos boolean,
    intervenciones_en_viviendas boolean,
    otros character varying(45)
);


ALTER TABLE public.antecedentes OWNER TO sstuv_app;

--
-- TOC entry 201 (class 1259 OID 913132)
-- Dependencies: 202 5
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
-- TOC entry 2244 (class 0 OID 0)
-- Dependencies: 201
-- Name: antecedentes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE antecedentes_id_seq OWNED BY antecedentes.id;


--
-- TOC entry 194 (class 1259 OID 913070)
-- Dependencies: 5
-- Name: aprobacion_geodesia; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE aprobacion_geodesia (
    id integer NOT NULL,
    cod_partido character varying(3),
    num integer,
    anio character varying(4)
);


ALTER TABLE public.aprobacion_geodesia OWNER TO sstuv_app;

--
-- TOC entry 193 (class 1259 OID 913068)
-- Dependencies: 5 194
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
-- TOC entry 2245 (class 0 OID 0)
-- Dependencies: 193
-- Name: aprobacion_geodesia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE aprobacion_geodesia_id_seq OWNED BY aprobacion_geodesia.id;


--
-- TOC entry 176 (class 1259 OID 912853)
-- Dependencies: 5
-- Name: condiciones_socio_urbanisticas; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE condiciones_socio_urbanisticas (
    id integer NOT NULL,
    id_folio character varying (6) NOT NULL,
    espacio_libre_comun boolean,
    presencia_org_sociales character varying(255),
    nombre_refernte character varying(45),
    telefono_referente character varying(45)
);


ALTER TABLE public.condiciones_socio_urbanisticas OWNER TO sstuv_app;

--
-- TOC entry 175 (class 1259 OID 912851)
-- Dependencies: 176 5
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
-- TOC entry 2246 (class 0 OID 0)
-- Dependencies: 175
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE condiciones_socio_urbanisticas_id_seq OWNED BY condiciones_socio_urbanisticas.id;


--
-- TOC entry 198 (class 1259 OID 913106)
-- Dependencies: 5
-- Name: encuadre_legal; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE encuadre_legal (
    id integer NOT NULL,
    id_folio character varying (6),
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
-- TOC entry 197 (class 1259 OID 913104)
-- Dependencies: 5 198
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
-- TOC entry 2247 (class 0 OID 0)
-- Dependencies: 197
-- Name: encuadre_legal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE encuadre_legal_id_seq OWNED BY encuadre_legal.id;


--
-- TOC entry 180 (class 1259 OID 912877)
-- Dependencies: 5
-- Name: equipamiento; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE equipamiento (
    id integer NOT NULL,
    id_folio character varying (6),
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
-- TOC entry 179 (class 1259 OID 912875)
-- Dependencies: 5 180
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
-- TOC entry 2248 (class 0 OID 0)
-- Dependencies: 179
-- Name: equipamiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE equipamiento_id_seq OWNED BY equipamiento.id;


--
-- TOC entry 192 (class 1259 OID 913062)
-- Dependencies: 5
-- Name: estado_proceso; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE estado_proceso (
    id integer NOT NULL,
    descripcion character varying(45)
);


ALTER TABLE public.estado_proceso OWNER TO sstuv_app;

--
-- TOC entry 191 (class 1259 OID 913060)
-- Dependencies: 192 5
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
-- TOC entry 2249 (class 0 OID 0)
-- Dependencies: 191
-- Name: estado_proceso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE estado_proceso_id_seq OWNED BY estado_proceso.id;


--
-- TOC entry 172 (class 1259 OID 912812)
-- Dependencies: 5
-- Name: folio; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE folio (
    id character varying(6) NOT NULL UNIQUE,
    cod_partido character varying(3) NOT NULL,
    id_localidad integer,
    matricula character varying(3) NOT NULL,
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
-- TOC entry 171 (class 1259 OID 912810)
-- Dependencies: 5 172
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
-- TOC entry 2250 (class 0 OID 0)
-- Dependencies: 171
-- Name: folio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE folio_id_seq OWNED BY folio.id;


--
-- TOC entry 188 (class 1259 OID 912974)
-- Dependencies: 5
-- Name: infraestructura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE infraestructura (
    id integer NOT NULL,
    id_folio character varying (6),
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
-- TOC entry 187 (class 1259 OID 912972)
-- Dependencies: 5 188
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
-- TOC entry 2251 (class 0 OID 0)
-- Dependencies: 187
-- Name: infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE infraestructura_id_seq OWNED BY infraestructura.id;


--
-- TOC entry 168 (class 1259 OID 912789)
-- Dependencies: 5
-- Name: localidad; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE localidad (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    cod_partido character varying(3) NOT NULL
);


ALTER TABLE public.localidad OWNER TO sstuv_app;

--
-- TOC entry 167 (class 1259 OID 912787)
-- Dependencies: 168 5
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
-- TOC entry 2252 (class 0 OID 0)
-- Dependencies: 167
-- Name: localidad_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE localidad_id_seq OWNED BY localidad.id;


--
-- TOC entry 174 (class 1259 OID 912839)
-- Dependencies: 5
-- Name: nomenclatura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE nomenclatura (
    id integer NOT NULL,
    id_folio character varying (6),
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
-- TOC entry 173 (class 1259 OID 912837)
-- Dependencies: 5 174
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
-- TOC entry 2253 (class 0 OID 0)
-- Dependencies: 173
-- Name: nomenclatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE nomenclatura_id_seq OWNED BY nomenclatura.id;


--
-- TOC entry 178 (class 1259 OID 912869)
-- Dependencies: 5
-- Name: opciones_equipamientos; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_equipamientos (
    id integer NOT NULL,
    opcion character varying(45) NOT NULL
);


ALTER TABLE public.opciones_equipamientos OWNER TO sstuv_app;

--
-- TOC entry 177 (class 1259 OID 912867)
-- Dependencies: 178 5
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
-- TOC entry 2254 (class 0 OID 0)
-- Dependencies: 177
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_equipamientos_id_seq OWNED BY opciones_equipamientos.id;


--
-- TOC entry 186 (class 1259 OID 912966)
-- Dependencies: 5
-- Name: opciones_infraestructura; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_infraestructura (
    id integer NOT NULL,
    opcion character varying(45)
);


ALTER TABLE public.opciones_infraestructura OWNER TO sstuv_app;

--
-- TOC entry 185 (class 1259 OID 912964)
-- Dependencies: 5 186
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
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 185
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_infraestructura_id_seq OWNED BY opciones_infraestructura.id;


--
-- TOC entry 182 (class 1259 OID 912929)
-- Dependencies: 5
-- Name: opciones_transporte; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE opciones_transporte (
    id integer NOT NULL,
    opcion character varying(45)
);


ALTER TABLE public.opciones_transporte OWNER TO sstuv_app;

--
-- TOC entry 181 (class 1259 OID 912927)
-- Dependencies: 182 5
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
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 181
-- Name: opciones_transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE opciones_transporte_id_seq OWNED BY opciones_transporte.id;


--
-- TOC entry 204 (class 1259 OID 913150)
-- Dependencies: 5
-- Name: organismos_de_intervencion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE organismos_de_intervencion (
    id integer NOT NULL,
    id_folio character varying (6),
    nacional boolean,
    provincial boolean,
    municipal boolean,
    fecha_intervencion date,
    programas text,
    observaciones character varying(45)
);


ALTER TABLE public.organismos_de_intervencion OWNER TO sstuv_app;

--
-- TOC entry 203 (class 1259 OID 913148)
-- Dependencies: 204 5
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
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 203
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE organismos_de_intervencion_id_seq OWNED BY organismos_de_intervencion.id;


--
-- TOC entry 166 (class 1259 OID 912780)
-- Dependencies: 5
-- Name: partido; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE partido (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    cod_partido character varying(3)
);


ALTER TABLE public.partido OWNER TO sstuv_app;

--
-- TOC entry 165 (class 1259 OID 912778)
-- Dependencies: 166 5
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
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 165
-- Name: partido_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE partido_id_seq OWNED BY partido.id;


--
-- TOC entry 162 (class 1259 OID 912747)
-- Dependencies: 5
-- Name: perfil; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE perfil (
    id_perfil integer NOT NULL,
    nombre character varying NOT NULL,
    descripcion character varying
);


ALTER TABLE public.perfil OWNER TO sstuv_app;

--
-- TOC entry 161 (class 1259 OID 912745)
-- Dependencies: 162 5
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
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 161
-- Name: perfil_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE perfil_id_perfil_seq OWNED BY perfil.id_perfil;


--
-- TOC entry 200 (class 1259 OID 913120)
-- Dependencies: 5
-- Name: registracion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE registracion (
    id integer NOT NULL,
    id_folio character varying (6),
    legajo character varying(45),
    folio character varying(45),
    fecha date
);


ALTER TABLE public.registracion OWNER TO sstuv_app;

--
-- TOC entry 199 (class 1259 OID 913118)
-- Dependencies: 200 5
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
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 199
-- Name: registracion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE registracion_id_seq OWNED BY registracion.id;


--
-- TOC entry 196 (class 1259 OID 913080)
-- Dependencies: 5
-- Name: regularizacion; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE regularizacion (
    id integer NOT NULL,
    id_folio character varying (6),
    proceso_iniciado boolean
);


ALTER TABLE public.regularizacion OWNER TO sstuv_app;

--
-- TOC entry 195 (class 1259 OID 913078)
-- Dependencies: 5 196
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
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 195
-- Name: regularizacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE regularizacion_id_seq OWNED BY regularizacion.id;


--
-- TOC entry 190 (class 1259 OID 913048)
-- Dependencies: 5
-- Name: situacion_ambiental; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE situacion_ambiental (
    id integer NOT NULL,
    id_folio character varying (6),
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
-- TOC entry 189 (class 1259 OID 913046)
-- Dependencies: 190 5
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
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 189
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE situacion_ambiental_id_seq OWNED BY situacion_ambiental.id;


--
-- TOC entry 170 (class 1259 OID 912803)
-- Dependencies: 5
-- Name: tipo_barrio; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE tipo_barrio (
    id integer NOT NULL,
    tipo character varying(45) NOT NULL
);


ALTER TABLE public.tipo_barrio OWNER TO sstuv_app;

--
-- TOC entry 169 (class 1259 OID 912801)
-- Dependencies: 170 5
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
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 169
-- Name: tipo_barrio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE tipo_barrio_id_seq OWNED BY tipo_barrio.id;


--
-- TOC entry 184 (class 1259 OID 912937)
-- Dependencies: 5
-- Name: transporte; Type: TABLE; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE TABLE transporte (
    id integer NOT NULL,
    id_folio character varying (6),
    colectivos integer,
    ferrocarril integer,
    remis_combis integer
);


ALTER TABLE public.transporte OWNER TO sstuv_app;

--
-- TOC entry 183 (class 1259 OID 912935)
-- Dependencies: 184 5
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
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 183
-- Name: transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE transporte_id_seq OWNED BY transporte.id;


--
-- TOC entry 164 (class 1259 OID 912760)
-- Dependencies: 1960 5
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
-- TOC entry 163 (class 1259 OID 912758)
-- Dependencies: 5 164
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
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 163
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sstuv_app
--

ALTER SEQUENCE usuario_id_usuario_seq OWNED BY usuario.id_usuario;


--
-- TOC entry 1978 (class 2604 OID 913137)
-- Dependencies: 201 202 202
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY antecedentes ALTER COLUMN id SET DEFAULT nextval('antecedentes_id_seq'::regclass);


--
-- TOC entry 1974 (class 2604 OID 913073)
-- Dependencies: 193 194 194
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY aprobacion_geodesia ALTER COLUMN id SET DEFAULT nextval('aprobacion_geodesia_id_seq'::regclass);


--
-- TOC entry 1965 (class 2604 OID 912856)
-- Dependencies: 176 175 176
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY condiciones_socio_urbanisticas ALTER COLUMN id SET DEFAULT nextval('condiciones_socio_urbanisticas_id_seq'::regclass);


--
-- TOC entry 1976 (class 2604 OID 913109)
-- Dependencies: 197 198 198
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY encuadre_legal ALTER COLUMN id SET DEFAULT nextval('encuadre_legal_id_seq'::regclass);


--
-- TOC entry 1967 (class 2604 OID 912880)
-- Dependencies: 180 179 180
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento ALTER COLUMN id SET DEFAULT nextval('equipamiento_id_seq'::regclass);


--
-- TOC entry 1973 (class 2604 OID 913065)
-- Dependencies: 192 191 192
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY estado_proceso ALTER COLUMN id SET DEFAULT nextval('estado_proceso_id_seq'::regclass);


--
-- TOC entry 1971 (class 2604 OID 912977)
-- Dependencies: 188 187 188
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura ALTER COLUMN id SET DEFAULT nextval('infraestructura_id_seq'::regclass);


--
-- TOC entry 1962 (class 2604 OID 912792)
-- Dependencies: 168 167 168
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY localidad ALTER COLUMN id SET DEFAULT nextval('localidad_id_seq'::regclass);


--
-- TOC entry 1964 (class 2604 OID 912842)
-- Dependencies: 174 173 174
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY nomenclatura ALTER COLUMN id SET DEFAULT nextval('nomenclatura_id_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 912872)
-- Dependencies: 177 178 178
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_equipamientos ALTER COLUMN id SET DEFAULT nextval('opciones_equipamientos_id_seq'::regclass);


--
-- TOC entry 1970 (class 2604 OID 912969)
-- Dependencies: 186 185 186
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_infraestructura ALTER COLUMN id SET DEFAULT nextval('opciones_infraestructura_id_seq'::regclass);


--
-- TOC entry 1968 (class 2604 OID 912932)
-- Dependencies: 181 182 182
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY opciones_transporte ALTER COLUMN id SET DEFAULT nextval('opciones_transporte_id_seq'::regclass);


--
-- TOC entry 1979 (class 2604 OID 913153)
-- Dependencies: 203 204 204
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY organismos_de_intervencion ALTER COLUMN id SET DEFAULT nextval('organismos_de_intervencion_id_seq'::regclass);


--
-- TOC entry 1961 (class 2604 OID 912783)
-- Dependencies: 165 166 166
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY partido ALTER COLUMN id SET DEFAULT nextval('partido_id_seq'::regclass);


--
-- TOC entry 1958 (class 2604 OID 912750)
-- Dependencies: 161 162 162
-- Name: id_perfil; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY perfil ALTER COLUMN id_perfil SET DEFAULT nextval('perfil_id_perfil_seq'::regclass);


--
-- TOC entry 1977 (class 2604 OID 913123)
-- Dependencies: 200 199 200
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY registracion ALTER COLUMN id SET DEFAULT nextval('registracion_id_seq'::regclass);


--
-- TOC entry 1975 (class 2604 OID 913083)
-- Dependencies: 196 195 196
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion ALTER COLUMN id SET DEFAULT nextval('regularizacion_id_seq'::regclass);


--
-- TOC entry 1972 (class 2604 OID 913051)
-- Dependencies: 190 189 190
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY situacion_ambiental ALTER COLUMN id SET DEFAULT nextval('situacion_ambiental_id_seq'::regclass);


--
-- TOC entry 1963 (class 2604 OID 912806)
-- Dependencies: 170 169 170
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY tipo_barrio ALTER COLUMN id SET DEFAULT nextval('tipo_barrio_id_seq'::regclass);


--
-- TOC entry 1969 (class 2604 OID 912940)
-- Dependencies: 184 183 184
-- Name: id; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte ALTER COLUMN id SET DEFAULT nextval('transporte_id_seq'::regclass);


--
-- TOC entry 1959 (class 2604 OID 912763)
-- Dependencies: 164 163 164
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY usuario ALTER COLUMN id_usuario SET DEFAULT nextval('usuario_id_usuario_seq'::regclass);


--
-- TOC entry 2233 (class 0 OID 913134)
-- Dependencies: 202 2236
-- Data for Name: antecedentes; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY antecedentes (id, id_folio, sin_intervencion, obras_infraestructura, equipamientos, intervenciones_en_viviendas, otros) FROM stdin;
\.


--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 201
-- Name: antecedentes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('antecedentes_id_seq', 1, false);


--
-- TOC entry 2225 (class 0 OID 913070)
-- Dependencies: 194 2236
-- Data for Name: aprobacion_geodesia; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY aprobacion_geodesia (id, cod_partido, num, anio) FROM stdin;
\.


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 193
-- Name: aprobacion_geodesia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('aprobacion_geodesia_id_seq', 1, false);


--
-- TOC entry 2207 (class 0 OID 912853)
-- Dependencies: 176 2236
-- Data for Name: condiciones_socio_urbanisticas; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY condiciones_socio_urbanisticas (id, id_folio, espacio_libre_comun, presencia_org_sociales, nombre_refernte, telefono_referente, _informe_urbanistico_fecha) FROM stdin;
\.


--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 175
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('condiciones_socio_urbanisticas_id_seq', 1, false);


--
-- TOC entry 2229 (class 0 OID 913106)
-- Dependencies: 198 2236
-- Data for Name: encuadre_legal; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY encuadre_legal (id, id_folio, decreto_2225_95, ley_24374, decreto_815_88, ley_23073, decreto_4686_96, expropiacion, otros) FROM stdin;
\.


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 197
-- Name: encuadre_legal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('encuadre_legal_id_seq', 1, false);


--
-- TOC entry 2211 (class 0 OID 912877)
-- Dependencies: 180 2236
-- Data for Name: equipamiento; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY equipamiento (id, id_folio, unidad_sanitaria, jardin_infantes, escuela_primaria, escuela_secundaria, comedor, salon_usos_multiples, centro_integracion_comunitaria, otro) FROM stdin;
\.


--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 179
-- Name: equipamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('equipamiento_id_seq', 1, false);


--
-- TOC entry 2223 (class 0 OID 913062)
-- Dependencies: 192 2236
-- Data for Name: estado_proceso; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY estado_proceso (id, descripcion) FROM stdin;
\.


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 191
-- Name: estado_proceso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('estado_proceso_id_seq', 1, false);


--
-- TOC entry 2203 (class 0 OID 912812)
-- Dependencies: 172 2236
-- Data for Name: folio; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY folio (id, id_partido, id_localidad, id_matricula, fecha, encargado, nombre_barrio_oficial, nombre_barrio_alternativo_1, nombre_barrio_alternativo_2, anio_origen, superficie, cantidad_familias, tipo_barrio, observacion_caso_dudoso, judicializado, direccion, _mapeo_preliminar, _resolucion_inscripcion_provisoria, _resolucion_inscripcion_definitiva, num_expedientes) FROM stdin;
\.


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 171
-- Name: folio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('folio_id_seq', 1, false);


--
-- TOC entry 2219 (class 0 OID 912974)
-- Dependencies: 188 2236
-- Data for Name: infraestructura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY infraestructura (id, id_folio, energia_electrica_medidor_individual, energia_electrica_medidor_colectivo, alumbrado_publico, agua_corriente, agua_potable, red_cloacal, sist_alternativo_eliminacion_excretas, red_gas, pavimento, cordon_cuneta, desagues_pluviales, recoleccion_residuos) FROM stdin;
\.


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 187
-- Name: infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('infraestructura_id_seq', 1, false);


--
-- TOC entry 2199 (class 0 OID 912789)
-- Dependencies: 168 2236
-- Data for Name: localidad; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY localidad (id, nombre, id_partido) FROM stdin;
\.


--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 167
-- Name: localidad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('localidad_id_seq', 1, true);


--
-- TOC entry 2205 (class 0 OID 912839)
-- Dependencies: 174 2236
-- Data for Name: nomenclatura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY nomenclatura (id, id_folio, partida_inmobiliaria, titular_dominio, circ, secc, chac_quinta, frac, mza, parc, _inscripcion_dominio, _dato_verificado_reg_propiedad) FROM stdin;
\.


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 173
-- Name: nomenclatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('nomenclatura_id_seq', 1, false);


--
-- TOC entry 2209 (class 0 OID 912869)
-- Dependencies: 178 2236
-- Data for Name: opciones_equipamientos; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_equipamientos (id, opcion) FROM stdin;
\.


--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 177
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_equipamientos_id_seq', 1, false);


--
-- TOC entry 2217 (class 0 OID 912966)
-- Dependencies: 186 2236
-- Data for Name: opciones_infraestructura; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_infraestructura (id, opcion) FROM stdin;
\.


--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 185
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_infraestructura_id_seq', 1, false);


--
-- TOC entry 2213 (class 0 OID 912929)
-- Dependencies: 182 2236
-- Data for Name: opciones_transporte; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY opciones_transporte (id, opcion) FROM stdin;
\.


--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 181
-- Name: opciones_transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('opciones_transporte_id_seq', 1, false);


--
-- TOC entry 2235 (class 0 OID 913150)
-- Dependencies: 204 2236
-- Data for Name: organismos_de_intervencion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY organismos_de_intervencion (id, id_folio, nacional, provincial, municipal, fecha_intervencion, programas, observaciones) FROM stdin;
\.


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 203
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('organismos_de_intervencion_id_seq', 1, false);


--
-- TOC entry 2197 (class 0 OID 912780)
-- Dependencies: 166 2236
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
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 165
-- Name: partido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('partido_id_seq', 152, true);


--
-- TOC entry 2193 (class 0 OID 912747)
-- Dependencies: 162 2236
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY perfil (id_perfil, nombre, descripcion) FROM stdin;
1	administrador	administrador
2	editor	editor
\.


--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 161
-- Name: perfil_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('perfil_id_perfil_seq', 2, true);


--
-- TOC entry 2231 (class 0 OID 913120)
-- Dependencies: 200 2236
-- Data for Name: registracion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY registracion (id, id_folio, legajo, folio, fecha) FROM stdin;
\.


--
-- TOC entry 2282 (class 0 OID 0)
-- Dependencies: 199
-- Name: registracion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('registracion_id_seq', 1, false);


--
-- TOC entry 2227 (class 0 OID 913080)
-- Dependencies: 196 2236
-- Data for Name: regularizacion; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY regularizacion (id, id_folio, proceso_iniciado, _fecha_inicio, _tiene_plano, _circular_10_catastro, _aprobacion_geodesia, _registracion, _estado_proceso) FROM stdin;
\.


--
-- TOC entry 2283 (class 0 OID 0)
-- Dependencies: 195
-- Name: regularizacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('regularizacion_id_seq', 1, false);


--
-- TOC entry 2221 (class 0 OID 913048)
-- Dependencies: 190 2236
-- Data for Name: situacion_ambiental; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY situacion_ambiental (id, id_folio, sin_problemas, reserva_electroducto, inundable, sobre_terraplen_ferroviario, sobre_camino_sirga, expuesto_contaminacion_industrial, sobre_suelo_degradado, otro) FROM stdin;
\.


--
-- TOC entry 2284 (class 0 OID 0)
-- Dependencies: 189
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('situacion_ambiental_id_seq', 1, false);


--
-- TOC entry 2201 (class 0 OID 912803)
-- Dependencies: 170 2236
-- Data for Name: tipo_barrio; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY tipo_barrio (id, tipo) FROM stdin;
\.


--
-- TOC entry 2285 (class 0 OID 0)
-- Dependencies: 169
-- Name: tipo_barrio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('tipo_barrio_id_seq', 1, false);


--
-- TOC entry 2215 (class 0 OID 912937)
-- Dependencies: 184 2236
-- Data for Name: transporte; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY transporte (id, id_folio, colectivos, ferrocarril, remis_combis) FROM stdin;
\.


--
-- TOC entry 2286 (class 0 OID 0)
-- Dependencies: 183
-- Name: transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('transporte_id_seq', 1, false);


--
-- TOC entry 2195 (class 0 OID 912760)
-- Dependencies: 164 2236
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: sstuv_app
--

COPY usuario (id_usuario, password, email, super_admin, fecha_activacion, nombre, id_perfil, respuesta_a, respuesta_b, pregunta_secreta_a, pregunta_secreta_b) FROM stdin;
1	21232f297a57a5a743894a0e4a801fc3	pepe	\N	2014-10-24 01:16:33.75143	admin	1	\N	\N	\N	\N
\.


--
-- TOC entry 2287 (class 0 OID 0)
-- Dependencies: 163
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: sstuv_app
--

SELECT pg_catalog.setval('usuario_id_usuario_seq', 1, true);


--
-- TOC entry 2044 (class 2606 OID 913141)
-- Dependencies: 202 202 2237
-- Name: antecedentes_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2047 (class 2606 OID 913139)
-- Dependencies: 202 202 2237
-- Name: antecedentes_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_pkey PRIMARY KEY (id);


--
-- TOC entry 2031 (class 2606 OID 913075)
-- Dependencies: 194 194 2237
-- Name: aprobacion_geodesia_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY aprobacion_geodesia
    ADD CONSTRAINT aprobacion_geodesia_pkey PRIMARY KEY (id);


--
-- TOC entry 2006 (class 2606 OID 912860)
-- Dependencies: 176 176 2237
-- Name: condiciones_socio_urbanisticas_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2008 (class 2606 OID 912858)
-- Dependencies: 176 176 176 2237
-- Name: condiciones_socio_urbanisticas_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_pkey PRIMARY KEY (id, id_folio);


--
-- TOC entry 2039 (class 2606 OID 913111)
-- Dependencies: 198 198 2237
-- Name: encuadre_legal_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_pkey PRIMARY KEY (id);


--
-- TOC entry 2013 (class 2606 OID 912885)
-- Dependencies: 180 180 2237
-- Name: equipamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_pkey PRIMARY KEY (id);


--
-- TOC entry 2028 (class 2606 OID 913067)
-- Dependencies: 192 192 2237
-- Name: estado_proceso_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY estado_proceso
    ADD CONSTRAINT estado_proceso_pkey PRIMARY KEY (id);


--
-- TOC entry 2000 (class 2606 OID 912820)
-- Dependencies: 172 172 2237
-- Name: folio_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_pkey PRIMARY KEY (id);


--
-- TOC entry 1985 (class 2606 OID 912769)
-- Dependencies: 164 164 2237
-- Name: id_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_usuario_pk PRIMARY KEY (id_usuario);


--
-- TOC entry 2023 (class 2606 OID 912979)
-- Dependencies: 188 188 2237
-- Name: infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 1994 (class 2606 OID 912794)
-- Dependencies: 168 168 2237
-- Name: localidad_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_pkey PRIMARY KEY (id);


--
-- TOC entry 2003 (class 2606 OID 912844)
-- Dependencies: 174 174 2237
-- Name: nomenclatura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_pkey PRIMARY KEY (id);


--
-- TOC entry 2010 (class 2606 OID 912874)
-- Dependencies: 178 178 2237
-- Name: opciones_equipamientos_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_equipamientos
    ADD CONSTRAINT opciones_equipamientos_pkey PRIMARY KEY (id);


--
-- TOC entry 2020 (class 2606 OID 912971)
-- Dependencies: 186 186 2237
-- Name: opciones_infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_infraestructura
    ADD CONSTRAINT opciones_infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 2015 (class 2606 OID 912934)
-- Dependencies: 182 182 2237
-- Name: opciones_transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY opciones_transporte
    ADD CONSTRAINT opciones_transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 2050 (class 2606 OID 913158)
-- Dependencies: 204 204 2237
-- Name: organismos_de_intervencion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_pkey PRIMARY KEY (id);


--
-- TOC entry 1991 (class 2606 OID 912785)
-- Dependencies: 166 166 2237
-- Name: partido_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY partido
    ADD CONSTRAINT partido_pkey PRIMARY KEY (id);


--
-- TOC entry 1981 (class 2606 OID 912757)
-- Dependencies: 162 162 2237
-- Name: perfil_nombre_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_nombre_key UNIQUE (nombre);


--
-- TOC entry 1983 (class 2606 OID 912755)
-- Dependencies: 162 162 2237
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id_perfil);


--
-- TOC entry 2042 (class 2606 OID 913125)
-- Dependencies: 200 200 2237
-- Name: registracion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY registracion
    ADD CONSTRAINT registracion_pkey PRIMARY KEY (id);


--
-- TOC entry 2033 (class 2606 OID 913087)
-- Dependencies: 196 196 2237
-- Name: regularizacion_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2036 (class 2606 OID 913085)
-- Dependencies: 196 196 2237
-- Name: regularizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_pkey PRIMARY KEY (id);


--
-- TOC entry 2026 (class 2606 OID 913053)
-- Dependencies: 190 190 2237
-- Name: situacion_ambiental_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_pkey PRIMARY KEY (id);


--
-- TOC entry 1997 (class 2606 OID 912808)
-- Dependencies: 170 170 2237
-- Name: tipo_barrio_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY tipo_barrio
    ADD CONSTRAINT tipo_barrio_pkey PRIMARY KEY (id);


--
-- TOC entry 2018 (class 2606 OID 912942)
-- Dependencies: 184 184 2237
-- Name: transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 1988 (class 2606 OID 912771)
-- Dependencies: 164 164 2237
-- Name: usuario_nombre_key; Type: CONSTRAINT; Schema: public; Owner: sstuv_app; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_nombre_key UNIQUE (nombre);


--
-- TOC entry 2045 (class 1259 OID 913147)
-- Dependencies: 202 2237
-- Name: antecedentes_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX antecedentes_id_idx ON antecedentes USING btree (id);


--
-- TOC entry 2029 (class 1259 OID 913076)
-- Dependencies: 194 2237
-- Name: aprobacion_geodesia_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX aprobacion_geodesia_id_idx ON aprobacion_geodesia USING btree (id);


--
-- TOC entry 2004 (class 1259 OID 912866)
-- Dependencies: 176 2237
-- Name: cond_socio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX cond_socio_id_idx ON condiciones_socio_urbanisticas USING btree (id);


--
-- TOC entry 2037 (class 1259 OID 913117)
-- Dependencies: 198 2237
-- Name: encuadre_legal_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX encuadre_legal_id_idx ON encuadre_legal USING btree (id);


--
-- TOC entry 2011 (class 1259 OID 912926)
-- Dependencies: 180 2237
-- Name: equipamiento_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX equipamiento_id_idx ON equipamiento USING btree (id);


--
-- TOC entry 1998 (class 1259 OID 912836)
-- Dependencies: 172 2237
-- Name: folio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX folio_id_idx ON folio USING btree (id);


--
-- TOC entry 2021 (class 1259 OID 913045)
-- Dependencies: 188 2237
-- Name: infraestructura_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX infraestructura_id_idx ON infraestructura USING btree (id);


--
-- TOC entry 1992 (class 1259 OID 912800)
-- Dependencies: 168 2237
-- Name: localidad_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX localidad_id_idx ON localidad USING btree (id);


--
-- TOC entry 2001 (class 1259 OID 912850)
-- Dependencies: 174 2237
-- Name: nomenclatura_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX nomenclatura_id_idx ON nomenclatura USING btree (id);


--
-- TOC entry 2048 (class 1259 OID 913164)
-- Dependencies: 204 2237
-- Name: organismos_de_intervencion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX organismos_de_intervencion_id_idx ON organismos_de_intervencion USING btree (id);


--
-- TOC entry 1989 (class 1259 OID 912786)
-- Dependencies: 166 2237
-- Name: partido_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX partido_id_idx ON partido USING btree (id);


--
-- TOC entry 2040 (class 1259 OID 913131)
-- Dependencies: 200 2237
-- Name: registracion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX registracion_id_idx ON registracion USING btree (id);


--
-- TOC entry 2034 (class 1259 OID 913103)
-- Dependencies: 196 2237
-- Name: regularizacion_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX regularizacion_id_idx ON regularizacion USING btree (id);


--
-- TOC entry 2024 (class 1259 OID 913059)
-- Dependencies: 190 2237
-- Name: situacion_ambiental_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX situacion_ambiental_id_idx ON situacion_ambiental USING btree (id);


--
-- TOC entry 1995 (class 1259 OID 912809)
-- Dependencies: 170 2237
-- Name: tipo_barrio_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX tipo_barrio_id_idx ON tipo_barrio USING btree (id);


--
-- TOC entry 2016 (class 1259 OID 912963)
-- Dependencies: 184 2237
-- Name: transporte_id_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE UNIQUE INDEX transporte_id_idx ON transporte USING btree (id);


--
-- TOC entry 1986 (class 1259 OID 912777)
-- Dependencies: 164 2237
-- Name: usuario_id_usuario_idx; Type: INDEX; Schema: public; Owner: sstuv_app; Tablespace: 
--

CREATE INDEX usuario_id_usuario_idx ON usuario USING btree (id_usuario);

ALTER TABLE usuario CLUSTER ON usuario_id_usuario_idx;


--
-- TOC entry 2089 (class 2606 OID 913142)
-- Dependencies: 2032 202 196 2237
-- Name: antecedentes_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2057 (class 2606 OID 912861)
-- Dependencies: 176 1999 172 2237
-- Name: condiciones_socio_urbanisticas_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2087 (class 2606 OID 913112)
-- Dependencies: 198 196 2032 2237
-- Name: encuadre_legal_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2065 (class 2606 OID 912921)
-- Dependencies: 2009 178 180 2237
-- Name: equipamiento_centro_integracion_comunitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_centro_integracion_comunitaria_fkey FOREIGN KEY (centro_integracion_comunitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2063 (class 2606 OID 912911)
-- Dependencies: 180 2009 178 2237
-- Name: equipamiento_comedor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_comedor_fkey FOREIGN KEY (comedor) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2061 (class 2606 OID 912901)
-- Dependencies: 180 2009 178 2237
-- Name: equipamiento_escuela_primaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_primaria_fkey FOREIGN KEY (escuela_primaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2062 (class 2606 OID 912906)
-- Dependencies: 180 2009 178 2237
-- Name: equipamiento_escuela_secundaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_secundaria_fkey FOREIGN KEY (escuela_secundaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2058 (class 2606 OID 912886)
-- Dependencies: 176 180 2005 2237
-- Name: equipamiento_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2060 (class 2606 OID 912896)
-- Dependencies: 178 180 2009 2237
-- Name: equipamiento_jardin_infantes_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_jardin_infantes_fkey FOREIGN KEY (jardin_infantes) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2064 (class 2606 OID 912916)
-- Dependencies: 2009 180 178 2237
-- Name: equipamiento_salon_usos_multiples_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_salon_usos_multiples_fkey FOREIGN KEY (salon_usos_multiples) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2059 (class 2606 OID 912891)
-- Dependencies: 180 2009 178 2237
-- Name: equipamiento_unidad_sanitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_unidad_sanitaria_fkey FOREIGN KEY (unidad_sanitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2053 (class 2606 OID 913220)
-- Dependencies: 172 168 1993 2237
-- Name: folio_id_localidad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_id_localidad_fkey FOREIGN KEY (id_localidad) REFERENCES localidad(id);


--
-- TOC entry 2054 (class 2606 OID 913225)
-- Dependencies: 166 1990 172 2237
-- Name: folio_id_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_id_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2055 (class 2606 OID 913230)
-- Dependencies: 170 1996 172 2237
-- Name: folio_tipo_barrio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_tipo_barrio_fkey FOREIGN KEY (tipo_barrio) REFERENCES tipo_barrio(id);


--
-- TOC entry 2051 (class 2606 OID 912772)
-- Dependencies: 162 164 1982 2237
-- Name: id_perfil_fk; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_perfil_fk FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil);


--
-- TOC entry 2074 (class 2606 OID 913000)
-- Dependencies: 2019 188 186 2237
-- Name: infraestructura_agua_corriente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_corriente_fkey FOREIGN KEY (agua_corriente) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2075 (class 2606 OID 913005)
-- Dependencies: 186 2019 188 2237
-- Name: infraestructura_agua_potable_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_potable_fkey FOREIGN KEY (agua_potable) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2073 (class 2606 OID 912995)
-- Dependencies: 188 2019 186 2237
-- Name: infraestructura_alumbrado_publico_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_alumbrado_publico_fkey FOREIGN KEY (alumbrado_publico) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2080 (class 2606 OID 913030)
-- Dependencies: 188 2019 186 2237
-- Name: infraestructura_cordon_cuneta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_cordon_cuneta_fkey FOREIGN KEY (cordon_cuneta) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2081 (class 2606 OID 913035)
-- Dependencies: 2019 186 188 2237
-- Name: infraestructura_desagues_pluviales_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_desagues_pluviales_fkey FOREIGN KEY (desagues_pluviales) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2072 (class 2606 OID 912990)
-- Dependencies: 2019 188 186 2237
-- Name: infraestructura_energia_electrica_medidor_colectivo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_colectivo_fkey FOREIGN KEY (energia_electrica_medidor_colectivo) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2071 (class 2606 OID 912985)
-- Dependencies: 186 188 2019 2237
-- Name: infraestructura_energia_electrica_medidor_individual_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_individual_fkey FOREIGN KEY (energia_electrica_medidor_individual) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2070 (class 2606 OID 912980)
-- Dependencies: 2005 176 188 2237
-- Name: infraestructura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2079 (class 2606 OID 913025)
-- Dependencies: 2019 186 188 2237
-- Name: infraestructura_pavimento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pavimento_fkey FOREIGN KEY (pavimento) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2082 (class 2606 OID 913040)
-- Dependencies: 188 186 2019 2237
-- Name: infraestructura_recoleccion_residuos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_recoleccion_residuos_fkey FOREIGN KEY (recoleccion_residuos) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2076 (class 2606 OID 913010)
-- Dependencies: 188 2019 186 2237
-- Name: infraestructura_red_cloacal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_cloacal_fkey FOREIGN KEY (red_cloacal) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2078 (class 2606 OID 913020)
-- Dependencies: 2019 186 188 2237
-- Name: infraestructura_red_gas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_gas_fkey FOREIGN KEY (red_gas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2077 (class 2606 OID 913015)
-- Dependencies: 186 188 2019 2237
-- Name: infraestructura_sist_alternativo_eliminacion_excretas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_sist_alternativo_eliminacion_excretas_fkey FOREIGN KEY (sist_alternativo_eliminacion_excretas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2052 (class 2606 OID 912795)
-- Dependencies: 1990 168 166 2237
-- Name: localidad_id_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_id_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2056 (class 2606 OID 912845)
-- Dependencies: 172 174 1999 2237
-- Name: nomenclatura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2090 (class 2606 OID 913159)
-- Dependencies: 204 202 2043 2237
-- Name: organismos_de_intervencion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES antecedentes(id_folio);


--
-- TOC entry 2088 (class 2606 OID 913126)
-- Dependencies: 200 196 2032 2237
-- Name: registracion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY registracion
    ADD CONSTRAINT registracion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2085 (class 2606 OID 913093)
-- Dependencies: 196 194 2030 2237
-- Name: regularizacion__aprobacion_geodesia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion__aprobacion_geodesia_fkey FOREIGN KEY (_aprobacion_geodesia) REFERENCES aprobacion_geodesia(id);


--
-- TOC entry 2086 (class 2606 OID 913098)
-- Dependencies: 196 192 2027 2237
-- Name: regularizacion__estado_proceso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion__estado_proceso_fkey FOREIGN KEY (_estado_proceso) REFERENCES estado_proceso(id);


--
-- TOC entry 2084 (class 2606 OID 913088)
-- Dependencies: 196 172 1999 2237
-- Name: regularizacion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2083 (class 2606 OID 913054)
-- Dependencies: 190 176 2005 2237
-- Name: situacion_ambiental_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2067 (class 2606 OID 912948)
-- Dependencies: 182 2014 184 2237
-- Name: transporte_colectivos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_colectivos_fkey FOREIGN KEY (colectivos) REFERENCES opciones_transporte(id);


--
-- TOC entry 2068 (class 2606 OID 912953)
-- Dependencies: 182 184 2014 2237
-- Name: transporte_ferrocarril_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_ferrocarril_fkey FOREIGN KEY (ferrocarril) REFERENCES opciones_transporte(id);


--
-- TOC entry 2066 (class 2606 OID 912943)
-- Dependencies: 176 2005 184 2237
-- Name: transporte_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2069 (class 2606 OID 912958)
-- Dependencies: 2014 182 184 2237
-- Name: transporte_remis_combis_fkey; Type: FK CONSTRAINT; Schema: public; Owner: sstuv_app
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_remis_combis_fkey FOREIGN KEY (remis_combis) REFERENCES opciones_transporte(id);


--
-- TOC entry 2242 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2014-11-05 03:53:23 ART

--
-- PostgreSQL database dump complete
--

