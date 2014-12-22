--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.13
-- Dumped by pg_dump version 9.1.13
-- Started on 2014-12-22 06:19:28 ART

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 166 (class 1259 OID 925864)
-- Dependencies: 7
-- Name: antecedentes; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 167 (class 1259 OID 925867)
-- Dependencies: 166 7
-- Name: antecedentes_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE antecedentes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3110 (class 0 OID 0)
-- Dependencies: 167
-- Name: antecedentes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE antecedentes_id_seq OWNED BY antecedentes.id;


--
-- TOC entry 170 (class 1259 OID 925877)
-- Dependencies: 7
-- Name: condiciones_socio_urbanisticas; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE condiciones_socio_urbanisticas (
    id integer NOT NULL,
    id_folio integer NOT NULL,
    espacio_libre_comun boolean,
    presencia_org_sociales character varying(255),
    nombre_refernte character varying(45),
    telefono_referente character varying(45)
);


--
-- TOC entry 171 (class 1259 OID 925880)
-- Dependencies: 170 7
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE condiciones_socio_urbanisticas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3111 (class 0 OID 0)
-- Dependencies: 171
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE condiciones_socio_urbanisticas_id_seq OWNED BY condiciones_socio_urbanisticas.id;


--
-- TOC entry 172 (class 1259 OID 925882)
-- Dependencies: 7
-- Name: encuadre_legal; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 173 (class 1259 OID 925885)
-- Dependencies: 7 172
-- Name: encuadre_legal_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE encuadre_legal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3112 (class 0 OID 0)
-- Dependencies: 173
-- Name: encuadre_legal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE encuadre_legal_id_seq OWNED BY encuadre_legal.id;


--
-- TOC entry 174 (class 1259 OID 925887)
-- Dependencies: 7
-- Name: equipamiento; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 175 (class 1259 OID 925893)
-- Dependencies: 174 7
-- Name: equipamiento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE equipamiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3113 (class 0 OID 0)
-- Dependencies: 175
-- Name: equipamiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE equipamiento_id_seq OWNED BY equipamiento.id;


--
-- TOC entry 176 (class 1259 OID 925895)
-- Dependencies: 7
-- Name: estado_folio; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE estado_folio (
    id integer NOT NULL,
    nombre character varying NOT NULL,
    descripcion character varying
);


--
-- TOC entry 177 (class 1259 OID 925901)
-- Dependencies: 176 7
-- Name: estado_folio_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE estado_folio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3114 (class 0 OID 0)
-- Dependencies: 177
-- Name: estado_folio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE estado_folio_id_seq OWNED BY estado_folio.id;


--
-- TOC entry 178 (class 1259 OID 925903)
-- Dependencies: 7
-- Name: estado_proceso; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE estado_proceso (
    id integer NOT NULL,
    descripcion character varying(45)
);


--
-- TOC entry 179 (class 1259 OID 925906)
-- Dependencies: 178 7
-- Name: estado_proceso_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE estado_proceso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3115 (class 0 OID 0)
-- Dependencies: 179
-- Name: estado_proceso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE estado_proceso_id_seq OWNED BY estado_proceso.id;


--
-- TOC entry 180 (class 1259 OID 925908)
-- Dependencies: 7
-- Name: folio; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE folio (
    id integer NOT NULL,
    cod_folio character varying(7) NOT NULL,
    id_partido integer NOT NULL,
    matricula character varying(4) NOT NULL,
    fecha date NOT NULL,
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
    creador integer
);


--
-- TOC entry 181 (class 1259 OID 925914)
-- Dependencies: 7 180
-- Name: folio_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE folio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3116 (class 0 OID 0)
-- Dependencies: 181
-- Name: folio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE folio_id_seq OWNED BY folio.id;


--
-- TOC entry 182 (class 1259 OID 925916)
-- Dependencies: 7
-- Name: infraestructura; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 183 (class 1259 OID 925919)
-- Dependencies: 7 182
-- Name: infraestructura_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE infraestructura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3117 (class 0 OID 0)
-- Dependencies: 183
-- Name: infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE infraestructura_id_seq OWNED BY infraestructura.id;


--
-- TOC entry 184 (class 1259 OID 925921)
-- Dependencies: 7
-- Name: localidad; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE localidad (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    id_partido integer NOT NULL
);


--
-- TOC entry 185 (class 1259 OID 925924)
-- Dependencies: 7 184
-- Name: localidad_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE localidad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3118 (class 0 OID 0)
-- Dependencies: 185
-- Name: localidad_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE localidad_id_seq OWNED BY localidad.id;


--
-- TOC entry 186 (class 1259 OID 925926)
-- Dependencies: 7
-- Name: nomenclatura; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 187 (class 1259 OID 925929)
-- Dependencies: 7 186
-- Name: nomenclatura_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE nomenclatura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3119 (class 0 OID 0)
-- Dependencies: 187
-- Name: nomenclatura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE nomenclatura_id_seq OWNED BY nomenclatura.id;


--
-- TOC entry 188 (class 1259 OID 925931)
-- Dependencies: 7
-- Name: opciones_equipamientos; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE opciones_equipamientos (
    id integer NOT NULL,
    opcion character varying(45) NOT NULL
);


--
-- TOC entry 189 (class 1259 OID 925934)
-- Dependencies: 188 7
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE opciones_equipamientos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3120 (class 0 OID 0)
-- Dependencies: 189
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE opciones_equipamientos_id_seq OWNED BY opciones_equipamientos.id;


--
-- TOC entry 190 (class 1259 OID 925936)
-- Dependencies: 7
-- Name: opciones_infraestructura; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE opciones_infraestructura (
    id integer NOT NULL,
    opcion character varying(45)
);


