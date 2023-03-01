create database prueba_sql;

CREATE TABLE clientes (
  id int(6) NOT NULL AUTO_INCREMENT,
  cedula varchar(255)  NOT NULL,
  primer_nombre varchar(255)  NOT NULL,
  primer_apellido varchar(255)  NOT NULL,
  dias_mora int(10)  NOT NULL,
  id_ciudad int(10)  NOT NULL,
  PRIMARY KEY (id),
  KEY id_ciudad (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO clientes
(cedula, primer_nombre, primer_apellido, dias_mora, id_ciudad)
VALUES('1000756277', 'sebastian', 'alvarez', '10', '1'),
('12345678', 'didier', 'gomez', '15', '2'),
('12345674', 'elena', 'rodriguez', '25', '3'),
('12345698', 'roberto', 'camacho', '28', '4'),
('8217890', 'jorge', 'castro', '30', '5'),
('8216373', 'juan', 'suarez', '90', '6');

CREATE TABLE ciudad (
  id int(6) NOT NULL AUTO_INCREMENT,
  nombre varchar(255)  NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO ciudad
(nombre)
VALUES('Medellin'),
('Manizales'),
('Cali'),
('Bogota'),
('San andres'),
('Cartagena');



select
	cedula as cedula,
	concat(primer_nombre, ' ', primer_apellido) as nombre,
	dias_mora as diasEnMora,
	if(dias_mora <= 20 , "Riesgo bajo",
		if(dias_mora <= 35, "Riesgo medio",
			if(dias_mora > 35, "Riesgo alto", "")
		)
	) as riesgo,
	ciudad.nombre as ciudad
from
	clientes
join Ciudad on
	clientes.id_ciudad = ciudad.id order by dias_mora;