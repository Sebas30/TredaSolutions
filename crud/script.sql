CREATE DATABASE prueba_sql;

CREATE TABLE productos (
  id int(6) NOT NULL AUTO_INCREMENT,
  fecha date  NOT null,
  fecha_tienda VARCHAR(10) GENERATED ALWAYS AS (DATE_FORMAT(fecha, '%d-%m-%Y')) stored,
  imagen varchar(255)  NOT NULL,
  nombreT varchar(255)  NOT NULL,
  nombreP varchar(255)  NOT NULL,
  SKU varchar(255)  NOT NULL UNIQUE,
  DescrP varchar(255)  NOT NULL,
  valor  varchar(255) NOT NULL,
  estado varchar(4) NOT null default 'on',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
