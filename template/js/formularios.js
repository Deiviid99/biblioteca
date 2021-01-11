$(document).ready(function () {
    //REGISTRAR USUARIOS
    $('#btnRegistrar').click(function () {
        var datos = $('#frmRegistroUsuario').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/usuarioController.php?register=user",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("El correo ingresado ya se encuentra registrado en nuestro sistema.");
                } else if (data == "2") {
                    alertify.success("Registro exitoso");
                    document.getElementById("frmRegistroUsuario").reset();
                } else if (data == "3") {
                    alertify.warning("No se pueden registrar datos vacíos.");
                }
                else {
                    alertify.error("Error de registro");
                }
            }
        });
        return false;
    });
    //INICIAR SESIÓN
    $('#btnLogin').click(function () {
        var datos = $('#frmLogin').serialize();
        var directorio = "http://192.168.1.33:82/biblioteca";
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/loginController.php?login=user",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    window.location = directorio + "/view/home.php";
                } else if (data == "2") {
                    alertify.notify("Usuario o contraseña incorrectos. Vuelva a intentar.");
                } else {
                    alertify.error("Error con la base de datos.");
                }
            }
        });
        return false;
    });
    //RECUPERAR CONTRASEÑA
    $('#btnRecuperar').click(function () {
        var datos = $('#frmRecuperarClave').serialize();
        var directorio = "http://192.168.1.33:82/biblioteca";
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/loginController.php?recovery=password",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("El correo electrónico no se encuentra registrado en nuestro sistema.");
                } else if (data == "2") {
                    alertify.alert("Información", "Se ha enviado un correo electrónico con las instrucciones para recuperar su contraseña, por favor verifique la información en su bandeja de entrada o spam.", function () { window.location = directorio + "/view/login.php"; });
                } else if (data == "3") {
                    alertify.warning("El correo no puede ser vacío.");
                } else {
                    alertify.error("No se puede recuperar la cuenta. Si los errores persisten, por favor comuníquese con el administrador del sistema.");
                }
            }
        });
        return false;
    });
    //CAMBIAR CONTRASEÑA
    $('#btnCambiarClave').click(function () {
        var datos = $('#frmCambiarClave').serialize();
        var directorio = "http://192.168.1.33:82/biblioteca";
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/loginController.php?loginrecovery=password",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.alert("Información", "Cambio exitoso", function () { window.location = directorio + "/view/login.php"; });
                } else if (data == "2") {
                    alertify.alert("Información", "Ha ocurrido un problema en el cambio de la clave, por favor comuníquese de inmediato con el administrador del sistema.", function () { window.location = directorio + "/view/login.php"; });
                } else {
                    alertify.warning("Las contaseñas no coinciden. Vuelva a intentar");
                }
            }
        });
        return false;
    });


    //GUARDAR EDITORIAL
    $('#btnGuardarEditorial').click(function () {
        var datos = $('#frmAgregarEditorial').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/editorialController.php?add=editorial",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("El campo no se puede guardar vacío.");
                } else if (data == "2") {
                    alertify.success("Guardado exitoso")
                    $("#modalAgregarEditorial").modal('hide');
                    $('#tablaEditorial').load('http://192.168.1.33:82/biblioteca/view/tablaeditorial.php');
                    limpiarCamposAgregarEditorial();
                    document.getElementById("frmAgregarEditorial").reset();
                } else {
                    alertify.error("Error de guardado");
                }
            }
        });
        return false;


    });
    //MODIFICAR EDITORIAL
    $('#btnActualizarEditorial').click(function () {

        var datos = $('#frmModificarEditorial').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/editorialController.php?edit=editorial",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("El campo no se puede actualizar vacío.");
                } else if (data == "2") {
                    alertify.success("Actualización exitosa")
                    $("#modalModificarEditorial").modal('hide');
                    $('#tablaEditorial').load('http://192.168.1.33:82/biblioteca/view/tablaeditorial.php');
                    limpiarCamposModificarEditorial();
                } else {
                    alertify.error("Error de actualización");
                }
            }
        });
        return false;

    });

    //GUARDAR AUTOR
    $('#btnGuardarAutor').click(function () {
        var datos = $('#frmAgregarAutor').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/autorController.php?add=autor",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("Los campos no se pueden guardar vacíos.");
                } else if (data == "2") {
                    alertify.success("Guardado exitoso")
                    $("#modalAgregarAutor").modal('hide');
                    $('#tablaAutor').load('http://192.168.1.33:82/biblioteca/view/tablaautor.php');
                    limpiarCamposAgregarAutor();
                    document.getElementById("frmAgregarAutor").reset();
                } else {
                    alertify.error("Error de guardado");
                }
            }
        });
        return false;

    });
    //MODIFICAR AUTOR
    $('#btnActualizarAutor').click(function () {
        var datos = $('#frmModificarAutor').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/autorController.php?edit=autor",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("Los campos no se pueden actualizar vacíos.");
                } else if (data == "2") {
                    alertify.success("Actualización exitosa")
                    $("#modalModificarAutor").modal('hide');
                    $('#tablaAutor').load('http://192.168.1.33:82/biblioteca/view/tablaautor.php');
                    limpiarCamposModificarAutor();
                } else {
                    alertify.error("Error de actualización");
                }
            }
        });
        return false;
    });


    //CARGAR LA SELECCION DE AUTORES AL MULTISELECT
    $('#cmbAutores').multiselect({
        nonSelectedText: 'Seleccione autor(es)',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        includeSelectAllOption: true,
        maxHeight: 250,
        buttonWidth: '85%'
    });
    //OBTENER TABLA DE EDITORIAL
    $('#tablaEditorial').load('http://192.168.1.33:82/biblioteca/view/tablaeditorial.php');
    //OBTENER TABLA DE AUTOR
    $('#tablaAutor').load('http://192.168.1.33:82/biblioteca/view/tablaautor.php');
    //OBTENER TABLA DE LIBROS
    $('#tablaLibro').load('http://192.168.1.33:82/biblioteca/view/tablalibro.php');
    //OBTENER TABLA DE LIBROS
    $('#tablaPrueba').load('http://192.168.1.33:82/biblioteca/view/tablaprueba.php');


    //GUARDAR LIBRO
    $('#btnGuardarLibro').click(function () {
        var datos = $('#frmAgregarLibro').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/libroController.php?add=libro",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("Los campos no se pueden guardar vacíos.");
                } else if (data == "2") {
                    alertify.success("Guardado exitoso")
                    $("#modalAgregarLibro").modal('hide');
                    $('#tablaLibro').load('http://192.168.1.33:82/biblioteca/view/tablalibro.php');
                    limpiarCamposAgregarLibro();
                    document.getElementById("frmAgregarLibro").reset();
                } else {
                    alertify.error("Error de guardado");
                }
            }
        });
        return false;
    });
    //ACTUALIZAR LIBRO
    $('#btnActualizarLibro').click(function () {
        var directorio = "http://192.168.1.33:82/biblioteca";
        var datos = $('#frmModificarLibro').serialize();
        var idLibro = $('#txtIdLibro').val();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/libroController.php?edit=libro",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.warning("Los campos no se pueden actualizar vacíos.");
                } else if (data == "2") {
                    alertify.success("Actualización exitosa")
                    $("#modalModificarLibro").modal('hide');
                    alertify.alert("Información", "La actualización se la realizó sin considerar el autor, el cual ya existe en el libro.", function () { window.location = directorio + "/view/mantenimiento.php?libro=" + idLibro; });
                    limpiarCamposModificarLibro();
                } else if (data == "3") {
                    alertify.success("Actualización exitosa")
                    $("#modalModificarLibro").modal('hide');
                    alertify.alert("Información", "Se ha actualizado el registro.", function () { window.location = directorio + "/view/mantenimiento.php?libro=" + idLibro; });
                    limpiarCamposModificarLibro();
                } else {
                    alertify.error("Error de actualización");
                }
            }
        });
        return false;
    });
    //AGREGAR AUTOR LIBRO
    $('#btnAgregarLibro').click(function () {
        var directorio = "http://192.168.1.33:82/biblioteca";
        var datos = $('#frmModificarLibro').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/libroController.php?add2=libroautor",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.alert("Información", "Lo sentimos, pero no puede agregarse el mismo autor al libro.");
                } else if (data = "2") {
                    alertify.success("Guardado exitoso")
                    $("#modalModificarLibro").modal('hide');
                    document.getElementById("frmModificarLibro").reset();
                    alertify.alert("Información", "Se ha registrado un nuevo autor.", function () { window.location = directorio + "/view/libro.php"; });
                } else {
                    alertify.error("Error de guardado");
                }
            }
        });
        return false;
    });


    //ACTUALIZAR PVP
    $('#btnActualizarPVP').click(function () {
        var datos = $('#frmModificarPVP').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/libroController.php?price=pvp",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.success("Cambio exitoso")
                    $("#modalCambiarPVP").modal('hide');
                    $('#tablaLibro').load('http://192.168.1.33:82/biblioteca/view/tablalibro.php');
                    limpiarCamposPVPGeneral();
                    document.getElementById("frmModificarPVP").reset();
                } else if (data == "2") {
                    alertify.alert("Información", "No se puede aplicar el cambio, porque no existen registros de libros.");
                } else if (data == "3") {
                    alertify.alert("Información", "No se puede aplicar el cambio, porque el P.V.P no puede ser inferior a cero.");
                }
                else if (data == "4") {
                    alertify.warning("El porcentaje no se puede aplicar, por favor revise el dato ingresado.");
                }
                else {
                    alertify.error("Error de cambio");
                }
            }
        });
        return false;
    });
    //ACTUALIZAR PVP LIBRO
    $('#btnActualizarPVPLibro').click(function () {
        var datos = $('#frmModificarPVPLibro').serialize();
        alertify.set('notifier', 'position', 'top-right');
        $.ajax({
            type: "POST",
            url: "../controller/libroController.php?pricelibro=pvp",
            data: datos,
            success: function (data) {
                if (data == "1") {
                    alertify.success("Cambio exitoso")
                    $("#modalCambiarPVPLibro").modal('hide');
                    $('#tablaLibro').load('http://192.168.1.33:82/biblioteca/view/tablalibro.php');
                    limpiarCamposPVPEspecifico();
                    document.getElementById("frmModificarPVPLibro").reset();
                } else if (data == "2") {
                    alertify.alert("Información", "No se puede aplicar el cambio, porque el P.V.P no puede ser inferior a cero.");
                } else if (data == "4") {
                    alertify.warning("El porcentaje no se puede aplicar, por favor revise el dato ingresado.");
                }
                else {
                    alertify.error("Error de cambio");
                }

            }
        });
        return false;
    });

});

