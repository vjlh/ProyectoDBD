--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5 (Ubuntu 10.5-0ubuntu0.18.04)
-- Dumped by pg_dump version 11.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: homestead; Type: DATABASE; Schema: -; Owner: homestead
--

CREATE DATABASE homestead WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';


ALTER DATABASE homestead OWNER TO homestead;

\connect homestead

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: administradores; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.administradores (
    id integer NOT NULL,
    id_user integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.administradores OWNER TO homestead;

--
-- Name: administradores_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.administradores_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.administradores_id_seq OWNER TO homestead;

--
-- Name: administradores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.administradores_id_seq OWNED BY public.administradores.id;


--
-- Name: aeropuertos; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.aeropuertos (
    id integer NOT NULL,
    nombre_aeropuerto character varying(255) NOT NULL,
    direccion_aeropuerto character varying(255) NOT NULL,
    telefono_aeropuerto character varying(255) NOT NULL,
    pagina_web character varying(255) NOT NULL,
    id_ciudad integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.aeropuertos OWNER TO homestead;

--
-- Name: aeropuertos_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.aeropuertos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aeropuertos_id_seq OWNER TO homestead;

--
-- Name: aeropuertos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.aeropuertos_id_seq OWNED BY public.aeropuertos.id;


--
-- Name: asientos; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.asientos (
    id integer NOT NULL,
    numero_asiento integer NOT NULL,
    letra_asiento character varying(255) NOT NULL,
    precio_asiento integer NOT NULL,
    disponibilidad boolean NOT NULL,
    cabina character varying(255) NOT NULL,
    id_reserva integer NOT NULL,
    id_avion integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.asientos OWNER TO homestead;

--
-- Name: asientos_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.asientos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asientos_id_seq OWNER TO homestead;

--
-- Name: asientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.asientos_id_seq OWNED BY public.asientos.id;


--
-- Name: aviones; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.aviones (
    id integer NOT NULL,
    capacidad_avion integer NOT NULL,
    salidas_emergencia integer NOT NULL,
    sanitarios_avion integer NOT NULL,
    longitud_avion integer NOT NULL,
    envergadura_avion character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.aviones OWNER TO homestead;

--
-- Name: aviones_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.aviones_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aviones_id_seq OWNER TO homestead;

--
-- Name: aviones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.aviones_id_seq OWNED BY public.aviones.id;


--
-- Name: beneficios; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.beneficios (
    id integer NOT NULL,
    nombre_beneficio character varying(255) NOT NULL,
    descripcion_beneficio text NOT NULL,
    precio_beneficio integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.beneficios OWNER TO homestead;

--
-- Name: beneficios_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.beneficios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.beneficios_id_seq OWNER TO homestead;

--
-- Name: beneficios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.beneficios_id_seq OWNED BY public.beneficios.id;


--
-- Name: beneficios_seguros; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.beneficios_seguros (
    id integer NOT NULL,
    id_beneficio integer NOT NULL,
    id_seguro integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.beneficios_seguros OWNER TO homestead;

--
-- Name: beneficios_seguros_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.beneficios_seguros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.beneficios_seguros_id_seq OWNER TO homestead;

--
-- Name: beneficios_seguros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.beneficios_seguros_id_seq OWNED BY public.beneficios_seguros.id;


--
-- Name: ciudades; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.ciudades (
    id integer NOT NULL,
    nombre_ciudad character varying(255) NOT NULL,
    idioma_ciudad character varying(255) NOT NULL,
    id_pais integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.ciudades OWNER TO homestead;

--
-- Name: ciudades_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.ciudades_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ciudades_id_seq OWNER TO homestead;

--
-- Name: ciudades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.ciudades_id_seq OWNED BY public.ciudades.id;


--
-- Name: equipajes; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.equipajes (
    id integer NOT NULL,
    ancho integer NOT NULL,
    alto integer NOT NULL,
    largo integer NOT NULL,
    tipo_equipaje character varying(255) NOT NULL,
    id_pasajero integer NOT NULL,
    restriccion_equipaje text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.equipajes OWNER TO homestead;

--
-- Name: equipajes_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.equipajes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipajes_id_seq OWNER TO homestead;

--
-- Name: equipajes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.equipajes_id_seq OWNED BY public.equipajes.id;


--
-- Name: habitaciones; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.habitaciones (
    id integer NOT NULL,
    capacidad_habitacion integer NOT NULL,
    banio_privado boolean NOT NULL,
    aire_acondicionado_habitacion boolean NOT NULL,
    disponibilidad boolean NOT NULL,
    tipo character varying(255) NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_fin date NOT NULL,
    id_hospedaje integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.habitaciones OWNER TO homestead;

--
-- Name: habitaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.habitaciones_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.habitaciones_id_seq OWNER TO homestead;

--
-- Name: habitaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.habitaciones_id_seq OWNED BY public.habitaciones.id;


--
-- Name: habitaciones_reservas; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.habitaciones_reservas (
    id integer NOT NULL,
    id_habitacion integer NOT NULL,
    id_reserva integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.habitaciones_reservas OWNER TO homestead;

--
-- Name: habitaciones_reservas_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.habitaciones_reservas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.habitaciones_reservas_id_seq OWNER TO homestead;

--
-- Name: habitaciones_reservas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.habitaciones_reservas_id_seq OWNED BY public.habitaciones_reservas.id;


--
-- Name: historiales; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.historiales (
    id integer NOT NULL,
    fecha_cambio date NOT NULL,
    id_user integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.historiales OWNER TO homestead;

--
-- Name: historiales_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.historiales_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.historiales_id_seq OWNER TO homestead;

--
-- Name: historiales_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.historiales_id_seq OWNED BY public.historiales.id;


--
-- Name: hospedajes; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.hospedajes (
    id integer NOT NULL,
    nombre_hospedaje character varying(255) NOT NULL,
    cadena_hospedaje character varying(255) NOT NULL,
    estrellas_hospedaje integer NOT NULL,
    estacionamiento_hospedaje boolean NOT NULL,
    piscina_hospedaje boolean NOT NULL,
    sauna_hospedaje boolean NOT NULL,
    zona_infantil_hospedaje boolean NOT NULL,
    gimnasio_hospedaje boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.hospedajes OWNER TO homestead;

--
-- Name: hospedajes_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.hospedajes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hospedajes_id_seq OWNER TO homestead;

--
-- Name: hospedajes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.hospedajes_id_seq OWNED BY public.hospedajes.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: paises; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.paises (
    id integer NOT NULL,
    nombre_pais character varying(255) NOT NULL,
    moneda_pais character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.paises OWNER TO homestead;

--
-- Name: paises_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.paises_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paises_id_seq OWNER TO homestead;

--
-- Name: paises_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.paises_id_seq OWNED BY public.paises.id;


--
-- Name: paquetes; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.paquetes (
    id integer NOT NULL,
    num_dias integer NOT NULL,
    num_noches integer NOT NULL,
    precio_paquete integer NOT NULL,
    destino_paquete character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.paquetes OWNER TO homestead;

--
-- Name: paquetes_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.paquetes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paquetes_id_seq OWNER TO homestead;

--
-- Name: paquetes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.paquetes_id_seq OWNED BY public.paquetes.id;


--
-- Name: pasajeros; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.pasajeros (
    id integer NOT NULL,
    nombre_pasajero character varying(255) NOT NULL,
    apellido_pasajero character varying(255) NOT NULL,
    edad_pasajero integer NOT NULL,
    tipo_pasajero character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pasajeros OWNER TO homestead;

--
-- Name: pasajeros_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.pasajeros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pasajeros_id_seq OWNER TO homestead;

--
-- Name: pasajeros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.pasajeros_id_seq OWNED BY public.pasajeros.id;


--
-- Name: pasajeros_reservas; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.pasajeros_reservas (
    id integer NOT NULL,
    id_reserva integer NOT NULL,
    id_pasajero integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pasajeros_reservas OWNER TO homestead;

--
-- Name: pasajeros_reservas_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.pasajeros_reservas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pasajeros_reservas_id_seq OWNER TO homestead;

--
-- Name: pasajeros_reservas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.pasajeros_reservas_id_seq OWNED BY public.pasajeros_reservas.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO homestead;

--
-- Name: promociones; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.promociones (
    id integer NOT NULL,
    nombre_promocion character varying(255) NOT NULL,
    descuento_promocion integer NOT NULL,
    descripcion_promocion text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.promociones OWNER TO homestead;

--
-- Name: promociones_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.promociones_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.promociones_id_seq OWNER TO homestead;

--
-- Name: promociones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.promociones_id_seq OWNED BY public.promociones.id;


--
-- Name: reservas; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.reservas (
    id integer NOT NULL,
    monto_total_reserva integer NOT NULL,
    check_in boolean NOT NULL,
    id_paquete integer,
    id_promocion integer,
    id_seguro integer,
    id_user integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.reservas OWNER TO homestead;

--
-- Name: reservas_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.reservas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reservas_id_seq OWNER TO homestead;

--
-- Name: reservas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.reservas_id_seq OWNED BY public.reservas.id;


--
-- Name: restricciones; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.restricciones (
    id integer NOT NULL,
    nombre_restriccion character varying(255) NOT NULL,
    descripcion_restriccion text NOT NULL,
    sancion_restriccion text NOT NULL,
    id_ciudad integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.restricciones OWNER TO homestead;

--
-- Name: restricciones_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.restricciones_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.restricciones_id_seq OWNER TO homestead;

--
-- Name: restricciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.restricciones_id_seq OWNED BY public.restricciones.id;


--
-- Name: seguros; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.seguros (
    id integer NOT NULL,
    precio_seguro integer NOT NULL,
    tipo_seguro character varying(255) NOT NULL,
    precio_ticket integer NOT NULL,
    numero_pasajeros_seguros integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.seguros OWNER TO homestead;

--
-- Name: seguros_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.seguros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seguros_id_seq OWNER TO homestead;

--
-- Name: seguros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.seguros_id_seq OWNED BY public.seguros.id;


--
-- Name: tickets; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.tickets (
    id integer NOT NULL,
    tipo_pago character varying(255) NOT NULL,
    monto_pago integer NOT NULL,
    fecha_pago date NOT NULL,
    id_reserva integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tickets OWNER TO homestead;

--
-- Name: tickets_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.tickets_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tickets_id_seq OWNER TO homestead;

--
-- Name: tickets_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.tickets_id_seq OWNED BY public.tickets.id;


--
-- Name: transportes; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.transportes (
    id integer NOT NULL,
    patente_transporte integer NOT NULL,
    modelo_transporte character varying(255) NOT NULL,
    num_asientos_transporte integer NOT NULL,
    num_puertas_transporte integer NOT NULL,
    aire_acondicionado_transporte boolean NOT NULL,
    puntuacion_transporte integer NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_fin date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.transportes OWNER TO homestead;

--
-- Name: transportes_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.transportes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transportes_id_seq OWNER TO homestead;

--
-- Name: transportes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.transportes_id_seq OWNED BY public.transportes.id;


--
-- Name: transportes_reservas; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.transportes_reservas (
    id integer NOT NULL,
    id_transporte integer NOT NULL,
    id_reserva integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.transportes_reservas OWNER TO homestead;

--
-- Name: transportes_reservas_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.transportes_reservas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transportes_reservas_id_seq OWNER TO homestead;

--
-- Name: transportes_reservas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.transportes_reservas_id_seq OWNED BY public.transportes_reservas.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    apellido_usuario character varying(255),
    fecha_nacimiento date,
    num_documento_usuario integer,
    pais_usuario character varying(255),
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: vuelos; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.vuelos (
    id integer NOT NULL,
    hora_vuelo time(0) without time zone NOT NULL,
    duracion_vuelo time(0) without time zone NOT NULL,
    fecha_vuelo date NOT NULL,
    origen_vuelo character varying(255) NOT NULL,
    destino_vuelo character varying(255) NOT NULL,
    id_avion integer NOT NULL,
    id_aeropuerto integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.vuelos OWNER TO homestead;

--
-- Name: vuelos_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.vuelos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vuelos_id_seq OWNER TO homestead;

--
-- Name: vuelos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.vuelos_id_seq OWNED BY public.vuelos.id;


--
-- Name: administradores id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administradores ALTER COLUMN id SET DEFAULT nextval('public.administradores_id_seq'::regclass);


--
-- Name: aeropuertos id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.aeropuertos ALTER COLUMN id SET DEFAULT nextval('public.aeropuertos_id_seq'::regclass);


--
-- Name: asientos id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.asientos ALTER COLUMN id SET DEFAULT nextval('public.asientos_id_seq'::regclass);


--
-- Name: aviones id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.aviones ALTER COLUMN id SET DEFAULT nextval('public.aviones_id_seq'::regclass);


--
-- Name: beneficios id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.beneficios ALTER COLUMN id SET DEFAULT nextval('public.beneficios_id_seq'::regclass);


--
-- Name: beneficios_seguros id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.beneficios_seguros ALTER COLUMN id SET DEFAULT nextval('public.beneficios_seguros_id_seq'::regclass);


--
-- Name: ciudades id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.ciudades ALTER COLUMN id SET DEFAULT nextval('public.ciudades_id_seq'::regclass);


--
-- Name: equipajes id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.equipajes ALTER COLUMN id SET DEFAULT nextval('public.equipajes_id_seq'::regclass);


--
-- Name: habitaciones id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.habitaciones ALTER COLUMN id SET DEFAULT nextval('public.habitaciones_id_seq'::regclass);


--
-- Name: habitaciones_reservas id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.habitaciones_reservas ALTER COLUMN id SET DEFAULT nextval('public.habitaciones_reservas_id_seq'::regclass);


--
-- Name: historiales id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.historiales ALTER COLUMN id SET DEFAULT nextval('public.historiales_id_seq'::regclass);


--
-- Name: hospedajes id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hospedajes ALTER COLUMN id SET DEFAULT nextval('public.hospedajes_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: paises id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.paises ALTER COLUMN id SET DEFAULT nextval('public.paises_id_seq'::regclass);


--
-- Name: paquetes id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.paquetes ALTER COLUMN id SET DEFAULT nextval('public.paquetes_id_seq'::regclass);


--
-- Name: pasajeros id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.pasajeros ALTER COLUMN id SET DEFAULT nextval('public.pasajeros_id_seq'::regclass);


--
-- Name: pasajeros_reservas id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.pasajeros_reservas ALTER COLUMN id SET DEFAULT nextval('public.pasajeros_reservas_id_seq'::regclass);


--
-- Name: promociones id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.promociones ALTER COLUMN id SET DEFAULT nextval('public.promociones_id_seq'::regclass);


--
-- Name: reservas id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservas ALTER COLUMN id SET DEFAULT nextval('public.reservas_id_seq'::regclass);


--
-- Name: restricciones id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.restricciones ALTER COLUMN id SET DEFAULT nextval('public.restricciones_id_seq'::regclass);


--
-- Name: seguros id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seguros ALTER COLUMN id SET DEFAULT nextval('public.seguros_id_seq'::regclass);


--
-- Name: tickets id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets ALTER COLUMN id SET DEFAULT nextval('public.tickets_id_seq'::regclass);


--
-- Name: transportes id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.transportes ALTER COLUMN id SET DEFAULT nextval('public.transportes_id_seq'::regclass);


--
-- Name: transportes_reservas id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.transportes_reservas ALTER COLUMN id SET DEFAULT nextval('public.transportes_reservas_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: vuelos id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.vuelos ALTER COLUMN id SET DEFAULT nextval('public.vuelos_id_seq'::regclass);


--
-- Name: administradores administradores_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administradores
    ADD CONSTRAINT administradores_pkey PRIMARY KEY (id);


--
-- Name: aeropuertos aeropuertos_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.aeropuertos
    ADD CONSTRAINT aeropuertos_pkey PRIMARY KEY (id);


--
-- Name: asientos asientos_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.asientos
    ADD CONSTRAINT asientos_pkey PRIMARY KEY (id);


--
-- Name: aviones aviones_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.aviones
    ADD CONSTRAINT aviones_pkey PRIMARY KEY (id);


--
-- Name: beneficios beneficios_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.beneficios
    ADD CONSTRAINT beneficios_pkey PRIMARY KEY (id);


--
-- Name: beneficios_seguros beneficios_seguros_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.beneficios_seguros
    ADD CONSTRAINT beneficios_seguros_pkey PRIMARY KEY (id);


--
-- Name: ciudades ciudades_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.ciudades
    ADD CONSTRAINT ciudades_pkey PRIMARY KEY (id);


--
-- Name: equipajes equipajes_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.equipajes
    ADD CONSTRAINT equipajes_pkey PRIMARY KEY (id);


--
-- Name: habitaciones habitaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.habitaciones
    ADD CONSTRAINT habitaciones_pkey PRIMARY KEY (id);


--
-- Name: habitaciones_reservas habitaciones_reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.habitaciones_reservas
    ADD CONSTRAINT habitaciones_reservas_pkey PRIMARY KEY (id);


--
-- Name: historiales historiales_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.historiales
    ADD CONSTRAINT historiales_pkey PRIMARY KEY (id);


--
-- Name: hospedajes hospedajes_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.hospedajes
    ADD CONSTRAINT hospedajes_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: paises paises_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.paises
    ADD CONSTRAINT paises_pkey PRIMARY KEY (id);


--
-- Name: paquetes paquetes_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.paquetes
    ADD CONSTRAINT paquetes_pkey PRIMARY KEY (id);


--
-- Name: pasajeros pasajeros_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.pasajeros
    ADD CONSTRAINT pasajeros_pkey PRIMARY KEY (id);


--
-- Name: pasajeros_reservas pasajeros_reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.pasajeros_reservas
    ADD CONSTRAINT pasajeros_reservas_pkey PRIMARY KEY (id);


--
-- Name: promociones promociones_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.promociones
    ADD CONSTRAINT promociones_pkey PRIMARY KEY (id);


--
-- Name: reservas reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id);


--
-- Name: restricciones restricciones_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.restricciones
    ADD CONSTRAINT restricciones_pkey PRIMARY KEY (id);


--
-- Name: seguros seguros_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.seguros
    ADD CONSTRAINT seguros_pkey PRIMARY KEY (id);


--
-- Name: tickets tickets_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_pkey PRIMARY KEY (id);


--
-- Name: transportes transportes_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.transportes
    ADD CONSTRAINT transportes_pkey PRIMARY KEY (id);


--
-- Name: transportes_reservas transportes_reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.transportes_reservas
    ADD CONSTRAINT transportes_reservas_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: vuelos vuelos_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.vuelos
    ADD CONSTRAINT vuelos_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: homestead
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: administradores administradores_id_user_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.administradores
    ADD CONSTRAINT administradores_id_user_foreign FOREIGN KEY (id_user) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: aeropuertos aeropuertos_id_ciudad_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.aeropuertos
    ADD CONSTRAINT aeropuertos_id_ciudad_foreign FOREIGN KEY (id_ciudad) REFERENCES public.ciudades(id) ON DELETE CASCADE;


--
-- Name: asientos asientos_id_avion_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.asientos
    ADD CONSTRAINT asientos_id_avion_foreign FOREIGN KEY (id_avion) REFERENCES public.aviones(id) ON DELETE CASCADE;


--
-- Name: asientos asientos_id_reserva_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.asientos
    ADD CONSTRAINT asientos_id_reserva_foreign FOREIGN KEY (id_reserva) REFERENCES public.reservas(id) ON DELETE CASCADE;


--
-- Name: beneficios_seguros beneficios_seguros_id_beneficio_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.beneficios_seguros
    ADD CONSTRAINT beneficios_seguros_id_beneficio_foreign FOREIGN KEY (id_beneficio) REFERENCES public.beneficios(id) ON DELETE CASCADE;


--
-- Name: beneficios_seguros beneficios_seguros_id_seguro_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.beneficios_seguros
    ADD CONSTRAINT beneficios_seguros_id_seguro_foreign FOREIGN KEY (id_seguro) REFERENCES public.seguros(id) ON DELETE CASCADE;


--
-- Name: ciudades ciudades_id_pais_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.ciudades
    ADD CONSTRAINT ciudades_id_pais_foreign FOREIGN KEY (id_pais) REFERENCES public.paises(id) ON DELETE CASCADE;


--
-- Name: equipajes equipajes_id_pasajero_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.equipajes
    ADD CONSTRAINT equipajes_id_pasajero_foreign FOREIGN KEY (id_pasajero) REFERENCES public.pasajeros(id) ON DELETE CASCADE;


--
-- Name: habitaciones habitaciones_id_hospedaje_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.habitaciones
    ADD CONSTRAINT habitaciones_id_hospedaje_foreign FOREIGN KEY (id_hospedaje) REFERENCES public.hospedajes(id) ON DELETE CASCADE;


--
-- Name: habitaciones_reservas habitaciones_reservas_id_habitacion_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.habitaciones_reservas
    ADD CONSTRAINT habitaciones_reservas_id_habitacion_foreign FOREIGN KEY (id_habitacion) REFERENCES public.habitaciones(id) ON DELETE CASCADE;


--
-- Name: habitaciones_reservas habitaciones_reservas_id_reserva_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.habitaciones_reservas
    ADD CONSTRAINT habitaciones_reservas_id_reserva_foreign FOREIGN KEY (id_reserva) REFERENCES public.reservas(id) ON DELETE CASCADE;


--
-- Name: historiales historiales_id_user_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.historiales
    ADD CONSTRAINT historiales_id_user_foreign FOREIGN KEY (id_user) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: pasajeros_reservas pasajeros_reservas_id_pasajero_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.pasajeros_reservas
    ADD CONSTRAINT pasajeros_reservas_id_pasajero_foreign FOREIGN KEY (id_pasajero) REFERENCES public.pasajeros(id) ON DELETE CASCADE;


--
-- Name: pasajeros_reservas pasajeros_reservas_id_reserva_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.pasajeros_reservas
    ADD CONSTRAINT pasajeros_reservas_id_reserva_foreign FOREIGN KEY (id_reserva) REFERENCES public.reservas(id) ON DELETE CASCADE;


--
-- Name: reservas reservas_id_paquete_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_paquete_foreign FOREIGN KEY (id_paquete) REFERENCES public.paquetes(id) ON DELETE CASCADE;


--
-- Name: reservas reservas_id_promocion_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_promocion_foreign FOREIGN KEY (id_promocion) REFERENCES public.promociones(id) ON DELETE CASCADE;


--
-- Name: reservas reservas_id_seguro_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_seguro_foreign FOREIGN KEY (id_seguro) REFERENCES public.seguros(id) ON DELETE CASCADE;


--
-- Name: reservas reservas_id_user_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_user_foreign FOREIGN KEY (id_user) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: restricciones restricciones_id_ciudad_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.restricciones
    ADD CONSTRAINT restricciones_id_ciudad_foreign FOREIGN KEY (id_ciudad) REFERENCES public.ciudades(id) ON DELETE CASCADE;


--
-- Name: tickets tickets_id_reserva_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_id_reserva_foreign FOREIGN KEY (id_reserva) REFERENCES public.reservas(id) ON DELETE CASCADE;


--
-- Name: transportes_reservas transportes_reservas_id_reserva_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.transportes_reservas
    ADD CONSTRAINT transportes_reservas_id_reserva_foreign FOREIGN KEY (id_reserva) REFERENCES public.reservas(id) ON DELETE CASCADE;


--
-- Name: transportes_reservas transportes_reservas_id_transporte_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.transportes_reservas
    ADD CONSTRAINT transportes_reservas_id_transporte_foreign FOREIGN KEY (id_transporte) REFERENCES public.transportes(id) ON DELETE CASCADE;


--
-- Name: vuelos vuelos_id_aeropuerto_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.vuelos
    ADD CONSTRAINT vuelos_id_aeropuerto_foreign FOREIGN KEY (id_aeropuerto) REFERENCES public.aeropuertos(id) ON DELETE CASCADE;


--
-- Name: vuelos vuelos_id_avion_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.vuelos
    ADD CONSTRAINT vuelos_id_avion_foreign FOREIGN KEY (id_avion) REFERENCES public.aviones(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

