database prueba_sql;

CREATE TABLE productos (
  id int(6) NOT NULL AUTO_INCREMENT,
  imagen varchar(255)  NOT NULL,
  nombreT varchar(255)  NOT NULL,
  nombreP varchar(255)  NOT NULL,
  SKU varchar(255)  NOT NULL,
  DescrP varchar(255)  NOT NULL,
  valor float(10,5)  NOT NULL,
  estado varchar(4) NOT null default 'on',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tienda (
  id int(6) NOT NULL AUTO_INCREMENT,
  nombre varchar(255)  NOT NULL,
  fecha date  NOT null,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;