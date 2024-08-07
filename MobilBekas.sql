PGDMP                      |            db    16.3    16.3 P    p           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            q           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            r           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            s           1262    16398    db    DATABASE     d   CREATE DATABASE db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'C';
    DROP DATABASE db;
                postgres    false            �            1259    17137 
   cart_spare    TABLE       CREATE TABLE public.cart_spare (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    sparepart_id bigint NOT NULL,
    quantity integer DEFAULT 1 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.cart_spare;
       public         heap    postgres    false            �            1259    17136    cart_spare_id_seq    SEQUENCE     z   CREATE SEQUENCE public.cart_spare_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.cart_spare_id_seq;
       public          postgres    false    233            t           0    0    cart_spare_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.cart_spare_id_seq OWNED BY public.cart_spare.id;
          public          postgres    false    232            �            1259    17114    carts    TABLE     
  CREATE TABLE public.carts (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    product_id bigint,
    sparepart_id bigint,
    quantity integer DEFAULT 1 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.carts;
       public         heap    postgres    false            �            1259    17113    carts_id_seq    SEQUENCE     u   CREATE SEQUENCE public.carts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.carts_id_seq;
       public          postgres    false    231            u           0    0    carts_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.carts_id_seq OWNED BY public.carts.id;
          public          postgres    false    230            �            1259    17100 	   checkouts    TABLE     6  CREATE TABLE public.checkouts (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    product_name character varying(255) NOT NULL,
    category character varying(255),
    product_image character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.checkouts;
       public         heap    postgres    false            �            1259    17099    checkouts_id_seq    SEQUENCE     y   CREATE SEQUENCE public.checkouts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.checkouts_id_seq;
       public          postgres    false    229            v           0    0    checkouts_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.checkouts_id_seq OWNED BY public.checkouts.id;
          public          postgres    false    228            �            1259    17058    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    17057    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    221            w           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    220            �            1259    17033 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    17032    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    216            x           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    215            �            1259    17050    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    17070    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    17069    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    223            y           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    222            �            1259    17091    products    TABLE     �  CREATE TABLE public.products (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    price numeric(12,2) NOT NULL,
    description text,
    image character varying(255),
    image2 character varying(255),
    image3 character varying(255),
    image4 character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.products;
       public         heap    postgres    false            �            1259    17090    products_id_seq    SEQUENCE     x   CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public          postgres    false    227            z           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
          public          postgres    false    226            �            1259    17082 
   spareparts    TABLE     &  CREATE TABLE public.spareparts (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    image character varying(255) NOT NULL,
    price numeric(12,2) NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.spareparts;
       public         heap    postgres    false            �            1259    17081    spareparts_id_seq    SEQUENCE     z   CREATE SEQUENCE public.spareparts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.spareparts_id_seq;
       public          postgres    false    225            {           0    0    spareparts_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.spareparts_id_seq OWNED BY public.spareparts.id;
          public          postgres    false    224            �            1259    17040    users    TABLE     6  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    is_admin boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    17039    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    218            |           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    217            �           2604    17140    cart_spare id    DEFAULT     n   ALTER TABLE ONLY public.cart_spare ALTER COLUMN id SET DEFAULT nextval('public.cart_spare_id_seq'::regclass);
 <   ALTER TABLE public.cart_spare ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    232    233    233            �           2604    17117    carts id    DEFAULT     d   ALTER TABLE ONLY public.carts ALTER COLUMN id SET DEFAULT nextval('public.carts_id_seq'::regclass);
 7   ALTER TABLE public.carts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    231    230    231            �           2604    17103    checkouts id    DEFAULT     l   ALTER TABLE ONLY public.checkouts ALTER COLUMN id SET DEFAULT nextval('public.checkouts_id_seq'::regclass);
 ;   ALTER TABLE public.checkouts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228    229            �           2604    17061    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            �           2604    17036    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            �           2604    17073    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222    223            �           2604    17094    products id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226    227            �           2604    17085    spareparts id    DEFAULT     n   ALTER TABLE ONLY public.spareparts ALTER COLUMN id SET DEFAULT nextval('public.spareparts_id_seq'::regclass);
 <   ALTER TABLE public.spareparts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    225    225            �           2604    17043    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            m          0    17137 
   cart_spare 
   TABLE DATA           a   COPY public.cart_spare (id, user_id, sparepart_id, quantity, created_at, updated_at) FROM stdin;
    public          postgres    false    233   }`       k          0    17114    carts 
   TABLE DATA           h   COPY public.carts (id, user_id, product_id, sparepart_id, quantity, created_at, updated_at) FROM stdin;
    public          postgres    false    231   �`       i          0    17100 	   checkouts 
   TABLE DATA           o   COPY public.checkouts (id, user_id, product_name, category, product_image, created_at, updated_at) FROM stdin;
    public          postgres    false    229   �`       a          0    17058    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    221   �a       \          0    17033 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    216   �a       _          0    17050    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    219   �b       c          0    17070    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    223   �b       g          0    17091    products 
   TABLE DATA           w   COPY public.products (id, name, price, description, image, image2, image3, image4, created_at, updated_at) FROM stdin;
    public          postgres    false    227   �b       e          0    17082 
   spareparts 
   TABLE DATA           a   COPY public.spareparts (id, name, image, price, description, created_at, updated_at) FROM stdin;
    public          postgres    false    225   �f       ^          0    17040    users 
   TABLE DATA           \   COPY public.users (id, name, email, password, is_admin, created_at, updated_at) FROM stdin;
    public          postgres    false    218   �i       }           0    0    cart_spare_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.cart_spare_id_seq', 3, true);
          public          postgres    false    232            ~           0    0    carts_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.carts_id_seq', 3, true);
          public          postgres    false    230                       0    0    checkouts_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.checkouts_id_seq', 4, true);
          public          postgres    false    228            �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    220            �           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);
          public          postgres    false    215            �           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    222            �           0    0    products_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.products_id_seq', 10, true);
          public          postgres    false    226            �           0    0    spareparts_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.spareparts_id_seq', 3, true);
          public          postgres    false    224            �           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 5, true);
          public          postgres    false    217            �           2606    17143    cart_spare cart_spare_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.cart_spare
    ADD CONSTRAINT cart_spare_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.cart_spare DROP CONSTRAINT cart_spare_pkey;
       public            postgres    false    233            �           2606    17120    carts carts_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.carts DROP CONSTRAINT carts_pkey;
       public            postgres    false    231            �           2606    17107    checkouts checkouts_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.checkouts
    ADD CONSTRAINT checkouts_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.checkouts DROP CONSTRAINT checkouts_pkey;
       public            postgres    false    229            �           2606    17066    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    221            �           2606    17068 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    221            �           2606    17038    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    216            �           2606    17056 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    219            �           2606    17077 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    223            �           2606    17080 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    223            �           2606    17098    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public            postgres    false    227            �           2606    17089    spareparts spareparts_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.spareparts
    ADD CONSTRAINT spareparts_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.spareparts DROP CONSTRAINT spareparts_pkey;
       public            postgres    false    225            �           2606    17049    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    218            �           2606    17047    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    218            �           1259    17078 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    223    223            �           2606    17149 *   cart_spare cart_spare_sparepart_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.cart_spare
    ADD CONSTRAINT cart_spare_sparepart_id_foreign FOREIGN KEY (sparepart_id) REFERENCES public.spareparts(id) ON DELETE CASCADE;
 T   ALTER TABLE ONLY public.cart_spare DROP CONSTRAINT cart_spare_sparepart_id_foreign;
       public          postgres    false    225    3517    233            �           2606    17144 %   cart_spare cart_spare_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.cart_spare
    ADD CONSTRAINT cart_spare_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 O   ALTER TABLE ONLY public.cart_spare DROP CONSTRAINT cart_spare_user_id_foreign;
       public          postgres    false    3504    233    218            �           2606    17126    carts carts_product_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.products(id) ON DELETE CASCADE;
 H   ALTER TABLE ONLY public.carts DROP CONSTRAINT carts_product_id_foreign;
       public          postgres    false    3519    231    227            �           2606    17131     carts carts_sparepart_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_sparepart_id_foreign FOREIGN KEY (sparepart_id) REFERENCES public.spareparts(id) ON DELETE CASCADE;
 J   ALTER TABLE ONLY public.carts DROP CONSTRAINT carts_sparepart_id_foreign;
       public          postgres    false    3517    225    231            �           2606    17121    carts carts_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 E   ALTER TABLE ONLY public.carts DROP CONSTRAINT carts_user_id_foreign;
       public          postgres    false    231    3504    218            �           2606    17108 #   checkouts checkouts_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.checkouts
    ADD CONSTRAINT checkouts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.checkouts DROP CONSTRAINT checkouts_user_id_foreign;
       public          postgres    false    229    3504    218            m   )   x�3�4BCN##]3]#3s+#+clb\1z\\\ �C	      k   -   x�3�4�4���4�4202�50�52S00�22�2�*����� �	�      i   �   x����n�0�g�)��8&$�R�JB%�С�u�Z�ō#�A���Cb�@�;����0�Hc��#��5Z#T�+U�Ҝth�%y���~���(Ћ�(�e�S�E.Z����V��tN��k�F��l��,K��$�ˋҰ�qt
j�*M܀V��f ��Q<�����/����ϰ�f�ޏ�KR�?a��}��&{D#�2.�};�8<?�o��<��^�if      a      x������ � �      \   �   x�]��� ���0 8}�%b�m1���E~Hhz񝜊��B�� $�������3�xL�Pp5D�G�H �	�l�`��}��y�8������%��������`�E��HǤ������q�'i5�I��nT��n�lfo�U���vr[��
��%ԼQ9<�>����)؄�      _      x������ � �      c      x������ � �      g   �  x��X�n�6]�_�MwI���kv�"y��Y H�r+R �nf���l�I������sy/�L��-ZD1�	�����UUf�	��e�D�-r�lByr_�WWYՏ�xt6���Ӷ�Q���~df�pc['e�H�� �y3J�P�TW��7MX�����v(@�Թ�PTJ��9싒ZP�o�oB���6�?�fw:��<�A�_�͢X4'�����q}ˇP�ʬ�u����U�cz���:T�杫"4m���ەZh�|㣢�*>^�^*"�����t�2A��F+k106�p[ N0��ὁ\�S`v���y�4Q#��[��kUWEa�yц��"b��<��kB�������K���	k�����p�l��r�PC����L�|o ��i�q?�!$�������Y�gDy�I��h�P��.n���qC��I�*]"�YIEF-ZvLᣤ0uLIENt>t�^<%���<��=^�u��Ģ��Ǿ�������Q:��a�A9�/o���<��m�!��f��m-�9�A$_���¬�����Fd���yE���6}��A3����ue!R��s�ߧ��yꇭ�Nhi.(�|XvB�u��ƒ�刺�]��r 
qlA����\-}��  �P�R�����S�\
��n	�d泸���SA�F�in�-g�,��E_=��5:~,���6��V�M����B�m��.�I]l��]����)�e�/��MN����n
b�m(�#~���"J�lT��.Q�3�"ӿ���#㗦��<_��"Q^z�Q��JZAY����P�)����ʹs9�a�X�Gpr�&.�uX�Ң��C��1�׌	֝E=�W�>����$����E���O��Ĩ�ܟM&���&f�      e   ,  x��TK��6]K��T�($����8�Z�O�tU�ʦ%b(IP����%r��*WHC�i��U�H���n���v�IT����+/A��}����:��-���!V"w��i�	��v�$zb��8݀�F���>�J���4
Р�0/(�rс�(fϐf�d���R�d�1�]~	&�܃+�W��J(޼�=(�<p, ��5$��+�^���?�,YD�ђy�lXi�OI�����ۊ�����s���W,���
/�k,|B�xZY�� �u���ZJ%J��w#�`�1�!�$Y�|�'��gw��.��U�XM���F@�M�x6�{�}���zc��}B�G�/�ƥ�Eƕh�yU��[jk�����w���	5���3�&[.��D�g��2�E�H���F)e��N#�)�Fr-pL�Ȯ�j�F��r?P�> 9벭6$gR>�ssnʎ_��&R�;�-�U��@!�(��+��L�X�7sUY�ݑ�J\G�c�^�
k��FrU*!XA����w��M�m�-~��rE���0�m��:~��X�%�sFs�=��lv���YʞȘ�δ�,߽�,���3u��쫿��B|a>����+,��puBeۦd�-��4WTF�$�����R�'��룾R�S���,24�9M^N��ڔ���i���fb��T��!Ͱ�>�0r�+~�.M֏֢(�"fW<�6�����;l�_��<<Yc/�m���Q	�-%��_'���o'�(b��G��\ѭ74jHe���k!oo��sU�xN>�K�7{?�s2�<��]      ^   �   x�m��n�@ ���S����SY�6��VQ�_��@�U�O_�6��df2��7HrV�?�x`I}�Yǀ�FYC2��R��S6.��ʋ�l�q}B����Ŧ,�6��Fn�MN��7Idg.:V�����t�č�Pe��E$M5/D���[��՛~j�zC�(/ 
��{���ҟ�(,��}[4����tc������f�f�m���ϣ�Ș����>C�L��m�J���^n     