--
-- TOC entry 191 (class 1259 OID 925939)
-- Dependencies: 190 7
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE opciones_infraestructura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3121 (class 0 OID 0)
-- Dependencies: 191
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE opciones_infraestructura_id_seq OWNED BY opciones_infraestructura.id;


--
-- TOC entry 192 (class 1259 OID 925941)
-- Dependencies: 7
-- Name: opciones_transporte; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE opciones_transporte (
    id integer NOT NULL,
    opcion character varying(45)
);


--
-- TOC entry 193 (class 1259 OID 925944)
-- Dependencies: 7 192
-- Name: opciones_transporte_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE opciones_transporte_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3122 (class 0 OID 0)
-- Dependencies: 193
-- Name: opciones_transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE opciones_transporte_id_seq OWNED BY opciones_transporte.id;


--
-- TOC entry 194 (class 1259 OID 925946)
-- Dependencies: 7
-- Name: organismos_de_intervencion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 195 (class 1259 OID 925952)
-- Dependencies: 7 194
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE organismos_de_intervencion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3123 (class 0 OID 0)
-- Dependencies: 195
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE organismos_de_intervencion_id_seq OWNED BY organismos_de_intervencion.id;


--
-- TOC entry 196 (class 1259 OID 925954)
-- Dependencies: 7
-- Name: partido; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE partido (
    id integer NOT NULL,
    nombre character varying(45) NOT NULL,
    cod_partido character varying(3)
);


--
-- TOC entry 197 (class 1259 OID 925957)
-- Dependencies: 196 7
-- Name: partido_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE partido_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3124 (class 0 OID 0)
-- Dependencies: 197
-- Name: partido_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE partido_id_seq OWNED BY partido.id;


--
-- TOC entry 198 (class 1259 OID 925959)
-- Dependencies: 7
-- Name: perfil; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE perfil (
    id_perfil integer NOT NULL,
    nombre character varying NOT NULL,
    descripcion character varying
);


--
-- TOC entry 199 (class 1259 OID 925965)
-- Dependencies: 7 198
-- Name: perfil_id_perfil_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE perfil_id_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3125 (class 0 OID 0)
-- Dependencies: 199
-- Name: perfil_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE perfil_id_perfil_seq OWNED BY perfil.id_perfil;


--
-- TOC entry 200 (class 1259 OID 925967)
-- Dependencies: 7
-- Name: regularizacion; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE regularizacion (
    id integer NOT NULL,
    id_folio integer,
    proceso_iniciado boolean,
    observaciones text
);


--
-- TOC entry 201 (class 1259 OID 925973)
-- Dependencies: 200 7
-- Name: regularizacion_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE regularizacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3126 (class 0 OID 0)
-- Dependencies: 201
-- Name: regularizacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE regularizacion_id_seq OWNED BY regularizacion.id;


--
-- TOC entry 202 (class 1259 OID 925975)
-- Dependencies: 7
-- Name: situacion_ambiental; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 203 (class 1259 OID 925978)
-- Dependencies: 7 202
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE situacion_ambiental_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3127 (class 0 OID 0)
-- Dependencies: 203
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE situacion_ambiental_id_seq OWNED BY situacion_ambiental.id;


--
-- TOC entry 204 (class 1259 OID 925980)
-- Dependencies: 7
-- Name: tipo_barrio; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE tipo_barrio (
    id integer NOT NULL,
    tipo character varying(45) NOT NULL
);


--
-- TOC entry 205 (class 1259 OID 925983)
-- Dependencies: 7 204
-- Name: tipo_barrio_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE tipo_barrio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3128 (class 0 OID 0)
-- Dependencies: 205
-- Name: tipo_barrio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE tipo_barrio_id_seq OWNED BY tipo_barrio.id;


--
-- TOC entry 206 (class 1259 OID 925985)
-- Dependencies: 7
-- Name: transporte; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE transporte (
    id integer NOT NULL,
    id_folio integer,
    colectivos integer,
    ferrocarril integer,
    remis_combis integer
);


--
-- TOC entry 207 (class 1259 OID 925988)
-- Dependencies: 206 7
-- Name: transporte_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE transporte_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3129 (class 0 OID 0)
-- Dependencies: 207
-- Name: transporte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE transporte_id_seq OWNED BY transporte.id;


--
-- TOC entry 208 (class 1259 OID 925990)
-- Dependencies: 7
-- Name: uso_interno; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 209 (class 1259 OID 925996)
-- Dependencies: 2845 7
-- Name: usuario; Type: TABLE; Schema: public; Owner: -; Tablespace: 
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


--
-- TOC entry 210 (class 1259 OID 926003)
-- Dependencies: 209 7
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3130 (class 0 OID 0)
-- Dependencies: 210
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE usuario_id_usuario_seq OWNED BY usuario.id_usuario;


--
-- TOC entry 2825 (class 2604 OID 926005)
-- Dependencies: 167 166
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY antecedentes ALTER COLUMN id SET DEFAULT nextval('antecedentes_id_seq'::regclass);


--
-- TOC entry 2826 (class 2604 OID 926007)
-- Dependencies: 171 170
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY condiciones_socio_urbanisticas ALTER COLUMN id SET DEFAULT nextval('condiciones_socio_urbanisticas_id_seq'::regclass);


--
-- TOC entry 2827 (class 2604 OID 926008)
-- Dependencies: 173 172
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY encuadre_legal ALTER COLUMN id SET DEFAULT nextval('encuadre_legal_id_seq'::regclass);


--
-- TOC entry 2828 (class 2604 OID 926010)
-- Dependencies: 175 174
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento ALTER COLUMN id SET DEFAULT nextval('equipamiento_id_seq'::regclass);


--
-- TOC entry 2829 (class 2604 OID 926011)
-- Dependencies: 177 176
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY estado_folio ALTER COLUMN id SET DEFAULT nextval('estado_folio_id_seq'::regclass);


