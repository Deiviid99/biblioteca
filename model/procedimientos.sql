/*--Obtener usuarios para login--*/
DELIMITER $$
CREATE PROCEDURE stp_obtenerusuario_login (IN correo VARCHAR(80), IN password VARCHAR(80))
BEGIN

SELECT usu_id, rol_id, usu_nombre, usu_apellido, usu_correo, usu_password FROM tbl_usuario WHERE usu_correo = correo AND usu_password = password AND usu_estado='A';

END$$
DELIMITER $$

CALL stp_obtenerusuario_login('david@gmail.com','12345');

/*--Validar si existen usuarios con el mismo correo electrónico--*/
DELIMITER $$
CREATE PROCEDURE stp_validarusuarios_registrocorreo (IN correo VARCHAR(80))
BEGIN

SELECT * FROM tbl_usuario WHERE usu_correo = correo;

END$$
DELIMITER $$

CALL stp_validarusuarios_registrocorreo('david@gmail.com');

/*--Registramos el usuario y la recuperacion de la clave--*/
DELIMITER $$
CREATE PROCEDURE stp_registrarusuario (IN codigorecuperacion VARCHAR(80), IN idrol INT, IN nombre VARCHAR(80), IN apellido VARCHAR(80), IN correo VARCHAR(80), IN password VARCHAR(80),
                                        IN identificacion VARCHAR(13), IN telefono VARCHAR(15), IN direccion VARCHAR(200))
BEGIN

INSERT INTO tbl_recuperacion (rec_codigo) VALUES (codigorecuperacion);
INSERT INTO tbl_usuario (rec_id, rol_id, usu_nombre, usu_apellido, usu_correo, usu_password, usu_identificacion, usu_telefono, usu_direccion) 
VALUES((SELECT rec_id FROM tbl_recuperacion WHERE rec_codigo = codigorecuperacion), idrol, nombre, apellido, correo, password, identificacion, telefono, direccion);

END$$
DELIMITER $$

CALL stp_registrarusuario('1609577286TN0L1CCF32GSESA2NN9WMEPNIKRMASI','1','David Alexander','Heredia Angulo','davidalexander_99ldu@hotmail.com','david12345','1726852518','0984047565','El Conde');


/*--Actualizamos la recuperacion de la clave--*/
DELIMITER $$
CREATE PROCEDURE stp_enviarcorreo_usuario (IN correo VARCHAR(80), IN codigorecuperacion VARCHAR(80), IN fecharecuperacion DATETIME)
BEGIN

UPDATE tbl_recuperacion r, tbl_usuario u SET r.rec_codigo=codigorecuperacion, r.rec_fecharecuperacion=fecharecuperacion WHERE r.rec_id = u.rec_id AND u.usu_correo=correo AND u.usu_estado='A' AND r.rec_estado='A';
SELECT usu_nombre FROM tbl_usuario WHERE usu_correo = correo AND usu_estado = 'A';

END$$
DELIMITER $$

CALL stp_enviarcorreo_usuario('david@gmail.com','1609577286TN0L1CCF32GSESA2NN9WMEPNIKRMASI','2021-01-02 16:01:25');

/*--Obtener usuarios por codigo de recuperacion--*/
DELIMITER $$
CREATE PROCEDURE stp_obtenerusuario_codigorecuperacion (IN codigorecuperacion VARCHAR(80))
BEGIN
SELECT r.rec_fecharecuperacion FROM tbl_recuperacion r, tbl_usuario u WHERE r.rec_id = u.rec_id AND r.rec_codigo = codigorecuperacion AND u.usu_estado='A' AND r.rec_estado='A';
END$$
DELIMITER $$

CALL stp_obtenerusuario_codigorecuperacion('1609577286TN0L1CCF32GSESA2NN9WMEPNIKRMASI');

/*--Cambiar contraseña de recuperacion--*/
DELIMITER $$
CREATE PROCEDURE stp_actualizarclave_usuario (IN codigorecuperacion VARCHAR(80), IN password VARCHAR(80), IN codigonuevo VARCHAR(80))
BEGIN