/*------------------FUNCIONES RELACIONADAS AL CRUD---------------*/

//CAPTURAR DATOS PARA IMPRIMIRLOS EN EL FORM EDITORIAL
function obtenerDatosActualizarEditorial(datos) {
    d = datos.split('||');
    $('#txtIdEditorial').val(d[0]);
    $('#txtNombreEditorialu').val(d[1]);
}
//CAPTURAR DATOS PARA IMPRIMIRLOS EN EL FORM AUTOR
function obtenerDatosActualizarAutor(datos) {
    d = datos.split('||');
    $('#txtIdAutor').val(d[0]);
    $('#txtNombreAutoru').val(d[1]);
    $('#txtApellidoAutoru').val(d[2]);
}
//CAPTURAR DATOS PARA IMPRIMIRLOS EN EL FORM LIBRO
function obtenerDatosActualizarLibro(datos) {
    d = datos.split('||');
    $('#cmbAutoresu').val(d[0]);
    $('#txtIdLibro').val(d[1]);
    $('#cmbEditorialu').val(d[2]);
    $('#txtIsbnu').val(d[3]);
    $('#txtTitulou').val(d[4]);
    $('#txtAniou').val(d[5]);
    $('#txtPrecioVentau').val(d[6]);
    $('#txtIdLibroAutor').val(d[7]);
}
//CAPTURAR DATOS PARA IMPRIMIRLOS EN EL FORM PVP LIBRO
function obtenerDatosActualizarLibroPVP(datos) {
    d = datos.split('||');
    $('#txtIdPVPLibro').val(d[0]);
    $('#txtPVPLibro').val(d[1]);
}

