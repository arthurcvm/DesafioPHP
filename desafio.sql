--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1 (Ubuntu 13.1-1.pgdg20.04+1)
-- Dumped by pg_dump version 13.1 (Ubuntu 13.1-1.pgdg20.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: product_types; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.product_types (
    id integer NOT NULL,
    name character varying NOT NULL,
    tax numeric
);


ALTER TABLE public.product_types OWNER TO homestead;

--
-- Name: product_types_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.product_types_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_types_id_seq OWNER TO homestead;

--
-- Name: product_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.product_types_id_seq OWNED BY public.product_types.id;


--
-- Name: products; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.products (
    id integer NOT NULL,
    name character varying NOT NULL,
    value numeric NOT NULL,
    product_type_id integer NOT NULL
);


ALTER TABLE public.products OWNER TO homestead;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.products_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO homestead;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: sale_items; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.sale_items (
    id integer NOT NULL,
    quantity integer NOT NULL,
    product_id integer NOT NULL,
    sale_id integer NOT NULL
);


ALTER TABLE public.sale_items OWNER TO homestead;

--
-- Name: sale_items_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.sale_items_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sale_items_id_seq OWNER TO homestead;

--
-- Name: sale_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.sale_items_id_seq OWNED BY public.sale_items.id;


--
-- Name: sales; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.sales (
    id integer NOT NULL,
    date_sale date DEFAULT now(),
    total numeric
);


ALTER TABLE public.sales OWNER TO homestead;

--
-- Name: sales_id_seq1; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.sales_id_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sales_id_seq1 OWNER TO homestead;

--
-- Name: sales_id_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.sales_id_seq1 OWNED BY public.sales.id;


--
-- Name: product_types id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.product_types ALTER COLUMN id SET DEFAULT nextval('public.product_types_id_seq'::regclass);


--
-- Name: products id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Name: sale_items id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sale_items ALTER COLUMN id SET DEFAULT nextval('public.sale_items_id_seq'::regclass);


--
-- Name: sales id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sales ALTER COLUMN id SET DEFAULT nextval('public.sales_id_seq1'::regclass);


--
-- Data for Name: product_types; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.product_types (id, name, tax) FROM stdin;
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.products (id, name, value, product_type_id) FROM stdin;
\.


--
-- Data for Name: sale_items; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.sale_items (id, quantity, product_id, sale_id) FROM stdin;
\.


--
-- Data for Name: sales; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.sales (id, date_sale, total) FROM stdin;
\.


--
-- Name: product_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.product_types_id_seq', 9, true);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.products_id_seq', 8, true);


--
-- Name: sale_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.sale_items_id_seq', 11, true);


--
-- Name: sales_id_seq1; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.sales_id_seq1', 9, true);


--
-- Name: product_types product_types_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.product_types
    ADD CONSTRAINT product_types_pkey PRIMARY KEY (id);


--
-- Name: products products_pkey1; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey1 PRIMARY KEY (id);


--
-- Name: sale_items sale_items_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sale_items
    ADD CONSTRAINT sale_items_pkey PRIMARY KEY (id);


--
-- Name: sales sales_pkey1; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sales
    ADD CONSTRAINT sales_pkey1 PRIMARY KEY (id);


--
-- Name: products fk_product_types; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT fk_product_types FOREIGN KEY (product_type_id) REFERENCES public.product_types(id) NOT VALID;


--
-- Name: sale_items fk_products; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sale_items
    ADD CONSTRAINT fk_products FOREIGN KEY (product_id) REFERENCES public.products(id) NOT VALID;


--
-- Name: sale_items fk_sales; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sale_items
    ADD CONSTRAINT fk_sales FOREIGN KEY (sale_id) REFERENCES public.sales(id) NOT VALID;


--
-- PostgreSQL database dump complete
--

