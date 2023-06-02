create database rocketproducts;
use rocketproducts;


CREATE TABLE usuario(
id int unsigned primary key AUTO_INCREMENT,
nombre VARCHAR(50),
apellidos VARCHAR(50),
telefono VARCHAR(9),
email VARCHAR(50),
contrasena VARCHAR(255),
direccion VARCHAR(150),
ciudad VARCHAR(50),
pais VARCHAR(50),
esadmin TINYINT(1)
);

CREATE TABLE pedido(
id int UNSIGNED  primary key AUTO_INCREMENT,
id_usuario_cliente int unsigned,
foreign key(id_usuario_cliente) references usuario(id) ON DELETE CASCADE,
reclamacion VARCHAR(500),
fecha DATETIME
);

CREATE TABLE producto(
id int UNSIGNED  primary key AUTO_INCREMENT,
id_empresa int unsigned,
foreign key(id_empresa) references usuario(id) ON DELETE CASCADE,
nombre VARCHAR(50),
descripcion VARCHAR(500),
precio int unsigned,
stock int unsigned,
imagen VARCHAR(200)
);

CREATE TABLE producto_pedido(
id_producto int unsigned,
foreign key(id_producto) references producto(id) ON DELETE CASCADE,
id_pedido int unsigned,
foreign key(id_pedido) references pedido(id) ON DELETE CASCADE,
cantidad INT unsigned
);

CREATE TABLE producto_usuario(
id_producto int unsigned,
foreign key(id_producto) references producto(id) ON DELETE CASCADE,
id_usuario int unsigned,
foreign key(id_usuario) references usuario(id) ON DELETE CASCADE,
comentario VARCHAR(500)
);


insert into usuario(nombre,apellidos,telefono,email,contrasena,direccion,ciudad,pais,esadmin) VALUES('jorge','lp',987456123,'aimai@gmail.com','$2y$10$hEmHjdhGWdh4Ld.kvdh0eOFtyQNi9KSFJkIAOVCriSc.oZRO.4B4G','Calle Uno','Zaragoza','España',1);
insert into usuario(nombre,apellidos,telefono,email,contrasena,direccion,ciudad,pais,esadmin) VALUES('empresa','empresa',987456123,'empresa@gmail.com','$2y$10$hEmHjdhGWdh4Ld.kvdh0eOFtyQNi9KSFJkIAOVCriSc.oZRO.4B4G','Calle tres','Zaragoza','España',1);
insert into usuario(nombre,apellidos,telefono,email,contrasena,direccion,ciudad,pais,esadmin) VALUES('usuario','usuario',987456123,'usuario@gmail.com','$2y$10$hEmHjdhGWdh4Ld.kvdh0eOFtyQNi9KSFJkIAOVCriSc.oZRO.4B4G','Calle dos','Zaragoza','España',0);
INSERT INTO producto(id_empresa,nombre,descripcion,precio,stock,imagen) VALUES (1,'Mesa de madera','Mesa de madera, mesa de estudio, 100 x 50 x 75 cm, fácil de montar.',69.99,100,'mesa_madera.jpg');
INSERT INTO producto(id_empresa,nombre,descripcion,precio,stock,imagen) VALUES (1,'Silla gaming','Silla gaming profesional que ayuda a la salud de tu columna ya que el respaldo ergonómico se adapta perfectamentea sus curvas naturales para darte el máximo confort durante todo el día y está fabricado en un relleno de calidad superior.',150,30,'silla_gaming.jpg');
INSERT INTO producto(id_empresa,nombre,descripcion,precio,stock,imagen) VALUES (2,'Altavoz inalámbrico','Escucha tu música favorita con sonido de calidad, el altavoz con un sonido pleno y sofisticado es adecuado para disfrutar del sonido con mayor claridad.',35,200,'altavoz_portatil.jpg');
INSERT INTO producto_usuario(id_producto,id_usuario,comentario) VALUES (1,3,'Es de muy buena calidad, me encanta');
INSERT INTO producto_usuario(id_producto,id_usuario,comentario) VALUES (1,3,'Es muy estable, me encanta');
INSERT INTO producto_usuario(id_producto,id_usuario,comentario) VALUES (1,3,'No lo recomiendo');