UPDATE tbl_recuperacion r, tbl_usuario u, (SELECT rec_id FROM tbl_recuperacion WHERE rec_codigo=codigorecuperacion) c SET u.usu_password = password, r.rec_codigo = codigonuevo, r.rec_fecharecuperacion = NULL
WHERE r.rec_id = u.rec_id AND u.rec_id = c.rec_id AND u.usu_estado='A' AND r.rec_estado='A';

END$$
DELIMITER $$

CALL stp_actualizarclave_usuario('1609577286TN0L1CCF32GSESA2NN9WMEPNIKRMASI', '123456','SAAD1A53D1A32D1AS23DS1A23DA1D31ASDA13');

/*--Obtener autores--*/
DELIMITER $$
CREATE PROCEDURE stp_obtener_autores ()
BEGIN

SELECT * FROM tbl_autor WHERE aut_estado = 'A';

END$$
DELIMITER $$

CALL stp_obtener_autores();

/*--Registrar autor--*/
DELIMITER $$
CREATE PROCEDURE stp_registrarautor (IN nombre VARCHAR(80), IN apellido VARCHAR(80))
BEGIN

INSERT INTO tbl_autor (aut_nombre, aut_apellido) VALUES (nombre, apellido);

END$$
DELIMITER $$

CALL stp_registrarautor('David Alexander', 'Heredia Angulo');

/*--Modificar autor--*/
DELIMITER $$
CREATE PROCEDURE stp_modificarautor (IN idautor INT, IN nombre VARCHAR(80), IN apellido VARCHAR(80))
BEGIN

UPDATE tbl_autor SET aut_nombre=nombre, aut_apellido=apellido WHERE aut_id = idautor;

END$$
DELIMITER $$

CALL stp_modificarautor('1','David Alexander', 'Heredia Angulo');

/*--Verificar si existe un autor asignado a libros--*/
DELIMITER $$
CREATE PROCEDURE stp_validarautor_libro (IN idautor INT)
BEGIN

SELECT * FROM tbl_autor a, tbl_autorlibro l WHERE a.aut_id = l.aut_id AND a.aut_id=idautor AND a.aut_estado = 'A' AND l.aul_estado='A';

END$$
DELIMITER $$

CALL stp_validarautor_libro('1');

/*--Eliminar autor--*/
DELIMITER $$
CREATE PROCEDURE stp_eliminarautor (IN idautor INT)
BEGIN

UPDATE tbl_autor SET aut_estado='I' WHERE aut_id = idautor;

END$$
DELIMITER $$

CALL stp_eliminarautor('1');

/*--Obtener editoriales--*/
DELIMITER $$
CREATE PROCEDURE stp_obtener_editoriales ()
BEGIN

SELECT * FROM tbl_editorial WHERE edi_estado = 'A';

END$$
DELIMITER $$

CALL stp_obtener_editoriales();

/*--Registrar editorial--*/
DELIMITER $$
CREATE PROCEDURE stp_registrareditorial (IN nombre VARCHAR(80))
BEGIN

INSERT INTO tbl_editorial (edi_nombre) VALUES (nombre);

END$$
DELIMITER $$

CALL stp_registrareditorial('Alcantilados');

/*--Modificar editorial--*/
DELIMITER $$
CREATE PROCEDURE stp_modificareditorial (IN ideditorial INT, IN nombre VARCHAR(80))
BEGIN

UPDATE tbl_editorial SET edi_nombre=nombre WHERE edi_id = ideditorial;

END$$
DELIMITER $$

CALL stp_modificareditorial('1','Alcantilados');

/*--Verificar si existe una editorial asignada a libros--*/
DELIMITER $$
CREATE PROCEDURE stp_validareditorial_libro (IN ideditorial INT)
BEGIN

SELECT * FROM tbl_editorial e, tbl_libro l WHERE e.edi_id = l.edi_id AND e.edi_id=ideditorial AND l.lib_estado='A' AND e.edi_estado='A';

END$$
DELIMITER $$

CALL stp_validareditorial_libro('1');

/*--Eliminar editorial--*/
DELIMITER $$
CREATE PROCEDURE stp_eliminareditorial (IN ideditorial INT)
BEGIN

