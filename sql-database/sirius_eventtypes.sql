PGDMP     *    3                x            esodb    9.6.10    12.0 	    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    76517    esodb    DATABASE     u   CREATE DATABASE esodb WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_RU.UTF8' LC_CTYPE = 'ru_RU.UTF8';
    DROP DATABASE esodb;
             	   esodbuser    false            <           1259    114810    sirius_eventtypes    TABLE     �   CREATE TABLE public.sirius_eventtypes (
    uid character varying(40) NOT NULL,
    name character varying,
    markdelete integer DEFAULT 0 NOT NULL
);
 %   DROP TABLE public.sirius_eventtypes;
       public         	   esodbuser    false            �           0    0    TABLE sirius_eventtypes    COMMENT     O   COMMENT ON TABLE public.sirius_eventtypes IS 'ВидыМероприятий';
          public       	   esodbuser    false    1084            �           0    0    TABLE sirius_eventtypes    ACL     <   GRANT SELECT ON TABLE public.sirius_eventtypes TO stavserg;
          public       	   esodbuser    false    1084            �          0    114810    sirius_eventtypes 
   TABLE DATA           B   COPY public.sirius_eventtypes (uid, name, markdelete) FROM stdin;
    public       	   esodbuser    false    1084   v       ]           2606    114814 (   sirius_eventtypes sirius_eventtypes_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.sirius_eventtypes
    ADD CONSTRAINT sirius_eventtypes_pkey PRIMARY KEY (uid);
 R   ALTER TABLE ONLY public.sirius_eventtypes DROP CONSTRAINT sirius_eventtypes_pkey;
       public         	   esodbuser    false    1084            �   �  x��V�n[G<S_�ct�`��_r��;(*�a؆���Al99�d�Z,ɿ0�R3�BY�#��G�uuuuu�8&��.��9#RN����Ęs�zݤ~���	���ĩ$N�Ei���N��L�K��u1<��a>�DL��9n=a�Sd`1�g���Ȭ4�ԏ��0�M=^��t��E=�7dZ m��A=�؋�KC)�:yVD*c�c2� "�k�<p�x=����j�#�Y=��/���#ژ3���ȤJʲ(��8/��$DLR[�!�KM����`�$@� �y]6"H~�8oB�6"�	��'�CX��
*b���9o}<?B�1��B�,�H���
�vh-Y�A}�' 9��P�ʹ}կ(찞��.g.�9�QJH��60�b��svI�I=B�1*��%T����,��>� %aS�E��_d8C������"0f}$T�ꆏ��x6�p�2&���6�9���i=��E������J2�m#��,9�� �b,ækK�tL�(�`i_�<*VBW�a�A��Z�� ��&Oo#���P-G�벙��߉�	
tޗ���� m�h(�MA��B(U9(
7G��l=.$�މ`5�V��AM�&yT����׮���#�f�'���G!HI��^��&�o�|�1x�����)70|�0������yZA�����w#�x�]ن�)�=k��_�B]f�f�4$�(P�*ŊK�Ť�ٕ�] m��8me�l���G2C��z��F����	eKq�� ����e���j��#�� �_�����fQ�#^�o�DJb�	C�1�-�Ʌw�I쫶VX�[��Z9����>W���6g��8��aj�!��z�G�@�m��L1��H+ǥ}�vw?-�Ykb�'8(�WQN`����Q6���w��������.�|:�n@�n�մ��C�h�)�1�8��x�M�T9��c�0�򘭙��X3��5��E����y���o��z��l\r���V�w�y�u�~���v��Pv'An��.W��7hn'�E��]�v�@�H���/�)�1�8�'��śe�	�j��]ە�����Fv8�v�x���|�/��{�.o��Go�+��m/������*�f��ҹ������?�ل�c��֊���PӜT�Fbۍ����~��}:[�ߠ,������4t��,���5������}U�@     