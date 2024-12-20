PGDMP                  
    |            ecotech    16.1    16.1 N    A           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            B           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            C           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            D           1262    25709    ecotech    DATABASE     ~   CREATE DATABASE ecotech WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE ecotech;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                pg_database_owner    false            E           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   pg_database_owner    false    4            �            1259    25729    administrador    TABLE     �   CREATE TABLE public.administrador (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    telefone character varying(100) NOT NULL,
    senha character varying(200) NOT NULL
);
 !   DROP TABLE public.administrador;
       public         heap    postgres    false    4            �            1259    25728    administrador_id_seq    SEQUENCE     �   CREATE SEQUENCE public.administrador_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.administrador_id_seq;
       public          postgres    false    219    4            F           0    0    administrador_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.administrador_id_seq OWNED BY public.administrador.id;
          public          postgres    false    218            �            1259    25757    coleta    TABLE     (  CREATE TABLE public.coleta (
    id integer NOT NULL,
    localizacao character varying(200) NOT NULL,
    nome character varying(100) NOT NULL,
    foto character varying(500) NOT NULL,
    descricao text,
    status character varying(100) NOT NULL,
    fk_cnpj_empresa character varying(20)
);
    DROP TABLE public.coleta;
       public         heap    postgres    false    4            �            1259    25756    coleta_id_seq    SEQUENCE     �   CREATE SEQUENCE public.coleta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.coleta_id_seq;
       public          postgres    false    4    223            G           0    0    coleta_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.coleta_id_seq OWNED BY public.coleta.id;
          public          postgres    false    222            �            1259    25887    comentarios_posts    TABLE     �   CREATE TABLE public.comentarios_posts (
    id integer NOT NULL,
    texto_comentario character varying(200),
    fk_id_post integer,
    fk_id_usuario integer,
    fk_cnpj_empresa character varying(20)
);
 %   DROP TABLE public.comentarios_posts;
       public         heap    postgres    false    4            �            1259    25886    comentarios_posts_id_seq    SEQUENCE     �   CREATE SEQUENCE public.comentarios_posts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.comentarios_posts_id_seq;
       public          postgres    false    231    4            H           0    0    comentarios_posts_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.comentarios_posts_id_seq OWNED BY public.comentarios_posts.id;
          public          postgres    false    230            �            1259    25827    curtidas_posts    TABLE     �   CREATE TABLE public.curtidas_posts (
    id integer NOT NULL,
    fk_id_post integer,
    fk_id_usuario integer,
    fk_cnpj_empresa character varying(20)
);
 "   DROP TABLE public.curtidas_posts;
       public         heap    postgres    false    4            �            1259    25826    curtidas_posts_id_seq    SEQUENCE     �   CREATE SEQUENCE public.curtidas_posts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.curtidas_posts_id_seq;
       public          postgres    false    4    229            I           0    0    curtidas_posts_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.curtidas_posts_id_seq OWNED BY public.curtidas_posts.id;
          public          postgres    false    228            �            1259    25771    denuncia    TABLE     3  CREATE TABLE public.denuncia (
    id integer NOT NULL,
    endereco character varying(100) NOT NULL,
    data date NOT NULL,
    hora time without time zone NOT NULL,
    fk_id_usuario integer,
    fk_cnpj_empresa character varying(20),
    texto character varying(200),
    foto character varying(200)
);
    DROP TABLE public.denuncia;
       public         heap    postgres    false    4            �            1259    25788    denuncia_administrador    TABLE     �   CREATE TABLE public.denuncia_administrador (
    id integer NOT NULL,
    fk_id_denuncia integer,
    fk_id_adm_administrador integer
);
 *   DROP TABLE public.denuncia_administrador;
       public         heap    postgres    false    4            �            1259    25787    denuncia_administrador_id_seq    SEQUENCE     �   CREATE SEQUENCE public.denuncia_administrador_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.denuncia_administrador_id_seq;
       public          postgres    false    227    4            J           0    0    denuncia_administrador_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.denuncia_administrador_id_seq OWNED BY public.denuncia_administrador.id;
          public          postgres    false    226            �            1259    25770    denuncia_id_seq    SEQUENCE     �   CREATE SEQUENCE public.denuncia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.denuncia_id_seq;
       public          postgres    false    225    4            K           0    0    denuncia_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.denuncia_id_seq OWNED BY public.denuncia.id;
          public          postgres    false    224            �            1259    25721    empresa    TABLE       CREATE TABLE public.empresa (
    cnpj character varying(20) NOT NULL,
    email character varying(100) NOT NULL,
    data_inauguracao date NOT NULL,
    senha character varying(200) NOT NULL,
    nome character varying(100) NOT NULL,
    telefone character varying(100) NOT NULL
);
    DROP TABLE public.empresa;
       public         heap    postgres    false    4            �            1259    25738    post    TABLE     �   CREATE TABLE public.post (
    id integer NOT NULL,
    foto character varying(500),
    descricao character varying(1000) NOT NULL,
    curtida integer,
    fk_id_usuario integer,
    fk_cnpj_empresa character varying(20)
);
    DROP TABLE public.post;
       public         heap    postgres    false    4            �            1259    25737    post_id_seq    SEQUENCE     �   CREATE SEQUENCE public.post_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.post_id_seq;
       public          postgres    false    221    4            L           0    0    post_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.post_id_seq OWNED BY public.post.id;
          public          postgres    false    220            �            1259    25711    usuario    TABLE     �  CREATE TABLE public.usuario (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    data_nascimento date NOT NULL,
    telefone character varying(11) NOT NULL,
    email character varying(100) NOT NULL,
    biografia character varying(200),
    nome_usuario character varying(100),
    foto character varying(500),
    senha character varying(200) NOT NULL,
    tipo_conta character varying(50) NOT NULL
);
    DROP TABLE public.usuario;
       public         heap    postgres    false    4            �            1259    25710    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public          postgres    false    4    216            M           0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
          public          postgres    false    215            x           2604    25732    administrador id    DEFAULT     t   ALTER TABLE ONLY public.administrador ALTER COLUMN id SET DEFAULT nextval('public.administrador_id_seq'::regclass);
 ?   ALTER TABLE public.administrador ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    219    219            z           2604    25760 	   coleta id    DEFAULT     f   ALTER TABLE ONLY public.coleta ALTER COLUMN id SET DEFAULT nextval('public.coleta_id_seq'::regclass);
 8   ALTER TABLE public.coleta ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            ~           2604    25890    comentarios_posts id    DEFAULT     |   ALTER TABLE ONLY public.comentarios_posts ALTER COLUMN id SET DEFAULT nextval('public.comentarios_posts_id_seq'::regclass);
 C   ALTER TABLE public.comentarios_posts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    231    231            }           2604    25830    curtidas_posts id    DEFAULT     v   ALTER TABLE ONLY public.curtidas_posts ALTER COLUMN id SET DEFAULT nextval('public.curtidas_posts_id_seq'::regclass);
 @   ALTER TABLE public.curtidas_posts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228    229            {           2604    25774    denuncia id    DEFAULT     j   ALTER TABLE ONLY public.denuncia ALTER COLUMN id SET DEFAULT nextval('public.denuncia_id_seq'::regclass);
 :   ALTER TABLE public.denuncia ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    225    225            |           2604    25791    denuncia_administrador id    DEFAULT     �   ALTER TABLE ONLY public.denuncia_administrador ALTER COLUMN id SET DEFAULT nextval('public.denuncia_administrador_id_seq'::regclass);
 H   ALTER TABLE public.denuncia_administrador ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226    227            y           2604    25741    post id    DEFAULT     b   ALTER TABLE ONLY public.post ALTER COLUMN id SET DEFAULT nextval('public.post_id_seq'::regclass);
 6   ALTER TABLE public.post ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    221    221            w           2604    25714 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            2          0    25729    administrador 
   TABLE DATA                 public          postgres    false    219   A]       6          0    25757    coleta 
   TABLE DATA                 public          postgres    false    223   �]       >          0    25887    comentarios_posts 
   TABLE DATA                 public          postgres    false    231   �^       <          0    25827    curtidas_posts 
   TABLE DATA                 public          postgres    false    229   F_       8          0    25771    denuncia 
   TABLE DATA                 public          postgres    false    225   	`       :          0    25788    denuncia_administrador 
   TABLE DATA                 public          postgres    false    227   #`       0          0    25721    empresa 
   TABLE DATA                 public          postgres    false    217   =`       4          0    25738    post 
   TABLE DATA                 public          postgres    false    221   ;a       /          0    25711    usuario 
   TABLE DATA                 public          postgres    false    216   �g       N           0    0    administrador_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.administrador_id_seq', 1, true);
          public          postgres    false    218            O           0    0    coleta_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.coleta_id_seq', 15, true);
          public          postgres    false    222            P           0    0    comentarios_posts_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.comentarios_posts_id_seq', 12, true);
          public          postgres    false    230            Q           0    0    curtidas_posts_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.curtidas_posts_id_seq', 112, true);
          public          postgres    false    228            R           0    0    denuncia_administrador_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.denuncia_administrador_id_seq', 1, false);
          public          postgres    false    226            S           0    0    denuncia_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.denuncia_id_seq', 10, true);
          public          postgres    false    224            T           0    0    post_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.post_id_seq', 66, true);
          public          postgres    false    220            U           0    0    usuario_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.usuario_id_seq', 67, true);
          public          postgres    false    215            �           2606    25736     administrador administrador_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.administrador
    ADD CONSTRAINT administrador_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.administrador DROP CONSTRAINT administrador_pkey;
       public            postgres    false    219            �           2606    25764    coleta coleta_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.coleta
    ADD CONSTRAINT coleta_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.coleta DROP CONSTRAINT coleta_pkey;
       public            postgres    false    223            �           2606    25892 (   comentarios_posts comentarios_posts_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.comentarios_posts
    ADD CONSTRAINT comentarios_posts_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.comentarios_posts DROP CONSTRAINT comentarios_posts_pkey;
       public            postgres    false    231            �           2606    25832 "   curtidas_posts curtidas_posts_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.curtidas_posts
    ADD CONSTRAINT curtidas_posts_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.curtidas_posts DROP CONSTRAINT curtidas_posts_pkey;
       public            postgres    false    229            �           2606    25793 2   denuncia_administrador denuncia_administrador_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.denuncia_administrador
    ADD CONSTRAINT denuncia_administrador_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.denuncia_administrador DROP CONSTRAINT denuncia_administrador_pkey;
       public            postgres    false    227            �           2606    25776    denuncia denuncia_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.denuncia
    ADD CONSTRAINT denuncia_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.denuncia DROP CONSTRAINT denuncia_pkey;
       public            postgres    false    225            �           2606    25727    empresa empresa_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.empresa
    ADD CONSTRAINT empresa_pkey PRIMARY KEY (cnpj);
 >   ALTER TABLE ONLY public.empresa DROP CONSTRAINT empresa_pkey;
       public            postgres    false    217            �           2606    25745    post post_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.post
    ADD CONSTRAINT post_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.post DROP CONSTRAINT post_pkey;
       public            postgres    false    221            �           2606    25805    usuario usuario_email_key 
   CONSTRAINT     U   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_email_key UNIQUE (email);
 C   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_email_key;
       public            postgres    false    216            �           2606    25718    usuario usuario_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public            postgres    false    216            �           2606    25765 "   coleta coleta_fk_cnpj_empresa_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.coleta
    ADD CONSTRAINT coleta_fk_cnpj_empresa_fkey FOREIGN KEY (fk_cnpj_empresa) REFERENCES public.empresa(cnpj);
 L   ALTER TABLE ONLY public.coleta DROP CONSTRAINT coleta_fk_cnpj_empresa_fkey;
       public          postgres    false    217    223    4740            �           2606    25903 8   comentarios_posts comentarios_posts_fk_cnpj_empresa_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.comentarios_posts
    ADD CONSTRAINT comentarios_posts_fk_cnpj_empresa_fkey FOREIGN KEY (fk_cnpj_empresa) REFERENCES public.empresa(cnpj) ON DELETE CASCADE;
 b   ALTER TABLE ONLY public.comentarios_posts DROP CONSTRAINT comentarios_posts_fk_cnpj_empresa_fkey;
       public          postgres    false    217    231    4740            �           2606    25893 3   comentarios_posts comentarios_posts_fk_id_post_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.comentarios_posts
    ADD CONSTRAINT comentarios_posts_fk_id_post_fkey FOREIGN KEY (fk_id_post) REFERENCES public.post(id) ON DELETE CASCADE;
 ]   ALTER TABLE ONLY public.comentarios_posts DROP CONSTRAINT comentarios_posts_fk_id_post_fkey;
       public          postgres    false    4744    221    231            �           2606    25898 6   comentarios_posts comentarios_posts_fk_id_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.comentarios_posts
    ADD CONSTRAINT comentarios_posts_fk_id_usuario_fkey FOREIGN KEY (fk_id_usuario) REFERENCES public.usuario(id) ON DELETE CASCADE;
 `   ALTER TABLE ONLY public.comentarios_posts DROP CONSTRAINT comentarios_posts_fk_id_usuario_fkey;
       public          postgres    false    231    216    4738            �           2606    25866 -   curtidas_posts curtidas_posts_fk_id_post_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.curtidas_posts
    ADD CONSTRAINT curtidas_posts_fk_id_post_fkey FOREIGN KEY (fk_id_post) REFERENCES public.post(id) ON DELETE CASCADE;
 W   ALTER TABLE ONLY public.curtidas_posts DROP CONSTRAINT curtidas_posts_fk_id_post_fkey;
       public          postgres    false    221    4744    229            �           2606    25871 0   curtidas_posts curtidas_posts_fk_id_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.curtidas_posts
    ADD CONSTRAINT curtidas_posts_fk_id_usuario_fkey FOREIGN KEY (fk_id_usuario) REFERENCES public.usuario(id) ON DELETE CASCADE;
 Z   ALTER TABLE ONLY public.curtidas_posts DROP CONSTRAINT curtidas_posts_fk_id_usuario_fkey;
       public          postgres    false    4738    216    229            �           2606    25799 J   denuncia_administrador denuncia_administrador_fk_id_adm_administrador_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.denuncia_administrador
    ADD CONSTRAINT denuncia_administrador_fk_id_adm_administrador_fkey FOREIGN KEY (fk_id_adm_administrador) REFERENCES public.administrador(id);
 t   ALTER TABLE ONLY public.denuncia_administrador DROP CONSTRAINT denuncia_administrador_fk_id_adm_administrador_fkey;
       public          postgres    false    4742    227    219            �           2606    25794 A   denuncia_administrador denuncia_administrador_fk_id_denuncia_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.denuncia_administrador
    ADD CONSTRAINT denuncia_administrador_fk_id_denuncia_fkey FOREIGN KEY (fk_id_denuncia) REFERENCES public.denuncia(id);
 k   ALTER TABLE ONLY public.denuncia_administrador DROP CONSTRAINT denuncia_administrador_fk_id_denuncia_fkey;
       public          postgres    false    4748    227    225            �           2606    25782 &   denuncia denuncia_fk_cnpj_empresa_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.denuncia
    ADD CONSTRAINT denuncia_fk_cnpj_empresa_fkey FOREIGN KEY (fk_cnpj_empresa) REFERENCES public.empresa(cnpj);
 P   ALTER TABLE ONLY public.denuncia DROP CONSTRAINT denuncia_fk_cnpj_empresa_fkey;
       public          postgres    false    225    217    4740            �           2606    25777 $   denuncia denuncia_fk_id_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.denuncia
    ADD CONSTRAINT denuncia_fk_id_usuario_fkey FOREIGN KEY (fk_id_usuario) REFERENCES public.usuario(id);
 N   ALTER TABLE ONLY public.denuncia DROP CONSTRAINT denuncia_fk_id_usuario_fkey;
       public          postgres    false    4738    216    225            �           2606    25876    post post_fk_cnpj_empresa_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.post
    ADD CONSTRAINT post_fk_cnpj_empresa_fkey FOREIGN KEY (fk_cnpj_empresa) REFERENCES public.empresa(cnpj) ON DELETE CASCADE;
 H   ALTER TABLE ONLY public.post DROP CONSTRAINT post_fk_cnpj_empresa_fkey;
       public          postgres    false    217    4740    221            �           2606    25881    post post_fk_id_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.post
    ADD CONSTRAINT post_fk_id_usuario_fkey FOREIGN KEY (fk_id_usuario) REFERENCES public.usuario(id) ON DELETE CASCADE;
 F   ALTER TABLE ONLY public.post DROP CONSTRAINT post_fk_id_usuario_fkey;
       public          postgres    false    216    4738    221            2   y   x���v