--
-- TOC entry 2830 (class 2604 OID 926012)
-- Dependencies: 179 178
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY estado_proceso ALTER COLUMN id SET DEFAULT nextval('estado_proceso_id_seq'::regclass);


--
-- TOC entry 2831 (class 2604 OID 926013)
-- Dependencies: 181 180
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY folio ALTER COLUMN id SET DEFAULT nextval('folio_id_seq'::regclass);


--
-- TOC entry 2832 (class 2604 OID 926014)
-- Dependencies: 183 182
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura ALTER COLUMN id SET DEFAULT nextval('infraestructura_id_seq'::regclass);


--
-- TOC entry 2833 (class 2604 OID 926015)
-- Dependencies: 185 184
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY localidad ALTER COLUMN id SET DEFAULT nextval('localidad_id_seq'::regclass);


--
-- TOC entry 2834 (class 2604 OID 926016)
-- Dependencies: 187 186
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY nomenclatura ALTER COLUMN id SET DEFAULT nextval('nomenclatura_id_seq'::regclass);


--
-- TOC entry 2835 (class 2604 OID 926017)
-- Dependencies: 189 188
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY opciones_equipamientos ALTER COLUMN id SET DEFAULT nextval('opciones_equipamientos_id_seq'::regclass);


--
-- TOC entry 2836 (class 2604 OID 926018)
-- Dependencies: 191 190
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY opciones_infraestructura ALTER COLUMN id SET DEFAULT nextval('opciones_infraestructura_id_seq'::regclass);


--
-- TOC entry 2837 (class 2604 OID 926019)
-- Dependencies: 193 192
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY opciones_transporte ALTER COLUMN id SET DEFAULT nextval('opciones_transporte_id_seq'::regclass);


--
-- TOC entry 2838 (class 2604 OID 926020)
-- Dependencies: 195 194
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY organismos_de_intervencion ALTER COLUMN id SET DEFAULT nextval('organismos_de_intervencion_id_seq'::regclass);


--
-- TOC entry 2839 (class 2604 OID 926021)
-- Dependencies: 197 196
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY partido ALTER COLUMN id SET DEFAULT nextval('partido_id_seq'::regclass);


--
-- TOC entry 2840 (class 2604 OID 926022)
-- Dependencies: 199 198
-- Name: id_perfil; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY perfil ALTER COLUMN id_perfil SET DEFAULT nextval('perfil_id_perfil_seq'::regclass);


--
-- TOC entry 2841 (class 2604 OID 926023)
-- Dependencies: 201 200
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY regularizacion ALTER COLUMN id SET DEFAULT nextval('regularizacion_id_seq'::regclass);


--
-- TOC entry 2842 (class 2604 OID 926024)
-- Dependencies: 203 202
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY situacion_ambiental ALTER COLUMN id SET DEFAULT nextval('situacion_ambiental_id_seq'::regclass);


--
-- TOC entry 2843 (class 2604 OID 926025)
-- Dependencies: 205 204
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY tipo_barrio ALTER COLUMN id SET DEFAULT nextval('tipo_barrio_id_seq'::regclass);


--
-- TOC entry 2844 (class 2604 OID 926026)
-- Dependencies: 207 206
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY transporte ALTER COLUMN id SET DEFAULT nextval('transporte_id_seq'::regclass);


--
-- TOC entry 2846 (class 2604 OID 926027)
-- Dependencies: 210 209
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuario ALTER COLUMN id_usuario SET DEFAULT nextval('usuario_id_usuario_seq'::regclass);


--
-- TOC entry 3063 (class 0 OID 925864)
-- Dependencies: 166 3106
-- Data for Name: antecedentes; Type: TABLE DATA; Schema: public; Owner: -
--

COPY antecedentes (id, id_folio, sin_intervencion, obras_infraestructura, equipamientos, intervenciones_en_viviendas, otros) FROM stdin;
\.


--
-- TOC entry 3131 (class 0 OID 0)
-- Dependencies: 167
-- Name: antecedentes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('antecedentes_id_seq', 1, true);


--
-- TOC entry 3065 (class 0 OID 925877)
-- Dependencies: 170 3106
-- Data for Name: condiciones_socio_urbanisticas; Type: TABLE DATA; Schema: public; Owner: -
--

COPY condiciones_socio_urbanisticas (id, id_folio, espacio_libre_comun, presencia_org_sociales, nombre_refernte, telefono_referente) FROM stdin;
\.


--
-- TOC entry 3132 (class 0 OID 0)
-- Dependencies: 171
-- Name: condiciones_socio_urbanisticas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('condiciones_socio_urbanisticas_id_seq', 1, true);


--
-- TOC entry 3067 (class 0 OID 925882)
-- Dependencies: 172 3106
-- Data for Name: encuadre_legal; Type: TABLE DATA; Schema: public; Owner: -
--

COPY encuadre_legal (id, id_folio, decreto_2225_95, ley_24374, decreto_815_88, ley_23073, decreto_4686_96, expropiacion, otros, ley_14449, tiene_expropiacion) FROM stdin;
\.


--
-- TOC entry 3133 (class 0 OID 0)
-- Dependencies: 173
-- Name: encuadre_legal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('encuadre_legal_id_seq', 1, true);


--
-- TOC entry 3069 (class 0 OID 925887)
-- Dependencies: 174 3106
-- Data for Name: equipamiento; Type: TABLE DATA; Schema: public; Owner: -
--

COPY equipamiento (id, id_folio, unidad_sanitaria, jardin_infantes, escuela_primaria, escuela_secundaria, comedor, centro_integracion_comunitaria, otro) FROM stdin;
\.


--
-- TOC entry 3134 (class 0 OID 0)
-- Dependencies: 175
-- Name: equipamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('equipamiento_id_seq', 1, true);


