PGDMP     6    4                x            esodb    9.6.10    12.0     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    76517    esodb    DATABASE     u   CREATE DATABASE esodb WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_RU.UTF8' LC_CTYPE = 'ru_RU.UTF8';
    DROP DATABASE esodb;
             	   esodbuser    false            8           1259    114259    sirius_studdepartments    TABLE       CREATE TABLE public.sirius_studdepartments (
    name character varying(150) DEFAULT ''::character varying NOT NULL,
    markdelete integer DEFAULT 0 NOT NULL,
    code character varying(9) DEFAULT ''::character varying NOT NULL,
    uid character varying NOT NULL
);
 *   DROP TABLE public.sirius_studdepartments;
       public         	   esodbuser    false            �           0    0    TABLE sirius_studdepartments    ACL     A   GRANT SELECT ON TABLE public.sirius_studdepartments TO stavserg;
          public       	   esodbuser    false    1080            �          0    114259    sirius_studdepartments 
   TABLE DATA           M   COPY public.sirius_studdepartments (name, markdelete, code, uid) FROM stdin;
    public       	   esodbuser    false    1080   F       _           2606    115725 2   sirius_studdepartments sirius_studdepartments_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.sirius_studdepartments
    ADD CONSTRAINT sirius_studdepartments_pkey PRIMARY KEY (uid);
 \   ALTER TABLE ONLY public.sirius_studdepartments DROP CONSTRAINT sirius_studdepartments_pkey;
       public         	   esodbuser    false    1080            �   �  x��Z�n�}n��O	�x��K^�M�;dɻF�$� �S����<�Ϳ��G)��s��9#;+�Ш��9U�:Ud��˰X���_W���l��z3,W?�������5\M������3�cW?���n���axl����p`���|xX�_�x�\���_a���А�i~�_M���6�-�]l)�5$�����QR-^[d�ҏ��= �[����H7>�1��[�y�o���7r���].�u�'� @2��+@.\&Z�s���y!Q8�6z۳*��i�>%�ϵ[mb�*̿����Z�M�9� ����j<�G�Z�:�`Xk�a	�Q�1�G���a��0�ub���ew0,���k0r�q�
�L	�s�����ނo���w�ߛ��ǭ`�4#f�U�[k� �p��@9�$e��z[�-I����!;��^�]���
�	o��4-ݣCo���q�pBn��W�-0��)* K9�v�߂�������
`S~O��ޭ�1����E��?�盵�e�n0���ɾd�B{a����W?_֕>�E���7�x}��M��>��0�B�Ę��HH!��	��[_ .��.��p�+��9���S�'�����V�Փ�`����'iQЛ�O'=%d��)�,���#C	����'I��ʞ���
��]g9�5p�A�z�
kd�����c�"q���"��������ކ�%�2@�[��@�K�w�@���vۖ��f��÷�ޮ8sAiYr�	�ʓC�	#'�����j�%�~����>��L���#JR�eN��T�!I���YM�H���fNz����ZZV�X%�f���8dE��=Q�~�p`�(8�X���}`���V<�Pg��*�ET� $x_�Z�:T�J��P'�����%�H4^:F�;j?@�>B��2Fp���D�����J��;c�`*ۅg2���`�T)�jy�����f�qk�l���#tjbA{�4����.�R����x���M�(�J��'e��&���hg5a�,Ca
@�@W��h�de�_%�rFlyaC�e	V����(���)#���Z�.BUq8.ad馤��S���xq��KR�-��=,�G��aCc�<缊UJ���4�&;=Yd\��F�|��[/Y�BI}���Ӣ �(���������Y�]�S|z��J�띓NU-���*�:�4�u�/�{��qDO���/�ϕDU�S2z�5�8Ǯ1լs�%�G7���ֲ�ȟ���硷��^�p��{Bm�-,�Rӗ��g`u�q�M�}i:����Z����s�JԳ �?t���l�y��t�B:��Q�����\L2)�U�rQ.��$}ߪ_�`�\��"X}�jJ�ɹ�s�Ά�Wڟ�S��ZF�d����I�D��hھV5�OJA��v�
D��J�'��Ob_tk�&�԰'b>vU\>b��b.�5ȻN޻-aE$��4��LaC*Z�-ߠ=?�����P�!Ќ5-3��G���rb��V�V�#C����R�L���B��&��t�h�}����&���8�ځf���gE�5]id�9sX�4�s�����>����6+���l� �$�����	��.tGo��_�ؑĄ>���s������40? ��!{��F@��{*Z�X�HI�E#��Kؚ�"�{^O���
�������::��U%��]ha��X���m�~S�M�����Nh�6�ّ�5�����R�D�I�y'b��c
q�[��$S�x2�ԿL*�I%���'=� �D�}@g�����3Z��'��8ٻ���������~�E|p .P�D�(ض�j�6����ا"�����c�3Z�r�/�LMb�qo2�-4�0�5w�W�b����Ԣ�+�BV�{��T���z�B��w�����I��cȝ�:�l$�¤�����F��a�E�-@�HkT�}�2xw3&�����]N�¸�����u�4ArF��-��2�;/���?��իW��	�     