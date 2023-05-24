--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: balance_sheet_template; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE balance_sheet_template (
    id integer NOT NULL,
    parent_id integer NOT NULL,
    "position" integer NOT NULL,
    type integer NOT NULL,
    amt_type integer,
    is_added integer
);


ALTER TABLE public.balance_sheet_template OWNER TO postgres;

--
-- Name: date_generated; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE date_generated (
    date_generated_id integer NOT NULL,
    date_generated_value date
);


ALTER TABLE public.date_generated OWNER TO postgres;

--
-- Name: financial_performance_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE financial_performance_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.financial_performance_id_seq OWNER TO postgres;

--
-- Name: financial_position_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE financial_position_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.financial_position_id_seq OWNER TO postgres;

--
-- Name: financial_position; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE financial_position (
    financial_position_id integer DEFAULT nextval('financial_position_id_seq'::regclass) NOT NULL,
    ledger_id integer,
    major_code integer
);


ALTER TABLE public.financial_position OWNER TO postgres;

--
-- Name: ledger_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ledger_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ledger_id_seq OWNER TO postgres;

--
-- Name: general_ledger; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE general_ledger (
    ledger_id integer DEFAULT nextval('ledger_id_seq'::regclass) NOT NULL,
    account_code character varying NOT NULL,
    account_name character varying NOT NULL,
    account_code_type integer,
    active integer
);


ALTER TABLE public.general_ledger OWNER TO postgres;

--
-- Name: income_statement_template; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE income_statement_template (
    id integer NOT NULL,
    "position" integer NOT NULL,
    parent_id integer NOT NULL,
    type integer,
    amt_type integer,
    is_added integer
);


ALTER TABLE public.income_statement_template OWNER TO postgres;

--
-- Name: journal_cash_details_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE journal_cash_details_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_cash_details_seq OWNER TO postgres;

--
-- Name: journal_cash_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE journal_cash_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_cash_id_seq OWNER TO postgres;

--
-- Name: journal_cash_details; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE journal_cash_details (
    details_id integer DEFAULT nextval('journal_cash_details_seq'::regclass) NOT NULL,
    type character varying NOT NULL,
    account_code character varying NOT NULL,
    account_name text NOT NULL,
    amount numeric NOT NULL,
    journal_id integer DEFAULT nextval('journal_cash_id_seq'::regclass),
    ledger_id integer,
    journal_type integer
);


ALTER TABLE public.journal_cash_details OWNER TO postgres;

--
-- Name: journal_cash_receipt_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE journal_cash_receipt_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_cash_receipt_details_id_seq OWNER TO postgres;

--
-- Name: journal_check_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE journal_check_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_check_id_seq OWNER TO postgres;

--
-- Name: journal_details_cash_receipt; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE journal_details_cash_receipt (
    details_id integer DEFAULT nextval('journal_cash_receipt_details_id_seq'::regclass) NOT NULL,
    receipts_type integer NOT NULL,
    type integer NOT NULL,
    account_code character varying NOT NULL,
    account_name text NOT NULL,
    amount numeric NOT NULL,
    journal_receipts_id integer,
    ledger_id integer
);


ALTER TABLE public.journal_details_cash_receipt OWNER TO postgres;

--
-- Name: journal_general_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE journal_general_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_general_details_id_seq OWNER TO postgres;

--
-- Name: journal_details_general; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE journal_details_general (
    details_id integer DEFAULT nextval('journal_general_details_id_seq'::regclass) NOT NULL,
    account_name text NOT NULL,
    account_code character varying NOT NULL,
    type integer NOT NULL,
    amount numeric NOT NULL,
    journal_general_id integer,
    ledger_id integer
);


ALTER TABLE public.journal_details_general OWNER TO postgres;

