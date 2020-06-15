--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 12.0

-- Started on 2020-06-05 14:51:48

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

--
-- TOC entry 1085 (class 1259 OID 114815)
-- Name: sirius_classrooms; Type: TABLE; Schema: public; Owner: esodbuser
--

CREATE TABLE public.sirius_classrooms (
    uid character varying(40) NOT NULL,
    name character varying NOT NULL,
    markdelete integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.sirius_classrooms OWNER TO esodbuser;

--
-- TOC entry 6102 (class 0 OID 0)
-- Dependencies: 1085
-- Name: TABLE sirius_classrooms; Type: COMMENT; Schema: public; Owner: esodbuser
--

COMMENT ON TABLE public.sirius_classrooms IS 'Аудитории';


--
-- TOC entry 6096 (class 0 OID 114815)
-- Dependencies: 1085
-- Data for Name: sirius_classrooms; Type: TABLE DATA; Schema: public; Owner: esodbuser
--

COPY public.sirius_classrooms (uid, name, markdelete) FROM stdin;
e026af34-e57b-11e7-9686-005056aa47ed	517	0
aa27a6e7-48ba-11ea-856b-005056aa47ed	310 (23)	0
a63fc374-3cf2-11e8-8b91-005056aa47ed	Д	0
9960f7a9-c0a2-11e8-ad49-005056aa47ed	1	0
a90251e4-c0a2-11e8-ad49-005056aa47ed	2	0
b08f280c-c0a2-11e8-ad49-005056aa47ed	3	0
54eed130-c0a3-11e8-ad49-005056aa47ed	4	0
54eed133-c0a3-11e8-ad49-005056aa47ed	5	0
5b867a86-c0a3-11e8-ad49-005056aa47ed	6	0
5b867a89-c0a3-11e8-ad49-005056aa47ed	7	0
63859258-c0a3-11e8-ad49-005056aa47ed	8	0
71865d4c-c0a3-11e8-ad49-005056aa47ed	9	0
71865d55-c0a3-11e8-ad49-005056aa47ed	10	0
77fa5228-c0a3-11e8-ad49-005056aa47ed	11	0
77fa5235-c0a3-11e8-ad49-005056aa47ed	12	0
7e5b3c0a-c0a3-11e8-ad49-005056aa47ed	13	0
7e5b3c0d-c0a3-11e8-ad49-005056aa47ed	14	0
867e084c-c0a3-11e8-ad49-005056aa47ed	15	0
867e0851-c0a3-11e8-ad49-005056aa47ed	16	0
9312a21a-c0a3-11e8-ad49-005056aa47ed	17	0
99465204-c0a3-11e8-ad49-005056aa47ed	18	0
a2278bae-c0a3-11e8-ad49-005056aa47ed	19	0
a2278bb1-c0a3-11e8-ad49-005056aa47ed	20	0
a8293ee8-c0a3-11e8-ad49-005056aa47ed	21	0
a8293ef4-c0a3-11e8-ad49-005056aa47ed	22	0
ae2890ce-c0a3-11e8-ad49-005056aa47ed	23	0
b4e3ee90-c0a3-11e8-ad49-005056aa47ed	24	0
a01ae135-c198-11e8-ad49-005056aa47ed	1а	0
a801e781-c567-11e8-ad49-005056aa47ed	201	0
b77d255d-c567-11e8-ad49-005056aa47ed	203	0
b77d2560-c567-11e8-ad49-005056aa47ed	204	0
be198ea7-c567-11e8-ad49-005056aa47ed	205	0
c49e2a4f-c567-11e8-ad49-005056aa47ed	207	0
da3ecd4d-c567-11e8-ad49-005056aa47ed	305	0
17f042b5-c568-11e8-ad49-005056aa47ed	Б.спортзал	0
2cfd512c-c568-11e8-ad49-005056aa47ed	Стадион	0
8d12741a-ee5e-11e8-be94-005056aa47ed	216а	0
a95af9f3-e34d-4a47-988f-2a90a0d9c73c	Неопр.	0
ffcfb9d2-70c8-11e9-95c9-005056aa47ed	218	0
327467b2-da23-11e9-9f12-005056aa47ed	105	0
43fbb130-da23-11e9-9f12-005056aa47ed	106	0
43fbb13b-da23-11e9-9f12-005056aa47ed	107	0
50af7ccc-da23-11e9-9f12-005056aa47ed	110	0
50af7ccf-da23-11e9-9f12-005056aa47ed	111	0
6644aed6-da23-11e9-9f12-005056aa47ed	208	0
6644aedb-da23-11e9-9f12-005056aa47ed	209	0
709bd348-da23-11e9-9f12-005056aa47ed	219	0
709bd35c-da23-11e9-9f12-005056aa47ed	220	0
667c7a71-e50f-11e9-9f12-005056aa47ed	306	0
72873c93-e50f-11e9-9f12-005056aa47ed	309	0
a8e01a17-e511-11e9-9f12-005056aa47ed	312	0
e5f347ff-e511-11e9-9f12-005056aa47ed	308	0
e7f60ad1-e514-11e9-9f12-005056aa47ed	225	0
a3a7f840-e51a-11e9-9f12-005056aa47ed	313	0
e0d7e1dd-e5e9-11e9-9ddf-005056aa47ed	311	0
9e513c29-e8f3-11e9-9ddf-005056aa47ed	ххх	0
d01b3409-ea68-11e9-9ddf-005056aa47ed	223	0
0bb5f7f3-ea69-11e9-9ddf-005056aa47ed	304	0
3cd839f5-ea72-11e9-9ddf-005056aa47ed	324	0
1ab3d0d6-007c-11ea-8aee-005056aa47ed	427а	0
d73b43e5-d196-11e2-a62d-005056b87bc8	А104 тест	0
960069f2-d258-11e2-a62d-005056b87bc8	302	0
7a5b1aee-d3f0-11e2-a62d-005056b87bc8	310	0
8d546f7e-d3f0-11e2-a62d-005056b87bc8	314	0
946b50eb-d3f0-11e2-a62d-005056b87bc8	301	0
a3658b6c-d3f0-11e2-a62d-005056b87bc8	210	0
a3658b6d-d3f0-11e2-a62d-005056b87bc8	211	0
a3658b6e-d3f0-11e2-a62d-005056b87bc8	212	0
ab3116be-d3f0-11e2-a62d-005056b87bc8	213	0
c2412c0e-d3f0-11e2-a62d-005056b87bc8	214	0
c2412c10-d3f0-11e2-a62d-005056b87bc8	215	0
fac9edca-76ff-11e5-abf8-005056b87bc8	400	0
7a1572ab-77db-11e5-abf8-005056b87bc8	521	0
9eb6b63f-8e90-11e5-ac67-005056aa47ed	522	0
636aaa48-983b-11e5-ac67-005056aa47ed	514	0
2dda9cd6-9f3c-11e5-ac67-005056aa47ed	спортзал	0
cc1b23ad-4c93-11e5-b53a-005056b87bc8	216	0
12421fad-4c94-11e5-b53a-005056b87bc8	117	0
2964848f-4c94-11e5-b53a-005056b87bc8	119	0
46551e0f-4c94-11e5-b53a-005056b87bc8	326	0
553eddd2-4c94-11e5-b53a-005056b87bc8	315	0
60c7e661-4c94-11e5-b53a-005056b87bc8	316	0
7a85b68d-4c94-11e5-b53a-005056b87bc8	320	0
85e230e0-4c94-11e5-b53a-005056b87bc8	322	0
a52b395f-4c94-11e5-b53a-005056b87bc8	535	0
e267f399-4c94-11e5-b53a-005056b87bc8	531	0
f0f3dbe1-4c94-11e5-b53a-005056b87bc8	532	0
df71416d-4c97-11e5-b53a-005056b87bc8	123	0
0e50282f-4c98-11e5-b53a-005056b87bc8	323	0
1fbb89c1-4c98-11e5-b53a-005056b87bc8	321	0
aea8487d-4c98-11e5-b53a-005056b87bc8	319	0
c093af7e-4c98-11e5-b53a-005056b87bc8	202	0
d429b93d-4c98-11e5-b53a-005056b87bc8	114	0
e094482d-4c98-11e5-b53a-005056b87bc8	112	0
ec4dfdad-4c98-11e5-b53a-005056b87bc8	108	0
f6acb718-4c98-11e5-b53a-005056b87bc8	109	0
050903de-4c99-11e5-b53a-005056b87bc8	118	0
8fffd04f-4c99-11e5-b53a-005056b87bc8	124	0
abb2448d-4c99-11e5-b53a-005056b87bc8	125	0
d16fd3ed-4c99-11e5-b53a-005056b87bc8	122	0
ec479fb1-4c99-11e5-b53a-005056b87bc8	518	0
fda03c84-4c99-11e5-b53a-005056b87bc8	520	0
2ad5e00d-4c9a-11e5-b53a-005056b87bc8	519	0
39dd6100-4c9a-11e5-b53a-005056b87bc8	511	0
4a99bddd-4c9a-11e5-b53a-005056b87bc8	513	0
0ab23ce2-008c-11ea-8aee-005056aa47ed	115	0
55faf321-4c9a-11e5-b53a-005056b87bc8	515	0
668c967d-4c9a-11e5-b53a-005056b87bc8	504	0
71e7ff9d-4c9a-11e5-b53a-005056b87bc8	523	0
85362aad-4c9a-11e5-b53a-005056b87bc8	525	0
9b8b546d-4c9a-11e5-b53a-005056b87bc8	526	0
ab40efae-4c9a-11e5-b53a-005056b87bc8	527	0
b5407212-4c9a-11e5-b53a-005056b87bc8	528	0
c7391f7d-4c9a-11e5-b53a-005056b87bc8	505	0
d3a44ab0-4c9a-11e5-b53a-005056b87bc8	512	0
e178c9e2-4c9a-11e5-b53a-005056b87bc8	503	0
f3f3517d-4c9a-11e5-b53a-005056b87bc8	502	0
03501e5d-4c9b-11e5-b53a-005056b87bc8	524	0
1b3536ed-4c9b-11e5-b53a-005056b87bc8	510	0
4364899d-4c9b-11e5-b53a-005056b87bc8	516	0
530c7fbb-008c-11ea-8aee-005056aa47ed	317	0
67c2e3cd-053a-11ea-8c6d-005056aa47ed	спортзал 1	0
64f82095-0542-11ea-8c6d-005056aa47ed	116	0
a7c09c06-0542-11ea-8c6d-005056aa47ed	431	0
b9fcb25c-0542-11ea-8c6d-005056aa47ed	432	0
c0059e02-0542-11ea-8c6d-005056aa47ed	433	0
6af8029d-0c2c-11ea-8c6d-005056aa47ed	Серверная	0
91e4a078-0c2c-11ea-8c6d-005056aa47ed	Столовая	0
8077a9c5-11b0-11ea-8c6d-005056aa47ed	101	0
8769de67-11b0-11ea-8c6d-005056aa47ed	102	0
8d811275-11b0-11ea-8c6d-005056aa47ed	103	0
9389fdfa-11b0-11ea-8c6d-005056aa47ed	104	0
a67d6046-11b0-11ea-8c6d-005056aa47ed	404	0
b3657512-11b0-11ea-8c6d-005056aa47ed	404а	0
70c90fe5-11b7-11ea-8c6d-005056aa47ed	113	0
ff5ad514-11b8-11ea-8c6d-005056aa47ed	д.23	0
d7e4aa7b-11b9-11ea-8c6d-005056aa47ed	206	0
284c86c7-11ba-11ea-8c6d-005056aa47ed	217	0
32230e51-11ba-11ea-8c6d-005056aa47ed	300	0
39ab3b0d-11ba-11ea-8c6d-005056aa47ed	302а	0
39ab3b10-11ba-11ea-8c6d-005056aa47ed	303	0
a296eb0b-11c5-11ea-8c6d-005056aa47ed	307	0
b5989573-11c5-11ea-8c6d-005056aa47ed	318	0
c431e8fd-11c5-11ea-8c6d-005056aa47ed	326/1	0
c431e900-11c5-11ea-8c6d-005056aa47ed	326/3	0
febf5f17-11c9-11ea-8c6d-005056aa47ed	401	0
febf5f1c-11c9-11ea-8c6d-005056aa47ed	402	0
0548d631-11ca-11ea-8c6d-005056aa47ed	402а	0
0fe4f1cd-11ca-11ea-8c6d-005056aa47ed	405	0
0fe4f1d0-11ca-11ea-8c6d-005056aa47ed	406	0
17eb48d6-11ca-11ea-8c6d-005056aa47ed	411	0
1e2af482-11ca-11ea-8c6d-005056aa47ed	414	0
1e2af4a6-11ca-11ea-8c6d-005056aa47ed	415	0
2a7f72bb-11ca-11ea-8c6d-005056aa47ed	416	0
2a7f72ea-11ca-11ea-8c6d-005056aa47ed	418	0
30990826-11ca-11ea-8c6d-005056aa47ed	419	0
30990829-11ca-11ea-8c6d-005056aa47ed	420	0
39bf682b-11ca-11ea-8c6d-005056aa47ed	421	0
39bf682e-11ca-11ea-8c6d-005056aa47ed	422	0
411cbbbb-11ca-11ea-8c6d-005056aa47ed	423	0
411cbbc4-11ca-11ea-8c6d-005056aa47ed	424	0
48e2ccd3-11ca-11ea-8c6d-005056aa47ed	425	0
48e2ccd6-11ca-11ea-8c6d-005056aa47ed	426	0
52dd0959-11ca-11ea-8c6d-005056aa47ed	427/1	0
598a3573-11ca-11ea-8c6d-005056aa47ed	427/2	0
5f9a4535-11ca-11ea-8c6d-005056aa47ed	427б	0
5f9a4669-11ca-11ea-8c6d-005056aa47ed	427в	0
659287c1-11ca-11ea-8c6d-005056aa47ed	428	0
6b8ac8f0-11ca-11ea-8c6d-005056aa47ed	429	0
71c3505b-11ca-11ea-8c6d-005056aa47ed	429а	0
571135f7-11cf-11ea-8c6d-005056aa47ed	430	0
647513b5-11cf-11ea-8c6d-005056aa47ed	431а	0
6c5a170e-11cf-11ea-8c6d-005056aa47ed	432/1	0
72fb5c13-11cf-11ea-8c6d-005056aa47ed	432/1а	0
72fb5c20-11cf-11ea-8c6d-005056aa47ed	432/2	0
8684b62f-11cf-11ea-8c6d-005056aa47ed	433/1	0
8684b638-11cf-11ea-8c6d-005056aa47ed	433/2	0
8e4f8a13-11cf-11ea-8c6d-005056aa47ed	433/3	0
a2ef67dd-11cf-11ea-8c6d-005056aa47ed	5 этаж	0
b0d63282-11cf-11ea-8c6d-005056aa47ed	507	0
b73731cf-11cf-11ea-8c6d-005056aa47ed	508	0
a04a0205-11d1-11ea-8c6d-005056aa47ed	530	0
a04a0212-11d1-11ea-8c6d-005056aa47ed	533	0
a84934b1-11d1-11ea-8c6d-005056aa47ed	534	0
a84934c5-11d1-11ea-8c6d-005056aa47ed	600	0
b9c21857-11d1-11ea-8c6d-005056aa47ed	Библиотека	0
dc6d0f6e-781c-11ea-853b-005056aa47ed	 204	0
169b03bd-11d2-11ea-8c6d-005056aa47ed	Гр.Кос.	0
266e8fe1-11d2-11ea-8c6d-005056aa47ed	Двор инст.	0
59128fc7-11d2-11ea-8c6d-005056aa47ed	ИТФ	0
626fafff-11d2-11ea-8c6d-005056aa47ed	Касса	0
626fb002-11d2-11ea-8c6d-005056aa47ed	Колледж	0
c8c9709e-11d2-11ea-8c6d-005056aa47ed	Кор. 1э	0
d8108a3b-11d2-11ea-8c6d-005056aa47ed	Кор. 5э	0
050f994b-11d3-11ea-8c6d-005056aa47ed	Лест.1-го 	0
3e453d39-11d5-11ea-8c6d-005056aa47ed	Лест.2-го 	0
3e453d3c-11d5-11ea-8c6d-005056aa47ed	Лест.3-го 	0
44a3db27-11d5-11ea-8c6d-005056aa47ed	Лест.4-го 	0
44a3db2a-11d5-11ea-8c6d-005056aa47ed	Лест.5-го 	0
4dc0b59f-11d5-11ea-8c6d-005056aa47ed	Медпункт	0
4dc0b5a2-11d5-11ea-8c6d-005056aa47ed	Москва	0
5794dbc5-11d5-11ea-8c6d-005056aa47ed	Общий	0
62061e37-11d5-11ea-8c6d-005056aa47ed	Подвал	0
7f470db7-11d5-11ea-8c6d-005056aa47ed	Пр. ком	0
86667cea-11d5-11ea-8c6d-005056aa47ed	РИО	0
c8c97099-11d2-11ea-8c6d-005056aa47ed	К3Э	0
cf71d9ed-11d2-11ea-8c6d-005056aa47ed	К2Э	0
cf71d9ff-11d2-11ea-8c6d-005056aa47ed	К4Э	0
5794dbc8-11d5-11ea-8c6d-005056aa47ed	Охрана 1	0
98e928f1-11d8-11ea-8c6d-005056aa47ed	Серверн ИТ	0
ff79de39-11dd-11ea-8c6d-005056aa47ed	Склад	0
a7d1c389-11de-11ea-8c6d-005056aa47ed	Т 1 эт. Ж	0
a7d1c38c-11de-11ea-8c6d-005056aa47ed	Т 1 эт. М	0
aff4ab2b-11de-11ea-8c6d-005056aa47ed	Т 2 эт. М	0
aff4ab2e-11de-11ea-8c6d-005056aa47ed	Т 2 эт. Ж	0
d31ad143-11de-11ea-8c6d-005056aa47ed	Т 4 эт. Мс	0
d94771d5-11de-11ea-8c6d-005056aa47ed	Т 4 эт. Мю	0
f6f11ed7-11de-11ea-8c6d-005056aa47ed	Т 5 эт. Жю	0
fe474e35-11de-11ea-8c6d-005056aa47ed	УИТ	0
260305c1-11df-11ea-8c6d-005056aa47ed	Учредители	0
ac8cc687-3993-11e8-8b91-005056aa47ed	ЭЩ	0
c0e64a57-11d1-11ea-8c6d-005056aa47ed	Бойлерная1	0
2e00aa10-1b37-11ea-8c6d-005056aa47ed	Ц.л.	0
4321aa30-1b37-11ea-8c6d-005056aa47ed	П.л.	0
52db773d-1b37-11ea-8c6d-005056aa47ed	Л.л.	0
8be436fa-1b37-11ea-8c6d-005056aa47ed	Вод.	0
bb5a9043-1b37-11ea-8c6d-005056aa47ed	Ксер.	0
e01f464f-1b37-11ea-8c6d-005056aa47ed	015	0
02b22cd7-1b38-11ea-8c6d-005056aa47ed	Книги	0
1c34090b-1b38-11ea-8c6d-005056aa47ed	Скл. Книг	0
335477fa-1b38-11ea-8c6d-005056aa47ed	Скл. р.	0
4b0395af-1b38-11ea-8c6d-005056aa47ed	А1	0
6015c83f-1b38-11ea-8c6d-005056aa47ed	А2	0
666d4752-1b38-11ea-8c6d-005056aa47ed	А3	0
8396815b-1b38-11ea-8c6d-005056aa47ed	Г	0
b019ed07-1b38-11ea-8c6d-005056aa47ed	Охрана 2	0
39eb138d-1b39-11ea-8c6d-005056aa47ed	РО	0
56e706d6-1b39-11ea-8c6d-005056aa47ed	Бойлерная2	0
7b346968-1b39-11ea-8c6d-005056aa47ed	Слесарная	0
8c9324fc-1b39-11ea-8c6d-005056aa47ed	Скл. м.	0
fd7d53dc-1b3e-11ea-8c6d-005056aa47ed	121	0
c01c190c-1b43-11ea-8c6d-005056aa47ed	РЖ+душ	0
d0f0bc3a-1b43-11ea-8c6d-005056aa47ed	РМ+душ	0
db61aecc-1b47-11ea-8c6d-005056aa47ed	325	0
f2a0d6fa-1b47-11ea-8c6d-005056aa47ed	В3Э	0
3f423b6a-1b48-11ea-8c6d-005056aa47ed	б/н 1	0
50e13598-1b48-11ea-8c6d-005056aa47ed	б/н 2	0
6e41171e-1b48-11ea-8c6d-005056aa47ed	б/н 3	0
76450c92-1b48-11ea-8c6d-005056aa47ed	б/н 4	0
7c71ad32-1b48-11ea-8c6d-005056aa47ed	б/н 5	0
8a79cb64-1b48-11ea-8c6d-005056aa47ed	б/н 6	0
d0623600-1b56-11ea-8c6d-005056aa47ed	406а	0
04b3ba5e-1b59-11ea-8c6d-005056aa47ed	501	0
23fb9abc-1b59-11ea-8c6d-005056aa47ed	506	0
42c08e29-1b59-11ea-8c6d-005056aa47ed	507а	0
51897daa-1b59-11ea-8c6d-005056aa47ed	509	0
4964b944-1b5a-11ea-8c6d-005056aa47ed	К5Э	0
c4e21b12-1fd9-11ea-8c6d-005056aa47ed	 305	0
0e74537e-1fda-11ea-8c6d-005056aa47ed	 205	0
c3bb7208-1fda-11ea-8c6d-005056aa47ed	 304	0
351ddfa0-1fe7-11ea-8c6d-005056aa47ed	 324	0
cb8db1a2-22f8-11ea-856b-005056aa47ed	 309	0
81ae6915-270c-11ea-856b-005056aa47ed	 201	0
da7e802d-270c-11ea-856b-005056aa47ed	 313	0
430908f8-96e8-11ea-a41e-005056aa47ed	005	0
d172da67-98ee-11ea-a41e-005056aa47ed	35	0
c1ce4918-98f6-11ea-a41e-005056aa47ed	33	0
24a2e57c-9e78-11ea-8c6a-005056aa47ed	30	0
5323b03c-9e86-11ea-8c6a-005056aa47ed	34	0
b822ed6e-9e88-11ea-8c6a-005056aa47ed	25	0
46b05d4e-9f2a-11ea-8c6a-005056aa47ed	32	0
\.


--
-- TOC entry 5978 (class 2606 OID 114819)
-- Name: sirius_classrooms sirius_classrooms_pkey; Type: CONSTRAINT; Schema: public; Owner: esodbuser
--

ALTER TABLE ONLY public.sirius_classrooms
    ADD CONSTRAINT sirius_classrooms_pkey PRIMARY KEY (uid);


--
-- TOC entry 6103 (class 0 OID 0)
-- Dependencies: 1085
-- Name: TABLE sirius_classrooms; Type: ACL; Schema: public; Owner: esodbuser
--

GRANT SELECT ON TABLE public.sirius_classrooms TO stavserg;


-- Completed on 2020-06-05 14:51:50

--
-- PostgreSQL database dump complete
--
