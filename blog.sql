PGDMP     "    /            	    u           blog    9.5.9    9.5.9      }           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            ~           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       1262    26142    blog    DATABASE     v   CREATE DATABASE blog WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_UA.UTF-8' LC_CTYPE = 'ru_UA.UTF-8';
    DROP DATABASE blog;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    6            �           0    0    public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    6                        3079    12395    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    34794    blogs    TABLE     0  CREATE TABLE blogs (
    id integer NOT NULL,
    title character varying(255),
    content text,
    user_id integer,
    login character varying(255),
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.blogs;
       public         postgres    false    6            �            1259    34792    blogs_id_seq    SEQUENCE     n   CREATE SEQUENCE blogs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.blogs_id_seq;
       public       postgres    false    185    6            �           0    0    blogs_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE blogs_id_seq OWNED BY blogs.id;
            public       postgres    false    184            �            1259    42755    coments    TABLE       CREATE TABLE coments (
    id integer NOT NULL,
    coment text NOT NULL,
    user_id integer NOT NULL,
    post_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.coments;
       public         postgres    false    6            �            1259    42753    coments_id_seq    SEQUENCE     p   CREATE SEQUENCE coments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.coments_id_seq;
       public       postgres    false    6    187            �           0    0    coments_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE coments_id_seq OWNED BY coments.id;
            public       postgres    false    186            �            1259    34778 
   migrations    TABLE     g   CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    6            �            1259    34783    users    TABLE       CREATE TABLE users (
    id integer NOT NULL,
    login character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false    6            �            1259    34781    users_id_seq    SEQUENCE     n   CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    183    6            �           0    0    users_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE users_id_seq OWNED BY users.id;
            public       postgres    false    182            �           2604    34797    id    DEFAULT     V   ALTER TABLE ONLY blogs ALTER COLUMN id SET DEFAULT nextval('blogs_id_seq'::regclass);
 7   ALTER TABLE public.blogs ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    185    184    185            �           2604    42758    id    DEFAULT     Z   ALTER TABLE ONLY coments ALTER COLUMN id SET DEFAULT nextval('coments_id_seq'::regclass);
 9   ALTER TABLE public.coments ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    186    187    187            �           2604    34786    id    DEFAULT     V   ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    183    182    183            x          0    34794    blogs 
   TABLE DATA               d   COPY blogs (id, title, content, user_id, login, remember_token, created_at, updated_at) FROM stdin;
    public       postgres    false    185   �       �           0    0    blogs_id_seq    SEQUENCE SET     4   SELECT pg_catalog.setval('blogs_id_seq', 27, true);
            public       postgres    false    184            z          0    42755    coments 
   TABLE DATA               `   COPY coments (id, coment, user_id, post_id, remember_token, created_at, updated_at) FROM stdin;
    public       postgres    false    187   �!       �           0    0    coments_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('coments_id_seq', 25, true);
            public       postgres    false    186            t          0    34778 
   migrations 
   TABLE DATA               /   COPY migrations (migration, batch) FROM stdin;
    public       postgres    false    181   M#       v          0    34783    users 
   TABLE DATA               U   COPY users (id, login, password, remember_token, created_at, updated_at) FROM stdin;
    public       postgres    false    183   �#       �           0    0    users_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('users_id_seq', 2, true);
            public       postgres    false    182            �           2606    34802 
   blogs_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY blogs
    ADD CONSTRAINT blogs_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.blogs DROP CONSTRAINT blogs_pkey;
       public         postgres    false    185    185                        2606    42763    coments_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY coments
    ADD CONSTRAINT coments_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.coments DROP CONSTRAINT coments_pkey;
       public         postgres    false    187    187            �           2606    34791 
   users_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    183    183                       2606    42764    coments_post_id_foreign    FK CONSTRAINT     p   ALTER TABLE ONLY coments
    ADD CONSTRAINT coments_post_id_foreign FOREIGN KEY (post_id) REFERENCES blogs(id);
 I   ALTER TABLE ONLY public.coments DROP CONSTRAINT coments_post_id_foreign;
       public       postgres    false    2046    185    187            x   �  x�}R]n�@~^�b@"ۍ��7T�
�}A�ek��%��z7����
��	������̷3�7�l�g����V��)��:�������:s���@��L�E��Jh���	�����݃	��R�����05�G���Z����6���W��{{c�n&HU=�e;t�Vo�i�:��$-߯Y�n)�f���I�J�UR@����L�%[�d�lH<�b@#6�-���3
�̿$��BNh�u1��欍��jT�هW�� �'"�N
x��A�a}��|G.Ŭ�s����v��v"�e���썔P�w�R�S���G�D�+|0�0i��v�����b��� |Go���$����i��B~���")�=�K�4@��BO�@�sHGY)	�q��WP-}�"㴌�e|�d�Ҝ��~�~�~�ǝ�ǼW�����\[��2y]fWK�(-ػZ�u���&�8Aȯ�� y��69y�9�Y��9��/�Kj��-��Q�;k;l      z   >  x����N�0������4�N���^�w�!��vh���NC��VYU����qL@�>�@�+xGiGnGՆ8s��C�ﻭ�b����n�����C)��1�h1xy����}2�TY	Qb���Q�q13�@�����U36�u�s�d��,���%�ʻ0�aj{�;�!��-�Zs���0�Uf�ӱ��o1$~�dÓϞ�n,�ʔ-^��PM�ӨJ�_��lH4��/)A7�X��&֙Bv�b�-��з��~]�P��л����OV��r�d1�TL�ޚ�f��n)<3�2SI���b��e��vyUMd�6O��Q�u      t   ]   x�3204�74 #cSsc����Ē����Ԣ���Ĥ�TNC.#�2C 2�04�w+s��O/+2B(��70761��������W3͘+F��� ��$      v   �   x�EȻ�0 Й~�+����D�#V%D��
,V-�^7�x���RY6�l��{�aM<_��#��n3���Vl����L�WZ�f9>̈́��źy$n���d���a�^QV˴�~kv^��u�b���*_3\���"��6 �����Q��_�����3)     