UPDATE tbl_editorial SET edi_estado='I' WHERE edi_id = ideditorial;

END$$
DELIMITER $$

CALL stp_eliminareditorial('1');

/*--Obtener libro por id--*/
DELIMITER $$
CREATE PROCEDURE stp_obtenerlibro (IN idlibro INT)
BEGIN

SELECT e.edi_nombre, e.edi_id, a.aut_id, a.aut_apellido, a.aut_nombre, l.lib_id, l.lib_isbn, l.lib_titulo, l.lib_anio, l.lib_precioventa, t.aul_id FROM tbl_autor a, tbl_libro l, tbl_editorial e, tbl_autorlibro t WHERE l.lib_id = t.lib_id AND l.edi_id = e.edi_id AND a.aut_id = t.aut_id AND t.aul_estado='A' AND l.lib_estado='A' AND l.lib_id = idlibro;

END$$
DELIMITER $$

CALL stp_obtenerlibro('1');

/*--Insertar libro--*/
DELIMITER $$
CREATE PROCEDURE stp_registrarlibro (IN ideditorial INT, IN isbn VARCHAR(50), IN titulo VARCHAR(100), IN anio VARCHAR(4), IN precioventa DECIMAL(8,2))
BEGIN

INSERT INTO tbl_libro (edi_id, lib_isbn, lib_titulo, lib_anio, lib_precioventa) 
VALUES (ideditorial,isbn,titulo,anio,precioventa);

END$$
DELIMITER $$

CALL stp_registrarlibro('1','312132-321','Programacion nueva','2020','13.50');


/*--Insertar libro en la tabla autorlibro--*/
DELIMITER $$
CREATE PROCEDURE stp_registrarautorlibro (IN idautor INT)
BEGIN

INSERT INTO tbl_autorlibro (aut_id, lib_id)
VALUES (idautor,(SELECT lib_id FROM tbl_libro order by lib_id desc limit 1));

END$$
DELIMITER $$

CALL stp_registrarautorlibro('1');

/*--Verificar si existe una editorial asignada a libros--*/
DELIMITER $$
CREATE PROCEDURE stp_validar_autorlibro (IN idautor INT, IN idlibro INT)
BEGIN

SELECT * FROM tbl_autorlibro WHERE aul_estado='A' AND aut_id=idautor AND lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_validar_autorlibro('1','2');

/*--Insertar autor libro en la tabla autorlibro--*/
DELIMITER $$
CREATE PROCEDURE stp_registrarautor_libro (IN idautor INT, IN idlibro INT)
BEGIN

INSERT INTO tbl_autorlibro (aut_id, lib_id) VALUES (idautor,idlibro);

END$$
DELIMITER $$

CALL stp_registrarautor_libro('1','2');

/*--Modificar Libro--*/
DELIMITER $$
CREATE PROCEDURE stp_modificarlibro (IN idautor INT, IN idlibro INT, IN ideditorial INT, IN idautorlibro INT, IN isbn VARCHAR(50), IN titulo VARCHAR(100), IN anio VARCHAR(4), IN precioventa DECIMAL(8,2))
BEGIN

UPDATE tbl_libro 
SET lib_titulo=titulo, lib_isbn=isbn, lib_anio=anio, lib_precioventa=precioventa, edi_id=ideditorial
WHERE lib_estado='A' AND lib_id=idlibro;

UPDATE tbl_autorlibro
SET aut_id=idautor, lib_id=idlibro WHERE aul_estado='A' AND aul_id=idautorlibro;

END$$
DELIMITER $$

CALL stp_modificarlibro('1','2','3','4','312132-321','Programacion nueva','2020','13.50');

/*--Modificar Libro Autor--*/
DELIMITER $$
CREATE PROCEDURE stp_modificarlibro_autor (IN ideditorial INT, IN idlibro INT, IN isbn VARCHAR(50), IN titulo VARCHAR(100), IN anio VARCHAR(4), IN precioventa DECIMAL(8,2))
BEGIN

