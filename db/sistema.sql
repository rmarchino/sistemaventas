create database sistema_ventas;

/*
Author:  Anderson Fuentes
Created: 7 mar. 2022
*/

use sistema_ventas;

create table tbl_usuarios(

	id_usuario int NOT NULL AUTO_INCREMENT,
	nomb varchar(50),
	ape varchar(50),
	username varchar(70),
	correo varchar(50),
	pass varchar(50),
	rol varchar(50),
	PRIMARY KEY(id_usuario)

);
create table tbl_ubigeo (

	id_ubigeo int NOT NULL AUTO_INCREMENT,
	distrito varchar(30),
    	provincia varchar(30),
	dpto varchar(30),
    	PRIMARY KEY(id_ubigeo)
);

create table tbl_tipodocumento (

	id_tipodocumento int NOT NULL AUTO_INCREMENT,
	descripcion_tipodoc varchar(30),
	PRIMARY KEY(id_tipodocumento)
);

create table tbl_clientes (

    id_cli int NOT NULL,
    nom_cli varchar(30),
    ape_cli varchar(30),
    id_tipodocumento int,
    numdocumento_cli varchar(20),
    id_ubigeo int,
    tel_cli varchar(10),
    dir_cli varchar(80),
    imagen varchar(250),
    PRIMARY KEY(id_cli),
    CONSTRAINT fk_clientes_cliente FOREIGN KEY (id_cli) REFERENCES tbl_usuarios(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_clientes_tipodocumento FOREIGN KEY (id_tipodocumento) REFERENCES tbl_tipodocumento(id_tipodocumento) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_clientes_ubigeo FOREIGN KEY (id_ubigeo) REFERENCES tbl_ubigeo(id_ubigeo) ON UPDATE CASCADE ON DELETE CASCADE
);

create table tbl_funcion (

    id_funcion int NOT NULL AUTO_INCREMENT,
    nombre_funcion varchar(30),
    PRIMARY KEY(id_funcion)
);

create table tbl_empleado (

    id_empleado int NOT NULL,
    id_funcion int,
    id_ubigeo int,
    id_tipodoc int,
    nom_empleado varchar(40),
    ape_empleado varchar(40),
    num_doc varchar(50),
    tel_empleado varchar(10),
    fenaci date,
    direccion varchar(250),
    imagen varchar(250),
    PRIMARY KEY(id_empleado),
    CONSTRAINT fk_empleado_empleado FOREIGN KEY(id_empleado) REFERENCES tbl_usuarios(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_empleado_funcion FOREIGN KEY(id_funcion) REFERENCES tbl_funcion(id_funcion) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_empleado_ubigeo FOREIGN KEY(id_ubigeo) REFERENCES tbl_ubigeo(id_ubigeo) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_empleado_tipodoc FOREIGN KEY(id_tipodoc) REFERENCES tbl_tipodocumento(id_tipodocumento) ON UPDATE CASCADE ON DELETE CASCADE
);

create table tbl_pago (

    id_pago int NOT NULL AUTO_INCREMENT,
    detalle_pago varchar(30),
    PRIMARY KEY(id_pago)
);

create table tbl_docventa (

    id_doc int NOT NULL AUTO_INCREMENT,
    documento varchar(30),
    PRIMARY KEY(id_doc)

);
create table tbl_ventas (

    id_venta int AUTO_INCREMENT,
    id_doc int,
    id_ubigeo int,
    numdocumento varchar(30),
    numempresa varchar(20),
    id_cliente int,
    id_pago int,
    id_empleado_atiende int,
    id_empleado_entrega int,
    fecha_pedido datetime,
    fecha_entrega date,
    status varchar(30),
    status_pago varchar(40),
    direccion_entrega varchar(250),
    nota text,
    transaction_sale json,
    PRIMARY KEY(id_venta),
    CONSTRAINT fk_ventas_doc FOREIGN KEY(id_doc) REFERENCES tbl_docventa(id_doc) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_ventas_ubigeo FOREIGN KEY (id_ubigeo) REFERENCES tbl_ubigeo(id_ubigeo) ON UPDATE CASCADE,
    CONSTRAINT fk_ventas_cliente FOREIGN KEY(id_cliente) REFERENCES tbl_clientes(id_cli) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_ventas_pago FOREIGN KEY(id_pago) REFERENCES tbl_pago(id_pago) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_ventas_empleadoatiende FOREIGN KEY(id_empleado_atiende) REFERENCES tbl_empleado(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_ventas_empleadoentrega FOREIGN KEY(id_empleado_entrega) REFERENCES tbl_empleado(id_empleado) ON UPDATE CASCADE ON DELETE CASCADE
);

create table tbl_categoria (
	
    id_categ int NOT NULL AUTO_INCREMENT,
    categoria varchar(30),
	PRIMARY KEY(id_categ)
);

create table tbl_marca (
	
    id_marca int NOT NULL AUTO_INCREMENT,
    marca varchar(30),
	PRIMARY KEY (id_marca)
);

create table tbl_producto(
	
    id_producto int NOT NULL AUTO_INCREMENT,
    nom_prod varchar(50),
    precio_prod decimal(10,2),
    id_categ int,
    id_marca int,
    stock int(10),
    imagen varchar(250),
    descripcion varchar(90),
    tag varchar(60),
    PRIMARY KEY(id_producto),
    CONSTRAINT fk_producto_categ FOREIGN KEY(id_categ) REFERENCES tbl_categoria(id_categ) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_producto_marca FOREIGN KEY(id_marca) REFERENCES tbl_marca(id_marca) ON UPDATE CASCADE ON DELETE CASCADE
);

create table tbl_detalleventa (

    id_detalle int NOT NULL AUTO_INCREMENT,
    id_venta int,
    id_producto int,
    cantidad int(10),
    precio decimal (10,2),
    fecha_venta date,
    PRIMARY KEY(id_detalle),
    CONSTRAINT fk_detalleventa_producto FOREIGN KEY(id_producto) REFERENCES tbl_producto(id_producto) ON UPDATE CASCADE,
    CONSTRAINT fk_detalleventa_venta FOREIGN KEY(id_venta) REFERENCES tbl_ventas(id_venta) ON UPDATE CASCADE
);

INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("ANCON","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("ATE","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("BARRANCO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("CARABAYLLO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("CHACLACAYO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("CHORRILLOS","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("CIENEGUILLA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("COMAS","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("EL AGUSTINO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("INDEPEND$$ENCIA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("JESUS MARÍA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("LA MOLINA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("LA VICTORIA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("LIMA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("LINCE","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("LOS OLIVOS","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("LURIGANCHO-CHOSICA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("LURÍN","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("MAGDALENA DEL MAR","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("MIRAFLORES","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("PACHACÁMAC","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("PUCUSANA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("PUEBLO LIBRE","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("PUENTE PIEDRA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("PUNTA HERMOSA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("PUNTA NEGRA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("RÍMAC","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN BARTOLO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN BORJA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN ISIDRO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN JUAN DE LURIGANCHO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN JUAN DE MIRAFLORES","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN LUIS","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN MARTIN DE PORRES","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SAN MIGUEL","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SANTA ANITA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SANTA MARÍA DEL MAR","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SANTA ROSA","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SANTIAGO DE SURCO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("SURQUILLO","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("VILLA EL SALVADOR","Lima","Lima");
INSERT INTO tbl_ubigeo (distrito, provincia, dpto) VALUES ("VILLA MARIA DEL TRIUNFO","Lima","Lima");

INSERT INTO tbl_tipodocumento (descripcion_tipodoc) VALUES ("RUC");
INSERT INTO tbl_tipodocumento (descripcion_tipodoc) VALUES ("DNI");
INSERT INTO tbl_tipodocumento (descripcion_tipodoc) VALUES ("Carne Universitario");


INSERT INTO tbl_usuarios (nomb, ape, username, correo, pass, rol) VALUES ("Victor","Enciso","victorenciso","victorenciso@gmail.com",MD5("12345"),"admin");

INSERT INTO tbl_funcion (nombre_funcion) VALUES ("repartidor");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("vendedor");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("administrador");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("contador");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("jefe");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("director");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("gerente");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("asistente");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("mantenedor");
INSERT INTO tbl_funcion (nombre_funcion) VALUES ("publicista");

INSERT INTO tbl_empleado (id_empleado, id_funcion, id_ubigeo, id_tipodoc, nom_empleado, ape_empleado, num_doc, tel_empleado, fenaci, direccion, imagen) VALUES (1,5,25,2,"Diego", "Enciso", "76511028","956393421","2002-01-21","Av. Principal 111","imagenes/empleados/happy.jpg");

INSERT INTO tbl_pago (detalle_pago) VALUES ("Efectivo");
INSERT INTO tbl_pago (detalle_pago) VALUES ("Tarjeta");
INSERT INTO tbl_pago (detalle_pago) VALUES ("Yape");
INSERT INTO tbl_pago (detalle_pago) VALUES ("Paypal");

INSERT INTO tbl_docventa (documento) VALUES ("Boleta");
INSERT INTO tbl_docventa (documento) VALUES ("Factura");
INSERT INTO tbl_docventa (documento) VALUES ("Recibo");

INSERT INTO tbl_categoria (categoria) VALUES ("frutas");
INSERT INTO tbl_categoria (categoria) VALUES ("verduras");
INSERT INTO tbl_categoria (categoria) VALUES ("abarrotes");
INSERT INTO tbl_categoria (categoria) VALUES ("dulces");
INSERT INTO tbl_categoria (categoria) VALUES ("lacteos");
INSERT INTO tbl_categoria (categoria) VALUES ("menestras");
INSERT INTO tbl_categoria (categoria) VALUES ("embutidos");
INSERT INTO tbl_categoria (categoria) VALUES ("carnes");
INSERT INTO tbl_categoria (categoria) VALUES ("cereales");
INSERT INTO tbl_categoria (categoria) VALUES ("pastas");

INSERT INTO tbl_marca (marca) VALUES ("Peruana");
INSERT INTO tbl_marca (marca) VALUES ("Extranjera");
INSERT INTO tbl_marca (marca) VALUES ("Cocinero");
INSERT INTO tbl_marca (marca) VALUES ("Primor");
INSERT INTO tbl_marca (marca) VALUES ("Costeño");
INSERT INTO tbl_marca (marca) VALUES ("paisana");
INSERT INTO tbl_marca (marca) VALUES ("Florida");
INSERT INTO tbl_marca (marca) VALUES ("Cartavio");
INSERT INTO tbl_marca (marca) VALUES ("Dulfina");
INSERT INTO tbl_marca (marca) VALUES ("Altomayo");
INSERT INTO tbl_marca (marca) VALUES ("Aconcagua");
INSERT INTO tbl_marca (marca) VALUES ("Alacena");
INSERT INTO tbl_marca (marca) VALUES ("Gloria");
INSERT INTO tbl_marca (marca) VALUES ("Mccollins");
INSERT INTO tbl_marca (marca) VALUES ("Lays");
INSERT INTO tbl_marca (marca) VALUES ("Emsal");
INSERT INTO tbl_marca (marca) VALUES ("Angel");
INSERT INTO tbl_marca (marca) VALUES ("Costa");
INSERT INTO tbl_marca (marca) VALUES ("Arcor");
INSERT INTO tbl_marca (marca) VALUES ("Bucky");
INSERT INTO tbl_marca (marca) VALUES ("Nestle");
INSERT INTO tbl_marca (marca) VALUES ("Field");
INSERT INTO tbl_marca (marca) VALUES ("San Jorge");
INSERT INTO tbl_marca (marca) VALUES ("Winters");
INSERT INTO tbl_marca (marca) VALUES ("Victoria");
INSERT INTO tbl_marca (marca) VALUES ("Karinto");
INSERT INTO tbl_marca (marca) VALUES ("Galletas GN");
INSERT INTO tbl_marca (marca) VALUES ("Sayon");
INSERT INTO tbl_marca (marca) VALUES ("Nabisco");
INSERT INTO tbl_marca (marca) VALUES ("Inka Chips");
INSERT INTO tbl_marca (marca) VALUES ("San Fernando");
INSERT INTO tbl_marca (marca) VALUES ("Donofrio");
INSERT INTO tbl_marca (marca) VALUES ("Nan");
INSERT INTO tbl_marca (marca) VALUES ("Anchor");
INSERT INTO tbl_marca (marca) VALUES ("Cusco");
INSERT INTO tbl_marca (marca) VALUES ("Tottus");
INSERT INTO tbl_marca (marca) VALUES ("Nutrisa");
INSERT INTO tbl_marca (marca) VALUES ("Frutisa");


INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Mora",6,1,1,500,"imagenes/productos/Mora.png","Mora, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pina",2,1,1,500,"imagenes/productos/Pina.png","Piña, precio por unidad.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Melocoton",13,1,1,500,"imagenes/productos/Melocoton.png","Melocoton, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Ciruela",5,1,1,500,"imagenes/productos/Ciruela.png","Ciruela, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Membrillo",11,1,1,500,"imagenes/productos/Membrillo.png","Membrillo, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Limon",7,1,1,500,"imagenes/productos/Limon.png","Limon, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("ALBARICOQUE",18,1,1,500,"imagenes/productos/Albaricoque.png","Albaricoque, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Grosella",92,1,1,500,"imagenes/productos/Grosella.png","Grosella, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Naranja",7,1,1,500,"imagenes/productos/Naranja.png","Naranja, precio por kg.","Nuevo producto");  
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Lima",88,1,1,500,"imagenes/productos/Lima.png","Lima, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Higo",23,1,1,500,"imagenes/productos/Higo.png","Higo, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Breva",32,1,1,500,"imagenes/productos/Breva.png","Breva, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Granada",314,1,1,500,"imagenes/productos/Granada.png","Granada, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Arandano",50,1,1,500,"imagenes/productos/Arandano.png","Arandano, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Mandarina",3,1,1,500,"imagenes/productos/Mandarina.png","Mandarina, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Fresa",16,1,1,500,"imagenes/productos/Fresa.png","Fresa, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pera",60,1,1,500,"imagenes/productos/Pera.png","Pera, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Melon",53,1,1,500,"imagenes/productos/Melon.png","Melon, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Frambuesa",30,1,1,500,"imagenes/productos/Frambuesa.png","Frambuesa, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Manzana",5,1,1,500,"imagenes/productos/Manzana.png","Manzana selecta, precio por kg.","Nuevo producto");


INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Rotelle",5,10,1,100,"imagenes/productos/Rotelle.png","Rotelle, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Caserece",8,10,2,50,"imagenes/productos/Caserece.png","Caserece, precio por unidad.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Trofie",9,10,1,90,"imagenes/productos/Trofie.png","Trofie, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pizzocheri",7,10,1,800,"imagenes/productos/Pizzocheri.png","Pizzocheri, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Tortellini",6,10,1,900,"imagenes/productos/Tortellini.png","Tortellini, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cavatappi",6,10,1,600,"imagenes/productos/Cavatappi.png","Cavatappi, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Fregola",7,10,1,400,"imagenes/productos/Fregola.png","Fregola, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Penne",8,10,1,300,"imagenes/productos/Penne.png","Penne, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Genochetti_sardi",4,10,2,560,"imagenes/productos/Genochetti_sardi.png","Genochetti_sardi, precio por unidad.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Scialatelli",6,10,1,100,"imagenes/productos/Scialatelli.png","Scialatelli, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Fusilli",9,10,1,100,"imagenes/productos/Fusilli.png","Fusilli, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Tortiglioni",20,10,1,800,"imagenes/productos/Tortiglioni.png","Tortiglioni, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Quadrettini",25,10,1,900,"imagenes/productos/Quadrettini.png","Quadretteni, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Torchietti",66,10,1,600,"imagenes/productos/Torchietti.png","Torchietti, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cabello_de_angel",77,10,1,100,"imagenes/productos/Cabello_de_angel.png","Cabello_de_angel, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Trenette",69,10,1,200,"imagenes/productos/Trenette.png","Trenette, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Spaghetti",49,10,1,500,"imagenes/productos/Spaghetti.png","Spaghetti, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Lumache",36,10,1,600,"imagenes/productos/Lumache.png","Lumache, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Bucatini",68,10,1,900,"imagenes/productos/Bucatini.png","Bucatini, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Tagliatelli",65,10,1,470,"imagenes/productos/Tagliatelli.png","Tagliatelli, precio por kg.","Nuevo producto");


INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Apio",2.5,2,1,100,"imagenes/productos/apio.png","Apio, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Arverjas",4,2,1,100,"imagenes/productos/arverjas.png","Arverja en vaina, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cebolla",2,2,1,100,"imagenes/productos/cebolla.png","Cebolla morada, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Choclo",1,2,1,100,"imagenes/productos/choclo.png","Choclo, precio por unit.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Esparragos",6,2,1,100,"imagenes/productos/esparragos.png","Esparragos, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Lechuga",2,2,1,100,"imagenes/productos/lechuga.png","Lechuga Americana, precio unit.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Nabo",5,2,1,100,"imagenes/productos/nabo.png","Nabo, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Palta",6,2,1,100,"imagenes/productos/palta.png","Palta fuerte, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Papa",1.5,2,1,220,"imagenes/productos/papa.png","Papa yungay, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pepino",1.5,2,1,100,"imagenes/productos/pepino.png","Pepino organico, precio por unit.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Rabano",3,2,1,100,"imagenes/productos/rabano.png","Rabano morado, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Tomate",2.5,2,1,120,"imagenes/productos/tomate.png","Tomate, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Vetarraga",2.3,2,1,120,"imagenes/productos/vetarraga.png","Vetarraga, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Zanahoria",1.4,2,1,120,"imagenes/productos/zanahoria.png","Zanahoria, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Zapallo",1,2,1,120,"imagenes/productos/zapallo.png","Zapallo, precio por kg.","Nuevo producto");

INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Angel",8,9,17,500,"imagenes/productos/Cereal_angel.png","Hojuelas de maiz con sabor chocolate cont. neto 1 kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Bar",6,9,18,250,"imagenes/productos/Cereal_bar.png","Cereal en barra con nutrientes , paquete por 6 unidades.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Chocapic",7,9,21,50,"imagenes/productos/Cereal_chocapic.png","Hojuelas con sabor chocolate, cont net 1 kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Kellogs",9,9,2,100,"imagenes/productos/Cereal_kellogs.png","Hojuelas de 100 % maiz, cont neto 1 kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Milo",5,9,21,200,"imagenes/productos/Cereal_milo.png","Hojuelas sabor chocolate, cont neto  1 kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Nesquik",5,9,21,230,"imagenes/productos/Cereal_nesquik.png","Hojuelas de maiz con sabor vainilla, cont neto 1kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Trix",10,9,21,100,"imagenes/productos/Cereal_trix.png","Cereal con hojuela de colores, cont neto 1 kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cereal Zucaritas",7,9,2,140,"imagenes/productos/Cereal_Zucaritas.png","Hojeulas de maiz azucaradas, cont neto 1 kg.","Nuevo producto");

INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Aceite Cocinero",6,3,3,200,"imagenes/productos/Aceite_cocinero.png"," Aceite Vegetal Premium   PRIMOR.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Aceite Primor",7,3,4,200,"imagenes/productos/Aceite_primor.png","Aceite Cocinero Botella 1 Litro.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Arroz Costeno",5,3,5,500,"imagenes/productos/Arroz_costeno.png","Arroz Extra COSTEÑO Bolsa 750g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Arroz Paisana",5,3,6,500,"imagenes/productos/Arroz_paisana.png","Arroz Superior PAISANA Bolsa 1Kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Atun Florida",4,3,7,400,"imagenes/productos/Atun_florida.png","Filete de Atún FLORIDA en Aceite de Girasol Lata 170g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Azucar Cartavio",3,3,8,400,"imagenes/productos/Azucar_cartavio.png","Azúcar Rubia CARTAVIO Bolsa 5Kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Azucar Dulfina",3,3,9,400,"imagenes/productos/Azucar_dulfina.png","Azúcar Rubia Dulfina Bolsa 1 kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cafe Altomayo",5,3,10,500,"imagenes/productos/Cafe_altomayo.png","Café Instantáneo ALTOMAYO Gourmet Doypack 45g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Durazno Aconcagua",8,3,11,200,"imagenes/productos/Durazno_aconcagua.png","Duraznos en Mitades ACONCAGUA Lata 822g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Ketchup Alacena",4,3,12,300,"imagenes/productos/Ketchup_alacena.png","Ketchup ALACENA Doypack 380g","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Leche Gloria",3,3,13,400,"imagenes/productos/Leche_gloria.png","Leche Evaporada GLORIA  Lata 400g","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Manzanilla Maccolins",3,3,14,400,"imagenes/productos/Manzanilla_maccolins.png","Manzanilla MC COLIN'S Caja 25un.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Mayonesa Alacena",4,3,12,400,"imagenes/productos/Mayonesa_alacena.png","Mayonesa ALACENA Doypack 950g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Mermelada Gloria",5,3,13,300,"imagenes/productos/Mermelada_gloria.png","Mermelada de Fresa   GLORIA.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Papas Lays",1,3,15,600,"imagenes/productos/Papas_lays.png","FRITO LAY Papas Fritas Lay's.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Sal Emsal",1,3,16,400,"imagenes/productos/Sal_emsal.png","Sal Marina EMSAL Mesa Bolsa 1Kg.","Nuevo producto");

INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Alfajor Bonobon",3,4,19,300,"imagenes/productos/Alfajor_bonobon.png","Alfajor bon o bon.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Chifles Bucky",2,4,20,300,"imagenes/productos/Chifles_bucky.png","Chifles Salados   BUCKY SNACKS.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Chocolate Triangulo",2,4,21,400,"imagenes/productos/Chocolate_triangulo.png","Chocolate TRIANGULO De leche Bolsa 30Gr.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cuacua",2,4,22,500,"imagenes/productos/Cuacua.png","Wafer Cua Cua FIELD Paquete.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Doritos Lays",1,4,22,500,"imagenes/productos/Doritos_lays.png","Piqueo FRITO LAY DORITOS Sabor a queso Bolsa 85Gr.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Animalito",1,4,23,500,"imagenes/productos/Galleta_animalito.png","Galletas Animalitos   SAN JORGE.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Blackout",2,4,23,400,"imagenes/productos/Galleta_blackout.png","Galleta Black Out Four Pack   SAN JORGE.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Chinchin",2,4,18,300,"imagenes/productos/Galleta_chinchin.png","Galleta Chin Chin Chocoformas Pack de 6 unid Paquete 21 gr.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Frac",2,4,18,400,"imagenes/productos/Galleta_frac.png","Galletas FRAC Clásica Rellenas con Crema Sabor a Vainilla Paquete 6un.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Margarita",2,4,28,300,"imagenes/productos/Galleta_margarita.png","Galletas MARGARITA.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Morocha",3,4,21,500,"imagenes/productos/Galleta_morocha.png","Galletas MOROCHAS Bañadas con Pasta Sabor a Chocolate.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Municion",2,4,23,500,"imagenes/productos/Galleta_municion.png","Galletas Munición   SAN JORGE.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Oreo",2,4,29,400,"imagenes/productos/Galleta_oreo.png","Galleta OREO Regular Paquete 6un.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Picaras",2,4,16,300,"imagenes/productos/Galleta_picaras.png","Galleta PICARAS Bañada con Sabor a Chocolate.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Rellenitas",1,4,27,500,"imagenes/productos/Galleta_rellenitas.png","Galletas Rellenitas GN Chocolate Paquete 288 g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Ritz",2,4,29,500,"imagenes/productos/Galleta_ritz.png","Galleta RITZ Regular Paquete 6un.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Soda",1,4,23,500,"imagenes/productos/Galleta_soda.png","Galleta Soda San Jorge.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Tentacion",2,4,25,200,"imagenes/productos/Galleta_tentacion.png","Galletas TENTACIÓN con Sabor a Chocolate Paquete 6un.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Galleta Vainilla",1,4,23,400,"imagenes/productos/Galleta_vainilla.png","Galleta Vainilla FIELD Paquete.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Mani Karinto",2,4,26,500,"imagenes/productos/Mani_karinto.png","Piqueo KARINTO Maní salado crocante Bolsa 200Gr.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Papas Artesanales",2,4,30,400,"imagenes/productos/Papas_Artesanales.png","Papas artesanales sabor jalapeño.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pringles",3,4,1,400,"imagenes/productos/Pringles.png","Papas PRINGLES Sabor Original Lata 124g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Sublime",2,4,21,300,"imagenes/productos/Sublime.png","Chocolates SUBLIME Caja 18un.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Trolli Sour",2,4,1,200,"imagenes/productos/Trolli_sour.png","Gomitas Trolli Sour Glow Worms Bolsa 100 g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Cuajada",2,4,1,400,"imagenes/productos/Cuajada.png","Cuajada x 500 g.","Nuevo producto");

INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Helado",4,5,32,300,"imagenes/productos/Helado.png","Helado Bombones Donofrio.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Kefir Nestle",3,5,21,300,"imagenes/productos/Kefir_nestle.png","Kéfir Natural 1x500g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Leche Condensada Nestle",4,5,16,400,"imagenes/productos/Leche_condensada_nestle.png","Leche Condensada NESTLÉ Lata 393g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Leche en formula Nan",25,5,21,200,"imagenes/productos/Leche_en_formula_nan.png","Leche de fórmula en polvo Nestlé Nan en lata de 800g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Leche en Polvo Anchor",10,5,34,200,"imagenes/productos/Leche_en_polvo_anchor.png","Leche en Polvo ANCHOR Bolsa 96g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Mantequilla Gloria",5,5,13,200,"imagenes/productos/Mantequilla_gloria.png","Mantequilla GLORIA con Sal Barra 100g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Nata Ramolac",4,5,1,300,"imagenes/productos/Nata_ramolac.png","Crema pasteurizada libre de gluten.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Queso Gloria",3,5,13,400,"imagenes/productos/Queso_gloria.png","Queso Danbo Bonlé.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Yogurt Gloria",2,5,13,400,"imagenes/productos/Yogurt_gloria.png","Yogurt de Mora 1000g.","Nuevo producto");

INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Salchicha",12,7,31,500,"imagenes/productos/Salchicha.png","Salchicha paquete, precio por unidad.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Salami",2,7,1,510,"imagenes/productos/Salami.png","Salami, precio por gr.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Mortadella",12,7,2,520,"imagenes/productos/Mortadella.png","Mortadella, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Morcilla",11,7,1,530,"imagenes/productos/Morcilla.png","Morcilla, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Longaniza",10,7,1,540,"imagenes/productos/Longaniza.png","Longaniza, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Fuet",4,7,2,550,"imagenes/productos/Fuet.png","Fuet, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Farinato",9,7,2,560,"imagenes/productos/Farinato.png","Farinato, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Chorizo",8,7,1,570,"imagenes/productos/Chorizo.png","Chorizo, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Chistorra",6,7,2,580,"imagenes/productos/Chistorra.png","Chistorra, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Butifarra",5,7,1,590,"imagenes/productos/Butifarra.png","Butifarra, precio por kg.","Nuevo producto");

INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de venado",13,8,1,550,"imagenes/productos/Carne_de_venado.png","Carne_de_venado, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de res",6,8,1,590,"imagenes/productos/Carne_de_res.png","Carne_de_res, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de pez trucha",9,8,1,600,"imagenes/productos/Carne_de_pez_trucha.png","Carne_de_pez_trucha, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de pez salmon",6,8,1,610,"imagenes/productos/Carne_de_pez_salmon.png","Carne_de_pez_salmon, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de pez perico",14,8,1,620,"imagenes/productos/Carne_de_pez_perico.png","Carne_de_pez_perico, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carn de pez lenguado",15,8,1,630,"imagenes/productos/Carne_de_pez_lenguado.png","Carne_de_pez_lenguado, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de pez caballa",17,8,1,640,"imagenes/productos/Carne_de_pez_caballa.png","Carne_de_pez_caballa, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de pez atun",12,8,1,650,"imagenes/productos/Carne_de_pez_atun.png","Carne_de_pez_atun, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de pavo",13,8,1,660,"imagenes/productos/Carne_de_pavo.png","Carne_de_pavo, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de pato",17,8,1,670,"imagenes/productos/Carne_de_pato.png","Carne_de_pato, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de oveja",16,8,1,680,"imagenes/productos/Carne_de_oveja.png","Carne_de_oveja, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de jabali",12,8,1,690,"imagenes/productos/Carne_de_jabali.png","Carne_de_jabali, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de gallina",9,8,1,700,"imagenes/productos/Carne_de_gallina.png","Carne_de_gallina, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de conejo",18,8,1,710,"imagenes/productos/Carne_de_conejo.png","Carne_de_conejo, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de cerdo",10,8,1,720,"imagenes/productos/Carne_de_cerdo.png","Carne_de_cerdo, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de avestruz",20,8,1,730,"imagenes/productos/Carne_de_avestruz.png","Carne_de_avestruz, precio por kg.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Carne de bufalo",24,8,1,740,"imagenes/productos/Carne_de_bufalo.png","Carne_de_bufalo, precio por kg.","Nuevo producto");


INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Canihua cusco",4,6,35,300,"imagenes/productos/Canihua_cusco.png"," Kawiña grano NET. ZT 160Z.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Frijol guinda costeno",5,6,5,400,"imagenes/productos/Frijol_guinda_costeno.png","Menestra costeño frijol guinda 500g.","Nuevo producto");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Frijol canario costeno",4,6,5,500,"imagenes/productos/Frijol_canario_costeno.png","Frijol Canario COSTEÑO Bolsa 500g.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Frijol castilla costeno",4,6,5,400,"imagenes/productos/Frijol_castilla_costeno.png"," Frijol Castilla COSTEÑO Bolsa 500g.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Frijol chino",3,6,1,400,"imagenes/productos/Frijol_chino.png"," Frijol Chino x kg.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Frijol negro costeno",4,6,5,400,"imagenes/productos/Frijol_negro_costeno.png","Frijol Negro COSTEÑO Bolsa 500g.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Garbanzo tottus",5,6,36,600,"imagenes/productos/Garbanzo_tottus.png"," Garbanzo, calidad seleccionada.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Habas",3,6,1,400,"imagenes/productos/habas.png"," Habas x kg.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("kiwicha",6,6,1,500,"imagenes/productos/kiwicha.png","Kiwicha En Grano Y Harina.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Lentejas Costeno",5,6,5,500,"imagenes/productos/Lentejas_costeno.png"," Lenteja COSTEÑO Bolsa 500g.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pallar Costeno",7,6,5,300,"imagenes/productos/Pallar_costeno.png"," Pallar COSTEÑO Bolsa 500g.","Recomendados");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pop Corn Costeno",3,6,5,400,"imagenes/productos/Pop_corn_costeno.png"," Maíz Pop Corn COSTEÑO Bolsa 500g.","Oferta");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Quinua Costeno",8,6,5,300,"imagenes/productos/Quinua_costeno.png"," Quinua COSTEÑO Bolsa 500g.","Oferta");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Soya Nutrisa",6,6,37,400,"imagenes/productos/Soya_nutrisa.png"," Proteína de Soya Premium – Sin Gluten.","Oferta");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Trigo Frutisa",5,6,38,400,"imagenes/productos/Trigo_frutisa.png"," Trigo Frutisa Bolsa 1 Kg.","Oferta");
INSERT INTO tbl_producto (nom_prod, precio_prod, id_categ, id_marca, stock, imagen, descripcion, tag) 
VALUES ("Pallar bebe",5,6,35,350,"imagenes/productos/Pallar_bebe.png"," Pallar bebe x Kg.","Oferta");


DELIMITER $$
create procedure selectProductos()
BEGIN 
	SELECT * FROM tbl_producto order by id_producto desc;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectProducto(
	IN _id_producto int
)
BEGIN 
	SELECT * FROM tbl_producto WHERE id_producto= _id_producto;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectProductos_Filtrers(
	IN min_id int,
        IN max_id int
)
BEGIN 

        SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE id_producto>=min_id and id_producto<max_id;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectProductos_Filtrers_Clientes(
	IN min_id int,
        IN max_id int
)
BEGIN 
	
        SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE (P.id_producto>=min_id and P.id_producto<max_id) and P.tag!="Cancelado" order by id_producto desc;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectCategorias()
BEGIN 
	SELECT * FROM tbl_categoria;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectProductos_Filtrers_Categories(
	IN category varchar(50)
)
BEGIN 

        DECLARE contauto int;

        SELECT id_categ into contauto FROM tbl_categoria where categoria= category;
        
	SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE P.id_categ=contauto;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectProductos_Filtrers_Categories_Clientes(
	IN category varchar(50)
)
BEGIN 

        DECLARE contauto int;

        SELECT id_categ into contauto FROM tbl_categoria where categoria= category;
        
	SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE P.id_categ=contauto and P.tag!="Cancelado";
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `insertUsuarios`(
in nomb varchar(50),
in ape varchar(50),
in username varchar(50),
in correo varchar(50),
in pass varchar(50)

)
BEGIN
     insert into tbl_usuarios 
    (nomb,ape,username,correo,pass,rol)
    values(nomb,ape,username,correo,MD5(pass),'cliente');

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `validarAdmin`(
in user varchar(50),
in password varchar(50)
)
BEGIN
     select * from tbl_usuarios where username=user and pass=MD5(password) and rol='admin';
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `validarCliente`(
in user varchar(50),
in password varchar(50)
)
BEGIN
     select * from tbl_usuarios where username=user and pass=MD5(password) and rol='cliente';
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `obtenerUsuario`(
in user varchar(50),
in password varchar(50)
)
BEGIN
     select * from tbl_usuarios where username=user and pass=MD5(password);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `obtenerCliente`(
in user varchar(50),
in password varchar(50)
)
BEGIN
     select * from tbl_usuarios U inner join tbl_clientes C on (U.id_usuario=C.id_cli) inner join tbl_tipodocumento T on (C.id_tipodocumento=T.id_tipodocumento) where U.username=user and U.pass=MD5(password);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `obtenerEmpleado`(
in user varchar(50),
in password varchar(50)
)
BEGIN
     select * from tbl_usuarios U inner join tbl_empleado E on (U.id_usuario=E.id_empleado) inner join tbl_tipodocumento T on (E.id_tipodoc=T.id_tipodocumento) where U.username=user and U.pass=MD5(password);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `registrarPedido`(
in idCliente int,
in nombre varchar(50),
in apellido varchar(50),
in tipodoc int,
in ndoc varchar(50),
in telefono varchar(50),
in ubigeo int,
in direccion varchar(50),
in docventa int,
in pago int,
in nota text,
in ruc varchar(20),
in datostransaction JSON,
in status_pago varchar(50)
)
BEGIN

     DECLARE contAuto INT DEFAULT 0;
     DECLARE total INT DEFAULT 0;

     SELECT COUNT(*) INTO total FROM tbl_clientes where id_cli=idCliente;

     IF total =0 THEN 
	
     
     INSERT INTO tbl_clientes(id_cli,nom_cli,ape_cli,id_tipodocumento,
     numdocumento_cli,id_ubigeo,tel_cli, dir_cli,imagen) values (idCliente,nombre,
     apellido, tipodoc, ndoc, ubigeo, telefono, direccion,'imagenes/user_marketapp.png');
 
  
      SELECT COUNT(*)+40000 INTO contAuto FROM tbl_ventas;

      INSERT INTO tbl_ventas(id_doc, id_ubigeo, numdocumento, numempresa, id_cliente,
	id_pago, id_empleado_atiende, id_empleado_entrega, fecha_pedido,
	fecha_entrega, status, status_pago, direccion_entrega, nota, transaction_sale) values (docventa, ubigeo, contAuto, ruc, idCliente,
        pago, 1,1, localtime() ,DATE_ADD(NOW(),INTERVAL 1 DAY),'No entregado', status_pago, direccion, nota, datostransaction);
	
    ELSE 

     SELECT COUNT(*)+40000 INTO contAuto FROM tbl_ventas;

      INSERT INTO tbl_ventas(id_doc, id_ubigeo, numdocumento, numempresa, id_cliente,
	id_pago, id_empleado_atiende, id_empleado_entrega, fecha_pedido,
	fecha_entrega, status, status_pago, direccion_entrega, nota, transaction_sale) values (docventa, ubigeo, contAuto, ruc, idCliente,
        pago, 1,1, localtime() ,DATE_ADD(NOW(),INTERVAL 1 DAY),'No entregado', status_pago, direccion, nota, datostransaction);
    
   
    END IF;
    
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `valCliente`(
in idCliente int
)
BEGIN
	select count(*) as id_cliente from tbl_clientes where id_cli=idCliente;    
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `registrarDetalle`(
in idDetalle int,
in cantidad int,
in precio double,
in idProducto int,
in idVenta int,
in idCliente int,
in idPago int,
in docventa int,
in numDocumento varchar(30)
)
BEGIN

     DECLARE resVenta INT DEFAULT 0;
     DECLARE salida INT DEFAULT 0;  
     DECLARE contAuto INT DEFAULT 0;

     SELECT COUNT(*)+39999 INTO contAuto FROM tbl_ventas;

     select tv.id_venta INTO resVenta from tbl_ventas tv where tv.id_cliente=idCliente AND tv.numdocumento=contAuto;
     
     INSERT INTO tbl_detalleventa(id_venta,id_producto,cantidad,precio,fecha_venta) values (resVenta, idProducto, cantidad, precio, now());

     UPDATE tbl_producto SET stock=stock-cantidad where id_producto=idProducto;
	
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `comprobarUser`(
in user varchar(80)
)
BEGIN
     select * from tbl_usuarios where username=user;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `comprobarCorreo`(
in mail varchar(150)
)
BEGIN
     select * from tbl_usuarios where correo=mail;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `comprobarCorreoById`(
in iduser int,
in mail varchar(150)
)
BEGIN
     select * from tbl_usuarios where correo=mail and id_usuario=iduser;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectPedidosCliente(
	IN idcli int
)
BEGIN 
	select * from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where V.id_cliente=idcli and V.status!="Cancelado" order by V.id_venta DESC;

END$$
DELIMITER ;

DELIMITER $$
create procedure selectMarcas()
BEGIN 
	select P.id_marca IDMARCA, M.marca MARCA, COUNT(*) CUENTA from tbl_producto P inner join tbl_marca M on (P.id_marca=M.id_marca) group by P.id_marca;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectProductos_Filtrers_Brands(
	IN brand varchar(60)
)
BEGIN 

        DECLARE contauto int;

        SELECT id_marca into contauto FROM tbl_marca where marca= brand;
        
	SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE P.id_marca=contauto;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectProductos_Filtrers_Brands_Clientes(
	IN brand varchar(60)
)
BEGIN 

        DECLARE contauto int;

        SELECT id_marca into contauto FROM tbl_marca where marca= brand;
        
	SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE P.id_marca=contauto and P.tag!="Cancelado";
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `searchProduct`(
in texto varchar(100)
)
BEGIN
     
	SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE (P.nom_prod LIKE CONCAT('%', texto , '%'));

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `searchProductClientes`(
in texto varchar(100)
)
BEGIN
     
	SELECT * FROM tbl_marca M inner join tbl_producto P on(M.id_marca=P.id_marca) inner join tbl_categoria C on (P.id_categ=C.id_categ) WHERE (P.nom_prod LIKE CONCAT('%', texto , '%')) and P.tag!="Cancelado";

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectTipoDoc`(
in id_tipo int
)
BEGIN
     
	select * from tbl_tipodocumento WHERE id_tipodocumento=id_tipo;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectDocVenta`(
in id_tipo int
)
BEGIN
     
	select * from tbl_docventa WHERE id_doc=id_tipo;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectDetallesVenta`(
in idventa int
)
BEGIN
     
	select DV.*, P.*, M.*, DV.cantidad*DV.precio as RESULTADO from tbl_detalleventa DV inner join tbl_producto P on (DV.id_producto=P.id_producto) inner join tbl_marca M on (P.id_marca=M.id_marca) WHERE DV.id_venta=idventa;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectTotalVentas`(
in idventa int
)
BEGIN
     
	SELECT id_venta, ROUND(SUM(cantidad*precio) *100.0/100.0 * 1.18+10, 2) as TOTAL FROM tbl_detalleventa where id_venta=idventa GROUP BY id_venta;

END$$
DELIMITER ;

DELIMITER $$
create procedure selectPedidoClienteReporte(
	IN idcli int,
        IN idventa int
)
BEGIN 
	select * from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where V.id_cliente=idcli and V.id_venta=idventa;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectDatosClientes`(
in idcli int
)
BEGIN
     
	SELECT *  FROM tbl_tipodocumento T inner join tbl_clientes C on (T.id_tipodocumento=C.id_tipodocumento) inner join tbl_ubigeo U on (C.id_ubigeo=U.id_ubigeo) where id_cli=idcli;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectProductsOferta`()
BEGIN
     
	SELECT *  FROM tbl_producto where tag="Oferta" order by id_producto DESC LIMIT 4;

END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `selectProductsRecomendados2`()
BEGIN

        DECLARE contAuto int;
        DECLARE res int;

        SELECT COUNT(*) into contAuto FROM tbl_producto where tag="Recomendado";
        
        SET res= contAuto-6;

        SELECT res;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectProductsRecomendadosFilters`(
    minim int,
    maxim int
)
BEGIN

	SELECT * FROM tbl_producto where tag="Recomendado" ORDER by id_producto DESC LIMIT minim,maxim ;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectCategoriaFilter`(
in categ int
)
BEGIN
     
	SELECT *  FROM tbl_categoria where id_categ!=categ;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectMarcaFilter`(
in brand int
)
BEGIN
     
	SELECT *  FROM tbl_marca where id_marca!=brand;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `deletePedidodemo`(
in idventa int
)
BEGIN
     
	DELETE DV.* from tbl_detalleventa DV
        JOIN tbl_ventas V
        ON V.id_venta = DV.id_venta
        WHERE V.id_venta= idventa;

        DELETE from tbl_ventas WHERE id_venta=idventa;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `deletePedido`(
in idventa int
)
BEGIN
     
        DECLARE cont INT DEFAULT 0;
        DECLARE done BOOL DEFAULT 0;
        DECLARE iddetalle INT;
        DECLARE id_prod INT;
        DECLARE cantidad INT;

        DECLARE cur1 CURSOR FOR select DV.id_detalle from tbl_detalleventa DV where (DV.id_venta=idventa); 

        DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1; 

        update tbl_ventas SET status="Cancelado" where id_venta=idventa;

        OPEN cur1; 

        REPEAT 
            FETCH cur1 INTO iddetalle; 

            IF NOT done THEN

                select D.id_producto, D.cantidad INTO id_prod, cantidad from tbl_detalleventa D where D.id_detalle=iddetalle;

                UPDATE tbl_producto SET stock=stock+cantidad where id_producto=id_prod;

                SET id_prod=0;
                SET cantidad=0;

            END IF;

        UNTIL done END REPEAT;

        CLOSE cur1;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `updateInfoUsuario`(
in idusuario int,
in nombre varchar(70),
in apellido varchar(70),
in correonew varchar(80)
)
BEGIN

        DECLARE total INT DEFAULT 0;

        SELECT COUNT(*) INTO total FROM tbl_clientes where id_cli=idusuario;

        IF total =0 THEN 

            update tbl_usuarios SET nomb=nombre, ape=apellido, correo=correonew where id_usuario=idusuario;

        ELSE
     
            update tbl_usuarios SET nomb=nombre, ape=apellido, correo=correonew where id_usuario=idusuario;

            update tbl_clientes SET nom_cli=nombre, ape_cli=apellido where id_cli=idusuario;

        END IF;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `updateInfoUsuarioAdmin`(
in idusuario int,
in nombre varchar(70),
in apellido varchar(70),
in correonew varchar(80)
)
BEGIN

    update tbl_usuarios SET nomb=nombre, ape=apellido, correo=correonew where id_usuario=idusuario;

    update tbl_empleado SET nom_empleado=nombre, ape_empleado=apellido where id_empleado=idusuario;

END$$
DELIMITER ;

DELIMITER $$
create procedure updatePass(
	IN iduser int,
	IN passw varchar(150)
)
BEGIN 
	update tbl_usuarios SET pass=MD5(passw) where id_usuario=iduser;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `ComprobarClaveUser`(
in idusu int,
in password varchar(70)
)
BEGIN
     select * from tbl_usuarios U where (U.pass=MD5(password)) and U.id_usuario=idusu;
END$$
DELIMITER ;

DELIMITER $$
create procedure updateImagenCliente(
	IN idcliente int,
	IN ruta varchar(250)
)
BEGIN 
	update tbl_clientes SET imagen=ruta where id_cli=idcliente;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectUbigeoById(
	IN idubigeo int
)
BEGIN 
	select * from tbl_ubigeo where id_ubigeo=idubigeo;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectFilterUbigeo(
	IN idubigeo int
)
BEGIN 
	select * from tbl_ubigeo where id_ubigeo!=idubigeo;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectFilterTipoDoc(
	IN idtipo int
)
BEGIN 
	select * from tbl_tipodocumento where id_tipodocumento!=idtipo;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectFilterFuncion(
	IN idfuncion int
)
BEGIN 
	select * from tbl_funcion where id_funcion!=idfuncion;
END$$
DELIMITER ;

DELIMITER $$
create procedure updateInfoCliente(
	IN idcliente int,
	IN tipodoc int,
        IN numdoc varchar(20),
        IN ubigeo int,
        IN direccion varchar(250),
        IN telefono varchar(10)
)
BEGIN 
	update tbl_clientes SET id_tipodocumento=tipodoc, numdocumento_cli=numdoc, id_ubigeo=ubigeo, dir_cli=direccion, tel_cli= telefono where id_cli=idcliente;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectUbigeo()
BEGIN 
	select * from tbl_ubigeo;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectFuncion()
BEGIN 
	select * from tbl_funcion;
END$$
DELIMITER ;

DELIMITER $$
create procedure updateImagenProducto(
	IN idprod int,
	IN ruta varchar(250)
)
BEGIN 
	update tbl_producto SET imagen=ruta where id_producto=idprod;
END$$
DELIMITER ;

DELIMITER $$
create procedure updateInfoProducto(
	IN idprod int,
	IN nombre varchar(100),
        IN precio decimal(10,2),
        IN idcateg int,
        IN idmarca int,
        IN stockk int,
        IN descrip varchar(250),
        IN tagg varchar(50)
)
BEGIN 
	update tbl_producto SET nom_prod=nombre, precio_prod=precio, id_categ=idcateg, id_marca=idmarca, stock=stockk, descripcion=descrip, tag=tagg  where id_producto=idprod;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectPedidosNoEntregados()
BEGIN 
	select * from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where V.status!="No entregado" order by V.id_venta DESC;

END$$
DELIMITER ;

DELIMITER $$
create procedure selectPedidosNoEntregadosFilter(
    IN minimo int,
    IN maximo int
)
BEGIN 
	select * from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where (V.status="No entregado") order by V.id_venta DESC LIMIT minimo,maximo;

END$$
DELIMITER ;

DELIMITER $$
create procedure selectPedidosEntregadosFilter(
    IN minimo int,
    IN maximo int
)
BEGIN 
	select * from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where (V.status="Entregado") order by V.id_venta DESC LIMIT minimo,maximo;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectPagoFilter`(
in idpago int
)
BEGIN
     
	SELECT *  FROM tbl_pago where id_pago!=idpago;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectTipodocFilter`(
in iddoc int
)
BEGIN
     
	SELECT *  FROM tbl_docventa where id_doc!=iddoc;

END$$
DELIMITER ;

DELIMITER $$
create procedure updateInfoVenta(
	IN idventa int,
	IN iddoc int,
        IN idubigeo int,
        IN numemp varchar(150),
        IN idpago int,
        IN fechaentrega date,
        IN status_entrega varchar(150),
        IN statuspago varchar(150),
        IN direccionentrega varchar(250)
)
BEGIN 
	update tbl_ventas SET id_doc=iddoc, id_ubigeo=idubigeo, numempresa=numemp, id_pago=idpago, fecha_entrega=fechaentrega, status=status_entrega, status_pago=statuspago, direccion_entrega=direccionentrega where id_venta=idventa;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `searchPedidosNoEntregados`(
in texto varchar(100)
)
BEGIN
     
	SELECT * FROM tbl_ubigeo UB inner join tbl_clientes C on (UB.id_ubigeo=C.id_ubigeo) inner join tbl_ventas V on(C.id_cli=V.id_cliente) inner join tbl_pago P on(V.id_pago=P.id_pago) WHERE (C.nom_cli LIKE CONCAT('%', texto , '%') OR C.ape_cli LIKE CONCAT('%', texto , '%') OR CONCAT(C.nom_cli,' ',C.ape_cli) LIKE CONCAT('%', texto , '%') OR C.numdocumento_cli LIKE CONCAT('%', texto , '%') OR C.tel_cli LIKE CONCAT('%', texto , '%') OR V.numdocumento LIKE CONCAT('%', texto , '%')) and V.status="No entregado";

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectStatusProducto`(
in idprod int,
in mes int
)
BEGIN
     
	select SUBSTR(fecha_venta,9,2) as dia, SUM(cantidad) as total from tbl_detalleventa where SUBSTR(fecha_venta,6,2)=mes and id_producto=idprod GROUP by SUBSTR(fecha_venta,9,2);

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `searchPedidosEntregados`(
in texto varchar(100)
)
BEGIN
     
	SELECT * FROM tbl_ubigeo UB inner join tbl_clientes C on (UB.id_ubigeo=C.id_ubigeo) inner join tbl_ventas V on(C.id_cli=V.id_cliente) inner join tbl_pago P on(V.id_pago=P.id_pago) WHERE (C.nom_cli LIKE CONCAT('%', texto , '%') OR C.ape_cli LIKE CONCAT('%', texto , '%') OR CONCAT(C.nom_cli,' ',C.ape_cli) LIKE CONCAT('%', texto , '%') OR C.numdocumento_cli LIKE CONCAT('%', texto , '%') OR C.tel_cli LIKE CONCAT('%', texto , '%') OR V.numdocumento LIKE CONCAT('%', texto , '%')) and V.status="Entregado";

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `searchPedidosCancelados`(
in texto varchar(100)
)
BEGIN
     
	SELECT * FROM tbl_ubigeo UB inner join tbl_clientes C on (UB.id_ubigeo=C.id_ubigeo) inner join tbl_ventas V on(C.id_cli=V.id_cliente) inner join tbl_pago P on(V.id_pago=P.id_pago) WHERE (C.nom_cli LIKE CONCAT('%', texto , '%') OR C.ape_cli LIKE CONCAT('%', texto , '%') OR CONCAT(C.nom_cli,' ',C.ape_cli) LIKE CONCAT('%', texto , '%') OR C.numdocumento_cli LIKE CONCAT('%', texto , '%') OR C.tel_cli LIKE CONCAT('%', texto , '%') OR V.numdocumento LIKE CONCAT('%', texto , '%')) and V.status="Cancelado";

END$$
DELIMITER ;

DELIMITER $$
create procedure selectPedidosCanceladosFilter(
    IN minimo int,
    IN maximo int
)
BEGIN 
	select * from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where (V.status="Cancelado") order by V.id_venta DESC LIMIT minimo,maximo;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectMessagesCliente`(
in idcli int
)
BEGIN
     
	SELECT C.*, M.*, E.*, C.imagen IMAGENCLIENTE, E.imagen IMAGENEMPLEADO FROM tbl_clientes C inner join tbl_message M on (C.id_cli=M.id_cliente) inner join tbl_empleado E on (M.id_empleado=E.id_empleado) where M.id_cliente=idcli order by M.fecha_hora;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `registrarMensajeCliente`(
in idcli int,
in mensaje text

)
BEGIN
     insert into tbl_message values (default, 3, idcli, 1, mensaje, localtime());

END$$
DELIMITER ;

DELIMITER $$
create procedure selectChatClientesByAdmin()
BEGIN 
	select C.*, M.*, E.*, C.imagen IMAGENCLIENTE, E.imagen IMAGENEMPLEADO from tbl_clientes C inner join tbl_message M on (C.id_cli=M.id_cliente) inner join tbl_empleado E on (M.id_empleado=E.id_empleado)  where M.id_message in (select MAX(id_message) FROM tbl_message GROUP by id_cliente) GROUP by id_cliente order by id_message desc limit 7;
END$$
DELIMITER ;

DELIMITER $$
create procedure searchSelectChatClientesByAdmin(
    IN texto varchar(70)
)
BEGIN 
	select C.*, M.*, E.*, C.imagen IMAGENCLIENTE, E.imagen IMAGENEMPLEADO from tbl_clientes C inner join tbl_message M on (C.id_cli=M.id_cliente) inner join tbl_empleado E on (M.id_empleado=E.id_empleado)  where M.id_message in (select MAX(id_message) FROM tbl_message GROUP by id_cliente) and (C.nom_cli LIKE CONCAT('%', texto , '%') OR C.ape_cli LIKE CONCAT('%', texto , '%') OR CONCAT(C.nom_cli,' ',C.ape_cli) LIKE CONCAT('%', texto , '%') OR C.numdocumento_cli LIKE CONCAT('%', texto , '%') OR C.tel_cli LIKE CONCAT('%', texto , '%')) GROUP by id_cliente order by id_message desc limit 7;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `registrarMensajeEmpleado`(
in idemp int,
in idcli int,
in mensaje text

)
BEGIN
     insert into tbl_message values (default, idemp, idcli, 0, mensaje, localtime());

END$$
DELIMITER ;

DELIMITER $$
create procedure selectClientesByAdmin()
BEGIN 
	SELECT *  FROM tbl_tipodocumento T inner join tbl_clientes C on (T.id_tipodocumento=C.id_tipodocumento) inner join tbl_ubigeo U on (C.id_ubigeo=U.id_ubigeo) order by C.id_cli desc limit 5;
END$$
DELIMITER ;

DELIMITER $$
create procedure searchSelectClientesByAdmin(
    IN texto varchar(50)
)
BEGIN 
	SELECT *  FROM tbl_tipodocumento T inner join tbl_clientes C on (T.id_tipodocumento=C.id_tipodocumento) inner join tbl_ubigeo U on (C.id_ubigeo=U.id_ubigeo) where (C.nom_cli LIKE CONCAT('%', texto , '%') OR C.ape_cli LIKE CONCAT('%', texto , '%') OR CONCAT(C.nom_cli,' ',C.ape_cli) LIKE CONCAT('%', texto , '%') OR C.numdocumento_cli LIKE CONCAT('%', texto , '%') OR C.tel_cli LIKE CONCAT('%', texto , '%')) order by C.id_cli desc limit 5;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectPedidosClientesGlobal(
    IN idcli int
)
BEGIN 
	select * from tbl_ubigeo UB inner join tbl_clientes C on (UB.id_ubigeo=C.id_ubigeo) inner join tbl_ventas V on(C.id_cli=V.id_cliente) inner join tbl_pago P on(V.id_pago=P.id_pago) where V.id_cliente=idcli order by V.id_venta DESC;

END$$
DELIMITER ;

DELIMITER $$
create procedure NotificacionesAdmin()
BEGIN 
	#select COUNT(*) as total from tbl_clientes C inner join tbl_message M on (C.id_cli=M.id_cliente) inner join tbl_empleado E on (M.id_empleado=E.id_empleado)  where M.id_message in (select MAX(id_message) FROM tbl_message GROUP by id_cliente) and (M.id_send=1) GROUP by id_cliente order by id_message desc;
        SELECT SUM(total) as finall from (select COUNT(*) as total from tbl_clientes C inner join tbl_message M on (C.id_cli=M.id_cliente) inner join tbl_empleado E on (M.id_empleado=E.id_empleado)  where M.id_message in (select MAX(id_message) FROM tbl_message GROUP by id_cliente) and (M.id_send=1) GROUP by id_cliente order by id_message desc) as total;
END$$
DELIMITER ;

DELIMITER $$
create procedure updateImagenEmpleado(
	IN idemp int,
	IN ruta varchar(250)
)
BEGIN 
	update tbl_empleado SET imagen=ruta where id_empleado=idemp;
END$$
DELIMITER ;

DELIMITER $$
create procedure updateInfoEmpleado(
	IN idemp int,
	IN tipodoc int,
        IN numdoc varchar(20),
        IN ubigeo int,
        IN direccionn varchar(250),
        IN fecha date,
        IN telefono varchar(10)
)
BEGIN 
	update tbl_empleado SET id_tipodoc=tipodoc, num_doc=numdoc, id_ubigeo=ubigeo, direccion=direccionn, tel_empleado= telefono, fenaci=fecha where id_empleado=idemp;
END$$
DELIMITER ;

DELIMITER $$
create procedure updateInfoEmpleadoGlobal(
	IN idemp int,
        IN idfuncion int,
	IN tipodoc int,
        IN numdoc varchar(20),
        IN ubigeo int,
        IN direccionn varchar(250),
        IN fecha date,
        IN telefono varchar(10),
        IN nombre varchar(50),
        IN apellido varchar(50)
)
BEGIN 

        update tbl_usuarios SET nomb=nombre, ape=apellido where id_usuario=idemp;

	update tbl_empleado SET nom_empleado=nombre, ape_empleado=apellido, id_funcion=idfuncion,id_tipodoc=tipodoc, num_doc=numdoc, id_ubigeo=ubigeo, direccion=direccionn, tel_empleado= telefono, fenaci=fecha where id_empleado=idemp;
END$$
DELIMITER ;

DELIMITER $$
create procedure selectEmpleadosByAdmin()
BEGIN 
	SELECT *  FROM tbl_tipodocumento T inner join tbl_empleado E on (T.id_tipodocumento=E.id_tipodoc) inner join tbl_funcion F on (E.id_funcion=F.id_funcion) order by E.id_empleado limit 5;
END$$
DELIMITER ;

DELIMITER $$
create procedure searchSelectEmpleadosByAdmin(
    IN texto varchar(50)
)
BEGIN 
	SELECT *  FROM tbl_tipodocumento T inner join tbl_empleado E on (T.id_tipodocumento=E.id_tipodoc) inner join tbl_funcion F on (E.id_funcion=F.id_funcion) where (E.nom_empleado LIKE CONCAT('%', texto , '%') OR E.ape_empleado LIKE CONCAT('%', texto , '%') OR CONCAT(E.nom_empleado,' ',E.ape_empleado) LIKE CONCAT('%', texto , '%') OR E.num_doc LIKE CONCAT('%', texto , '%') OR E.tel_empleado LIKE CONCAT('%', texto , '%')) order by E.id_empleado limit 5;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `insertEmpleados`(
in nomb varchar(50),
in ape varchar(50),
in username varchar(50),
in correo varchar(50),
in pass varchar(50),
in idfuncion int,
in idubigeo int,
in direccion varchar(250),
in idtipodoc int,
in numdoc int,
in telefono varchar(10),
in fenaci date

)
BEGIN

     DECLARE contAuto int;

     insert into tbl_usuarios (nomb,ape,username,correo,pass,rol) values(nomb,ape,username,correo,MD5(pass),'admin');

     select U.id_usuario into contAuto from tbl_usuarios U where U.username=username and U.pass=MD5(pass);

     INSERT INTO tbl_empleado values (contAuto, idfuncion, idubigeo, idtipodoc, nomb, ape, numdoc, telefono, fenaci, direccion, 'imagenes/productos/user_marketapp.png');

END$$
DELIMITER ;

DELIMITER $$
create procedure searchSelectUsers(
    IN texto varchar(50)
)
BEGIN 
	SELECT *  FROM tbl_usuarios U where (U.nomb LIKE CONCAT('%', texto , '%') OR U.ape LIKE CONCAT('%', texto , '%') OR CONCAT(U.nomb,' ',U.ape) LIKE CONCAT('%', texto , '%') OR U.username LIKE CONCAT('%', texto , '%') OR U.correo LIKE CONCAT('%', texto , '%')) order by U.id_usuario limit 5;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `insertCategoria`(
in nomb varchar(50)

)
BEGIN

     INSERT INTO tbl_categoria values (default, nomb);

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `insertMarca`(
in nomb varchar(50)

)
BEGIN

     INSERT INTO tbl_marca values (default, nomb);

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `insertProducto`(
in nomb varchar(50),
in precio decimal (10,2),
in idcateg int,
in idmarca int,
in stock int,
in ruta varchar(250),
in descripcion varchar(250),
in tag varchar(100)

)
BEGIN

     INSERT INTO tbl_producto values (default, nomb, precio, idcateg, idmarca, stock, ruta, descripcion, tag);

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectMarcasGlobal`()
BEGIN
     
	select * from tbl_marca;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectDatosVenta`(
in idventa int
)
BEGIN

     select * from tbl_ventas where id_venta=idventa;

END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `selectClientes`()
BEGIN
     
	select * from tbl_clientes;

END$$
DELIMITER ;