--
-- TOC entry 3071 (class 0 OID 925895)
-- Dependencies: 176 3106
-- Data for Name: estado_folio; Type: TABLE DATA; Schema: public; Owner: -
--

COPY estado_folio (id, nombre, descripcion) FROM stdin;
3	validacion	Validación
4	no_corresponde	No corresponde inscripción
5	notificacion	Notificación para confirmar los datos
6	confirmacion	Confirmado
7	inscripcion	Inscripción
1	carga/edicion	Carga / Edición
2	enviado_espera	Enviado / Espera
\.


--
-- TOC entry 3135 (class 0 OID 0)
-- Dependencies: 177
-- Name: estado_folio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('estado_folio_id_seq', 7, true);


--
-- TOC entry 3073 (class 0 OID 925903)
-- Dependencies: 178 3106
-- Data for Name: estado_proceso; Type: TABLE DATA; Schema: public; Owner: -
--

COPY estado_proceso (id, descripcion) FROM stdin;
1	Iniciado
3	Escriturado
2	Acta de regularización de preadjucación
\.


--
-- TOC entry 3136 (class 0 OID 0)
-- Dependencies: 179
-- Name: estado_proceso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('estado_proceso_id_seq', 3, true);


--
-- TOC entry 3075 (class 0 OID 925908)
-- Dependencies: 180 3106
-- Data for Name: folio; Type: TABLE DATA; Schema: public; Owner: -
--

COPY folio (id, cod_folio, id_partido, matricula, fecha, nombre_barrio_oficial, nombre_barrio_alternativo_1, nombre_barrio_alternativo_2, anio_origen, superficie, cantidad_familias, tipo_barrio, observacion_caso_dudoso, direccion, geom, judicializado, localidad, creador) FROM stdin;
\.


--
-- TOC entry 3137 (class 0 OID 0)
-- Dependencies: 181
-- Name: folio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('folio_id_seq', 1, true);


--
-- TOC entry 3077 (class 0 OID 925916)
-- Dependencies: 182 3106
-- Data for Name: infraestructura; Type: TABLE DATA; Schema: public; Owner: -
--

COPY infraestructura (id, id_folio, energia_electrica_medidor_individual, energia_electrica_medidor_colectivo, alumbrado_publico, agua_corriente, agua_potable, red_cloacal, sist_alternativo_eliminacion_excretas, red_gas, pavimento, cordon_cuneta, desagues_pluviales, recoleccion_residuos) FROM stdin;
\.


--
-- TOC entry 3138 (class 0 OID 0)
-- Dependencies: 183
-- Name: infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('infraestructura_id_seq', 3, true);


--
-- TOC entry 3079 (class 0 OID 925921)
-- Dependencies: 184 3106
-- Data for Name: localidad; Type: TABLE DATA; Schema: public; Owner: -
--

COPY localidad (id, nombre, id_partido) FROM stdin;
\.


--
-- TOC entry 3139 (class 0 OID 0)
-- Dependencies: 185
-- Name: localidad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('localidad_id_seq', 1, true);


--
-- TOC entry 3081 (class 0 OID 925926)
-- Dependencies: 186 3106
-- Data for Name: nomenclatura; Type: TABLE DATA; Schema: public; Owner: -
--

COPY nomenclatura (id, id_folio, partida_inmobiliaria, titular_dominio, circ, secc, chac_quinta, frac, mza, parc, _inscripcion_dominio, partido, _dato_verificado_reg_propiedad, estado_geografico) FROM stdin;
\.


--
-- TOC entry 3140 (class 0 OID 0)
-- Dependencies: 187
-- Name: nomenclatura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('nomenclatura_id_seq', 1, false);


--
-- TOC entry 3083 (class 0 OID 925931)
-- Dependencies: 188 3106
-- Data for Name: opciones_equipamientos; Type: TABLE DATA; Schema: public; Owner: -
--

COPY opciones_equipamientos (id, opcion) FROM stdin;
1	Dentro del barrio
2	Próximo al barrio
3	Distante > 1 KM
4	Inexistente
5	Sin dato
\.


--
-- TOC entry 3141 (class 0 OID 0)
-- Dependencies: 189
-- Name: opciones_equipamientos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('opciones_equipamientos_id_seq', 5, true);


--
-- TOC entry 3085 (class 0 OID 925936)
-- Dependencies: 190 3106
-- Data for Name: opciones_infraestructura; Type: TABLE DATA; Schema: public; Owner: -
--

COPY opciones_infraestructura (id, opcion) FROM stdin;
1	Inexistente
2	Cobertura Parcial
3	Cobertura Total
4	Sin dato
\.


--
-- TOC entry 3142 (class 0 OID 0)
-- Dependencies: 191
-- Name: opciones_infraestructura_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('opciones_infraestructura_id_seq', 4, true);


--
-- TOC entry 3087 (class 0 OID 925941)
-- Dependencies: 192 3106
-- Data for Name: opciones_transporte; Type: TABLE DATA; Schema: public; Owner: -
--

COPY opciones_transporte (id, opcion) FROM stdin;
1	Dentro del barrio
2	Próximo al barrio
3	Distante > 1 KM 
4	Inexistente
5	Sin dato
\.


--
-- TOC entry 3143 (class 0 OID 0)
-- Dependencies: 193
-- Name: opciones_transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('opciones_transporte_id_seq', 5, true);


--
-- TOC entry 3089 (class 0 OID 925946)
-- Dependencies: 194 3106
-- Data for Name: organismos_de_intervencion; Type: TABLE DATA; Schema: public; Owner: -
--

COPY organismos_de_intervencion (id, id_folio, nacional, provincial, municipal, fecha_intervencion, programas) FROM stdin;
\.