UPDATE tbl_libro 
SET lib_titulo=titulo, lib_isbn=isbn, lib_anio=anio, lib_precioventa=precioventa, edi_id=ideditorial
WHERE lib_estado='A' AND lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_modificarlibro_autor('3','4','312132-321','Programacion nueva','2020','13.50');


/*--Modificar Usuario--*/
DELIMITER $$
CREATE PROCEDURE stp_modificarusuario (IN rol INT, IN nombre VARCHAR(80), IN apellido VARCHAR(80), IN correo VARCHAR(80), IN password VARCHAR(80),
                                     IN identificacion VARCHAR(13),IN telefono VARCHAR(15),IN direccion VARCHAR(200), IN idusuario INT)
BEGIN

UPDATE tbl_usuario SET rol_id=rol,usu_nombre=nombre,usu_apellido=apellido, usu_correo=correo,usu_password=password,usu_identificacion=identificacion,
                       usu_telefono=telefono,usu_direccion=direccion 
WHERE usu_estado='A' AND usu_id=idusuario;
END$$
DELIMITER $$

CALL stp_modificarusuario('3','David','Heredia','dav@gmail.com','12345','17258518','0984047565','El conde','2');

/*--Modificar Usuario sin correo--*/
DELIMITER $$
CREATE PROCEDURE stp_modificarusuario_nocorreo (IN rol INT, IN nombre VARCHAR(80), IN apellido VARCHAR(80), IN password VARCHAR(80),
                                     IN identificacion VARCHAR(13),IN telefono VARCHAR(15),IN direccion VARCHAR(200), IN idusuario INT)
BEGIN

UPDATE tbl_usuario SET rol_id=rol,usu_nombre=nombre,usu_apellido=apellido, usu_password=password,usu_identificacion=identificacion,
                       usu_telefono=telefono,usu_direccion=direccion 
WHERE usu_estado='A' AND usu_id=idusuario;
END$$
DELIMITER $$

CALL stp_modificarusuario_nocorreo('3','David','Heredia','12345','17258518','0984047565','El conde','2');

/*--Obtener usuario por id--*/
DELIMITER $$
CREATE PROCEDURE stp_obtenerusuario_id (IN idusuario INT)
BEGIN

SELECT * FROM tbl_usuario WHERE usu_estado='A' AND usu_id=idusuario;
END$$
DELIMITER $$

CALL stp_obtenerusuario_id('3');

/*--Eliminar usuario--*/
DELIMITER $$
CREATE PROCEDURE stp_eliminarusuario (IN idusuario INT)
BEGIN

UPDATE tbl_usuario SET usu_estado = 'I' WHERE usu_id = idusuario;

END$$
DELIMITER $$

CALL stp_eliminarusuario('3');

/*--Obtener Rol-*/
DELIMITER $$
CREATE PROCEDURE stp_obtener_rol ()
BEGIN

SELECT * FROM  tbl_rol  WHERE rol_estado ='A';

END$$
DELIMITER $$

CALL stp_obtener_rol();



/*--Modificar Perfil--*/
DELIMITER $$
CREATE PROCEDURE stp_modificarperfil (IN nombre VARCHAR(80), IN apellido VARCHAR(80), IN correo VARCHAR(80), IN password VARCHAR(80),
                                     IN identificacion VARCHAR(13),IN telefono VARCHAR(15),IN direccion VARCHAR(200), IN idusuario INT)
BEGIN

UPDATE tbl_usuario SET usu_nombre=nombre,usu_apellido=apellido, usu_correo=correo,usu_password=password,usu_identificacion=identificacion,
                       usu_telefono=telefono,usu_direccion=direccion 
WHERE usu_estado='A' AND usu_id=idusuario;
END$$
DELIMITER $$

CALL stp_modificarperfil('David','Heredia','dav@gmail.com','12345','17258518','0984047565','El conde','2');

/*--Modificar Perfil sin correo--*/
DELIMITER $$
CREATE PROCEDURE stp_modificarperfil_nocorreo (IN nombre VARCHAR(80), IN apellido VARCHAR(80), IN password VARCHAR(80),
                                     IN identificacion VARCHAR(13),IN telefono VARCHAR(15),IN direccion VARCHAR(200), IN idusuario INT)
BEGIN