--
-- Name: journal_entry; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE journal_entry (
    date date NOT NULL,
    jev_number character varying NOT NULL,
    payee text NOT NULL,
    particulars text NOT NULL,
    check_number integer NOT NULL,
    journal_id integer DEFAULT nextval('journal_cash_id_seq'::regclass) NOT NULL,
    journal_type integer,
    posted integer
);


ALTER TABLE public.journal_entry OWNER TO postgres;

--
-- Name: journal_receipts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE journal_receipts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_receipts_id_seq OWNER TO postgres;

--
-- Name: journal_entry_cash_receipt; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE journal_entry_cash_receipt (
    journal_receipts_id integer DEFAULT nextval('journal_receipts_id_seq'::regclass) NOT NULL,
    date date,
    jev_number character varying,
    collecting_offices text
);


ALTER TABLE public.journal_entry_cash_receipt OWNER TO postgres;

--
-- Name: journal_general_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE journal_general_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.journal_general_id_seq OWNER TO postgres;

--
-- Name: journal_entry_general; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE journal_entry_general (
    journal_general_id integer DEFAULT nextval('journal_general_id_seq'::regclass) NOT NULL,
    date date,
    jev_number character varying
);


ALTER TABLE public.journal_entry_general OWNER TO postgres;

--
-- Name: l_pk_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE l_pk_sequence
    START WITH 37
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.l_pk_sequence OWNER TO postgres;

--
-- Name: label_id_sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE label_id_sequence
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.label_id_sequence OWNER TO postgres;

--
-- Name: post_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE post_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.post_id_seq OWNER TO postgres;

--
-- Name: post_entry; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE post_entry (
    post_id integer DEFAULT nextval('post_id_seq'::regclass) NOT NULL,
    journal_id integer
);


ALTER TABLE public.post_entry OWNER TO postgres;

--
-- Name: tb_date_generated; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_date_generated (
    id integer NOT NULL,
    start_date date,
    end_date date
);


ALTER TABLE public.tb_date_generated OWNER TO postgres;

--
-- Name: tb_date_generated_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_date_generated_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_date_generated_id_seq OWNER TO postgres;

--
-- Name: tb_date_generated_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_date_generated_id_seq OWNED BY tb_date_generated.id;


--
-- Name: tb_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_id_seq OWNER TO postgres;

--
-- Name: tb_total_amount_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_total_amount_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_total_amount_id_seq OWNER TO postgres;

--
-- Name: tb_total_amount; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_total_amount (
    tb_total_id integer DEFAULT nextval('tb_total_amount_id_seq'::regclass) NOT NULL,
    total_credit_amount double precision,
    total_debit_amount double precision,
    tb_id integer
);


ALTER TABLE public.tb_total_amount OWNER TO postgres;

--
-- Name: trial_balance; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE trial_balance (
    tb_id integer DEFAULT nextval('tb_id_seq'::regclass) NOT NULL,
    amount_debit double precision,
    ledger_id integer,
    amount_credit double precision,
    active integer
);


