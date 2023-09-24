create database Proyecto;
use Proyecto;


create table Tipo_Doc(
id_tipo_doc INT Not Null AUTO_INCREMENT,
Desc_Docu VARCHAR(35) Not Null,
primary key(id_tipo_doc)
);


create table Persona(
id_persona INT Not Null AUTO_INCREMENT,
Tipo_doc_id_tipo_doc VARCHAR(10) Not Null,
Nombre1 VARCHAR(10) Not Null,
Nombre2 VARCHAR(10) Null,
Apellido1 VARCHAR(10) Not Null,
Apellido2 VARCHAR(10) Null,
Num_Doc INT Not Null,
Correo VARCHAR(45)Not Null,
Tel_Cel INT Not Null,
Usuario VARCHAR(25) Not Null,
clave VARCHAR(100) Not Null,
primary key(id_persona,Tipo_doc_id_tipo_doc)
);


create table Roles(
id_rol INT Not Null AUTO_INCREMENT,
persona_Tipo_doc_id_tipo_doc VARCHAR(10) Not Null,
persona_idpersona VARCHAR(10) Not Null,
Estado_rol boolean Not Null,
Nom_rol VARCHAR(25) Not Null,
primary key(id_rol)
);


create table Admin(
id_admin INT Not Null AUTO_INCREMENT,
roles_idroles INT Not Null,
Codigo_admin INT Not Null,
primary key(id_admin)
);


create table Proveedor(
id_proveedor INT Not Null AUTO_INCREMENT,
roles_idroles INT Not Null,
Direccion VARCHAR(50) Not Null,
Num_local INT Not Null,
primary key(id_proveedor)
);


create table P_Beneficiaria(
id_beneficiario INT Not Null AUTO_INCREMENT,
roles_idroles INT Not Null,
primary key(id_beneficiario)
);


create table Productos_proveedor(
id_productos_proveedor INT Not Null AUTO_INCREMENT,
proveedor_idproveedor INT Not Null,
peso_idpeso INT Not Null,
categoria_idcategoria INT Not Null, 
Nom_producto VARCHAR(20) Not Null,
Cantidad INT Not Null,
Url_img_pro VARCHAR(30) Not Null,
primary key(id_producto_vendedor)
);


create table Reserva(
id_reserva INT Not Null AUTO_INCREMENT,
productos_por_proveedor_idproductos_proveedor INT Not Null,
p_benficiaria_idp_beneficiaria INT Not Null,
Fecha datetime Not Null,
Duracion datetime Not Null,
primary key(id_reserva)
);


create table Peso(
id_peso INT Not Null AUTO_INCREMENT,
Desc_peso VARCHAR(20) Not Null,
primary key(id_peso)
);


create table Categoria(
id_categoria INT Not Null AUTO_INCREMENT,
Nom_categoria VARCHAR(25) Not Null,
primary key(Nom_categoria)
);

alter table Persona
add foreign key (Tipo_doc_id_tipo_doc)
references Tipo_Doc(id_tipo_doc);

alter table Roles
add foreign key (persona_Tipo_doc_id_tipo_doc,persona_idpersona)
references Persona(Tipo_doc_id_tipo_doc,id_persona);

alter table Admin
add foreign key (roles_idroles)
references Roles(id_rol);

alter table Proveedor
add foreign key (roles_idroles)
references Roles(id_rol);

alter table P_Beneficiaria
add foreign key (roles_idroles)
references Roles(id_rol);

alter table Productos_proveedor
add foreign key (proveedor_idproveedor)
references Proveedor(id_proveedor);

alter table Productos_proveedor
add foreign key (categoria_idcategoria)
references Categoria(id_categoria);

alter table Productos_proveedor
add foreign key (peso_idpeso)
references Peso(id_peso);

alter table Reserva
add foreign key (productos_por_proveedor_idproductos_proveedor)
references Productos_proveedor(id_productos_proveedor);

alter table Reserva
add foreign key (p_benficiaria_idp_beneficiaria)
references P_Beneficiaria(id_beneficiario);