--
-- TOC entry 3144 (class 0 OID 0)
-- Dependencies: 195
-- Name: organismos_de_intervencion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('organismos_de_intervencion_id_seq', 1, true);


--
-- TOC entry 3091 (class 0 OID 925954)
-- Dependencies: 196 3106
-- Data for Name: partido; Type: TABLE DATA; Schema: public; Owner: -
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
-- TOC entry 3145 (class 0 OID 0)
-- Dependencies: 197
-- Name: partido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('partido_id_seq', 152, true);


--
-- TOC entry 3093 (class 0 OID 925959)
-- Dependencies: 198 3106
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: -
--

COPY perfil (id_perfil, nombre, descripcion) FROM stdin;
1	administrador	administrador
2	carga	Usuario de carga
4	visualizador_general	visualizador general
5	visualizador_basico	visualizador básico
3	uso_interno	Uso Interno
\.


--
-- TOC entry 3146 (class 0 OID 0)
-- Dependencies: 199
-- Name: perfil_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('perfil_id_perfil_seq', 3, true);


--
-- TOC entry 3095 (class 0 OID 925967)
-- Dependencies: 200 3106
-- Data for Name: regularizacion; Type: TABLE DATA; Schema: public; Owner: -
--

COPY regularizacion (id, id_folio, proceso_iniciado, observaciones) FROM stdin;
\.


--
-- TOC entry 3147 (class 0 OID 0)
-- Dependencies: 201
-- Name: regularizacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('regularizacion_id_seq', 1, true);


--
-- TOC entry 3097 (class 0 OID 925975)
-- Dependencies: 202 3106
-- Data for Name: situacion_ambiental; Type: TABLE DATA; Schema: public; Owner: -
--

COPY situacion_ambiental (id, id_folio, sin_problemas, reserva_electroducto, inundable, sobre_terraplen_ferroviario, sobre_camino_sirga, expuesto_contaminacion_industrial, sobre_suelo_degradado, otro) FROM stdin;
\.


--
-- TOC entry 3148 (class 0 OID 0)
-- Dependencies: 203
-- Name: situacion_ambiental_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('situacion_ambiental_id_seq', 1, true);


--
-- TOC entry 3099 (class 0 OID 925980)
-- Dependencies: 204 3106
-- Data for Name: tipo_barrio; Type: TABLE DATA; Schema: public; Owner: -
--

COPY tipo_barrio (id, tipo) FROM stdin;
1	Villa
2	Asentamiento Precario
3	Otro
\.


--
-- TOC entry 3149 (class 0 OID 0)
-- Dependencies: 205
-- Name: tipo_barrio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('tipo_barrio_id_seq', 3, true);


--
-- TOC entry 3101 (class 0 OID 925985)
-- Dependencies: 206 3106
-- Data for Name: transporte; Type: TABLE DATA; Schema: public; Owner: -
--

COPY transporte (id, id_folio, colectivos, ferrocarril, remis_combis) FROM stdin;
\.


--
-- TOC entry 3150 (class 0 OID 0)
-- Dependencies: 207
-- Name: transporte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('transporte_id_seq', 1, true);


--
-- TOC entry 3103 (class 0 OID 925990)
-- Dependencies: 208 3106
-- Data for Name: uso_interno; Type: TABLE DATA; Schema: public; Owner: -
--

COPY uso_interno (id_folio, informe_urbanistico_fecha, mapeo_preliminar, no_corresponde_inscripcion, resolucion_inscripcion_provisoria, resolucion_inscripcion_definitiva, regularizacion_fecha_inicio, regularizacion_tiene_plano, regularizacion_circular_10_catastro, regularizacion_aprobacion_geodesia, regularizacion_registracion, regularizacion_estado_proceso, num_expediente, registracion_legajo, registracion_fecha, registracion_folio, geodesia_num, geodesia_anio, tiene_censo, fecha_censo, geodesia_partido, ley_14449, estado_folio) FROM stdin;
\.


--
-- TOC entry 3104 (class 0 OID 925996)
-- Dependencies: 209 3106
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY usuario (id_usuario, password, email, super_admin, fecha_activacion, nombre, id_perfil, cod_partido, nombre_completo, reparticion) FROM stdin;
8	b7923fe9afe7142a24720692484321c5	mail@laplata.com	f	2014-12-21	055	2	055	Juan Platense	municipio
9	d2490f048dc3b77a457e3e450ab4eb38	bragado@gmail.com	f	2014-12-21	012	2	012	Bragado	municipio
11	958153f1b8b96ec4c4eb2147429105d9	visualizadorgeneral@buenosaires.gob.ar	f	2014-12-21	vgeneral	4	\N	visualizador general	la plata
12	4069743c5c82111a7a66113eb450e95d	visualizadorbasico@buenosaires.gob.ar	f	2014-12-21	vbasico	5	\N	visualizador basico	la plata
1	21232f297a57a5a743894a0e4a801fc3	pepe	t	2014-10-24	admin	1		Administrador	sstuv
10	f9b2e4259fa073ea0b55456673355349	sstuv@mail	f	2014-12-21	sstuv_001	3		uso interno 1	sstuv
\.


--
-- TOC entry 3151 (class 0 OID 0)
-- Dependencies: 210
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('usuario_id_usuario_seq', 12, true);


--
-- TOC entry 2848 (class 2606 OID 926029)
-- Dependencies: 166 166 3107
-- Name: antecedentes_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2851 (class 2606 OID 926031)
-- Dependencies: 166 166 3107
-- Name: antecedentes_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_pkey PRIMARY KEY (id);


--
-- TOC entry 2854 (class 2606 OID 926035)
-- Dependencies: 170 170 3107
-- Name: condiciones_socio_urbanisticas_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2856 (class 2606 OID 926037)
-- Dependencies: 170 170 170 3107
-- Name: condiciones_socio_urbanisticas_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_pkey PRIMARY KEY (id, id_folio);


