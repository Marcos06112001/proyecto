/* Base De Datos 
 Crear la Base si no existe*/
CREATE DATABASE IF NOT EXISTS DB_PROYECTO_DWP_2;
USE DB_PROYECTO_DWP_2;


/* la tabla de USUARIOS*/
create table DB_PROYECTO_DWP_2.TAB_USUARIOS(
  CORREO VARCHAR(50) NOT NULL ,
  CONTRASENA VARCHAR(255),
  NOMBRE  VARCHAR(30),
  APELLIDO_1 VARCHAR(30),
  APELLIDO_2 VARCHAR(30),
  RUTA_IMAGEN VARCHAR(1024),
  IND_ESTADO VARCHAR(1),
  PRIMARY KEY (CORREO))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

/* la tabla de foros*/
create table DB_PROYECTO_DWP_2.TAB_FORO(
  CORREO VARCHAR(30),
  COD_COMENTARIO INT auto_increment ,
  COMENTARIO  VARCHAR(2048),
  PRIMARY KEY (COD_COMENTARIO),
  FOREIGN KEY (CORREO) REFERENCES DB_PROYECTO_DWP_2.TAB_USUARIOS(CORREO))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

/* la tabla de metodos de pago*/
create table DB_PROYECTO_DWP_2.TAB_METODOS_PAG_USUARIO(
  CORREO VARCHAR(30),
  NUM_TARJETA VARCHAR(20) NOT NULL ,
  NOMBRE_TITULAR  VARCHAR(30),
  FEC_VENCIMIENTO  DATE,
  COD_SEGURIDAD  INT,
  IND_ESTADO VARCHAR(1),
  PRIMARY KEY (CORREO,NUM_TARJETA),
  FOREIGN KEY (CORREO) REFERENCES DB_PROYECTO_DWP_2.TAB_USUARIOS(CORREO))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

/* la tabla de facturacion*/
create table DB_PROYECTO_DWP_2.TAB_FACTURACION(
  CORREO VARCHAR(30),
  NUM_TARJETA VARCHAR(20) ,
  PAIS  VARCHAR(30),
  COD_POSTAL  INT,
  TELEFONO  VARCHAR(30),
  CORREO_DEST  VARCHAR(30),
  PRIMARY KEY (CORREO,NUM_TARJETA),
  FOREIGN KEY (CORREO,NUM_TARJETA) REFERENCES DB_PROYECTO_DWP_2.TAB_METODOS_PAG_USUARIO(CORREO,NUM_TARJETA))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

/* la tabla de GALERIA*/
create table DB_PROYECTO_DWP_2.TAB_GALERIA(
  COD_DISENO INT auto_increment,
  NOM_DISENO VARCHAR(30),
  DES_DISENO  VARCHAR(2048),
  TIPO_DISENO VARCHAR(1),
  RUTA_IMAGEN varchar(1024),
  PRIMARY KEY (COD_DISENO))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

/* la tabla de ENCARGOS*/
create table DB_PROYECTO_DWP_2.TAB_ENCARGOS(
  CORREO VARCHAR(30),
  COD_ENCARGO INT auto_increment,
  NOM_DISENO VARCHAR(30),
  DES_DISENO  VARCHAR(2048),
  TAM_DISENO VARCHAR(50),
  PRECIO_DISENO NUMERIC(10),
  RUTA_IMAGEN varchar(1024),
  COD_DIRECCION_DEST varchar(2048),
  IND_ESTADO VARCHAR(1),
  IND_PAGADO VARCHAR(1),
  IND_EXPRESS VARCHAR(1),
  PRIMARY KEY (COD_ENCARGO)
  )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


