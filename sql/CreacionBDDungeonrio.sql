DROP DATABASE IF EXISTS Dungeonrio;
CREATE DATABASE Dungeonrio;

USE Dungeonrio;

CREATE TABLE hermandad(ID INT AUTO_INCREMENT UNIQUE,
							nombre VARCHAR(50) UNIQUE,
							logo VARCHAR(20),
							descripcion VARCHAR(200),
							avance INT,
							PRIMARY KEY (ID));
CREATE TABLE jugador(ID INT AUTO_INCREMENT UNIQUE,
							usuario VARCHAR(20) UNIQUE,
							contraseña VARCHAR(20),
							descripcion VARCHAR(200),
							PRIMARY KEY (ID));
CREATE TABLE personaje(ID INT AUTO_INCREMENT UNIQUE,
							nombre VARCHAR(20) UNIQUE,
							clase VARCHAR(50),
							especializacion VARCHAR(20),
							favorito BOOLEAN,
							ID_jugador INT,
							ID_hermandad INT,
							puntuacion INT,
							PRIMARY KEY (ID),
							FOREIGN KEY (ID_jugador) REFERENCES jugador(ID) ON DELETE CASCADE,
							FOREIGN KEY (ID_hermandad) REFERENCES hermandad(ID) ON DELETE CASCADE);
CREATE TABLE grupo(ID INT AUTO_INCREMENT UNIQUE,
						nombre VARCHAR(50) UNIQUE,
						puntuacion INT,
						PRIMARY KEY (ID));
CREATE TABLE mazmorra(ID INT AUTO_INCREMENT UNIQUE,
							tiempoMaximo TIME,
							nombre VARCHAR(50) UNIQUE,
							PRIMARY KEY (ID));
CREATE TABLE realiza(ID_personaje INT,
							ID_mazmorra INT,
							tiempo_empleado TIME,
							puntuacion INT,
							FOREIGN KEY (ID_personaje) REFERENCES personaje(ID) ON DELETE CASCADE,
							FOREIGN KEY (ID_mazmorra) REFERENCES mazmorra(ID));
CREATE TABLE pertenece(ID_grupo INT,
							ID_personaje INT,
							FOREIGN KEY (ID_grupo) REFERENCES grupo(ID) ON DELETE CASCADE,
							FOREIGN KEY (ID_personaje) REFERENCES personaje(ID) ON DELETE CASCADE);
CREATE TABLE progreso(ID_hermandad INT,
							jefeMatado INT,
							fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

INSERT INTO jugador(usuario,contraseña)
VALUES("Andgrod","Andgrod");
INSERT INTO jugador(usuario,contraseña)
VALUES("Ichirai","Ichirai");
INSERT INTO jugador(usuario,contraseña)
VALUES("Cerhor","Cerhor");
INSERT INTO jugador(usuario,contraseña)
VALUES("Apse","Apse");
INSERT INTO jugador(usuario,contraseña)
VALUES("Ace","Ace");
INSERT INTO jugador(usuario,contraseña)
VALUES("Pachamama","Pachamama");
INSERT INTO jugador(usuario,contraseña)
VALUES("Icadi","Icadi");
INSERT INTO jugador(usuario,contraseña)
VALUES("Admin","Admin");

INSERT INTO hermandad(nombre,avance)
VALUES("La Cruzada Escarlata",10);
INSERT INTO hermandad(nombre,avance)
VALUES("El Imperio Desconocido",8);

INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Andgrod","Paladin","Tank",TRUE,1,1,213);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,puntuacion)
VALUES("Ceilir","Druida","Tank",FALSE,1,115);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,puntuacion)
VALUES("Chencor","Guerrero","Tank",FALSE,1,100);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Ichirai","Monje","DPS",TRUE,2,1,243);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Cerhor","Guerrero","DPS",TRUE,3,1,0);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Apse","Caballero de la Muerte","Tank",TRUE,4,1,153);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Ace","Paladin","Healer",TRUE,5,1,0);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Bhikuni","Monje","Tank",TRUE,4,1,110);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Ceror","Caballero de la Muerte","DPS",FALSE,3,1,0);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Pachamama","Druida","Healer",TRUE,6,1,0);
INSERT INTO personaje(nombre, clase, especializacion, favorito, ID_jugador,ID_hermandad,puntuacion)
VALUES("Icadi","Druida","Healer",TRUE,7,1,0);

INSERT INTO mazmorra(nombre,tiempoMaximo)
VALUES("Reposo de los Reyes","0:40:0");
INSERT INTO mazmorra(nombre,tiempoMaximo)
VALUES("Asalto a Boralus","0:32:0");
INSERT INTO mazmorra(nombre,tiempoMaximo)
VALUES("Fuerte Libre","0:39:0");
INSERT INTO mazmorra(nombre,tiempoMaximo)
VALUES("Altar de la Tormenta","0:34:0");
INSERT INTO mazmorra(nombre,tiempoMaximo)
VALUES("Veta Madre","0:37:0");
INSERT INTO mazmorra(nombre,tiempoMaximo)
VALUES("Catacumbas putrefactas","0:38:0");

INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(1,1,"0:30:0",123);
INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(1,2,"0:34:0",90);
INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(4,1,"0:30:0",123);
INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(4,2,"0:30:0",120);
INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(8,2,"0:30:0",120);
INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(2,2,"0:30:0",120);
INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(3,2,"0:30:0",120);
INSERT INTO realiza(ID_personaje,ID_mazmorra,tiempo_empleado,puntuacion)
VALUES(6,2,"0:30:0",120);

INSERT INTO grupo(nombre,puntuacion)
VALUES("Deplete Team",200);
INSERT INTO grupo(nombre,puntuacion)
VALUES("PI ME",160);

INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(1,1);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(1,4);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(1,5);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(1,7);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(1,9);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(2,6);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(2,4);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(2,5);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(2,7);
INSERT INTO pertenece(ID_grupo,ID_personaje)
VALUES(2,9);

INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,1);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,1);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,2);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,3);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,2);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,3);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,4);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,5);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,6);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,4);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,5);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,7);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,8);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,6);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,9);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(1,10);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,7);
INSERT INTO progreso(ID_hermandad,jefeMatado)
VALUES(2,8);