ALTER TABLE public.trial_balance OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "user" (
    user_id integer DEFAULT nextval('user_id_seq'::regclass) NOT NULL,
    name text,
    username character varying,
    password character varying,
    user_type integer
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Data for Name: balance_sheet_template; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY balance_sheet_template (id, parent_id, "position", type, amt_type, is_added) FROM stdin;
401	3	1	1	0	0
501	4	1	1	0	0
101	5	1	1	0	0
121	5	2	1	0	0
149	5	3	1	0	0
103	5	4	1	0	0
34	5	5	0	1	0
0	-1	1	0	-1	0
1	0	1	0	-1	0
2	0	2	0	-1	0
3	2	1	0	-1	0
4	2	2	0	-1	0
5	1	1	0	-1	0
6	1	2	0	-1	0
118	2	3	0	1	0
115	1	3	0	1	0
114	6	4	0	1	0
\.


--
-- Data for Name: date_generated; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY date_generated (date_generated_id, date_generated_value) FROM stdin;
1	2015-06-29
\.


--
-- Name: financial_performance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('financial_performance_id_seq', 1, false);


--
-- Data for Name: financial_position; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY financial_position (financial_position_id, ledger_id, major_code) FROM stdin;
\.


--
-- Name: financial_position_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('financial_position_id_seq', 1, false);


--
-- Data for Name: general_ledger; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY general_ledger (ledger_id, account_code, account_name, account_code_type, active) FROM stdin;
3	1-03-05-010	Advances for Operating Expenses	1	\N
4	5-02-04-020	Electricity Expenses	3	\N
11	5-02-03-010	Office Supplies	3	\N
12	1-02-01-010	Cash in Bank - LC, Time Deposit	1	\N
15	1-07-04-011	A.D. - Buildings	2	\N
16	1-07-05-020	Office Equipment	1	\N
17	1-07-05-021	A.D. - Office Equipment	2	\N
18	1-07-05-030	Information & Communication-Technology Equipment	1	\N
19	1-07-05-031	A.D. - A. D. - Information & Communication Tech. Equipment	2	\N
20	1-07-05-990	Other Machinery & Equipment	1	\N
21	1-07-05-991	A.D. - Other Machinery & Equipment	2	\N
22	1-07-07-010	Furnitures & Fixtures	1	\N
23	1-07-07-011	A.D. - Furnitures & Fixtures\n	2	\N
24	1-07-99-990	Other Property Plant & Equipment	1	\N
25	1-07-99-991	A.D. - Other Property Plant & Equipment	2	\N
28	3-01-01-010	Government Equity	2	\N
2	2-02-01-010	Due to BIR	2	1
32	1-01-01-010	Cash in Vault	1	1
1	1-01-02-010	Cash in Bank	1	1
5	2-01-01-010	Accounts Payable	2	1
6	1-03-05-020	Advances for Payroll	1	1
13	1-03-01-030	Special Education Tax Receivables	1	1
29	4-01-02-050	Special Education Tax 	2	1
27	2-99-99-990	Other Payables	2	1
33	2-05-01-020	Deferred Special Education Tax	2	1
30	4-01-02-051	Discount on Special Education Tax 	3	1
10	5-01-02-100	Honoraria	3	1
14	1-07-04-010	Buildings	1	1
31	4-01-05-020	Tax Revenue Fines & Penalties-Property Taxes	2	1
36	1-01-01-020	Petty Cash	1	\N
37	1-02-01-020	Cash in Bank - FC, Time Deposit	1	\N
38	1-02-01-030	Treasury Bills	1	\N
39	1-02-02-010	Financial Assets Held for Trading	1	\N
40	1-02-02-020	Financial  Assets Designated at Fair Value Through Surplus or Deficit	1	\N
41	1-02-03-010	Investments in Treasury Bills - Local	1	\N
42	1-02-03-011	Allowance for Impairment - Investments in Treasury Bills - Local	2	\N
43	1-02-03-020	Investments in  Bonds-Local	1	\N
44	1-02-03-021	Allowance for Impairment - Investments in Bonds - Local	2	\N
\.


--
-- Data for Name: income_statement_template; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY income_statement_template (id, "position", parent_id, type, amt_type, is_added) FROM stdin;
120	1	-1	0	-1	\N
122	3	-1	0	1	\N
121	2	-1	0	-1	\N
-1	1	-2	0	-1	0
611	1	120	1	0	0
124	2	120	0	1	\N
835	1	121	1	0	1
834	2	121	1	0	1
123	3	121	0	1	\N
\.


--
-- Data for Name: journal_cash_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY journal_cash_details (details_id, type, account_code, account_name, amount, journal_id, ledger_id, journal_type) FROM stdin;
15	1	2-02-01-010	Due to BIR	7325.00	5	2	2
14	1	1-03-05-020	Advances for Payroll	126175.00	5	6	2
24	2	2-01-01-010	Accounts Payable	20000.00	7	5	1
16	1	1-01-02-010	Cash in Bank	126175.00	6	1	1
25	1	1-01-02-010	Cash in Bank	113529.60	8	1	1
27	2	5-02-03-010	Office Supplies	118260.00	8	11	1
21	2	1-03-05-020	Advances for Payroll	126175.00	6	6	1
22	1	1-01-02-010	Cash in Bank	20000.00	7	1	1
35	1	1-01-02-010	Cash in Bank	6675.00	11	1	1
39	2	2-02-01-010	Due to BIR	6675.00	11	2	1
20	2	5-01-02-100	Honoraria	133500.00	5	10	2
41	1	1-01-02-010	Cash in Bank	2500.00	15	1	2
42	2	2-01-01-010	Accounts Payable	2500.00	15	5	2
26	1	2-02-01-010	Due to BIR	4730.40	8	2	1
\.


--
-- Name: journal_cash_details_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('journal_cash_details_seq', 42, true);


--
-- Name: journal_cash_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('journal_cash_id_seq', 16, true);


--
-- Name: journal_cash_receipt_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('journal_cash_receipt_details_id_seq', 18, true);


--
-- Name: journal_check_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('journal_check_id_seq', 1, false);


--
-- Data for Name: journal_details_cash_receipt; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY journal_details_cash_receipt (details_id, receipts_type, type, account_code, account_name, amount, journal_receipts_id, ledger_id) FROM stdin;
1	1	2	1-01-01-010	Cash in Vaults	91810.47	1	32
2	1	2	2-05-01-020	Deferred Special Education Tax	200795.41	1	33
3	1	2	4-01-02-051	Discount on Special Education Tax	9357.33	1	30
5	2	2	1-01-02-010	Cash in Bank	91810.47	1	1
6	2	1	1-01-01-010	Cash in Vaults	91810.47	1	32
7	1	1	1-03-01-030	Special Education Tax Receivable	200795.41	1	13
8	1	1	4-01-02-050	Special Education Tax	100397.71	1	29
9	1	1	4-01-05-020	Tax Revenue - Fines and Penalties - Property Taxes	770.09	1	31
10	1	2	1-01-01-010	Cash in Vault	87516.56	2	32
11	1	2	2-05-01-020	Deferred Special Education Tax	181648.64	2	33
12	1	2	4-01-02-051	Discount on Special Education Tax	6692.02	2	30
13	2	2	1-01-02-010	Cash in Bank	87516.56	2	1
14	1	1	1-03-01-030	Special Education Tax Receivable	181648.64	2	13
16	2	1	1-01-01-010	Cash in Vault	87516.56	2	32
17	1	1	4-01-02-050	Special Education Tax	90824.33	2	29
18	1	1	4-01-05-020	Tax Revenue - Fines and Penalties - Property Taxes	3384.25	2	31
\.


--
-- Data for Name: journal_details_general; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY journal_details_general (details_id, account_name, account_code, type, amount, journal_general_id, ledger_id) FROM stdin;
1	Due to BIR	2-02-01-010	2	650.00	1	2
2	Other Payables	2-99-99-990	1	650.00	1	27
\.


--
-- Data for Name: journal_entry; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY journal_entry (date, jev_number, payee, particulars, check_number, journal_id, journal_type, posted) FROM stdin;
2018-01-31	200-18-01-7	Ruth V. Jimenez	Liquidation of Cash Advances	1611008	5	2	\N
2018-01-31	200-18-01-37	Mario R. Victoria	Payment of prepaid expenses of Pag-asa  E/S for   August to December 2017	1610964	15	2	\N
2018-01-18	200-18-01-3	Ruth V. Jimenez	C/A payment of Homorarium of watchmen/ utility  workers for LSB Orani for December 2017	1611011	6	1	1
2018-01-18	200-18-01-5	Magicut Enterprises	Payment of uniforms of athletes of Orani National High School	1611003	8	1	1
2018-01-18	200-18-01-4	General Fund-Orani	Transfer of fund from  SEF to General Fund for December 2017 (withholding tax)	1611005	11	1	1
2018-01-18	200-18-01-4	Ruth V. Jimenez	Payment of allowances re: Boys scout of the Phil , Backyard camp at ONHS Pag-asa on Dec. 18-21, 2017	1611004	7	1	\N
\.


--
-- Data for Name: journal_entry_cash_receipt; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY journal_entry_cash_receipt (journal_receipts_id, date, jev_number, collecting_offices) FROM stdin;
1	2018-01-31	200-18-01-1	Elvira B. Gomez
2	2018-01-31	200-18-01-2	Elvira B. Gomez
\.


--
-- Data for Name: journal_entry_general; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY journal_entry_general (journal_general_id, date, jev_number) FROM stdin;
1	2018-01-18	200-18-01-8
\.


--
-- Name: journal_general_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('journal_general_details_id_seq', 2, true);


--
-- Name: journal_general_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('journal_general_id_seq', 1, true);


--
-- Name: journal_receipts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('journal_receipts_id_seq', 2, true);


--
-- Name: l_pk_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('l_pk_sequence', 49, true);


--
-- Name: label_id_sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('label_id_sequence', 138, true);


--
-- Name: ledger_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ledger_id_seq', 44, true);


--
-- Data for Name: post_entry; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY post_entry (post_id, journal_id) FROM stdin;
\.


--
-- Name: post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('post_id_seq', 1, false);


--
-- Data for Name: tb_date_generated; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_date_generated (id, start_date, end_date) FROM stdin;
1	2015-05-01	2015-05-31
\.


--
-- Name: tb_date_generated_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_date_generated_id_seq', 1, false);


--
-- Name: tb_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_id_seq', 32, true);


--
-- Data for Name: tb_total_amount; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_total_amount (tb_total_id, total_credit_amount, total_debit_amount, tb_id) FROM stdin;
\.


--
-- Name: tb_total_amount_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_total_amount_id_seq', 1, false);


--
-- Data for Name: trial_balance; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY trial_balance (tb_id, amount_debit, ledger_id, amount_credit, active) FROM stdin;
3	0	3	0	\N
4	0	4	0	\N
9	118260	11	0	1
10	0	12	0	\N
13	0	15	0	\N
14	0	16	0	\N
15	0	17	0	\N
16	0	18	0	\N
17	0	19	0	\N
18	0	20	0	\N
19	0	21	0	\N
20	0	22	0	\N
21	0	23	0	\N
22	0	24	0	\N
23	0	25	0	\N
26	0	28	0	\N
5	22500	5	0	1
11	0	13	382444.04999999999	1
27	0	29	191222.04000000001	1
25	0	27	650	1
31	382444.04999999999	33	0	1
28	16049.35	30	0	1
8	133500	10	0	1
12	0	14	0	\N
29	0	31	4154.3400000000001	1
2	7325	2	12055.4	1
6	126175	6	126175	1
30	179327.03	32	179327.03	1
1	179327.03	1	268879.59999999998	1
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "user" (user_id, name, username, password, user_type) FROM stdin;
\.


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_id_seq', 1, false);


--
-- Name: bs_template_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY balance_sheet_template
    ADD CONSTRAINT bs_template_pk PRIMARY KEY (id);


--
-- Name: date_generated_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY date_generated
    ADD CONSTRAINT date_generated_pkey PRIMARY KEY (date_generated_id);


--
-- Name: financial_position_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY financial_position
    ADD CONSTRAINT financial_position_pkey PRIMARY KEY (financial_position_id);


--
-- Name: general_ledger_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY general_ledger
    ADD CONSTRAINT general_ledger_pkey PRIMARY KEY (ledger_id);


--
-- Name: is_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY income_statement_template
    ADD CONSTRAINT is_pk PRIMARY KEY (id);


--
-- Name: journal_details_cash_receipt_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY journal_details_cash_receipt
    ADD CONSTRAINT journal_details_cash_receipt_pkey PRIMARY KEY (details_id);


--
-- Name: journal_details_general_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY journal_details_general
    ADD CONSTRAINT journal_details_general_pkey PRIMARY KEY (details_id);


--
-- Name: journal_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY journal_cash_details
    ADD CONSTRAINT journal_details_pkey PRIMARY KEY (details_id);


--
-- Name: journal_entry_cash_check_number_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY journal_entry
    ADD CONSTRAINT journal_entry_cash_check_number_key UNIQUE (check_number);


--
-- Name: journal_entry_cash_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY journal_entry
    ADD CONSTRAINT journal_entry_cash_pkey PRIMARY KEY (journal_id);


--
-- Name: journal_entry_cash_receipts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY journal_entry_cash_receipt
    ADD CONSTRAINT journal_entry_cash_receipts_pkey PRIMARY KEY (journal_receipts_id);


--
-- Name: journal_entry_general_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY journal_entry_general
    ADD CONSTRAINT journal_entry_general_pkey PRIMARY KEY (journal_general_id);


--
-- Name: post_entry_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY post_entry
    ADD CONSTRAINT post_entry_pkey PRIMARY KEY (post_id);


--
-- Name: tb_date_generated_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_date_generated
    ADD CONSTRAINT tb_date_generated_id PRIMARY KEY (id);


--
-- Name: tb_total_amount_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_total_amount
    ADD CONSTRAINT tb_total_amount_pkey PRIMARY KEY (tb_total_id);


--
-- Name: trial_balance_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY trial_balance
    ADD CONSTRAINT trial_balance_pkey PRIMARY KEY (tb_id);


--
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (user_id);


--
-- Name: journal_cash_details_journal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY journal_cash_details
    ADD CONSTRAINT journal_cash_details_journal_id_fkey FOREIGN KEY (journal_id) REFERENCES journal_entry(journal_id);


--
-- Name: journal_cash_details_ledger_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY journal_cash_details
    ADD CONSTRAINT journal_cash_details_ledger_id_fkey FOREIGN KEY (ledger_id) REFERENCES general_ledger(ledger_id);


--
-- Name: journal_details_cash_receipt_journal_receipts_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY journal_details_cash_receipt
    ADD CONSTRAINT journal_details_cash_receipt_journal_receipts_id_fkey FOREIGN KEY (journal_receipts_id) REFERENCES journal_entry_cash_receipt(journal_receipts_id);


--
-- Name: journal_details_cash_receipt_ledger_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY journal_details_cash_receipt
    ADD CONSTRAINT journal_details_cash_receipt_ledger_id_fkey FOREIGN KEY (ledger_id) REFERENCES general_ledger(ledger_id);


--
-- Name: journal_details_general_journal_general_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY journal_details_general
    ADD CONSTRAINT journal_details_general_journal_general_id_fkey FOREIGN KEY (journal_general_id) REFERENCES journal_entry_general(journal_general_id);


--
-- Name: journal_details_general_ledger_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY journal_details_general
    ADD CONSTRAINT journal_details_general_ledger_id_fkey FOREIGN KEY (ledger_id) REFERENCES general_ledger(ledger_id);


--
-- Name: post_entry_journal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY post_entry
    ADD CONSTRAINT post_entry_journal_id_fkey FOREIGN KEY (journal_id) REFERENCES journal_entry(journal_id);


--
-- Name: tb_total_amount_tb_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_total_amount
    ADD CONSTRAINT tb_total_amount_tb_id_fkey FOREIGN KEY (tb_id) REFERENCES trial_balance(tb_id);


--
-- Name: trial_balance_ledger_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY trial_balance
    ADD CONSTRAINT trial_balance_ledger_id_fkey FOREIGN KEY (ledger_id) REFERENCES general_ledger(ledger_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