//ELIMINAR EDITORIAL
function eliminarEditorial(id) {
    alertify.set('notifier', 'position', 'top-right');
    alertify.confirm('Eliminar Editorial', '¿Está seguro/a de eliminar este registro?',
        function () {
            datos = "idEditorial=" + id;
            $.ajax({
                type: "POST",
                url: "../controller/editorialController.php?delete=editorial",
                data: datos,
                success: function (data) {
                    if (data == "1") {
                        alertify.alert("Información", "No se puede eliminar esta editorial, ya que se encuentra asignada a los libros.");
                    } else if (data == "2") {
                        $('#tablaEditorial').load('http://192.168.1.33:82/biblioteca/view/tablaeditorial.php');
                        alertify.success("Eliminado exitoso")
                    } else {
                        alertify.error("Error de eliminado");
                    }
                }
            });
        },
        function () { });
}
//ELIMINAR AUTOR
function eliminarAutor(id) {
    alertify.set('notifier', 'position', 'top-right');
    alertify.confirm('Eliminar Autor', '¿Está seguro/a de eliminar este registro?',
        function () {
            datos = "idAutor=" + id;
            $.ajax({
                type: "POST",
                url: "../controller/autorController.php?delete=autor",
                data: datos,
                success: function (data) {
                    if (data == "1") {
                        alertify.alert("Información", "No se puede eliminar este autor, ya que se encuentra asignada a los libros.");
                    } else if (data == "2") {
                        $('#tablaAutor').load('http://192.168.1.33:82/biblioteca/view/tablaautor.php');
                        alertify.success("Eliminado exitoso");
                    } else {
                        alertify.error("Error de eliminado");
                    }
                }
            });
        },
        function () { });
}

