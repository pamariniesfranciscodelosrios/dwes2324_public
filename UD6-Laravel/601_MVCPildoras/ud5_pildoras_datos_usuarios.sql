
CREATE TABLE ud5_pildoras_datos_usuarios
(id int not null AUTO_INCREMENT primary key,
nombre varchar(20) ,
apellido varchar(25),
direccion varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


insert into ud5_pildoras_datos_usuarios (nombre,apellido, direccion) values ('Antonio','Gomez', 'Ancha');
insert into ud5_pildoras_datos_usuarios (nombre,apellido, direccion) values ('Jose','Lopez', 'Vergara');