Q���W((M��L�KL����,.)JL�/Rs�	uV�0�QPwM�IM�P2S��K�L��̊|�ԜԒ�����|��������\�"CKKK3sc3su�v##uMk...  �&      6   �   x�mM�
�0���s�B)8tr*Z�P����5}�Hlb�����3�=8����KE՜@�N
�p%�"\���kXm���I ���^��QOĐz�h�FE�r64��� �(��(��G��7�6H���-�=M�%�⭀���?~� �N,�"LQ��>�VmY����v@;�      >   �   x����
�@��>��i$ђN<b��5�d�u��!z��s�b�=@�if�o��ΏU�e/��֝�H��4g%8ee�װL}`ˁ��$����ƠSȮ7$\0����-K���&�(�x����+���n���7�����0X1�%5}�
5�8GJ�Vhp�j�@w(�~�e�R      <   �   x����
�0��<�mU�3M����!P*��Ul]
�Ŷ�oʉ�3d�������ʏ5��>�0����t�cꯗ�<��i�Ӿh�
Vv�AI9�MQ�w�}�^��M^@�4Ƣ�BX���7SFkD0�C��aB!�*�������qkG�jMP�(RZD� Z��@ZS4�����ш�Um�4cOP��      8   
   x���          :   
   x���          0   �   x����N�0��<����#_�XZ��P�Haw#~)i,;�ux��u

�z��z�Wo��y����	�î��p�.Z��~|�t�����b�����#��8�6�������}1��؅t�!�P�H�Ӛ2^����j���Y}]��,|�7�����Bю�j0��S��J�����sc���1)�M//�L`'�p�>~�3D�P����LQ*-X���/��w;�3���t�ɲ�!q�      4   �  x��WM��F��+Z\��j?`�DQ�"�@��KTc�xke�M�=Zq�5���,H�6'��'�%y��;�H|�0����z��U���'�~}��?|��uâ�b��w��>xv����홻v��.�B�Z*߸һZ������O�Ep�[74��|_ZJ܋�����z|���6]��z����o�׶���GM[�^-���R���m6�$�YO���8nM�����P��e~����i�0�Xx�+�?��
�z�`�B�z��lX�W]	�]m�*\��NpKy�Ӕ{���A]'Q���ux4Su?�-���-��X[) �b|�*�����`����\h��ʡ����� ��7�@���? ad�����B����z<���.�"���9�Ɠ�������x�L)�I��1�/k��),"qH���4zR�0��B�$�J�Ȃ���l�o�3w���=|�������Ko}K�X1w�(mBrK��!��qO,�~g8 1��sb8E�k�>KKlÓ�m�C�y7�%;�&ٖ�r��%R��9�YIK��.f�c��¥0��d2�vӮ��W��o��8�t��	��m��L��Iɓ�����JUP��&`�(�`%5#��)1�
l �(PA�V� �4�
˺ �|�Y	{��m���3s��Y���H�g6�br��L�xt��h�(�oM(n5��ũ-j�S�~������e�Hg 5�k6*� J|��_��!*�b<.S��`hxbH"d�!_��q-����pቶB֤���A��]�i_5�@¥�g�(��YL�Qn�~,Vfo*:CT	Im&�����5�F\kE�.���!.ȵ[zHP���k&fCMY�2����Z��gL�$�lT�
�a'gI�޻u������������}�X�a�/��@��<Ks$hN��gP��g���յ��#J�\��x�X߯|���%$�D]G�l�{�2�G��i��@e��*���m
��	�V����/�G��,��0�*�� ��4��^�\���b�74;���Z
���E���M�S����M�1p��LKg�*�ؚ��G�1�"����x�m�ՏoH���Ϻ�-�����m.|:��}\�H;%٤p����Yd�<�xH9�HV��!�o�0{�7��v�o�+�9�o�2���h��0oX����vþ@��e�vUV��6�-COj�{�_]I�)��yu�������H���q�-�@iX��_Q�Q��ɑ%�EyQ�I�Ɣ	���I��iG?+_$�Y˭d#��A�w�<���F�K�,y�6)C��(M�5s��J+�l꨹L�u��P*ύ�����y�T�p x�'UYM�@bh��q;-z�_�U�;��$�'m�YDrfՆ~βF̰�uE,7��&�\���N�pȦ����Y?�����j"�_JnP��B�t��S�o��j��"_j3�Y��d�!�o���i
T4�R�,�R�h�O3�}����d�n8�q<[0�3!��AV=�J�g�����J˖�t�o�=@<��S]?XV�|�p(݌�B� a����1q��yb �B��v�Y6i��(yH�7��#^�ֽ5M���pM��d_���=n�5���2>�RϹ��ox�U(c5�
��#+K�0���}����w��^��ƾ�      /   G  x����j�@��y����X�����47u�B/fd�eI��V9�ur(}��Xg%َ)455Xh�ߎ��ffz���rϦ��sV�I����iA�}����_��$ۀ��ʨfD$���Gc��H�q�������󭐗eJ�g�J'і���	Y���*�P��ϗgŐU`Z�[��������:�Q�)�c�Y�I�ԣ�gӷ+
8��X�g�ҕ�+�PQ�2�oæ�ˎ�ٮzu�0�����K���庭R��UvH"]!N,��J�a
���ᘓ^�
)#/�l�=\�-}�wd�����L���fR�lZB�Lr�Y#D��09\:^�7�����ѧ� ��Q���Z]C�ј�P�7��n�d��鈳&�ÏKY��`��Ò%m�;QPd�˯��h�t!I|B�X���$G�<��e����pd��&����
�CE�ɏ6�P�+���>�:Ͷ�����C��O� ʓ5��w�����n�J�F��wm�}g=�s�L�}�SԆ�axʫ؝VOy��:��`�߁�R��t����b��������M�{�VFI�^�����k�gg�z�l     