//ELIMINAR LIBRO
function eliminarLibro(id) {
    var directorio = "http://192.168.1.33:82/biblioteca";
    alertify.set('notifier', 'position', 'top-right');
    alertify.confirm('Eliminar Libro', '¿Está seguro/a de eliminar el libro?',
        function () {
            datos = "idLibro=" + id;
            $.ajax({
                type: "POST",
                url: "../controller/libroController.php?delete=libro",
                data: datos,
                success: function (data) {
                    if (data == "1") {
                        alertify.success("Eliminado exitoso");
                        //OBTENER TABLA DE LIBROS
                        $('#tablaLibro').load('http://192.168.1.33:82/biblioteca/view/tablalibro.php');
                    } else {
                        alertify.error("Error de eliminado");
                    }
                }
            });
        },
        function () { });
}

//ELIMINAR LIBRO AUTOR
function eliminarLibroAutor(idLibro, idAutor) {
    var directorio = "http://192.168.1.33:82/biblioteca";
    alertify.set('notifier', 'position', 'top-right');
    alertify.confirm('Eliminar Libro', '¿Está seguro/a de eliminar este registro?',
        function () {
            datos = "idLibro=" + idLibro +
                "&idAutor=" + idAutor;
            $.ajax({
                type: "POST",
                url: "../controller/libroController.php?delete2=libro",
                data: datos,
                success: function (data) {
                    if (data == "1") {
                        alertify.success("Eliminado exitoso");
                        alertify.alert("Información", "Se ha eliminado un registro.", function () { window.location = directorio + "/view/mantenimiento.php?libro=" + idLibro; });
                    } else if (data == "2") {
                        alertify.alert("Información", "Se ha eliminado el último registro, por tanto, el libro se ha eliminado por completo.", function () { window.location = directorio + "/view/libro.php"; });
                    } else {
                        alertify.error("Error de eliminado");
                    }
                }
            });
        },
        function () { });
}


/*------------------LIMPIAR CAMPOS FORMULARIOS VALIDADOS------------------*/

function limpiarCamposAgregarEditorial() {
    var inputNombre = document.getElementById('txtNombreEditorial');
    var mensaje = document.getElementById('mensajeEditorial');

    inputNombre.style.border = '';
    inputNombre.style.borderColor = '';
    inputNombre.style.boxShadow = '';
    mensaje.hidden = true;

}

function limpiarCamposModificarEditorial() {
    var inputNombre = document.getElementById('txtNombreEditorialu');
    var mensaje = document.getElementById('mensajeEditorialu');

    inputNombre.style.border = '';
    inputNombre.style.borderColor = '';
    inputNombre.style.boxShadow = '';
    mensaje.hidden = true;

}

function limpiarCamposAgregarAutor() {
    var inputNombre = document.getElementById('txtNombreAutor');
    var inputApellido = document.getElementById('txtApellidoAutor');
    var mensajeNombre = document.getElementById('mensajeNombreAutor');
    var mensajeApellido = document.getElementById('mensajeApellidoAutor');

    inputNombre.style.border = '';
    inputNombre.style.borderColor = '';
    inputNombre.style.boxShadow = '';
    mensajeNombre.hidden = true;
    mensajeApellido.hidden = true;
    inputApellido.style.border = '';
    inputApellido.style.borderColor = '';
    inputApellido.style.boxShadow = '';
}

function limpiarCamposModificarAutor() {
    var inputNombre = document.getElementById('txtNombreAutoru');
    var inputApellido = document.getElementById('txtApellidoAutoru');
    var mensajeNombre = document.getElementById('mensajeNombreAutoru');
    var mensajeApellido = document.getElementById('mensajeApellidoAutoru');

    inputNombre.style.border = '';
    inputNombre.style.borderColor = '';
    inputNombre.style.boxShadow = '';
    mensajeNombre.hidden = true;
    mensajeApellido.hidden = true;
    inputApellido.style.border = '';
    inputApellido.style.borderColor = '';
    inputApellido.style.boxShadow = '';
}