--
-- TOC entry 2859 (class 2606 OID 926039)
-- Dependencies: 172 172 3107
-- Name: encuadre_legal_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_pkey PRIMARY KEY (id);


--
-- TOC entry 2862 (class 2606 OID 926041)
-- Dependencies: 174 174 3107
-- Name: equipamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_pkey PRIMARY KEY (id);


--
-- TOC entry 2864 (class 2606 OID 926043)
-- Dependencies: 176 176 3107
-- Name: estado_folio_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY estado_folio
    ADD CONSTRAINT estado_folio_pkey PRIMARY KEY (id);


--
-- TOC entry 2866 (class 2606 OID 926045)
-- Dependencies: 178 178 3107
-- Name: estado_proceso_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY estado_proceso
    ADD CONSTRAINT estado_proceso_pkey PRIMARY KEY (id);


--
-- TOC entry 2868 (class 2606 OID 926047)
-- Dependencies: 180 180 3107
-- Name: folio_cod_folio_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_cod_folio_key UNIQUE (cod_folio);


--
-- TOC entry 2871 (class 2606 OID 926049)
-- Dependencies: 180 180 3107
-- Name: folio_id_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_id_key UNIQUE (id);


--
-- TOC entry 2873 (class 2606 OID 926051)
-- Dependencies: 180 180 3107
-- Name: folio_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_pkey PRIMARY KEY (id);


--
-- TOC entry 2918 (class 2606 OID 926053)
-- Dependencies: 209 209 3107
-- Name: id_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_usuario_pk PRIMARY KEY (id_usuario);


--
-- TOC entry 2876 (class 2606 OID 926055)
-- Dependencies: 182 182 3107
-- Name: infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 2879 (class 2606 OID 926057)
-- Dependencies: 184 184 3107
-- Name: localidad_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_pkey PRIMARY KEY (id);


--
-- TOC entry 2882 (class 2606 OID 926059)
-- Dependencies: 186 186 3107
-- Name: nomenclatura_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_pkey PRIMARY KEY (id);


--
-- TOC entry 2884 (class 2606 OID 926061)
-- Dependencies: 188 188 3107
-- Name: opciones_equipamientos_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY opciones_equipamientos
    ADD CONSTRAINT opciones_equipamientos_pkey PRIMARY KEY (id);


--
-- TOC entry 2886 (class 2606 OID 926063)
-- Dependencies: 190 190 3107
-- Name: opciones_infraestructura_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY opciones_infraestructura
    ADD CONSTRAINT opciones_infraestructura_pkey PRIMARY KEY (id);


--
-- TOC entry 2888 (class 2606 OID 926065)
-- Dependencies: 192 192 3107
-- Name: opciones_transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY opciones_transporte
    ADD CONSTRAINT opciones_transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 2891 (class 2606 OID 926067)
-- Dependencies: 194 194 3107
-- Name: organismos_de_intervencion_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_pkey PRIMARY KEY (id);


--
-- TOC entry 2893 (class 2606 OID 926069)
-- Dependencies: 196 196 3107
-- Name: partido_cod_partido_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY partido
    ADD CONSTRAINT partido_cod_partido_key UNIQUE (cod_partido);


--
-- TOC entry 2896 (class 2606 OID 926071)
-- Dependencies: 196 196 3107
-- Name: partido_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY partido
    ADD CONSTRAINT partido_pkey PRIMARY KEY (id);


--
-- TOC entry 2898 (class 2606 OID 926073)
-- Dependencies: 198 198 3107
-- Name: perfil_nombre_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_nombre_key UNIQUE (nombre);


--
-- TOC entry 2900 (class 2606 OID 926075)
-- Dependencies: 198 198 3107
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id_perfil);


--
-- TOC entry 2902 (class 2606 OID 926077)
-- Dependencies: 200 200 3107
-- Name: regularizacion_id_folio_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_key UNIQUE (id_folio);


--
-- TOC entry 2905 (class 2606 OID 926079)
-- Dependencies: 200 200 3107
-- Name: regularizacion_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_pkey PRIMARY KEY (id);


--
-- TOC entry 2908 (class 2606 OID 926081)
-- Dependencies: 202 202 3107
-- Name: situacion_ambiental_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_pkey PRIMARY KEY (id);


--
-- TOC entry 2911 (class 2606 OID 926083)
-- Dependencies: 204 204 3107
-- Name: tipo_barrio_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY tipo_barrio
    ADD CONSTRAINT tipo_barrio_pkey PRIMARY KEY (id);


--
-- TOC entry 2914 (class 2606 OID 926085)
-- Dependencies: 206 206 3107
-- Name: transporte_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_pkey PRIMARY KEY (id);


--
-- TOC entry 2916 (class 2606 OID 926087)
-- Dependencies: 208 208 3107
-- Name: uso_interno_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_pkey PRIMARY KEY (id_folio);


--
-- TOC entry 2921 (class 2606 OID 926089)
-- Dependencies: 209 209 3107
-- Name: usuario_nombre_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_nombre_key UNIQUE (nombre);


--
-- TOC entry 2849 (class 1259 OID 926090)
-- Dependencies: 166 3107
-- Name: antecedentes_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX antecedentes_id_idx ON antecedentes USING btree (id);


--
-- TOC entry 2852 (class 1259 OID 926091)
-- Dependencies: 170 3107
-- Name: cond_socio_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX cond_socio_id_idx ON condiciones_socio_urbanisticas USING btree (id);


--
-- TOC entry 2857 (class 1259 OID 926092)
-- Dependencies: 172 3107
-- Name: encuadre_legal_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX encuadre_legal_id_idx ON encuadre_legal USING btree (id);


