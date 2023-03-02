CREATE DATABASE prueba_sql;

CREATE TABLE persona (
  cc varchar(20) NOT NULL,
  nombre varchar(255)  NOT NULL,
  apellido varchar(255)  NOT NULL,
  PRIMARY KEY (cc)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO persona
(cc,nombre, apellido)
VALUES('12345678','Sebastian', 'Alvarez'),
('98765434','Esteban', 'Camacho'),
('87654783','Estefania', 'Rodriguez'),
('65437289','Laura', 'Lopez');


CREATE TABLE estudios (
  id int(20) NOT NULL AUTO_INCREMENT,
  institucion varchar(255)  NOT NULL,
  fecha date NOT NULL,
  Fkpersona varchar(20) NOT NULL,
  PRIMARY KEY (id),
  KEY Fkpersona(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO estudios
(institucion, fecha, Fkpersona)
VALUES('I.E Alfonso Mora Naranjo', '2019-11-18','12345678'),
('SENA','2021-02-02','98765434'),
('EAFIT', '2022-12-04','87654783'),
('UdeA','2022-12-20','65437289');