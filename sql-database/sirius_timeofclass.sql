PGDMP         5                x            esodb    9.6.10    12.0 	    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    76517    esodb    DATABASE     u   CREATE DATABASE esodb WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_RU.UTF8' LC_CTYPE = 'ru_RU.UTF8';
    DROP DATABASE esodb;
             	   esodbuser    false            >           1259    114982    sirius_timeofclass    TABLE     �   CREATE TABLE public.sirius_timeofclass (
    uid character varying(40) NOT NULL,
    timestart bigint NOT NULL,
    timeend bigint,
    markdelete integer DEFAULT 0 NOT NULL
);
 &   DROP TABLE public.sirius_timeofclass;
       public         	   esodbuser    false            �           0    0    TABLE sirius_timeofclass    COMMENT     T   COMMENT ON TABLE public.sirius_timeofclass IS 'РасписаниеЗвонков';
          public       	   esodbuser    false    1086            �           0    0    TABLE sirius_timeofclass    ACL     =   GRANT SELECT ON TABLE public.sirius_timeofclass TO stavserg;
          public       	   esodbuser    false    1086            �          0    114982    sirius_timeofclass 
   TABLE DATA           Q   COPY public.sirius_timeofclass (uid, timestart, timeend, markdelete) FROM stdin;
    public       	   esodbuser    false    1086   �       ]           2606    114986 *   sirius_timeofclass sirius_timeofclass_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.sirius_timeofclass
    ADD CONSTRAINT sirius_timeofclass_pkey PRIMARY KEY (uid);
 T   ALTER TABLE ONLY public.sirius_timeofclass DROP CONSTRAINT sirius_timeofclass_pkey;
       public         	   esodbuser    false    1086            �   E  x���K�\+�ǩ���f/w���_�5��N��Б�I�����˃�)øz��tB��C���H���������凤����H�怀�����ѱ!RZL��DXH2$v�;9#4�0�X��g�\�������_���7����X��p^�5�J�
M�D�⚿�V��?�B��իT���k�o��p���HX�̆��[ØI�	񸬸d�,e��5D�V$_\p|%�����2!��9_��G�f�h1,���z��HyDv/�UF3Gb�j����=|%"wW�n!��/2߭4qR�����#nLGĊ8Z�p�6X;#+��$��_��+�n#R*@�G��b������.��b��3�V�i��(��bv5L�X��]>�o��hxD|��d�1�|����|	F���-DV�Eo=&�
�H���#�����D�K���9�r��K|D0N���:Yzi����0��^�����ሄ��"�\ġm�X�Ht�h��Y���4CH_�hP.�K��ʕ�����'C<��h�"4����h�!d�>�n"*�s�R�jc��阏�
uF�|%���2c�Q`=ٸ�jM@���V�K)�/Ӓk�Q8Ւ����\| 툠�����	�VL[R�w�lŴ%o���D�1��}.TC<"�j��c���G+�K I����J�D�xݥ���K8"��o��꒒��N�Θ���h��Đ���j~�o�Ta�M�挘0+�0rr��0f��Cߩ�_��m��补T�HX.�Y�~iّ:D���۟{U7$�3b=&�M�d�z���w�xi1���ʔ �0�9�=,�ZJK����n��Z�V}�H}DV�q�W �J�xF2�V�����#�W�$�Zz��Wץt#:<�[����)�K����Q�z������-�`��%�1��oVtr23�5c�\{��N��m���6�4�-�1��H,��jHso�V�\�w�_�>��e�y�AE�yXV��-�foBo��D��ؽ]@�����.x@C����Ր615�0�O�G�.׷
Z�;�E��Ϲ_��-M$�猭�.s{�匸���Tr:_��+�[,�TE�[o1z<��2�n~Waއ.~.�<:��$t�p��K,[�D��k��W����׎�8��v��c:'H��d�V�c	���k:���w�Y���5�E��[���X�o�����e�j�s�NNz�t�*�c�K��񛘽(��� �������Ip#��K/�#QrW��'�^�MLm]{��3b_�D�Vj�z�5Ē���+i�������[lW�[񱔫�~K����V�z�!������?�     