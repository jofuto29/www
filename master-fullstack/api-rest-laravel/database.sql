CREATE DATABASE IF NOT EXISTS api_rest_laravel;--creamos la base de datos si no existe con nombre api_rest_ful y le indicamos que la use
USE api_rest_laravel;

--ENGINE=InnoDb; --> motor de almacenamienot para MySQL con las capacidades de commit, rollback y recuperacion de fallos
--primera tabla siguiendo el diagrama, tabla usuarios
-- con constraint ponemos restricciones, en este caso hemos creado la clave primaria con el campo id, campo irrepetible para cada registro de la tabala

CREATE TABLE users(
    id                  int(255) auto_increment NOT NULL,
    name                varchar(255) NOT NULL,
    surname             varchar(100),
    role                varchar(20),
    email               varchar(255) NOT NULL,
    password            varchar(255) NOT NULL,
    description         text,
    image               varchar(255),
    created_at          datetime DEFAULT NULL,
    updated_at          datetime DEFAULT NULL,
    remember_token      varchar(255),
    CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb; 


CREATE TABLE categories(
    id                  int(255) auto_increment NOT NULL,
    name                varchar(100) NOT NULL,
    created_at          datetime DEFAULT NULL,
    updated_at          datetime DEFAULT NULL,
    CONSTRAINT pk_categories PRIMARY KEY(id)
)ENGINE=InnoDb; 


CREATE TABLE posts(
    id                  int(255) auto_increment NOT NULL,
    user_id             int(255) NOT NULL,
    category_id         int(255) NOT NULL,
    title               varchar(255) NOT NULL,
    content             text NOT NULL,
    image               varchar(255),
    created_at          datetime DEFAULT NULL,
    updated_at          datetime DEFAULT NULL,
    CONSTRAINT pk_posts PRIMARY KEY(id),
    CONSTRAINT fk_post_user FOREIGN KEY(user_id) REFERENCES users(id),--clave ajena relacionada con el campo user_id y el campo de la tabla users id
    CONSTRAINT pk_post_category PRIMARY KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb; 