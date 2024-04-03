/* INSERTS INICIALES */
USE DB_PROYECTO_DWP_2;

-- USUARIOS --
-- INSERT INTO TAB_USUARIOS (CORREO,CONTRASENA,NOMBRE,APELLIDO_1,APELLIDO_2) VALUES ("camposcespedesd@gmail.com","test123","Denis","Campos","Cespedes");
-- INSERT INTO TAB_USUARIOS (CORREO,CONTRASENA,NOMBRE,APELLIDO_1,APELLIDO_2) VALUES ("dchavesd.07@gmail.com","dchaves123","David","Chaves","Delgado");


-- ENCARGOS --
 INSERT INTO TAB_ENCARGOS(CORREO,NOM_DISENO,DES_DISENO,TAM_DISENO,PRECIO_DISENO,RUTA_IMAGEN,IND_ESTADO,IND_PAGADO,IND_EXPRESS,COD_DIRECCION_DEST) 
 VALUES("test7@gmail.com","Jett","Persona duelista del Juego de Valorant que controla unas dagas y el viento","0",11000.0,"https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fencargos%2Fimg0000000000000000001Jett01.jpg?alt=media&token=952eb1cd-6de9-4400-8be8-69a8a1f520d9","N","N","N","");

 INSERT INTO TAB_ENCARGOS(CORREO,NOM_DISENO,DES_DISENO,TAM_DISENO,PRECIO_DISENO,RUTA_IMAGEN,IND_ESTADO,IND_PAGADO,IND_EXPRESS,COD_DIRECCION_DEST) 
 VALUES("test7@gmail.com","Omen","Persona controlador del Juego de Valorant que controla humos y proviende la oscuridad pro un experimento","1",12000.0,"https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fencargos%2Fimg0000000000000000002Omen01.jpg?alt=media&token=b598bd1b-b3f1-4d04-94f1-78727c2c469d","S","S","S","");

-- GALERIA --
 INSERT INTO TAB_GALERIA (nom_diseno, des_diseno, tipo_diseno, ruta_imagen) 
 VALUES ("Pulsera Azul","Una pulsera de bolitas de cristal azules","B","https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000012PulserAzul01.jpg?alt=media&token=eb50f631-d1a5-4ec3-a990-34c1fa599436");

 INSERT INTO TAB_GALERIA (nom_diseno, des_diseno, tipo_diseno, ruta_imagen) 
 VALUES ("Mario Bros","Amigurimi del famoso personaje de Mario bros","A","https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000021Mario01.jpg?alt=media&token=2575c7a8-48a9-4453-b58a-acd9862baf27");

 INSERT INTO TAB_GALERIA (nom_diseno, des_diseno, tipo_diseno, ruta_imagen) 
 VALUES ("Bowser","Amigurimi del el enemigo principal de la saga de juegos de Mario Bros","A","https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000013Bowser.jpg?alt=media&token=ce808209-4d7c-4dfb-896e-04ff5160d2e9");

 INSERT INTO TAB_GALERIA (nom_diseno, des_diseno, tipo_diseno, ruta_imagen) 
 VALUES ("Hey hey","Amigurimi del pollo que sale en la pelicula de Mohana","A","https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000017Heyhey01.jpg?alt=media&token=5cc22daa-f038-44fd-9ebe-a9dcc42f181f");

 INSERT INTO TAB_GALERIA (nom_diseno, des_diseno, tipo_diseno, ruta_imagen) 
 VALUES ("Pulsera de piedras peque as","Una pulsera de un color con piedras peque as cone lastico","B","https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000010Pulseras01.jpg?alt=media&token=07fe4532-1c45-48da-9877-e0aa132634a6");