--
-- TOC entry 2860 (class 1259 OID 926093)
-- Dependencies: 174 3107
-- Name: equipamiento_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX equipamiento_id_idx ON equipamiento USING btree (id);


--
-- TOC entry 2869 (class 1259 OID 926094)
-- Dependencies: 180 3107
-- Name: folio_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX folio_id_idx ON folio USING btree (id);


--
-- TOC entry 2874 (class 1259 OID 926095)
-- Dependencies: 182 3107
-- Name: infraestructura_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX infraestructura_id_idx ON infraestructura USING btree (id);


--
-- TOC entry 2877 (class 1259 OID 926096)
-- Dependencies: 184 3107
-- Name: localidad_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX localidad_id_idx ON localidad USING btree (id);


--
-- TOC entry 2880 (class 1259 OID 926097)
-- Dependencies: 186 3107
-- Name: nomenclatura_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX nomenclatura_id_idx ON nomenclatura USING btree (id);


--
-- TOC entry 2889 (class 1259 OID 926098)
-- Dependencies: 194 3107
-- Name: organismos_de_intervencion_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX organismos_de_intervencion_id_idx ON organismos_de_intervencion USING btree (id);


--
-- TOC entry 2894 (class 1259 OID 926099)
-- Dependencies: 196 3107
-- Name: partido_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX partido_id_idx ON partido USING btree (id);


--
-- TOC entry 2903 (class 1259 OID 926100)
-- Dependencies: 200 3107
-- Name: regularizacion_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX regularizacion_id_idx ON regularizacion USING btree (id);


--
-- TOC entry 2906 (class 1259 OID 926101)
-- Dependencies: 202 3107
-- Name: situacion_ambiental_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX situacion_ambiental_id_idx ON situacion_ambiental USING btree (id);


--
-- TOC entry 2909 (class 1259 OID 926102)
-- Dependencies: 204 3107
-- Name: tipo_barrio_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX tipo_barrio_id_idx ON tipo_barrio USING btree (id);


--
-- TOC entry 2912 (class 1259 OID 926103)
-- Dependencies: 206 3107
-- Name: transporte_id_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX transporte_id_idx ON transporte USING btree (id);


--
-- TOC entry 2919 (class 1259 OID 926104)
-- Dependencies: 209 3107
-- Name: usuario_id_usuario_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX usuario_id_usuario_idx ON usuario USING btree (id_usuario);

ALTER TABLE usuario CLUSTER ON usuario_id_usuario_idx;


--
-- TOC entry 2922 (class 2606 OID 926105)
-- Dependencies: 200 2901 166 3107
-- Name: antecedentes_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY antecedentes
    ADD CONSTRAINT antecedentes_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2923 (class 2606 OID 926115)
-- Dependencies: 2870 180 170 3107
-- Name: condiciones_socio_urbanisticas_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY condiciones_socio_urbanisticas
    ADD CONSTRAINT condiciones_socio_urbanisticas_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2924 (class 2606 OID 926120)
-- Dependencies: 200 2901 172 3107
-- Name: encuadre_legal_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY encuadre_legal
    ADD CONSTRAINT encuadre_legal_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES regularizacion(id_folio);


