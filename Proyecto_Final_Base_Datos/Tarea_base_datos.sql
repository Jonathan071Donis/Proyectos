CREATE DATABASE  Tarea_baseDatos


USE Tarea_baseDatos



CREATE TABLE customer (
CodigoCliente INT IDENTITY(1,1) PRIMARY KEY,
Nombre VARCHAR(50),
Direccion VARCHAR(50),
Correo VARCHAR(50),
Nit VARCHAR(25)
);

CREATE TABLE company(
Nit INT IDENTITY (1,1) PRIMARY KEY,
Nombre VARCHAR(50),
Direccion VARCHAR(50),
Correo VARCHAR(50),
Telefono VARCHAR(25),
Portal VARCHAR(25)
);

CREATE TABLE products(
idProducto INT IDENTITY(1,1) PRIMARY KEY,
Descripcion VARCHAR(50),
id_Marca INT,
id_Categoria INT,
precio INT,
Imagen VARCHAR(max)
);

CREATE TABLE sales_h(
Numero INT IDENTITY(1,1) PRIMARY KEY,
Serie INT,
Fecha DATETIME,
Codigo_Cliente INT,
Nit INT,
FOREIGN KEY (Codigo_Cliente) REFERENCES customer (CodigoCliente),
FOREIGN KEY (Nit) REFERENCES company (Nit)
);


CREATE TABLE sales_d(
Id INT IDENTITY(1,1) PRIMARY KEY,
Cantidad INT, 
Articulo INT, 
Factura INT,
Serie INT
FOREIGN KEY (Articulo) REFERENCES products (idProducto),
FOREIGN KEY (Factura) REFERENCES sales_h (Numero),
);

CREATE TABLE inventory(
id_inventory INT IDENTITY(1,1) PRIMARY KEY,
date_int DATE not null,
date_out DATE not null,
id_product INT not null,
stock_in INT not null,
entries INT not null,
outlets INT not null,
FOREIGN KEY (id_product) REFERENCES products (IdProducto),
);



INSERT INTO customer (Nombre, Direccion, Correo, Nit) VALUES 
('Luis', 'Calle 1', 'Luis.com', '1234567890'),
('karen', 'Calle 2', 'karen.com', '0987654321'),
('Damaris', 'Calle 3', 'Damaris.com', '2468101214');

INSERT INTO company (Nombre, Direccion, Correo, Telefono, Portal) VALUES
('Gallo', 'Calle 1', 'Gallo.com', '12345678', 'www.uno.com'),
('Pepsi', 'Calle 2', 'Pepsi.com', '87654321', 'www.dos.com'),
('Bigcola', 'Calle 3', 'Bigcola.com', '13579246', 'www.tres.com');

INSERT INTO products (Descripcion, id_Marca, id_Categoria, precio, Imagen)
VALUES ('Gallo', 1, 1, 10, 'imagen1.jpg'),
       ('Montecarlo', 1, 2, 20, 'imagen2.jpg'),
       ('Heineken', 2, 1, 15, 'imagen3.jpg'),
       ('Frijol', 2, 2, 25, 'imagen4.jpg'),
       ('Juegos', 3, 1, 12, 'imagen5.jpg');


INSERT INTO sales_h (Serie, Fecha, Codigo_Cliente, Nit) VALUES
(001, '2023-05-12', 1, 1),
(001, '2023-05-12', 2, 1),
(001, '2023-05-12', 3, 1);

INSERT INTO sales_h (Serie, Fecha, Codigo_Cliente, Nit) VALUES
(002, '2023-05-12', 1, 1);

INSERT INTO sales_d (Cantidad, Articulo, Factura, Serie) VALUES
(1, 1, 2, 001); 

select * from sales_h
select * from sales_d


INSERT INTO inventory (date_int, date_out, id_product, stock_in, entries, outlets) VALUES
('2023-05-01', '2023-05-12', 1, 50, 20, 10);

CREATE TRIGGER insertarInventario 
ON products 
AFTER INSERT 
AS 
BEGIN 
INSERT INTO inventory 
(date_int, date_out, id_product, stock_in, entries, outlets)
SELECT GETDATE(),GETDATE(), idProducto,1,1,0 FROM inserted 
END 


SELECT id_inventory, date_int, date_out, p.Descripcion , stock_in, entries, outlets
 FROM inventory AS iv
 inner join products AS p ON iv.id_product = p.idProducto

 select stock_in from inventory where id_product = 1;
 update inventory Set stock_in=stock_in+1 where id_product = 1;

 CREATE PROCEDURE CargarInventario
AS 
 SELECT id_inventory, date_int, date_out, p.Descripcion , stock_in, entries, outlets
 FROM inventory AS iv
 inner join products AS p ON iv.id_product = p.idProducto
GO

EXEC CargarInventario 

 CREATE PROCEDURE CargarProducto
AS 
 SELECT idProducto, Descripcion, id_Marca,id_Categoria, precio,Imagen
 FROM products 
GO
EXEC CargarProducto 

 CREATE PROCEDURE CargarClientes
AS 
 SELECT CodigoCliente, Nombre, Direccion, Correo, Nit
 FROM customer
GO
EXEC CargarClientes

select idProducto from products