function limpiarCamposAgregarLibro() {
    var inputEditorial = document.getElementById('cmbEditorial');
    var inputIsbn = document.getElementById('txtIsbn');
    var inputTitulo = document.getElementById('txtTitulo');
    var inputAnio = document.getElementById('txtAnio');
    var inputPrecioventa = document.getElementById('txtPrecioVenta');
    var inputAutor = document.getElementById('cmbAutores');
    var mensajeEditorial = document.getElementById('mensajeEditorialLibro');
    var mensajeIsbn = document.getElementById('mensajeIsbn');
    var mensajeTitulo = document.getElementById('mensajeTitulo');
    var mensajeAnio = document.getElementById('mensajeAnio');
    var mensajePVP = document.getElementById('mensajePVP');
    var mensajeAutor = document.getElementById('mensajeAutor');

    mensajeEditorial.hidden = true;
    inputEditorial.style.border = '';
    inputEditorial.style.borderColor = '';
    inputEditorial.style.boxShadow = '';

    mensajeIsbn.hidden = true;
    inputIsbn.style.border = '';
    inputIsbn.style.borderColor = '';
    inputIsbn.style.boxShadow = '';

    mensajeTitulo.hidden = true;
    inputTitulo.style.border = '';
    inputTitulo.style.borderColor = '';
    inputTitulo.style.boxShadow = '';

    mensajeAnio.hidden = true;
    inputAnio.style.border = '';
    inputAnio.style.borderColor = '';
    inputAnio.style.boxShadow = '';

    mensajePVP.hidden = true;
    inputPrecioventa.style.border = '';
    inputPrecioventa.style.borderColor = '';
    inputPrecioventa.style.boxShadow = '';

    mensajeAutor.hidden = true;
    inputAutor.style.border = '';
    inputAutor.style.borderColor = '';
    inputAutor.style.boxShadow = '';

}

function limpiarCamposModificarLibro() {
    var inputEditorial = document.getElementById('cmbEditorialu');
    var inputIsbn = document.getElementById('txtIsbnu');
    var inputTitulo = document.getElementById('txtTitulou');
    var inputAnio = document.getElementById('txtAniou');
    var inputPrecioventa = document.getElementById('txtPrecioVentau');
    var inputAutor = document.getElementById('cmbAutoresu');
    var mensajeEditorial = document.getElementById('mensajeEditorialLibrou');
    var mensajeIsbn = document.getElementById('mensajeIsbnu');
    var mensajeTitulo = document.getElementById('mensajeTitulou');
    var mensajeAnio = document.getElementById('mensajeAniou');
    var mensajePVP = document.getElementById('mensajePVPu');
    var mensajeAutor = document.getElementById('mensajeAutoru');

    mensajeEditorial.hidden = true;
    inputEditorial.style.border = '';
    inputEditorial.style.borderColor = '';
    inputEditorial.style.boxShadow = '';

    mensajeIsbn.hidden = true;
    inputIsbn.style.border = '';
    inputIsbn.style.borderColor = '';
    inputIsbn.style.boxShadow = '';

    mensajeTitulo.hidden = true;
    inputTitulo.style.border = '';
    inputTitulo.style.borderColor = '';
    inputTitulo.style.boxShadow = '';

    mensajeAnio.hidden = true;
    inputAnio.style.border = '';
    inputAnio.style.borderColor = '';
    inputAnio.style.boxShadow = '';

    mensajePVP.hidden = true;
    inputPrecioventa.style.border = '';
    inputPrecioventa.style.borderColor = '';
    inputPrecioventa.style.boxShadow = '';

    mensajeAutor.hidden = true;
    inputAutor.style.border = '';
    inputAutor.style.borderColor = '';
    inputAutor.style.boxShadow = '';

}

function limpiarCamposPVPGeneral() {
    var inputPorcentaje = document.getElementById('txtPorcentajePVP');
    var mensaje = document.getElementById('mensajePorcentajePVP');

    inputPorcentaje.style.border = '';
    inputPorcentaje.style.borderColor = '';
    inputPorcentaje.style.boxShadow = '';
    mensaje.hidden = true;

}

function limpiarCamposPVPEspecifico() {
    var inputPorcentaje = document.getElementById('txtPorcentajePVPLibro');
    var mensaje = document.getElementById('mensajePorcentajePVPLibro');

    inputPorcentaje.style.border = '';
    inputPorcentaje.style.borderColor = '';
    inputPorcentaje.style.boxShadow = '';
    mensaje.hidden = true;

}