UPDATE tbl_usuario SET usu_nombre=nombre,usu_apellido=apellido, usu_password=password,usu_identificacion=identificacion,
                       usu_telefono=telefono,usu_direccion=direccion 
WHERE usu_estado='A' AND usu_id=idusuario;
END$$
DELIMITER $$

CALL stp_modificarperfil_nocorreo('David','Heredia','12345','17258518','0984047565','El conde','2');






/*--Validar si existen autores relacionados con Libros--*/
DELIMITER $$
CREATE PROCEDURE stp_validar_autorlibros (IN idlibro INT)
BEGIN

SELECT e.edi_nombre, e.edi_id, a.aut_id, a.aut_apellido, a.aut_nombre, l.lib_id, l.lib_isbn, l.lib_titulo, l.lib_anio, l.lib_precioventa 
FROM tbl_autor a, tbl_libro l, tbl_editorial e, tbl_autorlibro t 
WHERE l.lib_id = t.lib_id AND l.edi_id = e.edi_id AND a.aut_id = t.aut_id AND t.aul_estado='A' AND l.lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_validar_autorlibros('1');

/*--Eliminar varios libros--*/
DELIMITER $$
CREATE PROCEDURE stp_eliminar_varioslibros (IN idautor INT, IN idlibro INT)
BEGIN

UPDATE tbl_autorlibro SET aul_estado='I' WHERE aut_id=idautor  AND lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_eliminar_varioslibros('1','3');

/*--Eliminar libro--*/
DELIMITER $$
CREATE PROCEDURE stp_eliminarlibro (IN idautor INT, IN idlibro INT)
BEGIN

UPDATE tbl_autorlibro a, tbl_libro l SET a.aul_estado='I', l.lib_estado='I' WHERE a.lib_id=l.lib_id AND a.aut_id=idautor AND a.lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_eliminarlibro('1','3');

/*--Eliminar libro completo--*/
DELIMITER $$
CREATE PROCEDURE stp_eliminar_libro (IN idlibro INT)
BEGIN

UPDATE tbl_autorlibro a, tbl_libro l SET a.aul_estado='I', l.lib_estado='I' WHERE a.lib_id=l.lib_id AND a.lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_eliminar_libro('1');

/*--Obtener Libros--*/
DELIMITER $$
CREATE PROCEDURE stp_obtener_libros ()
BEGIN

SELECT * FROM tbl_libro WHERE lib_estado='A';

END$$
DELIMITER $$

CALL stp_obtener_libros();

/*--Modificar PVP libros--*/
DELIMITER $$
CREATE PROCEDURE stp_modificar_pvplibros (IN idlibro INT, IN precioventa DECIMAL(8,2))
BEGIN

UPDATE tbl_libro SET lib_precioventa=precioventa WHERE lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_modificar_pvplibros('1','20.50');


/*--Obtener Catalogo--*/
DELIMITER $$
CREATE PROCEDURE stp_obtenercatalogo ()
BEGIN

SELECT l.*, e.* FROM tbl_libro l, tbl_editorial e WHERE e.edi_id = l.edi_id AND l.lib_estado='A'AND e.edi_estado='A';

END$$
DELIMITER $$

CALL stp_obtenercatalogo();


/*--Obtener Catalogo Libro--*/
DELIMITER $$
CREATE PROCEDURE stp_obtenercatalogo_libro (IN idlibro INT)
BEGIN

SELECT l.*, e.* FROM tbl_libro l, tbl_editorial e WHERE e.edi_id = l.edi_id AND l.lib_estado='A'AND e.edi_estado='A' AND lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_obtenercatalogo_libro('1');

/*--Obtener Catalogo Autor--*/
DELIMITER $$
CREATE PROCEDURE stp_obtenercatalogo_autor (IN idlibro INT)
BEGIN

SELECT a.*, t.*,l.* FROM tbl_autorlibro t, tbl_autor a, tbl_libro l WHERE t.aut_id = a.aut_id AND t.lib_id = l.lib_id AND t.aul_estado='A' AND l.lib_id=idlibro;

END$$
DELIMITER $$

CALL stp_obtenercatalogo_autor('1');