--
-- TOC entry 2925 (class 2606 OID 926125)
-- Dependencies: 174 2883 188 3107
-- Name: equipamiento_centro_integracion_comunitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_centro_integracion_comunitaria_fkey FOREIGN KEY (centro_integracion_comunitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2926 (class 2606 OID 926130)
-- Dependencies: 2883 174 188 3107
-- Name: equipamiento_comedor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_comedor_fkey FOREIGN KEY (comedor) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2927 (class 2606 OID 926135)
-- Dependencies: 174 2883 188 3107
-- Name: equipamiento_escuela_primaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_primaria_fkey FOREIGN KEY (escuela_primaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2928 (class 2606 OID 926140)
-- Dependencies: 174 2883 188 3107
-- Name: equipamiento_escuela_secundaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_escuela_secundaria_fkey FOREIGN KEY (escuela_secundaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2929 (class 2606 OID 926145)
-- Dependencies: 174 2853 170 3107
-- Name: equipamiento_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2930 (class 2606 OID 926150)
-- Dependencies: 174 2883 188 3107
-- Name: equipamiento_jardin_infantes_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_jardin_infantes_fkey FOREIGN KEY (jardin_infantes) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2931 (class 2606 OID 926155)
-- Dependencies: 2883 188 174 3107
-- Name: equipamiento_unidad_sanitaria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY equipamiento
    ADD CONSTRAINT equipamiento_unidad_sanitaria_fkey FOREIGN KEY (unidad_sanitaria) REFERENCES opciones_equipamientos(id);


--
-- TOC entry 2934 (class 2606 OID 926300)
-- Dependencies: 180 209 2917 3107
-- Name: folio_creador_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_creador_fkey FOREIGN KEY (creador) REFERENCES usuario(id_usuario);


--
-- TOC entry 2932 (class 2606 OID 926160)
-- Dependencies: 196 2895 180 3107
-- Name: folio_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2933 (class 2606 OID 926165)
-- Dependencies: 204 2910 180 3107
-- Name: folio_tipo_barrio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY folio
    ADD CONSTRAINT folio_tipo_barrio_fkey FOREIGN KEY (tipo_barrio) REFERENCES tipo_barrio(id);


--
-- TOC entry 2960 (class 2606 OID 926170)
-- Dependencies: 198 2899 209 3107
-- Name: id_perfil_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT id_perfil_fk FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil);


--
-- TOC entry 2935 (class 2606 OID 926175)
-- Dependencies: 190 2885 182 3107
-- Name: infraestructura_agua_corriente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_corriente_fkey FOREIGN KEY (agua_corriente) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2936 (class 2606 OID 926180)
-- Dependencies: 182 190 2885 3107
-- Name: infraestructura_agua_potable_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_agua_potable_fkey FOREIGN KEY (agua_potable) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2937 (class 2606 OID 926185)
-- Dependencies: 182 190 2885 3107
-- Name: infraestructura_alumbrado_publico_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_alumbrado_publico_fkey FOREIGN KEY (alumbrado_publico) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2938 (class 2606 OID 926190)
-- Dependencies: 2885 182 190 3107
-- Name: infraestructura_cordon_cuneta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_cordon_cuneta_fkey FOREIGN KEY (cordon_cuneta) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2939 (class 2606 OID 926195)
-- Dependencies: 2885 182 190 3107
-- Name: infraestructura_desagues_pluviales_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_desagues_pluviales_fkey FOREIGN KEY (desagues_pluviales) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2940 (class 2606 OID 926200)
-- Dependencies: 182 190 2885 3107
-- Name: infraestructura_energia_electrica_medidor_colectivo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_colectivo_fkey FOREIGN KEY (energia_electrica_medidor_colectivo) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2941 (class 2606 OID 926205)
-- Dependencies: 190 2885 182 3107
-- Name: infraestructura_energia_electrica_medidor_individual_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_energia_electrica_medidor_individual_fkey FOREIGN KEY (energia_electrica_medidor_individual) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2942 (class 2606 OID 926210)
-- Dependencies: 170 2853 182 3107
-- Name: infraestructura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2943 (class 2606 OID 926215)
-- Dependencies: 2885 182 190 3107
-- Name: infraestructura_pavimento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_pavimento_fkey FOREIGN KEY (pavimento) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2944 (class 2606 OID 926220)
-- Dependencies: 2885 182 190 3107
-- Name: infraestructura_recoleccion_residuos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_recoleccion_residuos_fkey FOREIGN KEY (recoleccion_residuos) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2945 (class 2606 OID 926225)
-- Dependencies: 190 182 2885 3107
-- Name: infraestructura_red_cloacal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_cloacal_fkey FOREIGN KEY (red_cloacal) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2946 (class 2606 OID 926230)
-- Dependencies: 2885 182 190 3107
-- Name: infraestructura_red_gas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_red_gas_fkey FOREIGN KEY (red_gas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2947 (class 2606 OID 926235)
-- Dependencies: 2885 182 190 3107
-- Name: infraestructura_sist_alternativo_eliminacion_excretas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY infraestructura
    ADD CONSTRAINT infraestructura_sist_alternativo_eliminacion_excretas_fkey FOREIGN KEY (sist_alternativo_eliminacion_excretas) REFERENCES opciones_infraestructura(id);


--
-- TOC entry 2948 (class 2606 OID 926240)
-- Dependencies: 2895 184 196 3107
-- Name: localidad_partido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY localidad
    ADD CONSTRAINT localidad_partido_fkey FOREIGN KEY (id_partido) REFERENCES partido(id);


--
-- TOC entry 2949 (class 2606 OID 926245)
-- Dependencies: 186 180 2870 3107
-- Name: nomenclatura_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY nomenclatura
    ADD CONSTRAINT nomenclatura_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2950 (class 2606 OID 926250)
-- Dependencies: 2847 194 166 3107
-- Name: organismos_de_intervencion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY organismos_de_intervencion
    ADD CONSTRAINT organismos_de_intervencion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES antecedentes(id_folio);


--
-- TOC entry 2951 (class 2606 OID 926255)
-- Dependencies: 180 2870 200 3107
-- Name: regularizacion_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY regularizacion
    ADD CONSTRAINT regularizacion_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2952 (class 2606 OID 926260)
-- Dependencies: 2853 202 170 3107
-- Name: situacion_ambiental_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY situacion_ambiental
    ADD CONSTRAINT situacion_ambiental_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2953 (class 2606 OID 926265)
-- Dependencies: 206 2887 192 3107
-- Name: transporte_colectivos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_colectivos_fkey FOREIGN KEY (colectivos) REFERENCES opciones_transporte(id);


--
-- TOC entry 2954 (class 2606 OID 926270)
-- Dependencies: 2887 192 206 3107
-- Name: transporte_ferrocarril_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_ferrocarril_fkey FOREIGN KEY (ferrocarril) REFERENCES opciones_transporte(id);


--
-- TOC entry 2955 (class 2606 OID 926275)
-- Dependencies: 2853 170 206 3107
-- Name: transporte_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES condiciones_socio_urbanisticas(id_folio);


--
-- TOC entry 2956 (class 2606 OID 926280)
-- Dependencies: 2887 206 192 3107
-- Name: transporte_remis_combis_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY transporte
    ADD CONSTRAINT transporte_remis_combis_fkey FOREIGN KEY (remis_combis) REFERENCES opciones_transporte(id);


--
-- TOC entry 2957 (class 2606 OID 926285)
-- Dependencies: 208 2863 176 3107
-- Name: uso_interno_estado_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_estado_folio_fkey FOREIGN KEY (estado_folio) REFERENCES estado_folio(id);


--
-- TOC entry 2958 (class 2606 OID 926290)
-- Dependencies: 2870 208 180 3107
-- Name: uso_interno_id_folio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_id_folio_fkey FOREIGN KEY (id_folio) REFERENCES folio(id);


--
-- TOC entry 2959 (class 2606 OID 926295)
-- Dependencies: 208 2865 178 3107
-- Name: uso_interno_regularizacion_estado_proceso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY uso_interno
    ADD CONSTRAINT uso_interno_regularizacion_estado_proceso_fkey FOREIGN KEY (regularizacion_estado_proceso) REFERENCES estado_proceso(id);


-- Completed on 2014-12-22 06:19:28 ART

--
-- PostgreSQL database dump complete
--

