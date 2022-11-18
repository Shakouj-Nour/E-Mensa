create database IF NOT EXISTS emensawerbeseite
    character set UTF8mb4 COLLATE utf8mb4_unicode_ci;
use emensawerbeseite;


CREATE TABLE IF NOT EXISTS gerichten(
    g_id int8 PRIMARY KEY,
    g_name varchar(80) NOT NULL ,
    g_beschreibung varchar(800) NOT NULL ,
    g_erfasst_am date NOT NULL ,
    g_vegtarisch boolean NOT NULL ,
    g_vegan boolean NOT NULL ,
    g_preis_intern double NOT NULL ,
    g_preis_extern double NOT NULL
);

CREATE TABLE IF NOT EXISTS Allergen(
    a_code char (4) PRIMARY KEY ,
    a_name varchar(300) NOT NULL ,
    a_typ varchar (20) NOT NULL
);

CREATE TABLE IF NOT EXISTS Kategorie(
    k_id int8 PRIMARY KEY ,
    k_name varchar(80) NOT NULL ,
    eltern_id int8 ,
    a_bildname VARCHAR(200)
);
CREATE TABLE IF NOT EXISTS gericht_hat_allergen(
    a_code char(4),
    g_id int8 NOT NULL
);
CREATE TABLE IF NOT EXISTS gericht_hat_kategorie(
    g_id int8 NOT NULL ,
    k_id int8 NOT NULL
);